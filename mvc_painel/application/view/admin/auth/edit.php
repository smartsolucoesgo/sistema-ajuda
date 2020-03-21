<?php
$title = '';
$css = [
    '',
];
$script = [
    'assets/admin/js/plugins/maskedinput/jquery.maskedinput.min.js',
];
require APP . 'view/admin/_templates/initFile.php';
?>


 <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Meus Dados
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= URL_ADMIN ?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Meus Dados</li>
      </ol>
    </section>
    

<section class="content">

<div class="row">
  <div class="col-md-3">
    <div class="box box-primary">
      <div class="box-body box-profile">
        <img class="profile-user-img img-responsive img-circle" src="<?=$response['imagem']?>" alt="User profile picture">

        <h3 class="profile-username text-center"><?=$response['nome']?></h3>

        <p class="text-muted text-center"><?=$response['acesso']?></p>

        <ul class="list-group list-group-unbordered">
          <li class="list-group-item">
            <b>Solicitações de Ajuda</b> <a class="pull-right">0</a>
          </li>
          <li class="list-group-item">
            <b>Ajudas Realizadas</b> <a class="pull-right">0</a>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <!-- /.col -->
  <div class="col-md-9">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#settings" data-toggle="tab">Dados</a></li>
      </ul>
      <div class="tab-content">


        <div class="active tab-pane" id="settings">
          <form class="form-horizontal" role="form" method="post" action="<?= URL_ADMIN ?>/account/save" enctype="multipart/form-data">
            <div class="form-group">
              <label class="col-sm-2 control-label">Nome Completo</label>

              <div class="col-sm-10">
                <input type="text" name="nome" class="form-control" placeholder="Nome Completo" value="<?= isset($response['nome']) ? $response['nome'] : '' ?>" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Foto / Imagem</label>

              <div class="col-sm-10">
                <input type="file" name="imagem" placeholder="" class="form-control" value="ahahha" accept="image/*">
                <p class="help-block">Escolha uma imagem e altere sua foto caso deseje.</p>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">E-mail</label>

              <div class="col-sm-10">
                <input type="email" name="email" class="form-control" placeholder="E-mail" value="<?= isset($response['email']) ? $response['email'] : '' ?>" readonly>
                <small><b style="color:red;">*</b> caso estiver errado, mande um e-mail para: <b style="color:#;">joaopaulo@smartsolucoesinteligentes.com.br</b> solicitando a troca.</small>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Telefone</label>

              <div class="col-sm-10">
                <input type="tel" name="telefone" class="form-control telefone" placeholder="Telefone" value="<?= isset($response['telefone']) ? $response['telefone'] : '' ?>" readonly>
                <small><b style="color:red;">*</b> caso estiver errado, mande um e-mail para: <b style="color:#;">joaopaulo@smartsolucoesinteligentes.com.br</b> solicitando a troca.</small>
              </div>
            </div>
            <div class="form-group">
              <label for="inputExperience" class="col-sm-2 control-label">Senha</label>

              <div class="col-sm-10">
                <input type="password" name="senha" placeholder="" class="form-control" value="" autocomplete="new-password">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Condominio</label>

              <div class="col-sm-10">
                <select name="id_condominio" class="form-control">
                    <option value="">-- SELECIONE O CONDOMINIO --</option>
                    <?php
                        foreach ($response['condominio'] as $item) {
                            $selected = (@$response['id_condominio'] == $item['id'] ? 'SELECTED' : '');
                            echo '<option value="' . $item['id'] . '" ' . $selected . '>' . $item['nome'] . '</option>';
                        }
                    ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Bloco / Torre</label>

              <div class="col-sm-10">
                <input type="text" name="bloco_torre" class="form-control" placeholder="Bloco / Torre" value="<?= isset($response['bloco_torre']) ? $response['bloco_torre'] : '' ?>" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Apartamento / Casa</label>

              <div class="col-sm-10">
                <input type="text" name="apto_casa" class="form-control" placeholder="Apartamento / Casa" value="<?= isset($response['apto_casa']) ? $response['apto_casa'] : '' ?>" required>
              </div>
            </div>
            
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success">Atualizar Dados</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

</section>
</div>




<script>

$('.telefone').mask("(99) 99999-9999?9").focusout(function (event) {
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

<?php
require APP . 'view/admin/_templates/endFile.php';
?>