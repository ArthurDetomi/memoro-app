@if (Auth::id() == $user->id)
    <!-- Profile Section Starts -->
    <div class="card mb-3">
        <div class="card-body">
            <div class="row">
                <ul class="nav ms-5">
                    <li class="nav-item">
                        <a class="nav-link text-body-secondary {{ Route::is('users.edit') ? 'tab-active' : '' }}"
                            aria-current="page" href="{{ route('users.edit', $user->id) }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-body-secondary {{ Route::is('users.password.edit') ? 'tab-active' : '' }}"
                            href="{{ route('users.password.edit', $user->id) }}">Change
                            Password</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-body-secondary {{ Route::is('users.settings') ? 'tab-active' : '' }}"
                            href="{{ route('users.settings', $user->id) }}">Settings</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Profile Section Ends -->
@endif
