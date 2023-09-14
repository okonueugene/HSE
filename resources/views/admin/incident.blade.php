@include('commons.header')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span>Incident Records</h4>

        <!-- DataTable with Buttons -->
        <div class="col-xl">
            <div class="card border-secondary mb-4 h-100 ">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Add A Record</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('incidents.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="">Incident Description</label>
                            <textarea class="form-control" name="incident_description" id="basic-default-observation" placeholder="This ...."
                                rows="4"></textarea>
                            <div class="error">
                                @error('incident_description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-status">Investigation Status</label>
                            <select class="form-select" id="basic-default-status" name="investigation_status">
                                <option value="open">Open</option>
                                <option value="closed">Closed</option>
                            </select>
                            <div class="error">
                                @error('investigation_status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-incident_status">Incident Status</label>
                            <select class="form-select" id="basic-default-incident_status" name="incident_status">
                                <option value="no">Open</option>
                                <option value="yes">Closed</option>
                            </select>
                            <div class="error">
                                @error('incident_status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="media">Media</label>
                            <input type="file" class="form-control" id="media" name="media[]" multiple>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-due">Incident Type</label>
                            <select class="form-select" id="basic-default-due" name="incident_type_id">
                                <option>Select Record Type</option>
                                @foreach ($incident_types as $type)
                                    <option value="{{ $type->id }}">{{ $type->incident_type }}</option>
                                @endforeach

                            </select>
                            <div class="error">
                                @error('incident_type_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>
<!-- / Content -->

@include('commons.footer')
