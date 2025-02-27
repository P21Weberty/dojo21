<?php

require_once "../vendor/autoload.php";

use App\Model\KeyResultModel;
use App\Model\ObjectiveModel;


$objectiveModel = new ObjectiveModel();
$keyResultsModel = new KeyResultModel();

$objectives = $objectiveModel->listar($_COOKIE['user_id']);

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

?>

<button style="position: relative" class="material-icons" id="modal-add">add</button>
<div class="meus-objetivos">
    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Título</th>
            <th>Descrição</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($objectives as $key => $objective) : ?>
            <tr>
                <td><?= ++$key; ?></td>
                <td><?= $objective['title']; ?></td>
                <td><?= $objective['description']; ?></td>
                <td><?= $objective['status'] ? "CONCLUÍDO": "PENDENTE"; ?></td>
                <td>
                    <div style="display: flex">
                        <span class="material-icons" data-id="<?= $objective['id']; ?>" id="modal-show">visibility</span>
                        <span class="material-icons" data-id="<?= $objective['id']; ?>" id="modal-remove">delete_outline</span>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div id="modal" class="modal">
    <div class="modal-content">
        <span class="close">X</span>
    </div>
</div>
