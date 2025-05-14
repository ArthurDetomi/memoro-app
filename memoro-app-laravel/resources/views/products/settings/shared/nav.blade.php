<!-- Navegação em abas com rotas -->
<ul class="nav nav-tabs mb-3">
    <li class="nav-item">
        <a class="nav-link {{ Route::is('reviews.index') ? 'active' : '' }}" href="{{ route('reviews.index') }}">
            Reviews
        </a>
    </li>
</ul>
