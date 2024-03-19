@include('commons.header')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="add-button ">
            <a href="#" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#addFirstResponderModal">Add
                First Responder</a>
        </div>
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span>First Responder</h4>

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
                        @foreach ($firstResponders as $firstResponder)
                            <tr>
                                <td>{{ $firstResponder->id }}</td>
                                <td>{{ $firstResponder->name }}</td>
                                <td>{{ $firstResponder->date }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-secondary dropdown-toggle btn-sm"
                                            data-bs-toggle="dropdown" data-bs-display="static"
                                            aria-expanded="false">Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="#" class="dropdown-item" data-bs-toggle="modal"
                                                    data-firstResponder="{{ $firstResponder }}"
                                                    data-bs-target="#viewFirstResponderModal">View</a>
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
    {{-- viewFirstResponderModal --}}
    <div class="modal fade" id="viewFirstResponderModal" tabindex="-1" aria-labelledby="viewFirstResponderModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewFirstResponderModalLabel">First Responder Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="firstResponderDetails">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="firstResponderName" class="form-label
                                    fw-bold">Name</label>
                                <input type="text" class="form-control" id="firstResponderName" name="name"
                                    readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="firstResponderDate" class="form-label fw-bold">Date</label>
                                <input type="text" class="form-control" id="firstResponderDate" name="date"
                                    readonly>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="firstResponderType" class="form-label fw-bold">Type</label>
                            <input type="text" class="form-control" id="firstResponderType" name="type"
                                readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- addFirstResponderModal --}}
<div class="modal fade" id="addFirstResponderModal" tabindex="-1" aria-labelledby="addFirstResponderModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addFirstResponderModalLabel">Add First Responder</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="firstResponderDetails">
                <form action="{{ route('first-responder.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label fw-bold">Date</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label fw-bold">Type</label>
                        <select class="form-select" id="type" name="type" required>
                            <option value="" selected>Select Type</option>
                            <option value="fire_marshal">Fire Marshal</option>
                            <option value="first_aider">First Aider</option>
                        </select>
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
    $('#viewFirstResponderModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var firstResponder = button.data('firstResponder')
        var modal = $(this)
        modal.find('.modal-body #firstResponderName').val(firstResponder.name)
        modal.find('.modal-body #firstResponderDate').val(firstResponder.date)
        modal.find('.modal-body #firstResponderType').val(firstResponder.type)
    })


</script>
