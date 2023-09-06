@include('commons.header')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span>ICA Records</h4>

        <!-- DataTable with Buttons -->
        <div class="col-xl">
            <div class="card border-secondary mb-4 h-100 ">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Add A Record</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('sor.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-observation">Observation</label>
                            <input type="text" name="observation" class="form-control" id="basic-default-observation"
                                placeholder="This ....">
                            <div class="error">
                                @error('observation')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-status">Status</label>
                            <select class="form-select" id="basic-default-status" name="status">
                                <option value="0">Open</option>
                                <option value="1">Closed</option>
                            </select>
                            <div class="error">
                                @error('status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-stepstaken">Steps Taken</label>
                            <input type="text" class="form-control" name="steps_taken" id="basic-default-stepstaken"
                                placeholder="steps taken">
                            <div class="error">
                                @error('steps_taken')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-actionowner">Action Owner</label>
                            <select class="form-select" id="basic-default-actionowner" name="assignee_id">
                                <option>Select Action Owner</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }} {{ $user->surname }}
                                    </option>
                                @endforeach

                            </select>
                            <div class="error">
                                @error('assignee_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-image">Images</label>
                            <input type="file" class="form-control" id="basic-default-image" name="images[]"
                                multiple>
                        </div>
                        {{-- <div class="mb-3">
                            <label class="form-label" for="basic-default-due">ICA Type</label>
                            <select class="form-select" id="basic-default-due" name="type_id">
                                <option>Select Record Type</option>
                                @foreach ($sor_types as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach

                            </select>
                            <div class="error">
                                @error('type_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div> --}}
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>
<!-- / Content -->

@include('commons.footer')
