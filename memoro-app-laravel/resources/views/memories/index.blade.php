@extends('layout.layout')

@section('title', 'Memories')

@section('content')

    <!-- Main Content Section Starts Here -->
    <section class="main-content py-4">
        <div class="container">
            <div class="row">
                @include('users.shared.left-sidebar-user-profile')

                <!-- Feed Section Starts -->
                <div class="col-md-6">
                    <div>
                        <h1><i class="fa fa-photo-video"></i> Memórias</h1>
                    </div>

                    <div class="mb-3">
                        <a class="btn btn-dark rounded-circle" data-mdb-ripple-init href="{{ route('memories.create') }}"
                            title="Cadastrar memória">
                            <i class="fas fa-plus"></i>
                        </a>
                    </div>

                    @include('shared.success-message')

                    @forelse ($memories as $memory)
                        @include('memories.shared.memory-card')

                    @empty
                        <p>Que tal começar a registrar suas memórias agora? 🌟</p>
                    @endforelse
                </div>
                <!-- Feed Section Starts -->

                <!--Futura section com md-3 -->
            </div>
        </div>
    </section>
    <!-- Main Content Section Ends Here -->
@endsection
