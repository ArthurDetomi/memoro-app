@extends('layout.layout')

@section('title', 'Edit Product')


@section('content')
    <!-- Main Content Section Starts Here -->
    <section class="main-content py-4">
        <div class="container">
            <div class="row">
                @include('users.shared.left-sidebar-user-profile')

                <!-- Edit Product Form Section Starts -->
                <div class="col-12 col-md-9 bg-white rounded-start p-4 shadow-sm mb-5">
                    <form class="mb-16" action="{{ route('products.update', $product->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

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
                                </div>
                            </div>

                            <!-- Detalhes do Produto -->
                            <div class="col-12 col-sm-8">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Nome do Produto</label>
                                    <input type="text" class="form-control" name="name" value="{{ $product->name }}">

                                    @error('name')
                                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Tipo</label>
                                    <select class="form-select" disabled>
                                        @foreach ($products_types as $type)
                                            <option value="{{ $type->id }}"
                                                {{ $type->id == $product->type_id ? 'selected' : '' }}>
                                                {{ $type->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('type_id')
                                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Origem</label>
                                    <input type="text" class="form-control" name="region"
                                        value="{{ $product->region }}">

                                    @error('region')
                                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Marca</label>
                                    <input type="text" class="form-control" name="brand"
                                        value="{{ $product->brand }}">

                                    @error('brand')
                                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Fabricação</label>
                                    <input type="date" class="form-control" name="production_date"
                                        value="{{ $product->production_date }}">

                                    @error('production_date')
                                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Validade</label>
                                    <input type="date" class="form-control" name="expiration"
                                        value="{{ $product->expiration }}">

                                    @error('expiration')
                                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Produtor</label>
                                    <input type="text" class="form-control" name="producer"
                                        value="{{ $product->producer }}">

                                    @error('producer')
                                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Harmonização</label>
                                    <textarea class="form-control" name="pairing" rows="2">{{ $product->pairing }}</textarea>

                                    @error('pairing')
                                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>

                                @foreach ($features as $feature)
                                    <div class="mb-3">
                                        <label class="form-label">{{ $feature->name }}</label>
                                        <input type="text" class="form-control" name="{{ Str::slug($feature->name) }}"
                                            value="{{ $productFeatureMap[$feature->id]->value ?? null }}">
                                        @error($feature->name)
                                            <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                        @enderror
                                    </div>
                                @endforeach

                                <!-- Informações Pessoais -->
                                <div class="mt-4">
                                    <div class="mb-3">
                                        <label class="form-label">Quantidade em Estoque</label>
                                        <input type="number" class="form-control" name="quantity"
                                            value="{{ $product->quantity }}">

                                        @error('quantity')
                                            <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Armazenamento</label>
                                        <input type="text" class="form-control" name="storage"
                                            value="{{ $product->storage }}">

                                        @error('storage')
                                            <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Imagem:</label>
                                        <input type="file" class="form-control" name="image" />

                                        @error('image')
                                            <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>

                                <!-- Botões -->
                                <div class="d-flex justify-content-end mt-3">
                                    <button type="submit" class="btn btn-dark">Salvar Alterações</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Edit Product Form Section Ends -->
            </div>
        </div>
    </section>
    <!-- Main Content Section Ends Here -->
@endsection
