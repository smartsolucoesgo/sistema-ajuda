<?php

namespace SmartSolucoes\Model;

use SmartSolucoes\Core\Model;
use SmartSolucoes\Libs\Helper;

class Home extends Model
{
    public function countCondominios()
    {
        $sql = "
        SELECT count(id) 
        FROM condominio 
        WHERE 1=1
        ";
        $query = $this->PDO()->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function countUsers()
    {
        $sql = "
        SELECT count(id) 
        FROM user 
        WHERE 1=1
        ";
        $query = $this->PDO()->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function ajudaAndamento()
    {
        $sql = "
        SELECT count(id) 
        FROM ajuda 
        WHERE situacao = 'Sendo Ajudada'
        ";
        $query = $this->PDO()->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function countAjuda()
    {
        $sql = "
        SELECT count(id) 
        FROM ajuda 
        WHERE situacao = 'Aguardando Ajuda'
        ";
        $query = $this->PDO()->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function ajudaConcluida()
    {
        $sql = "
        SELECT count(id) 
        FROM ajuda 
        WHERE situacao = 'Ajudada'
        ";
        $query = $this->PDO()->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

}
