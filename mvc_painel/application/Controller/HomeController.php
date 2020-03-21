<?php

namespace SmartSolucoes\Controller;

use SmartSolucoes\Libs\Helper;
use SmartSolucoes\Model\Home;

class HomeController
{

    public function admin()
    {
        header('location: ' . URL_ADMIN . '/inicio');
    }

    public function inicio()
    {
        $model = New Home();
        $response['condominios'] = $model->countCondominios();
        $response['usuarios'] = $model->countUsers();
        $response['aguardando-ajuda'] = $model->countAjuda();
        $response['ajuda-andamento'] = $model->ajudaAndamento();
        $response['ajuda-concluida'] = $model->ajudaConcluida();
        Helper::view('admin/home/index', $response);
    }

    public function client()
    {
        Helper::view('admin/home/index');
    }

}
