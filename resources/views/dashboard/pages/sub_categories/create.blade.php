@extends('dashboard.layouts.master')

@section('title', __('dashboard/pages/sub_categories/create.Create Subcategory')) <!-- Title localization -->
@inject('category', 'App\Models\Category')

@section('main-content')

    <main id="main" class="main">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card shadow-lg mb-4">
                        <div class="card-header">
                            <strong class="card-title fs-2">{{ __('dashboard/pages/sub_categories/create.Create Subcategory') }}</strong> <!-- Localized -->
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="{{ route('subcategories.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group mb-3">
                                            <label for="name" class="form-label">{{ __('dashboard/pages/sub_categories/create.Subcategory Name') }}:</label> <!-- Localized -->
                                            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
                                            @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="category_id" class="form-label">{{ __('dashboard/pages/sub_categories/create.Category') }}:</label> <!-- Localized -->
                                            <select id="category_id" name="category_id" class="form-select" required>
                                                <option value="">{{ __('dashboard/pages/sub_categories/create.Select Category') }}</option> <!-- Localized -->
                                                @foreach ($category::all() as $cat)
                                                    <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                                                        {{ $cat->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="description" class="form-label">{{ __('dashboard/pages/sub_categories/create.Description') }}:</label> <!-- Localized -->
                                            <textarea id="description" name="description" class="form-control">{{ old('description') }}</textarea>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="image">{{ __('dashboard/pages/sub_categories/create.Image') }} <span class="text-danger">*</span></label> <!-- Localized -->
                                            <input class="form-control" type="file" name="image" id="image" value="{{ old('image') }}">
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="status" class="form-label">{{ __('dashboard/pages/sub_categories/create.Status') }}:</label> <!-- Localized -->
                                            <select id="status" name="status" class="form-select">
                                                <option value="1" {{ old('status') === '1' ? 'selected' : '' }}>{{ __('dashboard/pages/sub_categories/create.Active') }}</option> <!-- Localized -->
                                                <option value="0" {{ old('status') === '0' ? 'selected' : '' }}>{{ __('dashboard/pages/sub_categories/create.Inactive') }}</option> <!-- Localized -->
                                            </select>
                                            @error('status')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <button type="submit" class="btn btn-success">{{ __('dashboard/pages/sub_categories/create.Submit') }}</button> <!-- Localized -->
                                        <button type="reset" class="btn btn-secondary">{{ __('dashboard/pages/sub_categories/create.Reset') }}</button> <!-- Localized -->
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
