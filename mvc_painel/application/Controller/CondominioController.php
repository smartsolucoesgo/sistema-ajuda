<?php

namespace SmartSolucoes\Controller;

use SmartSolucoes\Model\Condominio;
use SmartSolucoes\Libs\Helper;

class CondominioController
{

    private $table = 'condominio';
    private $baseView = 'admin/condominio';
    private $urlIndex = 'condominio';

    public function index()
    {
        $model = New Condominio();
        $response = $model->allCondominio();
        Helper::view($this->baseView.'/index', $response);
    }

    public function viewNew()
    {
        $model = New Condominio();
        $response['sindico'] = $model->allSindicos();
        Helper::view($this->baseView.'/edit',$response);
    }

    public function viewEdit($param)
    {
        $model = New Condominio();
        $response = $model->find($this->table,$param['id']);
        $response['sindico'] = $model->allSindicos();
        Helper::view($this->baseView.'/edit',$response);
    }

    public function create()
    {
        $model = New Condominio();
        $id = $model->create($this->table,$_POST,['id']);
        if($id) {
            header('location: ' . URL_ADMIN . '/' . $this->urlIndex);
        } else {
            Helper::view($this->baseView.'/edit',$_POST);
        }
    }

    public function update()
    {

        $model = New Condominio();
        if($model->save($this->table,$_POST)) {
            $id = $_POST['id'];
            header('location: ' . URL_ADMIN . '/' . $this->urlIndex);
        } else {
            Helper::view($this->baseView.'/edit/'.$_POST['id']);
        }
    }

    public function delete($param)
    {
        $model = New Condominio();
        $model->delete($this->table,'id', $param['id']);
        header('location: ' . URL_ADMIN . '/' . $this->urlIndex);
    }

}