@extends('layout.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span>Safety Observation Records</h4>

        <!-- DataTable with Buttons -->
        <div class="col-xl">
            <div class="card border-secondary mb-4 h-100 ">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Add A Record</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('sor.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-observation">Observation</label>
                            <input type="text" name="observation" class="form-control" id="basic-default-observation"
                                placeholder="This ....">
                            <div class="error">
                                @error('observation')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-status">Status</label>
                            <select class="form-select" id="basic-default-status" name="status">
                                <option value="0">Open</option>
                                <option value="1">Closed</option>
                            </select>
                            <div class="error">
                                @error('status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-stepstaken">Steps Taken</label>
                            <div class="sortable-steps-container">
                                <ul id="steps_taken_list" class="list-group">
                                </ul>
                            </div>
                            <input type="hidden" name="steps_taken_json" id="steps_taken_json">
                            <button type="button" class="btn btn-primary" onclick="addStep()">Add Step</button>
                            <div class="error">
                                @error('steps_taken')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-actionowner">Action Owner</label>
                            <input type="text" name="action_owner" class="form-control" id="basic-default-actionowner"
                                placeholder="Action Owner">
                            <div class="error">
                                @error('action_owner')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-image">Images</label>
                            <input type="file" class="form-control" id="basic-default-image" name="images[]" multiple>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-due">SOR Type</label>
                            <select class="form-select" id="basic-default-due" name="type_id">
                                <option>Select Record Type</option>
                                @foreach ($sor_types as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach

                            </select>
                            <div class="error">
                                @error('type_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        @if (auth()->user()->can('add_sor'))
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                        @endif
                    </form>

                </div>
            </div>
        </div>

    </div>
@endsection

@section('modals')
@endsection

@section('javascript')
    <script>
        function addStep() {
            // Create a new list item element for the step
            const newStep = document.createElement('li');
            newStep.classList.add('list-group-item');

            // Input field for step description
            const stepInput = document.createElement('input');
            stepInput.type = 'text';
            stepInput.classList.add('form-control');
            stepInput.placeholder = 'Enter Step Description';
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

            // Make the list sortable (optional)
            // You can use a library like Sortable.js for drag-and-drop sorting

            // Append the new step to the list
            const stepsList = document.getElementById('steps_taken_list');
            stepsList.appendChild(newStep);
        }

        function updateStepsJson() {
            let steps = {}; // Initialize steps as an object

            const stepElements = document.querySelectorAll('#steps_taken_list li input');

            let index = 1; // Start index from 1

            stepElements.forEach((element) => {
                const trimmedStep = element.value.trim();
                if (trimmedStep) {
                    steps[index] = trimmedStep; // Use index as key and step description as value
                    index++;
                }
            });

            const stepsJson = JSON.stringify(steps); // Convert object to JSON string

            document.getElementById('steps_taken_json').value = stepsJson;
        }
    </script>
@endsection
