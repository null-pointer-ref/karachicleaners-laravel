#!/usr/bin/env php
<?php

/**
 * SEO Scanner for Karachi Cleaners
 * 
 * Scans all pages and analyzes:
 * - Current meta tags
 * - Content structure
 * - Keyword usage
 * - Technical SEO issues
 * 
 * Usage: php scripts/seo-scanner.php
 */

class SEOScanner
{
    private $baseUrl;
    private $config;
    private $pagesData = [];
    private $logsDir;
    
    public function __construct()
    {
        $this->config = require __DIR__ . '/../config/seo-config.php';
        $this->baseUrl = rtrim($this->config['website']['url'], '/');
        $this->logsDir = __DIR__ . '/../storage/seo-logs';
        
        if (!is_dir($this->logsDir)) {
            mkdir($this->logsDir, 0755, true);
        }
    }
    
    /**
     * Scan all pages for SEO analysis
     */
    public function scanAllPages()
    {
        echo "🔍 Starting SEO Scan: " . date('Y-m-d H:i:s') . "\n";
        echo str_repeat("=", 70) . "\n\n";
        
        $pages = $this->config['pages'] ?? [];
        $scanResults = [];
        
        foreach ($pages as $route => $pageConfig) {
            echo "📄 Scanning: {$route}\n";
            
            $pageData = [
                'route' => $route,
                'service' => $pageConfig['service'] ?? 'Unknown',
                'url' => $this->baseUrl . $route,
                'scan_date' => date('Y-m-d H:i:s'),
                'page_type' => $pageConfig['page_type'] ?? 'service',
                'primary_keyword' => $pageConfig['primary_keyword'] ?? '',
                'secondary_keywords' => $pageConfig['secondary_keywords'] ?? [],
            ];
            
            // Analyze page
            $pageData['current_meta'] = $this->getCurrentMetaTags($pageConfig);
            $pageData['issues'] = $this->analyzePageIssues($pageData);
            $pageData['optimization_needed'] = count($pageData['issues']) > 0;
            
            $scanResults[$route] = $pageData;
            
            // Print summary
            $issueCount = count($pageData['issues']);
            if ($issueCount > 0) {
                echo "   ⚠️  Found $issueCount optimization opportunities\n";
            } else {
                echo "   ✅ No immediate issues found\n";
            }
            echo "\n";
        }
        
        // Save scan results
        $this->saveScanResults($scanResults);
        
        echo str_repeat("=", 70) . "\n";
        echo "✅ Scan Complete: " . count($scanResults) . " pages analyzed\n";
        echo "📊 Results saved to: storage/seo-logs/\n\n";
        
        return $scanResults;
    }
    
    /**
     * Get current meta tags from page config
     */
    private function getCurrentMetaTags($pageConfig)
    {
        return [
            'title' => $pageConfig['title'] ?? '',
            'description' => $pageConfig['description'] ?? '',
            'keywords' => $pageConfig['keywords'] ?? [],
            'og_title' => $pageConfig['og_title'] ?? '',
            'og_description' => $pageConfig['og_description'] ?? '',
        ];
    }
    
    /**
     * Analyze page for SEO issues
     */
    private function analyzePageIssues($pageData)
    {
        $issues = [];
        $meta = $pageData['current_meta'];
        
        // Check title length
        if (empty($meta['title'])) {
            $issues[] = [
                'type' => 'title',
                'severity' => 'critical',
                'message' => 'Title tag is missing',
            ];
        } elseif (strlen($meta['title']) < 30) {
            $issues[] = [
                'type' => 'title',
                'severity' => 'warning',
                'message' => 'Title too short (< 30 characters)',
            ];
        } elseif (strlen($meta['title']) > 60) {
            $issues[] = [
                'type' => 'title',
                'severity' => 'warning',
                'message' => 'Title too long (> 60 characters)',
            ];
        }
        
        // Check meta description
        if (empty($meta['description'])) {
            $issues[] = [
                'type' => 'description',
                'severity' => 'critical',
                'message' => 'Meta description is missing',
            ];
        } elseif (strlen($meta['description']) < 120) {
            $issues[] = [
                'type' => 'description',
                'severity' => 'warning',
                'message' => 'Description too short (< 120 characters)',
            ];
        } elseif (strlen($meta['description']) > 160) {
            $issues[] = [
                'type' => 'description',
                'severity' => 'warning',
                'message' => 'Description too long (> 160 characters)',
            ];
        }
        
        // Check keywords
        if (empty($meta['keywords'])) {
            $issues[] = [
                'type' => 'keywords',
                'severity' => 'warning',
                'message' => 'Meta keywords are missing',
            ];
        }
        
        // Check primary keyword in title
        if (!empty($pageData['primary_keyword']) && !empty($meta['title'])) {
            if (stripos($meta['title'], $pageData['primary_keyword']) === false) {
                $issues[] = [
                    'type' => 'keyword_optimization',
                    'severity' => 'warning',
                    'message' => 'Primary keyword not in title tag',
                ];
            }
        }
        
        // Check OG tags
        if (empty($meta['og_title'])) {
            $issues[] = [
                'type' => 'og_tags',
                'severity' => 'info',
                'message' => 'OG title missing (social sharing)',
            ];
        }
        
        if (empty($meta['og_description'])) {
            $issues[] = [
                'type' => 'og_tags',
                'severity' => 'info',
                'message' => 'OG description missing (social sharing)',
            ];
        }
        
        return $issues;
    }
    
    /**
     * Save scan results to file
     */
    private function saveScanResults($results)
    {
        $timestamp = date('Y-m-d-His');
        $filename = $this->logsDir . "/scan-{$timestamp}.json";
        
        file_put_contents(
            $filename,
            json_encode($results, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)
        );
        
        // Also create summary report
        $this->createScanReport($results, $timestamp);
        
        echo "💾 Scan data saved to: {$filename}\n";
    }
    
    /**
     * Create human-readable scan report
     */
    private function createScanReport($results, $timestamp)
    {
        $report = "SEO SCAN REPORT\n";
        $report .= "===============\n";
        $report .= "Date: " . date('Y-m-d H:i:s') . "\n";
        $report .= "Pages Scanned: " . count($results) . "\n\n";
        
        foreach ($results as $route => $data) {
            $report .= "PAGE: {$route}\n";
            $report .= "Service: {$data['service']}\n";
            
            if (!empty($data['issues'])) {
                $report .= "Issues Found: " . count($data['issues']) . "\n";
                foreach ($data['issues'] as $issue) {
                    $severity = strtoupper($issue['severity']);
                    $report .= "  [$severity] {$issue['message']}\n";
                }
            } else {
                $report .= "Status: ✅ No issues\n";
            }
            
            $report .= "\n";
        }
        
        $filename = $this->logsDir . "/scan-report-{$timestamp}.txt";
        file_put_contents($filename, $report);
    }
}

// Run scanner
$scanner = new SEOScanner();
$scanner->scanAllPages();

echo "🎉 Scan completed successfully!\n";
