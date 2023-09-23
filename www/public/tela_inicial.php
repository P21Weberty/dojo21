<?php

use App\Router\Router;

require_once '../vendor/autoload.php';

if (!isset($_COOKIE['user_id'])) {
    header("Location: index.php");
}

(new Router())->route();

$title = "Home";
require_once "partial/head.php";
?>

<body>
    <div class="container">
        <?php
        require_once "partial/content.php";
        require_once "form/objective.php";
        require_once "objectives.php";
        ?>

        <div id="key-add-modal" class="modal">
            <div class="modal-content">
                <span class="close_add_modal">X</span>
                <form method="POST" id="key-result-form">
                    <?php require "form/key_result.php"; ?>
                </form>
            </div>
        </div>

        <div id="key-update-modal" class="modal">
            <div class="modal-content">
                <span class="close_update_modal">X</span>
                <form method="POST" id="key-result-form-update">
                    <?php require "form/key_result.php"; ?>
                </form>
            </div>
        </div>
    </div>
</body>

<?php require_once "partial/footer.php"; ?>

