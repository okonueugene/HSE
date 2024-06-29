@extends('layout.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span>Bad Practises</h4>
        <div>
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
                            <div class="col-sm-3">
                                <label for="assignor">Added By</label>
                                <select class="form-select" id="assignor" name="assignor">
                                    <option value="">All</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
    
                            <div class="col-sm-3 form-group">
                                <label for="status">Status</label>
                                <select class="form-select" id="status" name="status">
                                    <option value="">All</option>
                                    <option value="0">Open</option>
                                    <option value="1">Closed</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
    
            </div>
            <!-- DataTable with Buttons -->
            <div class="card">
                <div class="table">
                    <table class="table table-hover table-bordered" width="100%" id="page_table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Observation</th>
                                <th>Added By</th>
                                <th>Action Owner</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
        </div>
    </div>
@endsection

@section('modals')
    <!-- Modal for displaying badpractises details -->
    <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <!-- Modal header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="showModalLabel">Bad Practice Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <!-- Display badpractises details here -->


                    <div id="badpractisesDetails"></div>
                    <div id="badpractisesImages"></div>

                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <!-- / Modal for updating badpractises details -->
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title">Update Bad Practise Details</h5>
                </div>
                <!-- Modal Body -->
                <div class="modal-body">
                    <form id="updatebadpractiseForm">
                        <!-- Observation field -->
                        <div class="form-group">
                            <label for="observation">Observation</label>
                            <input type="text" class="form-control" id="observation" name="observation">
                        </div>
                        <!-- Steps Taken field -->
                        <div class="form-group">
                            <label for="steps_taken">Steps Taken</label>
                            <div id="steps_taken"></div>
                        </div>
                        <!-- Date field -->
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" id="date" name="date">
                        </div>

                        <!-- Status field -->
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-select" id="status" name="status">
                                <option value="0">Open</option>
                                <option value="1">Closed</option>
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
                url: '/badpractises/' + $id,
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    console.log(response);

                    // Display badpractises details
                    $('#badpractisesDetails').html(
                        '<p><strong>Observation:</strong> ' + response.observation + '</p>' +
                        '<p><strong>Status:</strong> ' + (response.status == 0 ? 'Open' : 'Closed') +
                        '</p>' +
                        '<p><strong>Steps Taken:</strong> <ul>' + getStepsList(response.steps_taken) +
                        '</ul></p>' +
                        '<p><strong>Date:</strong> ' + response.date + '</p>'
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
                        $('#badpractisesImages').html(imagesHtml);
                    } else {
                        $('#badpractisesImages').html('No images available.');
                    }

                }
            });
        }

        function getStepsList(steps) {
            var stepsHtml = '';
            if (Array.isArray(steps)) {
                steps.forEach(function(step) {
                    stepsHtml += '<li>' + step + '</li>';
                });
            } else {
                for (var key in steps) {
                    if (Object.prototype.hasOwnProperty.call(steps, key)) {
                        stepsHtml += '<li>' + steps[key] + '</li>';
                    }
                }
            }
            return stepsHtml;
        }
        // Delete badpractises
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
                url: '/badpractises/' + $id
            }).then(response => {
                console.log(response);
                // Reload the page
                location.reload();
            }).catch(error => {
                console.error(error);
            });
        }


        function editbadpractise(button) {
            // Retrieve the badpractise ID from the data attribute
            var badpractiseId = $(button).data('badpractise-id');

            // Send an AJAX request to fetch badpractise data
            $.ajax({
                url: '/badpractises/' + badpractiseId,
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    // Populate the form fields in the updateModal with the fetched data
                    $('#updateModal #observation').val(response.observation);
                    $('#updateModal #steps_taken').val(response.steps_taken);
                    $('#updateModal #date').val(response.date);
                    $('#updateModal #status').val(response.status.toString());
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
            // AJAX request to update the badpractise data when the user submits the form
            $('#updatebadpractiseForm').submit(function(e) {
                // Prevent the default behaviour of the form submit event
                e.preventDefault();

                // Get the form data
                var formData = {
                    observation: $('#updateModal #observation').val(),
                    steps_taken: $('#updateModal #steps_taken').val(),
                    date: $('#updateModal #date').val(),
                    status: $('#updateModal #status').val(),
                    // Add more fields as needed
                };

                // Send the PUT request
                axios({
                        method: 'PATCH',
                        url: '/badpractises/' + badpractiseId,
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
                    });
            });
        }

        $(document).ready(function() {
            var url = "{{ route('badpractises') }}";
            

            var columns = [{
                    data: 'serial_no',
                    name: 'serial_no',
                    searchable: false
                },
                {
                    data: 'observation',
                    name: 'observation'
                },
                {
                    data: 'assignor',
                    name: 'assignor'
                },
                {
                    data: 'action_owner',
                    name: 'action_owner'
                },
                {
                    data: 'date',
                    name: 'date'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ];

            // Access the start and end dates from the date range picker
            var startDate = $('#daterange').data('daterangepicker').startDate.format('YYYY-MM-DD');
            var endDate = $('#daterange').data('daterangepicker').endDate.format('YYYY-MM-DD');

            var filters = {
                start_date: startDate,
                end_date: endDate,
                status: null,
                type: null,
                assignor: null
            };

            page_table = __initializePageTable(url, columns, filters);

            $(document).on('change', '#daterange , #status, #type, #assignor', function() {
                // Access the start and end dates from the date range picker
                var startDate = $('#daterange').data('daterangepicker').startDate.format('YYYY-MM-DD');
                var endDate = $('#daterange').data('daterangepicker').endDate.format('YYYY-MM-DD');

                var status = $('#status').val();
                var type = $('#type').val();
                var assignor = $('#assignor').val();

                var filters = {
                    start_date: startDate,
                    end_date: endDate,
                    status: status,
                    type: type,
                    assignor: assignor
                };

                // Destroy the existing DataTable
                page_table.destroy();

                // Reinitialize the DataTable with new filters
                page_table = __initializePageTable(url, columns, filters);
            });

        });
    </script>
@endsection
