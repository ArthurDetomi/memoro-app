<style>
    .delete-btn {
        z-index: 1000;
        /* Garante que o botão fique acima da imagem */
    }
</style>

<!-- Edit Memorie Card Starts -->
<div class="card mb-5">
    <div class="card-body">
        <!-- Card Header -->
        <div class="card-header">
            <h5 class="card-title mb-0">Editar Memória</h5>
        </div>

        <!-- Card Body -->
        <div class="card-body">
            <form id="editMemoryForm" action="{{ route('memories.update', $memory->id) }}" method="POST"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <div class="row">
                    <!-- Carousel Section -->
                    <div class="col-md-6">
                        <div id="editMemorieCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner" id="carousel-inner">
                                @foreach ($memory->images as $image)
                                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                        <img src="{{ $image->getImageUrl() }}"
                                            class="d-block img-fluid w-100 mx-auto h-100 rounded-start"
                                            alt="..." />
                                        <button type="button" class="delete-btn" onclick="removeImage(this)">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#editMemorieCarousel"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Anterior</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#editMemorieCarousel"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Próxima</span>
                            </button>
                        </div>
                    </div>

                    <!-- Form Section -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="memorieTitle" class="form-label">Título</label>
                            <input type="text" class="form-control" name="title" id="memorieTitle"
                                value="{{ $memory->title }}" placeholder="Digite o título da memória" />
                        </div>
                        <div class="mb-3">
                            <label for="memorieDescription" class="form-label">Descrição</label>
                            <textarea class="form-control" id="memorieDescription" name="description" rows="3"
                                placeholder="Digite a descrição">{{ $memory->description }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="addImage" class="form-label">Adicionar Nova Imagem</label>
                            <input type="file" class="form-control" id="addImage" accept="image/*" name="images" />
                        </div>
                    </div>
                </div>

                <!-- Card Footer -->
                <div class="card-footer text-end">
                    <a href="{{ route('memories.index') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-dark">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Edit Memorie Card Ends -->
<script src="{{ asset('js/memories/shared/edit-memory-card.js') }}"></script>
