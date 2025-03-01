@extends('layout.layout')

@section('title', 'Memories')

@section('content')

    @include('memories.shared.register-memory-dialog')
    <!-- Main Content Section Starts Here -->
    <section class="main-content py-4">
        <div class="container">
            <div class="row">
                @include('users.shared.left-sidebar-user-profile')

                <!-- Feed Section Starts -->
                <div class="col-md-6">
                    <div>
                        <h1>Memorias</h1>
                    </div>

                    <div class="mb-3">
                        <button class="btn btn-dark" data-mdb-ripple-init data-bs-toggle="modal"
                            data-bs-target="#registerMemorieModal">
                            Cadastrar Memória
                        </button>
                    </div>

                    @include('shared.success-message')

                    @foreach ($memories as $memory)
                        @include('memories.shared.memory-card')
                    @endforeach
                </div>
                <!-- Feed Section Starts -->

                <!--Futura section com md-3 -->
            </div>
        </div>
    </section>
    <!-- Main Content Section Ends Here -->
@endsection
