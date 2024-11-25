@extends('website.layouts.master')
@section('title', __('website/pages/about.about_page'))

@section('main-content')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0">
                    <a href="index.html">{{ __('website/pages/about.home') }}</a>
                    <span class="mx-2 mb-0">/</span>
                    <strong class="text-black">{{ __('website/pages/about.about') }}</strong>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section border-bottom" data-aos="fade">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-6">
                    <div class="block-16">
                        <figure>
                            <img src="{{ asset('assets/images/blog_1.jpg') }}" alt="Image placeholder" class="img-fluid rounded">
                            <a href="https://vimeo.com/channels/staffpicks/93951774" class="play-button popup-vimeo">
                                <span class="ion-md-play"></span>
                            </a>
                        </figure>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5">
                    <div class="site-section-heading pt-3 mb-4">
                        <h2 class="text-black">{{ __('website/pages/about.how_we_started') }}</h2>
                    </div>
                    <p>{{ __('website/pages/about.how_we_started_description') }}</p>
                    <p>{{ __('website/pages/about.accusantium_description') }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section border-bottom" data-aos="fade">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 site-section-heading text-center pt-4">
                    <h2>{{ __('website/pages/about.the_team') }}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="block-38 text-center">
                        <div class="block-38-img">
                            <div class="block-38-header">
                                <img src="{{ asset('assets/images/person_1.jpg') }}" alt="Image placeholder" class="mb-4">
                                <h3 class="block-38-heading h4">{{ __('website/pages/about.PeterAdel') }}</h3>
                                <p class="block-38-subheading">{{ __('website/pages/about.ceo_co_founder') }}</p>
                            </div>
                            <div class="block-38-body">
                                <p>{{ __('website/pages/about.elizabeth_description') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="block-38 text-center">
                        <div class="block-38-img">
                            <div class="block-38-header">
                                <img src="{{ asset('assets/images/person_2.jpg') }}" alt="Image placeholder" class="mb-4">
                                <h3 class="block-38-heading h4">{{ __('website/pages/about.MohamedAli') }}</h3>
                                <p class="block-38-subheading">{{ __('website/pages/about.co_founder') }}</p>
                            </div>
                            <div class="block-38-body">
                                <p>{{ __('website/pages/about.jennifer_description') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="block-38 text-center">
                        <div class="block-38-img">
                            <div class="block-38-header">
                                <img src="{{ asset('assets/images/person_3.jpg') }}" alt="Image placeholder" class="mb-4">
                                <h3 class="block-38-heading h4">{{ __('website/pages/about.marketer') }}</h3>
                                <p class="block-38-subheading">{{ __('website/pages/about.marketing') }}</p>
                            </div>
                            <div class="block-38-body">
                                <p>{{ __('website/pages/about.patrick_description') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 m-auto ">
                    <div class="block-38 text-center">
                        <div class="block-38-img">
                            <div class="block-38-header">
                                <img src="{{ asset('assets/images/person_5.jpg') }}" alt="Image placeholder" class="mb-4">
                                <h3 class="block-38-heading h4">{{ __('website/pages/about.bahaa') }}</h3>
                                <p class="block-38-subheading">{{ __('website/pages/about.bahaajob') }}</p>
                            </div>
                            <div class="block-38-body">
                                <p>{{ __('website/pages/about.bahaa_description') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 m-auto">
                    <div class="block-38 text-center">
                        <div class="block-38-img">
                            <div class="block-38-header">
                                <img src="{{ asset('assets/images/person_4.jpg') }}" alt="Image placeholder" class="mb-4">
                                <h3 class="block-38-heading h4">{{ __('website/pages/about.ahmedothman') }}</h3>
                                <p class="block-38-subheading">{{ __('website/pages/about.sales_manager') }}</p>
                            </div>
                            <div class="block-38-body">
                                <p>{{ __('website/pages/about.mike_description') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section site-section-sm site-blocks-1 border-0" data-aos="fade">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
                    <div class="icon mr-4 align-self-start">
                        <span class="icon-truck"></span>
                    </div>
                    <div class="text">
                        <h2 class="text-uppercase">{{ __('website/pages/about.free_shipping') }}</h2>
                        <p>{{ __('website/pages/about.free_shipping_description') }}</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon mr-4 align-self-start">
                        <span class="icon-refresh2"></span>
                    </div>
                    <div class="text">
                        <h2 class="text-uppercase">{{ __('website/pages/about.free_returns') }}</h2>
                        <p>{{ __('website/pages/about.free_returns_description') }}</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon mr-4 align-self-start">
                        <span class="icon-help"></span>
                    </div>
                    <div class="text">
                        <h2 class="text-uppercase">{{ __('website/pages/about.customer_support') }}</h2>
                        <p>{{ __('website/pages/about.customer_support_description') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
