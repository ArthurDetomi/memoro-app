@section('title', 'Register')

@extends('layout.layout-auth')
@section('content')
    <section class="main-content py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4 p-md-5">

                            <h2 class="card-title text-center fw-bolder mb-4">Register</h2>
                            
                            <form action="{{ route('register') }}" method="post">
                                @csrf

                                <div class="form-floating mb-3">
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="Enter your name" value="{{ old('name') }}" required />
                                    <label for="name">Name</label>
                                    @error('name')
                                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="Enter email" value="{{ old('email') }}" required />
                                    <label for="email">Email address</label>
                                    @error('email')
                                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" name="password" id="password" class="form-control"
                                        placeholder="Password" required />
                                    <label for="password">Password</label>
                                    @error('password')
                                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-floating mb-4">
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        class="form-control" placeholder="Confirm Password" required />
                                    <label for="password_confirmation">Confirm Password</label>
                                </div>
                                @include('shared.success-message')
                                <div class="d-grid mt-3">
                                    <button type="submit" class="btn btn-dark btn-lg">Register</button>
                                </div>
                                <div class="text-center mt-4">
                                    <p>
                                        Already have an account?
                                        <a href="{{ route('login') }}" class="text-decoration-none fw-bold">Login</a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
