@extends('layouts.app')

@section('title', 'Services')

@section('meta_description', 'KarachiCleaners offers trusted home, office and deep cleaning services in Karachi. Book professional cleaners today.')

@section('content')
        <!--Page Header Start-->
        
        <!--Page Header End-->

        <!--Services Two Start -->
        <section class="services-two services-page" style="margin-top: 185px;">
    <div class="services-two__shape-bg-1"
        style="background-image: url(assets/images/shapes/services-two-shape-bg-1.png);"></div>
    <div class="services-two__shape-bg-2"
        style="background-image: url(assets/images/shapes/services-two-shape-bg-2.png);"></div>
    <div class="services-two__shape-bg-3"
        style="background-image: url(assets/images/shapes/services-two-shape-bg-3.png);"></div>
    <div class="services-two__shape-1 float-bob-x">
        <img src="assets/images/shapes/services-two-shape-1.png" alt="">
    </div>
    <div class="services-two__shape-2 float-bob-y">
        <img src="assets/images/shapes/services-two-shape-2.png" alt="">
    </div>
    <div class="services-two__shape-3"></div>
    <div class="services-two__shape-4"></div>
    <div class="services-two__shape-5"></div>
    <div class="container">
        <div class="section-title text-center sec-title-animation animation-style1">
            <div class="section-title__tagline-box">
                <div class="section-title__tagline-shape-box">
                    <div class="section-title__tagline-shape"></div>
                    <div class="section-title__tagline-shape-2"></div>
                </div>
                <span class="section-title__tagline">Our Services</span>
            </div>
            <h2 class="section-title__title title-animation">
                Explore the Full Range of <span>House Cleaning Services</span><br>
                <span>We Offer to Keep Your Home Sparkling</span>
            </h2>
        </div>
        <div class="services-two__inner">
            <ul class="services-two__services-list list-unstyled">

                <!-- Full Home Cleaning -->
                <li class="hover-item">
                    <div class="services-two__icon-and-title-box">
                        <div class="services-two__icon"><span class="icon-oosouji"></span></div>
                        <div class="services-two__title-box">
                            <div class="services-two__count"></div>
                            <h3 class="services-two__title"><a href="full-home-cleaning.html">Full Home Cleaning</a></h3>
                        </div>
                    </div>
                    <div class="services-two__text-and-btn-box">
                        <p class="services-two__text">
                            Complete cleaning for all rooms, including living areas, bedrooms, kitchen, and bathrooms.
                        </p>
                        <div class="services-two__btn-box">
                            <a href="full-home-cleaning.html">View Details<span class="icon-diagonal-arrow"></span></a>
                        </div>
                    </div>
                    <div class="hover-item__box"><img src="assets/images/services/services-2-1.jpg" alt="Full Home Cleaning" class="hover-item__box-img"></div>
                </li>

                <!-- Kitchen Deep Cleaning -->
                <li class="hover-item">
                    <div class="services-two__icon-and-title-box">
                        <div class="services-two__icon"><span class="icon-cleaning"></span></div>
                        <div class="services-two__title-box">
                            <div class="services-two__count"></div>
                            <h3 class="services-two__title"><a href="kitchen-cleaning.html">Kitchen Deep Cleaning</a></h3>
                        </div>
                    </div>
                    <div class="services-two__text-and-btn-box">
                        <p class="services-two__text">
                            Deep cleaning of all kitchen surfaces, cabinets, appliances, and sinks for a hygienic kitchen.
                        </p>
                        <div class="services-two__btn-box">
                            <a href="kitchen-cleaning.html">View Details<span class="icon-diagonal-arrow"></span></a>
                        </div>
                    </div>
                    <div class="hover-item__box"><img src="assets/images/services/services-2-2.jpg" alt="Kitchen Cleaning" class="hover-item__box-img"></div>
                </li>

                <!-- Bathroom & Toilet Cleaning -->
                <li class="hover-item">
                    <div class="services-two__icon-and-title-box">
                        <div class="services-two__icon"><span class="icon-cleaning-products"></span></div>
                        <div class="services-two__title-box">
                            <div class="services-two__count"></div>
                            <h3 class="services-two__title"><a href="bathroom-cleaning.html">Bathroom & Toilet Cleaning</a></h3>
                        </div>
                    </div>
                    <div class="services-two__text-and-btn-box">
                        <p class="services-two__text">
                            Sanitization of toilets, sinks, showers, mirrors, and tiles for a fresh and clean bathroom.
                        </p>
                        <div class="services-two__btn-box">
                            <a href="bathroom-cleaning.html">View Details<span class="icon-diagonal-arrow"></span></a>
                        </div>
                    </div>
                    <div class="hover-item__box"><img src="assets/images/services/services-2-3.jpg" alt="Bathroom Cleaning" class="hover-item__box-img"></div>
                </li>

                <!-- Bedroom & Living Room Cleaning -->
                <li class="hover-item">
                    <div class="services-two__icon-and-title-box">
                        <div class="services-two__icon"><span class="icon-cleaning-spray"></span></div>
                        <div class="services-two__title-box">
                            <div class="services-two__count"></div>
                            <h3 class="services-two__title"><a href="bedroom-living-cleaning.html">Bedroom & Living Room Cleaning</a></h3>
                        </div>
                    </div>
                    <div class="services-two__text-and-btn-box">
                        <p class="services-two__text">
                            Dusting, vacuuming, and cleaning furniture, floors, curtains, and windows for bedrooms and living areas.
                        </p>
                        <div class="services-two__btn-box">
                            <a href="bedroom-living-cleaning.html">View Details<span class="icon-diagonal-arrow"></span></a>
                        </div>
                    </div>
                    <div class="hover-item__box"><img src="assets/images/services/services-2-4.jpg" alt="Bedroom & Living Room Cleaning" class="hover-item__box-img"></div>
                </li>

                <!-- Carpet & Rug Cleaning -->
                <li class="hover-item">
                    <div class="services-two__icon-and-title-box">
                        <div class="services-two__icon"><span class="icon-cleaning-spray"></span></div>
                        <div class="services-two__title-box">
                            <div class="services-two__count"></div>
                            <h3 class="services-two__title"><a href="carpet-rug-cleaning.html">Carpet & Rug Cleaning</a></h3>
                        </div>
                    </div>
                    <div class="services-two__text-and-btn-box">
                        <p class="services-two__text">
                            Deep cleaning of carpets and rugs to remove dirt, dust, and allergens.
                        </p>
                        <div class="services-two__btn-box">
                            <a href="carpet-rug-cleaning.html">View Details<span class="icon-diagonal-arrow"></span></a>
                        </div>
                    </div>
                    <div class="hover-item__box"><img src="assets/images/services/services-2-5.jpg" alt="Carpet & Rug Cleaning" class="hover-item__box-img"></div>
                </li>

                <!-- Sofa & Upholstery Cleaning -->
                <li class="hover-item">
                    <div class="services-two__icon-and-title-box">
                        <div class="services-two__icon"><span class="icon-cleaning-products"></span></div>
                        <div class="services-two__title-box">
                            <div class="services-two__count"></div>
                            <h3 class="services-two__title"><a href="sofa-upholstery-cleaning.html">Sofa & Upholstery Cleaning</a></h3>
                        </div>
                    </div>
                    <div class="services-two__text-and-btn-box">
                        <p class="services-two__text">
                            Professional cleaning for sofas, chairs, and cushions to remove stains and dust.
                        </p>
                        <div class="services-two__btn-box">
                            <a href="sofa-upholstery-cleaning.html">View Details<span class="icon-diagonal-arrow"></span></a>
                        </div>
                    </div>
                    <div class="hover-item__box"><img src="assets/images/services/services-2-6.jpg" alt="Sofa & Upholstery Cleaning" class="hover-item__box-img"></div>
                </li>

                <!-- Window & Glass Cleaning -->
                <li class="hover-item">
                    <div class="services-two__icon-and-title-box">
                        <div class="services-two__icon"><span class="icon-cleaning"></span></div>
                        <div class="services-two__title-box">
                            <div class="services-two__count"></div>
                            <h3 class="services-two__title"><a href="window-glass-cleaning.html">Window & Glass Cleaning</a></h3>
                        </div>
                    </div>
                    <div class="services-two__text-and-btn-box">
                        <p class="services-two__text">
                            Cleaning of all windows, mirrors, and glass surfaces for a spotless finish.
                        </p>
                        <div class="services-two__btn-box">
                            <a href="window-glass-cleaning.html">View Details<span class="icon-diagonal-arrow"></span></a>
                        </div>
                    </div>
                    <div class="hover-item__box"><img src="assets/images/services/services-2-7.jpg" alt="Window & Glass Cleaning" class="hover-item__box-img"></div>
                </li>

                <!-- Floor Cleaning & Polishing -->
                <li class="hover-item">
                    <div class="services-two__icon-and-title-box">
                        <div class="services-two__icon"><span class="icon-cleaning-spray"></span></div>
                        <div class="services-two__title-box">
                            <div class="services-two__count"></div>
                            <h3 class="services-two__title"><a href="floor-cleaning.html">Floor Cleaning & Polishing</a></h3>
                        </div>
                    </div>
                    <div class="services-two__text-and-btn-box">
                        <p class="services-two__text">
                            Tiles, marble, or wooden floors cleaned and polished for a smooth, shiny surface.
                        </p>
                        <div class="services-two__btn-box">
                            <a href="floor-cleaning.html">View Details<span class="icon-diagonal-arrow"></span></a>
                        </div>
                    </div>
                    <div class="hover-item__box"><img src="assets/images/services/services-2-8.jpg" alt="Floor Cleaning & Polishing" class="hover-item__box-img"></div>
                </li>

                <!-- Eco-Friendly / Green Cleaning -->
                <li class="hover-item">
                    <div class="services-two__icon-and-title-box">
                        <div class="services-two__icon"><span class="icon-sanitary"></span></div>
                        <div class="services-two__title-box">
                            <div class="services-two__count"></div>
                            <h3 class="services-two__title"><a href="eco-friendly-cleaning.html">Eco-Friendly / Green Cleaning</a></h3>
                        </div>
                    </div>
                    <div class="services-two__text-and-btn-box">
                        <p class="services-two__text">
                            Sustainable cleaning using safe, chemical-free products for a healthier home and planet.
                        </p>
                        <div class="services-two__btn-box">
                            <a href="eco-friendly-cleaning.html">View Details<span class="icon-diagonal-arrow"></span></a>
                        </div>
                    </div>
                    <div class="hover-item__box"><img src="assets/images/services/services-2-9.jpg" alt="Eco-Friendly Cleaning" class="hover-item__box-img"></div>
                </li>

                <!-- Post-Renovation / Move-In Cleaning -->
                <li class="hover-item">
                    <div class="services-two__icon-and-title-box">
                        <div class="services-two__icon"><span class="icon-cleaning-products"></span></div>
                        <div class="services-two__title-box">
                            <div class="services-two__count"></div>
                            <h3 class="services-two__title"><a href="post-renovation-cleaning.html">Post-Renovation / Move-In Cleaning</a></h3>
                        </div>
                    </div>
                    <div class="services-two__text-and-btn-box">
                        <p class="services-two__text">
                            Complete cleaning after renovations or moving into a new home, leaving every corner spotless.
                        </p>
                        <div class="services-two__btn-box">
                            <a href="post-renovation-cleaning.html">View Details<span class="icon-diagonal-arrow"></span></a>
                        </div>
                    </div>
                    <div class="hover-item__box"><img src="assets/images/services/services-2-10.jpg" alt="Post-Renovation Cleaning" class="hover-item__box-img"></div>
                </li>

            </ul>
        </div>
    </div>
