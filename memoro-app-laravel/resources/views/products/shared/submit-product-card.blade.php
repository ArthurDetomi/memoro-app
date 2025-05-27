<div class="card mb-5">
    <div class="card-body">
        <h1 class="mb-4"><i class="fas fa-box"></i> Cadastro Produto</h1>
        <form enctype="multipart/form-data" action="{{ route('products.store') }}" method="POST">
            @csrf

            <input name="type_id" hidden readonly value="{{ $productType->id }}">

            <div class="mb-3">
                <label for="product_name" class="form-label">Nome<span class="text-danger">*</span></label>
                <input type="text" id="product_name" name="name" class="form-control" required
                    value="{{ old('name') }}" />
                @error('name')
                    <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="unit_of_measure" class="form-label">Unidade de Medida<span
                        class="text-danger">*</span></label>
                <select id="unit_of_measure" name="unit_of_measure" class="form-control" required>
                    <option value="">Selecione uma opção</option>
                    <option value="kg">kg (Quilograma)</option>
                    <option value="g">g (Grama)</option>
                    <option value="L">L (Litro)</option>
                    <option value="mL">mL (Mililitro)</option>
                    <option value="un">un (Unidade)</option>
                    <option value="cx">cx (Caixa)</option>
                </select>
                @error('unit_of_measure')
                    <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="product_weight" class="form-label">Peso<span class="text-danger">*</span></label>
                <input type="number" id="product_weight" name="weight" class="form-control" required
                    value="{{ old('weight') }}" />
                @error('weight')
                    <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="product_quantity" class="form-label">Quantidade<span class="text-danger">*</span></label>
                <input type="number" id="product_quantity" name="quantity" class="form-control" min="0" required
                    value="{{ old('quantity') }}" />
                @error('quantity')
                    <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="product_description" class="form-label">Descrição</label>
                <input type="text" id="product_description" name="description" class="form-control"
                    value="{{ old('description') }}" />
                @error('description')
                    <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Imagem:</label>
                <input type="file" class="form-control" id="product_image" name="image" />
                @error('image')
                    <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>


            <div class="mb-3">
                <label for="product_production_date" class="form-label">Fabricação</label>
                <input type="date" id="product_production_date" name="production_date" class="form-control"
                    value="{{ old('production_date') }}" />
                @error('production_date')
                    <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="product_expiration" class="form-label">Validade</label>
                <input type="date" id="product_expiration" name="expiration" class="form-control"
                    value="{{ old('expiration') }}" />
                @error('expiration')
                    <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="product_producer" class="form-label">Produtor</label>
                <input type="text" id="product_producer" name="producer" class="form-control"
                    value="{{ old('producer') }}" />
                @error('producer')
                    <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="product_storage" class="form-label">Armazenamento</label>
                <input type="text" id="product_storage" name="storage" class="form-control"
                    value="{{ old('storage') }}" />
                @error('storage')
                    <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="product_pairing" class="form-label">Harmonização</label>
                <input type="text" id="product_pairing" name="pairing" class="form-control"
                    value="{{ old('pairing') }}" />
                @error('pairing')
                    <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="product_country_region" class="form-label">País/Região</label>
                <input type="text" id="product_country_region" name="region" class="form-control"
                    value="{{ old('region') }}" />
                @error('region')
                    <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="product_brand" class="form-label">Marca</label>
                <input type="text" id="product_brand" name="brand" class="form-control"
                    value="{{ old('brand') }}" />
                @error('brand')
                    <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>

            @foreach ($features as $feature)
                @php
                    $featureNameForm = Str::slug($feature->name);
                @endphp

                <div class="mb-3">
                    <label for="{{ $featureNameForm }}" class="form-label">{{ $feature->name }}</label>
                    <input type="text" id="{{ $featureNameForm }}" name="{{ $featureNameForm }}"
                        class="form-control" value="{{ old($featureNameForm) }}" />

                    @error($featureNameForm)
                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
            @endforeach

            <button type="submit" class="btn btn-dark">Cadastrar</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
