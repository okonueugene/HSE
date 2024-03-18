@include('commons.header')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span>Open SORs</h4>
        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="table">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Observation</th>
                            <th>Steps Taken</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($sors as $sor)
                            <tr>
                                <td>{{ $sor->id }}</td>
                                <td>{{ $sor->observation }}</td>
                                <td>{{ $sor->steps_taken }}</td>
                                <td>{{ $sor->date }}</td>
                                <td>
                                    @if ($sor->status == 0)
                                        <span class="badge bg-danger">Open</span>
                                    @else
                                        <span class="badge bg-success">Closed</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-secondary dropdown-toggle btn-sm"
                                            data-bs-toggle="dropdown" data-bs-display="static"
                                            aria-expanded="false">Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="#" class="dropdown-item" data-bs-toggle="modal"
                                                    data-sor="{{ $sor }}"
                                                    data-bs-target="#viewSorModal">View</a>
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
    {{-- viewSorModal --}}
    <div class="modal fade" id="viewSorModal" tabindex="-1" aria-labelledby="viewSorModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewSorModalLabel">View SOR</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-observation">Observation</label>
                        <input type="text" class="form-control" id="basic-default-observation" name="observation"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-steps-taken">Steps Taken</label>
                        <input type="text" class="form-control" id="basic-default-steps-taken" name="steps_taken"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-date">Date</label>
                        <input type="text" class="form-control" id="basic-default-date" name="created_at" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-status">Status</label>
                        <input type="text" class="form-control" id="basic-default-status" name="status" readonly>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Media</label>
                        <div id="mediaContainer"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
@include('commons.footer')
<script>
    $('#viewSorModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var sor = button.data('sor') // Extract info from data-* attributes
        var modal = $(this)
        modal.find('.modal-body #basic-default-observation').val(sor.observation)
        modal.find('.modal-body #basic-default-steps-taken').val(sor.steps_taken)
        modal.find('.modal-body #basic-default-date').val(sor.date)
        if (sor.status == 0) {
            modal.find('.modal-body #basic-default-status').val('Open')
        } else {
            modal.find('.modal-body #basic-default-status').val('Closed')
        }
        // if (incident.media.length > 0) {
        //     var mediaHtml = '';
        //     for (var i = 0; i < incident.media.length; i++) {
        //         const regex = /http:\/\/localhost\/storage\//;
        //         let media = incident.media[i].original_url.replace(regex, '');
        //         // Pass the media through the asset helper
        //         media = "{{ asset('storage') }}/" + media;

        //         // Create a container for each media and its title
        //         mediaHtml += '<div class="media-item">';
        //         mediaHtml += '<img src="' + media + '" class="img-fluid" alt="img">';
        //         mediaHtml += '<div class="media-title">Media ' + (incident.media[i].file_name) +
        //             '</div>';
        //         mediaHtml += '</div>';
        //     }
        //     $('#mediaContainer').html(mediaHtml);
        // } else {
        //     $('#mediaContainer').html('No media available.');
        // }

        // Display media if available
        if (sor.media.length > 0) {
            var mediaHtml = '';

            for (var i = 0; i < sor.media.length; i++) {
                const regex = /http:\/\/localhost\/storage\//;
                let media = sor.media[i].original_url.replace(regex, '');
                // Pass the media through the asset helper
                media = "{{ asset('storage') }}/" + media;

                // Create a container for each media and its title
                mediaHtml += '<div class="media-item">';
                mediaHtml += '<img src="' + media + '" class="img-fluid" alt="img">';
                mediaHtml += '<div class="media-title">Media ' + (sor.media[i].file_name) +
                    '</div>';
                mediaHtml += '</div>';
            }
            $('#mediaContainer').html(mediaHtml);
        } else {
            $('#mediaContainer').html('No media available.');
        }
    })
</script>
