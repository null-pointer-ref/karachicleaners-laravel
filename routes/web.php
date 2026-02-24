<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home'); // loads resources/views/home.blade.php
});

Route::get('/about', function () {
    return view('about'); // loads about.blade.php
});

// Route::get('/services', function () {
//     return view('services'); // loads services.blade.php
// });

Route::get('/gallery', function () {
    return view('gallery');
});

Route::get('/contact', function () {
    return view('contact');
});
/*
|--------------------------------------------------------------------------
| Services Listing Page (Optional but Recommended)
|--------------------------------------------------------------------------
*/

Route::get('/services', function () {

    $services = [
    'deep-cleaning' => [
        'title' => 'Deep Cleaning Services in Karachi',
        'description' => 'Professional deep cleaning services in Karachi for homes & offices. Book trusted house deep cleaning service near you with affordable pricing.',
        'icon' => 'icon-cleaning',
        'image' => 'assets/images/services/services-details-img-3.jpg',
    ],
    'sofa-cleaning' => [
        'title' => 'Sofa Cleaning Services in Karachi',
        'description' => 'Best sofa cleaning services in Karachi for stain removal, upholstery cleaning & couch deep cleaning. Affordable same-day service available.',
        'icon' => 'icon-cleaning',
        'image' => 'assets/images/blog/blog-details-points-img-1.jpg',
    ],
    'office-cleaning' => [
        'title' => 'Office Cleaning Services in Karachi',
        'description' => 'Trusted office cleaning services in Karachi for commercial buildings & corporate offices. Professional commercial cleaning company near you.',
        'icon' => 'icon-cleaning',
        'image' => 'assets/images/services/services-details-img-1.jpg',
    ],
];
    $karachiAreas = [
        'DHA Karachi',
        'Clifton',
        'Gulshan-e-Iqbal',
        'Bahria Town Karachi',
        'PECHS',
        'North Nazimabad',
        'Defence Phase 6',
        'Malir',
        'Korangi',
        'Saddar'
    ];

    return view('services', compact('services', 'karachiAreas'));

})->name('services.index');


/*
|--------------------------------------------------------------------------
| Service Detail Pages (Dynamic by Slug)
|--------------------------------------------------------------------------
*/

Route::get('/services/{slug}', function ($slug) {

    $services = [

        'deep-cleaning' => [
            'title' => 'Deep Cleaning Services in Karachi | Home & Office Experts',
            'meta_description' => 'Professional deep cleaning services in Karachi for homes & offices. Book trusted house deep cleaning service near you with affordable pricing.',
            'keywords' => 'deep cleaning services karachi, deep cleaning service, home deep cleaning services, house deep cleaning service, professional deep cleaning services, deep cleaning company karachi, house deep cleaning karachi, best deep cleaning service, karachi deep cleaning experts',
            'image' => 'assets/images/services/services-details-img-3.jpg',
        ],

        'sofa-cleaning' => [
            'title' => 'Sofa Cleaning Services in Karachi | Couch & Upholstery Experts',
            'meta_description' => 'Best sofa cleaning services in Karachi for stain removal, upholstery cleaning & couch deep cleaning. Affordable same-day service available.',
            'keywords' => 'sofa cleaning services karachi, sofa cleaning service, couch cleaning service, upholstery cleaning karachi, sofa cleaning company near me, sofa cleaning near me, couch cleaning company, professional sofa cleaning, karachi sofa cleaning experts',
            'image' => 'assets/images/blog/blog-details-points-img-1.jpg',
        ],

        'office-cleaning' => [
            'title' => 'Office Cleaning Services in Karachi | Commercial Cleaning Experts',
            'meta_description' => 'Trusted office cleaning services in Karachi for commercial buildings & corporate offices. Professional commercial cleaning company near you.',
            'keywords' => 'office cleaning services karachi, office cleaning company, commercial cleaning services, commercial office cleaning service, professional office cleaning services, corporate office cleaning, commercial cleaning karachi, office cleaning companies, karachi commercial cleaning experts',
            'image' => 'assets/images/services/services-details-img-1.jpg',
        ],

    ];

    if (!array_key_exists($slug, $services)) {
        abort(404);
    }

    $service = $services[$slug];

    return view('services.details', compact('service'));

})->name('service.details');