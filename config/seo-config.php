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
        
        '/sofa-cleaning' => [
            'service' => 'Sofa Cleaning',
            'title' => 'Sofa Cleaning',
            'description' => 'Professional sofa cleaning services in Karachi. Expert stain removal, couch cleaning, upholstery shampoo. Book same-day service.',
            'primary_keyword' => 'sofa cleaning',
            'secondary_keywords' => ['upholstery cleaning', 'furniture cleaning', 'sofa stain removal', 'fabric cleaning'],
            'page_type' => 'service',
        ],
        
        '/carpet-cleaning' => [
            'service' => 'Carpet Cleaning',
            'title' => 'Carpet Cleaning',
            'description' => 'Best carpet cleaning services in Karachi. Deep clean, stain removal, and sanitizing for all types of carpets. Affordable rates. Call now!',
            'primary_keyword' => 'carpet cleaning',
            'secondary_keywords' => ['rug cleaning', 'deep carpet clean', 'stain removal', 'carpet restoration'],
            'page_type' => 'service',
        ],
        
        '/curtain-cleaning' => [
            'service' => 'Curtain Cleaning',
            'title' => 'Curtain Cleaning',
            'description' => 'Top-rated curtain cleaning services in Karachi. We clean all types of curtains, blinds, and drapes. Remove dust, allergens, and stains.',
            'primary_keyword' => 'curtain cleaning',
            'secondary_keywords' => ['blind cleaning', 'drape cleaning', 'curtain washing', 'curtain laundry service'],
            'page_type' => 'service',
        ],
        
        '/glass-cleaning' => [
            'service' => 'Glass Cleaning',
            'title' => 'Glass Cleaning',
            'description' => 'Professional glass cleaning services in Karachi for homes and offices. Streak-free windows, glass doors, and building facades.',
            'primary_keyword' => 'glass cleaning',
            'secondary_keywords' => ['window cleaning', 'professional window cleaner', 'storefront glass cleaning'],
            'page_type' => 'service',
        ],
        
        '/floor-tile-cleaning' => [
            'service' => 'Floor & Tile Cleaning',
            'title' => 'Floor & Tile Cleaning',
            'description' => 'Expert floor and tile cleaning services in Karachi. We clean marble, tiles, grout, and all hard floors. Restore shine and hygiene.',
            'primary_keyword' => 'floor tile cleaning',
            'secondary_keywords' => ['marble floor cleaning', 'grout cleaning', 'floor polishing', 'marble polishing'],
            'page_type' => 'service',
        ],
        
        '/solar-panel-cleaning' => [
            'service' => 'Solar Panel Cleaning',
            'title' => 'Solar Panel Cleaning',
            'description' => 'Professional solar panel cleaning in Karachi. Remove dust and dirt to maximise energy output. Safe, eco-friendly cleaning solutions.',
            'primary_keyword' => 'solar panel cleaning',
            'secondary_keywords' => ['solar panel wash', 'solar panel maintenance', 'energy efficiency'],
            'page_type' => 'service',
        ],
        
        '/full-house-cleaning' => [
            'service' => 'Full House Cleaning',
            'title' => 'Full House Cleaning',
            'description' => 'Complete house cleaning services in Karachi. Deep cleaning for entire homes – bedrooms, kitchens, bathrooms, living areas. Book trusted cleaners.',
            'primary_keyword' => 'full house cleaning',
            'secondary_keywords' => ['home cleaning', 'deep cleaning', 'residential cleaning', 'complete home cleaning'],
            'page_type' => 'service',
        ],
        
        '/car-interior-cleaning' => [
            'service' => 'Car Interior Cleaning',
            'title' => 'Car Interior Cleaning',
            'description' => 'Premium car interior cleaning and detailing in Karachi. Upholstery shampoo, carpet cleaning, dashboard polishing, and odor removal.',
            'primary_keyword' => 'car interior cleaning',
            'secondary_keywords' => ['car detailing', 'car upholstery cleaning', 'car deep cleaning', 'auto cleaning'],
            'page_type' => 'service',
        ],
        
        '/services' => [
            'service' => 'Services',
            'title' => 'Cleaning Services in Karachi',
            'description' => 'Explore all professional cleaning services in Karachi. From carpet to solar panel cleaning.',
            'primary_keyword' => 'cleaning services',
            'secondary_keywords' => ['professional cleaning', 'cleaning company karachi'],
            'page_type' => 'catalog',
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
        'regions' => ['PK','IN'],  // Pakistan, South Africa, India
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
        'phone' => '+92-321-5955791',
        'email' => 'karachicleaners@gmail.com',
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
