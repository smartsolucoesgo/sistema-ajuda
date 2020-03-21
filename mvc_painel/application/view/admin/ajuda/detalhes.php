<?php
$title = '';
$css = [
    '',
];
$script = [
    '',
];
require APP . 'view/admin/_templates/initFile.php';
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detalhes de Ajuda
        <small>#<?=$response['id']?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= URL_ADMIN ?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a>Ajuda</a></li>
        <li class="active">Detalhes da Ajuda</li>
      </ol>
    </section>
    <?php 
        if($response['situacao'] == 'Sendo Ajudada') { 
            echo '<div class="pad margin no-print">
            <div class="callout callout-info" style="margin-bottom: 0!important;">
              <h4><i class="fa fa-info"></i> Oba:</h4>
              '. $response['solicitante'][0]['nome_solicitante'] .', está sendo ajudada por: '. $response['solicitante'][0]['nome_ajudante'] .'.
            </div>
          </div>';
        } else if($response['situacao'] == 'Aguardando Ajuda') { 
            echo '<div class="pad margin no-print">
            <div class="callout callout-danger" style="margin-bottom: 0!important;">
              <h4><i class="fa fa-info"></i> Ops:</h4>
              '. $response['solicitante'][0]['nome_solicitante'] .', está precisando de ajuda você pode ajuda-la ?.
            </div>
          </div>';
        } else if($response['situacao'] == 'Ajudada') { 
            echo '<div class="pad margin no-print">
            <div class="callout callout-success" style="margin-bottom: 0!important;">
              <h4><i class="fa fa-info"></i> Eba:</h4>
              '. $response['solicitante'][0]['nome_solicitante'] .', foi ajudada por: '. $response['solicitante'][0]['nome_ajudante'] .'.
            </div>
          </div>'; 
        }  ?>
    

    <section class="invoice">
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Ajude o próximo.
            <small class="pull-right">Data da solicitação da ajuda: <?= \SmartSolucoes\Libs\Helper::data($response['data_cadastro']) ?></small>
          </h2>
        </div>
      </div>

      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          Solicitante
          <address>
            <strong><?=$response['solicitante'][0]['nome_solicitante']?></strong><br>
            Condominio: <?=$response['solicitante'][0]['condominio']?><br>
            Bloco / Torre: <?=$response['solicitante'][0]['bloco_torre_solicitante']?> | Apartamento / Casa: <?=$response['solicitante'][0]['apto_casa_solicitante']?><br>
            Telefone: <?=$response['solicitante'][0]['telefone_solicitante']?><br>
            Email: <?=$response['solicitante'][0]['email_solicitante']?>
          </address>
        </div>

        <div class="col-sm-4 invoice-col">
          Ajudante
          <address>
            <strong><?=@$response['solicitante'][0]['nome_ajudante']?></strong><br>
            Condominio: <?=@$response['solicitante'][0]['condominio']?><br>
            Bloco / Torre: <?=@$response['solicitante'][0]['bloco_torre_ajudante']?> | Apartamento / Casa: <?=@$response['solicitante'][0]['apto_casa_ajudante']?><br>
            Telefone: <?=@$response['solicitante'][0]['telefone_ajudante']?><br>
            Email: <?=@$response['solicitante'][0]['email_ajudante']?>
          </address>
        </div>

        <div class="col-sm-4 invoice-col">
          <b>Ajuda de número #<?=$response['id']?></b><br>
          <br>
          <b>Faça o bem</b> que o resto vem.<br>
        </div>
    
      </div>

      <div class="row">
        <div class="col-xs-12">
            <h2>Descrição da ajuda:</h2><br>
            <p><?=$response['solicitante'][0]['solicitacao']?></p>
          
            <br><br><br>
        </div>
      </div>

      


      <div class="row no-print">
        <div class="col-xs-12">
          <!-- <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</a> -->
          <?php if($response['situacao'] == 'Aguardando Ajuda') {
              echo '
                <form role="form" method="post" action="' . URL_ADMIN . '/iniciarAjuda" enctype="multipart/form-data"> 
                   <input type="hidden" name="id" value="'. $response['id'] .'">
                   <input type="hidden" name="situacao" value="Sendo Ajudada">
                   <input type="hidden" name="id_ajudante" value="'. $_SESSION['id_user'] .'">
                   <button type="submit" class="btn btn-info pull-right"><i class="fa fa-check"></i> Ajudar</button>
                </form>
              ';
          } else if($response['situacao'] == 'Sendo Ajudada') {
              if($response['id_ajudante'] == $_SESSION['id_user']) {
              echo '
              <form role="form" method="post" action="' . URL_ADMIN . '/salvarAjuda" enctype="multipart/form-data"> 
                   <input type="hidden" name="id" value="'. $response['id'] .'">
                   <input type="hidden" name="situacao" value="Ajudada">
                   <input type="hidden" name="id_ajudante" value="'. $_SESSION['id_user'] .'">
                   <button type="submit" class="btn btn-success pull-right"><i class="fa fa-check"></i> Finalizar Ajuda</button>
                </form>
              ';
          } } ?>
        </div>
      </div>
    </section>
    <div class="clearfix"></div>
  </div>

<?php
require APP . 'view/admin/_templates/endFile.php';
?>