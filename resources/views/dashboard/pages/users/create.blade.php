@extends('dashboard.layouts.master')

@section('title', __('dashboard/pages/users/create.create_user'))

@inject('user', 'App\Models\User')

@section('main-content')

    <main id="main" class="main">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card shadow-lg mb-4">
                        <div class="card-header">
                            <strong class="card-title fs-2">{{ __('dashboard/pages/users/create.create_user') }}</strong>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @include('dashboard.pages.users.form')

                                        <button type="submit" class="btn btn-success">{{ __('dashboard/pages/users/create.submit') }}</button>
                                        <button type="reset" class="btn btn-secondary">{{ __('dashboard/pages/users/create.reset') }}</button>
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
