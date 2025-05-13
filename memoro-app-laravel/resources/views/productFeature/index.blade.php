@extends('layout.layout')

@section('title', 'Products')

@section('content')
    <!-- Main Content Section Starts Here -->
    <section class="main-content py-4">
        <div class="container">
            <div class="row">
                @include('users.shared.left-sidebar-user-profile')

                <div class="col-md-6">
                    <div class="d-flex align-items-center mb-3">
                        <h1 class="m-0"><i class="fas fa-cog"></i> Configurações</h1>
                    </div>

                    @include('shared.success-message')



                    <div class="card mb-5">
                        <div class="card-body">
                            @include('products.settings.shared.nav')

                            @include('productFeature.shared.submit-feature')
                        </div>
                    </div>


                </div>
                <!-- Products Section Ends -->
            </div>
        </div>
    </section>
    <!-- Main Content Section Ends Here -->
@endsection
