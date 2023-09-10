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
            <div class="input-form">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="johndoe@gmail.com">

                <label for="password">Senha:</label>
                <input type="password" id="password" name="password" placeholder="********">
            </div>

            <div class="input-form">
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