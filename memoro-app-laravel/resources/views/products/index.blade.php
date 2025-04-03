@extends('layout.layout')

@section('title', 'Products')

@section('content')
    <!-- Main Content Section Starts Here -->
    <section class="main-content py-4">
        <div class="container">
            <div class="row">
                @include('users.shared.left-sidebar-user-profile')

                <!-- Products Section Starts -->
                <!--   <a class="btn btn-dark rounded-circle" data-mdb-ripple-init href="{{ route('memories.create') }}"
                                                                    title="Cadastrar memória">
                                                                    <i class="fas fa-plus"></i>
                                                                </a> -->

                <div class="col-md-6">
                    <div class="d-flex align-items-center mb-3">
                        <h1 class="m-0"><i class="fa fa-box me-2"></i> Produtos</h1>
                        <a class="btn btn-dark rounded-circle text-light ms-3" title="Cadastrar Produto">
                            <i class="fas fa-plus"></i>
                        </a>
                    </div>

                    @include('shared.success-message')

                    @include('products.shared.register-product-dialog')

                    @include('products.shared.table-products')
                </div>
                <!-- Products Section Ends -->
            </div>
        </div>
    </section>
    <!-- Main Content Section Ends Here -->
@endsection
