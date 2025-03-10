@section('title', 'Login')

@extends('layout.layout-auth')
@section('content')
    <!-- Main Content Section Starts Here -->
    <section class="main-content py-5 container-fluid">
        <!--row justify-content-center is used for centering the login form-->
        <section class="row justify-content-center">
            <!--Making the form responsive-->
            <section class="col-12 col-sm-6 col-md-4">
                <form action="{{ route('login') }}" method="post" class="form-container">
                    @csrf
                    <h3 class="text-center font-weight-bolder">Login</h3>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter email" />
                        @error('email')
                            <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" />
                        @error('password')
                            <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-dark mt-3">Login</button>
                    <div class="mt-3">
                        <p>
                            Don't have an account?
                            <a href="{{ route('register') }}" class="text-decoration-none">Register</a>
                        </p>
                    </div>
                    <div class="mt-3">
                        @include('shared.success-message')
                    </div>
                </form>
            </section>
        </section>
    </section>
    <!-- Main Content Section Ends Here -->
@endsection
