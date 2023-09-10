<?php

namespace App\Http\Controller;

use App\Entity\KeyResultEntity;
use App\Model\KeyResultModel;

class KeyResult extends Controller
{
    public function save(){
        $isPost = $_SERVER['REQUEST_METHOD'];

        if ($isPost === 'POST') {
            $title = $_POST['title'] ?: '';
            $objetiveId = $_POST['objective_id'] ?: '';
            $description = $_POST['description'] ?: '';
            $type = $_POST['type'] ?: '';

            $keyResultEntity = new KeyResultEntity();
            $keyResultEntity->setDescription($description);
            $keyResultEntity->setType($type);
            $keyResultEntity->setTitle($title);
            $keyResultEntity->setObjectiveId($objetiveId);

            (new KeyResultModel())->save($keyResultEntity);

            $this->sendJson([
                'result' => 'success',
            ]);
        }
    }

    public function delete()
    {
        $isPost = $_SERVER['REQUEST_METHOD'];

        if ($isPost === 'POST') {

            if (!(new KeyResultModel())->delete($_POST['key_result_id'])){
                http_response_code(400);
            }
            $this->sendJson([
                'result' => 'success',
            ]);
        }
    }

    public function edit()
    {
        $isPost = $_SERVER['REQUEST_METHOD'];

        if ($isPost === 'POST') {

            if (!(new KeyResultModel())->edit()){
                http_response_code(400);
            }
        }
    }
}