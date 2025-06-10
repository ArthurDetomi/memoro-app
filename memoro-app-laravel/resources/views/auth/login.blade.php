@section('title', 'Login')

@extends('layout.layout-auth')
@section('content')
    <section class="main-content py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4 p-md-5">

                            <h2 class="card-title text-center fw-bolder mb-4">Login</h2>

                            <form action="{{ route('login') }}" method="post">
                                @csrf

                                @include('shared.success-message')

                                <div class="form-floating mb-3">
                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="Enter email" value="{{ old('email') }}" required />
                                    <label for="email">Email address</label>
                                    @error('email')
                                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-floating mb-4">
                                    <input type="password" name="password" id="password" class="form-control"
                                        placeholder="Password" required />
                                    <label for="password">Password</label>
                                    @error('password')
                                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="d-grid">
                                    <button type="submit" class="btn btn-dark btn-lg">Login</button>
                                </div>

                                <div class="text-center mt-4">
                                    <p>
                                        Don't have an account?
                                        <a href="{{ route('register') }}" class="text-decoration-none fw-bold">Register</a>
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
