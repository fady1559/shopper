@extends('dashboard.layouts.master')

@section('title', __('dashboard/pages/users/profile.profile'))

@section('main-content')
    <main id="main" class="main mt-1">
        <div class="col-12 mt-5">
            <div class="p-4">
                <h5 class="card-title text-center" style="font-size:40px">{{ __('dashboard/pages/users/profile.profile') }}</h5>
                <div class="card">
                    <div class="card-body text-center my-2">
                        <img src="{{ Storage::url($user->image) }}" alt="{{ __('dashboard/pages/users/profile.profile') }} Image" class="rounded-circle mb-3" style="width:300px; height:300px; border: 2px solid #007bff;">
                        <div>
                            <p><strong>{{ __('dashboard/pages/users/profile.name') }}:</strong> {{ $user->name }}</p>
                            <p><strong>{{ __('dashboard/pages/users/profile.email') }}:</strong> {{ $user->email }}</p>
                            <p><strong>{{ __('dashboard/pages/users/profile.user_type') }}:</strong> {{ $user->User_Type }}</p>
                        </div>
                        <div class="d-flex justify-content-end mt-3">
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">{{ __('dashboard/pages/users/profile.edit_profile') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
