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

            @if ($errors->has('reviews'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $errors->first('reviews') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif



            <!-- Exibindo reviews -->
            @foreach ($reviews as $review)
                <div class="mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <label class="form-label mb-0 me-3" style="min-width: 200px;">
                            {{ ucfirst($review->name) }}
                        </label>

                        @php
                            $existingRating = optional($productReviewMap[$review->id] ?? null)->rating;
                        @endphp

                        <div class="star-rating d-flex">
                            @for ($i = 1; $i <= 5; $i++)
                                <input type="radio" name="reviews[{{ $review->id }}]" id="{{ "$review->name-$i" }}"
                                    value="{{ $i }}" hidden {{ $existingRating == $i ? 'checked' : '' }}>
                                <label for="{{ "$review->name-$i" }}"><i class="fas fa-solid fa-star"></i></label>

                                @error("reviews.{$review->id}")
                                    <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                @enderror
                            @endfor
                        </div>
                    </div>

                    <textarea name="reviews_comments[{{ $review->id }}]" class="form-control mt-2"
                        placeholder="Comentário sobre {{ $review->name }}...">{{ $productReviewMap[$review->id]->comment ?? '' }}</textarea>
                    @error("reviews_comments.{$review->id}")
                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror

                </div>
            @endforeach

            <button type="submit" class="btn btn-dark">Salvar</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.star-rating').forEach(container => {
            const radios = container.querySelectorAll('input[type="radio"]');
            const labels = container.querySelectorAll('label');

            const checked = container.querySelector('input[type="radio"]:checked');

            if (checked) {
                const selectedValue = parseInt(checked.value);
                for (let i = 0; i < labels.length; i++) {
                    labels[i].style.color = i < selectedValue ? 'gold' : '#ccc';
                }
            }

            radios.forEach((radio, index) => {
                radio.addEventListener('change', function() {
                    const selectedValue = parseInt(this.value);
                    for (let i = 0; i < labels.length; i++) {
                        labels[i].style.color = i < selectedValue ? 'gold' : '#ccc';
                    }
                });
            });
        });
    });
</script>
