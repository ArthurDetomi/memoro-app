// Função para remover uma imagem do carrossel (apenas no lado do cliente)
function removeImage(button) {
    const carouselItem = button.closest(".carousel-item");
    carouselItem.remove();

    const carouselInner = document.getElementById("carousel-inner");

    if (carouselInner.children.length > 0) {
        carouselInner.children[0].classList.add("active");
    }
}

document
    .getElementById("addImage")
    .addEventListener("change", function (event) {
        const carouselInner = document.getElementById("carousel-inner");
        const files = event.target.files;

        for (const file of files) {
            const reader = new FileReader();

            reader.onload = function (e) {
                const carouselItem = document.createElement("div");
                carouselItem.classList.add("carousel-item");
                if (carouselInner.children.length === 0) {
                    carouselItem.classList.add("active");
                }

                const imgContainer = document.createElement("div");
                imgContainer.style.position = "relative";
                imgContainer.style.width = "500px";
                imgContainer.style.height = "500px";
                imgContainer.style.overflow = "hidden";

                const img = document.createElement("img");
                img.src = e.target.result;
                img.classList.add("d-block", "mx-auto");
                img.style.width = "100%";
                img.style.height = "100%";
                img.style.objectFit = "cover";

                const deleteBtn = document.createElement("button");
                deleteBtn.classList.add("delete-btn");
                deleteBtn.innerHTML = '<i class="fas fa-trash-alt"></i>';
                deleteBtn.onclick = function () {
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

    const urlParts = imgElement.src.split("/");
    const fileName = urlParts[urlParts.length - 1] || "image.jpg";

    return new File([blob], fileName, {
        type: blob.type,
    });
}

document
    .getElementById("editMemoryForm")
    .addEventListener("submit", async function (event) {
        event.preventDefault();

        let carouselInner = document.getElementById("carousel-inner");

        let imagesFiles = await Promise.all(
            Array.from(carouselInner.querySelectorAll("img")).map(
                async (img) => {
                    return await getImageFile(img);
                }
            )
        );

        let formData = new FormData(this);

        formData.append("_method", "PUT");

        imagesFiles.forEach((file) => {
            formData.append("images[]", file);
        });

        let xhr = new XMLHttpRequest();

        xhr.open(this.method, this.action, true);
        xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
        xhr.setRequestHeader("X-CSRF-TOKEN", formData.get("_token"));

        xhr.onload = function () {
            let response = JSON.parse(xhr.responseText);

            if (xhr.status == 403) {
                displayErrors(response.errors);
                alert("You don't have permission for it.");
            } else if (xhr.status >= 200 && xhr.status < 500) {
                if (response.success) {
                    alert("Memória atualizada com sucesso!");

                    window.location.href = response.redirect;
                } else {
                    displayErrors(response.errors);
                    alert("Dados inválidos.");
                }
            } else {
                displayErrors(response.errors);
                alert("Houve um erro inesperado no envio da requisição.");
            }
        };

        xhr.onerror = function (err) {
            alert("Houve um erro inesperado no envio da requisição.");
        };

        xhr.send(formData);
    });

function displayErrors(errors) {
    document.querySelectorAll(".is-invalid").forEach(function (element) {
        element.classList.remove("is-invalid");
    });
    document.querySelectorAll(".text-danger").forEach(function (element) {
        element.remove();
    });

    for (const field in errors) {
        const errorMessages = errors[field];
        const inputField = document.querySelector('[name="' + field + '"]');

        inputField.classList.add("is-invalid");

        const errorSpan = document.createElement("span");
        errorSpan.classList.add("d-block", "fs-6", "text-danger", "mt-2");
        errorSpan.textContent = errorMessages.join(", ");
        inputField.insertAdjacentElement("afterend", errorSpan);
    }
}
