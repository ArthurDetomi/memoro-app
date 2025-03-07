@extends('layout.layout')

@section('title', $user->name)

@section('content')
    <!-- Main Content Section Starts Here -->
    <section class="main-content py-4">
        <div class="container">
            <div class="row">
                <!-- Profile Detail Section Starts -->
                <div class="col-md-8">
                    @include('users.shared.nav')

                    <!-- Profile Update Section Starts -->
                    <div class="card mb-3 p-5">
                        @include('shared.success-message')

                        <h2 class="mb-2 mt-1">Change Password</h2>
                        <hr />

                        <form action="{{ route('users.password.update', $user->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">New Password</label>
                                <div class="col-sm-9">
                                    <input type="password" name="password" class="form-control" id="newPassword"
                                        placeholder="Strong New Password" />

                                    @error('password')
                                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Confirm Password</label>
                                <div class="col-sm-9">
                                    <input type="password" name="password_confirmation" class="form-control"
                                        id="confirmPassword" placeholder="Confirm Password" />

                                    @error('password_confirmation')
                                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <hr />

                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Current Password</label>
                                <div class="col-sm-9">
                                    <input type="password" name="current_password" class="form-control" id="currentPassword"
                                        placeholder="Your Current Password" />

                                    @error('current_password')
                                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="inputPassword" class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <input type="submit" class="form-control btn btn-dark btn-lg" value="Save" />
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Profile Update Section Ends -->

                </div>
            </div>
        </div>
    </section>
    <!-- Main Content Section Ends Here -->
@endsection
