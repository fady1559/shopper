@extends('dashboard.layouts.master')

@section('title', __('dashboard/pages/products/show.Show product') . " ($product->title)") <!-- Title localization -->

@section('main-content')
    <div class="container text-center my-5 mb-2 single-category p-1">
        <main id="main" class="main mt-3">
            <div class="bg-dark shadow-lg p-5 rounded text-info mx-auto">
                <div class="img m-1">
                    <img src="{{ Storage::url($product->image) }}" alt="" class="rounded mx-auto d-block" style="max-height:400px">
                </div>
                <h3>{{ $product->id }}</h3>
                <h2>{{ $product->name ?? __('dashboard/pages/products/show.NULL') }}</h2> <!-- Localized -->
                <h2>{{ $product->subcategory->name ?? __('dashboard/pages/products/show.NULL') }}</h2> <!-- Localized -->
                <p>{{ $product->description }}</p>
                <h1>{{ __('dashboard/pages/products/show.Price') }}: {{ $product->price ?? __('dashboard/pages/products/show.NULL') }}</h1> <!-- Localized -->
                <hr>
                <div>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-success mx-1">
                            <i class="fa-solid fa-edit"></i>{{ __('dashboard/pages/products/show.Edit') }} <!-- Localized -->
                        </a>
                        <button class="btn btn-danger mx-1" type="submit">
                            <i class="fa-solid fa-trash-alt p-1"></i>{{ __('dashboard/pages/products/show.Delete') }} <!-- Localized -->
                        </button>
                        <p class="mt-4">
                            <a href="{{ route('products.index') }}" class="btn btn-info">
                                <i class="fa-solid fa-arrow-left"></i>{{ __('dashboard/pages/products/show.Return To Products') }} <!-- Localized -->
                            </a>
                        </p>
                    </form>
                </div>
            </div>
        </main>
    </div>
@endsection
