<!-- Feed/Post Listing Section Starts -->
<div class="card mb-5">
    <div class="card-body">
        <!-- Post Header Starts -->
        <div class="row">
            <div class="col-1">
                <a href="#">
                    <img src="{{ asset('images/user1.png') }}" alt="{{ $memory->user->name }}" style="height: 45px" />
                </a>
            </div>

            <div class="col-10">
                <a href="#" class="fw-bolder a-link">{{ $memory->user->name }}</a>
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
            <div class="col">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-chat-quote" viewBox="0 0 16 16">
                    <path
                        d="M2.678 11.894a1 1 0 0 1 .287.801 11 11 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8 8 0 0 0 8 14c3.996 0 7-2.807 7-6s-3.004-6-7-6-7 2.808-7 6c0 1.468.617 2.83 1.678 3.894m-.493 3.905a22 22 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a10 10 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9 9 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105" />
                    <path
                        d="M7.066 6.76A1.665 1.665 0 0 0 4 7.668a1.667 1.667 0 0 0 2.561 1.406c-.131.389-.375.804-.777 1.22a.417.417 0 0 0 .6.58c1.486-1.54 1.293-3.214.682-4.112zm4 0A1.665 1.665 0 0 0 8 7.668a1.667 1.667 0 0 0 2.561 1.406c-.131.389-.375.804-.777 1.22a.417.417 0 0 0 .6.58c1.486-1.54 1.293-3.214.682-4.112z" />
                </svg>
                <small>Comments(9)</small>
            </div>

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

        <div class="row">
            <div class="col-1">
                <img src="{{ asset('images/user1.png') }}" alt="User1 Full Name" style="height: 25px" />
            </div>

            <div class="col-11">
                <form action="#">
                    <textarea name="add_comment" placeholder="Type your comment.." class="form-control mb-3" id=""></textarea>
                    <input type="submit" name="submit" value="Add Comment" class="form-control btn btn-dark btn-sm" />
                </form>
            </div>
        </div>
        <!-- Post Footer Ends -->
    </div>
</div>
<!-- Feed/Post Listing Section Ends -->
