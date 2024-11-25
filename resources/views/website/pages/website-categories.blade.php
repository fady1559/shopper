@extends('website.layouts.master')

@section('title', __('website/pages/website-categories.categories_page'))

@section('main-content')
    <div class="container">
        <div class="text-center mt-5 mb-4">
            <h1 class="mt-4 p-1 bg-dark text-light">{{ $category->title }}</h1>
            <img src="{{ Storage::url($category->image) }}" alt="{{ $category->name }}" class="img-fluid rounded" style="max-width: 100%; height: auto;">
            <p class="lead">{{ $category->description }}</p>
        </div>

        <h2 class="mt-5 mb-4 mx-auto text-center p-1 bg-dark text-light" style="width:200px">{{ __('website/pages/website-categories.subcategories') }}</h2>
        <div class="row">
            @foreach($subcategories as $subcategory)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm border-light">
                        <a href="{{ route('website.subcategories', $subcategory->id) }}">
                            <img src="{{ Storage::url($subcategory->image) }}" alt="{{ $subcategory->name }}" class="card-img-top">
                        </a>
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $subcategory->name }}</h5>
                            <a href="{{ route('website.subcategories', $subcategory->id) }}" class="btn btn-primary">{{ __('website/pages/website-categories.view_subcategory') }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
