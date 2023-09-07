<?php

use App\Router\Router;

require_once '../vendor/autoload.php';

if (!isset($_COOKIE['user_id'])) {
    header("Location: index.php");
}

(new Router())->route();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/style.css?v=<?= time() ?>">
    <title>Tela Inicial</title>
</head>
<body>
<header></header>
<nav>


<main>
    <section class="jumbotron text-center">
        <h2>OKR: OBJECTIVE KEY RESULTS</h2>
        <p>É uma metodologia de definição de metas a partir de objetivos chaves</p>
        <h4>Objetivo</h4>
        <p>Os objetivos são definidos a nível <strong> estratégico </strong> ou operacionais. </p>
        <h4>Resultados chave</h4>
        <p>São medidos por milestones ou valores</p>
        <p></p>
    </section>

    <section class="text-center">
        <h2>Adicionar Objetivo usuário</h2>
        <form method="POST" id="objective-form" class="form">
            <div class="">
                <label for="title">
                    <span>Título: </span>
                    <input type="text" name="title" id="title" value="">
                </label>
            </div>

            <div class="">
                <label for="description">
                    <span>Descrição: </span>
                    <input type="text" id="description" name="description" value="">
                </label>
            </div>

            <div>
                <button class="btn" type="submit">
                    ENVIAR
                </button>
            </div>
        </form>
    </section>

    <section>
        <h2>Links úteis</h2>

        <a class="btn" href="adicionar_okr.php">Adicionar key result</a>
        <a class="btn" href="meus_objetivos.php">Listar meus objetivos</a>
    </section>


</main>

<footer></footer>
<script src="assets/jQuery/jquery-3.7.0.min.js" type="text/javascript"></script>
<script src="assets/js/objective.js" type="text/javascript"></script>
</body>
</html>

