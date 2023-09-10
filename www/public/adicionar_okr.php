<?php
require_once "../vendor/autoload.php";

use App\Model\ObjectiveModel;

$objectiveModel = new ObjectiveModel();

$objectives = $objectiveModel->listar($_COOKIE['user_id']);
?>

<form method="POST" id="key-result-form">
    <h2>Adicionar key results</h2>
    <div class="input-form">
        <label for="objective">Objetivo:</label>
        <select name="objective_id" id="objective_id">
            <?php foreach ($objectives as $objective) : ?>
                <option value="<?= $objective['id']; ?>"><?= $objective['title']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="input-form">
        <label for="type">Tipo:</label>
        <select id="type" name="type">
            <option value="1">Milestone</option>
            <option value="2">Porcentagem</option>
        </select>
    </div>

    <div class="input-form">
        <label for="title">Título:</label>
        <input type="text" name="title" id="title">
    </div>

    <div class="input-form">
        <label for="description">Descrição: </label>
        <input type="text" id="description" name="description">
    </div>

    <div class="input-form">
        <button class="btn" type="submit">Enviar</button>
    </div>
</form>

