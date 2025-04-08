<style>
    .star-rating {
        display: flex;
        gap: 5px;
    }

    .star-rating label {
        font-size: 24px;
        color: #ccc;
        cursor: pointer;
    }

    .star-rating input:checked~label {
        color: gold;
    }
</style>


<div class="card mb-5">
    <div class="card-body">
        <h1 class="mb-4"><i class="fas fa fa-star"></i> Avaliar Produto</h1>
        <form enctype="multipart/form-data" action="{{ route('products.review.store', $product) }}" method="POST">
            @csrf
            <!-- Exibindo reviews -->
            @foreach ($reviews as $review)
                <div class="mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <label class="form-label mb-0 me-3" style="min-width: 200px;">
                            {{ ucfirst($review->name) }}
                        </label>

                        <div class="star-rating d-flex">
                            @for ($i = 1; $i <= 5; $i++)
                                <input type="radio" name="reviews[{{ $review->id }}]" id="{{ "$review->name-$i" }}"
                                    value="{{ $i }}" hidden>
                                <label for="{{ "$review->name-$i" }}"><i class="fas fa-solid fa-star"></i></label>

                                @error('{{ "$review->name-$i" }}')
                                    <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                @enderror
                            @endfor
                        </div>
                    </div>

                    <textarea name="reviews_comments[{{ $review->id }}]" class="form-control mt-2"
                        placeholder="Comentário sobre {{ $review->name }}..."></textarea>
                </div>
            @endforeach

            <button type="submit" class="btn btn-dark">Salvar</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        document.querySelectorAll('.star-rating input').forEach(radio => {
            radio.addEventListener('change', function() {
                const parentElement = this.parentElement;

                let allStars = Array.from(parentElement.querySelectorAll('.star-rating label'));

                let selectedValue = parseInt(this.value);

                // Colocando cor padrão 'cinza'
                allStars.forEach(star => star.style.color = 'rgb(204, 204, 204)');

                // Mudar a cor somente até o valor selecionado
                for (let i = 0; i < selectedValue; i++) {
                    allStars[i].style.color = 'gold';
                }
            });
        });
    });
</script>
