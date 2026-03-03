#!/usr/bin/env php
<?php

/**
 * SEO Report Generator
 * 
 * Generates comprehensive SEO reports from scan and optimization data
 * Creates both human-readable and JSON formats
 * 
 * Usage: php scripts/generate-seo-report.php
 */

class ReportGenerator
{
    private $config;
    private $reportsDir;
    private $logsDir;
    
    public function __construct()
    {
        $this->config = require __DIR__ . '/../config/seo-config.php';
        $this->reportsDir = __DIR__ . '/../storage/seo-reports';
        $this->logsDir = __DIR__ . '/../storage/seo-logs';
        
        if (!is_dir($this->reportsDir)) {
            mkdir($this->reportsDir, 0755, true);
        }
    }
    
    /**
     * Generate comprehensive SEO report
     */
    public function generateReport()
    {
        echo "📊 Generating SEO Report\n";
        echo str_repeat("=", 70) . "\n\n";
        
        // Get latest scan
        $latestScan = $this->getLatestScanFile();
        if (!$latestScan) {
            echo "⚠️  No scan data available. Run seo-scanner.php first.\n";
            return false;
        }
        
        $scanData = json_decode(file_get_contents($latestScan), true);
        
        // Generate HTML report
        $htmlReport = $this->generateHTMLReport($scanData);
        $htmlFile = $this->reportsDir . '/report-' . date('Y-m-d-His') . '.html';
        file_put_contents($htmlFile, $htmlReport);
        echo "✅ HTML Report generated: {$htmlFile}\n";
        
        // Generate Text report
        $textReport = $this->generateTextReport($scanData);
        $textFile = $this->reportsDir . '/report-' . date('Y-m-d-His') . '.txt';
        file_put_contents($textFile, $textReport);
        echo "✅ Text Report generated: {$textFile}\n";
        
        // Generate JSON report
        $jsonFile = $this->reportsDir . '/report-' . date('Y-m-d-His') . '.json';
        file_put_contents($jsonFile, json_encode($scanData, JSON_PRETTY_PRINT));
        echo "✅ JSON Report generated: {$jsonFile}\n";
        
        // Print summary
        $this->printSummary($scanData);
        
        echo "\n" . str_repeat("=", 70) . "\n";
        echo "✅ Report Generation Complete!\n\n";
        
        return true;
    }
    
