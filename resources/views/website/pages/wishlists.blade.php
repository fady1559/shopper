@extends('website.layouts.master')

@section('title', __('website/pages/wishlists.home'))

@section('main-content')
    <div class="container my-5">
        <h1 class="text-center text-primary mb-4" style="font-family: 'Poppins', sans-serif; font-weight: 700;">
            {{ __('website/pages/wishlists.your_wishlist') }}
        </h1>

        @if($wishlists->isEmpty())
            <div class="alert alert-warning text-center" role="alert">
                {{ __('website/pages/wishlists.wishlist_empty') }}
            </div>
        @else
            <div class="row justify-content-center">
                @foreach($wishlists as $wishlist)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            @if($wishlist->product->image)
                                <img src="{{ Storage::url($wishlist->product->image) }}" alt="{{ $wishlist->product->name }}" class="card-img-top img-fluid" style="max-height: 250px; object-fit: cover;">
                            @else
                                <img src="default-image.jpg" alt="No Image Available" class="card-img-top img-fluid" style="max-height: 250px; object-fit: cover;">
                            @endif
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $wishlist->product->name }}</h5>
                                <p class="card-text">{{ Str::limit($wishlist->product->description, 100) }}</p>
                                <a href="{{ route('shop_single', $wishlist->product->id) }}" class="btn btn-primary">{{ __('website/pages/wishlists.view_product') }}</a>
                            </div>
                            <div class="card-footer text-center">
                                <form action="{{ route('wishlist.remove', $wishlist->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">{{ __('website/pages/wishlists.remove') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
