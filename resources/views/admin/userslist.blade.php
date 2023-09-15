@include('commons.header')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Users List Table -->
        <div class="card">
            <div class="card-datatable table-responsive">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                    <table class="datatables-users table border-top dataTable no-footer" id="DataTables_Table_0"
                        aria-describedby="DataTables_Table_0_info">
                        <thead>
                            <tr>
                                <th class="control sorting_disabled" rowspan="1" colspan="1"></th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1">User</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1">Role</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1">Status</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($users)
                                @foreach ($users as $user)
                                    <tr class="odd">
                                        <td class="dtr-control" tabindex="0">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="check1">
                                                <label class="custom-control-label" for="check1"></label>
                                            </div>
                                        </td>
                                        <td class="sorting_1">
                                            <div class="d-flex align-items-center">
                                                <div class="ml-3">
                                                    <p class="mb-0">John Doe</p>
                                                    <p class="mb-0">
                                                        <small>
                                                            <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                                        </small>
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="mb-0">Admin</p>
                                        </td>
                                        <td>
                                            <p class="mb-0">Active</p>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button"
                                                    class="btn btn-sm btn-outline-secondary dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">Actions</button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Edit</a>
                                                    <a class="dropdown-item" href="#">Delete</a>
                                                </div>
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
@include ('commons.footer')
