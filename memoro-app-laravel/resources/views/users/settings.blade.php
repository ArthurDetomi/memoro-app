@extends('layout.layout')

@section('title', $user->name)

@section('content')

    @include('users.shared.nav')

    <!-- Profile Update Section Starts -->
    <div class="card mb-3 p-5 col-md-6">
        @include('shared.success-message')

        <h2 class="mb-2">Settings</h2>
        <p class="small text-body-secondary">
            Note: This is an important page whcih can erase your data
            permanently. So only make changes if you're sure of what you're
            doing.
        </p>
        <hr />

        <div class="row">

            <div class="col col-6">
                <form action="{{ route('users.deactivate', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <p class="small text-body-secondary">
                        I want to deactivate account for some time and may use
                        later.
                    </p>


                    <button type="submit" class="btn btn-secondary btn-lg">Deactivate Account</button>
                </form>
            </div>
            <!--
                                                                                                                    <div class="col">
                                                                                                                        <p class="small text-body-secondary mb-3">
                                                                                                                            I want to delete my account permanently. It's okay even if I
                                                                                                                            lose my friends and posts.
                                                                                                                        </p>
                                                                                                                        <a href="#" class="btn btn-outline-danger btn-lg">Delete Account</a>
                                                                                                                    </div>
                                                                                                                -->
        </div>
    </div>
    <!-- Profile Update Section Ends -->
@endsection
