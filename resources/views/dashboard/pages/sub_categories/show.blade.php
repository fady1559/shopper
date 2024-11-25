@extends('dashboard.layouts.master')

@section('title', __('dashboard/pages/sub_categories/show.title') . " ({$subcategory->name})")

@section('main-content')
    <div class="container text-center my-5 mb-2 single-category p-1">
        <main id="main" class="main mt-3">
            <div class="bg-dark shadow-lg p-5 rounded text-info mx-auto">
                <h3>{{ $subcategory->id }}</h3>
                <h2>{{ $subcategory->name ?? __('dashboard/pages/sub_categories/show.null') }}</h2>
                <h2>{{ $subcategory->category->title ?? __('dashboard/pages/sub_categories/show.null') }}</h2>
                <p>{{ $subcategory->description ?? __('dashboard/pages/sub_categories/show.null') }}</p>
                <h1>{{ $subcategory->status ? __('dashboard/pages/sub_categories/show.active') : __('dashboard/pages/sub_categories/show.inactive') }}</h1>
                <hr>
                <div>
                    <form action="{{ route('subcategories.destroy', $subcategory->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('subcategories.edit', $subcategory->id) }}" class="btn btn-success mx-1"><i class="fa-solid fa-edit"></i>{{ __('dashboard/pages/sub_categories/show.edit') }}</a>
                        <button class="btn btn-danger mx-1" type="submit"><i class="fa-solid fa-trash-alt p-1"></i>{{ __('dashboard/pages/sub_categories/show.delete') }}</button>
                        <p class="mt-4">
                            <a href="{{ route('subcategories.index') }}" class="btn btn-info"><i class="fa-solid fa-arrow-left"></i>{{ __('dashboard/pages/sub_categories/show.return') }}</a>
                        </p>
                    </form>
                </div>
            </div>
        </main>
    </div>
@endsection
