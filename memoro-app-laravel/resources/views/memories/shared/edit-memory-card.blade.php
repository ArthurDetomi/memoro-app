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
                <a href="{{ route('memories.index') }}" class="btn btn-secondary me-2" title="Voltar"><i
                        class="fas fa-arrow-left"></i></a>
                <button type="submit" class="btn btn-dark">Salvar
                    Informações</button>
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
                <input type="file" class="form-control" id="addImage" name="images[]" multiple accept="image/*">

                @error('images[]')
                    <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>

            <div class="text-end">
                <a href="{{ route('memories.index') }}" class="btn btn-secondary me-2" title="Voltar"><i
                        class="fas fa-arrow-left"></i></a>
                <button type="submit" class="btn btn-dark">Salvar Imagens</button>
            </div>
        </form>

    </div>
</div>
