<?php

namespace App\Model;

use App\Entity\DatabaseConnection;
use App\Entity\KeyResultEntity;
use App\Entity\ObjectiveEntity;

class KeyResultModel
{
    public function save(KeyResultEntity $keyResultEntity){
        $pdoConnection = (new DatabaseConnection())->getConnection();

        /** @var $pdoConnection PDO */
        $statement = $pdoConnection->prepare("INSERT INTO key_result (objective_id, title, description, `type`) VALUES (:objective_id, :title, :description, :type)");
        $statement->execute([
            ':objective_id' => $keyResultEntity->getObjectiveId(),
            ':title' =>  $keyResultEntity->getTitle(),
            ':description' => $keyResultEntity->getDescription(),
            ':type' => $keyResultEntity->getType()
        ]);
    }

    public function listar(int $objectiveId) {
        $pdoConnection = (new DatabaseConnection())->getConnection();
        $statement = $pdoConnection->prepare("SELECT * FROM key_result WHERE key_result.objective_id = :objectiveId");
        $statement->bindParam(':objectiveId', $objectiveId);
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function delete($key_result_id)
    {
        $pdoConnection = (new DatabaseConnection())->getConnection();

        /** @var $pdoConnection PDO */
        $statement = $pdoConnection->prepare("DELETE FROM key_result WHERE id = :key_result_id");
        $statement->bindParam(':key_result_id', $key_result_id);

        if (!$statement->execute()) {
            return false;
        }

        return true;
    }

    public function edit()
    {
        $pdoConnection = (new DatabaseConnection())->getConnection();
        $statement = $pdoConnection->prepare("UPDATE key_result SET title = :title, description = :description, type = :type  WHERE id = :id");

        $statement->bindParam(':title', $_POST['title']);
        $statement->bindParam(':description', $_POST['description']);
        $statement->bindParam(':type', $_POST['type']);
        $statement->bindParam(':id', $_POST['id']);
        if (!$statement->execute()) {
            return false;
        }

        $row = $statement->fetchAll(\PDO::FETCH_ASSOC);

        if ($row) {
            $response = "";
        }

        if (!isset($response)) {
            return false;
        }

        echo $response; exit();
    }

}