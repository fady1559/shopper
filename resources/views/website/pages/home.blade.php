@extends('website.layouts.master')

@section('title', __('website/pages/home.Home_Page'))

@section('head')
    {{-- Default CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    {{-- Include RTL CSS if the locale is Arabic --}}
    @if (App::getLocale() === 'ar')
        <link rel="stylesheet" href="{{ asset('assets/css/rtl.css') }}">
    @endif
@endsection

@section('main-content')
    <div class="site-blocks-cover" style="background-image: url({{ asset('assets/images/hero_1.jpg') }});" data-aos="fade">
        <div class="container">
            <div class="row align-items-start align-items-md-center justify-content-end">
                <div class="col-md-5 text-center text-md-left pt-5 pt-md-0">
                    <h1 class="mb-2">{{ __('website/pages/home.Finding_Your_Perfect_Shoes') }}</h1>
                    <div class="intro-text text-center text-md-left">
                        {{-- Replace Lorem ipsum with real data --}}
                        <p class="mb-4">{{ __('website/pages/home.Lorem_Description') }}</p>
                        <p>
                            <a href="{{ route('shop') }}" class="btn btn-sm btn-primary">{{ __('website/pages/home.Shop_Now') }}</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section site-section-sm site-blocks-1">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
                    <div class="icon mr-4 align-self-start">
                        <span class="icon-truck"></span>
                    </div>
                    <div class="text">
                        <h2 class="text-uppercase">{{ __('website/pages/home.Free_Shipping') }}</h2>
                        <p>{{ __('website/pages/home.Free_Shipping_Description') }}</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon mr-4 align-self-start">
                        <span class="icon-refresh2"></span>
                    </div>
                    <div class="text">
                        <h2 class="text-uppercase">{{ __('website/pages/home.Free_Returns') }}</h2>
                        <p>{{ __('website/pages/home.Free_Returns_Description') }}</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon mr-4 align-self-start">
                        <span class="icon-help"></span>
                    </div>
                    <div class="text">
                        <h2 class="text-uppercase">{{ __('website/pages/home.Customer_Support') }}</h2>
                        <p>{{ __('website/pages/home.Customer_Support_Description') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
