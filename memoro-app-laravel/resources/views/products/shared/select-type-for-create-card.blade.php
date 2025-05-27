<div class="card mb-5">
    <div class="card-body">
        <h1 class="mb-4"><i class="fas fa-box"></i> Cadastro de produto</h1>
        <h4 class="mb-4">Selecione o tipo:</h4>
        <div class="row justify-content-center g-4">
            @forelse ($productTypes as $productType)
                <div class="col-6 col-md-3">
                    <a href="{{ route('products.create_with_type', $productType->id) }}" class="text-decoration-none">
                        <div class="card text-center shadow-sm h-100">
                            <div class="card-body">
                                <img src="{{ asset("images/products/$productType->name.png") }}" class="img-fluid mb-3"
                                    alt="Café" style="height: 100px;" />
                                <h5 class="card-title">{{ $productType->name }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <p>📦 Nenhum tipo de produto foi cadastrado!</p>
            @endforelse
        </div>
    </div>
</div>
