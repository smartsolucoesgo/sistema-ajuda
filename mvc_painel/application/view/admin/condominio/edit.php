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
        <?= isset($response['nome']) ? 'Condominio: ' . $response['nome'] : 'Novo condominio' ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= URL_ADMIN ?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li>Condominios</li>
        <li class="active"><?= isset($response['nome']) ? 'Condominio: ' . $response['nome'] : 'Novo condominio' ?></li>
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
          <form class="form-horizontal" role="form" method="post" action="<?= isset($response['id']) ? URL_ADMIN . '/condominio/salvar' : URL_ADMIN . '/condominio/cadastrar' ?>" enctype="multipart/form-data">
            <div class="form-group">
              <label class="col-sm-2 control-label">Nome do Condominio</label>

              <div class="col-sm-10">
                <input type="text" name="nome" class="form-control" placeholder="Nome do Condominio" value="<?= isset($response['nome']) ? $response['nome'] : '' ?>" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Endereço</label>

              <div class="col-sm-10">
                <input type="text" name="endereco" class="form-control" placeholder="Rua/Avenida" value="<?= isset($response['endereco']) ? $response['endereco'] : '' ?>" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Número</label>
              <div class="col-sm-10">
                <input type="tel" name="numero" class="form-control" placeholder="100" value="<?= isset($response['numero']) ? $response['numero'] : '' ?>" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Complemento</label>
              <div class="col-sm-10">
                <input type="text" name="complemento" class="form-control" placeholder="Complemento" value="<?= isset($response['complemento']) ? $response['complemento'] : '' ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Bairro</label>
              <div class="col-sm-10">
                <input type="text" name="bairro" class="form-control" placeholder="Setor Central" value="<?= isset($response['bairro']) ? $response['bairro'] : '' ?>" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">CEP</label>
              <div class="col-sm-10">
                <input type="text" name="cep" class="form-control" placeholder="74000-000" value="<?= isset($response['cep']) ? $response['cep'] : '' ?>" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Estado</label>
              <div class="col-sm-10">
                <select name="estado" id="estado" class="form-control" required>
                    <option value="AC">Acre</option>
                    <option value="AL">Alagoas</option>
                    <option value="AP">Amapá</option>
                    <option value="AM">Amazonas</option>
                    <option value="BA">Bahia</option>
                    <option value="CE">Ceará</option>
                    <option value="DF">Distrito Federal</option>
                    <option value="ES">Espírito Santo</option>
                    <option value="GO">Goiás</option>
                    <option value="MA">Maranhão</option>
                    <option value="MT">Mato Grosso</option>
                    <option value="MS">Mato Grosso do Sul</option>
                    <option value="MG">Minas Gerais</option>
                    <option value="PA">Pará</option>
                    <option value="PB">Paraíba</option>
                    <option value="PR">Paraná</option>
                    <option value="PE">Pernambuco</option>
                    <option value="PI">Piauí</option>
                    <option value="RJ">Rio de Janeiro</option>
                    <option value="RN">Rio Grande do Norte</option>
                    <option value="RS">Rio Grande do Sul</option>
                    <option value="RO">Rondônia</option>
                    <option value="RR">Roraima</option>
                    <option value="SC">Santa Catarina</option>
                    <option value="SP">São Paulo</option>
                    <option value="SE">Sergipe</option>
                    <option value="TO">Tocantins</option>
                </select>
                <script>$('#estado').val('<?=@($response['estado']?$response['estado']:'GO')?>')</script>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Sindico</label>
              <div class="col-sm-10">
                <select name="id_sindico" class="form-control">
                    <option value="">-- SELECIONE O SINDICO --</option>
                    <?php
                        foreach ($response['sindico'] as $item) {
                            $selected = (@$response['id_sindico'] == $item['id'] ? 'SELECTED' : '');
                            echo '<option value="' . $item['id'] . '" ' . $selected . '>' . $item['nome'] . '</option>';
                        }
                    ?>
                </select>
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
        element.mask("(99) 99999-999?9");
    } else {
        element.mask("(99) 9999-9999?9");
    }
});

</script>

<?php
require APP . 'view/admin/_templates/endFile.php';
?>