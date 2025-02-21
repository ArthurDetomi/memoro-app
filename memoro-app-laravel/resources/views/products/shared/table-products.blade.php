<!-- Products table Starts-->
<div>
    <div class="input-group mb-1">
        <input type="text" class="form-control" id="advanced-search-input" placeholder="phrase in:column1,column2" />
        <button data-mdb-button-init data-mdb-ripple-init class="btn btn-dark text-light" id="advanced-search-button"
            type="button">
            <i class="fa fa-search"></i>
        </button>
    </div>

    <div class="table-responsive mb-5">
        <table class="table align-middle mb-0 bg-white">
            <thead class="bg-light">
                <tr class="text-center">
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Volume</th>
                    <th>Quantidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <!-- Todo: Adicionar paginação -->
                @foreach ($products as $product)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="{{ $product->getImageUrl() }}" alt="{{ $product->name }}"
                                    style="width: 45px; height: 45px" class="rounded-circle" />
                                <div class="ms-3">
                                    <p class="fw-bold mb-1">{{ $product->name }}</p>
                                    <p class="text-muted mb-0">{{ $product->brand }}</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $product->description }}</p>
                            <p class="text-muted mb-0">Lorem, ipsum dolor.</p>
                        </td>
                        <td>{{ $product->weight }} {{ $product->unit_of_measure }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>
                            <div class="d-flex justify-content-around">
                                <button type="button" class="btn btn-link btn-sm text-warning" title="Consumir"
                                    data-bs-toggle="modal" data-bs-target="#consumeProductModal">
                                    <i class="fas fa-cookie-bite text-brown"></i>
                                </button>
                                <a type="button" class="btn btn-link btn-sm text-primary" title="Visualizar"
                                    href="{{ route('products.show', $product->id) }}">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <button type="button" class="btn btn-link btn-sm text-danger" title="Deletar"
                                    data-bs-toggle="modal" data-bs-target="#deleteProductModal">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- Products table Ends-->
