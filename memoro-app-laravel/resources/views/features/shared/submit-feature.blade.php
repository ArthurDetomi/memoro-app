<!-- Texto de orientação -->
<p class="mb-1 fw-semibold">Tipo de produto:</p>

<!-- Filtro: Tipo de Produto -->
<form method="GET" action="{{ route('features.index') }}" class="mb-3">
    <div class="input-group">
        <select class="form-select" name="type_id" class="form-select" onchange="this.form.submit()">
            <option selected value="">Todos</option>
            @foreach ($productsTypes as $type)
                <option value="{{ $type->id }}" {{ request('type_id') == $type->id ? 'selected' : '' }}>
                    {{ $type->name }}
                </option>
            @endforeach
        </select>
    </div>
</form>

<form method="POST" action="{{ route('features.store') }}">
    @csrf
    <input type="hidden" name="type_id" value="{{ request('type_id') }}" required readonly>

    <div class="mb-3">
        <div class="input-group">
            <input type="text" class="form-control @error('name') is-invalid @enderror"
                placeholder="Nova característica" name="name" required>
            <button class="btn btn-dark" type="submit" title="Cadastrar">
                <i class="fas fa-check"></i>
            </button>
        </div>

        @error('name')
            <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
    </div>
</form>


<!-- Lista de Reviews -->
<ul class="list-group">
    @foreach ($features as $feature)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ $feature->name }}

            @isset($feature->user_id)
                <form action="{{ route('features.destroy', $feature->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-outline-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                </form>
            @endisset
        </li>
    @endforeach
</ul>
