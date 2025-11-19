@extends('layouts.layout')
@section('content')

    <form action="{{ route('ideia.destroy', $ideia->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <div class="container my-5">
            <div class="card border-danger shadow-lg" style="max-width: 25rem; margin: auto;">
                <div class="card-header bg-danger">
                    <h5 class="mb-0 text-light text-center">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i> Aviso de Confirmação
                    </h5>
                </div>
                <div class="card-body text-center">
                    <h4 class="card-title">Tem certeza que deseja excluir <strong class="text-danger"> {{ $ideia->title }} </strong> ?</h4>
                    <p class="card-text">
                        Esta ação pode ser <strong>irreversível</strong>. Por favor, confirme sua decisão.
                    </p>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <button type="submit" class="btn btn-danger btn-sm w-50 me-2 text-white">
                            <i class="bi bi-x-circle-fill me-1"></i> Sim, Excluir
                    </button>
                    <button type="button" class="btn btn-primary btn-sm w-50 ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <a href="{{ route('user.dashboard') }}" class="text-decoration-none text-white">
                            <i class="bi bi-check-circle-fill me-1"></i> Não, Manter
                        </a>
                    </button>
                </div>
            </div>
        </div>
    </form>

@endsection
