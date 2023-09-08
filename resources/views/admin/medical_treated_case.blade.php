@include('commons.header')

<!-- Content wrapper -->
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span>Medical Treated Case Manager</h4>
        <!-- Search input field -->
        <form action="{{ route('badpractises.search') }}" method="GET">
            <div class="input-group mb-3 w-50">
                <input type="text" class="form-control" name="search" placeholder="Search Description"
                    value="{{ $search }}">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>
        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="card-datatable table-responsive pt-0">
                <table class="datatables-basic table dataTable" id="DataTables_Table_0">
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
                        @if (count($medicaltreatedcases) == 0)
                            <tr>
                                <td colspan="8" class="text-center">No data found.</td>
                            </tr>
                        @endif
                        @foreach ($medicaltreatedcases as $case)
                            <tr>
                                <td>{{ $case->id }}</td>
                                <td>{{ $case->investigation_status }}</td>
                                <td>{{ $case->incident_status }}</td>
                                <td>{{ $case->incident_date }}</td>
                                <td>{{ $case->incident_description }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-secondary dropdown-toggle"
                                            data-bs-toggle="dropdown" data-bs-display="static"
                                            aria-expanded="false">Action </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="javascript:void(0)" class="dropdown-item"
                                                    data-bs-toggle="modal" data-bs-target="#showModal"
                                                    onclick="showDataModal({{ $case->id }})">View</a></li>
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
                    {{ $medicaltreatedcases->links() }}
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
                <h5 class="modal-title" id="showModalLabel">Medical Case Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <!-- Display medicaltreatedcase details here -->
                <div id="medicaltreatedcaseDetails"></div>
                <div id="medicaltreatedcaseImages"></div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
            url: '/medicaltreatedcase/' + $id,
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log(response);

                // Display badpractises details
                $('#medicaltreatedcaseDetails').html(
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
                    $('#medicaltreatedcaseImages').html(imagesHtml);
                } else {
                    $('#medicaltreatedcaseImages').html('No images available.');
                }

            }
        });
    }

    // Delete data
    function deleteData($id) {

        $.ajax({
            url: '/medicaltreatedcase/' + $id,
            method: 'DELETE',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                console.log(response);
                location.reload();
            }
        });
    }
</script>
