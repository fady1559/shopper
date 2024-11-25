@extends('dashboard.layouts.master')

@section('title', __('dashboard/pages/users/show_admins.show_admins'))
@section('main-content')
    <div class="col-12 mt-5">
        <div class="p-4">
            <div class="d-flex justify-content-end flex-wrap">
                <a href="{{ route('users.create') }}" class="btn btn-success">
                    <span>{{ __('dashboard/pages/users/show_admins.add_user') }}</span>
                </a>
            </div>
        </div>
    </div>

    <main id="main" class="main mt-1">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ __('dashboard/pages/users/show_admins.bordered_table') }}</h5>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">{{ __('dashboard/pages/users/show_admins.id') }}</th>
                        <th scope="col">{{ __('dashboard/pages/users/show_admins.name') }}</th>
                        <th scope="col">{{ __('dashboard/pages/users/show_admins.email') }}</th>
                        <th scope="col">{{ __('dashboard/pages/users/show_admins.user_type') }}</th>
                        <th scope="col">{{ __('dashboard/pages/users/show_admins.image') }}</th>
                        <th scope="col">{{ __('dashboard/pages/users/show_admins.action') }}</th>
                        

                    </tr>
                    </thead>
                    <tbody>
                    @forelse($admins as $admin)
                        <tr>
                            <th scope="row">{{ $admin->id }}</th>
                            <td>{{ $admin->name }}</td>
                            <td>{{ $admin->email }}</td>
                            <td>{{ $admin->User_Type }}</td>
                            <td class="text-center" style="vertical-align: middle;">
                                <img src="{{ Storage::url($admin->image) }}" alt="" class="rounded mx-auto d-block" style="width:200px; height:200px">
                            </td>
                            <td class="col-3 text-center" style="vertical-align: middle;">
                                <form method="POST" action="{{ route('users.destroy', $admin->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('users.show', $admin->id) }}" class="btn btn-warning">{{ __('dashboard/pages/users/show_admins.show') }}</a>
                                    @if(auth()->user()->User_Type == "admin")
                                        <a href="{{ route('users.edit', $admin->id) }}" class="btn btn-primary">{{ __('dashboard/pages/users/show_admins.edit') }}</a>
                                        <button type="submit" class="btn btn-danger">{{ __('dashboard/pages/users/show_admins.delete') }}</button>
                                    @endif
                                </form>
                            </td>
                        </tr>
                    @empty
                        <div class="alert alert-danger text-center my-5 mx-auto">
                            <span>{{ __('dashboard/pages/users/show_admins.no_admins') }} <a href="{{ route('users.create') }}" class="text-danger">{{ __('dashboard/pages/users/show_admins.add_admins_here') }}</a></span>
                        </div>
                    @endforelse
                    </tbody>
                </table>

                <div class="my-4">
                    {{ $admins->links() }}
                </div>

            </div>
        </div>
    </main>
@endsection
