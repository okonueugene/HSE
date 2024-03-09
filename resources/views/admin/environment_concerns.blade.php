@include('commons.header')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="add-button ">
            <a href="{{ route('environmental-policy-checklist') }}" class="btn btn-primary float-end mx-2">Add Policy
                Checklist</a>
            <a href="#" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addModal">Add Free
                Form</a>
        </div>
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span>Enviromental Concern</h4>

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
                        @foreach ($concerns as $permit)
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
                                            aria-expanded="false">Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{ route('user-concerns.show', $permit->id) }}"
                                                    class="dropdown-item">View</a>
                                            </li>
                                            </li>
                                            <li>
                                                <a href="{{ route('user-concerns.update', $permit->id) }}"
                                                    class="dropdown-item">Edit</a>
                                            </li>

                                            <li>
                                                <form action="{{ route('user-concerns.destroy', $permit->id) }}"
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>





<!-- / Content wrapper -->




@include('commons.footer')
