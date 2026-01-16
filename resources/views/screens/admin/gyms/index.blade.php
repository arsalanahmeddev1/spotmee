@section('title', 'All Gyms')
@extends('layouts.admin.master')
@section('content')
    <div class="container-fluid user-list-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header card-no-border text-end">
                        <div class="card-header-right-icon">
                        <a class="btn btn-primary f-w-500" href="{{ route('gyms.create') }}"><i
                                class="fa-solid fa-plus pe-2"></i>Add
                            Gym</a>
                    </div>
                    </div>
                    <div class="card-body pt-0 px-0">
                        <div class="list-product user-list-table">
                            <div class="table-responsive custom-scrollbar">
                                <table class="table" id="gyms-table">
                                    <thead>
                                        <tr>
                                            <th>
                                                <span class="c-o-light f-w-600">Image</span>
                                            </th>
                                            <th>
                                                <span class="c-o-light f-w-600">Name</span>
                                            </th>
                                            <th>
                                                <span class="c-o-light f-w-600">Price</span>
                                            </th>
                                            <th>
                                                <span class="c-o-light f-w-600">Category</span>
                                            </th>
                                            <th>
                                                <span class="c-o-light f-w-600">Location</span>
                                            </th>
                                            <th>
                                                <span class="c-o-light f-w-600">Phone</span>
                                            </th>
                                            <th>
                                                <span class="c-o-light f-w-600">Actions</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($gyms as $gym)
                                        <tr class="product-removes inbox-data">
                                            <td>
                                                <div class="product-img">
                                                    <img src="{{ asset($gym->image) }}" alt="{{ $gym->name }}"
                                                        style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">
                                                </div>
                                            </td>
                                            <td>
                                                <p class="f-w-600 mb-0">{{ $gym->name }}</p>
                                            </td>
                                            <td>${{ number_format($gym->price, 2) }}</td>
                                            <td class="text-capitalize">{{ str_replace('_', ' ', $gym->category) }}</td>
                                            <td>{{ $gym->city }}, {{ $gym->state }}</td>
                                            <td>{{ $gym->phone }}</td>
                                            <td>
                                                <div class="common-align gap-2 justify-content-start">
                                                    <a class="square-white" href="{{ route('gyms.edit', ['id' => $gym->id]) }}">
                                                        <span><i class="fa-solid fa-pencil"></i></span>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="7" class="text-center">
                                                <h3 class="pt-5">No Gyms Found</h3>
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
