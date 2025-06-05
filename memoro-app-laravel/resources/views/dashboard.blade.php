@extends('layout.layout')

@section('title', 'Dashboard')

@section('content')

    <!-- Main Content Section Starts Here -->
    <section class="main-content py-4">
        <div class="container">
            <div class="row">
                @include('users.shared.left-sidebar-user-profile')

                <!-- Feed Section Starts -->
                <div class="col-md-6">
                    <div class="d-flex align-items-center mb-3">
                        <h1 class="h2"><i class="fa fa-photo-video"></i> Memórias</h1>

                        <a class="btn btn-dark rounded-circle text-light ms-auto" data-mdb-ripple-init
                            href="{{ route('memories.create') }}" title="Postar nova Memória">
                            <i class="fas fa-plus"></i>
                        </a>
                    </div>
                    @include('shared.success-message')

                    @forelse ($memories as $memory)
                        @include('memories.shared.memory-card')

                    @empty
                        <p>Que tal começar a postar suas memórias agora? 🌟</p>
                    @endforelse

                    <div class="mt-3 mb-5">
                        {{ $memories->withQueryString()->links() }}
                    </div>
                </div>
                <!-- Feed Section Starts -->

                <div class="col-md-3">
                    @include('shared.search-bar')
                    @include('shared.follow-box')
                </div>

            </div>
        </div>
    </section>
    <!-- Main Content Section Ends Here -->
@endsection
