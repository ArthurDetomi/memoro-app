<style>
    .delete-btn {
        z-index: 1000;
        /* Garante que o botão fique acima da imagem */
    }
</style>

<div class="modal fade" id="registerMemorieModal" tabindex="-1" aria-labelledby="registerMemorieModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form action="{{ route('memories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="registerMemorieModalLabel">
                        Cadastrar Memória
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div id="registerMemorieCarousel" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner" id="carousel-inner">
                                    <!-- As imagens serão adicionadas dinamicamente aqui -->
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#registerMemorieCarousel" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Anterior</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#registerMemorieCarousel" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Próxima</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="memorieTitle" class="form-label">Título</label>
                                <input type="text" class="form-control" id="memorieTitle" name="title"
                                    placeholder="Digite o título da memória" />
                            </div>
                            <div class="mb-3">
                                <label for="memorieDescription" class="form-label">Descrição</label>
                                <textarea class="form-control" id="memorieDescription" name="description" rows="3"
                                    placeholder="Digite a descrição"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="addImage" class="form-label">Adicionar Nova Imagem</label>
                                <input type="file" class="form-control" id="addImage" name="images"
                                    accept="image/*" multiple />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancelar
                    </button>
                    <button type="submit" class="btn btn-dark">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="{{ asset('js/memories/shared/register-memory-dialog.js') }}"></script>
