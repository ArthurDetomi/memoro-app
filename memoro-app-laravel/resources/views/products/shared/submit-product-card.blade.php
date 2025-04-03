<style>
    .star-rating {
        display: flex;
        gap: 5px;
    }

    .star-rating label {
        font-size: 24px;
        color: #ccc;
        cursor: pointer;
    }

    .star-rating input:checked~label {
        color: gold;
    }
</style>

<div class="card mb-5">
    <div class="card-body">
        <h1 class="mb-4"><i class="fas fa-box"></i> Cadastro Produto</h1>
        <form enctype="multipart/form-data" action="{{ route('products.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="product_name" class="form-label">Nome<span class="text-danger">*</span></label>
                <input type="text" id="product_name" name="name" class="form-control" required />
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
                <input type="number" id="product_weight" name="weight" class="form-control" required />
                @error('weight')
                    <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="product_quantity" class="form-label">Quantidade<span class="text-danger">*</span></label>
                <input type="number" id="product_quantity" name="quantity" class="form-control" min="0"
                    required />
                @error('quantity')
                    <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="product_type" class="form-label">Tipo de Produto<span class="text-danger">*</span></label>
                <select class="form-select" id="product_type" name="type_id" required>
                    <option selected disabled>Selecione um tipo</option>
                    @foreach ($products_types as $type)
                        <option value="{{ $type->id }}" @selected(old('product_type') == $type->id)>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
                @error('type_id')
                    <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="product_description" class="form-label">Descrição</label>
                <input type="text" id="product_description" name="description" class="form-control" />
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
                <input type="date" id="product_production_date" name="production_date" class="form-control" />
                @error('production_date')
                    <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="product_expiration" class="form-label">Validade</label>
                <input type="date" id="product_expiration" name="expiration" class="form-control" />
                @error('expiration')
                    <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="product_producer" class="form-label">Produtor</label>
                <input type="text" id="product_producer" name="producer" class="form-control" />
                @error('producer')
                    <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="product_storage" class="form-label">Armazenamento</label>
                <input type="text" id="product_storage" name="storage" class="form-control" />
                @error('storage')
                    <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="product_pairing" class="form-label">Harmonização</label>
                <input type="text" id="product_pairing" name="pairing" class="form-control" />
                @error('pairing')
                    <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="product_country_region" class="form-label">País/Região</label>
                <input type="text" id="product_country_region" name="region" class="form-control" />
                @error('region')
                    <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="product_brand" class="form-label">Marca</label>
                <input type="text" id="product_brand" name="brand" class="form-control" />
                @error('brand')
                    <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3 d-flex align-items-center">
                <label class="form-label me-2">Review de Sabor</label>
                <div class="star-rating d-flex">
                    <input type="radio" name="flavor_review" id="star1" value="0" hidden>
                    <label for="star1"><i class="fas fa-solid fa-star"></i></label>

                    <input type="radio" name="flavor_review" id="star2" value="1" hidden>
                    <label for="star2"><i class="fas fa-solid fa-star"></i></label>

                    <input type="radio" name="flavor_review" id="star3" value="2" hidden>
                    <label for="star3"><i class="fas fa-solid fa-star"></i></label>

                    <input type="radio" name="flavor_review" id="star4" value="3" hidden>
                    <label for="star4"><i class="fas fa-solid fa-star"></i></label>
                </div>
            </div>




            <button type="submit" class="btn btn-dark">Cadastrar</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>

<script>
    document.querySelectorAll('.star-rating input').forEach(radio => {
        radio.addEventListener('change', function() {
            let allStars = Array.from(document.querySelectorAll('.star-rating label'));
            let selectedValue = parseInt(this.value);

            // Resetando todas as estrelas para a cor padrão
            allStars.forEach(star => star.style.color = 'rgb(204, 204, 204)');

            // Pintando apenas as estrelas até a selecionada
            for (let i = 0; i <= selectedValue; i++) {
                allStars[i].style.color = 'gold';
            }
        });
    });
</script>
