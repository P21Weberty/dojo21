<?php

namespace App\Http\Controller;

use App\Model\UserModel;

class User extends Controller
{
    public function save(){
        $isPost = $_SERVER['REQUEST_METHOD'];

        if ($isPost === 'POST') {
            $user = new \App\Entity\User();
            $user->name = $_POST['name'] ?: '';
            $user->email = $_POST['email'] ?: '';
            $user->password = $_POST['password'] ?: '';

            if (!(new UserModel())->save($user)){
                http_response_code(400);
            }
        }
    }

    public function login()
    {
        $isPost = $_SERVER['REQUEST_METHOD'];

        if ($isPost === 'POST') {
            $user = new \App\Entity\User();
            $user->email = $_POST['email'] ?: '';
            $user->password = $_POST['password'] ?: '';

            if (!(new UserModel())->authenticate($user)){
                http_response_code(400);
            }
        }
    }
}