<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'mvc_painel' . DIRECTORY_SEPARATOR);
define('APP', ROOT . 'application' . DIRECTORY_SEPARATOR);
date_default_timezone_set("America/Sao_Paulo");
setlocale(LC_ALL, 'pt_BR');

require ROOT . 'vendor/autoload.php';
require ROOT . 'application/libs/Helper.php';
require ROOT . 'application/libs/Upload.php';
require APP . 'config/config.php';

$url = \SmartSolucoes\Libs\Helper::splitUrl();

session_cache_expire(300);
session_start();
use SmartSolucoes\Core\Route;
$Route = New Route($url);

if($_SESSION != null) {
    $Route->get('','HomeController@admin');
} else {
    $Route->view('','admin/auth/login');
}



// FIM DAS ROTAS DO SITE //

$Route->get('registrar','AuthController@registrar');
$Route->post('cadastrar','AuthController@cadastrar');

$Route->post('login','AuthController@login');
$Route->get('logout','AuthController@logout');

$Route->view('forgot','admin/auth/forgot');
$Route->post('forgot','AuthController@forgot');
$Route->get('remember','AuthController@remember','session');
$Route->post('newpassword','AuthController@newpassword');

// TODO: ############
$Route->group2('ajax', function () {
    \SmartSolucoes\Libs\Helper::ajax($_POST['controller'],$_POST['action'],$_POST['param']);
    exit();
});


$Route->group('painel', function ($Route) {

    if(@$_SESSION['acesso'] == 'Administrador' || @$_SESSION['acesso'] == 'Morador' || @$_SESSION['acesso'] == 'Sindico') {

        $Route->get('','HomeController@admin');
        $Route->get('inicio','HomeController@inicio');

        $Route->group('account', function ($Route) {
            $Route->get('', 'AuthController@account');
            $Route->post('save', 'AuthController@update');
        });

        $Route->group('usuario', function ($Route) {
            $Route->crud('user');
        });

        $Route->group('condominio', function ($Route) {
            $Route->crud('condominio');
        });

        $Route->get('solicitar-ajuda', 'AjudaController@solicitar');
        $Route->post('solicitar', 'AjudaController@solicitarAjuda');
        $Route->get('ajudar', 'AjudaController@ajudar');
        $Route->get('andamento', 'AjudaController@andamento');
        $Route->get('concluidas', 'AjudaController@concluidas');
        $Route->get('ajuda-detalhes', 'AjudaController@detalhes', 'id');
        $Route->get('minhas-solicitacoes', 'AjudaController@minhasSolicitacoes');

        $Route->post('salvarAjuda', 'AjudaController@salvarAjuda');

    } else {
        \SmartSolucoes\Libs\Helper::view('admin/auth/login');
    }

});

if(@$_SESSION['acesso'] == 'Administrador' || @$_SESSION['acesso'] == 'Morador' || @$_SESSION['acesso'] == 'Sindico') {
} else {
    \SmartSolucoes\Libs\Helper::view('site/home/404');
}