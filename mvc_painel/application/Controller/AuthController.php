<?php

namespace SmartSolucoes\Controller;

use SmartSolucoes\Model\Auth;
use SmartSolucoes\Libs\Helper;

class AuthController
{
    private $baseView = 'admin/auth/login';

    public function registrar()
    {
        $model = New Auth();
        $response['condominio'] = $model->all('condominio', 'id ASC');
        Helper::view('admin/auth/registro', $response);

    }

    public function cadastrar()
    {
        $model = New Auth();
        if($_POST['senha']) $_POST['senha'] = md5($_POST['senha']);
        $userExist = $model->checkUser();
        if($userExist['email']) {
            $response['cadastrar'] = $_POST;
            $response['condominio'] = $model->all('condominio', 'id ASC');
            $response['erro'] = 'E-mail ou Telefone já cadastrado.';
            Helper::view('admin/auth/registro',$response);
        } else {
            $id = $model->create('user',$_POST,['id']);
            $response['logout'] = 'Oba, seu cadastro foi realizado com sucesso. Por favor faça login.';
            Helper::view('admin/auth/login',$response);

        }

        exit();
    }

    public function login()
    {
        $login = New Auth();
        $user = $login->login();
        if($user['nome']) {
            $_SESSION['nome']   = $user['nome'];
            $_SESSION['id_user']   = $user['id'];
            $_SESSION['acesso']   = $user['acesso'];
            $_SESSION['imagem']   = $user['imagem'];
            $_SESSION['id_condominio']   = $user['id_condominio'];
            $_SESSION['data_cadastro']   = $user['data_cadastro'];

            header('location: ' . URL_ADMIN . '/inicio');
        } else {

            $response['erro'] = "Usuário ou senha incorreto!";
            Helper::view($this->baseView ,$response);
            }
            exit();
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        $response['logout'] = "Até Breve.! Não demore hein :)";
        Helper::view($this->baseView,$response);
        exit();
    }

    public function forgot()
    {
        
        $model = New Auth();
        $account = $model->forgot();
        if($account['id']) {
            $account['session'] = str_replace([' ','.'],'',microtime());
            $model->save('user',$account);
            Helper::trataMail(['email'=>$account['email'],'tipo'=>'forgot','session'=>$account['session'], 'nome'=>$account['nome']]);
            $response['sucesso'] = 'Redefinição de senha enviada para o e-mail: '.$account['email'];
            Helper::view('admin/auth/login', $response);
        } else {
            $response['erro'] = 'Telefone não localizado';
            Helper::view('admin/auth/forgot',$response);
        }

    }

    public function remember($param)
    {
        $model = New Auth();
        $response = $model->forgot($param);
        Helper::view('admin/auth/remember',$response);
    }

    public function newpassword()
    {
 
        $model = New Auth();
        $save['id'] = $_POST['id'];
        if($_POST['senha']) $save['senha'] = md5($_POST['senha']);
        if($model->save('user',$save)) {
            $response['sucesso'] = "Senha alterada com sucesso, por favor faça login.";
            Helper::view('admin/auth/login', $response);
        } else {
            Helper::view('admin/auth/edit/');
        }
    }

    public function account()
    {
        $model = New Auth();
        $response = $model->find('user',$_SESSION['id_user']);
        $response['condominio'] = $model->all('condominio', 'id ASC');
        Helper::view('admin/auth/edit',$response);
    }

    public function update()
    {

        $model = New Auth();
        $id = $save['id'] = $_SESSION['id_user'];
        $save['nome'] = $_SESSION['nome'] = $_POST['nome'];
        $save['id_condominio'] = $_POST['id_condominio'];
        $save['bloco_torre'] = $_POST['bloco_torre'];
        $save['apto_casa'] = $_POST['apto_casa'];
        if($_POST['senha']) $save['senha'] = md5($_POST['senha']);
        if($model->save('user',$save)) {
            $caminho = 'files/user/';
            $nome_imagem = $id.'_'.time();
            $formato = 'jpg';
            if(Helper::upload($_FILES['imagem'],$nome_imagem,$caminho,$formato,200,200)) {
                $model->save('user',['id'=>$id,'imagem'=>$caminho.$nome_imagem.'.'.$formato]);
                $_SESSION['imagem'] = $caminho.$nome_imagem.'.'.$formato;
            }
            header('location: ' . URL_ADMIN );
        } else {
            Helper::view('admin/auth/edit/');
        }
    }

    
}
