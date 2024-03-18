@include('commons.header')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span>Open Incidents</h4>
        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="table">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Investigation</th>
                            <th>Reporting Done</th>
                            <th>Date</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($incidents as $incident)
                            <tr>
                                <td>{{ $incident->id }}</td>
                                <td>{{ $incident->investigation_status == 'open' ? 'Open' : 'Closed' }}</td>
                                <td>{{ $incident->incident_status == 'yes' ? 'Done' : 'Not Done' }}</td>
                                <td>{{ $incident->incident_date }}</td>
                                <td>{{ $incident->incident_description }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-secondary dropdown-toggle btn-sm"
                                            data-bs-toggle="dropdown" data-bs-display="static"
                                            aria-expanded="false">Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="#" class="dropdown-item" data-bs-toggle="modal"
                                                    data-incident="{{ $incident }}"
                                                    data-bs-target="#viewIncidentModal">View</a>
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
        <br>
        <div class="card card-bordered w-50 mx-auto">
            <div class="card-inner">
                <ul class="pagination justify-content-center" style="margin:10px 10px">
                    {{ $incidents->links() }}
                </ul><!-- .pagination -->
            </div><!-- .card-inner -->
        </div><!-- .card -->
    </div>
    {{-- viewIncidentModal --}}
    <div class="modal fade" id="viewIncidentModal" tabindex="-1" aria-labelledby="viewIncidentModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewIncidentModalLabel">View Incident</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group">
                            <label class="form-label" for="">Incident Description</label>
                            <textarea class="form-control" name="incident_description" id="basic-default-observation" placeholder="This ...."
                                rows="4" readonly></textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="basic-default-status">Investigation Status</label>
                            <input type="text" class="form-control" id="basic-default-status"
                                name="investigation_status" readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="basic-default-incident_status">Incident Status</label>
                            <input type="text" class="form-control" id="basic-default-incident_status"
                                name="incident_status" readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="media">Date</label>
                            <input type="text" class="form-control" id="incident_date" name="incident_date" readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="basic-default-due">Incident Type</label>
                            <input type="text" class="form-control" id="basic-default-due" name="incident_type_id"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Media</label>
                            <div id="mediaContainer"></div>
                        </div>
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
    function formatIncidentType(incidentType) {
        // Replace underscores with spaces
        let formattedType = incidentType.replace(/_/g, ' ');

        // Capitalize the first letter of each word
        formattedType = formattedType.replace(/\b\w/g, function(char) {
            return char.toUpperCase();
        });

        return formattedType;
    }

    $('#viewIncidentModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var incident = button.data('incident') // Extract info from data-* attributes
        console.log(incident);
        var modal = $(this)
        modal.find('.modal-body textarea[name="incident_description"]').val(incident.incident_description)
        modal.find('.modal-body input[name="investigation_status"]').val(incident.investigation_status ==
            'open' ? 'Open' : 'Closed')
        modal.find('.modal-body input[name="incident_status"]').val(incident.incident_status == 'yes' ? 'Done' :
            'Not Done')
        modal.find('.modal-body input[name="incident_type_id"]').val(formatIncidentType(incident.incident_type
            .incident_type))
        modal.find('.modal-body input[name="incident_date"]').val(incident.incident_date)

        // Display media if available
        if (incident.media.length > 0) {
            var mediaHtml = '';
            for (var i = 0; i < incident.media.length; i++) {
                const regex = /http:\/\/localhost\/storage\//;
                let media = incident.media[i].original_url.replace(regex, '');
                // Pass the media through the asset helper
                media = "{{ asset('storage') }}/" + media;

                // Create a container for each media and its title
                mediaHtml += '<div class="media-item">';
                mediaHtml += '<img src="' + media + '" class="img-fluid" alt="img">';
                mediaHtml += '<div class="media-title">Media ' + (incident.media[i].file_name) +
                    '</div>';
                mediaHtml += '</div>';
            }
            $('#mediaContainer').html(mediaHtml);
        } else {
            $('#mediaContainer').html('No media available.');
        }
    })
</script>
