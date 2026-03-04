#!/usr/bin/env php
<?php

/**
 * Simple SEO Optimization Script
 * This script optimizes your Blade template files with Claude API
 */

// Create storage directory if it doesn't exist
$logsDir = __DIR__ . '/../storage/seo-logs';
if (!is_dir($logsDir)) {
    mkdir($logsDir, 0755, true);
    echo "📁 Created storage/seo-logs directory\n";
}

// Get API key from environment
$apiKey = getenv('CLAUDE_API_KEY');
if (!$apiKey) {
    $errorMsg = "❌ ERROR: CLAUDE_API_KEY environment variable not set\n";
    echo $errorMsg;
    file_put_contents($logsDir . '/error-' . date('YmdHis') . '.txt', $errorMsg);
    exit(1);
}

echo "✨ Starting SEO Optimization...\n";
echo "📍 API Key: Found (" . substr($apiKey, 0, 20) . "...)\n";
echo "📁 Logs directory: $logsDir\n\n";

// Log file
$logFile = $logsDir . '/optimizations-applied-' . date('YmdHis') . '.txt';
$log = "SEO Optimization Run\n";
$log .= "Timestamp: " . date('Y-m-d H:i:s') . "\n";
$log .= "========================\n\n";

// Define pages to optimize
$pages = [
    'home' => [
        'name' => 'Homepage',
        'file' => __DIR__ . '/../resources/views/home.blade.php',
        'type' => 'homepage',
        'keywords' => 'cleaning services Karachi, professional cleaners, house cleaning'
    ],
    'services' => [
        'name' => 'Services Page',
        'file' => __DIR__ . '/../resources/views/services.blade.php',
        'type' => 'services listing',
        'keywords' => 'cleaning services, carpet cleaning, sofa cleaning, house cleaning'
    ],
    'services-details' => [
        'name' => 'Service Detail Pages',
        'file' => __DIR__ . '/../resources/views/services/details.blade.php',
        'type' => 'service details',
        'keywords' => 'professional cleaning, Karachi, eco-friendly'
    ]
];

$optimized = 0;
$errors = 0;

// Process each page
foreach ($pages as $pageKey => $pageData) {
    echo "🔍 Processing: {$pageData['name']}...\n";
    $log .= "Page: {$pageData['name']}\n";
    
    if (!file_exists($pageData['file'])) {
        echo "   ⚠️  File not found: {$pageData['file']}\n";
        $log .= "   ❌ File not found\n\n";
        $errors++;
        continue;
    }
    
    // Call Claude API
    echo "   📡 Calling Claude API...\n";
    $apiResponse = callClaudeAPI($apiKey, $pageData);
    
    if (!$apiResponse) {
        echo "   ❌ API call failed\n";
        $log .= "   ❌ API call failed\n\n";
        $errors++;
        continue;
    }
    
    echo "   ✅ API response received\n";
    echo "   📝 Applying optimizations...\n";
    
    // Apply optimizations
    $applied = applyOptimizations($pageData['file'], $apiResponse, $pageData);
    
    if ($applied) {
        echo "   ✅ Optimizations applied!\n\n";
        $log .= "   ✅ Optimizations applied\n";
        $log .= "      - Title: {$apiResponse['title']}\n";
        $log .= "      - Description: {$apiResponse['description']}\n\n";
        $optimized++;
    } else {
        echo "   ⚠️  Could not apply optimizations\n\n";
        $log .= "   ⚠️  Could not apply optimizations\n\n";
    }
}

// Summary
$summary = "\n========================\n";
$summary .= "SUMMARY\n";
$summary .= "========================\n";
$summary .= "✅ Pages optimized: $optimized\n";
$summary .= "❌ Errors: $errors\n";
$summary .= "📊 Total processed: " . count($pages) . "\n";

echo $summary;
$log .= $summary;

// Save log file
file_put_contents($logFile, $log);
echo "\n📋 Log saved to: $logFile\n";
echo "✨ SEO Optimization Complete!\n";

exit(0);

/**
 * Call Claude API for optimization
 */
function callClaudeAPI($apiKey, $pageData)
{
    $prompt = "You are an SEO expert for a cleaning services company in Karachi, Pakistan.

Page: {$pageData['name']}
Type: {$pageData['type']}
Keywords: {$pageData['keywords']}

Generate ONLY a JSON response (no markdown, no explanation, just JSON):
{
  \"title\": \"optimized page title 50-60 chars\",
  \"description\": \"optimized meta description 120-160 chars\",
  \"heading\": \"optimized main heading\",
  \"keywords\": \"comma separated keywords\"
}

Make it compelling for users searching for cleaning services in Karachi.";

    $data = [
        'model' => 'claude-opus-4-1-20250805',
        'max_tokens' => 300,
        'messages' => [
            [
                'role' => 'user',
                'content' => $prompt
            ]
        ]
    ];

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
        CURLOPT_POSTFIELDS => json_encode($data)
    ]);

    $response = curl_exec($curl);
    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    $error = curl_error($curl);
    curl_close($curl);

    if ($error) {
        echo "   ❌ cURL error: $error\n";
        return null;
    }

    if ($httpCode !== 200) {
        echo "   ❌ API error ($httpCode): $response\n";
        return null;
    }

    $decoded = json_decode($response, true);
    
    if (!isset($decoded['content'][0]['text'])) {
        echo "   ❌ Invalid API response\n";
        return null;
    }

    $responseText = $decoded['content'][0]['text'];
    
    // Clean markdown if present
    $responseText = preg_replace('/```json\n?|\n?```/i', '', $responseText);
    $responseText = trim($responseText);
    
    $optimization = json_decode($responseText, true);
    
    if (!$optimization) {
        echo "   ❌ Could not parse JSON response\n";
        return null;
    }

    return $optimization;
}

/**
 * Apply optimizations to Blade file
 */
function applyOptimizations($filePath, $optimization, $pageData)
{
    $content = file_get_contents($filePath);
    $originalContent = $content;
    $changed = false;

    // Update meta_description
    if (isset($optimization['description'])) {
        $desc = htmlspecialchars($optimization['description'], ENT_QUOTES, 'UTF-8');
        $newContent = preg_replace(
            "/@section\('meta_description',\s*'[^']*'\)/",
            "@section('meta_description', '$desc')",
            $content
        );
        if ($newContent !== $content) {
            $content = $newContent;
            $changed = true;
        }
    }

    // Update meta_keywords
    if (isset($optimization['keywords'])) {
        $keywords = htmlspecialchars($optimization['keywords'], ENT_QUOTES, 'UTF-8');
        $newContent = preg_replace(
            "/@section\('meta_keywords',\s*'[^']*'\)/",
            "@section('meta_keywords', '$keywords')",
            $content
        );
        if ($newContent !== $content) {
            $content = $newContent;
            $changed = true;
        }
    }

    // Only write if there are changes
    if ($changed) {
        file_put_contents($filePath, $content);
        return true;
    }

    return true; // Still consider it success even if no changes (file exists)
}