@include('commons.header')

<!-- Content wrapper -->
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span>Lost Time Accident Case Manager</h4>
        <!-- Search input field -->
        <form action="{{ route('losttimeaccidents.search') }}" method="GET">
            <div class="input-group mb-3 w-50" id="search">
                <input type="text" class="form-control" name="search" placeholder="Search Description"
                    value="{{ $search }}">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>
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
                    <tbody>
                        @if (count($losttimeaccidents) == 0)
                            <tr>
                                <td colspan="8" class="text-center">No data found.</td>
                            </tr>
                        @endif
                        @foreach ($losttimeaccidents as $case)
                            <tr>
                                <td>{{ $case->id }}</td>
                                <td>{{ $case->investigation_status == 'open' ? 'Open' : 'Closed' }}</td>
                                <td>{{ $case->incident_status == 'yes' ? 'Done' : 'Not Done' }}</td>
                                <td>{{ $case->incident_date }}</td>
                                <td>{{ $case->incident_description }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-secondary dropdown-toggle btn-sm"
                                            data-bs-toggle="dropdown" data-bs-display="static"
                                            aria-expanded="false">Action </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="javascript:void(0)" class="dropdown-item"
                                                    data-bs-toggle="modal" data-bs-target="#showModal"
                                                    onclick="showDataModal({{ $case->id }})">View</a></li>
                                            <li><a href="javascript:void(0)" class="dropdown-item"
                                                    data-bs-toggle="modal" data-bs-target="#updateModal"
                                                    data-lostTimeAccident-id="{{ $case->id }}"
                                                    onclick="editLostTimeAccidents(this)">Edit</a>
                                            </li>

                                            <li>
                                                <a href="javascript:void(0)" class="dropdown-item"
                                                    onclick="deleteData({{ $case->id }})">
                                                    Delete
                                                </a>
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
                    {{ $losttimeaccidents->links() }}
                </ul><!-- .pagination -->
            </div><!-- .card-inner -->
        </div>
    </div>
</div>

<!-- Modal for displaying near miss details -->
<div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <!-- Modal header -->
            <div class="modal-header">
                <h5 class="modal-title" id="showModalLabel">Lost Time Accident Case Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <!-- Display losttimeaccidents details here -->
                <div id="losttimeaccidentsDetails"></div>
                <div id="losttimeaccidentsImages"></div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<!-- / Modal for displaying Lost time accidents -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title">Update Medical Tratment Case Details</h5>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <form id="updatelosttimeaccidentsForm">
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

<!-- / Content -->

@include('commons.footer')

<script>
    console.log('Hello from improvemts page');

    function showDataModal($id) {
        // Fetch data using ajax
        $.ajax({
            url: '/losttimeaccidents/' + $id,
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log(response);

                // Display badpractises details
                $('#losttimeaccidentsDetails').html(
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
                    $('#losttimeaccidentsImages').html(imagesHtml);
                } else {
                    $('#losttimeaccidentsImages').html('No images available.');
                }

            }
        });
    }

    function deleteData($id) {
        // Get the CSRF token from the XSRF-TOKEN cookie
        const csrfToken = document.cookie.split('; ')
            .find(cookie => cookie.startsWith('XSRF-TOKEN='))
            .split('=')[1];

        // Set up Axios to include the CSRF token in the headers
        axios.defaults.headers.common['X-XSRF-TOKEN'] = csrfToken;

        // Send the DELETE request
        axios.delete('/losttimeaccidents/' + $id)
            .then(response => {
                console.log(response);
                location.reload();
            })
            .catch(error => console.error(error));
    }

    // Edit losttimeaccidents
    function editLostTimeAccidents(button) {
        // Get the losttimeaccidents ID from the data-losttimeaccidents-id attribute
        const losttimeaccidentsId = button.getAttribute('data-lostTimeAccident-id');

        // Send an AJAX request to fetch losttimeaccidents data
        $.ajax({
            url: '/losttimeaccidents/' + losttimeaccidentsId,
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
        // AJAX request to update the losttimeaccidents data when the user submits the form
        $('#updatelosttimeaccidentsForm').submit(function(e) {
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
                    url: '/losttimeaccidents/' + losttimeaccidentsId,
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
</script>
