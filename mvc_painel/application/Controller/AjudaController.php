<?php

namespace SmartSolucoes\Controller;

use SmartSolucoes\Model\Ajuda;
use SmartSolucoes\Libs\Helper;

class AjudaController
{
    private $table = 'ajuda';
    private $baseView = 'admin/ajuda';
    private $urlIndex = 'ajudas';

    public function solicitar()
    {
        $model = New Ajuda();
        Helper::view($this->baseView.'/solicitar');
    }

    public function solicitarAjuda()
    {
        $model = New Ajuda();
        unset($_POST['_wysihtml5_mode']);
        $id = $model->create($this->table,$_POST,['id']);
        if($id) {
            header('location: ' . URL_ADMIN . '/' . $this->urlIndex);
        } else {
            Helper::view($this->baseView.'/solicitar',$_POST);
        }
    }

    public function ajudar()
    {
        $model = New Ajuda();
        $response['ajuda'] = $model->allAjuda();
        Helper::view($this->baseView.'/solicitacoes', $response);

    }

    public function andamento()
    {
        $model = New Ajuda();
        $response['ajuda'] = $model->allAjudaAndamento();
        Helper::view($this->baseView.'/andamento', $response);

    }

    public function concluidas()
    {
        $model = New Ajuda();
        $response['ajuda'] = $model->allAjudaConcluida();
        Helper::view($this->baseView.'/concluida', $response);

    }

    public function detalhes($param)
    {
        $model = New Ajuda();
        $response = $model->find('ajuda', $param['id']);
        $response['solicitante'] = $model->ajudaSolicitante($param['id']);
        Helper::view($this->baseView.'/detalhes', $response);

    }

    public function salvarAjuda()
    {
        $model = New Ajuda();
        if($model->save($this->table,$_POST)) {
            $id = $_POST['id'];
            header('location: ' . URL_ADMIN . '/ajuda-detalhes/' . $id);
        } else {
            Helper::view($this->baseView.'/ajuda-detalhes/'.$_POST['id']);
        }

    }

    public function finalizarAjuda()
    {
        $model = New Ajuda();

    }

    public function minhasSolicitacoes()
    {
        $model = New Ajuda();
        $response['ajuda'] = $model->minhasSolicitacoes();
        Helper::view($this->baseView.'/minhas-solicitacoes', $response);

    }

}