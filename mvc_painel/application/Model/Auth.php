<?php

namespace SmartSolucoes\Model;

use SmartSolucoes\Core\Model;
use SmartSolucoes\Libs\Helper;

class Auth extends Model
{

    public function login()
    {
        $PDO = $this->PDO();
        $query = $PDO->prepare("
            SELECT u.nome, u.id, u.acesso, u.imagem, u.data_cadastro, u.id_condominio
            FROM user u
            WHERE u.telefone = :login 
            AND u.senha = :senha 
            AND u.status = 1 LIMIT 1");
        $query->execute([':login'=>$_POST['login'],':senha'=>md5($_POST['senha'])]);
        $result = $query->fetch();
        return $result;
    }

    public function forgot($param=false)
    {
        if($param['session']) {
            $where = "session = :session";
            $set = [':session'=>$param['session']];
        } else {
            $where = "telefone = :telefone";
            $set = [':telefone'=>$_POST['telefone']];
        }
        $PDO = $this->PDO();
        $query = $PDO->prepare("SELECT id, email, telefone, imagem, nome FROM user WHERE " . $where . " LIMIT 1");
        $query->execute($set);
        $result = $query->fetch();
        return $result;
    }

    public function checkUser()
    {
        $PDO = $this->PDO();
        $query = $PDO->prepare("SELECT email, telefone FROM user WHERE email = :email OR (telefone = :telefone AND telefone IS NOT NULL AND telefone <> '') LIMIT 1");
        $query->execute([':email'=>$_POST['email'],':telefone'=>$_POST['telefone']]);
        $result = $query->fetch();
        return $result;
    }

}
