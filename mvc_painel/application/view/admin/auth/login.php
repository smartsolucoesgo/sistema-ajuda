<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= APP_TITLE ?> | Entrar</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="/assets/admin/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/assets/admin/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/assets/admin/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/assets/admin/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="/assets/admin/plugins/iCheck/square/blue.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <img src="/assets/admin/img/logo.png" alt="" width="70%">
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Entre e peça ajuda ou ajude alguém</p>

    <form class="m-t" role="form" method="post" action="<?= URL_ADMIN ?>/login">
    
    <?php if(@$response['erro']) echo '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $response['erro'] . '</div>';?>

    <?php if(@$response['logout']) echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $response['logout'] . '</div>';?>

    <?php if(@$response['sucesso']) echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $response['sucesso'] . '</div>';?>

      <div class="form-group has-feedback">
        <input type="tel" class="form-control telefone" name="login" placeholder="Número de telefone" autocomplete="off" required>
        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="senha" class="form-control" placeholder="Senha" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">  
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <br><br>

    <a href="/forgot">Esqueceu a senha ?</a><br>
    <a href="/registrar" class="text-center">Cadastrar e ajudar alguém</a>
    <br><br>
    <small>Desenvolvido por SMART SOLUÇÕES INTELIGENTES</small>

  </div>
  <!-- /.login-box-body -->

</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="/assets/admin/js/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/assets/admin/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="/assets/admin/plugins/iCheck/icheck.min.js"></script>
<script src="/assets/admin/js/plugins/maskedinput/jquery.maskedinput.min.js"></script>
<script>

$('.telefone').mask("(99) 9999-9999?9").focusout(function (event) {
          var target, phone, element;
          target = (event.currentTarget) ? event.currentTarget : event.srcElement;
          phone = target.value.replace(/\D/g, '');
          element = $(target);
          element.unmask();
          if(phone.length > 10) {
              element.mask("(99) 99999-999?9");
          } else {
              element.mask("(99) 9999-9999?9");
          }
      });
</script>
</body>
</html>
