@include ('commons.header')
<!-- Content wrapper -->

<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="add-button ">
            <a href="javascript:void(0)" class="btn btn-primary float-end" data-bs-toggle="modal"
                data-bs-target="#addTaskModal">Add Permit</a>
        </div>
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span>Permits Applicable</h4>

        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="table">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>

                            <th>id</th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>SOR</th>
                            <th>Duration</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($permits as $permit)
                            <tr>
                                <td>{{ $permit->id }}</td>
                                <td>{{ $permit->user->name }}</td>
                                <td>{{ $permit->date }}</td>
                                <td>{{ $permit->sor }}</td>
                                <td>{{ $permit->duration }}</td>
                                <td>{{ $permit->status }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-secondary dropdown-toggle btn-sm"
                                            data-bs-toggle="dropdown" data-bs-display="static"
                                            aria-expanded="false">Action </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{ route('user-permits.show', $permit->id) }}"
                                                    class="dropdown-item">View</a>
                                            </li>
                                            </li>
                                            <li>
                                                <a href="{{ route('user-permits.update', $permit->id) }}"
                                                    class="dropdown-item">Edit</a>
                                            </li>

                                            <li>
                                                <form action="{{ route('user-permits.destroy', $permit->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Are you sure you want to delete this permit?');">
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
                </table>
            </div>
        </div>

    </div>
</div>

<!-- / Content wrapper -->
<!-- Add Task Modal -->

<div class="modal fade" id="addTaskModal" tabindex="-1" role="dialog" aria-labelledby="addTaskModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <!-- Form -->
            <form>
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addTaskModalLabel">Add Permit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Permit</button>
                </div>
            </form>
            <!-- / Form -->
        </div>
    </div>
</div>
<!-- / Content -->
@include ('commons.footer')
