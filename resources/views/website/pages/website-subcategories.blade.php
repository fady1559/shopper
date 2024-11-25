@extends('website.layouts.master')

@section('title', __('website/pages/website-subcategories.subcategories_page'))

@section('main-content')

    <div class="container mt-4">
        <h2 class="text-center my-5" style="font-size:40px; color: black">{{ $subcategory->name }}</h2>

        <div class="text-center">
            <img src="{{ Storage::url($subcategory->image) }}" alt="{{ $subcategory->name }}" style="width: 100%;">
        </div>

        <div class="mt-4" style="font-size:20px ;color:black">
            <p>{{ $subcategory->description }}</p>
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('shop') }}" class="btn btn-primary">{{ __('website/pages/website-subcategories.back_to_shop') }}</a>
        </div>
    </div>

    <div class="site-section block-3 site-blocks-2 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 site-section-heading text-center pt-4">
                    <h2>{{ __('website/pages/website-subcategories.featured_products') }}</h2>
                </div>
            </div>
            <div class="row">
                @foreach($products->take(6)->chunk(3) as $productChunk)
                    <div class="col-md-12">
                        <div class="row">
                            @foreach($productChunk as $product)
                                <div class="col-md-4">
                                    <div class="block-4 text-center"
                                         style="transition: transform 0.3s ease;"
                                         onmouseover="this.style.transform='scale(1.05)';"
                                         onmouseout="this.style.transform='scale(1)';">
                                        <figure class="block-4-image">
                                            <a href="{{route('shop_single', $product->id)}}">
                                                <img src="{{ Storage::url($product->image) }}"
                                                     alt="{{ $product->name }}"
                                                     class="img-fluid">
                                            </a>
                                        </figure>
                                        <div class="block-4-text p-4">
                                            <h3><a href="">{{ $product->name }}</a></h3>
                                            <p class="mb-0">{{ $product->short_description }}</p>
                                            <p class="text-primary font-weight-bold">${{ $product->selling_price }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row justify-content-center mt-4">
                <div class="col-md-7 text-center">
                    <a href="{{route('shop')}}" class="btn btn-primary">{{ __('website/pages/website-subcategories.read_more') }}</a>
                </div>
            </div>
        </div>
    </div>

@endsection
