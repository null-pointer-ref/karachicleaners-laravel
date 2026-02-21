@extends('layouts.app')

@section('title', 'About')
@section('meta_description', 'Learn more about Karachi Cleaners and our professional cleaning services in Karachi.')

@section('content')

        <!--Page Header Start-->
         <!-- <section class="page-header">
            <div class="page-header__bg" style="background-image: url(assets/images/backgrounds/page-header-bg.jpg);">
            </div>
            <div class="page-header__social">
                <a href="#">LinkedIn</a>
                <a href="#">Pinterest</a>
                <a href="#">twitter-x</a>
                <a href="#">facebook</a>
            </div>
            <div class="container">
                <div class="page-header__inner">
                    <div class="page-header__img-1">
                        <img src="assets/images/resources/page-header-img-1.jpg" alt="">
                    </div>
                    <h2>About Us</h2>
                    <div class="thm-breadcrumb__box">
                        <ul class="thm-breadcrumb list-unstyled">
                            <li><a href="index.html">Home</a></li>
                            <li><span class="icon-arrow-right"></span></li>
                            <li>About Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section> -->
        <!--Page Header End-->

        <!--About Two Start -->
 <section class="about-two about-page" style="margin-top: 100px;">
    <div class="about-two__shape-1 float-bob-y">
        <img src="assets/images/shapes/about-two-shape-1.png" alt="">
    </div>
    <div class="about-two__shape-2 rotate-me">
        <img src="assets/images/shapes/about-two-shape-2.png" alt="">
    </div>
    <div class="about-two__shape-3 img-bounce">
        <img src="assets/images/shapes/about-two-shape-3.png" alt="">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="about-two__left">
                    <div class="about-two__img-shape-1 img-bounce"></div>
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                            <div class="about-two__left-img-box">
                                <div class="about-two__img-1">
                                    <img src="assets/images/resources/about-two-img-1.jpg" alt="">
                                </div>
                                <div class="about-two__img-2">
                                    <img src="assets/images/resources/about-two-img-2.jpg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                            <div class="about-two__left-img-box-2">
                                <div class="about-two__img-3">
                                    <img src="assets/images/resources/about-two-img-3.jpg" alt="">
                                </div>
                                <div class="about-two__img-4">
                                    <img src="assets/images/resources/about-two-img-4.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="about-two__right">
                    <div class="section-title text-left sec-title-animation animation-style2">
                        <div class="section-title__tagline-box">
                            <div class="section-title__tagline-shape-box">
                                <div class="section-title__tagline-shape"></div>
                                <div class="section-title__tagline-shape-2"></div>
                            </div>
                            <span class="section-title__tagline">About Us</span>
                        </div>
                        <h2 class="section-title__title title-animation">
                            Karachi Cleaners: <span>Professional Cleaning Services</span><br>
                            <span>Dedicated to Excellence & Customer Satisfaction</span>
                        </h2>
                    </div>
                    <p class="about-two__text">
                        At Karachi Cleaners, we provide top-quality cleaning services for homes and businesses. 
                        Our goal is to create clean, safe, and comfortable spaces that enhance your everyday life.
                    </p>
                    <div class="about-two__experience-and-counter">
                        <div class="about-two__counter">
                            <ul class="about-two__counter-list list-unstyled">
                                <li>
                                    <div class="about-two__counter-single">
                                        <div class="about-two__counter-count">
                                            <h3 class="odometer" data-count="25">00</h3>
                                            <span>+</span>
                                        </div>
                                        <p>Years of Experience</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="about-two__counter-single">
                                        <div class="about-two__counter-count">
                                            <h3 class="odometer" data-count="98">00</h3>
                                            <span>%</span>
                                        </div>
                                        <p>Happy Customers</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="about-two__counter-single">
                                        <div class="about-two__counter-count">
                                            <h3 class="odometer" data-count="198">00</h3>
                                            <span>+</span>
                                        </div>
                                        <p>Projects Completed</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="about-two__points-and-mission-box">
                        <ul class="about-two__points list-unstyled d-flex flex-wrap">
    <li class="col-6">
        <div class="icon"><span class="icon-check"></span></div>
        <p>Deliver top-quality cleaning services</p>
    </li>
    <li class="col-6">
        <div class="icon"><span class="icon-check"></span></div>
        <p>Ensure complete customer satisfaction</p>
    </li>
    <li class="col-6">
        <div class="icon"><span class="icon-check"></span></div>
        <p>Create healthy, hygienic, spotless environments</p>
    </li>
    <li class="col-6">
        <div class="icon"><span class="icon-check"></span></div>
        <p>Use eco-friendly and safe cleaning solutions</p>
    </li>
