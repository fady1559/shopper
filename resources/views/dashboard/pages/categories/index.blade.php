@extends('dashboard.layouts.master')

@section('title', __('dashboard/pages/categories/index.categories'))

@section('main-content')
    <div class="col-12 mt-5">
        <div class="p-4">
            <div class="d-flex justify-content-end flex-wrap">
                <a href="{{ route('categories.create') }}" class="btn btn-success">
                    <span>{{ __('dashboard/pages/categories/index.add_category') }}</span>
                </a>
            </div>
        </div>
    </div>

    <main id="main" class="main mt-1">
        {{-- Created success --}}
        @if(session('success'))
            <div class="alert alert-success mx-3">
                {{ session('success') }}
            </div>
        @endif

        {{-- Update successfully --}}
        @if(session('update'))
            <div class="alert alert-success mx-3">
                {{ session('update') }}
            </div>
        @endif

        {{-- Delete successfully --}}
        @if(session('delete'))
            <div class="alert alert-danger mx-3">
                {{ session('delete') }}
            </div>
        @endif

        <div class="card">
            <div class="search-bar my-2">
                <form class="search-form d-flex align-items-center" method="GET" action="{{ route('dashboard.search.categories') }}">
                    <input style="display:block;width:100%" class="m-2 fs-4 p-2" type="text" name="query" placeholder="{{ __('dashboard/pages/categories/index.search_placeholder') }}" title="Enter search keyword">
                    <button type="submit" title="Search" class="p-2" style="margin-left:-40px; margin-bottom:2px"><i class="bi bi-search fs-4"></i></button>
                </form>
            </div>

            <div class="card-body">
                <h5 class="card-title">{{ __('dashboard/pages/categories/index.categories') }}</h5>

                <!-- Table with stripped rows -->
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">{{ __('dashboard/pages/categories/index.id') }}</th>
                        <th scope="col">{{ __('dashboard/pages/categories/index.title') }}</th>
                        <th scope="col">{{ __('dashboard/pages/categories/index.description') }}</th>
                        <th scope="col">{{ __('dashboard/pages/categories/index.image') }}</th>
                        <th scope="col">{{ __('dashboard/pages/categories/index.create_by') }}</th>
                        <th scope="col">{{ __('dashboard/pages/categories/index.update_by') }}</th>
                        <th scope="col">{{ __('dashboard/pages/categories/index.created_at') }}</th>
                        <th scope="col">{{ __('dashboard/pages/categories/index.updated_at') }}</th>
                        <th scope="col">{{ __('dashboard/pages/categories/index.action') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <th>{{ $category->id }}</th>
                            <td>{{ $category->title }}</td>
                            <td class="text-truncate" style="max-width: 150px;">{{ Str::words($category->description, 5, '....') }}</td>
                            <td><img src="{{ Storage::url($category->image) }}" alt="" class="rounded mx-auto d-block" style="width:200px; height:200px"></td>
                            <td>{{ $category->create_user->name ?? 'N/A' }}</td>
                            <td>{{ $category->update_user->name ?? 'N/A' }}</td>
                            <td>{{ $category->created_at ? $category->created_at->format('Y-m-d H:i:s') : 'N/A' }}</td>
                            <td>{{ $category->updated_at ? $category->updated_at->format('Y-m-d H:i:s') : 'N/A' }}</td>
                            <td>
                                <form method="POST" action="{{ route('categories.destroy', $category->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('categories.show', $category->id) }}" class="btn btn-warning">{{ __('dashboard/pages/categories/index.show') }}</a>

                                    @if(auth()->user()->User_Type=="admin")
                                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">{{ __('dashboard/pages/categories/index.edit') }}</a>
                                        <button type="submit" class="btn btn-danger">{{ __('dashboard/pages/categories/index.delete') }}</button>
                                    @endif
                                </form>
                            </td>
                        </tr>
                    @empty
                        <div class="alert alert-danger text-center my-5 mx-auto">
                            <span>{{ __('dashboard/pages/categories/index.no_categories') }} <a href="{{ route('categories.create') }}" class="text-danger">{{ __('dashboard/pages/categories/index.add_categories_here') }}</a></span>
                        </div>
                    @endforelse
                    </tbody>
                </table>

                <!-- End Table with stripped rows -->

                <div class="my-4">
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </main>
@endsection
