@extends('layout.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span>First Aid Case Manager</h4>
        <!-- Search input field -->
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
        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="table">
                <table class="table table-hover table-bordered" id="page_table" style="width: 100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Investigation</th>
                            <th>Reporting Done</th>
                            <th>Date</th>
                            <th>Description</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection

@section('modals')
    <!-- Modal for displaying near miss details -->
    <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <!-- Modal header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="showModalLabel">First Aid Case Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <!-- Display firstaidcase details here -->
                    <div id="firstaidcaseDetails"></div>
                    <div id="firstaidcaseImages"></div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal for updating firstaidcase details -->
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title">Update Near Miss Details</h5>
                </div>
                <!-- Modal Body -->
                <div class="modal-body">
                    <form id="updatecaseForm">
                        <!-- Description field -->
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" id="description" name="description">
                        </div>
                        <!-- Investigation field -->
                        <div class="form-group">
                            <label for="investigation">Investigation</label>
                            <select class="form-control" id="investigation" name="investigation">
                                <option value="closed">Closed</option>
                                <option value="open">Open</option>
                            </select>
                        </div>
                        <!-- Date field -->
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" id="date" name="date">
                        </div>

                        <!-- Reporting Done   field -->
                        <div class="form-group">
                            <label for="reporting_done">Reporting Done</label>
                            <select class="form-control" id="reporting_done" name="reporting_done">
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                        <!-- Media if present -->
                        <!-- Media display area -->
                        <div class="form-group">
                            <label for="media">Media</label>
                            <ul id="mediaList">
                                <!-- Media items will be dynamically added here -->
                            </ul>
                        </div>

                        <br>
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary">Update</button>
                        <!--Close button -->
                        <button type="button" class="btn btn-secondary float-end" data-bs-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>

        function showDataModal($id) {
            // Fetch data using ajax
            $.ajax({
                url: '/firstaidcase/' + $id,
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    console.log(response);

                    // Display badpractises details
                    $('#firstaidcaseDetails').html(
                        '<p><strong>Status:</strong> ' + response.investigation_status + '</p>' +
                        '<p><strong>Steps Taken:</strong> ' + response.incident_status + '</p>' +
                        '<p><strong>Date:</strong> ' + response.incident_date + '</p>' +
                        '<p><strong>Date:</strong> ' + response.incident_description + '</p>'
                    );

                    // Display images if they exist
                    // Display images if they exist
                    if (response.media.length > 0) {
                        var imagesHtml = '<h4>Images:</h4><div class="image-container">';
                        for (var i = 0; i < response.media.length; i++) {
                            const regex = /http:\/\/localhost\/storage\//;
                            let image = response.media[i].original_url.replace(regex, '');
                            // Pass the image through the asset helper
                            image = "{{ asset('storage') }}/" + image;

                            // Create a container for each image and its title
                            imagesHtml += '<div class="image-item">';
                            imagesHtml += '<img src="' + image + '" class="img-fluid" alt="img">';
                            imagesHtml += '<div class="image-title">Image ' + (response.media[i].file_name) +
                                '</div>';
                            imagesHtml += '</div>';
                        }
                        imagesHtml += '</div><br><br>'; // Add a line break between image groups
                        $('#firstaidcaseImages').html(imagesHtml);
                    } else {
                        $('#firstaidcaseImages').html('No images available.');
                    }

                }
            });
        }

        // Delete data
        function deleteData($id) {
            // Get the CSRF token from the XSRF-TOKEN cookie
            const csrfToken = document.cookie.split('; ')
                .find(cookie => cookie.startsWith('XSRF-TOKEN='))
                .split('=')[1];

            // Set up Axios to include the CSRF token in the headers
            axios.defaults.headers.common['X-XSRF-TOKEN'] = csrfToken;

            // Send the DELETE request
            axios({
                method: 'DELETE',
                url: '/firstaidcase/' + $id
            }).then(response => {
                // Handle the response here
                console.log('Response from server:', response);
                // Reload the page
                location.reload();
            }).catch(error => {
                console.log('Error:', error);
            });
        }


        // Edit casees
        function editcase(button) {
            // Retrieve the case ID from the data attribute
            var caseId = $(button).data('case-id');

            // Send an AJAX request to fetch case data
            $.ajax({
                url: '/firstaidcase/' + caseId,
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    // Populate the form fields in the updateModal with the fetched data
                    $('#updateModal #description').val(response.incident_description);
                    $('#updateModal #investigation').val(response.investigation_status.toString());
                    $('#updateModal #date').val(response.incident_date);
                    $('#updateModal #reporting_done').val(response.incident_status.toString());
                    // Add more fields as needed
                    // Display media if it exists
                    if (response.media.length > 0) {
                        var mediaHtml = '<h4>Media:</h4><div class="media-container">';
                        for (var i = 0; i < response.media.length; i++) {
                            const regex = /http:\/\/localhost\/storage\//;
                            let media = response.media[i].original_url.replace(regex, '');
                            // Pass the media through the asset helper
                            media = "{{ asset('storage') }}/" + media;

                            // Create a container for each media and its title
                            mediaHtml += '<div class="media-item">';
                            mediaHtml += '<img src="' + media + '" class="img-fluid" alt="img">';
                            mediaHtml += '<div class="media-title">Media ' + (response.media[i].file_name) +
                                '</div>';
                            mediaHtml += '</div>';
                        }
                        mediaHtml += '</div><br><br>'; // Add a line break between media groups
                        $('#mediaList').html(mediaHtml);
                    } else {
                        $('#mediaList').html('No media available.');
                    }

                    // Display the updateModal
                    $('#updateModal').modal('show');
                }
            });
            // AJAX request to update the case data when the user submits the form
            $('#updatecaseForm').submit(function(e) {
                // Prevent the default behaviour of the form submit event
                e.preventDefault();

                // Get the form data
                var formData = {
                    description: $('#updateModal #description').val(),
                    investigation: $('#updateModal #investigation').val(),
                    date: $('#updateModal #date').val(),
                    status: $('#updateModal #reporting_done').val(),
                    // Add more fields as needed
                };

                // Send the PUT request
                axios({
                        method: 'PATCH',
                        url: '/firstaidcase/' + caseId,
                        data: formData,
                    })
                    .then(response => {
                        // Handle the success response
                        console.log(response.data);
                        // Reload the page or perform any necessary actions
                        location.reload();
                    })
                    .catch(error => {
                        // Handle the error response
                        console.error(error);
                        console.log(formData);
                    });
            });
        }

        $(document).ready(function() {
            var url = '/firstaidcase';

            var columns = [{
                    data: 'serial_no',
                    name: 'serial_no',
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
                investigation: null,
                reporting_done: null
            };

            //this part is where

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
