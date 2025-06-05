<!-- Footer Section Starts Here -->
<footer class="footer fixed-bottom text-center p-3 bg-dark">
    <div class="container">
        <a href="{{ route('dashboard') }}" class="a-link-light m-2" title="Home"><i class="fa fa-home"></i>
        </a>
        <a href="{{ route('feed') }}" class="a-link-light m-2" title="Feed"><i class="fas fa-newspaper"></i>
        </a>
        @auth

            <a href="{{ route('users.show', Auth::id()) }}" class="a-link-light m-2" title="Perfil"><i
                    class="fa fa-user"></i>
            </a>
        @endauth
        <a href="{{ route('products.index') }}" class="a-link-light m-2" title="Produtos"><i class="fa fa-box"></i>
        </a>
    </div>
</footer>

<!-- Footer Section Ends Here -->
