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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Tela Inicial</title>
</head>
<body>
<div class="container">
    <section class="jumbotron text-center">
        <h2>OKR: OBJECTIVE KEY RESULTS</h2>
        <p>É uma metodologia de definição de metas a partir de objetivos chaves</p>
        <h4>Objetivo</h4>
        <p>Os objetivos são definidos a nível <strong> estratégico </strong> ou operacionais. </p>
        <h4>Resultados chave</h4>
        <p>São medidos por milestones ou valores</p>
        <p></p>
    </section>

    <form method="POST" id="objective-form">
        <div class="input-form">
            <label for="title">Título:</label>
            <input type="text" name="title" id="title" placeholder="Preparar o jantar">

            <label for="description">Descrição:</label>
            <input type="text" name="description" id="description" placeholder="1° - Comprar os ingredientes...">
        </div>

        <div>
            <button class="btn" type="submit">OK</button>
        </div>
    </form>

    <?php require_once "meus_objetivos.php"; ?>

    <footer>
        <script src="assets/jQuery/jquery-3.7.0.min.js" type="text/javascript"></script>
        <script src="assets/js/script.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
        <script src="assets/js/key-results.js" type="text/javascript"></script>
        <script src="assets/js/objective.js" type="text/javascript"></script>
    </footer>

    <div id="key_add_modal" class="modal">
        <div class="modal-content">
            <span class="close_add_modal">X</span>
            <?php require_once "adicionar_okr.php"; ?>
        </div>
    </div>


</body>
</html>

