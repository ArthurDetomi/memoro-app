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

            <div class="col-1">
                <div class="dropdown dropstart">
                    <a href="#" class="a-link" data-bs-toggle="dropdown" aria-expanded="false">
                        ...
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="{{ route('memories.edit', $memory->id) }}">Edit</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                data-bs-target="#deleteMemorieModal">Delete</a>
                        </li>
                    </ul>
                </div>
            </div>
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

        <!-- Post Footer Starts -->
        <div class="row my-3">
            <!-- No futuro pode adicionar comentários -->

            <div class="col text-end">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-calendar-event" viewBox="0 0 16 16">
                    <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z" />
                    <path
                        d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                </svg>
                <small>Published Date: {{ $memory->created_at->toDateString() }}</small>
            </div>
        </div>
        <!-- Post Footer Ends -->
    </div>
</div>
<!-- Feed/Post Listing Section Ends -->
