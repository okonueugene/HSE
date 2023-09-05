@include('commons.header')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span>Reported Hazards</h4>
        <div>
            <!-- Search input field -->
            <form action="{{ route('reported-hazards.index') }}" method="GET">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="search" placeholder="Search observations"
                        value="{{ $search }}">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
        </div>
        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="card-datatable table-responsive pt-0">
                <table class="datatables-basic table dataTable" id="DataTables_Table_0">
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
                                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                        data-bs-target="#showModal"
                                        onclick="showDataModal({{ $hazard->id }})">View</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

            </div>
        </div>
        <br>
        <div class="card card-bordered">
            <div class="card-inner">
                <ul class="pagination justify-content-center" style="margin:10px 10px">
                    {{ $hazards->links() }}
                </ul><!-- .pagination -->
            </div><!-- .card-inner -->
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
    <!-- / Content -->

    @include('commons.footer')

    <script>
        console.log('Hello from improvemts page');

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
    </script>
