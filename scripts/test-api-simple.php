
#!/usr/bin/env php
<?php

/**
 * Direct Test - Call Claude API and create log file
 * This is the simplest possible test
 */

// Get API key
$apiKey = getenv('CLAUDE_API_KEY');

// Create log directory
$logDir = __DIR__ . '/../storage/seo-logs';
if (!is_dir($logDir)) {
    mkdir($logDir, 0755, true);
}

$logFile = $logDir . '/api-test-' . date('YmdHis') . '.txt';
$log = "";

$log .= "=== API TEST ===\n";
$log .= "Time: " . date('Y-m-d H:i:s') . "\n";
$log .= "Script: " . __FILE__ . "\n";
$log .= "Log file: $logFile\n\n";

// Check if API key exists
if (!$apiKey) {
    $log .= "❌ ERROR: CLAUDE_API_KEY not set!\n";
    file_put_contents($logFile, $log);
    echo $log;
    exit(1);
}

$log .= "✅ API Key found (length: " . strlen($apiKey) . ")\n";
$log .= "✅ First 30 chars: " . substr($apiKey, 0, 30) . "...\n\n";

$log .= "Calling Claude API...\n";
$log .= "------------------------\n\n";

// Make a simple API call
$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_URL => 'https://api.anthropic.com/v1/messages',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_HTTPHEADER => [
        'Content-Type: application/json',
        'x-api-key: ' . $apiKey,
        'anthropic-version: 2023-06-01'
    ],
    CURLOPT_POSTFIELDS => json_encode([
        'model' => 'claude-opus-4-1-20250805',
        'max_tokens' => 100,
        'messages' => [
            [
                'role' => 'user',
                'content' => 'Say TEST_SUCCESSFUL if you receive this'
            ]
        ]
    ])
]);

$response = curl_exec($curl);
$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
$error = curl_error($curl);
curl_close($curl);

$log .= "HTTP Code: $httpCode\n";

if ($error) {
    $log .= "❌ cURL Error: $error\n";
    file_put_contents($logFile, $log);
    echo $log;
    exit(1);
}

if ($httpCode === 200) {
    $log .= "✅ HTTP 200 OK\n";
    $decoded = json_decode($response, true);
    if (isset($decoded['content'][0]['text'])) {
        $log .= "✅ Response received\n";
        $log .= "Response text: " . $decoded['content'][0]['text'] . "\n";
        $log .= "\n🎉 API WORKS!\n";
    } else {
        $log .= "❌ Could not parse response\n";
        $log .= "Full response: " . substr($response, 0, 200) . "\n";
    }
} else {
    $log .= "❌ HTTP $httpCode\n";
    $log .= "Response: " . substr($response, 0, 500) . "\n";
}

$log .= "\n------------------------\n";
$log .= "End of test\n";

// Save log file
file_put_contents($logFile, $log);

// Also print to console
echo $log;

exit(0);