<?php
$title = '';
$css = [
];
$script = [
];
require APP . 'view/admin/_templates/initFile.php';
?>

 <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Dashboard 
        <small>Painel de Controle</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= URL_ADMIN ?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

    <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?=$response['aguardando-ajuda'][0]['count(id)']?></h3>

              <p>Solicitação de Ajuda</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="<?= URL_ADMIN ?>/ajudar" class="small-box-footer">Ajudar <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-red">
            <div class="inner">
              <h3>Ajuda</h3>
              <p>Solicitar Ajuda</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-alert"></i>
            </div>
            <a href="<?= URL_ADMIN ?>/solicitar-ajuda" class="small-box-footer">Solicitar Ajuda <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?=$response['usuarios'][0]['count(id)']?></h3>

              <p>Pessoas Cadastradas</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="<?= URL_ADMIN ?>/usuario" class="small-box-footer">Ver Vizinhos <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?=$response['ajuda-concluida'][0]['count(id)']?></h3>

              <p>Ajudas Concluidas</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-checkmark-circle"></i>
            </div>
            <a href="<?= URL_ADMIN ?>/concluidas" class="small-box-footer">Ver Ajudas <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?=$response['ajuda-andamento'][0]['count(id)']?></h3>

              <p>Ajudas em Andamento</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-contacts"></i>
            </div>
            <a href="<?= URL_ADMIN ?>/andamento" class="small-box-footer">Ver Condominios <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?=$response['condominios'][0]['count(id)']?></h3>

              <p>Condominios Participantes</p>
            </div>
            <div class="icon">
              <i class="ion ion-home"></i>
            </div>
            <a href="<?= URL_ADMIN ?>/condominio" class="small-box-footer">Ver Condominios <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

       
        


    </div>

    </section>
  </div>
<script>

</script>

<?php
require APP . 'view/admin/_templates/endFile.php';
?>
