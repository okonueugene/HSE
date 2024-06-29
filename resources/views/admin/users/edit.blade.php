@extends('layout.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Users List Table -->
        <div class="card">
            <div class="card-header text-center">
                <span>
                    Edit User
                </span>
            </div>
            <div class="card">
                <div class="card-body">
                    <form id="editUser">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">User Name</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Enter User Name" value="{{ $user->name }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control" name="email" id="email"
                                    placeholder="Enter Email" value="{{ $user->email }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Role</label>
                                <select class="form-select" name="role" id="role">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}"
                                            {{ $user->roles->first() ? ($role->id == $user->roles->first()->id ? 'selected' : '') : '' }}>
                                            {{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                            </div>
                        </div>
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
        $('#editUser').on('submit', function(e) {
            e.preventDefault();

            // Get the form data
            var formData = $(this).serialize();

            $.ajax({
                url: "{{ route('userslist.update', $user->id) }}",
                type: "PATCH",
                data: formData,
                success: function(response) {
                    if (response) {
                        $('#editUser')[0].reset();
                        console.log(response);
                        // window.location.href = "{{ route('userslist') }}";
                        iziToast.success({
                            title: 'Success!',
                            message: 'User Updated Successfully!',
                            position: 'topRight'
                        });
                        setTimeout(() => {
                            window.location.href = "{{ route('userslist') }}";

                        }, 2000);
                    } else {
                        iziToast.error({
                            title: 'Error!',
                            message: 'Something Went Wrong!',
                            position: 'topRight'
                        });
                    }
                }
            });
        });
    </script>
@endsection
