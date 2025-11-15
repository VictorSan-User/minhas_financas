@extends('layouts.layout')
@section('content')
    <div class="container flex-column justify-content-center align-items-center vh-100">
        <div class="row text-dark fs-1 pt-5">
            <div class="col-6 text-start"><strong>Minhas Finanças</strong></div>
            <div class="col-6">
                <button class="btn btn-sm bg-primary d-block mx-auto"><a href="{{ route('login') }}" class="text-decoration-none"><div class="col-3 text-end text-white fs-3">Login</div></a></button>
            </div>
        </div>
        <div class="row">
            <div class="col-6 mt-5 pt-5 d-flex justify-content-center align-items-center">
                <div class="card bg-primary bg-opacity-10 border-0" style="width: 600px; height: 300px;">
                    <div class="card-body">
                        <div class="text-center pb-5 mt-2"><img src="./img/iconegrana-50.png" alt="icone" class="me-3"></div>
                        <div class="card-subtitle mb-2 text-start text-dark fs-3 border-blue-200">Sistema de controle <strong class="text-primary">financeiro pessoal</strong> e ideação de novos projetos que <strong class="text-primary">envolvam seu dinheiro</strong>!</div>
                    </div>
                </div>
            </div>
            <div class="col-6 mt-5 pt-5 d-flex justify-content-center align-items-center">
                <div class="card bg-primary bg-opacity-10 border-0" style="width: 600px; height: 300px;">
                    <div class="card-body">
                        <div class="text-center pb-5 mt-2"><img src="./img/graficos-50.png" alt="icone" class="me-3"></div>
                        <div class="card-subtitle mb-2 text-start text-dark fs-3 border-blue-200 text-dark">Saiba exatamente para <strong class="text-primary">onde </strong>o seu dinheiro está indo com  <strong class="text-primary">dashboards gráficos </strong> e <strong class="text-primary">relatórios </strong>para alcancar seus objetivos!</div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="text-dark">
        <div class="container pt-3 flex-column justify-content-center align-items-center">
            <div class="row">
                <h2 class="text-dark text-center"><strong>Principais Ferramentas</strong></h2>

                <div class="col-3 mt-4 d-flex justify-content-start align-items-center">
                    <div class="card bg-primary bg-opacity-10 border-0" style="width: 200px; height: 190px;">
                        <div class="card-body">
                            <div class="text-center pb-3 mt-2"><img src="./img/controle-50.png" alt="icone" class="me-3"></div>
                            <div class="card-subtitle mb-2 text-center text-dark fs-4 border-blue-200">Controle de Gastos</div>
                        </div>
                    </div>
                </div>
                <div class="col-3 mt-4 d-flex justify-content-start align-items-center">
                    <div class="card bg-primary bg-opacity-10 border-0" style="width: 200px; height: 190px;">
                        <div class="card-body">
                            <div class="text-center pb-3 mt-2"><img src="./img/orcamento-50.png" alt="icone" class="me-3"></div>
                            <div class="card-subtitle mb-2 text-center text-dark fs-4 border-blue-200">Orçamento Pessoal</div>
                        </div>
                    </div>
                </div>
                <div class="col-3 mt-4 d-flex justify-content-start align-items-center">
                    <div class="card bg-primary bg-opacity-10 border-0" style="width: 200px; height: 190px;">
                        <div class="card-body">
                            <div class="text-center pb-3 mt-2"><img src="./img/investimentos-50.png" alt="icone" class="me-3"></div>
                            <div class="card-subtitle mb-2 text-center text-dark fs-4 border-blue-200">Controle de Investimentos</div>
                        </div>
                    </div>
                </div>
                <div class="col-3 mt-4 d-flex justify-content-start align-items-center">
                    <div class="card bg-primary bg-opacity-10 border-0" style="width: 200px; height: 190px;">
                        <div class="card-body">
                            <div class="text-center pb-3 mt-2"><img src="./img/metas-50.png" alt="icone" class="me-3"></div>
                            <div class="card-subtitle mb-2 text-center text-dark fs-4 border-blue-200">Metas Pessoais</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer text-center mt-5 bg-secondary bg-opacity-10 p-3">
            <h6 class="text-dark">&copy; Todos os direitos reservados</h6>
        </div>
    </div>
@endsection
