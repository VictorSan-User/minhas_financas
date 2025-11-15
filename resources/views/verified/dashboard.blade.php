<?php
$user = session('user');
// O código abaixo assume que a função session() está definida e funcionando corretamente.
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .carousel-track::-webkit-scrollbar {
            height: 8px;
        }
        .carousel-track::-webkit-scrollbar-track {
            background-color: #0c47ea;
            border-radius: 10px;
        }
        .carousel-track::-webkit-scrollbar-thumb {
            background-color: #0c47ea;
            border-radius: 10px;
        }
        .carousel-track::-webkit-scrollbar-thumb:hover {
            background-color: #0c47ea;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../../js/alert.js"></script>
    <script src="../../js/chat.js"></script>
</head>
<body class="bg-gray-100">

    <div class="flex h-screen">
        <aside class="w-64 bg-white shadow-xl flex flex-col">
            <div class="p-6 border-b">
                <h1 class="text-3xl font-bold text-primary">
                    Meu Painel
                </h1>
                <span class="text-sm text-gray-500">Cliente</span>
            </div>

            <nav class="flex-1 p-4 space-y-2">
                <a href="#" class="nav-link active flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-700 font-medium hover:bg-blue-50 hover:text-blue-600 transition-colors" data-target="dashboard">
                    <i class="bi bi-house-door-fill w-5"></i>
                    <span>Início</span>
                </a>
                <a href="#" class="nav-link flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-700 font-medium hover:bg-blue-50 hover:text-blue-600 transition-colors" data-target="anuncios">
                    <i class="bi bi-cash-coin"></i>
                    <span>Histórico Financeiro</span>
                </a>
                <a href="#" class="nav-link flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-700 font-medium hover:bg-blue-50 hover:text-blue-600 transition-colors" data-target="metas">
                    <i class="bi bi-bullseye"></i>
                    <span>Minhas Metas</span>
                </a>
                <a href="#" class="nav-link flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-700 font-medium hover:bg-blue-50 hover:text-blue-600 transition-colors" data-target="configuracoes">
                    <i class="bi bi-inboxes"></i>
                    <span>Meus Planos</span>
                </a>
            </nav>

            <div class="p-4 border-t">
                <a href="{{ route('logout') }}" class="flex items-center space-x-3 px-4 py-3 rounded-lg text-red-500 font-medium hover:bg-red-50 transition-colors">
                    <i class="bi bi-box-arrow-right w-5"></i>
                    <span>Sair</span>
                </a>
            </div>
        </aside>

        <main class="flex-1 p-8 h-screen overflow-y-auto">

            <div id="content-dashboard" class="content-section">
                <h1 class="text-3xl font-bold text-gray-800 mb-6">Bem-vindo, <strong class="text-primary"><?=htmlspecialchars($user->name);?></strong>!</h1>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <p class="text-gray-700">Selecione uma opção no menu ao lado para começar.</p>
                    {{-- aqui vai os dados de investimento e o relatorio de extrato --}}
                </div>
            </div>

            <div id="content-anuncios" class="content-section hidden">
                <h1 class="text-3xl font-bold text-gray-800 mb-6">Seu Extrato</h1>
                <div class="flex bg-white rounded-lg shadow-md" style="height: 70vh;">

                </div>
            </div>

            <div id="content-metas" class="content-section hidden">
                <h1 class="text-3xl font-bold text-gray-800 mb-6">Minhas Metas</h1>
                <div class="flex bg-white rounded-lg shadow-md" style="height: 70vh;">

                </div>
            </div>

            <div id="content-configuracoes" class="content-section hidden">
                <h1 class="text-3xl font-bold text-gray-800 mb-6 ">Meus Planos</h1>
                <div class="flex bg-white rounded-lg shadow-md" style="height: 70vh;">

                </div>
            </div>

        </main>
    </div>

    <div id="avaliacao-modal" class="fixed inset-0 bg-gray-900 bg-opacity-75 items-center justify-center z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="bg-white rounded-lg shadow-xl w-full max-w-lg mx-4 p-6 relative">
            <button id="modal-close-btn-avaliacao" class="absolute top-4 right-4 text-gray-500 hover:text-gray-800">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
            </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const navLinks = document.querySelectorAll('.nav-link');
            const contentSections = document.querySelectorAll('.content-section');

            const activeClasses = 'bg-gradient-to-r from-blue-50 to-blue-100 text-blue-600 border-r-4 border-blue-500'.split(' ');
            const inactiveClasses = 'text-gray-700'.split(' ');

            function setLinkActive(activeLink) {
                navLinks.forEach(link => {
                    link.classList.remove(...activeClasses);
                    link.classList.add(...inactiveClasses);
                });
                activeLink.classList.add(...activeClasses);
                activeLink.classList.remove(...inactiveClasses);
            }

            const initialActiveLink = document.querySelector('.nav-link[data-target="dashboard"]');
            if (initialActiveLink) {
                setLinkActive(initialActiveLink);
            }

            const initialSection = document.getElementById('content-dashboard');
            if (initialSection) {
                initialSection.classList.remove('hidden');
            }


            navLinks.forEach(link => {
                link.addEventListener('click', function(event) {
                    event.preventDefault();

                    const targetId = this.getAttribute('data-target');

                    contentSections.forEach(section => {
                        section.classList.add('hidden');
                    });

                    const targetSection = document.getElementById('content-' + targetId);
                    if (targetSection) {
                        targetSection.classList.remove('hidden');
                    }
                    setLinkActive(this);
                });
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>
</html>
