@extends('website.layouts.master')

@section('title', __('website/pages/products/shop.shop_page'))

@section('main-content')

    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0">
                    <a href="{{ route('home') }}">{{ __('website/pages/products/shop.home') }}</a>
                    <span class="mx-2 mb-0">/</span>
                    <strong class="text-black">{{ __('website/pages/products/shop.shop') }}</strong>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">

            <div class="row mb-5">
                <div class="col-md-9 order-2">

                    <div class="row">
                        <div class="col-md-12 mb-5">
                            <div class="float-md-left mb-4">
                                <h2 class="text-black h5">{{ __('website/pages/products/shop.shop_all') }}</h2>
                            </div>
                            <div class="d-flex">
                                <form action="{{ route('shop.search') }}" method="GET" class="ml-md-auto">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="query" placeholder="{{ __('website/pages/products/shop.search_placeholder') }}" required>
                                        <div class="input-group-append">
                                            <button class="btn btn-secondary" type="submit">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-5">
                        @forelse($products as $product)
                            <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                                <div class="block-4 text-center border"
                                     style="transition: transform 0.3s ease;"
                                     onmouseover="this.style.transform='scale(1.05)';"
                                     onmouseout="this.style.transform='scale(1)';">
                                    <figure class="block-4-image">
                                        <a href="{{ route('shop_single', $product->id) }}">
                                            <img src="{{ url($product->image) }}"
                                                 alt="{{ $product->name }}"
                                                 class="img-fluid"
                                                 style="transition: transform 0.3s ease;">
                                        </a>
                                    </figure>
                                    <div class="block-4-text p-4">
                                        <h3>{{ $product->name }}</h3>
                                        <p class="mb-0">{{ $product->short_description }}</p>
                                        <p class="text-primary font-weight-bold">${{ $product->selling_price }}</p>
                                    </div>
                                    <a href="{{ route('shop_single', $product->id) }}"
                                       style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 10;"></a>
                                </div>
                            </div>
                        @empty
                            <div class="col-md-12 text-center">
                                <p>{{ __('website/pages/products/shop.no_products') }}</p>
                            </div>
                        @endforelse
                    </div>

                    <div class="my-4">
                        {{ $products->links() }}
                    </div>

                </div>

                <div class="col-md-3 order-1 mb-5 mb-md-0">
                    <div class="border p-4 rounded mb-4">
                        <h3 class="mb-3 h6 text-uppercase text-black d-block">{{ __('website/pages/products/shop.categories') }}</h3>
                        <ul class="list-unstyled mb-0">
                            @foreach($categories as $category)
                                <li class="mb-1"><a href="{{ route('website.categories', $category->id) }}" class="d-flex"><span>{{ $category->title }}</span></a></li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="border p-4 rounded mb-4">
                        <h3 class="mb-3 h6 text-uppercase text-black d-block">{{ __('website/pages/products/shop.subcategories') }}</h3>
                        <ul class="list-unstyled mb-0">
                            @foreach($subcategories as $subcategory)
                                <li class="mb-1"><a href="{{ route('website.subcategories', $subcategory->id) }}" class="d-flex"><span>{{ $subcategory->name }}</span></a></li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="site-section site-blocks-2">
                        <div class="row justify-content-center text-center mb-5">
                            <div class="col-md-7 site-section-heading pt-4">
                                <h2>{{ __('website/pages/products/shop.categories') }}</h2>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($categories as $category)
                                <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade" data-aos-delay="">
                                    <a class="block-2-item" href="{{ route('website.categories', $category->id) }}">
                                        <figure class="image">
                                            <img src="{{ $category->image ? Storage::url($category->image) : asset('default-profile.png') }}" alt="{{ $category->name }}" class="img-fluid">
                                        </figure>
                                        <div class="text">
                                            <span class="text-uppercase">{{ __('website/pages/products/shop.collections') }}</span>
                                            <h3>{{ $category->title }}</h3>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
