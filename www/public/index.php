<?php

use App\Router\Router;

require_once '../vendor/autoload.php';

(new Router())->route();
unset($_COOKIE["user_id"]);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/style.css?v=<?= time() ?>">
    <title>O que é o OKR</title>
</head>
<body>
<header></header>
<nav>

</nav>
<main class="container">
    <section class="form">
        <form method="POST" id="login-form">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" placeholder="Digite aqui o e-mail" id="email" name="email" value="" autofocus>
            </div>
            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="password" placeholder="Digite aqui a senha" id="password" name="password" value="">
            </div>

            <div class="form-button">
                <button class="btn" type="submit">Logar</button>
                <a class="btn" href="cadastro.php">Cadastrar</a>
            </div>
        </form>
    </section>
</main>

<script src="assets/jQuery/jquery-3.7.0.min.js" type="text/javascript"></script>
<script src="assets/js/login.js" type="text/javascript"></script>
</body>
</html>