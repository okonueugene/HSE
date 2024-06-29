@extends('layout.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        @if (auth()->user()->can('add_permit'))
            <div class="add-button ">
                <a href="javascript:void(0)" class="btn btn-primary float-end" data-bs-toggle="modal"
                    data-bs-target="#addPermitModal">Add Permit</a>
            </div>
        @endif
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
                                <td>{{ $permit->type }}</td>
                                <td>{{ $permit->date }}</td>
                                <td>{{ $permit->authorized_person }}</td>
                                <td>{{ $permit->competent_person }}</td>
                                <td>{{ $permit->area_owner }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-secondary dropdown-toggle btn-sm"
                                            data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="#" class="dropdown-item" data-bs-toggle="modal"
                                                    data-permit="{{ $permit }}"
                                                    data-bs-target="#viewPermitModal">View</a>

                                            </li>
                                            </li>
                                            {{-- <li>
                                            <a href="{{ route('user-permits.update', $permit->id) }}"
                                                class="dropdown-item">Edit</a>
                                        </li> --}}
                                            @if (auth()->user()->can('delete_permit'))
                                                <li>
                                                    <form action="{{ route('permits.destroy', $permit->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Are you sure you want to delete this permit?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item">Delete</button>
                                                    </form>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                </table>
            </div>
        </div>
        <div class="card card-bordered w-50 mx-auto mt-4">
            <div class="card-inner">
                <ul class="pagination justify-content-center" style="margin:10px 10px">
                    {{ $permits->links() }}
                </ul><!-- .pagination -->
            </div><!-- .card-inner -->
        </div>
    </div>
@endsection

@section('modals')
    <!-- Add Permit Modal -->

    <div class="modal fade" id="addPermitModal" tabindex="-1" role="dialog" aria-labelledby="addPermitModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

                <!-- Form -->
                <form action="{{ route('permits.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addPermitModalLabel">Add Permit</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="type_of_permit" class="form-label">Type Of Permit</label>
                                    <select class="form-select" id="type" name="type" required>
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
                                    <input type="text" class="form-control" id="authorized_person"
                                        name="authorized_person" placeholder="Authorized Person" required>
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
    <!-- / View Permit Modal -->

    <div class="modal fade" id="viewPermitModal" tabindex="-1" role="dialog" aria-labelledby="viewPermitModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewPermitModalLabel">View Permit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="permitDetail">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="type_of_permit" class="form-label">Type Of Permit</label>
                                <input type="text" class="form-control" id="type" name="type" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="date" class="form-label">Date</label>
                                <input type="text" class="form-control" id="date" name="date" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="authorized_person" class="form-label">Authorized Person</label>
                                <input type="text" class="form-control" id="authorized_person"
                                    name="authorized_person" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="competent_person" class="form-label">Competent Person</label>
                                <input type="text" class="form-control" id="competent_person" name="competent_person"
                                    readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="area_owner" class="form-label">Area Owner</label>
                                <input type="text" class="form-control" id="area_owner" name="area_owner" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $('#viewPermitModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var permit = button.data('permit')
            var modal = $(this)
            modal.find('.modal-body #type').val(permit.type)
            modal.find('.modal-body #date').val(permit.date)
            modal.find('.modal-body #authorized_person').val(permit.authorized_person)
            modal.find('.modal-body #competent_person').val(permit.competent_person)
            modal.find('.modal-body #area_owner').val(permit.area_owner)
        })
    </script>
@endsection