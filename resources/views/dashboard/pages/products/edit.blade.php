@extends('dashboard.layouts.master')

@section('title', __("dashboard/pages/products/edit.edit_product", ['name' => $product->name]))

@section('main-content')
    <main id="main" class="main mt-3 py-5">

        <div class="container">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card shadow-md mb-4">
                        <strong class="card-title fs-2">@lang('dashboard/pages/products/edit.edit_product', ['name' => $product->name])</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group mb-3">
                                        <label for="subcategory_id">@lang('dashboard/pages/products/edit.subcategory')</label>
                                        <select name="subcategory_id" class="form-control" id="subcategory_id">
                                            <option value="">@lang('dashboard/pages/products/edit.select')</option>
                                            @foreach($subcategories as $subcategory)
                                                <option value="{{ $subcategory->id }}" {{($product->subcategory_id == $subcategory->id) ? 'selected' : ''}}>
                                                    {{ $subcategory->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="name">@lang('dashboard/pages/products/edit.name') <span class="{{ __('dashboard/pages/products/edit.text_danger') }}">@lang('dashboard/pages/products/edit.required')</span></label>
                                        <input class="form-control" type="text" name="name" id="name" value="{{ Request::old('name') ? Request::old('name') : $product->name }}">
                                    </div>

                                    <div class="form-group row mb-3">
                                        <div class="col-md-6">
                                            <label for="short_description">@lang('dashboard/pages/products/edit.short_description') <span class="{{ __('dashboard/pages/products/edit.text_danger') }}">@lang('dashboard/pages/products/edit.required')</span></label>
                                            <input class="form-control" type="text" name="short_description" id="short_description" value="{{ Request::old('short_description') ? Request::old('short_description') : $product->short_description }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="description">@lang('dashboard/pages/products/edit.description') <span class="{{ __('dashboard/pages/products/edit.text_danger') }}">@lang('dashboard/pages/products/edit.required')</span></label>
                                            <input class="form-control" type="text" name="description" id="description" value="{{ Request::old('description') ? Request::old('description') : $product->description }}">
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="image">@lang('dashboard/pages/products/edit.image')</label>
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <img src="{{ Storage::url($product->image) }}" alt="" class="img-thumbnail" style="max-width: 100px;">
                                            </div>
                                            <div class="col">
                                                <input type="file" class="form-control" name="image">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <div class="col-md-6">
                                            <label for="price">@lang('dashboard/pages/products/edit.price') <span class="{{ __('dashboard/pages/products/edit.text_danger') }}">@lang('dashboard/pages/products/edit.required')</span></label>
                                            <input class="form-control" type="number" name="price" id="price" value="{{ Request::old('price') ? Request::old('price') : $product->price }}" step="0.01">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="selling_price">@lang('dashboard/pages/products/edit.selling_price') <span class="{{ __('dashboard/pages/products/edit.text_danger') }}">@lang('dashboard/pages/products/edit.required')</span></label>
                                            <input class="form-control" type="number" name="selling_price" id="selling_price" value="{{ Request::old('selling_price') ? Request::old('selling_price') : $product->selling_price }}" step="0.01">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <div class="col-md-6">
                                            <label for="qty">@lang('dashboard/pages/products/edit.quantity') <span class="{{ __('dashboard/pages/products/edit.text_danger') }}">@lang('dashboard/pages/products/edit.required')</span></label>
                                            <input class="form-control" type="number" name="qty" id="qty" value="{{ Request::old('qty') ? Request::old('qty') : $product->qty }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="tax">@lang('dashboard/pages/products/edit.tax') <span class="{{ __('dashboard/pages/products/edit.text_danger') }}">@lang('dashboard/pages/products/edit.required')</span></label>
                                            <input class="form-control" type="number" name="tax" id="tax" value="{{ Request::old('tax') ? Request::old('tax') : $product->tax }}" step="0.01">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <label for="status">@lang('dashboard/pages/products/edit.status')</label>
                                            <div class="input-group mb-3 mt-1">
                                                <input type="checkbox" class="" id="status" name="status" {{ $product->status ? 'checked' : '' }}>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label for="trend">@lang('dashboard/pages/products/edit.trend')</label>
                                            <div class="input-group mb-3 mt-1 col">
                                                <input type="checkbox" class="" id="trend" name="trend" {{ $product->trend ? 'checked' : '' }}>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <div class="col-md-6">
                                            <label for="meta_title">@lang('dashboard/pages/products/edit.meta_title') <span class="{{ __('dashboard/pages/products/edit.text_danger') }}">@lang('dashboard/pages/products/edit.required')</span></label>
                                            <input class="form-control" type="text" name="meta_title" id="meta_title" value="{{ Request::old('meta_title') ? Request::old('meta_title') : $product->meta_title }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="meta_keywords">@lang('dashboard/pages/products/edit.meta_keywords') <span class="{{ __('dashboard/pages/products/edit.text_danger') }}">@lang('dashboard/pages/products/edit.required')</span></label>
                                            <input class="form-control" type="text" name="meta_title" id="meta_title" value="{{ Request::old('meta_title') ? Request::old('meta_title') : $product->meta_title }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="meta_keywords">@lang('dashboard/pages/products/edit.meta_keywords') <span class="{{ __('dashboard/pages/products/edit.text_danger') }}">@lang('dashboard/pages/products/edit.required')</span></label>
                                            <input class="form-control" type="text" name="meta_keywords" id="meta_keywords" value="{{ Request::old('meta_keywords') ? Request::old('meta_keywords') : $product->meta_keywords }}">
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="meta_description">@lang('dashboard/pages/products/edit.meta_description') <span class="{{ __('dashboard/pages/products/edit.text_danger') }}">@lang('dashboard/pages/products/edit.required')</span></label>
                                        <textarea name="meta_description" id="meta_description" class="form-control" cols="30" rows="3">{{ Request::old('meta_description') ? Request::old('meta_description') : $product->meta_description }}</textarea>
                                    </div>

                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary">@lang('dashboard/pages/products/edit.update')</button>
                                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-secondary ms-2">@lang('dashboard/pages/products/edit.return_to_product')</a>
                                        <a href="{{ route('products.index') }}" class="btn btn-secondary ms-2">@lang('dashboard/pages/products/edit.go_back')</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
