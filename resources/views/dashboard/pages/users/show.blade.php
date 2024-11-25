@extends('dashboard.layouts.master')

@section('title', __("messages.show_user") . " ($user->title)")

@section('main-content')
    <div class="container text-center my-5 mb-2 single-category p-1">
        <main id="main" class="main mt-3">
            <div class="bg-dark shadow-lg p-5 rounded text-info mx-auto">
                <h3>{{ $user->id }}</h3>
                <h2>{{ $user->name ?? __('dashboard/pages/users/show.null') }}</h2>
                <p>{{ $user->email ?? __('dashboard/pages/users/show.null') }}</p>
                <h1>{{ $user->User_Type ?? __('dashboard/pages/users/show.null') }}</h1>
                <hr>
                <div>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-success mx-1"><i class="fa-solid fa-edit"></i>{{ __('dashboard/pages/users/show.edit') }}</a>
                        <button class="btn btn-danger mx-1" type="submit"><i class="fa-solid fa-trash-alt p-1"></i>{{ __('dashboard/pages/users/show.delete') }}</button>
                        <p class="mt-4">
                            <a href="{{ route('users.index') }}" class="btn btn-info"><i class="fa-solid fa-arrow-left"></i>{{ __('dashboard/pages/users/show.return_to_users') }}</a>
                        </p>
                    </form>
                </div>
            </div>
        </main>
    </div>
@endsection
