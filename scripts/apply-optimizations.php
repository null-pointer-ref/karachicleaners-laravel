#!/usr/bin/env php
<?php

/**
 * Apply SEO Optimizations from Claude AI
 * 
 * Updates config/cleaning-services.php with optimized meta tags, titles, descriptions
 * Uses Claude API to generate optimizations based on keywords
 */

class SEOOptimizer
{
    private $baseDir;
    private $configPath;
    private $apiKey;
    private $baseUrl = 'https://karachicleaners.com';
    private $cleaningServices = [];
    
    public function __construct()
    {
        $this->baseDir = dirname(__DIR__);
        $this->configPath = $this->baseDir . '/config/cleaning-services.php';
        $this->apiKey = getenv('CLAUDE_API_KEY');
        
        if (!$this->apiKey) {
            throw new Exception('CLAUDE_API_KEY environment variable not set');
        }
        
        // Load current config
        if (!file_exists($this->configPath)) {
            throw new Exception("Config file not found: {$this->configPath}");
        }
        
        $this->cleaningServices = require $this->configPath;
    }
    
    /**
     * Optimize all services
     */
    public function optimizeAll()
    {
        echo "✨ Starting SEO Optimization...\n";
        echo "📝 Optimizing service pages with Claude AI\n\n";
        
        $optimizedCount = 0;
        $totalCount = count($this->cleaningServices);
        
        foreach ($this->cleaningServices as $slug => &$service) {
            echo "🔄 Optimizing: {$service['name']}...\n";
            
            try {
                $optimized = $this->optimizeService($slug, $service);
                if ($optimized) {
                    $this->cleaningServices[$slug] = $optimized;
                    $optimizedCount++;
                    echo "   ✅ Optimized successfully\n";
                }
            } catch (Exception $e) {
                echo "   ⚠️ Optimization skipped: " . $e->getMessage() . "\n";
            }
        }
        
        echo "\n📊 Optimization Summary:\n";
        echo "   Total services: {$totalCount}\n";
        echo "   Optimized: {$optimizedCount}\n";
        
        // Save optimized config
        if ($optimizedCount > 0) {
            $this->saveConfig();
            echo "\n✅ Optimizations saved to config!\n";
            return true;
        }
        
        return false;
    }
    
    /**
     * Optimize a single service
     */
    private function optimizeService($slug, $service)
    {
        $prompt = $this->buildOptimizationPrompt($slug, $service);
        
        // Call Claude API
        $response = $this->callClaudeAPI($prompt);
        
        if (!$response) {
            return null;
        }
        
        // Parse response and update service
        return $this->parseOptimizationResponse($service, $response);
    }
    
    /**
     * Build optimization prompt for Claude
     */
    private function buildOptimizationPrompt($slug, $service)
    {
        return <<<PROMPT
You are an SEO expert optimizing a cleaning services website for Karachi, Pakistan.

Current Service: {$service['name']}
Current Title: {$service['title']}
Current Description: {$service['meta_description']}
Current Keywords: {$service['keywords']}
URL: {$this->baseUrl}/services/{$slug}

Please optimize the following for better SEO:

1. **Title** - Keep 30-60 characters, include main keyword + location
2. **Meta Description** - Keep 120-160 characters, compelling and keyword-rich
3. **Keywords** - Provide 10-15 comma-separated keywords for this service
4. **Page Description** - 1-2 sentence compelling description for the page

Format your response as JSON only (no markdown, no code blocks):
{
  "title": "optimized title here",
  "meta_description": "optimized meta description here",
  "keywords": "keyword1, keyword2, keyword3...",
  "description": "optimized page description here"
}

Focus on:
- Karachi, Pakistan location
- Cleaning service industry
- High search intent keywords
- Natural language
- User engagement
PROMPT;
    }
    
    /**
     * Call Claude API
     */
    private function callClaudeAPI($prompt)
    {
        $url = 'https://api.anthropic.com/v1/messages';
        
        $data = [
            'model' => 'claude-opus-4-1-20250805',
            'max_tokens' => 500,
            'messages' => [
                [
                    'role' => 'user',
                    'content' => $prompt
                ]
            ]
        ];
        
        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'x-api-key: ' . $this->apiKey,
                'anthropic-version: 2023-06-01'
            ],
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_TIMEOUT => 30
        ]);
        
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        if ($httpCode !== 200) {
            echo "     API Error (HTTP {$httpCode}): " . substr($response, 0, 100) . "\n";
            return null;
        }
        
        $decoded = json_decode($response, true);
        
        if (!isset($decoded['content'][0]['text'])) {
            return null;
        }
        
        return $decoded['content'][0]['text'];
    }
    
    /**
     * Parse Claude response and update service
     */
    private function parseOptimizationResponse($service, $response)
    {
        try {
            // Try to parse JSON from response
            $optimized = json_decode($response, true);
            
            if (!$optimized) {
                // Try to extract JSON from text
                if (preg_match('/\{.*\}/s', $response, $matches)) {
                    $optimized = json_decode($matches[0], true);
                }
            }
            
            if (!$optimized) {
                return null;
            }
            
            // Update service with optimized content
            $service['title'] = $optimized['title'] ?? $service['title'];
            $service['meta_description'] = $optimized['meta_description'] ?? $service['meta_description'];
            $service['keywords'] = $optimized['keywords'] ?? $service['keywords'];
            $service['description'] = $optimized['description'] ?? $service['description'];
            
            return $service;
        } catch (Exception $e) {
            echo "     Parse error: " . $e->getMessage() . "\n";
            return null;
        }
    }
    
    /**
     * Save optimized config
     */
    private function saveConfig()
    {
        // Create PHP export
        $php = "<?php\n\nreturn " . var_export($this->cleaningServices, true) . ";\n";
        
        // Make it more readable
        $php = str_replace(['  0 => ', "=> \n  ["], [', ', "=> ["], $php);
        
        // Create backup
        $backupPath = $this->baseDir . '/storage/seo-backups/cleaning-services-' . date('Y-m-d-H-i-s') . '.php';
        $backupDir = dirname($backupPath);
        
        if (!is_dir($backupDir)) {
            mkdir($backupDir, 0755, true);
        }
        
        copy($this->configPath, $backupPath);
        
        // Save optimized config
        file_put_contents($this->configPath, $php);
        
        echo "\n💾 Backup saved to: storage/seo-backups/\n";
    }
}

// Main execution
try {
    echo "🚀 SEO Optimization Script\n";
    echo "========================\n\n";
    
    $optimizer = new SEOOptimizer();
    $optimizer->optimizeAll();
    
    echo "\n✅ Optimization complete!\n";
    exit(0);
    
} catch (Exception $e) {
    echo "\n❌ Error: " . $e->getMessage() . "\n";
    exit(1);
}