#!/usr/bin/env php
<?php

/**
 * Sitemap Generator for Karachi Cleaners
 * 
 * Generates sitemap.xml from actual routes and cleaning services
 * Reads from config/cleaning-services.php
 */

class SitemapGenerator
{
    private $baseUrl = 'https://karachicleaners.com';
    private $outputPath = __DIR__ . '/../public/sitemap.xml';
    private $cleaningServices = [];
    
    public function __construct()
    {
        // Load cleaning services config
        $configPath = __DIR__ . '/../config/cleaning-services.php';
        
        if (!file_exists($configPath)) {
            throw new Exception("Config file not found: $configPath");
        }
        
        $this->cleaningServices = require $configPath;
    }
    
    /**
     * Generate the sitemap
     */
    public function generate()
    {
        echo "🗺️  Generating sitemap.xml...\n";
        
        // Create the XML
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"></urlset>');
        
        // Add static pages
        $staticPages = [
            '/' => ['priority' => 0.9, 'changefreq' => 'monthly', 'label' => 'Home'],
            '/about' => ['priority' => 0.7, 'changefreq' => 'monthly', 'label' => 'About'],
            '/services' => ['priority' => 0.85, 'changefreq' => 'weekly', 'label' => 'Services'],
            '/gallery' => ['priority' => 0.6, 'changefreq' => 'weekly', 'label' => 'Gallery'],
            '/contact' => ['priority' => 0.9, 'changefreq' => 'monthly', 'label' => 'Contact'],
            '/blog' => ['priority' => 0.6, 'changefreq' => 'weekly', 'label' => 'Blog'],
        ];
        
        echo "\n📄 Adding Static Pages:\n";
        foreach ($staticPages as $route => $data) {
            $this->addUrl($xml, $route, $data['priority'], $data['changefreq']);
            echo "   ✅ {$data['label']} ($route)\n";
        }
        
        // Add service pages from config
        echo "\n🔧 Adding Service Pages:\n";
        foreach ($this->cleaningServices as $slug => $service) {
            $route = '/services/' . $slug;
            $this->addUrl($xml, $route, 0.8, 'weekly');
            echo "   ✅ {$service['name']} ($route)\n";
        }
        
        // Save the XML
        $this->saveXml($xml);
        
        echo "\n✅ Sitemap generated successfully!\n";
        echo "📊 Total URLs: " . count($xml->url) . "\n";
        echo "💾 Saved to: {$this->outputPath}\n";
        
        return true;
    }
    
    /**
     * Add a URL to the sitemap
     */
    private function addUrl($xml, $path, $priority = 0.5, $changefreq = 'weekly')
    {
        $url = $xml->addChild('url');
        $url->addChild('loc', $this->baseUrl . $path);
        $url->addChild('lastmod', date('Y-m-d'));
        $url->addChild('changefreq', $changefreq);
        $url->addChild('priority', number_format($priority, 1));
    }
    
    /**
     * Save the XML to file
     */
    private function saveXml($xml)
    {
        // Ensure public directory exists
        $publicDir = dirname($this->outputPath);
        if (!is_dir($publicDir)) {
            mkdir($publicDir, 0755, true);
        }
        
        // Format the XML nicely
        $dom = new DOMDocument('1.0', 'UTF-8');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($xml->asXML());
        
        // Save to file
        $dom->save($this->outputPath);
        
        // Verify
        if (!file_exists($this->outputPath)) {
            throw new Exception("Failed to save sitemap: {$this->outputPath}");
        }
    }
}

// Run the generator
try {
    $generator = new SitemapGenerator();
    $generator->generate();
    echo "\n🎉 Sitemap generation complete!\n\n";
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
    exit(1);
}