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
    <section class="jumbotron text-center">
        <h2>OKR: OBJECTIVE KEY RESULTS</h2>
        <p>É uma metodologia de definição de metas a partir de objetivos chaves</p>
        <h4>Objetivo</h4>
        <p>Os objetivos são definidos a nível <strong> estratégico </strong> ou operacionais. </p>
        <h4>Resultados chave</h4>
        <p>São medidos por milestones ou valores</p>
        <p></p>
    </section>

    <form method="POST" id="objective-form" class="form">
        <h2>Adicionar Objetivo usuário</h2>
        <div class="form-group">
            <label for="title">Título:</label>
            <input type="text" name="title" id="title" value="">
        </div>

        <div class="form-group">
            <label for="description">Descrição:</label>
            <input type="text" id="description" name="description" value="">
        </div>

        <button class="btn" type="submit">ENVIAR</button>
    </form>
<?php require_once "adicionar_okr.php";?>
<?php require_once "meus_objetivos.php";?>

<footer>
    <script src="assets/jQuery/jquery-3.7.0.min.js" type="text/javascript"></script>
    <script src="assets/js/script.js" type="text/javascript"></script>
    <script src="assets/js/key-results.js" type="text/javascript"></script>
    <script src="assets/js/objective.js" type="text/javascript"></script>
</footer>
</body>
</html>

