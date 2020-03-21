<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <base href="<?= URL_PUBLIC ?>/" target="_self">
  <title><?= APP_TITLE . $title?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="/assets/admin/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/assets/admin/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/assets/admin/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/assets/admin/css/AdminLTE.min.css">
  <link rel="stylesheet" href="/assets/admin/css/skins/skin-blue.min.css">

  <?php
    foreach ($css as $file) {
        if(file_exists($file)) {
            echo '<link href="' . $file . '" rel="stylesheet">';
        }
    }
    ?>

<script src="/assets/admin/js/jquery.min.js"></script>
  <?php
    foreach ($script as $file) {
        if(file_exists($file)) {
            echo '<script src="' . $file . '"></script>';
        }
    }
    ?>

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="/assets/admin/img/logo_painel_mini.png" alt=""></span>
      <span class="logo-lg"><img src="/assets/admin/img/logo_painel.png" alt=""></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?= $_SESSION['imagem'] ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?= $_SESSION['nome'] ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="<?= $_SESSION['imagem'] ?>" class="img-circle" alt="User Image">

                <p>
                  <?= $_SESSION['nome'] ?>
                  <small>Membro desde <?= \SmartSolucoes\Libs\Helper::data($_SESSION['data_cadastro']) ?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?= URL_ADMIN ?>/account" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="<?=URL_ADMIN?>/logout" class="btn btn-default btn-flat">Sair</a>
                </div>
              </li>
            </ul>
          </li>
          <li>
            <a href="<?=URL_ADMIN?>/logout"><i class="fa fa-sign-out"></i> Sair</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">
    <section class="sidebar">

      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= $_SESSION['imagem'] ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= $_SESSION['nome'] ?></p>
          <a><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <ul class="sidebar-menu" data-widget="tree">
        <li <?php if (stripos($_SERVER['REQUEST_URI'],'painel/inicio') !== false) {echo 'class="active"';} ?> ><a href="<?= URL_ADMIN ?>"><i class="fa fa-dashboard"></i> <span>Página Inicial</span></a></li>

        <li class="treeview">
          <a href="#"><i class="fa fa-info-circle"></i> <span>Ajudas</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= URL_ADMIN ?>/solicitar-ajuda">Solicitar Ajuda</a></li>
            <li><a href="<?= URL_ADMIN ?>/ajudar">Ajudar</a></li>
            <li><a href="#">Minhas Solicitações</a></li>
          </ul>
        </li>
        <?php if($_SESSION['acesso'] == 'Administrador') { ?>
        <li <?php if (stripos($_SERVER['REQUEST_URI'],'painel/condominio') !== false) {echo 'class="active"';} ?>><a href="<?= URL_ADMIN ?>/condominio"><i class="fa fa-home"></i> <span>Condominios</span></a></li>

        <li <?php if (stripos($_SERVER['REQUEST_URI'],'painel/usuario') !== false) {echo 'class="active"';} ?>><a href="<?= URL_ADMIN ?>/usuario"><i class="fa fa-users"></i> <span>Usuários</span></a></li>
        <?php }?>
        <li><a href="<?=URL_ADMIN?>/logout"><i class="fa fa-sign-out"></i> <span>Sair</span></a></li>
      </ul>
    </section>
  </aside>