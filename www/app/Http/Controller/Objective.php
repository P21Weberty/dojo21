<?php

namespace App\Http\Controller;

use App\Entity\ObjectiveEntity;
use App\Model\ObjectiveModel;

class Objective extends Controller
{
    public function save(){
        session_start();

        $isPost = $_SERVER['REQUEST_METHOD'];

        if ($isPost === 'POST') {
            $objective = new ObjectiveEntity();
            $objective->setUser($_COOKIE['user_id']);
            $objective->setTitle($_POST['title'] ?: '');
            $objective->setDescription($_POST['description'] ?: '');

            (new ObjectiveModel())->save($objective);

            $this->sendJson([
                'result' => 'success',
            ]);
        }
    }

    public function delete()
    {
        $isPost = $_SERVER['REQUEST_METHOD'];

        if ($isPost === 'POST') {

            if (!(new ObjectiveModel())->delete($_POST['post_id'])){
                http_response_code(400);
            }
            $this->sendJson([
                'result' => 'success',
            ]);
        }
    }

    public function lista()
    {
        $isPost = $_SERVER['REQUEST_METHOD'];

        if ($isPost === 'POST') {

            $row = (new ObjectiveModel())->lista($_POST['objective_id']);

            if (!$this->buildTable($row)) {
                http_response_code(400);
            }

        }
    }

    private function buildTable($row)
    {
        if ($row) {
            $response = "<table class='modal-table'><thead><tr><th>#</th><th>Título</th><th>Descrição</th><th>Tipo</th><th>Ações</th></tr></thead>";
        }

        foreach ($row as $key => $item) {
            $response .= "<tr>";
            $response .= "<td>{$key}</td>";
            $response .= "<td>{$item['title']}</td>";
            $response .= "<td>{$item['description']}</td>";
            $response .= "<td>{$item['type']}</td>";
            $response .= "<td><span class='material-icons key_editar' onclick='KeyResult.handleEdit({$item['id']})'>edit</span>";
            $response .= "<span class='material-icons key_remover' onclick='KeyResult.handleRemove({$item['id']})'>delete_outline</span></td>";
            $response .= "</tr><br>";
        }

        if (!isset($response)) {
            return false;
        }

        $response .= "</table>";

        echo $response; exit();
    }
}