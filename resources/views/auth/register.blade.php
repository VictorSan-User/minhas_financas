<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Conta - Minhas Finanças</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white d-flex align-items-center justify-content-center vh-100">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-6 col-xl-5">

                <div class="card bg-dark border border-secondary p-4 shadow-lg text-light">
                    <div class="card-body">

                        <div class="text-center mb-5">
                            <h2 class="fw-bold text-primary mb-0">Crie Sua Conta</h2>
                            <p class="text-secondary small mt-1">É rápido, fácil e seguro!</p>
                        </div>

                        <form action="{{ route('register.submit') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Seu Nome Completo</label>
                                <input
                                    type="text"
                                    class="form-control form-control-lg bg-secondary text-white border-0"
                                    id="name"
                                    name="name"
                                >
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input
                                    type="email"
                                    class="form-control form-control-lg bg-secondary text-white border-0"
                                    id="email"
                                    name="email"
                                >
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Senha</label>
                                <input
                                    type="password"
                                    class="form-control form-control-lg bg-secondary text-white border-0"
                                    id="password"
                                    name="password"
                                >
                            </div>

                            <div class="mb-4">
                                <label for="password_confirmation" class="form-label">Confirmar Senha</label>
                                <input
                                    type="password"
                                    class="form-control form-control-lg bg-secondary text-white border-0"
                                    id="password_confirmation"
                                    name="password_confirmation"
                                >
                            </div>

                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-primary btn-lg fw-bold">
                                    CRIAR MINHA CONTA
                                </button>
                            </div>

                            <div class="text-center mt-4">
                                <p class="text-secondary small mb-0">Já tem uma conta?</p>
                                <a href="{{ route('login') }}" class="text-decoration-none text-primary small fw-bold">Fazer Login Aqui</a>
                            </div>

                        </form>
                        @if ($errors->any())
                            <div class="alert alert-danger text-center list-decoration-none mt-3">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
