<?php

/**
 * SEO Automation Configuration
 * Location: config/seo-config.php
 */

return [
    
    // =====================================================================
    // API CONFIGURATION
    // =====================================================================
    
    'api' => [
        'claude_api_key' => env('CLAUDE_API_KEY'),
        'claude_model' => 'claude-3-5-haiku-20241022',
        'claude_max_tokens' => 1000,
        'timeout' => 30,
    ],
    
    // =====================================================================
    // WEBSITE CONFIGURATION
    // =====================================================================
    
    'website' => [
        'name' => 'Karachi Cleaners',
        'url' => env('APP_URL', 'https://karachicleaners.com'),
        'location' => 'Karachi, Pakistan',
        'timezone' => 'Asia/Karachi',
        'language' => 'en-PK',
    ],
    
    // =====================================================================
    // PAGES TO SCAN & OPTIMIZE
    // =====================================================================
    
    'pages' => [
        
        '/carpet-cleaning' => [
            'service' => 'Carpet Cleaning',
            'title' => 'Professional Carpet Cleaning in Karachi',
            'description' => 'Expert carpet cleaning service',
            'primary_keyword' => 'carpet cleaning',
            'secondary_keywords' => ['rug cleaning', 'deep carpet clean', 'stain removal', 'carpet restoration'],
            'page_type' => 'service',
        ],
        
        '/sofa-cleaning' => [
            'service' => 'Sofa Cleaning',
            'title' => 'Best Sofa Cleaning Services in Karachi',
            'description' => 'Professional sofa and upholstery cleaning',
            'primary_keyword' => 'sofa cleaning',
            'secondary_keywords' => ['upholstery cleaning', 'furniture cleaning', 'sofa stain removal', 'fabric cleaning'],
            'page_type' => 'service',
        ],
        
        '/deep-cleaning' => [
            'service' => 'Deep Cleaning',
            'title' => 'Deep Home & Office Cleaning Services Karachi',
            'description' => 'Comprehensive deep cleaning for homes and offices',
            'primary_keyword' => 'deep cleaning',
            'secondary_keywords' => ['home deep clean', 'office deep cleaning', 'thorough cleaning', 'move-out cleaning'],
            'page_type' => 'service',
        ],
        
        '/office-cleaning' => [
            'service' => 'Office Cleaning',
            'title' => 'Professional Office Cleaning Services Karachi',
            'description' => 'Expert office and commercial cleaning',
            'primary_keyword' => 'office cleaning',
            'secondary_keywords' => ['commercial cleaning', 'workspace cleaning', 'corporate cleaning'],
            'page_type' => 'service',
        ],
        
        '/window-cleaning' => [
            'service' => 'Window Cleaning',
            'title' => 'Professional Window Cleaning in Karachi',
            'description' => 'Expert window and glass cleaning',
            'primary_keyword' => 'window cleaning',
            'secondary_keywords' => ['glass cleaning', 'window washing', 'professional window cleaner'],
            'page_type' => 'service',
        ],
        
        '/about' => [
            'service' => 'About Us',
            'title' => 'About Karachi Cleaners | Professional Cleaning Services',
            'description' => 'Learn about our professional cleaning team',
            'primary_keyword' => 'about cleaning service',
            'secondary_keywords' => ['professional cleaners', 'trusted cleaning company', 'experienced team'],
            'page_type' => 'info',
        ],
        
        '/contact' => [
            'service' => 'Contact',
            'title' => 'Contact Karachi Cleaners | Get Cleaning Quote',
            'description' => 'Book cleaning services online or call us',
            'primary_keyword' => 'contact cleaning service',
            'secondary_keywords' => ['book cleaning', 'schedule service', 'get quote'],
            'page_type' => 'conversion',
        ],
        
        '/blog' => [
            'service' => 'Blog',
            'title' => 'Cleaning Tips & Articles | Karachi Cleaners Blog',
            'description' => 'Expert cleaning tips and industry articles',
            'primary_keyword' => 'cleaning tips',
            'secondary_keywords' => ['how to clean', 'cleaning guide', 'home care tips'],
            'page_type' => 'blog',
        ],
    ],
    
    // =====================================================================
    // SEO FIELDS TO OPTIMIZE
    // =====================================================================
    
    'seo_fields' => [
        'title',
        'meta_description',
        'meta_keywords',
        'og_title',
        'og_description',
        'og_image',
        'twitter_title',
        'twitter_description',
        'twitter_image',
        'schema_markup',
    ],
    
    // =====================================================================
    // CHARACTER LIMITS (SEO BEST PRACTICES)
    // =====================================================================
    
    'character_limits' => [
        'title' => [
            'min' => 30,
            'max' => 60,
            'ideal' => 50,
        ],
        'meta_description' => [
            'min' => 120,
            'max' => 160,
            'ideal' => 155,
        ],
        'meta_keywords' => [
            'min' => 20,
            'max' => 160,
            'count' => [5, 8],  // 5-8 keywords
        ],
        'og_title' => [
            'max' => 65,
        ],
        'og_description' => [
            'min' => 100,
            'max' => 130,
        ],
        'twitter_description' => [
            'max' => 200,
        ],
    ],
    
    // =====================================================================
    // OPTIMIZATION RULES
    // =====================================================================
    
    'optimization_rules' => [
        
        // Title rules
        'title' => [
            'include_primary_keyword' => true,
            'include_brand_name' => true,
            'include_location' => true,
            'include_action_word' => true,
            'avoid_keywords' => ['Click Here', 'Read More'],
        ],
        
        // Meta Description rules
        'meta_description' => [
            'include_primary_keyword' => true,
            'include_location' => true,
            'include_cta' => true,
            'start_with_action_verb' => true,
        ],
        
        // Content rules
        'content' => [
            'keyword_density' => [1, 3],  // 1-3% keyword density
            'include_long_tail_variations' => true,
            'include_local_references' => true,
            'include_trending_topics' => true,
            'minimum_word_count' => 300,
            'use_headings' => true,
            'use_lists' => true,
        ],
        
        // Social media rules
        'social' => [
            'og_image_required' => true,
            'twitter_card_type' => 'summary_large_image',
            'include_hashtags' => true,
            'include_emoji' => true,
        ],
        
        // Schema markup
        'schema' => [
            'include_organization' => true,
            'include_service_schema' => true,
            'include_local_business' => true,
            'include_breadcrumb' => true,
        ],
    ],
    
    // =====================================================================
    // TRENDING TOPICS CONFIGURATION
    // =====================================================================
    
    'trending' => [
        'enabled' => true,
        'check_frequency' => 'weekly',
        'regions' => ['PK', 'ZA', 'IN'],  // Pakistan, South Africa, India
        'update_content' => true,
        'trending_keywords' => [
            'eco-friendly cleaning',
            'sustainable practices',
            'health and hygiene',
            'chemical-free cleaning',
            'professional services',
            'time-saving solutions',
        ],
    ],
    
    // =====================================================================
    // LOCAL SEO CONFIGURATION
    // =====================================================================
    
    'local_seo' => [
        'business_name' => 'Karachi Cleaners',
        'phone' => '+92-XXX-XXXXXXX',
        'email' => 'contact@karachicleaners.com',
        'address' => 'Karachi, Pakistan',
        'city' => 'Karachi',
        'country' => 'Pakistan',
        'latitude' => 24.8607,
        'longitude' => 67.0011,
        'service_areas' => [
            'North Karachi',
            'South Karachi',
            'East Karachi',
            'West Karachi',
            'Defense, Karachi',
            'DHA, Karachi',
        ],
    ],
    
    // =====================================================================
    // AUTOMATION & SCHEDULING
    // =====================================================================
    
    'automation' => [
        'enabled' => true,
        'schedule' => '0 2 * * 1',  // Every Monday at 2 AM UTC (7:30 AM PKT)
        'scan_frequency' => 'weekly',
        'auto_commit' => true,
        'create_pull_requests' => true,
        'require_manual_review' => true,
        'max_changes_per_run' => 20,
    ],
    
    // =====================================================================
    // STORAGE & LOGGING
    // =====================================================================
    
    'storage' => [
        'logs_directory' => storage_path('seo-logs'),
        'backup_directory' => storage_path('seo-backups'),
        'report_directory' => storage_path('seo-reports'),
        'log_retention_days' => 30,
        'save_scans' => true,
        'save_reports' => true,
    ],
    
    // =====================================================================
    // NOTIFICATION SETTINGS
    // =====================================================================
    
    'notifications' => [
        'enabled' => true,
        'channels' => ['mail', 'slack'],
        'email' => env('SEO_NOTIFICATION_EMAIL', 'admin@karachicleaners.com'),
        'slack_webhook' => env('SLACK_WEBHOOK_URL'),
        'notify_on_complete' => true,
        'notify_on_error' => true,
    ],
    
    // =====================================================================
    // AI OPTIMIZATION PROMPTS
    // =====================================================================
    
    'prompts' => [
        'system_prompt' => 'You are an expert SEO copywriter specializing in local service businesses, particularly cleaning services in Pakistan. Your task is to optimize website content for maximum search visibility while maintaining natural, engaging copy that converts visitors into customers.',
        
        'optimization_prompt' => 'Optimize the following page for SEO while maintaining natural language and brand voice. Consider trending topics, location-based keywords, and user intent.',
        
        'content_prompt' => 'Generate engaging, keyword-optimized content additions that incorporate trending topics and local references while maintaining 2-3 sentences per addition.',
    ],
    
    // =====================================================================
    // KEYWORDS DATABASE
    // =====================================================================
    
    'keywords_file' => base_path('resources/keywords.csv'),
    
];
