@extends('layout.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span>Open Incidents</h4>
        <div class="card filter-card">
            <div class="row">
                <div class="col-sm-12">
                    <h5>Filters</h5>
                    <div class="row">

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Date Range <span class="text-danger">*</span></label>
                                <input type="text" readonly id="daterange" class="form-control"
                                    value="{{ date('m/01/Y') }} - {{ date('m/t/Y') }}" />
                            </div>
                        </div>

                        <div class="col-sm-3 form-group">
                            <label>Incident Type</label>
                            <select class="form-control select2" id="incident_type">
                                <option value="">All</option>
                                @foreach ($incident_types as $type)
                                    <option value="{{ $type->id }}">
                                        {{ ucwords(str_replace('_', ' ', $type->incident_type)) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-sm-3 form-group">
                            <label>Investigation</label>
                            <select class="form-control select2" id="investigation">
                                <option value="">All</option>
                                <option value="open">Open</option>
                                <option value="closed">Closed</option>
                            </select>
                        </div>

                        <div class="col-sm-3 form-group">
                            <label>Reporting Done</label>
                            <select class="form-control select2" id="reporting_done">
                                <option value="">All</option>
                                <option value="yes">Done</option>
                                <option value="no">Not Done</option>
                            </select>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <div class="card">
            <div class="table">
                <table class="table table-hover table-bordered" width="100%" id="page_table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Incident Type</th>
                            <th>Investigation</th>
                            <th>Reporting Done</th>
                            <th>Date</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">

                    </tbody>
                </table>
            </div>
        </div>
        <br>
        {{-- <div class="card card-bordered w-50 mx-auto">
            <div class="card-inner">
                <ul class="pagination justify-content-center" style="margin:10px 10px">
                    {{ $incidents->links() }}
                </ul><!-- .pagination -->
            </div><!-- .card-inner -->
        </div><!-- .card --> --}}
    </div>
@endsection

@section('modals')
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
                            <input type="text" class="form-control" id="basic-default-status" name="investigation_status"
                                readonly>
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
@endsection

@section('javascript')
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

        $(document).ready(function() {

            var url = "/open-incidents";
            var columns = [{
                    data: 'serial_no',
                    name: 'serial_no',
                    searchable: false
                },
                {
                    data: 'incident_type_name',
                    name: 'incident_type_name',
                    searchable: false
                },

                {
                    data: 'investigation_status',
                    name: 'investigation_status'
                },
                {
                    data: 'incident_status',
                    name: 'incident_status'
                },

                {
                    data: 'incident_date',
                    name: 'incident_date'
                },

                {
                    data: 'incident_description',
                    name: 'incident_description',
                },
                {
                    data: 'action',
                    name: 'action',
                    className: 'text-left',
                    searchable: false
                }
            ];


            // Access the start and end dates from the date range picker
            var startDate = $('#daterange').data('daterangepicker').startDate.format('YYYY-MM-DD');
            var endDate = $('#daterange').data('daterangepicker').endDate.format('YYYY-MM-DD');

            var filters = {
                start_date: startDate,
                end_date: endDate,
                incident_type: null,
                investigation: null,
                reporting_done: null
            };

            page_table = __initializePageTable(url, columns, filters);

            $(document).on('change', '#daterange, #incident_type, #investigation, #reporting_done', function() {

                // Access the start and end dates from the date range picker
                var startDate = $('#daterange').data('daterangepicker').startDate.format('YYYY-MM-DD');
                var endDate = $('#daterange').data('daterangepicker').endDate.format('YYYY-MM-DD');

                filters = {
                    start_date: startDate,
                    end_date: endDate,
                    incident_type: $('#incident_type').val(),
                    investigation: $('#investigation').val(),
                    reporting_done: $('#reporting_done').val()
                }

                // Destroy the existing DataTable
                page_table.destroy();

                // Reinitialize the DataTable with new filters
                page_table = __initializePageTable(url, columns, filters);
            });

        });
    </script>
@endsection
