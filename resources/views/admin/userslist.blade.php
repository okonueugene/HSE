@include('commons.header')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Users List Table -->
        <div class="card">
            <div class="card-header text-center">
                <span>
                    Manage Users
                </span>
                <div class="add-user float-end">
                    <a href="javascript:void(0)" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal"
                        data-bs-target="#addUserModal">Add User</a>
                </div>
            </div>
            <div class="card">
                <div class="table">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th class="sorting_1">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkAll">
                                        <label class="custom-control-label" for="checkAll"></label>
                                    </div>
                                </th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Role</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($users)
                                @foreach ($users as $user)
                                    <tr class="odd">
                                        <td class="sorting_1">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                <label class="custom-control-label" for="customCheck1"></label>
                                            </div>
                                        </td>
                                        <td class="text-center">{{ $user->name }}</td>
                                        <td class="text-center">{{ $user->roles->pluck('name') }}</td>
                                        <td class="text-center">
                                            <span class="badge bg-success">Active</span>

                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">Action<span class="caret"></span></button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item"
                                                            href="{{ route('userslist.edit', $user->id) }}">Edit</a>
                                                    </li>
                                                    <li>
                                                        <form action="{{ route('userslist.destroy', $user->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item">Delete</button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr class="odd">
                                    <td class="sorting_1">
                                        <div class="d-flex align-items-center">
                                            <div class="ml-3">
                                                <p class="mb-0">No Users Found</p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <br>
        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
            <div class="card card-bordered w-50 mx-auto">
                <ul class="pagination justify-content-center" style="margin:10px 10px">
                    {{ $users->links() }}
                </ul><!-- .pagination -->
            </div>
        </div>
    </div>
</div>
<!-- / Content -->
<!-- Add User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('userslist.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">User Name</label>
                        <input type="text" class="form-control" name="name" id="name"
                            placeholder="Enter User Name">
                    </div>
                    <div class="error">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" id="email"
                            placeholder="Enter Email">
                    </div>
                    <div class="error">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="text" class="form-control" name="password" id="password"
                            placeholder="Enter Password">
                    </div>
                    <div class="error">
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password Confirmation</label>
                        <input type="text" class="form-control" name="password_confirmation"
                            id="password_confirmation" placeholder="Password Confirmation">
                    </div>
                    <div class="error">
                        @error('password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Role</label>
                        <select class="form-select" name="role" id="role">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="error">
                        @error('role')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                    </div>
            </form>
        </div>
    </div>
</div>



@include ('commons.footer')
<script></script>
