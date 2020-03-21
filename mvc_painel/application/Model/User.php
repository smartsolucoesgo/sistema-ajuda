<?php

namespace SmartSolucoes\Model;

use SmartSolucoes\Core\Model;
use SmartSolucoes\Libs\Helper;

class User extends Model
{

    public function allUsers()
    {
        $where = '';
        if(@$_SESSION['acesso'] == 'Morador' || @$_SESSION['acesso'] == 'Sindico') {
          $where = " AND u.id_condominio = '" . $_SESSION['id_condominio'] . "'";
      }
        $sql = "
          SELECT u.*, c.nome condominio
          FROM user u 
          LEFT JOIN condominio c ON c.id = u.id_condominio
          WHERE 1=1 $where
        ";
        $query = $this->PDO()->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

}
