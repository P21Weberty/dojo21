<?php require_once '../vendor/autoload.php'; ?>
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
        <form method="POST" id="user-form">
            <div class="input-form">
                <label for="name">Nome:</label>
                <input type="text" name="name" id="name" placeholder="John Doe">

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="johndoe@gmail.com">

                <label for="password">Senha:</label>
                <input type="password" id="password" name="password" placeholder="********">
            </div>
            <button type="submit" class="btn">ENVIAR</button>
        </form>
    </section>
</main>
<footer></footer>
<script src="assets/jQuery/jquery-3.7.0.min.js" type="text/javascript"></script>
<script src="assets/js/user.js" type="text/javascript"></script>
</body>
</html>

