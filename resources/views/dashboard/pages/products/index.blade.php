@extends('dashboard.layouts.master')

@section('title', __('dashboard/pages/products/index.Products')) <!-- Title localization -->
@section('main-content')
    <div class="col-12 mt-5">
        <div class="p-4">
            <div class="d-flex justify-content-end flex-wrap">
                <a href="{{ route('products.create') }}" class="btn btn-success">
                    <span>{{ __('dashboard/pages/products/index.Add Product') }}</span> <!-- Localized text -->
                </a>
            </div>
        </div>
    </div>

    <main id="main" class="main mt-1">
        {{-- created success --}}
        @if(session('success_create_product'))
            <div class="alert alert-success mx-3">
                {{ session('success_create_product') }}
            </div>
        @endif

        {{-- update successfully --}}
        @if(session('success_update_product'))
            <div class="alert alert-success mx-3">
                {{ session('success_update_product') }}
            </div>
        @endif

        {{-- delete successfully --}}
        @if(session('delete_product'))
            <div class="alert alert-danger mx-3">
                {{ session('delete_product') }}
            </div>
        @endif

        {{-- Error successfully --}}
        @if(session('error'))
            <div class="alert alert-danger mx-3">
                {{ session('error') }}
            </div>
        @endif

        <div class="card">
            <div class="search-bar my-2">
                <form class="search-form d-flex align-items-center" method="GET" action="{{ route('dashboard.search.products') }}">
                    <input style="display:block;width:100%" class="m-2 fs-4 p-2" type="text" name="query" placeholder="{{ __('dashboard/pages/products/index.Search for Products') }}" title="{{ __('dashboard/pages/products/index.Enter search keyword') }}">
                    <button type="submit" title="{{ __('dashboard/pages/products/index.Search') }}" class="p-2" style="margin-left:-40px; margin-bottom:2px">
                        <i class="bi bi-search fs-4"></i>
                    </button>
                </form>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">{{ __('dashboard/pages/products/index.Id') }}</th> <!-- Localized -->
                        <th scope="col">{{ __('dashboard/pages/products/index.Subcategory') }}</th> <!-- Localized -->
                        <th scope="col">{{ __('dashboard/pages/products/index.Name') }}</th> <!-- Localized -->
                        <th scope="col">{{ __('dashboard/pages/products/index.Image') }}</th> <!-- Localized -->
                        <th scope="col">{{ __('dashboard/pages/products/index.Status') }}</th> <!-- Localized -->
                        <th scope="col">{{ __('dashboard/pages/products/index.Trend') }}</th> <!-- Localized -->
                        <th scope="col">{{ __('dashboard/pages/products/index.Action') }}</th> <!-- Localized -->
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($products as $product)
                        <tr>
                            <th scope="row">{{ $product->id }}</th>
                            <td>{{ $product->subcategory->name }}</td>
                            <td>{{ $product->name }}</td>
                            <td><img src="{{ Storage::url($product->image) }}" alt="" class="rounded mx-auto d-block" style="width:200px; height:200px"></td>
                            <td class="text-center" style="vertical-align: middle;">
                                @if($product->status == 1)
                                    <span class="badge badge-success" style="font-size: 1.2em; padding: 0.5em 1em;">{{ __('dashboard/pages/products/index.Showing') }}</span> <!-- Localized -->
                                @else
                                    <span class="badge badge-danger" style="font-size: 1.2em; padding: 0.5em 1em;">{{ __('dashboard/pages/products/index.Hidden') }}</span> <!-- Localized -->
                                @endif
                            </td>
                            <td class="text-center" style="vertical-align: middle;">
                                @if($product->trend == 1)
                                    <span class="badge badge-success" style="font-size: 1.2em; padding: 0.5em 1em;">{{ __('dashboard/pages/products/index.Popular') }}</span> <!-- Localized -->
                                @else
                                    <span class="badge badge-danger" style="font-size: 1.2em; padding: 0.5em 1em;">{{ __('dashboard/pages/products/index.Not Popular') }}</span> <!-- Localized -->
                                @endif
                            </td>
                            <td class="text-center" style="vertical-align: middle;">
                                <form method="POST" action="{{ route('products.destroy', $product->id) }}">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-warning">{{ __('dashboard/pages/products/index.Show') }}</a> <!-- Localized -->

                                    @if(auth()->user()->User_Type == "admin")
                                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">{{ __('dashboard/pages/products/index.Edit') }}</a> <!-- Localized -->
                                        <button type="submit" class="btn btn-danger">{{ __('dashboard/pages/products/index.Delete') }}</button> <!-- Localized -->
                                    @endif
                                </form>
                            </td>
                        </tr>
                    @empty
                        <div class="alert alert-danger text-center my-5 mx-auto">
                            <span>{{ __('dashboard/pages/products/index.There Are No products Yet!') }} <a href="{{ route('products.create') }}" class="text-danger">{{ __('dashboard/pages/products/index.Add products From Here') }}</a></span> <!-- Localized -->
                        </div>
                    @endforelse
                    </tbody>
                </table>
                <div class="my-4">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </main>
@endsection
