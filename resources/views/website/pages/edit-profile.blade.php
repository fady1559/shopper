@extends('website.layouts.master')

@section('title', __('website/pages/edit-profile.Edit Profile'))

@section('main-content')
    <div class="container">
        <h2 class="text-center my-4 p-4 bg-dark text-light" style="font-size:30px;">{{ __('website/pages/edit-profile.Edit Profile') }}</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('website.update.profile', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="text-center">
                <img src="{{ $user->image ? Storage::url($user->image) : asset('default-profile.png') }}" alt="{{ $user->name }}" style="width:300px; height:300px; border-radius:50%;">
            </div>

            <div class="form-group">
                <label for="image">{{ __('website/pages/edit-profile.Image') }}</label>
                <input type="file" class="form-control" name="image">
            </div>

            <div class="form-group">
                <label for="name">{{ __('website/pages/edit-profile.Name') }}</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
            </div>

            <div class="form-group">
                <label for="email">{{ __('website/pages/edit-profile.Email') }}</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
            </div>

            <div class="form-group">
                <label for="password">{{ __('website/pages/edit-profile.Password') }}</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <button type="submit" class="btn btn-primary">{{ __('website/pages/edit-profile.Update Profile') }}</button>
        </form>
    </div>
@endsection
