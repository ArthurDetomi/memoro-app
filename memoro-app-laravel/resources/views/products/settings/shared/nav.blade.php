<!-- Navegação em abas com rotas -->
<ul class="nav nav-tabs mb-3">
    <li class="nav-item">
        <a class="nav-link {{ Route::is('productsfeature.index') ? 'active' : '' }}"
            href="{{ route('productsfeature.index') }}">
            Atributos
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Route::is('review.index') ? 'active' : '' }}" href="{{ route('review.index') }}">
            Reviews
        </a>
    </li>
</ul>
