@extends('layout.layout')

@section('title', $user->name)

@section('content')
    <!-- Main Content Section Starts Here -->
    <section class="main-content py-4">
        <div class="container">
            <div class="row">
                @include('users.shared.left-sidebar-user-profile')

                <!-- Profile Detail Section Starts -->
                <div class="col-md-8">
                    <!-- Profile Section Starts -->
                    <div class="card mb-3">
                        <div class="card-body">
                            @include('shared.success-message')

                            <div class="row align-items-start">
                                <div class="col-md-3 text-center text-md-start mb-2 mb-md-0">
                                    <img src={{ $user->getImageUrl() }} alt="{{ $user->name }}"
                                        class="img-fluid rounded-circle" style="max-height: 110px; width: auto;">
                                </div>

                                <div class="col-md-8">
                                    <div class="card-text">
                                        <h5 class="card-title">{{ $user->name }}</h5>
                                        <h6 class="card-subtitle mb-2 text-body-secondary small">
                                            {{ $user->profession }}
                                        </h6>
                                        <p class="small">
                                            {{ $user->short_bio }}
                                        </p>

                                        <div class="row mt-3 mb-4 text-body-secondary small">
                                            <div class="col-12 d-flex align-items-center mb-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-globe-central-south-asia me-2"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0M4.882 1.731a.48.48 0 0 0 .14.291.487.487 0 0 1-.126.78l-.291.146a.7.7 0 0 0-.188.135l-.48.48a1 1 0 0 1-1.023.242l-.02-.007a1 1 0 0 0-.462-.04 7 7 0 0 1 2.45-2.027m-3 9.674.86-.216a1 1 0 0 0 .758-.97v-.184a1 1 0 0 1 .445-.832l.04-.026a1 1 0 0 0 .152-1.54L3.121 6.621a.414.414 0 0 1 .542-.624l1.09.818a.5.5 0 0 0 .523.047.5.5 0 0 1 .724.447v.455a.8.8 0 0 0 .131.433l.795 1.192a1 1 0 0 1 .116.238l.73 2.19a1 1 0 0 0 .949.683h.058a1 1 0 0 0 .949-.684l.73-2.189a1 1 0 0 1 .116-.238l.791-1.187A.45.45 0 0 1 11.743 8c.16 0 .306.084.392.218.557.875 1.63 2.282 2.365 2.282l.04-.001a7.003 7.003 0 0 1-12.658.905Z" />
                                                </svg>
                                                Morando em {{ $user->country ?? 'not informed' }}
                                            </div>

                                            <div class="col-12 d-flex align-items-center mb-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-cake2 me-2" viewBox="0 0 16 16">
                                                    <path
                                                        d="m3.494.013-.595.79A.747.747 0 0 0 3 1.814v2.683q-.224.051-.432.107c-.702.187-1.305.418-1.745.696C.408 5.56 0 5.954 0 6.5v7c0 .546.408.94.823 1.201.44.278 1.043.51 1.745.696C3.978 15.773 5.898 16 8 16s4.022-.227 5.432-.603c.701-.187 1.305-.418 1.745-.696.415-.261.823-.655.823-1.201v-7c0-.546-.408-.94-.823-1.201-.44-.278-1.043-.51-1.745-.696A12 12 0 0 0 13 4.496v-2.69a.747.747 0 0 0 .092-1.004l-.598-.79-.595.792A.747.747 0 0 0 12 1.813V4.3a22 22 0 0 0-2-.23V1.806a.747.747 0 0 0 .092-1.004l-.598-.79-.595.792A.747.747 0 0 0 9 1.813v2.204a29 29 0 0 0-2 0V1.806A.747.747 0 0 0 7.092.802l-.598-.79-.595.792A.747.747 0 0 0 6 1.813V4.07c-.71.05-1.383.129-2 .23V1.806A.747.747 0 0 0 4.092.802zm-.668 5.556L3 5.524v.967q.468.111 1 .201V5.315a21 21 0 0 1 2-.242v1.855q.488.036 1 .054V5.018a28 28 0 0 1 2 0v1.964q.512-.018 1-.054V5.073c.72.054 1.393.137 2 .242v1.377q.532-.09 1-.201v-.967l.175.045c.655.175 1.15.374 1.469.575.344.217.356.35.356.356s-.012.139-.356.356c-.319.2-.814.4-1.47.575C11.87 7.78 10.041 8 8 8c-2.04 0-3.87-.221-5.174-.569-.656-.175-1.151-.374-1.47-.575C1.012 6.639 1 6.506 1 6.5s.012-.139.356-.356c.319-.2.814-.4 1.47-.575M15 7.806v1.027l-.68.907a.94.94 0 0 1-1.17.276 1.94 1.94 0 0 0-2.236.363l-.348.348a1 1 0 0 1-1.307.092l-.06-.044a2 2 0 0 0-2.399 0l-.06.044a1 1 0 0 1-1.306-.092l-.35-.35a1.935 1.935 0 0 0-2.233-.362.935.935 0 0 1-1.168-.277L1 8.82V7.806c.42.232.956.428 1.568.591C3.978 8.773 5.898 9 8 9s4.022-.227 5.432-.603c.612-.163 1.149-.36 1.568-.591m0 2.679V13.5c0 .006-.012.139-.356.355-.319.202-.814.401-1.47.576C11.87 14.78 10.041 15 8 15c-2.04 0-3.87-.221-5.174-.569-.656-.175-1.151-.374-1.47-.575-.344-.217-.356-.35-.356-.356v-3.02a1.935 1.935 0 0 0 2.298.43.935.935 0 0 1 1.08.175l.348.349a2 2 0 0 0 2.615.185l.059-.044a1 1 0 0 1 1.2 0l.06.044a2 2 0 0 0 2.613-.185l.348-.348a.94.94 0 0 1 1.082-.175c.781.39 1.718.208 2.297-.426" />
                                                </svg>
                                                Nascido em {{ $user->birth_date ?? 'não informado' }}
                                            </div>

                                            <div class="col-12 d-flex align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-envelope-at me-2" viewBox="0 0 16 16">
                                                    <path
                                                        d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2zm3.708 6.208L1 11.105V5.383zM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2z" />
                                                    <path
                                                        d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648m-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z" />
                                                </svg>
                                                Email - {{ $user->email }}
                                            </div>
                                        </div>

                                        <div class="d-flex flex-wrap align-items-center gap-2 mt-3">
                                            @auth()
                                                @if (Auth::user()->isNot($user))
                                                    @csrf
                                                    @if (Auth::user()->follows($user))
                                                        <form method="POST" action="{{ route('users.unfollow', $user->id) }}">
                                                            @csrf
                                                            <button type="submit"
                                                                class="btn btn-danger btn-sm">UnFollow</button>
                                                        </form>
                                                    @else
                                                        <form method="POST" action="{{ route('users.follow', $user->id) }}">
                                                            @csrf
                                                            <button type="submit"
                                                                class="btn btn-primary btn-sm">Follow</button>
                                                        </form>
                                                    @endif
                                                @endif
                                            @endauth
                                            @if (Auth::id() == $user->id)
                                                <a href="{{ route('users.edit', $user) }}"
                                                    class="btn btn-outline-danger btn-sm">
                                                    Edit Profile
                                                </a>
                                            @endif

                                            @include('users.shared.user-stats')
                                        </div>

                                    </div>
                                </div>

                                @if (Auth::id() == $user->id)
                                    <div class="col-12 mt-3 d-md-none">
                                        <hr />
                                        <ul class="nav nav-pills justify-content-center">
                                            <li class="nav-item">
                                                <a class="nav-link text-body-secondary"
                                                    href="{{ route('users.edit', $user->id) }}">Sobre</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link text-body-secondary"
                                                    href="{{ route('users.password.edit', $user->id) }}">Alterar senha </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link text-body-secondary"
                                                    href="{{ route('users.settings', $user->id) }}">Configurações</a>
                                            </li>
                                        </ul>
                                    </div>
                                @endif
                            </div>

                            @if (Auth::id() == $user->id)
                                <hr class="d-none d-md-block mt-4" />
                                <div class="row d-none d-md-block">
                                    <ul class="nav ms-3">
                                        <li class="nav-item">
                                            <a class="nav-link text-body-secondary"
                                                href="{{ route('users.edit', $user->id) }}">About</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link text-body-secondary"
                                                href="{{ route('users.password.edit', $user->id) }}">Change
                                                Password</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-body-secondary"
                                                href="{{ route('users.settings', $user->id) }}">Settings</a>
                                        </li>
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                    <!-- Profile Section Ends -->

                    @include('shared.success-message')

                    @forelse ($memories as $memory)
                        @include('memories.shared.memory-card')

                    @empty
                        <hr />
                        <p>Nenhuma memória foi registrada até o momento.</p>
                    @endforelse
                </div>
                <!-- Profile Detail Section Starts -->

                <div class="col-md-4"></div>
            </div>
        </div>
    </section>
    <!-- Main Content Section Ends Here -->
@endsection
