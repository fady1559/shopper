@extends('dashboard.layouts.master')

@section('title', __('dashboard/pages/products/create.create_product'))
@inject('product', 'App\Models\Product')
@section('main-content')
    <main id="main" class="main">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card shadow-lg mb-4">
                        <div class="card-header">
                            <strong class="card-title fs-2">{{ __('dashboard/pages/products/create.create_product') }}</strong>
                        </div>
                        <div class="card-body">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong>{{ __('dashboard/pages/products/create.error') }}</strong>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-md-12">
                                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <label for="subcategory_id">{{ __('dashboard/pages/products/create.subcategory') }}</label>
                                            <select name="subcategory_id" class="form-control" id="subcategory_id">
                                                <option value="">{{ __('dashboard/pages/products/create.select') }}</option>
                                                @foreach($subcategories as $subcategory)
                                                    <option value="{{ $subcategory->id }}" {{ old('subcategory_id') == $subcategory->id ? 'selected' : '' }}>
                                                        {{ $subcategory->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="name">{{ __('dashboard/pages/products/create.name') }} <span class="text-danger">{{ __('dashboard/pages/products/create.required') }}</span></label>
                                            <input class="form-control" type="text" name="name" id="name" value="{{ Request::old('name') ?: $product->name }}">
                                        </div>

                                        <div class="form-group row mb-3">
                                            <div class="col-md-6">
                                                <label for="short_description">{{ __('dashboard/pages/products/create.short_description') }} <span class="text-danger">{{ __('dashboard/pages/products/create.required') }}</span></label>
                                                <input class="form-control" type="text" name="short_description" id="short_description" value="{{ Request::old('short_description') ?: $product->short_description }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="description">{{ __('dashboard/pages/products/create.description') }} <span class="text-danger">{{ __('dashboard/pages/products/create.required') }}</span></label>
                                                <input class="form-control" type="text" name="description" id="description" value="{{ Request::old('description') ?: $product->description }}">
                                            </div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="image">{{ __('dashboard/pages/products/create.image') }} <span class="text-danger">{{ __('dashboard/pages/products/create.required') }}</span></label>
                                            <input class="form-control" type="file" name="image" id="image" value="{{ old('image') }}">
                                        </div>

                                        <div class="form-group row mb-3">
                                            <div class="col-md-6">
                                                <label for="price">{{ __('dashboard/pages/products/create.price') }} <span class="text-danger">{{ __('dashboard/pages/products/create.required') }}</span></label>
                                                <input class="form-control" type="number" name="price" id="price" value="{{ Request::old('price') ?: $product->price }}" step="0.01">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="selling_price">{{ __('dashboard/pages/products/create.selling_price') }} <span class="text-danger">{{ __('dashboard/pages/products/create.required') }}</span></label>
                                                <input class="form-control" type="number" name="selling_price" id="selling_price" value="{{ Request::old('selling_price') ?: $product->selling_price }}" step="0.01">
                                            </div>
                                        </div>

                                        <div class="form-group row mb-3">
                                            <div class="col-md-6">
                                                <label for="qty">{{ __('dashboard/pages/products/create.quantity') }} <span class="text-danger">{{ __('dashboard/pages/products/create.required') }}</span></label>
                                                <input class="form-control" type="number" name="qty" id="qty" value="{{ Request::old('qty') ?: $product->qty }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="tax">{{ __('dashboard/pages/products/create.tax') }} <span class="text-danger">{{ __('dashboard/pages/products/create.required') }}</span></label>
                                                <input class="form-control" type="number" name="tax" id="tax" value="{{ Request::old('tax') ?: $product->tax }}" step="0.01">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <label for="status">{{ __('dashboard/pages/products/create.status') }}</label>
                                                <div class="input-group mb-3 mt-1">
                                                    <input type="checkbox" class="" id="status" name="status">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <label for="trend">{{ __('dashboard/pages/products/create.trend') }}</label>
                                                <div class="input-group mb-3 mt-1 col">
                                                    <input type="checkbox" class="" id="trend" name="trend">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-3">
                                            <div class="col-md-6">
                                                <label for="meta_title">{{ __('dashboard/pages/products/create.meta_title') }} <span class="text-danger">{{ __('dashboard/pages/products/create.required') }}</span></label>
                                                <input class="form-control" type="text" name="meta_title" id="meta_title" value="{{ Request::old('meta_title') ?: $product->meta_title }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="meta_keywords">{{ __('dashboard/pages/products/create.meta_keywords') }} <span class="text-danger">{{ __('dashboard/pages/products/create.required') }}</span></label>
                                                <input class="form-control" type="text" name="meta_keywords" id="meta_keywords" value="{{ Request::old('meta_keywords') ?: $product->meta_keywords }}">
                                            </div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="meta_description">{{ __('dashboard/pages/products/create.meta_description') }} <span class="text-danger">{{ __('dashboard/pages/products/create.required') }}</span></label>
                                            <textarea class="form-control" name="meta_description" id="meta_description" rows="4">{{ Request::old('meta_description') ?: $product->meta_description }}</textarea>
                                        </div>

                                        <button type="submit" class="btn btn-success">{{ __('dashboard/pages/products/create.submit') }}</button>
                                        <button type="reset" class="btn btn-secondary">{{ __('dashboard/pages/products/create.reset') }}</button>
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
