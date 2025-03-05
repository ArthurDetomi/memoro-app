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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('registerMemorieModal');
        const carouselInner = document.getElementById('carousel-inner');

        let selectedImages = [];

        modal.addEventListener('hidden.bs.modal', function() {
            carouselInner.innerHTML = ''; // Limpa todas as imagens do carrossel
            selectedImages = [];
            document.getElementById('addImage').value = ''; // Limpa o input de arquivo
        });


        document.getElementById('addImage').addEventListener('change', function(event) {
            const carouselInner = document.getElementById('carousel-inner');
            const file = event.target.files[0];

            if (file) {
                selectedImages.push(file);

                const reader = new FileReader();

                reader.onload = function(e) {
                    const carouselItem = document.createElement('div');
                    carouselItem.classList.add('carousel-item');
                    if (carouselInner.children.length === 0) {
                        carouselItem.classList.add('active');
                    }

                    const imgContainer = document.createElement('div');
                    imgContainer.style.position = 'relative';
                    imgContainer.style.width = '500px';
                    imgContainer.style.height = '500px';
                    imgContainer.style.overflow = 'hidden';

                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.classList.add('d-block', 'mx-auto');
                    img.style.width = '100%';
                    img.style.height = '100%';
                    img.style.objectFit = 'cover';

                    const deleteBtn = document.createElement('button');
                    deleteBtn.classList.add('delete-btn');
                    deleteBtn.innerHTML = '<i class="fas fa-trash-alt"></i>';
                    deleteBtn.onclick = function() {
                        const index = selectedImages.indexOf(file);

                        if (index > -1) {
                            selectedImages.splice(index, 1);
                        }

                        carouselItem.remove();
                        if (carouselInner.children.length > 0) {
                            carouselInner.children[0].classList.add('active');
                        }
                    };

                    imgContainer.appendChild(img);
                    imgContainer.appendChild(deleteBtn);
                    carouselItem.appendChild(imgContainer);
                    carouselInner.appendChild(carouselItem);
                };

                reader.readAsDataURL(file);
            }
        });


        document.querySelector('#registerMemorieModal form').addEventListener('submit', function(
            event) {
            event.preventDefault();

            let xhr = new XMLHttpRequest();
            xhr.open(this.method, this.action, true);

            xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

            let formData = new FormData(this);

            xhr.setRequestHeader('X-CSRF-TOKEN', formData.get('_token'));

            xhr.setRequestHeader('Accept', 'application/json');


            selectedImages.forEach((file) => {
                formData.append('images[]', file);
            })


            xhr.onload = function() {
                let response = JSON.parse(xhr.responseText);

                if (xhr.status >= 200 && xhr.status < 500) {
                    if (response.success) {
                        alert('Memória cadastrada com sucesso!');
                        location.reload();
                    } else {
                        displayErrors(response.errors);
                        alert('Dados inválidos.');
                    }
                } else {
                    displayErrors(response.errors);
                    alert('Houve um erro inesperado no envio da requisição.');
                }
            }

            xhr.onerror = function(err) {
                alert('Houve um erro inesperado no envio da requisição.');
            };

            xhr.send(formData);
        });

        function displayErrors(errors) {
            document.querySelectorAll('.is-invalid').forEach(function(element) {
                element.classList.remove('is-invalid');
            });
            document.querySelectorAll('.text-danger').forEach(function(element) {
                element.remove();
            });

            for (const field in errors) {
                const errorMessages = errors[field];
                const inputField = document.querySelector('[name="' + field + '"]');

                inputField.classList.add('is-invalid');

                const errorSpan = document.createElement('span');
                errorSpan.classList.add('d-block', 'fs-6', 'text-danger', 'mt-2');
                errorSpan.textContent = errorMessages.join(', ');
                inputField.insertAdjacentElement('afterend', errorSpan);
            }
        }

    });
</script>
