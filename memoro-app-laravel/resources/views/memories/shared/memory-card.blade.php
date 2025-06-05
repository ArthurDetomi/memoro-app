<!-- Feed/Post Listing Section Starts -->
<div class="card mb-5">
    <div class="card-body">
        <!-- Post Header Starts -->
        <div class="row">
            <div class="col-1">
                <a href="{{ route('users.show', $memory->user->id) }}">
                    <img src="{{ $memory->user->getImageUrl() }}" alt="{{ $memory->user->name }}" style="height: 45px" />
                </a>
            </div>

            <div class="col-10">
                <a href="{{ route('users.show', $memory->user->id) }}"
                    class="fw-bolder a-link">{{ $memory->user->name }}</a>
                <p class="small text-body-secondary">
                    <!-- Pode colocar a profissão do usuário por exemplo futuramente-->
                </p>
            </div>

            @auth
                @can('update', $memory)
                    <div class="d-flex justify-content-end">
                        <div class="dropdown">
                            <button class="btn btn-sm" data-bs-toggle="dropdown" aria-expanded="false" title="Opções">
                                <i class="fas fa-ellipsis-h"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="{{ route('memories.edit', $memory->id) }}">Editar</a>
                                </li>
                                <li>
                                    <form action="{{ route('memories.destroy', $memory->id) }}" method="POST"
                                        onsubmit="return confirm('Tem certeza que deseja deletar esta memória?')">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="dropdown-item">Excluir</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endcan
            @endauth

        </div>
        <!-- Post Header Ends -->

        <!-- Post Content Starts -->
        <a href="{{ route('memories.show', $memory->id) }}" class="text-decoration-none">
            <h6 class="card-title text-dark text-center">{{ $memory->title }}</h6>
            <p class="card-text small text-body-secondary">
                {{ $memory->description }}
            </p>

            <div id="carouselTeachers-{{ $memory->id }}" class="carousel slide" data-bs-ride="carousel"
                style="max-width: 1080px; max-height: 1080px">
                <div class="carousel-inner">
                    @foreach ($memory->images as $image)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <img src="{{ $image->getImageUrl() }}" class="d-block img-fluid w-100 rounded-start"
                                alt="..." />
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button"
                    data-bs-target="#carouselTeachers-{{ $memory->id }}" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button"
                    data-bs-target="#carouselTeachers-{{ $memory->id }}" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </a>
        <!-- Post Content Ends -->



        <!-- Produtos relacionados -->
        @if ($memory->products->count() > 0)
            <h6 class="mt-4">Produtos relacionados:</h6>

            <div class="d-flex overflow-auto gap-3 py-2">
                @foreach ($memory->products as $product)
                    <div class="text-center flex-shrink-0" style="width: 60px;">
                        <a href="{{ route('products.show', $product->id) }}">
                            <img src="{{ $product->getImageUrl() }}" class="img-fluid rounded shadow-sm"
                                style="height: 45px; object-fit: cover;" alt="{{ $product->name }}">
                        </a>

                        @php
                            $avg = round($product->average_rating ?? 0);
                        @endphp

                        <div class="text-warning small mt-1">
                            @for ($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star{{ $i <= $avg ? '' : '-o' }}"></i>
                            @endfor
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <!-- Fim produtos relacionados-->

        <!-- Post Footer Starts -->
        <div class="col">
            <div class="d-flex justify-content-end align-items-center gap-3">

                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-calendar-event" viewBox="0 0 16 16">
                    <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z" />
                    <path
                        d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                </svg>

                <small class="text-muted">Published: {{ $memory->created_at->diffForHumans() }}</small>
                @include('memories.shared.like-button')

            </div>
        </div>

        <!-- Post Footer Ends -->
    </div>
</div>
<!-- Feed/Post Listing Section Ends -->
