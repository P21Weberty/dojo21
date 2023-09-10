<?php

namespace App\Model;

use App\Entity\DatabaseConnection;
use App\Entity\User;

class UserModel
{
    public function save($user){
        $pdoConnection = (new DatabaseConnection())->getConnection();

        /** @var $pdoConnection PDO */
        $statement = $pdoConnection->prepare("INSERT INTO user (name, email, password) values (:name, :email, :password)");
        $statement->bindParam(':name', $user->name);
        $statement->bindParam(':email', $user->email);
        $statement->bindParam(':password', md5($user->password));

        if (!$statement->execute()) {
            return false;
        }

        return true;
    }

    public function authenticate(User $user)
    {
        $pdoConnection = (new DatabaseConnection())->getConnection();

        $statement = $pdoConnection->prepare("SELECT * FROM user WHERE email = :email AND password = :password");
        $statement->execute([
            ':email' =>  $user->email,
            ':password' => md5($user->password)
        ]);

        if (!$row = $statement->fetch()) {
            return false;
        }

        setcookie("user_id", $row['id'], time()+60*60*24*30, "/", NULL);
        return true;
    }
}