<?php

namespace SmartSolucoes\Model;

use SmartSolucoes\Core\Model;
use SmartSolucoes\Libs\Helper;

class Ajuda extends Model
{

    public function allAjuda()
    {
        $where = 'AND a.situacao != "Ajudada" AND a.situacao != "Sendo Ajudada"';
        if(@$_SESSION['acesso'] == 'Morador' || @$_SESSION['acesso'] == 'Sindico') {
          $where = " AND a.id_condominio = '" . $_SESSION['id_condominio'] . "' AND a.situacao = 'Aguardando Ajuda'";
      }
        $sql = "
          SELECT a.*, c.nome condominio, u.acesso acesso, u.nome nome, u.bloco_torre bloco_torre, u.apto_casa apto_casa
          FROM ajuda a 
          LEFT JOIN user u ON u.id = a.id_solicitante
          LEFT JOIN condominio c ON c.id = a.id_condominio
          WHERE 1=1 $where
        ";
        $query = $this->PDO()->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function allAjudaAndamento()
    {
        $where = 'AND a.situacao = "Sendo Ajudada"';
        if(@$_SESSION['acesso'] == 'Morador' || @$_SESSION['acesso'] == 'Sindico') {
          $where = " AND a.id_condominio = '" . $_SESSION['id_condominio'] . "' AND a.situacao = 'Aguardando Ajuda'";
      }
        $sql = "
          SELECT a.*, c.nome condominio, u.acesso acesso, u.nome nome, u.bloco_torre bloco_torre, u.apto_casa apto_casa
          FROM ajuda a 
          LEFT JOIN user u ON u.id = a.id_solicitante
          LEFT JOIN condominio c ON c.id = a.id_condominio
          WHERE 1=1 $where
        ";
        $query = $this->PDO()->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function allAjudaConcluida()
    {
        $where = 'AND a.situacao = "Ajudada"';
        if(@$_SESSION['acesso'] == 'Morador' || @$_SESSION['acesso'] == 'Sindico') {
          $where = " AND a.id_condominio = '" . $_SESSION['id_condominio'] . "' AND a.situacao = 'Aguardando Ajuda'";
      }
        $sql = "
          SELECT a.*, c.nome condominio, u.acesso acesso, u.nome nome, u.bloco_torre bloco_torre, u.apto_casa apto_casa
          FROM ajuda a 
          LEFT JOIN user u ON u.id = a.id_solicitante
          LEFT JOIN condominio c ON c.id = a.id_condominio
          WHERE 1=1 $where
        ";
        $query = $this->PDO()->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function ajudaSolicitante($id)
    {
      
        $sql = "
          SELECT a.*, u.nome nome_solicitante, u.telefone telefone_solicitante, u.email email_solicitante, u.bloco_torre bloco_torre_solicitante, u.apto_casa apto_casa_solicitante, ua.bloco_torre bloco_torre_ajudante, ua.apto_casa apto_casa_ajudante, ua.nome nome_ajudante, ua.telefone telefone_ajudante, ua.email email_ajudante, c.nome condominio
          FROM ajuda a 
          LEFT JOIN user u ON u.id = a.id_solicitante
          LEFT JOIN user ua ON ua.id = a.id_ajudante
          LEFT JOIN condominio c ON c.id = a.id_condominio
          WHERE a.id = $id
        ";
        $query = $this->PDO()->prepare($sql);
        $query->execute();
        return $query->fetchAll();

    }

    public function minhasSolicitacoes()
    {
      $where = " AND a.id_solicitante = '" . $_SESSION['id_user'] . "'";
        if(@$_SESSION['acesso'] == 'Morador' || @$_SESSION['acesso'] == 'Sindico') {
          $where = " AND a.id = '" . $id . "''";
      }
        $sql = "
          SELECT a.*, c.nome condominio, u.acesso acesso, u.nome nome, u.bloco_torre bloco_torre, u.apto_casa apto_casa
          FROM ajuda a 
          LEFT JOIN user u ON u.id = a.id_solicitante
          LEFT JOIN condominio c ON c.id = a.id_condominio
          WHERE 1=1 $where
        ";
        $query = $this->PDO()->prepare($sql);
        $query->execute();
        return $query->fetchAll();

    }


}