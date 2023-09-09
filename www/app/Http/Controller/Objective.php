<?php

namespace App\Http\Controller;

use App\Entity\ObjectiveEntity;
use App\Model\ObjectiveModel;
use App\Model\UserModel;
use App\Http\Controller\Controller;

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

            if (!(new ObjectiveModel())->lista($_POST['objective_id'])){
                http_response_code(400);
            }
        }
    }
}