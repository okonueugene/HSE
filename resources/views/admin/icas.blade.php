@include('commons.header')

<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span>Immediate Collective Actions (ICA's)</h4>
        {{-- search  --}}
        <div>
            <!-- Search input field -->
            <form action="{{ route('icas.search') }}" method="GET">
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
                            <th>Date</th>
                            <th>Status</th>
                            <th>Assigned To</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($icas) == 0)
                            <tr>
                                <td colspan="8" class="text-center">No data found.</td>
                            </tr>
                        @endif
                        @foreach ($icas as $ica)
                            <tr>
                                <td>{{ $ica->id }}</td>
                                <td>{{ $ica->observation }}</td>
                                <td>{{ $ica->date }}</td>
                                <td>{{ $ica->status }}</td>
                                <td>{{ $ica->actionOwner->name }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-secondary dropdown-toggle"
                                            data-bs-toggle="dropdown" data-bs-display="static"
                                            aria-expanded="false">Action </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="javascript:void(0)" class="dropdown-item"
                                                    data-bs-toggle="modal" data-bs-target="#showModal"
                                                    onclick="showDataModal({{ $ica->id }})">View</a></li>
                                            <li>
                                                <a href="javascript:void(0)" class="dropdown-item"
                                                    onclick="deleteIca({{ $ica->id }})">
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
                    {{ $icas->links() }}
                </ul><!-- .pagination -->
            </div><!-- .card-inner -->
        </div>
    </div>
</div>
<!-- Modal for displaying data -->

<div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <!-- Modal header -->
            <div class="modal-header">
                <h5 class="modal-title" id="showModalLabel">ICA Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div id="icasDetails"></div>
                <div id="icasImages"></div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


@include('commons.footer')

<script>
    function showDataModal(id) {
        $.ajax({
            url: "/icas/" + id,
            type: "GET",
            dataType: 'json',
            success: function(response) {
                console.log(response);

                // Find the user and action owner names
                var user = response.users.find(user => user.id === response.icas.user_id);
                var actionOwner = response.users.find(user => user.id === response.icas.action_owner_id);

                // Display icadetails
                $('#icasDetails').html(
                    '<p><strong>Observation:</strong> ' + response.icas.observation + '</p>' +
                    '<p><strong>Date:</strong> ' + response.icas.date + '</p>' +
                    '<p><strong>Status:</strong> ' + response.icas.status + '</p>' +
                    '<p><strong>Assigned To:</strong> ' + actionOwner.name + '</p>' +
                    '<p><strong>Assigned By:</strong> ' + user.name + '</p>'
                );

                // Display images if any
                if (response.icas.media.length > 0) {
                    var imagesHtml = '<h4>Images:</h4><div class="image-container">';
                    for (var i = 0; i < response.icas.media.length; i++) {
                        const regex = /http:\/\/localhost\/storage\//;
                        let image = response.icas.media[i].original_url.replace(regex, '');
                        // Pass the image through the asset helper
                        image = "{{ asset('storage') }}/" + image;

                        // Create a container for each image and its title
                        imagesHtml += '<div class="image-item">';
                        imagesHtml += '<img src="' + image + '" class="img-fluid" alt="img">';
                        imagesHtml += '<div class="image-title">Image ' + (response.icas.media[i]
                            .file_name) +
                            '</div>';
                        imagesHtml += '</div>';
                    }
                    imagesHtml += '</div><br><br>'; // Add a line break between image groups
                    $('#icasImages').html(imagesHtml);
                } else {
                    $('#icasImages').html('No images available.');
                }
            }
        });
    }


    // Delete ica
    function deleteIca($id) {
        // Get the CSRF token from the XSRF-TOKEN cookie
        const csrfToken = document.cookie.split('; ')
            .find(cookie => cookie.startsWith('XSRF-TOKEN='))
            .split('=')[1];

        // Set up Axios to include the CSRF token in the headers
        axios.defaults.headers.common['X-XSRF-TOKEN'] = csrfToken;

        // Send the DELETE request
        axios({
            method: 'DELETE',
            url: '/icas/' + $id
        }).then(response => {
            console.log(response);
            location.reload();
        });
    }
</script>
