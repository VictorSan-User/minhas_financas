@extends('layouts.layout')
@section('content')

    <style>
        /* CSS Opcional para centralizar o formulário e dar um toque dark extra (card mais escuro) */
        body {
            background-color: #212529; /* Cor de fundo Dark do Bootstrap */
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card-dark {
            background-color: #343a40; /* Um tom de cinza escuro para o cartão */
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: white;
            padding: 2rem;
            max-width: 450px; /* Largura máxima para o formulário */
            width: 90%;
            border-radius: 0.5rem;
        }

        /* Estilo para os inputs no tema escuro */
        .form-control-dark {
            background-color: #495057; /* Fundo dos inputs mais claro que o card */
            border-color: #6c757d; /* Borda cinza */
            color: white;
        }

        /* Cor do texto do placeholder */
        .form-control-dark::placeholder {
            color: #adb5bd;
            opacity: 1; /* Para garantir que o placeholder seja visível */
        }

        /* Foco (focus) do input para manter o tema dark */
        .form-control-dark:focus {
            background-color: #495057;
            color: white;
            border-color: #0d6efd; /* Borda azul primary no foco */
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25); /* Sombra azul primary */
        }
    </style>


    <div class="card-dark shadow">
        <div class="card-body">
            <h2 class="text-center mb-4" style="color: #0d6efd;">Criar Novo Evento</h2>
            <p class="text-center text-secondary mb-4">Insira os detalhes para seu novo evento.</p>

            <form action="{{ route('events.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label text-white">Título do Evento</label>
                    <input type="text" class="form-control form-control-lg form-control-dark" id="title" name="title" placeholder="Ex: Conferência de Tecnologia 2025">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label text-white">Descrição</label>
                    <textarea class="form-control form-control-lg form-control-dark" id="description" name="description" rows="3" placeholder="Detalhes sobre o evento..."></textarea>
                </div>

                <div class="mb-3">
                    <label for="event_date" class="form-label text-white">Data</label>
                    <input type="date" class="form-control form-control-lg form-control-dark" id="event_date" name="event_date">
                </div>

                <div class="mb-4">
                    <label for="value" class="form-label text-white">Valor R$</label>
                    <input type="number" step="0.01" min="0" class="form-control form-control-lg form-control-dark" id="value" name="value" placeholder="0.00">
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">
                        CRIAR EVENTO
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
