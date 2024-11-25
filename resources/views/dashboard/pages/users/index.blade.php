@extends('dashboard.layouts.master')

@section('title', __('dashboard/pages/users/index.users'))
@section('main-content')
    <div class="col-12 mt-5">
        <div class="p-4">
            <div class="d-flex justify-content-end flex-wrap">
                <a href="{{ route('users.create') }}" class="btn btn-success">
                    <span>{{ __('dashboard/pages/users/index.add_user') }}</span>
                </a>
            </div>
        </div>
    </div>

    <main id="main" class="main mt-1">

        {{-- created success --}}
        @if(session('success'))
            <div class="alert alert-success mx-3">
                {{ session('success') }}
            </div>
        @endif
        {{-- update success --}}
        @if(session('update'))
            <div class="alert alert-success mx-3">
                {{ session('update') }}
            </div>
        @endif

        {{-- error  --}}
        @if(session('error'))
            <div class="alert alert-danger mx-3">
                {{ session('error') }}
            </div>
        @endif
        {{-- restore  --}}
        @if(session('restore'))
            <div class="alert alert-success mx-3">
                {{ session('restore') }}
            </div>
        @endif
        {{-- forceDelete  --}}
        @if(session('forceDelete'))
            <div class="alert alert-danger mx-3">
                {{ session('forceDelete') }}
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">{{ __('dashboard/pages/users/index.id') }}</th>
                        <th scope="col">{{ __('dashboard/pages/users/index.name') }}</th>
                        <th scope="col">{{ __('dashboard/pages/users/index.email') }}</th>
                        <th scope="col">{{ __('dashboard/pages/users/index.user_type') }}</th>
                        <th scope="col">{{ __('dashboard/pages/users/index.image') }}</th>
                        <th scope="col">{{ __('dashboard/pages/users/index.action') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($users as $user)
                        <tr>
                            <th class="col-1 text-center" style="vertical-align: middle;" scope="row">{{ $user->id }}</th>
                            <td class="text-center" style="vertical-align: middle;">{{ $user->name }}</td>
                            <td class="text-center" style="vertical-align: middle;">{{ $user->email }}</td>
                            <td class="text-center" style="vertical-align: middle;">{{ $user->User_Type }}</td>
                            <td class="text-center" style="vertical-align: middle;"><img src="{{ Storage::url($user->image) }}" alt="" class="rounded mx-auto d-block" style="width:200px; height:200px"></td>
                            <td class="col-3 text-center" style="vertical-align: middle;">
                                <form method="POST" action="{{ route('users.destroy', $user->id) }}">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-warning">{{ __('dashboard/pages/users/index.show') }}</a>

                                    @if(auth()->user()->User_Type == "admin")
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">{{ __('dashboard/pages/users/index.edit') }}</a>
                                        <button type="submit" class="btn btn-danger">{{ __('dashboard/pages/users/index.delete') }}</button>
                                    @endif
                                </form>
                            </td>
                        </tr>
                    @empty
                        <div class="alert alert-danger text-center my-5 mx-auto">
                            <span>{{ __('dashboard/pages/users/index.no_users') }} <a href="{{ route('users.create') }}" class="text-danger">{{ __('dashboard/pages/users/index.add_user') }}</a></span>
                        </div>
                    @endforelse
                    </tbody>
                </table>
                <!-- End Bordered Table -->

                <div class="my-4">
                    {{ $users->links() }}
                </div>

            </div>
        </div>
    </main>
@endsection
