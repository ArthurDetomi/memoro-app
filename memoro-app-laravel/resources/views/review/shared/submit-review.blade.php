<!-- Texto de orientação -->
<p class="mb-1 fw-semibold">Tipo de produto:</p>

<!-- Filtro: Tipo de Produto -->
<form method="GET" action="{{ route('reviews.index') }}" class="mb-3">
    <div class="input-group">
        <select class="form-select" name="product_type_id" class="form-select" onchange="this.form.submit()">
            <option selected value="">Todos</option>
            @foreach ($productsTypes as $type)
                <option value="{{ $type->id }}" {{ request('product_type_id') == $type->id ? 'selected' : '' }}>
                    {{ $type->name }}
                </option>
            @endforeach
        </select>
    </div>
</form>

<form method="POST" action="{{ route('reviews.store') }}">
    @csrf
    <input type="hidden" name="product_type_id" value="{{ request('product_type_id') }}">

    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Novo tipo de review" name="name">
        @error('name')
            <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
        @enderror

        <button class="btn btn-dark" type="submit" title="Cadastrar">
            <i class="fas fa-check"></i>
        </button>
    </div>
</form>


<!-- Lista de Reviews -->
<ul class="list-group">
    @foreach ($reviews as $review)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ $review->name }}

            @isset($review->user_id)
                <form action="{{ route('reviews.destroy', $review->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-outline-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                </form>
            @endisset
        </li>
    @endforeach
</ul>
