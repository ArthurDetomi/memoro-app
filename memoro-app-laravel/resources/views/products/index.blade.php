@extends('layout.layout')

@section('title', 'Products')

@section('content')
    <!-- Main Content Section Starts Here -->
    <section class="main-content py-4">
        <div class="container">
            <div class="row">
                @include('users.shared.left-sidebar-user-profile')

                <div class="col-md-8">
                    <div class="d-flex align-items-center mb-3">
                        <h1 class="m-0"><i class="fa fa-box me-2"></i> Produtos</h1>
                        <div class="d-flex align-items-center ms-auto gap-2">

                            <a class="btn btn-dark rounded-circle text-light" href="{{ route('products.select_type') }}"
                                title="Cadastrar Produto">
                                <i class="fas fa-plus"></i>
                            </a>

                            <a class="btn btn-dark rounded-circle text-light" title="Configurações"
                                href="{{ route('features.index') }}">
                                <i class="fas fa-cog"></i>
                            </a>

                        </div>
                    </div>

                    @include('shared.success-message')

                    @include('products.shared.table-products')
                </div>
                <!-- Products Section Ends -->
            </div>
        </div>
    </section>
    <!-- Main Content Section Ends Here -->
@endsection
