@extends('dashboard.layouts.master')

@section('title', __('dashboard/pages/categories/create.create_category'))

@inject('category', 'App\Models\Category')

@section('main-content')

    <main id="main" class="main">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card shadow-lg mb-4">
                        <div class="card-header">
                            <strong class="card-title fs-2">{{ __('dashboard/pages/categories/create.create_category') }}</strong>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @include('dashboard.pages.categories.form')

                                        <button type="submit" class="btn btn-success">{{ __('dashboard/pages/categories/create.submit') }}</button>
                                        <button type="reset" class="btn btn-secondary">{{ __('dashboard/pages/categories/create.reset') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
