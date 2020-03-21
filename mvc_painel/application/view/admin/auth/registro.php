<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= APP_TITLE ?> | Criar Conta</title>
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
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <img src="/assets/admin/img/logo.png" alt="" width="70%">
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>

    <form class="m-t" role="form" method="post" action="<?= URL_ADMIN ?>/cadastrar">

    <?php if(@$response['erro']) echo '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $response['erro'] . '</div>';?>
    
      <div class="form-group has-feedback">
        <input type="text" name="nome" class="form-control" placeholder="Nome Completo">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="tel" name="telefone" class="form-control telefone" placeholder="Telefone">
        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="senha" class="form-control" placeholder="Senha">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <select name="id_condominio" class="form-control">
            <option value="">-- SELECIONE O CONDOMINIO --</option>
            <?php
                foreach ($response['condominio'] as $item) {
                    echo '<option value="' . $item['id'] . '">' . $item['nome'] . '</option>';
                }
            ?>
        </select>
      </div>
      <div class="form-group has-feedback">
        <input type="text" name="bloco_torre" class="form-control" placeholder="Bloco / Torre">
        <span class="glyphicon glyphicon-film form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="tel" name="apto_casa" class="form-control" placeholder="Apartamento / Casa">
        <span class="glyphicon glyphicon-home form-control-feedback"></span>
      </div>
      
      <div class="row">
        <div class="col-xs-8">
          
        </div>
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Criar Conta</button>
        </div>
      </div>
    </form>


    <a href="/" class="text-center">Já possui conta ? Faça login</a>
  </div>
</div>

<!-- jQuery 3 -->
<script src="/assets/admin/js/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/assets/admin/js/bootstrap.min.js"></script>
<!-- iCheck -->
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
