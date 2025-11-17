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
            color: white;
            padding: 2rem;
            max-width: 450px;
            width: 90%;
            border-radius: 0.5rem;
        }

        /* Estilo para os inputs no tema escuro */
        .form-control-dark {
            background-color: #ffffff; /* Fundo dos inputs mais claro que o card */
            border-color: #6c757d; /* Borda cinza */
            color: white;
        }

        /* Cor do texto do placeholder */
        .form-control-dark::placeholder {
            color: #1a6abb;
            opacity: 1; /* Para garantir que o placeholder seja visível */
        }

        /* Foco (focus) do input para manter o tema dark */
        .form-control-dark:focus {
            background-color: #3980c7;
            color: white;
            border-color: #0d6efd; /* Borda azul primary no foco */
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25); /* Sombra azul primary */
        }
    </style>


    <div class="card-dark shadow">
        <div class="card-body">
            <h2 class="text-center mb-4" style="color: #0d6efd;">Editar o Registro {{ $evento->id }} </h2>
            <p class="text-center text-secondary mb-4">Atualize os detalhes do seu registro financeiro.</p>

            <form action="{{ route('events.update', $evento->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label text-white">Título</label>
                    <input type="text" class="form-control form-control-lg form-control" id="title" name="title" placeholder="{{ $evento->title }}">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label text-white">Descrição</label>
                    <textarea class="form-control form-control-lg form-control" id="description" name="description" rows="3">{{ $evento->description }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="event_date" class="form-label text-white">Data</label>
                    <input type="date" class="form-control form-control-lg form-control" id="event_date" name="event_date">
                </div>

                <div class="mb-4">
                    <label for="value" class="form-label text-white">Valor R$</label>
                    <input type="number" step="0.01" min="0" class="form-control form-control-lg form-control" id="value" name="value" value="{{ old('value') }}"  placeholder="{{ $evento->value }}">
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">
                        FINALIZAR
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
