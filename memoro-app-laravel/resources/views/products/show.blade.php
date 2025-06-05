@extends('layout.layout')

@section('title', 'Product Detail')


@section('content')
    <!-- Main Content Section Starts Here -->
    <section class="main-content py-4">
        <div class="container">
            <div class="row">
                @include('users.shared.left-sidebar-user-profile')



                <!-- Specified Product Section Starts -->
                <div class="col-12 col-md-9 bg-white rounded-start p-4 shadow-sm">
                    <div class="row">
                        @include('shared.success-message')
                    </div>

                    <div class="row">
                        <!-- Imagem do Produto -->
                        <div class="col-12 col-sm-4 text-center text-sm-start mb-3 mb-sm-0">
                            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="{{ $product->getImageUrl() }}"
                                            class="d-block w-100 img-fluid rounded-start" alt="..." />
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>

                        <!-- Detalhes do Produto -->
                        <div class="col-12 col-sm-8">
                            <div class="d-flex align-items-center">
                                <h3 class="fw-bold me-2">{{ $product->name }}</h3>
                                @auth()
                                    @can('update', $product)
                                        <a href="{{ route('products.edit', $product->id) }}"
                                            class="btn btn-link btn-sm text-primary" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    @endcan
                                @endauth
                            </div>
                            <p class="text-muted">Tipo: {{ $product->type->name }}</p>
                            <p class="text-muted">Origem: {{ $product->region }}</p>
                            <p class="text-muted">Marca: {{ $product->brand }}</p>
                            <p class="text-muted">Fabricação: {{ $product->production_date }}</p>
                            <p class="text-muted">Validade: {{ $product->expiration }}</p>
                            <p class="text-muted">Produtor: {{ $product->producer }}</p>

                            <p class="text-muted">
                                Harmonização: {{ $product->pairing }}
                            </p>

                            @foreach ($features as $feature)
                                <p class="text-muted">
                                    {{ $feature->name }}: {{ $productFeatureMap[$feature->id]->value ?? null }}
                                </p>
                            @endforeach

                            <!-- Informações Pessoais -->
                            <div class="mt-4">
                                <p class="text-secondary">
                                    Quantidade em Estoque: {{ $product->quantity }}
                                </p>
                                <p class="text-secondary">
                                    Armazenamento: {{ $product->storage }}
                                </p>
                                <p class="text-secondary">
                                    <!--Notas Pessoais: Aberto para uma ocasião especial. Melhor servido a 18°C.-->
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Specified Product Section Ends -->
            </div>
        </div>
    </section>
    <!-- Main Content Section Ends Here -->
@endsection
