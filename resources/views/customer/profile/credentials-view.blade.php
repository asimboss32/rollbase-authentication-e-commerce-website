@extends('customer.master')

@section('content')
    <div class="body flex-grow-1">
        <div class="container-lg px-4">
            <div class="row justify-content-center">
                <div class="col-md-12">

                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0">Update Profile Credentials</h5>
                        </div>

                        <div class="card-body">
                            <form action="{{ url('/customer/credentials-update') }}" method="POST">
                                @csrf

                                {{-- Email --}}
                                <div class="mb-3">
                                    <label class="form-label">Email*</label>
                                    <input type="email" name="email" class="form-control" value="{{$authUser->email}}" placeholder="Enter your email" required>
                                </div>

                                {{-- Old Password --}}
                                <div class="mb-3">
                                    <label class="form-label">Old Password</label>
                                    <input type="password" name="old_password" class="form-control" placeholder="Enter old password">
                                     @error('old_password')
                                    <span class="text-danger">{{$message}}</span>
                                 @enderror
                                </div>

                                {{-- New Password --}}
                                <div class="mb-3">
                                    <label class="form-label">New Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Enter new password">
                                     @error('password')
                                    <span class="text-danger">{{$message}}</span>
                                 @enderror
                                </div>

                                {{-- Confirm Password
                                <div class="mb-3">
                                    <label class="form-label">Confirm Password</label>
                                    <input type="password" name="confirm_password" class="form-control"
                                        placeholder="Confirm new password">
                                </div> --}}

                                {{-- Submit --}}
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-success">
                                        Update Credentials
                                    </button>
                                </div>

                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
