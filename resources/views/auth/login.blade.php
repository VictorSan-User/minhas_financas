<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Minhas Finanças</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>
<body class="text-dark d-flex align-items-center justify-content-center vh-100">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5 col-xl-4">
                <div class="card bg-white border border-secondary p-4 shadow-lg text-dark">
                    <div class="card-body">
                        <div class="text-center mb-5">
                            <h2 class="fw-bold text-primary mb-0">Minhas Finanças</h2>
                            <p class="text-secondary small mt-1">Acesso ao Painel de Controle</p>
                        </div>

                        <form action="{{ route('login.submit') }}" method="POST" >
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label" >Email</label>
                                <input
                                    type="email"
                                    class="form-control form-control-lg text-primary border-primary"
                                    id="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                >
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label">Senha</label>
                                <input
                                    type="password"
                                    class="form-control form-control-lg border-primary text-primary"
                                    id="password"
                                    name="password"
                                >
                            </div>

                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-primary btn-lg fw-bold">
                                    ENTRAR
                                </button>
                            </div>

                            @if ($errors->any())
                                <div class="alert alert-danger text-center list-decoration-none">
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}
                                        <br>
                                    @endforeach
                                </div>
                            @endif

                            <div class="text-center mt-4">
                                <a href="{{ route('register') }}" class="text-decoration-none text-dark small">Criar uma Conta</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
