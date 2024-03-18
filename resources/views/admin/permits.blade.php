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
                            <th>Type Of Permit</th>
                            <th>Date</th>
                            <th>Authorized Person</th>
                            <th>Competent Person</th>
                            <th>Area Owner</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($permits as $permit)
                            <tr>
                                <td>{{ $permit->type_of_permit }}</td>
                                <td>{{ $permit->date }}</td>
                                <td>{{ $permit->authorized_person }}</td>
                                <td>{{ $permit->competent_person }}</td>
                                <td>{{ $permit->area_owner }}</td>
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
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="type_of_permit" class="form-label">Type Of Permit</label>
                                <select class="form-select" id="type_of_permit" name="type_of_permit" required>
                                    <option value="">Select Permit</option>
                                    <option value="General Work">General Work</option>
                                    <option value="Hot Work">Hot Work</option>
                                    <option value="Cold Work">Cold Work</option>
                                    <option value="Confined Space Entry">Confined Space Entry</option>
                                    <option value="Work At Height">Work At Height</option>
                                    <option value="Excavation/Demolition">Excavation/Demolition</option>
                                    <option value="Live Electrical Work">Live Electrical Work</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" class="form-control" id="date" name="date" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="authorized_person" class="form-label">Authorized Person</label>
                                <input type="text" class="form-control" id="authorized_person" name="authorized_person"
                                    placeholder="Authorized Person" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="competent_person" class="form-label">Competent Person</label>
                                <input type="text" class="form-control" id="competent_person" name="competent_person"
                                    placeholder="Competent Person" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="area_owner" class="form-label">Area Owner</label>
                                <input type="text" class="form-control" id="area_owner" name="area_owner"
                                    placeholder="Area Owner" required>
                            </div>
                        </div>
                    </div>
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