</ul>

                        <div class="about-two__mission-box">
                            <div class="about-two__mission-icon">
                                <span class="icon-target"></span>
                            </div>
                            <h3 class="about-two__mission-title">Our Mission & Vision</h3>
                            <p class="about-two__mission-text">
                                To provide professional, reliable, and eco-friendly cleaning services 
                                that exceed customer expectations and create spotless spaces.
                            </p>
                        </div>
                    </div>
                    <div class="about-two__btn-and-contact">
                        <div class="about-two__btn-box">
                            <a href="about.html" class="thm-btn">
                                Know More<span><i class="icon-diagonal-arrow"></i></span>
                            </a>
                        </div>
                        <div class="about-two__contact-box">
                            <div class="about-two__contact-icon">
                                <span class="icon-customer-service"></span>
                            </div>
                            <div class="about-two__contact-content">
                                <p>Mon - Sat: 10:00 AM - 8:00 PM</p>
                                <h4><a href="tel:120045678910">12 (00) 456 78910</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

        <!--About Two End -->

        <!--Why Choose Four Start -->
        <section class="why-choose-four">
    <div class="why-choose-four__bg"
        style="background-image: url(assets/images/backgrounds/why-choose-four-bg.jpg);"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-5">
                <div class="why-choose-four__left">
                    <div class="why-choose-four__img-box">
                        <div class="why-choose-four__img">
                            <img src="assets/images/resources/why-choose-four-img-1.jpg" alt="">
                        </div>
                        <div class="why-choose-four__img why-choose-four__img--two">
                            <img src="assets/images/resources/why-choose-four-img-2.jpg" alt="">
                        </div>
                        <div class="why-choose-four__client-info-box">
                            <div class="why-choose-four__client-ratting-box">
                                <h3 class="why-choose-four__client-title">Karachi <span>Cleaners</span></h3>
                                <div class="why-choose-four__ratting-box">
                                    <div class="why-choose-four__ratting">
                                        <span class="icon-star"></span>
                                        <span class="icon-star"></span>
                                        <span class="icon-star"></span>
                                        <span class="icon-star"></span>
                                        <span class="icon-star"></span>
                                    </div>
                                    <p class="why-choose-four__ratting-text">4.8 Rating</p>
                                </div>
                            </div>
                            <div class="why-choose-four__client-img-and-count">
                                <ul class="why-choose-four__client-img-list list-unstyled">
                                    <li>
                                        <div class="why-choose-four__client-img">
                                            <img src="assets/images/resources/why-choose-four-client-img-1.jpg" alt="">
                                        </div>
                                    </li>
                                    <li>
                                        <div class="why-choose-four__client-img">
                                            <img src="assets/images/resources/why-choose-four-client-img-2.jpg" alt="">
                                        </div>
                                    </li>
                                    <li>
                                        <div class="why-choose-four__client-img">
                                            <img src="assets/images/resources/why-choose-four-client-img-3.jpg" alt="">
                                        </div>
                                    </li>
                                </ul>
                                <div class="why-choose-four__count-box-inner">
                                    <div class="why-choose-four__count-box">
                                        <p class="odometer" data-count="500">00</p>
                                        <span>+</span>
                                    </div>
                                    <p class="why-choose-four__count-text">Satisfied Clients</p>
                                </div>
                            </div>
                            <div class="why-choose-four__client-contact">
                                <div class="why-choose-four__client-contact-icon">
                                    <img src="assets/images/icon/why-choose-four-client-contact-icon.png" alt="">
                                </div>
                                <div class="why-choose-four__client-contact-content">
                                    <p>Mon - Sat: 9:00 AM - 7:00 PM</p>
                                    <h4><a href="tel:+922100456789">+92 210 045 6789</a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-7">
                <div class="why-choose-four__right">
                    <div class="section-title text-left sec-title-animation animation-style2">
                        <div class="section-title__tagline-box">
                            <div class="section-title__tagline-shape-box">
                                <div class="section-title__tagline-shape"></div>
                                <div class="section-title__tagline-shape-2"></div>
                            </div>
                            <span class="section-title__tagline">Why Choose Karachi Cleaners</span>
                        </div>
                        <h2 class="section-title__title title-animation">
                            Pristine Spaces, Professional Care, Trusted Service
                        </h2>
                    </div>
                    <p class="why-choose-four__text">
                        At Karachi Cleaners, we specialize in delivering spotless, hygienic spaces with reliable service. 
                        Our experienced team ensures your environment remains fresh, healthy, and welcoming.
                    </p>
                    <div class="why-choose-four__award-box">
                        <div class="why-choose-four__award-icon">
                            <img src="assets/images/icon/why-choose-four-award-icon.png" alt="">
                        </div>
                        <div class="why-choose-four__award-content">
                            <h3><span class="odometer" data-count="30">00</span><span>+</span> Awards Won</h3>
                            <p class="why-choose-four__award-text">Recognized for Excellence and Quality Service</p>
                        </div>
                    </div>
                    <div class="why-choose-four__points-box">
                        <ul class="why-choose-four__points-list list-unstyled">
                            <li>
                                <div class="icon"><span class="icon-star-1"></span></div>
                                <p>Eco-Friendly Cleaning Solutions</p>
                            </li>
                            <li>
                                <div class="icon"><span class="icon-star-1"></span></div>
                                <p>Customized Cleaning Plans</p>
                            </li>
                            <li>
                                <div class="icon"><span class="icon-star-1"></span></div>
                                <p>Professional and Trained Staff</p>
                            </li>
                            <li>
                                <div class="icon"><span class="icon-star-1"></span></div>
                                <p>Reliable & On-Time Service</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

        <!--Why Choose Four End -->

        <!--Process One Start -->
    <section class="process-one">
    <div class="process-one__shape-1 float-bob-x">
        <img src="assets/images/shapes/process-one-shape-1.png" alt="">
    </div>
    <div class="process-one__shape-2 float-bob-y">
        <img src="assets/images/shapes/process-one-shape-2.png" alt="">
    </div>
    <div class="container">
        <div class="section-title text-center sec-title-animation animation-style1">
            <div class="section-title__tagline-box">
                <div class="section-title__tagline-shape-box">
                    <div class="section-title__tagline-shape"></div>
                    <div class="section-title__tagline-shape-2"></div>
                </div>
                <span class="section-title__tagline">Our Process</span>
            </div>
            <h2 class="section-title__title title-animation">
                Seamless Cleaning <span>From Booking</span><br><span>to Sparkling Spaces</span>
            </h2>
        </div>
        <div class="process-one__inner">
            <ul class="row list-unstyled">
                <!--Process One Single Start-->
                <li class="col-xl-3 col-lg-6 col-md-6">
                    <div class="process-one__single">
                        <div class="process-one__single-shape-1">
                            <img src="assets/images/shapes/process-one-single-shape-1.png" alt="">
                        </div>
                        <h3 class="process-one__title">Book Your Service</h3>
                        <p class="process-one__text">
                            Choose your preferred cleaning service and schedule easily<br>
                            through our simple and user-friendly platform.
                        </p>
                        <div class="process-one__icon">
                            <span class="icon-time"></span>
                            <div class="process-one__count"></div>
                        </div>
                    </div>
                </li>
                <!--Process One Single End-->
                <!--Process One Single Start-->
                <li class="col-xl-3 col-lg-6 col-md-6">
                    <div class="process-one__single">
                        <div class="process-one__single-shape-1">
                            <img src="assets/images/shapes/process-one-single-shape-2.png" alt="">
                        </div>
                        <h3 class="process-one__title">Confirm Date & Time</h3>
                        <p class="process-one__text">
                            We coordinate with you to finalize the most convenient<br>
                            date and time for our professional cleaning team.
                        </p>
                        <div class="process-one__icon">
                            <span class="icon-cleaning-1"></span>
                            <div class="process-one__count"></div>
                        </div>
                    </div>
                </li>
                <!--Process One Single End-->
                <!--Process One Single Start-->
                <li class="col-xl-3 col-lg-6 col-md-6">
                    <div class="process-one__single">
                        <div class="process-one__single-shape-1">
                            <img src="assets/images/shapes/process-one-single-shape-3.png" alt="">
                        </div>
                        <h3 class="process-one__title">Our Team Arrives</h3>
                        <p class="process-one__text">
                            Our trained professionals arrive on time, fully equipped<br>
                            to handle every cleaning task with precision and care.
                        </p>
                        <div class="process-one__icon">
                            <span class="icon-kitchen"></span>
                            <div class="process-one__count"></div>
                        </div>
                    </div>
                </li>
                <!--Process One Single End-->
                <!--Process One Single Start-->
                <li class="col-xl-3 col-lg-6 col-md-6">
                    <div class="process-one__single">
                        <div class="process-one__single-shape-1">
                            <img src="assets/images/shapes/process-one-single-shape-4.png" alt="">
                        </div>
                        <h3 class="process-one__title">Sparkling Clean!</h3>
                        <p class="process-one__text">
                            Experience spotless results! We complete the cleaning<br>
                            efficiently and leave your space fresh and sparkling.
                        </p>
                        <div class="process-one__icon">
                            <span class="icon-vacuum"></span>
                            <div class="process-one__count"></div>
                        </div>
                    </div>
                </li>
                <!--Process One Single End-->
            </ul>
        </div>
    </div>
</section>

@endsection