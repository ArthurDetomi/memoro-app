@extends('layout.layout-auth')
@section('content')
    <!-- Main Content Section Starts Here -->
    <section class="main-content py-5 container-fluid">
        <!--row justify-content-center is used for centering the login form-->
        <section class="row justify-content-center">
            <!--Making the form responsive-->
            <section class="col-12 col-sm-6 col-md-4">
                <form action="{{ route('register') }}" method="post" class="form-container">
                    @csrf
                    <h3 class="text-center font-weight-bolder">Register</h3>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" id="name" class="form-control"
                            placeholder="Enter your name" />
                        @error('name')
                            <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Email address</label>
                        <input type="email" name="email" class="form-control" aria-describedby="emailHelp"
                            placeholder="Enter email" />
                        @error('email')
                            <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" />
                        @error('password')
                            <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control"
                            placeholder="Confirm Password" />
                        @error('password_confirmation')
                            <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-dark mt-3">Register</button>
                    <div class="mt-3">
                        @include('shared.success-message')
                    </div>
                    <div class="mt-3">
                        <p>
                            Already have an account?
                            <a href="{{ route('login') }}" class="text-decoration-none">Login</a>
                        </p>
                    </div>
                </form>
            </section>
        </section>
    </section>
    <!-- Main Content Section Ends Here -->
@endsection