</section>

        <!--Services Two End -->

        <!-- Sliding Text Three Start -->
        <section class="sliding-text-three">
            <div class="sliding-text-three__wrap">
                <ul class="sliding-text-three__list list-unstyled marquee_mode">
                    <li>
                        <h2 data-hover="Organizing" class="sliding-text-three__title">Organizing
                            <span class="icon-star-2"></span></h2>
                    </li>
                    <li>
                        <h2 data-hover="Sanitizing" class="sliding-text-three__title">Sanitizing
                            <span class="icon-star-2"></span></h2>
                    </li>
                    <li>
                        <h2 data-hover="Mopping" class="sliding-text-three__title">Mopping
                            <span class="icon-star-2"></span></h2>
                    </li>
                    <li>
                        <h2 data-hover="Dusting" class="sliding-text-three__title">Dusting
                            <span class="icon-star-2"></span></h2>
                    </li>
                    <li>
                        <h2 data-hover="Vacuuming" class="sliding-text-three__title">Vacuuming
                            <span class="icon-star-2"></span></h2>
                    </li>
                    <li>
                        <h2 data-hover="Polishing" class="sliding-text-three__title">Polishing
                            <span class="icon-star-2"></span></h2>
                    </li>
                </ul>
            </div>
        </section>
        <!-- Sliding Text Three End -->

@endsection