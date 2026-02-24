@extends('layouts.app')

@section('title', $service['title'])
@section('meta_description', $service['meta_description'])
@section('meta_keywords', $service['keywords'])

@section('content')
<!--Service details Start-->
<section class="services-details" style="margin-top: 100px; margin-bottom: 100px;">
    <div class="container">
        <div class="row">

            <!-- LEFT SIDE -->
            <div class="col-xl-8 col-lg-7">
                <div class="services-details__left">

                    <h3 class="services-details__title-1">
                        Professional {{ $service['title'] }} in Karachi
                    </h3>

                    <p class="services-details__text-1">
                        We provide high-quality {{ strtolower($service['title']) }}
                        across DHA, Clifton, Gulshan-e-Iqbal, North Nazimabad,
                        PECHS, Bahria Town, Malir and Korangi.
                        Our expert team uses advanced equipment and eco-friendly
                        cleaning products to ensure 100% customer satisfaction.
                    </p>

                    <div class="services-details__img-box">
                        <div class="services-details__img">
                            <img src="{{ asset($service['image']) }}" alt="{{ $service['title'] }}">
                        </div>
                    </div>

                    <h3 class="services-details__title-2">Services Core Features</h3>

                    <p class="services-details__text-2">
                        Our {{ strtolower($service['title']) }} include dusting,
                        vacuuming, sanitizing kitchens & bathrooms, mopping,
                        organizing spaces and deep disinfection to ensure a
                        hygienic environment for your home or office.
                    </p>

                    <div class="services-details__points-box">
                        <ul class="services-details__points list-unstyled">
                            <li>
                                <div class="icon"><span class="icon-star-1"></span></div>
                                <p>Dusting and vacuuming</p>
                            </li>
                            <li>
                                <div class="icon"><span class="icon-star-1"></span></div>
                                <p>Mopping and sweeping floors</p>
                            </li>
                            <li>
                                <div class="icon"><span class="icon-star-1"></span></div>
                                <p>Commercial Cleaning</p>
                            </li>
                        </ul>

                        <ul class="services-details__points list-unstyled">
                            <li>
                                <div class="icon"><span class="icon-star-1"></span></div>
                                <p>Sanitizing kitchens and bathrooms</p>
                            </li>
                            <li>
                                <div class="icon"><span class="icon-star-1"></span></div>
                                <p>Organizing living spaces</p>
                            </li>
                            <li>
                                <div class="icon"><span class="icon-star-1"></span></div>
                                <p>Window cleaning</p>
                            </li>
                        </ul>
                    </div>

                    <h3 class="services-details__title-4">Why Choose Our Services?</h3>

                    <p class="services-details__text-4">
                        Choose us for experienced professionals, flexible
                        scheduling and reliable cleaning services across Karachi.
                    </p>
                </div>
            </div>

            <!-- RIGHT SIDE -->
            <div class="col-xl-4 col-lg-5">
                <div class="services-details__right">

                    <div class="services-details__service-list-box">
                        <h3 class="services-details__service-list-title">More Services</h3>

                        <ul class="services-details__service-list list-unstyled">

                            <li class="{{ request()->is('services/deep-cleaning') ? 'active' : '' }}">
                                <a href="{{ url('/services/deep-cleaning') }}">
                                    <span class="icon-diagonal-arrow"></span>
                                    Deep Cleaning
                                </a>
                            </li>

                            <li class="{{ request()->is('services/sofa-cleaning') ? 'active' : '' }}">
                                <a href="{{ url('/services/sofa-cleaning') }}">
                                    <span class="icon-diagonal-arrow"></span>
                                    Sofa Cleaning
                                </a>
                            </li>

                            <li class="{{ request()->is('services/office-cleaning') ? 'active' : '' }}">
                                <a href="{{ url('/services/office-cleaning') }}">
                                    <span class="icon-diagonal-arrow"></span>
                                    Office Cleaning
                                </a>
                            </li>

                        </ul>
                    </div>

                    <div class="project-details__get-touch">

                        <div class="project-details__get-touch-img-1">
                            <img src="{{ asset('assets/images/project/project-details-get-touch-img-1.jpg') }}" alt="">
                        </div>

                        <h3 class="project-details__get-touch-title">
                            Feel free to reach out to us anytime.
                        </h3>

                        <div class="project-details__get-touch-btn-box">
                            <a href="{{ url('/contact') }}" class="thm-btn">
                                Contact Us
                                <span><i class="icon-diagonal-arrow"></i></span>
                            </a>
                        </div>

                        <div class="project-details__call-box">
                            <div class="project-details__call-icon">
                                <span class="icon-support"></span>
                            </div>
                            <div class="project-details__call-content">
                                <p>Call Us To Take this service</p>
                                <a href="tel:+923001234567">+92 300 1234567</a>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
<!--Services Details End-->

@endsection