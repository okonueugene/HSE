@include('commons.header')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="add-button">
            <a href="#" class="btn btn-primary float-end" data-bs-toggle="modal"
                data-bs-target="#addSupervisorModal">Add
                Supervisor</a>
        </div>
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span>Supervisor’s Details</h4>



        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="table">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($supervisors as $supervisor)
                            <tr>
                                <td>{{ $supervisor->id }}</td>
                                <td>{{ $supervisor->name }}</td>
                                <td>{{ $supervisor->date }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-secondary dropdown-toggle btn-sm"
                                            data-bs-toggle="dropdown" data-bs-display="static"
                                            aria-expanded="false">Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="#" class="dropdown-item" data-bs-toggle="modal"
                                                    data-supervisor="{{ $supervisor }}"
                                                    data-bs-target="#viewSupervisorModal">View</a>
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
    {{-- viewSupervisorModal --}}
    <div class="modal fade" id="viewSupervisorModal" tabindex="-1" aria-labelledby="viewSupervisorModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewSupervisorModalLabel">Supervisor’s Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="supervisorDetail">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label
                                    ">Name</label>
                                <input type="text" class="form-control" id="name" name="name" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Date</label>
                                <input type="text" class="form-control" id="date" name="date" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

</div>

{{-- addSupervisorModal --}}
<div class="modal fade" id="addSupervisorModal" tabindex="-1" aria-labelledby="addSupervisorModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSupervisorModalLabel">Add Supervisor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="supervisorDetail">
                <form action="{{ route('supervisor.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@include('commons.footer')

<script>
    $('#viewSupervisorModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var supervisor = button.data('supervisor')
        var modal = $(this)
        modal.find('.modal-body #name').val(supervisor.name)
        modal.find('.modal-body #date').val(supervisor.date)
    })

</script>
