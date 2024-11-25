@extends('website.layouts.master')

@section('title', __('website/pages/profile.user_profile'))

@section('main-content')
    <div class="site-section site-blocks-1" style="background-color: #f8f9fa;">
        <div class="container">
            @if(session('Auth'))
                <div class="alert alert-danger">
                    {{ session('Auth') }}
                </div>
            @endif

            <div class="row justify-content-center">
                <div class="col-md-7 site-section-heading text-center pt-4">
                    <h2 class="mb-4">{{ __('website/pages/profile.user_profile') }}</h2>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-6 text-center">
                    <img src="{{ auth()->user()->image ? Storage::url(auth()->user()->image) : asset('default-profile.png') }}" alt="Profile Image" class="rounded-circle mb-3" style="width:400px; height:400px; border: 2px solid #007bff; margin-bottom: 50px;"> <!-- إضافة هامش سفلي -->
                </div>
                <div class="col-md-6 ">
                    <div class="profile-info">
                        <p style="font-size: 1.5rem;"><strong>{{ __('website/pages/profile.name') }}:</strong> {{ auth()->user()->name }}</p>
                        <p style="font-size: 1.5rem;"><strong>{{ __('website/pages/profile.email') }}:</strong> {{ auth()->user()->email }}</p>
                    </div>
                    <div class="d-flex justify-content-start mt-3">
                        <a href="{{ route('website.edit.profile', auth()->user()->id) }}" class="btn btn-primary">{{ __('website/pages/profile.edit_profile') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
