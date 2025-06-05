<div class="col-md-3">
    <div class="card mb-3">
        <div class="card-body">
            <div class="text-center">
                @auth
                    <a href="{{ route('users.show', Auth::id()) }}" class="text-decoration-none text-dark">
                        <img src="{{ Auth::user()->getImageUrl() }}" alt="{{ Auth::user()->name }}" class="mb-3"
                            style="height: 60px" />
                        <h5 class="card-title">{{ Auth::user()->name }}</h5>
                    </a>
                @else
                    <img src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Guest" alt="Guest" class="mb-3"
                        style="height: 60px" />
                    <h5 class="card-title">Guest</h5>
                @endauth

                <h6 class="card-subtitle mb-2 text-body-secondary">
                    @auth
                        {{ Auth::user()->profession }}
                    @else
                        Visitante
                    @endauth
                </h6>

                <p class="card-text small text-body-secondary">
                    <!-- Pode colocar uma bio aqui -->
                </p>
            </div>

            <hr />
            <p class="text-center">
                @auth
                    <a href="{{ route('users.show', Auth::id()) }}" class="a-link-active text-primary">Ver Perfil</a>
                @else
                    <a href="{{ route('login') }}" class="text-muted">Faça login para ver o perfil</a>
                @endauth
            </p>
        </div>
    </div>
</div>
