<?php
require_once "../vendor/autoload.php";

use App\Model\ObjectiveModel;

$objectiveModel = new ObjectiveModel();

$objectives = $objectiveModel->listar($_COOKIE['user_id']);
?>

<form method="POST" id="key-result-form">
    <h2>Adicionar key results</h2>
    <div class="">
        <label for="title">
            <span>Título: </span>
            <input type="text" name="title" id="title" value="">
        </label>
    </div>

    <div class="">
        <label for="objective">
            <span>Objetivo: </span>
            <select name="objective_id" id="objective_id">
                <?php foreach ($objectives as $objective) : ?>
                    <option value="<?= $objective['id']; ?>"><?= $objective['title']; ?></option>
                <?php endforeach; ?>
            </select>
        </label>
    </div>

    <div class="">
        <label for="description">
            <span>Descrição: </span>
            <input type="text" id="description" name="description">
        </label>
    </div>

    <div class="">
        <label for="type">
            <span>Tipo: </span>
            <select id="type" name="type">
                <option value="1">Milestone</option>
                <option value="2">Porcentagem</option>
            </select>
        </label>
    </div>

    <div>
        <button class="btn" type="submit">Enviar</button>
    </div>
</form>

