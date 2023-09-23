<?php

namespace App\View;

class Build {
    /**
     * @param $row
     */
    public function table($row)
    {
        if ($row) {
            $response = "<br><br><br><table class='modal-table'><thead><tr><th>#</th><th>Título</th><th>Descrição</th><th>Tipo</th><th>Status</th><th>Ações</th></tr></thead>";
        }

        if (!isset($response)) {
            return false;
        }

        $count = 0;
        foreach ($row as $key => $item) {
            $status = $item['status'] ? 'CONCLUÍDO':'PENDENTE';
            $color = $item['status'] ? "#99EE80" : "#FF6961";

            $response .= "<tr style='background-color: {$color}'>";
            $response .= "<td>{$key}</td>";
            $response .= "<td>{$item['title']}</td>";
            $response .= "<td>{$item['description']}</td>";
            $response .= "<td>{$item['type']}</td>";
            $response .= "<td><button class='status-checkbox' onclick='KeyResult.handleStatus({$item['id']})'>{$status}</button></td>";
            $response .= "<td><span class='material-icons key_editar' onclick='KeyResult.handleEdit({$item['id']})'>edit</span>";
            $response .= "<span class='material-icons key_remover' onclick='KeyResult.handleRemove({$item['id']})'>delete_outline</span></td>";
            $response .= "</tr>";
            $count++;
        }

        $response .= "</table>";

        echo $response; exit();
    }
}

