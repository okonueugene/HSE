@include('commons.header')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        @if (auth()->user()->can('add_environment'))
            <div class="add-button ">
                <a href="{{ route('environmental-policy-checklist') }}" class="btn btn-primary float-end mx-2">Add Policy
                    Checklist</a>
                <a href="#" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addModal">Add
                    Free
                    Form</a>
            </div>
        @endif
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span>Enviromental Concern</h4>

        <div class="card">
            <div class="table">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>

                            <th>Type</th>
                            <th>Comment</th>
                            <th>Corrective Action</th>
                            <th>Status</th>
                            <th>Project Manager</th>
                            <th>Auditor</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody class="table-border-bottom-0">
                        @foreach ($concerns as $concern)
                            <tr>
                                <td>{{ $concern->type }}</td>
                                <td>{{ $concern->comments ?? 'No Comment' }}</td>
                                <td>
                                    @if($concern->corrective_actions)
                                    @foreach ($concern->corrective_actions as $sub_action)
                                        @if (is_array($sub_action))
                                            <ul>
                                                @foreach ($sub_action as $action)
                                                    <li>{{ $action }}</li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <li>{{ $sub_action }}</li>
                                        @endif
                                    @endforeach
                                    @else
                                        <span>No Corrective Action</span>
                                    @endif
                                </td>
                                <td>{{ $concern->status }}</td>
                                <td>{{ $concern->project_manager }}</td>
                                <td>{{ $concern->auditor }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-secondary dropdown-toggle btn-sm"
                                            data-bs-toggle="dropdown" data-bs-display="static"
                                            aria-expanded="false">Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            {{-- <li>
                                                <a href="{{ route('user-concerns.show', $permit->id) }}"
                                                    class="dropdown-item">View</a>
                                            </li> --}}
                                            </li>
                                            @if (auth()->user()->can('update_environment'))
                                                <li>
                                                    <a href="{{ route('user-concerns.update', $permit->id) }}"
                                                        class="dropdown-item">Edit</a>
                                                </li>
                                            @endif
                                            @if (auth()->user()->can('delete_environment'))
                                                <li>
                                                    {{-- <form action="{{ route('user-concerns.destroy', $permit->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Are you sure you want to delete this permit?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item">Delete</button>
                                                </form> --}}
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
                    {{ $concerns->links() }}
                </ul>
            </div>
        </div>
    </div>
</div>
{{-- addModal --}}
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add Free Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addForm">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Type</label>
                        <select class="form-select" id="type" name="type" required>
                            <option value="" selected>Select Type</option>
                            <option value="Waste Management">Waste Management</option>
                            <option value="Water Management">Water Management</option>
                            <option value="Air Management">Air Management</option>
                            <option value="Noise Management">Noise Management</option>
                            <option value="Soil Management">Soil Management</option>
                            <option value="Biodiversity Management">Biodiversity Management</option>
                            <option value="Energy Management">Energy Management</option>
                            <option value="Chemical Management">Chemical Management</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="comment" class="form-label">Comment</label>
                        <textarea class="form-control" id="comment" name="comment" required></textarea>
                    </div>
                    <div class="form-group" style="margin-top: 10px;">
                        <label for="corrective_action">Corrective Actions</label>
                        <div class="actions-container">
                            <ul id="corrective_actions_list" class="list-group">
                            </ul>
                        </div>
                        <input type="hidden" name="corrective_action" id="corrective_action">
                        <button type="button" class="btn btn-primary" onclick="addAction()">Add
                            Action</button>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="pending">Pending</option>
                            <option value="approved">Approved</option>
                            <option value="rejected">Rejected</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="project_manager" class="form-label">Project Manager</label>
                        <input type="text" class="form-control" id="project_manager" name="project_manager" required>
                    </div>
                    <div class="mb-3">
                        <label for="auditor" class="form-label">Auditor</label>
                        <input type="text" class="form-control" id="auditor" name="auditor" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /addModal -->


<!-- / Content wrapper -->




@include('commons.footer')

<script>
    function addAction() {
        // Create a new list item element for the step
        const newStep = document.createElement('li');
        newStep.classList.add('list-group-item');

        // Input field for step description
        const stepInput = document.createElement('input');
        stepInput.type = 'text';
        stepInput.classList.add('form-control');
        stepInput.placeholder = 'Enter Action Description';
        stepInput.addEventListener('input', () => updateStepsJson()); // Update JSON on input change

        newStep.appendChild(stepInput);

        // Button to remove the step
        const removeButton = document.createElement('button');
        removeButton.classList.add('btn', 'btn-sm', 'btn-danger');
        removeButton.textContent = 'Remove';
        removeButton.onclick = function() {
            this.parentNode.remove();
            updateStepsJson(); // Update JSON after removing a step
        };
        newStep.appendChild(removeButton);

        // Append the new step to the list
        const stepsList = document.getElementById('corrective_actions_list');
        stepsList.appendChild(newStep);
    }

    function updateStepsJson() {
        let steps = {}; // Initialize steps as an object

        const stepElements = document.querySelectorAll('#corrective_actions_list li input');

        let index = 1; // Start index from 1

        stepElements.forEach((element) => {
            const trimmedStep = element.value.trim();
            if (trimmedStep) {
                steps[index] = trimmedStep; // Use index as key and step description as value
                index++;
            }
        });

        const stepsJson = JSON.stringify(steps); // Convert object to JSON string

        document.getElementById('corrective_action').value = stepsJson;

        console.log(stepsJson);
    }

    // Handle form submission
    $('#addForm').submit(function(e) {
        e.preventDefault();
        let comments = $('#comment').val();
        let type = $('#type').val();
        let corrective_action = $('#corrective_action').val();
        let status = $('#status').val();
        let project_manager = $('#project_manager').val();
        let auditor = $('#auditor').val();

        let data = {
            comments: comments,
            type: type,
            corrective_action: corrective_action,
            status: status,
            project_manager: project_manager,
            auditor: auditor
        };

        console.log(data);

        axios.post('{{ route('environment-store-form') }}', data)
            .then(function(response) {
                console.log(response);
                if (response.data) {
                    window.location.reload();
                }
            })
            .catch(function(error) {
                console.log(error);
            });
    });
</script>
