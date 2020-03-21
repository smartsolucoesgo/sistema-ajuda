<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="<?= URL_ADMIN ?>" target="_self">

    <title><?= APP_TITLE ?></title>

    <link href="assets/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/admin/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="assets/admin/css/animate.css" rel="stylesheet">
    <link href="assets/admin/css/style.css" rel="stylesheet">
    <link href="assets/admin/css/custom.css" rel="stylesheet">

</head>

<body class="">

<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>
            <h1 class="logo-name text-center"><img src="assets/img/logo.png" class=""></h1>
        </div>
        <h3>Nova senha</h3>
        <?php
        if(@$response['error']) echo '<div class="alert alert-danger">' . $response['error'] . '</div>';
        ?>
        <form class="m-t" role="form" method="post" action="<?= URL_ADMIN ?>/newpassword">
            <div class="form-group">
                <input type="password" name="senha" class="form-control" placeholder="" required="">
            </div>
            <input type="hidden" name="id" value="<?=@$response['id']?>">
            <button type="submit" class="btn btn-primary block full-width m-b">Salvar</button>
        </form>
        <p class="m-t-md">Você será redirecionado para a página de login.</p>
    </div>
</div>

<!-- Mainly scripts -->
<script src="assets/admin/js/jquery-3.1.1.min.js"></script>
<script src="assets/admin/js/bootstrap.min.js"></script>
<script src="assets/admin/js/plugins/parsley/parsley.min.js"></script>
<script src="assets/admin/js/plugins/parsley/i18n/pt-br.js"></script>
<script>
    $('form').parsley();
</script>
</body>

</html>
