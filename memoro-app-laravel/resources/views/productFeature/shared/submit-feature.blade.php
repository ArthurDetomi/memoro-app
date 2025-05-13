<!-- Texto de orientação -->
<p class="mb-1 fw-semibold">Tipo de produto:</p>

<!-- Filtro: Tipo de Produto -->
<form method="GET" action="{{ route('productsfeature.index') }}" class="mb-3">
    <div class="input-group">
        <select class="form-select" name="product_type_id" class="form-select" onchange="this.form.submit()">
            <option selected value="null">Todos</option>
            @foreach ($products_types as $type)
                <option value="{{ $type->id }}" {{ request('product_type_id') == $type->id ? 'selected' : '' }}>
                    {{ $type->name }}
                </option>
            @endforeach
        </select>
    </div>
</form>

<!-- Cadastro de novo atributo -->
<div class="input-group mb-3">
    <input type="text" class="form-control" placeholder="Novo atributo">
    <button class="btn btn-dark" type="button" title="Cadastrar"><i class="fas fa-check"></i></button>
</div>

<!-- Lista de Atributos -->
<ul class="list-group">
    <li class="list-group-item d-flex justify-content-between align-items-center">
        harmonização
        <button class="btn btn-outline-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center">
        acidez
        <button class="btn btn-outline-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
    </li>
</ul>
