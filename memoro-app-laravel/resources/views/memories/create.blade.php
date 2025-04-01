@extends('layout.layout')

@section('title', 'Memory Create')

@section('content')
    <!-- Main Content Section Starts Here -->
    <section class="main-content py-4">
        <div class="container">
            <div class="row">
                @include('users.shared.left-sidebar-user-profile')

                <!-- Feed Section Starts -->
                <div class="col-md-9">
                    @include('shared.error-message')
                    @include('memories.shared.submit-memory-card')
                </div>
            </div>
        </div>
    </section>
    <!-- Main Content Section Ends Here -->
@endsection
