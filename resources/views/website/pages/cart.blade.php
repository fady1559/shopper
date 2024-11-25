@extends('website.layouts.master')

@section('title', __('website/pages/cart.Shopping Cart'))

@section('main-content')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0">
                    <a href="{{ route('home') }}" class="text-decoration-none">{{ __('website/pages/cart.Home') }}</a>
                    <span class="mx-2 mb-0">/</span>
                    <strong class="text-black">{{ __('website/pages/cart.Shopping Cart') }}</strong>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <h1 class="text-center text-primary mb-5" style="font-family: 'Poppins', sans-serif; font-weight: 700;">
                {{ __('website/pages/cart.Your Shopping Cart') }}
            </h1>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                <tr>
                    <th>{{ __('website/pages/cart.Product') }}</th>
                    <th>{{ __('website/pages/cart.Price') }}</th>
                    <th>{{ __('website/pages/cart.Quantity') }}</th>
                    <th>{{ __('website/pages/cart.Total') }}</th>
                    <th>{{ __('website/pages/cart.Action') }}</th>
                </tr>
                </thead>
                <tbody>
                @forelse($cartItems as $item)
                    <tr>
                        <td>
                            <img src="{{ Storage::url($item->attributes->image) }}" alt="{{ $item->name }}" width="100" class="rounded">
                            {{ $item->name }}
                        </td>
                        <td>${{ $item->price }}</td>
                        <td>
                            <form action="{{ route('cart.update', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="form-control" style="width: 80px; display:inline;" required>
                                <button type="submit" class="btn btn-sm btn-warning">{{ __('website/pages/cart.Update') }}</button>
                            </form>
                        </td>
                        <td>${{ $item->price * $item->quantity }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">{{ __('website/pages/cart.Remove') }}</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">{{ __('website/pages/cart.Your cart is empty!') }}</td>
                    </tr>
                @endforelse
                </tbody>
            </table>

            @if($cartItems->isNotEmpty())
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <h1 class="bg-dark p-2 text-light">{{ __('website/pages/cart.Total:') }} ${{ Cart::getTotal() }}</h1>
                    <a href="{{ route('shop') }}" class="btn btn-primary">{{ __('website/pages/cart.Continue Shopping') }}</a>
                    <a href="#" class="btn btn-success">{{ __('website/pages/cart.Checkout') }}</a>
                </div>
            @endif
        </div>
    </div>
@endsection
