<!-- Consume Product Modal Starts -->
<div class="modal fade" id="consumeProductModal-{{ $product->id }}" tabindex="-1"
    aria-labelledby="consumeProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="consumeProductModalLabel">
                    Consumir {{ $product->name }}
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Quantidade disponível:</strong> {{ $product->quantity }}</p>

                <form action="{{ route('products.consume', $product->id) }}" method="POST">
                    @csrf
                    @method('put')

                    <label for="consumeQuantity-{{ $product->id }}" class="form-label">Quantidade a consumir:</label>
                    <input type="number" class="form-control" id="consumeQuantity-{{ $product->id }}" name="quantity"
                        min="1" max="{{ $product->quantity }}" required>

                    <!-- Aviso sobre o estoque zerado -->
                    <div class="text-danger mt-2 small">
                        Caso insira {{ $product->quantity }} ou mais, o estoque será zerado.
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Cancelar
                        </button>
                        <button type="submit" class="btn btn-dark">
                            Consumir
                            <i class="fas fa-cookie-bite text-brown"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Consume Product Modal Ends-->
