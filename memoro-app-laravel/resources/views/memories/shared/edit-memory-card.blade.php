{{-- Título Principal --}}
{{-- Título Principal --}}
<div class="mb-4">
    <h2 class="fw-bold">
        <i class="fa fa-photo-video me-2 text-dark"></i>Editar Memória
    </h2>
</div>

{{-- Mensagens de Feedback --}}
<div class="mb-4">
    @include('shared.success-message')
    @include('shared.error-message')
</div>

{{-- Card: Editar Informações --}}
<div class="card mb-5 shadow-sm">
    <div class="card-header bg-dark text-white">
        <h5 class="mb-0"><i class="fas fa-edit"></i> Editar Informações</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('memories.update', $memory->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="memorieTitle" class="form-label">Título<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="memorieTitle" name="title" value="{{ $memory->title }}"
                    placeholder="Digite o título">

                @error('title')
                    <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="memorieDescription" class="form-label">Descrição</label>
                <textarea class="form-control" id="memorieDescription" name="description" rows="4"
                    placeholder="Digite a descrição">{{ $memory->description }}</textarea>
                @error('description')
                    <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>

            <div class="text-end">
                <a href="{{ route('dashboard') }}" class="btn btn-secondary me-2" title="Voltar"><i
                        class="fas fa-arrow-left"></i></a>
                <button type="submit" class="btn btn-dark">Salvar
                    Informações</button>
            </div>
        </form>
    </div>
</div>

{{-- Card: Produtos relacionados --}}
<div class="card shadow-lg rounded-4 border-0 mb-5">
    <div class="card-header bg-dark text-white rounded-top-4 d-flex align-items-center">
        <h5 class="mb-0"><i class="fas fa-edit me-2"></i> Produtos Relacionados</h5>
    </div>

    <div class="card-body">
        {{-- Produtos já relacionados --}}
        <h5 class="fw-semibold mb-4">Produtos já relacionados</h5>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 mb-4">
            @forelse ($relatedProducts as $product)
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm rounded-4 position-relative">
                        <div class="position-relative">
                            <img src="{{ $product->getImageUrl() }}" alt="{{ $product->name }}"
                                class="card-img-top rounded-top-4 img-fluid d-block w-100"
                                style="height: auto; max-height: 180px; object-fit: cover;">

                            <form action="{{ route('productMemories.destroy', [$memory->id, $product->id]) }}"
                                method="POST" class="position-absolute top-0 end-0 m-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger rounded-circle shadow-sm"
                                    title="Remover produto">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                        <div class="card-body text-center">
                            <h6 class="fw-bold mb-1">{{ $product->name }}</h6>
                            <small class="text-muted">{{ $product->brand }}</small>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info text-center mb-0">
                        Nenhum produto relacionado ainda.
                    </div>
                </div>
            @endforelse
        </div>

        {{-- Tabela: Produtos disponíveis para relacionamento --}}
        <h5 class="fw-semibold mb-4">Relacionar a outros produtos</h5>

        <form action="{{ route('productMemories.store', $memory->id) }}" method="POST">
            @csrf

            <div class="table-responsive mb-4">
                <table class="table table-hover align-middle bg-white border rounded-3 overflow-hidden">
                    <thead class="bg-light text-center">
                        <tr>
                            <th style="width: 5%;">Selecionar</th>
                            <th style="width: 25%;">Produto</th>
                            <th>Descrição</th>
                            <th style="width: 10%;">Volume</th>
                            <th style="width: 15%;">Avaliação</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @forelse ($unrelatedProducts as $product)
                            <tr>
                                {{-- Checkbox --}}
                                <td>
                                    <input type="checkbox" name="products[]" value="{{ $product->id }}">
                                </td>

                                {{-- Imagem + nome + marca --}}
                                <td class="text-start">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ $product->getImageUrl() }}" alt="{{ $product->name }}"
                                            class="rounded-circle me-3"
                                            style="width: 45px; height: 45px; object-fit: cover;">
                                        <div>
                                            <p class="fw-semibold mb-1">{{ $product->name }}</p>
                                            <p class="text-muted mb-0 small">{{ $product->brand }}</p>
                                        </div>
                                    </div>
                                </td>

                                {{-- Descrição + Tipo --}}
                                <td>
                                    <p class="mb-1">{{ $product->description }}</p>
                                    <small class="text-muted">{{ $product->type->name }}</small>
                                </td>

                                {{-- Volume --}}
                                <td>{{ $product->weight }} {{ $product->unit_of_measure }}</td>

                                {{-- Avaliação --}}
                                <td>
                                    @if ($product->average_rating)
                                        @php
                                            $averageRating = round($product->average_rating);
                                        @endphp
                                        <div class="text-warning">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <i class="fas fa-star{{ $i <= $averageRating ? '' : '-o' }}"></i>
                                            @endfor
                                            <small class="text-muted">({{ $averageRating }})</small>
                                        </div>
                                    @else
                                        <span class="text-muted">---</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-muted">Nenhum produto encontrado.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-dark px-4">
                    <i class="fas fa-save me-2"></i>Relacionar
                </button>
            </div>
        </form>
    </div>
</div>


{{-- Card: Editar Imagens --}}
<div class="card shadow-sm mb-5">
    <div class="card-header bg-dark text-white">
        <h5 class="mb-0"><i class="fas fa-edit"></i> Editar Imagens</h5>
    </div>
    <div class="card-body">

        {{-- Carrossel --}}
        @if ($memory->images->isNotEmpty())
            <div id="memoryImageCarousel" class="carousel slide mb-4" data-bs-ride="carousel" data-bs-wrap="true">
                <div class="carousel-inner">
                    @foreach ($memory->images as $image)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}" style="position: relative;">
                            <img src="{{ $image->getImageUrl() }}" class="d-block w-100 rounded shadow-sm"
                                alt="Imagem" style="display: block; width: 100%; height: auto;">

                            <form action="{{ route('imageMemories.destroy', $image->id) }}" method="POST"
                                style="position: absolute; top: 10px; right: 10px; z-index: 999;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" title="Remover imagem">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#memoryImageCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#memoryImageCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                    <span class="visually-hidden">Próxima</span>
                </button>
            </div>
        @else
            <p class="text-muted">Nenhuma imagem adicionada ainda.</p>
        @endif


        {{-- Formulário para adicionar novas imagens --}}
        <form action="{{ route('imageMemories.store', $memory->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="addImage" class="form-label">Adicionar novas imagens</label>
                <input type="file" class="form-control" id="addImage" name="images[]" multiple
                    accept="image/*">

                @error('images[]')
                    <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>

            <div class="text-end">
                <a href="{{ route('dashboard') }}" class="btn btn-secondary me-2" title="Voltar"><i
                        class="fas fa-arrow-left"></i></a>
                <button type="submit" class="btn btn-dark">Salvar Imagens</button>
            </div>
        </form>

    </div>
</div>
