@extends('layouts.layout')
@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Resultado da Busca de Usuario</div>

                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-success" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif

                        <h3>Detalhes do Usuario</h3>
                        <p><strong>Nome:</strong> {{ $buscar->name }}</p>
                        <p><strong>Email:</strong> {{ $buscar->email }}</p>

                        <a href="{{ route('user.dashboard') }}" class="btn btn-primary">Voltar ao Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
