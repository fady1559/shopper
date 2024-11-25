@extends('dashboard.layouts.master')

@section('title', __('dashboard/pages/users/show_customers.show_customers'))
@section('main-content')
    <div class="col-12 mt-5">
        <div class="p-4">
            <div class="d-flex justify-content-end flex-wrap">
                <a href="{{ route('users.create') }}" class="btn btn-success">
                    <span>{{ __('dashboard/pages/users/show_customers.add_user') }}</span>
                </a>
            </div>
        </div>
    </div>

    <main id="main" class="main mt-1">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ __('dashboard/pages/users/show_customers.bordered_table') }}</h5>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">{{ __('dashboard/pages/users/show_customers.id') }}</th>
                        <th scope="col">{{ __('dashboard/pages/users/show_customers.name') }}</th>
                        <th scope="col">{{ __('dashboard/pages/users/show_customers.email') }}</th>
                        <th scope="col">{{ __('dashboard/pages/users/show_customers.user_type') }}</th>
                        <th scope="col">{{ __('dashboard/pages/users/show_customers.action') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($customers as $customer)
                        <tr>
                            <th scope="row">{{ $customer->id }}</th>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->User_Type }}</td>
                            <td class="text-center" style="vertical-align: middle;">
                                <img src="{{ Storage::url($customer->image) }}" alt="" class="rounded mx-auto d-block" style="width:200px; height:200px">
                            </td>
                            <td class="col-3 text-center" style="vertical-align: middle;">
                                <form method="POST" action="{{ route('users.destroy', $customer->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('users.show', $customer->id) }}" class="btn btn-warning">{{ __('dashboard/pages/users/show_customers.show') }}</a>
                                    @if(auth()->user()->User_Type == "admin")
                                        <a href="{{ route('users.edit', $customer->id) }}" class="btn btn-primary">{{ __('dashboard/pages/users/show_customers.edit') }}</a>
                                        <button type="submit" class="btn btn-danger">{{ __('dashboard/pages/users/show_customers.delete') }}</button>
                                    @endif
                                </form>
                            </td>
                        </tr>
                    @empty
                        <div class="alert alert-danger text-center my-5 mx-auto">
                            <span>{{ __('dashboard/pages/users/show_customers.no_customers') }} <a href="{{ route('users.create') }}" class="text-danger">{{ __('dashboard/pages/users/show_customers.add_customers_here') }}</a></span>
                        </div>
                    @endforelse
                    </tbody>
                </table>

                <div class="my-4">
                    {{ $customers->links() }}
                </div>

            </div>
        </div>
    </main>
@endsection
