@extends('layout.layout')

@section('title', 'Products')

@section('content')
    <!-- Main Content Section Starts Here -->
    <section class="main-content py-4">
        <div class="container">
            <div class="row">
                @include('users.shared.left-sidebar-user-profile')

                <!-- Products Section Starts -->
                <div class="col-md-9">
                    <h1>Produtos</h1>
                    <div class="d-grid gap-2 d-md-flex mb-4">
                        <button id="myInput" class="btn btn-dark text-light" type="button" data-mdb-ripple-init
                            data-bs-toggle="modal" data-bs-target="#registerProductModal">
                            Cadastrar Produto
                        </button>
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
