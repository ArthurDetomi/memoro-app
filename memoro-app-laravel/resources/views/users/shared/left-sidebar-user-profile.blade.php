<!-- Profile Sections Starts -->
<div class="col-md-3">
    <div class="card mb-3">
        <div class="card-body">
            <div class="text-center">
                <a href="profile.html" class="text-decoration-none text-dark">
                    <img src={{ Auth::user()->getImageUrl() }} alt="{{ Auth::user()->name }}"
                        alt="{{ Auth::user()->name }}" class="mb-3" style="height: 60px" />

                    <h5 class="card-title">{{ Auth::user()->name }}</h5>
                </a>
                <h6 class="card-subtitle mb-2 text-body-secondary">
                    {{ Auth::user()->profession }}
                </h6>

                <p class="card-text small text-body-secondary">
                    <!-- Pode colocar uma bio aqui -->
                </p>

                <!-- User Stats Section {Pode adicionar futuramente} -->
            </div>

            <hr />
            <p class="text-center">
                <a href="{{ route('users.show', Auth::id()) }}" class="a-link-active text-primary">Ver Perfil</a>
            </p>
        </div>
    </div>
</div>
<!-- Profile Sections Ends -->
