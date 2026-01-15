@section('title', 'All Users')
@extends('layouts.admin.master')
@section('content')
    <div class="container-fluid user-list-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header card-no-border text-end">
                        {{-- <div class="card-header-right-icon">
                            <a class="btn btn-primary f-w-500" href="{{ route('users.create') }}"><i
                                    class="fa-solid fa-plus pe-2"></i>Add
                                User</a>
                        </div> --}}
                    </div>
                    <div class="card-body pt-0 px-0">
                        <div class="list-product user-list-table">
                            <div class="table-responsive custom-scrollbar">
                                <table class="table" id="users-table">
                                    <thead>
                                        <tr>
                                            <th>
                                                <span class="c-o-light f-w-600">Name</span>
                                            </th>
                                            <th>
                                                <span class="c-o-light f-w-600">Email</span>
                                            </th>
                                            <th>
                                                <span class="c-o-light f-w-600">Role</span>
                                            </th>
                                            <th>
                                                <span class="c-o-light f-w-600">Creation Date</span>
                                            </th>
                                            <th>
                                                <span class="c-o-light f-w-600">Actions</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($users as $user)
                                            <tr class="product-removes inbox-data">
                                                <td><a href="user-profile.html">{{ $user->name }}</a></td>
                                                <td>
                                                    <p>{{ $user->email }}</p>
                                                </td>
                                                <td>
                                                    <span
                                                        class="badge badge-light-success">{{ $user->roles->first()->name }}</span>
                                                </td>
                                                <td>
                                                    <p>{{ $user->created_at->format('d M Y, H:i A') }}</p>
                                                </td>
                                                {{-- <td>
                                                    <div class="common-align gap-2 justify-content-start">
                                                        <a class="square-white" href="add-user.html">
                                                            <span><i class="fa-solid fa-pen"></i></span>
                                                        </a>
                                                        <a class="square-white trash-7" href="#!">
                                                            <span><i class="fa-solid fa-trash"></i></span>
                                                        </a>
                                                        <a class="square-white" href="#!">
                                                            <span><i class="fa-solid fa-eye"></i></span>
                                                        </a>
                                                    </div>
                                                </td> --}}
                                                <td>
                                                    <div class="form-check form-switch form-check-inline custom-switch ps-0">
                                                        <select class="form-select approval-select"
                                                            data-id="{{ $user->id }}"
                                                            data-current="{{ $user->approval_status }}">
                                                            <option value="pending"
                                                                {{ $user->approval_status === 'pending' ? 'selected' : '' }}>
                                                                Pending
                                                            </option>
                                                            <option value="approved"
                                                                {{ $user->approval_status === 'approved' ? 'selected' : '' }}>
                                                                Approved
                                                            </option>
                                                            <option value="rejected"
                                                                {{ $user->approval_status === 'rejected' ? 'selected' : '' }}>
                                                                Rejected
                                                            </option>
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">
                                                    <h3 class="pt-5">No @yield('title', 'Dashboard') Found</h3>
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
@push('scripts')
    <script>
        $(document).on('change', '.approval-select', function() {

            let select = $(this);
            let userId = select.data('id');
            let previousValue = select.data('current');
            let status = select.val();

            let titleText = 'Update status?';
            if (status === 'approved') titleText = 'Approve this user?';
            if (status === 'rejected') titleText = 'Reject this user?';

            Swal.fire({
                title: titleText,
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, Continue",
                cancelButtonText: "Cancel",
            }).then((result) => {

                if (result.isConfirmed) {

                    $.ajax({
                        url: "{{ route('admin.users.approval') }}",
                        type: "POST",
                        data: {
                            id: userId,
                            status: status,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(res) {

                            Swal.fire({
                                icon: "success",
                                title: "Success",
                                text: res.message,
                                timer: 1200
                            });

                            // update current value
                            select.data('current', status);
                        }
                    });

                } else {
                    // revert to old value
                    select.val(previousValue);
                }

            });

        });
    </script>
@endpush
