@extends('website.layouts.master')

@section('title', __('website/pages/new-arrivals.new_arrivals'))

@section('main-content')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="{{ route('home') }}">{{ __('website/pages/new-arrivals.home') }}</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">{{ __('website/pages/new-arrivals.new_arrivals') }}</strong></div>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <h2 class="text-center mb-4">{{ __('website/pages/new-arrivals.new_arrivals') }}</h2>

        <!-- Search Form -->
        <form action="{{ route('new.arrivals.search') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="query" class="form-control" placeholder="{{ __('website/pages/new-arrivals.search_placeholder') }}" required>
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </div>
        </form>

        <div class="row">
            @foreach($newProducts as $product)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="card-img-top">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->short_description }}</p>
                            <p class="text-primary font-weight-bold">${{ $product->selling_price }}</p>
                            <a href="{{ route('shop_single', $product->id) }}" class="btn btn-primary">{{ __('website/pages/new-arrivals.view_details') }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
