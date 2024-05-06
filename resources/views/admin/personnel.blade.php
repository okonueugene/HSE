@include('commons.header')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="add-button">
            <a href="#" class="btn btn-primary btn-sm  float-end mx-2" data-bs-toggle="modal"
                data-bs-target="#addPersonellModal">Add
                Personnel</a>
        </div>
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span>Personnel Detail</h4>
        <!-- DataTable with Buttons -->

        <div class="card bg-white">
            <div class="table bg-white">
                <table class="table table-hover table-bordered bg-white">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Designation</th>
                            <th>Date</th>
                            <th>Head Count</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($personells as $personnel)
                            <tr>
                                <td>{{ $personnel->id }}</td>
                                <td>{{ $personnel->designation }}</td>
                                <td>{{ $personnel->date }}</td>
                                <td>{{ $personnel->number }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-secondary dropdown-toggle btn-sm"
                                            data-bs-toggle="dropdown" data-bs-display="static"
                                            aria-expanded="false">Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="#" class="dropdown-item" data-bs-toggle="modal"
                                                    data-personnel="{{ $personnel }}"
                                                    data-bs-target="#viewPersonellModal">View</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- viewPersonellModal --}}
    <div class="modal fade" id="viewPersonellModal" tabindex="-1" aria-labelledby="viewPersonellModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewPersonellModalLabel">Personnel Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="personellDetail">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-name">Designation</label>
                                <input type="text" class="form-control" id="basic-default-name" name="name"
                                    readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label
                                    ">Date</label>
                                <input type="text" class="form-control" id="basic-default-date" name="created_at"
                                    readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Head Count</label>
                                <input type="text" class="form-control" id="basic-default-headcount"
                                    name="head_count" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Added By</label>
                            <input type="text" class="form-control" id="basic-default-addedby" name="added_by"
                                readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- addPersonellModal --}}
<div class="modal fade" id="addPersonellModal" tabindex="-1" aria-labelledby="addPersonellModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPersonellModalLabel">Add Personnel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="personellDetail">
                <form action="{{ route('personnel.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-name">Designation</label>
                        <input type="text" class="form-control" id="basic-default-name" name="designation" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-headcount">Head Count</label>
                        <input type="number" class="form-control" id="basic-default-headcount" name="number"
                            required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@include('commons.footer')

<script>
    $('#viewPersonellModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var personnel = button.data('personnel')
        var modal = $(this)
        modal.find('.modal-body #basic-default-name').val(personnel.name)
        modal.find('.modal-body #basic-default-date').val(personnel.date)
        modal.find('.modal-body #basic-default-headcount').val(personnel.number)
    })
</script>
