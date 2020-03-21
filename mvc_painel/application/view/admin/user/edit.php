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
        <?= isset($response['nome']) ? 'Usuário: ' . $response['nome'] : 'Novo usuário' ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= URL_ADMIN ?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li>Usuários</li>
        <li class="active"><?= isset($response['nome']) ? 'Usuário: ' . $response['nome'] : 'Novo usuário' ?></li>
      </ol>
    </section>

    <section class="content">

<div class="row">
  <!-- /.col -->
  <div class="col-md-12">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#settings" data-toggle="tab">Dados</a></li>
      </ul>
      <div class="tab-content">


        <div class="active tab-pane" id="settings">
          <form class="form-horizontal" role="form" method="post" action="<?= isset($response['id']) ? URL_ADMIN . '/usuario/salvar' : URL_ADMIN . '/usuario/cadastrar' ?>" enctype="multipart/form-data">
          <?php if(@$_SESSION['acesso'] == 'Administrador') { ?>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label">Acesso</label>
                    <div class="col-sm-10">
                        <select name="acesso" id="acesso" class="form-control">
                            <option value="Administrador">Administrador</option>
                            <option value="Sindico">Sindico</option>
                            <option value="Morador">Morador</option>
                        </select>
                        <script>$('#acesso').val('<?=@($response['acesso']?$response['acesso']:'Morador')?>')</script>
                    </div>
                </div>
            <?php } ?>
            <div class="form-group">
              <label class="col-sm-2 control-label">Nome do completo</label>

              <div class="col-sm-10">
                <input type="text" name="nome" class="form-control" placeholder="Nome do Condominio" value="<?= isset($response['nome']) ? $response['nome'] : '' ?>" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Condominio</label>
              <div class="col-sm-10">
                <select name="id_condominio" id="id_condominio" class="form-control">
                    <option value="">-- SELECIONE O CONDOMINIO --</option>
                    <?php
                        foreach ($response['condominio'] as $item) {
                            echo '<option value="' . $item['id'] . '">' . $item['nome'] . '</option>';
                        }
                    ?>
                </select>
                <script>$('#id_condominio').val('<?=@($response['id_condominio']?$response['id_condominio']:'')?>')</script>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Bloco / Torre</label>
              <div class="col-sm-10">
                <input type="text" name="bloco_torre" class="form-control" placeholder="Bloco/Torre" value="<?= isset($response['bloco_torre']) ? $response['bloco_torre'] : '' ?>" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Apartamento / Casa</label>
              <div class="col-sm-10">
                <input type="tel" name="apto_casa" class="form-control" placeholder="100" value="<?= isset($response['apto_casa']) ? $response['apto_casa'] : '' ?>" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">E-mail</label>
              <div class="col-sm-10">
                <input type="email" name="email" class="form-control" placeholder="E-mail" value="<?= isset($response['email']) ? $response['email'] : '' ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Telefone</label>
              <div class="col-sm-10">
                <input type="tel" name="telefone" class="form-control telefone" placeholder="(62) 99999-9999" value="<?= isset($response['telefone']) ? $response['telefone'] : '' ?>" required>
              </div>
            </div>         

            
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
              <input type="hidden" name="id" value="<?= isset($response['id']) ? $response['id'] : '' ?>">
                <button type="submit" class="btn btn-success">Salvar</button>
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
        element.mask("(99) 9999-999?9");
    } else {
        element.mask("(99) 9999-999?9");
    }
});

</script>

<?php
require APP . 'view/admin/_templates/endFile.php';
?>