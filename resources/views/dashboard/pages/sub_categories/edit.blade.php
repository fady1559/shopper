@extends('dashboard.layouts.master')

@section('title', __('dashboard/pages/sub_categories/edit.Edit Subcategory (:name)', ['name' => $subcategory->name])) <!-- Title localization -->

@section('main-content')
    <main id="main" class="main mt-3 py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card shadow-md mb-4">
                        <strong class="card-title fs-2">{{ __('dashboard/pages/sub_categories/edit.Edit Subcategory') }} (<span class="text-primary">{{ $subcategory->name }}</span>)</strong> <!-- Localized -->
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('subcategories.update', $subcategory->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group mb-3">
                                        <label for="name" class="form-label">{{ __('dashboard/pages/sub_categories/edit.Subcategory Name') }}:</label> <!-- Localized -->
                                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $subcategory->name) }}" required>
                                        @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="category_id" class="form-label">{{ __('dashboard/pages/sub_categories/edit.Category') }}:</label> <!-- Localized -->
                                        <select id="category_id" name="category_id" class="form-select" required>
                                            <option value="">{{ __('dashboard/pages/sub_categories/edit.Select Category') }}</option> <!-- Localized -->
                                            @foreach ($categories as $cat)
                                                <option value="{{ $cat->id }}" {{ old('category_id', $subcategory->category_id) == $cat->id ? 'selected' : '' }}>
                                                    {{ $cat->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="description" class="form-label">{{ __('dashboard/pages/sub_categories/edit.Description') }}:</label> <!-- Localized -->
                                        <textarea id="description" name="description" class="form-control">{{ old('description', $subcategory->description) }}</textarea>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="image">{{ __('dashboard/pages/sub_categories/edit.Image') }}</label> <!-- Localized -->
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <img src="{{ Storage::url($subcategory->image) }}" alt="" class="img-thumbnail" style="width: 100px; height:100px">
                                            </div>
                                            <div class="col">
                                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                                                @error('image')
                                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="status" class="form-label">{{ __('dashboard/pages/sub_categories/edit.Status') }}:</label> <!-- Localized -->
                                        <select id="status" name="status" class="form-select">
                                            <option value="1" {{ old('status', $subcategory->status) == '1' ? 'selected' : '' }}>{{ __('dashboard/pages/sub_categories/edit.Active') }}</option> <!-- Localized -->
                                            <option value="0" {{ old('status', $subcategory->status) == '0' ? 'selected' : '' }}>{{ __('dashboard/pages/sub_categories/edit.Inactive') }}</option> <!-- Localized -->
                                        </select>
                                        @error('status')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-md px-4 py-1 font-weight-bold fs-4">{{ __('dashboard/pages/sub_categories/edit.Update') }}</button> <!-- Localized -->
                                    <a href="{{ route('subcategories.index') }}" class="btn btn-dark btn-md px-2 py-2">{{ __('dashboard/pages/sub_categories/edit.Return To Subcategories') }}</a> <!-- Localized -->
                                    <a href="{{ url()->previous() }}" class="btn btn-light btn-md px-2 py-2">{{ __('dashboard/pages/sub_categories/edit.Go Back') }}</a> <!-- Localized -->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
