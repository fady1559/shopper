@extends('dashboard.layouts.master')

@section('title', __('dashboard/pages/users/show_moderators.show_moderators'))
@section('main-content')
    <div class="col-12 mt-5">
        <div class="p-4">
            <div class="d-flex justify-content-end flex-wrap">
                <a href="{{ route('users.create') }}" class="btn btn-success">
                    <span>{{ __('dashboard/pages/users/show_moderators.add_user') }}</span>
                </a>
            </div>
        </div>
    </div>

    <main id="main" class="main mt-1">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ __('dashboard/pages/users/show_moderators.bordered_table') }}</h5>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">{{ __('dashboard/pages/users/show_moderators.id') }}</th>
                        <th scope="col">{{ __('dashboard/pages/users/show_moderators.name') }}</th>
                        <th scope="col">{{ __('dashboard/pages/users/show_moderators.email') }}</th>
                        <th scope="col">{{ __('dashboard/pages/users/show_moderators.user_type') }}</th>
                        <th scope="col">{{ __('dashboard/pages/users/show_moderators.action') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($moderators as $moderator)
                        <tr>
                            <th scope="row">{{ $moderator->id }}</th>
                            <td>{{ $moderator->name }}</td>
                            <td>{{ $moderator->email }}</td>
                            <td>{{ $moderator->User_Type }}</td>
                            <td class="text-center" style="vertical-align: middle;">
                                <img src="{{ Storage::url($moderator->image) }}" alt="" class="rounded mx-auto d-block" style="width:200px; height:200px">
                            </td>
                            <td class="col-3 text-center" style="vertical-align: middle;">
                                <form method="POST" action="{{ route('users.destroy', $moderator->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('users.show', $moderator->id) }}" class="btn btn-warning">{{ __('dashboard/pages/users/show_moderators.show') }}</a>
                                    @if(auth()->user()->User_Type == "admin")
                                        <a href="{{ route('users.edit', $moderator->id) }}" class="btn btn-primary">{{ __('dashboard/pages/users/show_moderators.edit') }}</a>
                                        <button type="submit" class="btn btn-danger">{{ __('dashboard/pages/users/show_moderators.delete') }}</button>
                                    @endif
                                </form>
                            </td>
                        </tr>
                    @empty
                        <div class="alert alert-danger text-center my-5 mx-auto">
                            <span>{{ __('dashboard/pages/users/show_moderators.no_moderators') }} <a href="{{ route('users.create') }}" class="text-danger">{{ __('dashboard/pages/users/show_moderators.add_moderators_here') }}</a></span>
                        </div>
                    @endforelse
                    </tbody>
                </table>

                <div class="my-4">
                    {{ $moderators->links() }}
                </div>

            </div>
        </div>
    </main>
@endsection
