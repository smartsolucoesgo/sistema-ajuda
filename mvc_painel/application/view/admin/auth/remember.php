<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= APP_TITLE ?> | Redefinir Senha</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="/assets/admin/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/assets/admin/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/assets/admin/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/assets/admin/css/AdminLTE.min.css">


  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition lockscreen">
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href="/"><img src="/assets/admin/img/logo.png" alt="" width="70%"></a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name"><?=$response['nome']?></div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="/<?=$response['imagem']?>" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials" role="form" method="post" action="<?= URL_ADMIN ?>/newpassword">
      <div class="input-group">
        <input type="password" name="senha" class="form-control" placeholder="Senha" autocomplete="off">

        <div class="input-group-btn">
            <input type="hidden" name="id" value="<?=@$response['id']?>">
          <button type="submit" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
        </div>
      </div>
    </form>
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
    Digite uma nova senha para redefinir.
  </div>
  <div class="text-center">
    <a href="/">Ou faça login</a>
  </div>
  <div class="lockscreen-footer text-center">
    Copyright &copy; <?php echo date('Y'); ?> <b><a class="text-black">Smart Soluções Inteligentes LTDA.</a></b><br>
    Todos os direitos reservados.
  </div>
</div>
<!-- /.center -->

<!-- jQuery 3 -->
<script src="/assets/admin/js/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/assets/admin/js/bootstrap.min.js"></script>
</body>
</html>
