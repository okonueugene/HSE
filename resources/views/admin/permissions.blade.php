@include('commons.header')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-semibold mb-4 mx-auto text-center">permissions List</h4>
        <div class="button btn-success float-end">
            <a href="javascript:void(0)" class="btn btn-primary btn-sm">Add permission</a>
        </div>
        <p class="mb-4 mx-auto text-center">
            A permission provided access to predefined menus and features so that depending on <br> assigned permission
            an
            administrator can have access to what user needs.
        </p>
        <!-- permission cards -->

        <div class="col-xl">
            <div class="card border-secondary mb-4 h-100 ">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="card-body">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Guard Name</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $permission)
                                    <tr>
                                        <td>{{ $permission->id }}</td>
                                        <td>{{ $permission->name }}</td>
                                        <td>{{ $permission->guard_name }}</td>
                                        <td>{{ $permission->created_at }}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

            <div class="card card-bordered w-50 mx-auto">
                <div class="card-inner">
                    <ul class="pagination justify-content-center" style="margin:10px 10px">
                        {{ $permissions->links() }}
                    </ul><!-- .pagination -->
                </div><!-- .card-inner -->
            </div>
        </div>
    </div>
    <!-- / Content -->
    @include('commons.footer')
