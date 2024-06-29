@extends('layout.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        @if (auth()->user()->can('add_tasks'))
            <div class="add-button ">
                <a href="javascript:void(0)" class="btn btn-primary float-end" data-bs-toggle="modal"
                    data-bs-target="#addTaskModal">Add Task</a>
            </div>
        @endif
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span>Task Manager</h4>

        <div class="filter-card">
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
                    <label for="status">Status</label>
                    <select id="status" class="form-select">
                        <option value="">All</option>
                        <option value="pending">Pending</option>
                        <option value="completed">Completed</option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <label for="user_id">Created By</label>
                    <select id="user_id" class="form-select">
                        <option value="">All</option>
                        @foreach ($creators as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-3">
                    <label for="assignee_id">Assigned To</label>
                    <select id="assignee_id" class="form-select">
                        <option value="">All</option>
                        @foreach ($assignees as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
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
                            <th>Task Title</th>
                            <th>Assigned To</th>
                            <th>Assignee</th>
                            <th>Start Date</th>
                            <th>Due Date</th>
                            <th>Task Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">

                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="card card-bordered w-50 mx-auto">

        </div>
        <!-- Modal to add new record -->

        <!--/ DataTable with Buttons -->

    </div>
@endsection

@section('modals')
    <!-- modal to add new record -->
    <div class="modal fade" id="addTaskModal" tabindex="-1" role="dialog" aria-labelledby="addTaskModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <!-- Modal header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="showModalLabel">Add Task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="{{ route('user-tasks.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Enter Title" required>

                            <div class="error">
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description" placeholder="Enter Description" rows="4" required></textarea>
                            <div class="error">
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Comments</label>
                            <textarea class="form-control" name="comments" placeholder="Enter Comments" rows="4"></textarea>
                            <div class="error">
                                @error('comments')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Start Date</label>
                            <input type="date" class="form-control" name="from" placeholder="Enter Start Date"
                                required>
                            <div class="error">
                                @error('from')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Due Date</label>
                            <input type="date" class="form-control" name="to" placeholder="Enter Due Date"
                                required>
                            <div class="error">
                                @error('to')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select class="form-select" name="status">
                                <option value="pending">Pending</option>
                                <option value="completed">Completed</option>
                            </select>
                            <div class="error">
                                @error('status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Assign To</label>
                            <select class="form-select" name="user_id" required>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                            <div class="error">
                                @error('user_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Photos</label>
                            <input type="file" class="form-control" id="media" name="media[]" multiple>
                            <div class="error">
                                @error('media')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary">Add Task</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        //function to view the task
        function viewTask(id) {
            url = "{{ route('user-tasks.show', ':id') }}";
            url = url.replace(':id', id);
            window.location.href = url;
        }
        //function to edit the task
        function editTask(id) {
            url = "{{ route('user-tasks.update', ':id') }}";
            url = url.replace(':id', id);
            window.location.href = url;
        }

        //function to delete the task
        function deleteTask(id) {
        confirm('Are you sure you want to delete this task?');
            url = "{{ route('user-tasks.destroy', ':id') }}";
            url = url.replace(':id', id);
            axios.delete(url)
                .then(response => {
                    if (response.data.success) {
                        iziToast.success({
                            title: "Success",
                            message: response.data.message,
                            position: "topRight",
                            timeout: 10000,
                            transitionIn: "fadeInDown"
                        });
                        page_table.ajax.reload();
                    }
                })
                .catch(error => {
                    iziToast.error({
                        title: "Error",
                        message: error.response.data.message,
                        position: "topRight",
                        timeout: 10000,
                        transitionIn: "fadeInDown"
                    });
                });
        }

        // Initialize the DataTable
        $(document).ready(function() {
            var url = "{{ route('user-tasks') }}";

            var columns = [{
                    data: 'serial_no',
                    name: 'serial_no',
                    searchable: false
                },
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'user',
                    name: 'user'
                },
                {
                    data: 'assignee',
                    name: 'assignee'
                },
                {
                    data: 'from',
                    name: 'from'
                },
                {
                    data: 'to',
                    name: 'to'
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
                'start_date': startDate,
                'end_date': endDate,
                'status': null,
                'user_id': null,
                'assignee_id': null

            };

            page_table = __initializePageTable(url, columns, filters);

            $(document).on('change', '#daterange , #status, #user_id, #assignee_id', function() {
                var startDate = $('#daterange').data('daterangepicker').startDate.format('YYYY-MM-DD');
                var endDate = $('#daterange').data('daterangepicker').endDate.format('YYYY-MM-DD');

                var status = $('#status').val();
                var user_id = $('#user_id').val();
                var assignee_id = $('#assignee_id').val();

                filters = {
                    'start_date': startDate,
                    'end_date': endDate,
                    'status': status,
                    'user_id': user_id,
                    'assignee_id': assignee_id
                };

                // Destroy the existing DataTable
                page_table.destroy();

                // Reinitialize the DataTable with new filters
                page_table = __initializePageTable(url, columns, filters);
            });
        });
    </script>
@endsection
