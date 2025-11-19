@extends('layouts.layout')
@section('content')

    <style>
        body {
            background-color: #a7bace;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card-dark {
            background-color: #ffffff;
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: rgb(0, 0, 0);
            padding: 2rem;
            max-width: 450px;
            width: 90%;
            border-radius: 0.5rem;
        }

        /* Estilo para os inputs no tema escuro */
        .form-control-dark {
            background-color: #ffffff; /* Fundo dos inputs mais claro que o card */
            border-color: #6c757d; /* Borda cinza */
            color: rgb(0, 0, 0);
        }

        /* Cor do texto do placeholder */
        .form-control-dark::placeholder {
            color: #1a6abb;
            opacity: 1; /* Para garantir que o placeholder seja visível */
        }

        /* Foco (focus) do input para manter o tema dark */
        .form-control-dark:focus {
            background-color: #3980c7;
            color: rgb(0, 0, 0);
            border-color: #0d6efd; /* Borda azul primary no foco */
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25); /* Sombra azul primary */
        }
    </style>

    <div class="card-dark shadow text-dark">
        <div class="card-body">
            <h2 class="text-center mb-4" style="color: #0d6efd;">Editar a Meta <strong class="text-dark" >{{ $ideia->titulo }}</strong></h2>
            <p class="text-center text-secondary mb-4">Insira os detalhes para sua nova ideia.</p>

            <form action="{{ route('ideia.update', $ideia) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label text-primary"><strong>Título</strong></label>
                    <input type="text" class="form-control form-control-lg form-control" id="titulo" name="titulo" placeholder="{{$ideia->titulo}}">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label text-primary"><strong>Descrição da ideia</strong></label>
                    <textarea class="form-control form-control-lg form-control" id="description" name="description" rows="3">{{ $ideia->description }}</textarea>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">
                        FINALIZAR!
                    </button>
                </div>
                <div class="d-grid">
                    <button class="btn btn-danger btn-lg mt-3">
                        <a href="{{ route('user.dashboard') }}" class="text-decoration-none text-light">VOLTAR AO DASHBOARD</a>
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
