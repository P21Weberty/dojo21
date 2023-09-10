<?php

namespace App\Model;

use App\Entity\DatabaseConnection;
use App\Entity\ObjectiveEntity;

class ObjectiveModel
{
    public function save(ObjectiveEntity $objective){
        $pdoConnection = (new DatabaseConnection())->getConnection();

        /** @var $pdoConnection PDO */
        $statement = $pdoConnection->prepare("INSERT INTO objective (user_id, title, description) values (:user_id, :title, :description)");
        $statement->execute([
            ':user_id' => $objective->getUser(),
            ':title' =>  $objective->getTitle(),
            ':description' => $objective->getDescription(),
        ]);
    }

    public function listar($userId) {
        $pdoConnection = (new DatabaseConnection())->getConnection();
        $statement = $pdoConnection->prepare("SELECT * FROM objective WHERE user_id = :user_id");
        $statement->bindParam(':user_id', $userId);
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function delete($objectId)
    {
        $pdoConnection = (new DatabaseConnection())->getConnection();

        /** @var $pdoConnection PDO */
        $statement = $pdoConnection->prepare("DELETE FROM objective WHERE id = :objective_id");
        $statement->bindParam(':objective_id', $objectId);

        if (!$statement->execute()) {
            return false;
        }

        return true;
    }

    public function lista($objectiveId)
    {
        $pdoConnection = (new DatabaseConnection())->getConnection();
        $statement = $pdoConnection->prepare("SELECT * FROM objective INNER JOIN key_result kr on objective.id = kr.objective_id WHERE (objective.id = :objective_id)");

        $statement->bindParam(':objective_id', $objectiveId);
        if (!$statement->execute()) {
            return false;
        }

        $row = $statement->fetchAll(\PDO::FETCH_ASSOC);

        if ($row) {
            $response = "<table class='modaltable'><thead><tr><th>#</th><th>Título</th><th>Descrição</th><th>Tipo</th><th>Ações</th></tr></thead>";
        }

        foreach ($row as $key => $item) {
            $response .= "<tr>";
            $response .= "<td>{$key}</td>";
            $response .= "<td>{$item['title']}</td>";
            $response .= "<td>{$item['description']}</td>";
            $response .= "<td>{$item['type']}</td>";
            $response .= "<td><span class='material-icons key_editar' onclick='modal_editar({$item['id']})'>edit</span>";
            $response .= "<span class='material-icons key_remover' onclick='remover({$item['id']})'>delete_outline</span></td>";
            $response .= "</tr><br>";
        }

        if (!isset($response)) {
            return false;
        }

        $response .= "</table>";
        echo $response; exit();
    }
}