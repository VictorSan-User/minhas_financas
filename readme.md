# 🚀 Gerenciador de Metas e Planos Financeiros (Laravel CRUD)

## 🌟 Visão Geral do Projeto

Este projeto é uma aplicação web desenvolvida em **Laravel** que serve como um **Gerenciador de Metas, Ideias e Planos Financeiros**.

O principal objetivo desta aplicação é demonstrar o compreendimento e a implementação de um **CRUD (Create, Read, Update, Delete)** robusto e seguro utilizando o framework Laravel.

A funcionalidade central permite aos usuários:

  * **Organizar** suas metas e ideias de forma clara.
  * **Gerenciar** planos financeiros associados.
  * **Acompanhar** o ciclo de vida de cada item (criação, visualização, edição e exclusão).

## 🛠️ Tecnologias Utilizadas

  * **Linguagem de Programação:** PHP
  * **Framework:** Laravel (versão 12x)
  * **Banco de Dados:** MySQL
  * **Frontend:** HTML, CSS, Bootstrap

**Destaques na Implementação:**

  * **Validação de Dados:** Uso de `$request->validate()` no Controller para garantir a integridade dos dados.
  * **Eloquent ORM:** Utilização do Eloquent para interagir com o banco de dados de forma intuitiva, manipulando modelos como `Ideia` e `PlanoFinanceiro`.
  * **Mass Assignment Protection:** Garantia de segurança utilizando a propriedade `$fillable` nos Modelos.

## ⚙️ Como Instalar e Rodar o Projeto

Siga os passos abaixo para configurar o projeto em sua máquina local:

### 1\. Clonar o Repositório

```bash
git clone https://github.com/VictorSan-User/minhas_financas.git
cd minhas_financas
```

### 2\. Configurar Dependências

Instale as dependências PHP usando o Composer:

```bash
composer install
```

### 3\. Configurar Variáveis de Ambiente

Crie o arquivo `.env` baseado no `.env.example` e configure as credenciais do seu banco de dados.

```bash
cp .env.example .env
```

### 4\. Configurar o Banco de Dados

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19/11/2025 às 02:14
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `minhas_financas`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `event_date` datetime NOT NULL,
  `value` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `event_date`, `value`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'Padaria editada', 'Comprei uns bolos novos', '2025-06-23 00:00:00', 16.99, '2025-11-17 02:14:23', '2025-11-17 02:47:20', 1),
(5, 'Pastel com caldo de cana', 'Comprei um pastel muito bom', '2025-11-18 00:00:00', 15, '2025-11-19 02:57:25', '2025-11-19 02:57:25', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `ideias`
--

CREATE TABLE `ideias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `categoria` enum('Profissional','Pessoal') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `ideias`
--

INSERT INTO `ideias` (`id`, `titulo`, `description`, `categoria`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'Nova manutencao', 'Trabalhar com manutenção de computadores, anunciando pelo insta', 'Profissional', '2025-11-19 03:49:52', '2025-11-19 04:06:13', 2),
(2, 'Kit churrasco', 'comprar um kit de churrasco bacana', 'Profissional', '2025-11-19 03:50:49', '2025-11-19 03:50:49', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `metas`
--

CREATE TABLE `metas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `valor` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `metas`
--

INSERT INTO `metas` (`id`, `title`, `description`, `valor`, `created_at`, `updated_at`, `data_inicio`, `data_fim`, `user_id`) VALUES
(2, 'Meta boua', 'Essa é uma NOVA pessoal muito bacana', 1500, '2025-11-17 02:22:56', '2025-11-17 03:04:42', '2026-01-16', '2026-02-17', 1),
(3, 'Minha estabilidade financeira', 'Valor para atingir até fim de 2026', 17000, '2025-11-19 02:53:48', '2025-11-19 02:54:19', '2025-11-20', '2026-12-01', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(15, '0001_01_01_000000_create_users_table', 1),
(16, '2025_11_15_104359_create_events_table', 1),
(17, '2025_11_15_125747_create_ideias_table', 1),
(18, '2025_11_15_130101_create_metas_table', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'José da Silva', 'abc@gmail.com', '$2y$12$S0sUnGGOAjMX8cyx9frd/eQsjPj2wQHAxECio088qScA1ojJglS4y', '2025-11-17 02:13:36', '2025-11-17 02:13:36'),
(2, 'Victor Henrique Silva de Abreu Nacife', 'vihenriquenacife99@gmail.com', '$2y$12$p6dzLdWGFJJdSojzvPvtrezREgVuc99DQ1RlOzsnwV8h0vaib4VZO', '2025-11-17 02:13:46', '2025-11-17 02:13:46');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_user_id_foreign` (`user_id`);

--
-- Índices de tabela `ideias`
--
ALTER TABLE `ideias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ideias_user_id_foreign` (`user_id`);

--
-- Índices de tabela `metas`
--
ALTER TABLE `metas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `metas_user_id_foreign` (`user_id`);

--
-- Índices de tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `ideias`
--
ALTER TABLE `ideias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `metas`
--
ALTER TABLE `metas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `ideias`
--
ALTER TABLE `ideias`
  ADD CONSTRAINT `ideias_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `metas`
--
ALTER TABLE `metas`
  ADD CONSTRAINT `metas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


```bash
php artisan migrate
```

### 5\. Rodar a Aplicação

Inicie o servidor de desenvolvimento do Laravel:

```bash
php artisan serve
```
