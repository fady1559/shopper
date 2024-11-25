@extends('dashboard.layouts.master')

@section('title', __('dashboard/pages/categories/page-404.page_not_found'))

@section('main-content')

    <main>
        <div class="container">

            <section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
                <h1>{{ __('dashboard/pages/categories/page-404.page_not_found') }}</h1>
                <h2>{{ __('dashboard/pages/categories/page-404.error_message') }}</h2>
                <a class="btn" href="{{ route('categories.index') }}">{{ __('dashboard/pages/categories/page-404.back_to_home') }}</a>
                <img src="assets/img/not-found.svg" class="img-fluid py-5" alt="Page Not Found">
                <div class="credits">
                    Designed by <a href="https://bootstrapmade.com/">{{ __('dashboard/pages/categories/page-404.designed_by') }} BootstrapMade</a>
                </div>
            </section>

        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

@endsection
