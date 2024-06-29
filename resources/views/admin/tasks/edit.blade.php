@extends('layout.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <h4 class="fw-bold py-3 mb-4 text-center"><span class="text-muted fw-light "> </span>Edit Task</h4>

        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="card-body">
                <form action="{{ route('user-tasks.update', $task->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Task Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $task->title }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Task Description</label>
                        <input type="text" class="form-control" name="description" value="{{ $task->description }}">

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Task Comments</label>
                        <input type="text" class="form-control" name="comments" value="{{ $task->comments }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Start
                            Date</label>
                        <input type="date" class="form-control" name="from" value="{{ $task->from }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Due Date</label>
                        <input type="date" class="form-control" name="to" value="{{ $task->to }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Task Status</label>
                        <select class="form-select" name="status" value="{{ $task->status }}">
                            <option value="pending">Pending</option>
                            <option value="completed">Completed</option>
                        </select>
                    </div>
                    <div>
                        @if ($task->media)
                            <label class="form-label">Task Media</label>
                            <div class="row">
                                @foreach ($task->media as $media)
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <?php
                                            $mediaUrl = $media->original_url;
                                            
                                            // Define the regex pattern to match the part you want to replace
                                            $pattern = '/http:\/\/localhost\/storage\//';
                                            
                                            // Define the replacement string (the part you want to replace it with)
                                            $replacement = '';
                                            
                                            // Use preg_replace to replace the matched part with the replacement
                                            $cleanedUrl = preg_replace($pattern, $replacement, $mediaUrl);
                                            
                                            //set the cleaned url as the new url
                                            $mediaUrl = $cleanedUrl;
                                            
                                            ?>
                                            <img src="{{ asset('storage/' . $mediaUrl) }}" alt="{{ $media->file_name }}"
                                                class="card-img-top">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $media->file_name }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p>No media available for this task.</p>
                        @endif
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary float-end">Update</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
@endsection

@section('modals')
@endsection

@section('javascript')
    <script></script>
@endsection
