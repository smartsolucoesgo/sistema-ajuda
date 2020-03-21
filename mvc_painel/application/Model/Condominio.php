<?php

namespace SmartSolucoes\Model;

use SmartSolucoes\Core\Model;
use SmartSolucoes\Libs\Helper;

class Condominio extends Model
{

    public function allCondominio()
    {
        $where = "AND c.status = '1'";
        $sql = "
        SELECT c.*, u.nome sindico
        FROM condominio c 
        LEFT JOIN user u ON c.id_sindico = u.id
        WHERE 1=1 $where
        ";
        $query = $this->PDO()->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function allSindicos()
    {
        $where = "AND u.acesso = 'Sindico'"; 
        $sql = "
        SELECT u.*
        FROM user u
        WHERE 1=1 $where
        ";
        $query = $this->PDO()->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }


}