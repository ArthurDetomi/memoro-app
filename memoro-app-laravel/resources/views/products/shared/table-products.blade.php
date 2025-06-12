<!-- Products table Starts-->
<div>
    @if ($hasProductsRegistered)
        <form action="{{ route('products.index') }}" method="GET">
            <div class="input-group mb-1">
                <input name="search" type="text" class="form-control" id="advanced-search-input"
                    placeholder="Pesquise por nome do produto ou tipo..." value="{{ request('search') }}" />
                <button class="btn btn-dark text-light" id="advanced-search-button" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </form>

        <div class="table-responsive-sm mb-5">
            <table class="table align-middle mb-0 bg-white">
                <p class="text-muted mb-2">
                    Clique em um produto para ver mais detalhes e ações disponíveis.
                </p>
                <tbody class="text-center">
                    @forelse ($products as $product)
                        <tr class="align-middle">
                            <td colspan="6">
                                <div class="d-flex justify-content-between align-items-center py-3">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ $product->getImageUrl() }}" alt="{{ $product->name }}"
                                            class="rounded-circle me-3" style="width: 45px; height: 45px;" />
                                        <div>
                                            <p class="fw-bold mb-0">{{ $product->name }}</p>
                                            <small class="text-muted">{{ $product->brand }}</small>
                                        </div>
                                    </div>
                                    <button class="btn btn-sm btn-link" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseProduct{{ $product->id }}" aria-expanded="false"
                                        aria-controls="collapseProduct{{ $product->id }}">
                                        Ver detalhes <i class="fas fa-ellipsis-h"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr class="collapse align-middle" id="collapseProduct{{ $product->id }}">
                            <td colspan="6">
                                <div class="row g-2 bg-light rounded py-3 text-start">
                                    <div class="col-md-6"><strong>Descrição:</strong> {{ $product->description }}</div>
                                    <div class="col-md-3"><strong>Tipo:</strong> {{ $product->type->name }}</div>
                                    <div class="col-md-3"><strong>Peso:</strong> {{ $product->weight }}
                                        {{ $product->unit_of_measure }}</div>

                                    <div class="col-md-6">
                                        <strong>Avaliação:</strong>
                                        @if ($product->average_rating)
                                            @php $averageRating = round($product->average_rating); @endphp
                                            <span class="text-warning">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <i
                                                        class="fas fa-star{{ $i <= floor($averageRating) ? '' : '-o' }}"></i>
                                                @endfor
                                                <small class="text-muted">({{ $averageRating }})</small>
                                            </span>
                                        @else
                                            ---
                                        @endif
                                    </div>

                                    <div class="col-md-3"><strong>Quantidade:</strong> {{ $product->quantity }}</div>
                                    <div class="col-md-3"><strong>Marca:</strong> {{ $product->brand }}</div>

                                    <div class="col-12 text-end">
                                        <a class="btn btn-link btn-sm text-dark" title="Avaliar"
                                            href="{{ route('products.review', $product->id) }}">
                                            <i class="fas fa fa-star"></i>
                                        </a>
                                        <button class="btn btn-link btn-sm text-warning" title="Consumir"
                                            data-bs-toggle="modal"
                                            data-bs-target="#consumeProductModal-{{ $product->id }}">
                                            <i class="fas fa-cookie-bite text-brown"></i>
                                        </button>
                                        <a class="btn btn-link btn-sm text-primary" title="Visualizar"
                                            href="{{ route('products.show', $product->id) }}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <button class="btn btn-link btn-sm text-danger" title="Deletar"
                                            data-id="{{ $product->id }}" data-name="{{ $product->name }}"
                                            data-bs-toggle="modal"
                                            data-bs-target="#deleteProductModal-{{ $product->id }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        @include('products.shared.consume-product-dialog')
                        @include('products.shared.delete-product-dialog')

                    @empty
                        <tr>
                            <td colspan="6">Nenhum produto encontrado. Tente ajustar os termos da sua busca.</td>
                        </tr>
                    @endforelse
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
