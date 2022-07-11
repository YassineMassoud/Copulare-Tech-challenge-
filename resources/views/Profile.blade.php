@extends('layouts.app')
@section('title','View organization')
@section('content')
    <div class="d-flex justify-content-between">
        <h6 class="card-title">Profile</h6>
    </div>

    <div class="row">

        <div class="col-md-12 grid-margin stretch-card">
            @include('common.alert', ['module' => 'Profile', 'module_id' => 'profile'])
        </div>

        <div class="col-md-12 grid-margin stretch-card">

            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
                        <h6 class="card-title mb-0">Profile Info</h6>
                    </div>
                    <form action="{{ url('updateProfile') }}" method="post" id="profileUpdateForm" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user_id }}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter Your Name" value="{{ Auth::user()->name }}" required>
                                        @error('name')
                                        <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter Your Email" value="{{ Auth::user()->email }}" required>
                                        <span id="emailAlert" style="font-size: 12px; color: red;">
                                            @error('email')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Profile Picture</label>
                                        <input type="file" class="form-control @error('img_url') is-invalid @enderror" id="img_url" name="img_url">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-success profileUpdate">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-12 grid-margin stretch-card mt-3">

            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
                        <h6 class="card-title mb-0">Change Password</h6>
                    </div>
                    <form action="{{ url('updatePassword') }}" method="post" id="changePasswordForm">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user_id }}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="*****" required>
                                        @error('password')
                                            <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="*****" required>
                                        <span id="changePasswordAlert" style="font-size: 12px; color: red;"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-success passwordChange">Change Password</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script type="text/javascript">
        $('.profileUpdate').click(function (e) {
            e.preventDefault();
            let name = $('#name').val();
            let email = $('#email').val();
            let email_regex = /\S+@\S+\.\S+/;
            if(email_regex.test(email)) {
                axios.get('{{ url('checkUniqueEmail') }}/{{ $user_id }}/'+$("#email").val())
                .then(response => {
                    if(response.data == 'unique') {
                        $('#emailAlert').empty()
                        $('#profileUpdateForm').submit()
                    } else {
                        $('#emailAlert').empty()
                        $('#emailAlert').append('Email already taken. Try an unique email.')
                    }
                })
            } else {
                $('#emailAlert').empty()
                $('#emailAlert').append('Insert a valid email.')
            }

            //$('#profileUpdateForm').submit()
        })

        $('.passwordChange').click(function (e) {
            e.preventDefault();
            let password = $('#password').val();
            let confirm_password = $('#confirm_password').val();

            if(password == confirm_password) {
                $('#changePasswordAlert').empty()
                $('#changePasswordForm').submit()
            } else {
                $('#changePasswordAlert').empty()
                $('#changePasswordAlert').append('Password and Change Password doesn\'t match')
            }
        })
    </script>
@endpush
