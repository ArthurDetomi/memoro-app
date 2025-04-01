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
                    placeholder="Digite o título da memória" required>
            </div>

            <div class="mb-3">
                <label for="memorieDescription" class="form-label">
                    Descrição
                </label>
                <textarea class="form-control" id="memorieDescription" name="description" rows="3"
                    placeholder="Digite a descrição"></textarea>
            </div>

            <div class="mb-3">
                <label for="addImage" class="form-label">
                    Adicionar Imagens<span class="text-danger">*</span>
                </label>
                <input type="file" class="form-control" id="addImage" name="images[]" accept="image/*" multiple
                    required>
            </div>

            <button type="submit" class="btn btn-dark">Salvar</button>
            <a href="{{ route('memories.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
