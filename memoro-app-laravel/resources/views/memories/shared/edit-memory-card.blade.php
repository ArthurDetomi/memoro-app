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

<script>
    // Função para remover uma imagem do carrossel (apenas no lado do cliente)
    function removeImage(button) {
        const carouselItem = button.closest('.carousel-item');
        carouselItem.remove();

        const carouselInner = document.getElementById('carousel-inner');

        if (carouselInner.children.length > 0) {
            carouselInner.children[0].classList.add('active');
        }
    }

    document.getElementById('addImage').addEventListener('change', function(event) {
        const carouselInner = document.getElementById('carousel-inner');
        const files = event.target.files;

        for (const file of files) {
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
                    removeImage(this);
                };

                imgContainer.appendChild(img);
                imgContainer.appendChild(deleteBtn);
                carouselItem.appendChild(imgContainer);
                carouselInner.appendChild(carouselItem);
            };

            reader.readAsDataURL(file);
        }
    });


    async function getImageFile(imgElement) {
        const response = await fetch(imgElement.src);
        const blob = await response.blob();

        const urlParts = imgElement.src.split('/');
        const fileName = urlParts[urlParts.length - 1] || 'image.jpg';

        return new File([blob], fileName, {
            type: blob.type
        });
    }

    document.getElementById('editMemoryForm').addEventListener('submit', async function(event) {
        event.preventDefault();

        let carouselInner = document.getElementById('carousel-inner');

        let imagesFiles = await Promise.all(
            Array.from(carouselInner.querySelectorAll('img')).map(async img => {
                return await getImageFile(img);
            })
        );

        let formData = new FormData(this);

        formData.append('_method', 'PUT');

        imagesFiles.forEach(file => {
            formData.append('images[]', file);
        });

        let xhr = new XMLHttpRequest();

        xhr.open(this.method, this.action, true);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.setRequestHeader('X-CSRF-TOKEN', formData.get('_token'));

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
        };

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
</script>
