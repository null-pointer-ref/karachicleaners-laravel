#!/usr/bin/env php
<?php

/**
 * Robots.txt Generator for Karachi Cleaners
 * 
 * Generates robots.txt file following best practices:
 * - Allows search engines to crawl all public pages
 * - Disallows admin/private areas
 * - References sitemap
 * - Sets crawl delay for search bots
 * - Specifies sitemap location
 * 
 * Usage: php scripts/generate-robots.php
 */

class RobotsGenerator
{
    private $baseUrl;
    private $config;
    private $robotsPath;
    private $publicPath;
    
    public function __construct()
    {
        $this->config = require __DIR__ . '/../config/seo-config.php';
        $this->baseUrl = rtrim($this->config['website']['url'], '/');
        $this->robotsPath = __DIR__ . '/../public/robots.txt';
        $this->publicPath = __DIR__ . '/../public';
        
        // Create public directory if it doesn't exist
        if (!is_dir($this->publicPath)) {
            mkdir($this->publicPath, 0755, true);
        }
    }
    
    /**
     * Generate robots.txt file
     */
    public function generate()
    {
        echo "🤖 Generating robots.txt for: {$this->baseUrl}\n";
        echo str_repeat("=", 60) . "\n";
        
        $content = $this->generateContent();
        
        if ($this->save($content)) {
            echo "✅ robots.txt saved to: {$this->robotsPath}\n";
            echo "📊 File size: " . number_format(strlen($content)) . " bytes\n";
            echo "🔗 URL: {$this->baseUrl}/robots.txt\n";
            echo "\n";
            return true;
        }
        
        return false;
    }
    
    /**
     * Generate robots.txt content
     */
    private function generateContent()
    {
        $content = "# Robots.txt for {$this->baseUrl}\n";
        $content .= "# Generated automatically - do not edit manually\n";
        $content .= "# Generated at: " . date('Y-m-d H:i:s') . "\n";
        $content .= "\n";
        
        // =====================================================================
        // ALLOW ALL SEARCH ENGINES
        // =====================================================================
        
        $content .= "# Allow all search engines to crawl public pages\n";
        $content .= "User-agent: *\n";
        $content .= "Allow: /\n";
        $content .= "\n";
        
        // =====================================================================
        // DISALLOW PRIVATE/ADMIN AREAS
        // =====================================================================
        
        $content .= "# Disallow private and admin areas\n";
        $content .= "Disallow: /admin/\n";
        $content .= "Disallow: /api/\n";
        $content .= "Disallow: /.env\n";
        $content .= "Disallow: /config/\n";
        $content .= "Disallow: /storage/\n";
        $content .= "Disallow: /vendor/\n";
        $content .= "Disallow: /node_modules/\n";
        $content .= "Disallow: /tests/\n";
        $content .= "Disallow: /*?*\n";  // Disallow URLs with query strings
        $content .= "Disallow: /search\n";
        $content .= "Disallow: /results\n";
        $content .= "\n";
        
        // =====================================================================
        // DISALLOW DUPLICATE/STAGING CONTENT
        // =====================================================================
        
        $content .= "# Disallow staging and backup versions\n";
        $content .= "Disallow: /staging/\n";
        $content .= "Disallow: /backup/\n";
        $content .= "Disallow: /old/\n";
        $content .= "Disallow: /temp/\n";
        $content .= "Disallow: /test/\n";
        $content .= "\n";
        
        // =====================================================================
        // DISALLOW DUPLICATE FILE FORMATS
        // =====================================================================
        
        $content .= "# Disallow duplicate content formats\n";
        $content .= "Disallow: /*.pdf$\n";
        $content .= "Disallow: /*.doc$\n";
        $content .= "Disallow: /*.docx$\n";
        $content .= "\n";
        
        // =====================================================================
        // CRAWL DELAY FOR GOOGLE BOT
        // =====================================================================
        
        $content .= "# Crawl delay (in seconds) for Google bot\n";
        $content .= "User-agent: Googlebot\n";
        $content .= "Crawl-delay: 0\n";  // Google can crawl as fast as needed
        $content .= "\n";
        
        // =====================================================================
        // CRAWL DELAY FOR OTHER BOTS
        // =====================================================================
        
        $content .= "# Crawl delay for other bots (be nice to servers)\n";
        $content .= "User-agent: Bingbot\n";
        $content .= "Crawl-delay: 1\n";
        $content .= "\n";
        
        $content .= "User-agent: Slurp\n";
        $content .= "Crawl-delay: 1\n";
        $content .= "\n";
        
        // =====================================================================
        // BLOCK BAD BOTS
        // =====================================================================
        
        $content .= "# Block known bad/spam bots\n";
        $content .= "User-agent: AhrefsBot\n";
        $content .= "Disallow: /\n";
        $content .= "\n";
        
        $content .= "User-agent: SemrushBot\n";
        $content .= "Disallow: /\n";
        $content .= "\n";
        
        $content .= "User-agent: MJ12bot\n";
        $content .= "Disallow: /\n";
        $content .= "\n";
        
        // =====================================================================
        // SITEMAP LOCATION
        // =====================================================================
        
        $content .= "# Sitemap location\n";
        $content .= "Sitemap: {$this->baseUrl}/sitemap.xml\n";
        $content .= "\n";
        
        // =====================================================================
        // ADDITIONAL DIRECTIVES
        // =====================================================================
        
        $content .= "# Additional directives\n";
        $content .= "# Rate limiting handled by server\n";
        $content .= "# Cache-Control headers set in .htaccess or web.config\n";
        $content .= "\n";
        
        return $content;
    }
    
    /**
     * Save robots.txt to file
     */
    private function save($content)
    {
        try {
            file_put_contents($this->robotsPath, $content);
            return true;
        } catch (Exception $e) {
            echo "❌ Error saving robots.txt: " . $e->getMessage() . "\n";
            return false;
        }
    }
}

// Run robots.txt generation
$generator = new RobotsGenerator();
if ($generator->generate()) {
    echo "📋 robots.txt Content:\n";
    echo "   • Allows all public pages\n";
    echo "   • Disallows admin/private areas\n";
    echo "   • Blocks known spam bots\n";
    echo "   • References sitemap\n";
    echo "\n✅ robots.txt generation complete!\n";
    exit(0);
} else {
    echo "\n❌ robots.txt generation failed!\n";
    exit(1);
}