    /**
     * Generate HTML report
     */
    private function generateHTMLReport($scanData)
    {
        $html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEO Audit Report - ' . htmlspecialchars($this->config['website']['name']) . '</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background: #f5f5f5;
        }
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            border-radius: 8px;
            margin-bottom: 30px;
        }
        .page-section {
            background: white;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .issue {
            padding: 10px;
            margin: 10px 0;
            border-left: 4px solid #ff6b6b;
            background: #fff5f5;
        }
        .issue.warning {
            border-left-color: #ffd43b;
            background: #fffacd;
        }
        .issue.info {
            border-left-color: #4dabf7;
            background: #e7f5ff;
        }
        .metric {
            display: inline-block;
            margin: 10px 20px 10px 0;
        }
        .metric-value {
            font-size: 24px;
            font-weight: bold;
            color: #667eea;
        }
        .metric-label {
            font-size: 12px;
            color: #666;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>' . htmlspecialchars($this->config['website']['name']) . '</h1>
        <p>SEO Audit Report - ' . date('Y-m-d H:i:s') . '</p>
    </div>';
        
        // Summary metrics
        $html .= '<div class="page-section">
        <h2>Summary</h2>
        <div class="metric">
            <div class="metric-value">' . count($scanData) . '</div>
            <div class="metric-label">Pages Scanned</div>
        </div>';
        
        $totalIssues = 0;
        foreach ($scanData as $data) {
            $totalIssues += count($data['issues'] ?? []);
        }
        
        $html .= '<div class="metric">
            <div class="metric-value">' . $totalIssues . '</div>
            <div class="metric-label">Issues Found</div>
        </div>
        </div>';
        
        // Page details
        foreach ($scanData as $route => $data) {
            $html .= '<div class="page-section">
            <h3>' . htmlspecialchars($data['service'] ?? $route) . '</h3>
            <p><strong>Route:</strong> ' . htmlspecialchars($route) . '</p>
            <p><strong>URL:</strong> ' . htmlspecialchars($data['url'] ?? '') . '</p>';
            
            if (!empty($data['issues'])) {
                $html .= '<h4>Issues (' . count($data['issues']) . ')</h4>';
                foreach ($data['issues'] as $issue) {
                    $class = $issue['severity'] ?? 'info';
                    $html .= '<div class="issue ' . htmlspecialchars($class) . '">
                    <strong>[' . strtoupper($class) . ']</strong> ' . htmlspecialchars($issue['message'] ?? '') . '
                    </div>';
                }
            } else {
                $html .= '<p>✅ No issues found</p>';
            }
            
            $html .= '</div>';
        }
        
        $html .= '</body>
</html>';
        
        return $html;
    }
    
    /**
     * Generate text report
     */
    private function generateTextReport($scanData)
    {
        $text = "SEO AUDIT REPORT\n";
        $text .= str_repeat("=", 70) . "\n";
        $text .= "Website: " . $this->config['website']['name'] . "\n";
        $text .= "Date: " . date('Y-m-d H:i:s') . "\n";
        $text .= "Location: " . $this->config['website']['location'] . "\n";
        $text .= str_repeat("=", 70) . "\n\n";
        
        $text .= "SUMMARY\n";
        $text .= "-------\n";
        $text .= "Pages Scanned: " . count($scanData) . "\n";
        
        $totalIssues = 0;
        $criticalCount = 0;
        $warningCount = 0;
        
        foreach ($scanData as $data) {
            foreach ($data['issues'] ?? [] as $issue) {
                $totalIssues++;
                if ($issue['severity'] === 'critical') {
                    $criticalCount++;
                } elseif ($issue['severity'] === 'warning') {
                    $warningCount++;
                }
            }
        }
        
        $text .= "Total Issues: " . $totalIssues . "\n";
        $text .= "  - Critical: " . $criticalCount . "\n";
        $text .= "  - Warning: " . $warningCount . "\n";
        $text .= "  - Info: " . ($totalIssues - $criticalCount - $warningCount) . "\n\n";
        
        // Detailed pages
        $text .= "DETAILED ANALYSIS\n";
        $text .= str_repeat("-", 70) . "\n\n";
        
        foreach ($scanData as $route => $data) {
            $text .= "PAGE: " . htmlspecialchars($data['service'] ?? $route) . "\n";
            $text .= "Route: " . htmlspecialchars($route) . "\n";
            $text .= "URL: " . htmlspecialchars($data['url'] ?? '') . "\n";
            $text .= "Type: " . ucfirst($data['page_type'] ?? 'unknown') . "\n";
            
            if (!empty($data['issues'])) {
                $text .= "Issues (" . count($data['issues']) . "):\n";
                foreach ($data['issues'] as $issue) {
                    $text .= "  [" . strtoupper($issue['severity'] ?? 'info') . "] " . $issue['message'] . "\n";
                }
            } else {
                $text .= "Status: ✅ No issues\n";
            }
            
            $text .= "\n";
        }
        
        $text .= str_repeat("=", 70) . "\n";
        $text .= "Report generated: " . date('Y-m-d H:i:s') . "\n";
        
        return $text;
    }
    
    /**
     * Get latest scan file
     */
    private function getLatestScanFile()
    {
        $files = glob($this->logsDir . '/scan-*.json');
        
        if (empty($files)) {
            return null;
        }
        
        usort($files, function($a, $b) {
            return filemtime($b) - filemtime($a);
        });
        
        return $files[0];
    }
    
    /**
     * Print summary to console
     */
    private function printSummary($scanData)
    {
        echo "\n📊 REPORT SUMMARY\n";
        echo str_repeat("-", 70) . "\n";
        echo "Pages Analyzed: " . count($scanData) . "\n";
        
        $totalIssues = 0;
        foreach ($scanData as $data) {
            $totalIssues += count($data['issues'] ?? []);
        }
        
        echo "Total Issues Found: " . $totalIssues . "\n";
        
        if ($totalIssues === 0) {
            echo "Status: ✅ All pages optimized!\n";
        } else {
            echo "Status: ⚠️  Review issues and optimize\n";
        }
        
        echo str_repeat("-", 70) . "\n\n";
    }
}

// Generate report
$generator = new ReportGenerator();
$generator->generateReport();

echo "🎉 Report generation complete!\n";
