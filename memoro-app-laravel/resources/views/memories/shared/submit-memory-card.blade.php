<div class="card mb-5">
    <div class="card-body">
        <h1 class="mb-4"><i class="fas fa-save"></i> Cadastrar Memória</h1>
        <form action="{{ route('memories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="memorieTitle" class="form-label">
                    Título<span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control" id="memorieTitle" name="title"
                    placeholder="Digite o título da memória" required value="{{ old('title') }}">
                @error('title')
                    <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="memorieDescription" class="form-label">
                    Descrição
                </label>
                <textarea class="form-control" id="memorieDescription" name="description" rows="3"
                    placeholder="Digite a descrição">{{ old('description') }}</textarea>
                @error('description')
                    <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>

            <!-- Produtos relacionados -->
            <div class="mb-4">
                <label class="form-label">
                    Produtos Relacionados<span class="text-danger">*</span>
                </label>

                @if ($errors->has('products'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $errors->first('products') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table align-middle bg-white">
                        <thead class="bg-light">
                            <tr class="text-center">
                                <th>Selecionar</th>
                                <th>Produto</th>
                                <th>Descrição</th>
                                <th>Volume</th>
                                <th>Avaliação</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @forelse ($products as $product)
                                <tr>
                                    <!-- Checkbox -->
                                    <td>
                                        <input type="checkbox" name="products[]" value="{{ $product->id }}">
                                    </td>

                                    <!-- Foto + Nome + Marca -->
                                    <td class="text-start">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ $product->getImageUrl() }}" alt="{{ $product->name }}"
                                                style="width: 45px; height: 45px" class="rounded-circle me-2" />
                                            <div>
                                                <p class="fw-bold mb-1">{{ $product->name }}</p>
                                                <p class="text-muted mb-0">{{ $product->brand }}</p>
                                            </div>
                                        </div>
                                    </td>

                                    <!-- Descrição + Tipo -->
                                    <td>
                                        <p class="mb-1">{{ $product->description }}</p>
                                        <small class="text-muted">{{ $product->type->name }}</small>
                                    </td>

                                    <!-- Volume -->
                                    <td>{{ $product->weight }} {{ $product->unit_of_measure }}</td>

                                    <!-- Avaliação -->
                                    <td>
                                        @if ($product->average_rating)
                                            @php
                                                $averageRating = round($product->average_rating);
                                            @endphp
                                            <span class="text-warning">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <i
                                                        class="fas fa-star{{ $i <= floor($averageRating) ? '' : '-o' }}"></i>
                                                @endfor
                                                <small class="text-muted">({{ $averageRating }})</small>
                                            </span>
                                        @else
                                            ---
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">Nenhum produto encontrado.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mb-3">
                <label for="addImage" class="form-label">
                    Adicionar Imagens<span class="text-danger">*</span>
                </label>
                <input type="file" class="form-control" id="addImage" name="images[]" accept="image/*" multiple
                    required>
                @error('images[]')
                    <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-dark">Salvar</button>
            <a href="{{ route('memories.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
