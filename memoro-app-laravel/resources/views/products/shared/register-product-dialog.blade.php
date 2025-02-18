<!-- Register Product Modal Starts -->
<div
class="modal fade"
id="registerProductModal"
tabindex="-1"
aria-labelledby="registerProductModalLabel"
aria-hidden="true"
>
<form action="">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1
          class="modal-title fs-5"
          id="registerProductModalLabel"
        >
          Cadastro Produto
        </h1>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
        <div class="col-12">
          <div data-mdb-input-init class="form-outline">
            <label class="form-label" for="form3Example1"
              >Nome</label
            >
            <input
              type="text"
              id="form3Example1"
              class="form-control"
            />
          </div>
        </div>
        <div class="col-12">
          <div data-mdb-input-init class="form-outline">
            <label class="form-label" for="form3Example2"
              >Descrição</label
            >
            <input
              type="text"
              id="form3Example2"
              class="form-control"
            />
          </div>
        </div>

        <div class="col-12">
          <div data-mdb-input-init class="form-outline">
            <label class="form-label" for="form3Example3"
              >Peso</label
            >
            <input
              type="number"
              id="form3Example3"
              class="form-control"
            />
          </div>
        </div>

        <div class="col-12">
          <div class="form-outline">
            <label class="form-label" for="form3Example5"
              >Imagens</label
            >
            <div>
              <div class="input-group mb-3">
                <label
                  class="input-group-text"
                  for="inputGroupFile01"
                  >Adicionar nova imagem</label
                >
                <input
                  type="file"
                  class="form-control"
                  id="inputGroupFile01"
                />
              </div>
            </div>
          </div>
        </div>

        <div class="col-12 d-flex justify-content-center">
          <div
            id="imgRegisterProductCarrousel"
            class="carousel slide container-img-carrousel"
            data-bs-ride="carousel"
          >
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div
                  class="container-img-carrousel d-flex justify-content-center"
                >
                  <img
                    src="images/queijo.jpg"
                    class="d-block mx-auto img-carrousel"
                    alt="..."
                  />
                  <button class="delete-btn">
                    <i class="fas fa-trash-alt"></i>
                  </button>
                </div>
              </div>
              <div class="carousel-item">
                <div class="container-img-carrousel">
                  <img
                    src="images/wine.jpg"
                    class="d-block mx-auto img-carrousel"
                    alt="..."
                  />
                  <button class="delete-btn">
                    <i class="fas fa-trash-alt"></i>
                  </button>
                </div>
              </div>
            </div>
            <button
              class="carousel-control-prev"
              type="button"
              data-bs-target="#imgRegisterProductCarrousel"
              data-bs-slide="prev"
            >
              <span
                class="carousel-control-prev-icon"
                aria-hidden="true"
              ></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button
              class="carousel-control-next"
              type="button"
              data-bs-target="#imgRegisterProductCarrousel"
              data-bs-slide="next"
            >
              <span
                class="carousel-control-next-icon"
                aria-hidden="true"
              ></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>

        <div class="col-12">
          <div data-mdb-input-init class="form-outline">
            <label class="form-label" for="form3Example4"
              >Tipo de Produto</label
            >
            <select
              class="form-select"
              aria-label="Default select example"
            >
              <option selected>Tipo de Produto</option>
              <option value="1">Vinho</option>
              <option value="2">Queijo</option>
              <option value="3">Charuto</option>
              <option value="4">Café</option>
            </select>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button
          type="button"
          class="btn btn-secondary"
          data-bs-dismiss="modal"
        >
          Cancelar
        </button>
        <button type="submit" class="btn btn-dark">
          Cadastrar
        </button>
      </div>
    </div>
  </div>
</form>
</div>
<!-- Register Product Modal Ends-->
