@extends('dashboard.layouts.master')

@section('title', __('dashboard/pages/users/delete.deleted_users'))

@section('main-content')

    <main id="main" class="main mt-6">

        <div class="card">
            <div class="card-body">
                {{-- delete success --}}
                @if(session('delete_user'))
                    <div class="alert alert-danger mx-3 mt-1">
                        {{ session('delete_user') }}
                    </div>
                @endif

                <h5 class="card-title">{{ __('dashboard/pages/users/delete.deleted_users') }}</h5>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">{{ __('dashboard/pages/users/delete.id') }}</th>
                        <th scope="col">{{ __('dashboard/pages/users/delete.name') }}</th>
                        <th scope="col">{{ __('dashboard/pages/users/delete.email') }}</th>
                        <th scope="col">{{ __('dashboard/pages/users/delete.user_type') }}</th>
                        <th scope="col">{{ __('dashboard/pages/users/delete.image') }}</th>
                        @if(auth()->user()->User_Type == 'admin')
                            <th scope="col">{{ __('dashboard/pages/users/delete.action') }}</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($users as $user)
                        <tr>
                            <th class="col-1 text-center" style="vertical-align: middle;" scope="row">{{ $user->id }}</th>
                            <td class="text-center" style="vertical-align: middle;">{{ $user->name }}</td>
                            <td class="text-center" style="vertical-align: middle;">{{ $user->email }}</td>
                            <td class="text-center" style="vertical-align: middle;">{{ $user->User_Type }}</td>
                            <td class="text-center" style="vertical-align: middle;">
                                <img src="{{ Storage::url($user->image) }}" alt="" class="rounded mx-auto d-block" style="width:200px; height:200px">
                            </td>
                            <td class="text-center" style="vertical-align: middle;">{{ $user->deleted_at ? $user->deleted_at->format('Y-m-d H:i:s') : 'N/A' }}</td>
                            @if(auth()->user()->User_Type == 'admin')
                                <td class="col-1 text-center" style="vertical-align: middle;">
                                    <div class="d-flex justify-content-between">
                                        <form action="{{ route('user.restore', $user->id) }}" method="GET">
                                            <button type="submit" class="btn btn-success btn-sm font-weight-bold fs-6 mx-1">{{ __('dashboard/pages/users/delete.restore') }}</button>
                                        </form>
                                        <form action="{{ route('user.forcedelete', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm font-weight-bold fs-6 mx-1">{{ __('dashboard/pages/users/delete.delete') }}</button>
                                        </form>
                                    </div>
                                </td>
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">
                                <div class="alert alert-danger my-5">
                                    <span>{{ __('dashboard/pages/users/delete.no_users') }} <a href="{{ route('users.create') }}" class="text-danger">{{ __('dashboard/pages/users/delete.add_users') }}</a></span>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>

                <div class="my-4">
                    {{ $users->links() }}
                </div>

            </div>
        </div>
    </main>
@endsection
