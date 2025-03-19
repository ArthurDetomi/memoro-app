<!-- Register Product Modal Starts -->
<div class="modal fade" id="registerProductModal" tabindex="-1" aria-labelledby="registerProductModalLabel"
    aria-hidden="true">
    <form enctype="multipart/form-data" action="{{ route('products.store') }}" method="POST">
        @csrf

        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="registerProductModalLabel">
                        Cadastro Produto
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-12">
                        <div data-mdb-input-init class="form-outline">
                            <label class="form-label" for="product_name">Nome</label>
                            <input type="text" id="product_name" name="name" class="form-control" />
                        </div>
                        @error('name')
                            <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12">
                        <div data-mdb-input-init class="form-outline">
                            <label class="form-label" for="product_description">Descrição</label>
                            <input type="text" id="product_description" name="description" class="form-control" />
                        </div>
                    </div>

                    <div class="col-12">
                        <div data-mdb-input-init class="form-outline">
                            <label class="form-label" for="unit_of_measure">Unidade de Medida</label>
                            <select id="unit_of_measure" name="unit_of_measure" class="form-control">
                                <option value="">Selecione uma opção</option>
                                <option value="kg">kg (Quilograma)</option>
                                <option value="g">g (Grama)</option>
                                <option value="L">L (Litro)</option>
                                <option value="mL">mL (Mililitro)</option>
                                <option value="un">un (Unidade)</option>
                                <option value="cx">cx (Caixa)</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-12">
                        <div data-mdb-input-init class="form-outline">
                            <label class="form-label" for="product_weight">Peso</label>
                            <input type="number" id="product_weight" name="weight" class="form-control" />
                        </div>
                    </div>

                    <div class="col-12">
                        <div data-mdb-input-init class="form-outline">
                            <label class="form-label" for="product_quantity">Quantidade</label>
                            <input type="number" id="product_quantity" name="quantity" class="form-control" />
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-outline">
                            <label class="form-label">Imagem:</label>
                            <div>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="product_image">Adicionar imagem</label>
                                    <input type="file" class="form-control" id="product_image" name="image" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mb-2">
                        <div data-mdb-input-init class="form-outline">
                            <label class="form-label" for="product_type">Tipo de Produto</label>
                            <select class="form-select" id="product_type" name="type_id"
                                aria-label="Default select example">
                                <option selected disabled>Selecione um tipo</option>
                                @foreach ($products_types as $type)
                                    <option value="{{ $type->id }}" @selected(old('product_type') == $type->id)>
                                        {{ $type->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-12">
                        <div data-mdb-input-init class="form-outline">
                            <label class="form-label" for="roduct_production_date">Fabricação</label>
                            <input type="date" id="product_production_date" name="production_date"
                                class="form-control" />
                        </div>
                    </div>


                    <div class="col-12">
                        <div data-mdb-input-init class="form-outline">
                            <label class="form-label" for="product_expiration">Validade</label>
                            <input type="date" id="product_expiration" name="expiration" class="form-control" />
                        </div>
                    </div>

                    <div class="col-12">
                        <div data-mdb-input-init class="form-outline">
                            <label class="form-label" for="product_producer">Produtor</label>
                            <input type="text" id="product_producer" name="producer" class="form-control" />
                        </div>
                    </div>

                    <div class="col-12">
                        <div data-mdb-input-init class="form-outline">
                            <label class="form-label" for="product_storage">Armazenamento</label>
                            <input type="text" id="product_storage" name="storage" class="form-control" />
                        </div>
                    </div>

                    <div class="col-12">
                        <div data-mdb-input-init class="form-outline">
                            <label class="form-label" for="product_pairing">Harmonização</label>
                            <input type="text" id="product_pairing" name="pairing" class="form-control" />
                        </div>
                    </div>

                    <div class="col-12">
                        <div data-mdb-input-init class="form-outline">
                            <label class="form-label" for="product_country_region">País/Região</label>
                            <input type="text" id="product_country_region" name="region" class="form-control" />
                        </div>
                    </div>

                    <div class="col-12">
                        <div data-mdb-input-init class="form-outline">
                            <label class="form-label" for="product_brand">Marca</label>
                            <input type="text" id="product_brand" name="brand" class="form-control" />
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancelar
                    </button>
                    <button type="submit" class="btn btn-dark">
                        Cadastrar
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<script src="{{ asset('js/products/shared/register-product.js') }}"></script>
<!-- Register Product Modal Ends-->
