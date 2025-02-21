<!-- Profile Sections Starts -->
<div class="col-md-3">
    <div class="card mb-3">
        <div class="card-body">
            <div class="text-center">
                <a href="profile.html" class="text-decoration-none text-dark">
                    <img src="{{ asset('images/user.png') }}" alt="{{ Auth::user()->name }}" class="mb-3"
                        style="height: 60px" />

                    <h5 class="card-title">{{ Auth::user()->name }}</h5>
                </a>
                <h6 class="card-subtitle mb-2 text-body-secondary">
                    <!-- Pode colocar a profissão aqui-->
                </h6>

                <p class="card-text small text-body-secondary">
                    <!-- Pode colocar uma bio aqui -->
                </p>

                <!-- User Stats Section Starts -->
                <div class="row">
                    <div class="col">
                        <strong>199</strong> <br />
                        <small class="text-body-secondary">Posts</small>
                    </div>

                    <div class="col"
                        style="
                            border-left: 1px solid black;
                            border-right: 1px solid black;
                        ">
                        <strong>112</strong> <br />
                        <small class="text-body-secondary">Seguidores</small>
                    </div>

                    <div class="col">
                        <strong>65</strong> <br />
                        <small class="text-body-secondary">Seguindo</small>
                    </div>
                </div>
                <!-- User Stats Section Ends -->
            </div>

            <hr />
            <p class="text-center">
                <a href="#" class="a-link-active text-primary">Ver Perfil</a>
            </p>
        </div>
    </div>
</div>
<!-- Profile Sections Ends -->
