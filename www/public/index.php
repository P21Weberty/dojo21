<?php

use App\Router\Router;

require_once "../vendor/autoload.php";

(new Router())->route();
unset($_COOKIE["user_id"]);
?>


<?php
$title = "Entrar";

require_once "partial/head.php";
require_once "login.php";
require_once "partial/footer.php";
?>