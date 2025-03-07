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
                        <h2 class="mb-2">Profile Info</h2>
                        <hr />

                        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Profile Picture</label>
                                <div class="col-sm-10">
                                    <img src="{{ $user->getImageUrl() }}" alt="{{ $user->name }}" height="100px"
                                        class="mb-2" />
                                    <input class="form-control" type="file" name="image" id="formFile" />

                                    @error('image')
                                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" id="firstName"
                                        placeholder="First Name" value="{{ $user->name }}" />

                                    @error('name')
                                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Birth Date</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="birth_date" placeholder="Birth Date"
                                        value="{{ $user->birth_date }}" />

                                    @error('birth_date')
                                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Job</label>
                                <div class="col-sm-10">
                                    <input type="text" name="profession" class="form-control" id="job"
                                        placeholder="Job Role" value="{{ $user->profession }}" />

                                    @error('profession')
                                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Living in</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="country" id="country"
                                        placeholder="Living in" value="{{ $user->country }}" />

                                    @error('country')
                                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Email</label>

                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="exampleFormControlInput1"
                                        placeholder="name@example.com" name="email" value="{{ $user->email }}" />

                                    @error('email')
                                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Short Bio</label>
                                <div class="col-sm-10">
                                    <textarea name="short_bio" id="" class="form-control" rows="3" placeholder="Tell us about yourself">{{ $user->short_bio }}</textarea>

                                    @error('short_bio')
                                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="inputPassword" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <input type="submit" class="form-control btn btn-dark btn-lg" value="Update" />
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Profile Update Section Ends -->
                </div>
                <!-- Profile Detail Section Starts -->

                <div class="col-md-4">...</div>
            </div>
        </div>
    </section>
    <!-- Main Content Section Ends Here -->
@endsection
