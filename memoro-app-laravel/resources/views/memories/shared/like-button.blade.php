<div>
    @auth()
        @if (Auth::user()->likesMemory($memory))
            <form action="{{ route('memories.unlike', $memory->id) }}" method="POST">
                @csrf
                <button type="submit" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                    </span> {{ $memory->likes_count }} </button>
            </form>
        @else
            <form action="{{ route('memories.like', $memory->id) }}" method="POST">
                @csrf
                <button type="submit" class="fw-light nav-link fs-6"> <span class="far fa-heart me-1">
                    </span> {{ $memory->likes_count }} </button>
            </form>
        @endif
    @endauth
    @guest
        <a href="{{ route('login') }}" class="fw-light nav-link fs-6"> <span class="far fa-heart me-1">
            </span> {{ $memory->likes_count }} </a>
    @endguest
</div>
