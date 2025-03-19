document
    .querySelector("#registerProductModal form")
    .addEventListener("submit", function (event) {
        event.preventDefault();

        let formData = new FormData(this);

        let xhr = new XMLHttpRequest();
        xhr.open(this.method, this.action, true);

        xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");

        xhr.setRequestHeader("X-CSRF-TOKEN", formData.get("_token"));

        xhr.onload = function () {
            let response = JSON.parse(xhr.responseText);

            if (xhr.status >= 200 && xhr.status < 500) {
                if (response.success) {
                    alert("Produto cadastrado com sucesso!");
                    location.reload();
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
