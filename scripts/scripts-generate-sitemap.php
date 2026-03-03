#!/usr/bin/env php
<?php

/**
 * Sitemap Generator for Karachi Cleaners
 * 
 * Generates XML sitemap following Google sitemap standards
 * - Last modified dates from file timestamps
 * - Change frequency based on page type
 * - Priority based on page importance
 * - Max 50,000 URLs per file (not needed for small sites)
 * 
 * Usage: php scripts/generate-sitemap.php
 */

class SitemapGenerator
{
    private $baseUrl;
    private $config;
    private $pages = [];
    private $sitemapPath;
    private $publicPath;
    
    public function __construct()
    {
        $this->config = require __DIR__ . '/../config/seo-config.php';
        $this->baseUrl = rtrim($this->config['website']['url'], '/');
        $this->sitemapPath = __DIR__ . '/../public/sitemap.xml';
        $this->publicPath = __DIR__ . '/../public';
        
        // Create public directory if it doesn't exist
        if (!is_dir($this->publicPath)) {
            mkdir($this->publicPath, 0755, true);
        }
    }
    
    /**
     * Generate complete sitemap with all pages
     */
    public function generate()
    {
        echo "🗺️  Generating Sitemap for: {$this->baseUrl}\n";
        echo str_repeat("=", 60) . "\n";
        
        // Collect all pages
        $this->collectPages();
        
        // Validate pages
        if (empty($this->pages)) {
            echo "❌ Error: No pages found to include in sitemap\n";
            return false;
        }
        
        echo "✅ Found " . count($this->pages) . " pages\n";
        
        // Generate XML
        $xml = $this->generateXml();
        
        // Save sitemap
        if ($this->saveSitemap($xml)) {
            echo "✅ Sitemap saved to: {$this->sitemapPath}\n";
            echo "📊 Sitemap size: " . number_format(strlen($xml)) . " bytes\n";
            echo "🔗 URL: {$this->baseUrl}/sitemap.xml\n";
            echo "\n";
            return true;
        }
        
        return false;
    }
    
    /**
     * Collect all pages from configuration
     */
    private function collectPages()
    {
        $configPages = $this->config['pages'] ?? [];
        
        foreach ($configPages as $route => $pageConfig) {
            $this->pages[] = [
                'loc' => $this->baseUrl . $route,
                'lastmod' => $this->getLastModified($route),
                'changefreq' => $this->getChangeFrequency($pageConfig),
                'priority' => $this->getPriority($pageConfig),
                'route' => $route,
            ];
        }
        
        // Sort by priority (descending)
        usort($this->pages, function($a, $b) {
            return $b['priority'] <=> $a['priority'];
        });
    }
    
    /**
     * Get last modified date for page
     */
    private function getLastModified($route)
    {
        // Try to find corresponding view file
        $viewFile = $this->publicPath . '/' . trim($route, '/') . '/index.html';
        
        if (file_exists($viewFile)) {
            return date('Y-m-d', filemtime($viewFile));
        }
        
        // Default to today
        return date('Y-m-d');
    }
    
    /**
     * Get change frequency based on page type
     */
    private function getChangeFrequency($pageConfig)
    {
        $pageType = $pageConfig['page_type'] ?? 'service';
        
        $frequencies = [
            'service' => 'weekly',      // Service pages updated regularly
            'blog' => 'weekly',         // Blog posts updated regularly
            'conversion' => 'monthly',  // Contact/pricing pages change less
            'info' => 'monthly',        // About/FAQ pages stable
            'landing' => 'monthly',     // Landing pages stable
        ];
        
        return $frequencies[$pageType] ?? 'weekly';
    }
    
    /**
     * Get priority based on page type and business logic
     */
    private function getPriority($pageConfig)
    {
        $pageType = $pageConfig['page_type'] ?? 'service';
        $route = $pageConfig['route'] ?? '';
        
        // Priority mapping
        $priorities = [
            'service' => 0.8,    // Service pages are important
            'conversion' => 0.9, // Contact/booking is highest priority
            'blog' => 0.6,       // Blog secondary
            'info' => 0.7,       // About/info pages
            'landing' => 0.85,   // Landing pages high priority
        ];
        
        $priority = $priorities[$pageType] ?? 0.5;
        
        // Boost homepage priority
        if ($route === '/' || $route === '/index') {
            $priority = 1.0;
        }
        
        return $priority;
    }
    
    /**
     * Generate XML sitemap content
     */
    private function generateXml()
    {
        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"' . "\n";
        $xml .= '         xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"' . "\n";
        $xml .= '         xmlns:mobile="http://www.google.com/schemas/sitemap-mobile/1.0">' . "\n";
        
        // Add pages
        foreach ($this->pages as $page) {
            $xml .= $this->generateUrlElement($page);
        }
        
        $xml .= '</urlset>' . "\n";
        
        return $xml;
    }
    
    /**
     * Generate single URL element
     */
    private function generateUrlElement($page)
    {
        $url = "\t<url>\n";
        $url .= "\t\t<loc>" . htmlspecialchars($page['loc'], ENT_XML1, 'UTF-8') . "</loc>\n";
        $url .= "\t\t<lastmod>" . $page['lastmod'] . "</lastmod>\n";
        $url .= "\t\t<changefreq>" . $page['changefreq'] . "</changefreq>\n";
        $url .= "\t\t<priority>" . $page['priority'] . "</priority>\n";
        $url .= "\t</url>\n";
        
        return $url;
    }
    
    /**
     * Save sitemap to file
     */
    private function saveSitemap($xml)
    {
        try {
            file_put_contents($this->sitemapPath, $xml);
            return true;
        } catch (Exception $e) {
            echo "❌ Error saving sitemap: " . $e->getMessage() . "\n";
            return false;
        }
    }
    
    /**
     * Get sitemap statistics
     */
    public function getStats()
    {
        return [
            'total_urls' => count($this->pages),
            'base_url' => $this->baseUrl,
            'path' => $this->sitemapPath,
            'pages' => $this->pages,
        ];
    }
}

// Run sitemap generation
$generator = new SitemapGenerator();
if ($generator->generate()) {
    $stats = $generator->getStats();
    echo "📋 Sitemap Details:\n";
    echo "   • Total URLs: " . $stats['total_urls'] . "\n";
    echo "   • Base URL: " . $stats['base_url'] . "\n";
    echo "   • Path: " . $stats['path'] . "\n";
    echo "\n✅ Sitemap generation complete!\n";
    exit(0);
} else {
    echo "\n❌ Sitemap generation failed!\n";
    exit(1);
}
