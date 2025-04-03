<!-- Products table Starts-->
<div>
    @if (count($products) > 0)
        <form action="{{ route('products.index') }}" method="GET">
            <div class="input-group mb-1">
                <input name="search" type="text" class="form-control" id="advanced-search-input"
                    placeholder="Pesquise por nome do produto ou tipo..." />
                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-dark text-light"
                    id="advanced-search-button" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </form>


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
                                <p class="text-muted mb-0">{{ $product->type->name }}</p>
                            </td>
                            <td>{{ $product->weight }} {{ $product->unit_of_measure }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>
                                <div class="d-flex justify-content-around">
                                    <button type="button" class="btn btn-link btn-sm text-warning" title="Consumir"
                                        data-bs-toggle="modal"
                                        data-bs-target="#consumeProductModal-{{ $product->id }}">
                                        <i class="fas fa-cookie-bite text-brown"></i>
                                    </button>
                                    <a type="button" class="btn btn-link btn-sm text-primary" title="Visualizar"
                                        href="{{ route('products.show', $product->id) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <button type="button" class="btn btn-link btn-sm text-danger" title="Deletar"
                                        data-id="{{ $product->id }}" data-name="{{ $product->name }}"
                                        data-bs-toggle="modal"
                                        data-bs-target="#deleteProductModal-{{ $product->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        @include('products.shared.consume-product-dialog')
                        @include('products.shared.delete-product-dialog')
                    @endforeach
                </tbody>
            </table>
            <div class="mt-1">
                {{ $products->links() }}
            </div>
        </div>
    @else
        <p>📦 Nenhum produto cadastrado. Comece agora adicionando o primeiro!</p>
    @endif
</div>
<!-- Products table Ends-->
