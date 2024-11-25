@extends('website.layouts.master')

@section('title', 'Shop Single Page')

@section('main-content')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0">
                    <a href="{{ route('home') }}">{{ __('website/pages/products/shop-single.home') }}</a>
                    <span class="mx-2 mb-0">/</span>
                    <strong class="text-black">{{ $product->name }}</strong>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <h2 class="text-black">{{ $product->name }}</h2>
                    <p>{{ $product->short_description }}</p>
                    <p>{{ $product->description }}</p>
                    <p><strong class="text-primary h4">{{ __('website/pages/products/shop-single.available_stock') }} {{ $product->qty }}</strong></p>
                    <p><strong class="text-primary h4">{{ __('website/pages/products/shop-single.tax') }} ${{ $product->tax }}</strong></p>
                    <p><strong class="text-primary h4">{{ __('website/pages/products/shop-single.price') }} ${{ $product->selling_price }}</strong></p>

                    <div class="mb-5">
                        <label for="quantity" class="mr-2">{{ __('website/pages/products/shop-single.quantity') }}</label>
                        <input type="number" id="quantity" name="quantity" class="form-control" value="1" min="1" style="width: 120px;">
                    </div>

                    <p>
                    <form action="{{ route('cart.add', $product->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <input type="hidden" name="quantity" id="quantity-input" value="1">
                        <button type="submit" class="btn btn-sm btn-success">
                            <i class="fa fa-shopping-cart"></i> {{ __('website/pages/products/shop-single.add_to_cart') }}
                        </button>
                    </form>
                    <form action="{{ route('wishlist.add', $product->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-heart"></i> {{ __('website/pages/products/shop-single.add_to_wishlist') }}
                        </button>
                    </form>
                    </p>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if(session('info'))
                        <div class="alert alert-info">{{ session('info') }}</div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="site-section block-3 site-blocks-2 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 site-section-heading text-center pt-4">
                    <h2>{{ __('website/pages/products/shop-single.related_products') }}</h2>
                </div>
            </div>
            <div class="row">
                @foreach($relatedProducts->chunk(3) as $productChunk)
                    <div class="col-md-12">
                        <div class="row">
                            @foreach($productChunk as $relatedProduct)
                                <div class="col-md-4">
                                    <div class="block-4 text-center"
                                         style="transition: transform 0.3s ease;"
                                         onmouseover="this.style.transform='scale(1.05)';"
                                         onmouseout="this.style.transform='scale(1)';">
                                        <figure class="block-4-image">
                                            <a href="{{ route('shop_single', $relatedProduct->id) }}">
                                                <img src="{{ Storage::url($relatedProduct->image) }}"
                                                     alt="{{ $relatedProduct->name }}"
                                                     class="img-fluid">
                                            </a>
                                        </figure>
                                        <div class="block-4-text p-4">
                                            <h3><a href="{{ route('shop_single', $relatedProduct->id) }}">{{ $relatedProduct->name }}</a></h3>
                                            <p class="mb-0">{{ $relatedProduct->short_description }}</p>
                                            <p class="text-primary font-weight-bold">${{ $relatedProduct->selling_price }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
