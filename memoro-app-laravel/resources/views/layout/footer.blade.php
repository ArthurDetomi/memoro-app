<!-- Footer Section Starts Here -->
<footer class="footer fixed-bottom text-center p-3 bg-dark">
    <div class="container">
        <a href="{{ route('memories.index') }}" class="a-link-light m-2" title="Home"><i class="fa fa-home"></i>
        </a>
        <a href="{{ route('users.show', Auth::id()) }}" class="a-link-light m-2" title="Perfil"><i class="fa fa-user"></i>
        </a>
        <a href="{{ route('products.index') }}" class="a-link-light m-2" title="Produtos"><i class="fa fa-box"></i>
        </a>
        <a href="{{ route('memories.index') }}" class="a-link-light m-2" title="Memórias"><i
                class="fa fa-photo-video"></i>
        </a>
    </div>
</footer>
<!-- Footer Section Ends Here -->
