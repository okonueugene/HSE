@include('commons.header')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span>Reported Hazards</h4>
        <div>
            <!-- Search input field -->
            <form action="{{ route('reported-hazards.index') }}" method="GET">
                <div class="input-group mb-3 w-50" id="search">
                    <input type="text" class="form-control" name="search" placeholder="Search observations"
                        value="{{ $search }}">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
        </div>
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
                    <tbody>
                        @if (count($hazards) < 1)
                            <tr>
                                <td colspan="6" class="text-center">No data found.</td>
                            </tr>
                        @endif
                        @foreach ($hazards as $hazard)
                            <tr>
                                <td>{{ $hazard->id }}</td>
                                <td>{{ $hazard->observation }}</td>
                                <td>{{ $hazard->steps_taken }}</td>
                                <td>{{ $hazard->date }}</td>
                                <td>
                                    @if ($hazard->status == 0)
                                        <span class="badge bg-danger">Open</span>
                                    @else
                                        <span class="badge bg-success">Closed</span>
                                    @endif
                                </td>
                                {{-- show button --}}
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-secondary dropdown-toggle btn-sm"
                                            data-bs-toggle="dropdown" data-bs-display="static"
                                            aria-expanded="false">Action </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="javascript:void(0)" class="dropdown-item"
                                                    data-bs-toggle="modal" data-bs-target="#showModal"
                                                    onclick="showDataModal({{ $hazard->id }})">View</a>
                                            </li>
                                            @if (auth()->user()->can('edit_reported_hazard'))
                                                <li>
                                                    <a href="javascript:void(0)" class="dropdown-item"
                                                        data-bs-toggle="modal" data-bs-target="#updateModal"
                                                        data-hazard-id="{{ $hazard->id }}"
                                                        onclick="editHazard(this)">Edit</a>
                                                </li>
                                            @endif
                                            @if (auth()->user()->can('delete_reported_hazard'))
                                                <li>
                                                    <a href="javascript:void(0)" class="dropdown-item"
                                                        onclick="deleteHazard({{ $hazard->id }})">Delete</a>
                                                </li>
                                            @endif
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
                    {{ $hazards->links() }}
                </ul><!-- .pagination -->
            </div><!-- .card-inner -->
        </div>
    </div>
</div>

<!-- Modal for displaying hazards details -->

<div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <!-- Modal header -->
            <div class="modal-header">
                <h5 class="modal-title" id="showModalLabel">Hazard Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <!-- Display hazards details here -->
                <div id="hazardsDetails"></div>
                <div id="hazardsImages"></div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<!-- / Modal for updating hazards details -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title">Update Hazard Details</h5>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <form id="updateHazardForm">
                    <!-- Observation field -->
                    <div class="form-group">
                        <label for="observation">Observation</label>
                        <input type="text" class="form-control" id="observation" name="observation">
                    </div>
                    <!-- Steps Taken field -->
                    <div class="form-group">
                        <label for="steps_taken">Steps Taken</label>
                        <input type="text" class="form-control" id="steps_taken" name="steps_taken">
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

<!-- / Content -->

@include('commons.footer')

<script>
    function showDataModal($id) {
        // Fetch data using ajax
        $.ajax({
            url: '/hazards/' + $id,
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log(response);

                // Display badpractises details
                $('#hazardsDetails').html(
                    '<p><strong>Observation:</strong> ' + response.observation + '</p>' +
                    '<p><strong>Status:</strong> ' + response.status + '</p>' +
                    '<p><strong>Steps Taken:</strong> ' + response.steps_taken + '</p>' +
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
                    $('#hazardsImages').html(imagesHtml);
                } else {
                    $('#hazardsImages').html('No images available.');
                }

            }
        });
    }

    function deleteHazard(id) {
        console.log(id);

        // Get the CSRF token from the XSRF-TOKEN cookie
        const csrfToken = document.cookie.split('; ')
            .find(cookie => cookie.startsWith('XSRF-TOKEN='))
            .split('=')[1];

        // Set up Axios to include the CSRF token in the headers
        axios.defaults.headers.common['X-XSRF-TOKEN'] = csrfToken;

        // Send the DELETE request
        axios({
                method: 'DELETE',
                url: `/hazards/${id}`,
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
    }

    function editHazard(button) {
        // Retrieve the hazard ID from the data attribute
        var hazardId = $(button).data('hazard-id');

        // Send an AJAX request to fetch hazard data
        $.ajax({
            url: '/hazards/' + hazardId,
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
        // AJAX request to update the hazard data when the user submits the form
        $('#updateHazardForm').submit(function(e) {
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
                    url: '/hazards/' + hazardId,
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
</script>
