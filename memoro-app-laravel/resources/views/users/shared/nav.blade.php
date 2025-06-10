@if (Auth::id() == $user->id)
    <div class="card mb-3">
        <div class="card-body">
            <div class="row">
                <ul class="nav justify-content-center justify-content-md-start">
                    <li class="nav-item">
                        <a class="nav-link text-body-secondary {{ Route::is('users.edit') ? 'tab-active' : '' }}"
                            aria-current="page" href="{{ route('users.edit', $user->id) }}">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-body-secondary {{ Route::is('users.password.edit') ? 'tab-active' : '' }}"
                            href="{{ route('users.password.edit', $user->id) }}">Alterar senha</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-body-secondary {{ Route::is('users.settings') ? 'tab-active' : '' }}"
                            href="{{ route('users.settings', $user->id) }}">Configurações</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endif
