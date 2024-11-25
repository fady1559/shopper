@extends('dashboard.layouts.master')

@section('title', __('dashboard/pages/sub_categories/index.title'))
@section('main-content')
    <div class="col-12 mt-5">
        <div class="p-4">
            <div class="d-flex justify-content-end flex-wrap">
                <a href="{{ route('subcategories.create') }}" class="btn btn-success">
                    <span>{{ __('dashboard/pages/sub_categories/index.add_subcategory') }}</span>
                </a>
            </div>
        </div>
    </div>

    <main id="main" class="main mt-1">
        {{-- Success messages --}}
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
        @if(session('delete_subcategory'))
            <div class="alert alert-danger mx-3">
                {{ session('delete_subcategory') }}
            </div>
        @endif

        {{-- Error --}}
        @if(session('error'))
            <div class="alert alert-danger mx-3">
                {{ session('error') }}
            </div>
        @endif

        <div class="card">
            <div class="search-bar my-2">
                <form class="search-form d-flex align-items-center" method="GET" action="{{ route('dashboard.search.subcategories') }}">
                    <input style="display:block;width:100%" class="m-2 fs-4 p-2" type="text" name="query" placeholder="{{ __('dashboard/pages/sub_categories/index.search_placeholder') }}" title="Enter search keyword">
                    <button type="submit" title="Search" class="p-2" style="margin-left:-40px; margin-bottom:2px"><i class="bi bi-search fs-4"></i></button>
                </form>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">{{ __('dashboard/pages/sub_categories/index.id') }}</th>
                        <th scope="col">{{ __('dashboard/pages/sub_categories/index.name') }}</th>
                        <th scope="col">{{ __('dashboard/pages/sub_categories/index.category_title') }}</th>
                        <th scope="col">{{ __('dashboard/pages/sub_categories/index.description') }}</th>
                        <th scope="col">{{ __('dashboard/pages/sub_categories/index.image') }}</th>
                        <th scope="col">{{ __('dashboard/pages/sub_categories/index.status') }}</th>
                        <th scope="col">{{ __('dashboard/pages/sub_categories/index.action') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($subcategories as $subcategory)
                        <tr>
                            <th class="col-1" scope="row">{{ $subcategory->id }}</th>
                            <td class="col-1">{{ $subcategory->name }}</td>
                            <td class="col-1">{{ $subcategory->category->title }}</td>
                            <td class="text-truncate" style="max-width: 150px;">{{ Str::words($subcategory->description, 5, '....') }}</td>
                            <td class="text-center" style="vertical-align: middle;"><img src="{{ Storage::url($subcategory->image) }}" alt="" class="rounded mx-auto d-block" style="width:200px; height:200px"></td>
                            <td class="text-center" style="vertical-align: middle;">
                                @if($subcategory->status == 1)
                                    <span class="badge badge-success" style="font-size: 1.2em; padding: 0.5em 1em;">{{ __('dashboard/pages/sub_categories/index.status_showing') }}</span>
                                @else
                                    <span class="badge badge-danger" style="font-size: 1.2em; padding: 0.5em 1em;">{{ __('dashboard/pages/sub_categories/index.status_hidden') }}</span>
                                @endif
                            </td>
                            <td class="col-3 text-center" style="vertical-align: middle;">
                                <form method="POST" action="{{ route('subcategories.destroy', $subcategory->id) }}">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('subcategories.show', $subcategory->id) }}" class="btn btn-warning">{{ __('dashboard/pages/sub_categories/index.show') }}</a>

                                    @if(auth()->user()->User_Type == "admin")
                                        <a href="{{ route('subcategories.edit', $subcategory->id) }}" class="btn btn-primary my-1">{{ __('dashboard/pages/sub_categories/index.edit') }}</a>
                                        <button type="submit" class="btn btn-danger my-1">{{ __('dashboard/pages/sub_categories/index.delete') }}</button>
                                    @endif
                                </form>
                            </td>
                        </tr>
                    @empty
                        <div class="alert alert-danger text-center my-5 mx-auto">
                            <span>{!! str_replace(':link', route('subcategories.create'), __('dashboard/pages/sub_categories/index.no_subcategories')) !!}</span>
                        </div>
                    @endforelse
                    </tbody>
                </table>

                <div class="my-4">
                    {{ $subcategories->links() }}
                </div>
            </div>
        </div>
    </main>
@endsection
