<?php
$title = '';
$css = [
    'assets/admin/css/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
];
$script = [
    'assets/admin/js/plugins/ckeditor/ckeditor.js',
    'assets/admin/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
];
require APP . 'view/admin/_templates/initFile.php';
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Ajuda
        <small>Solicitar Ajuda</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= URL_ADMIN ?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a>Ajuda</a></li>
        <li class="active">Solicitar Ajuda</li>
      </ol>
    </section>

    <br><br><br>

    <section class="content">
      <div class="row">
        <div class="col-md-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Qual sua necessidade ?
                <small>Escreva o que precisa de ajuda.</small>
              </h3>
            </div>
            <div class="box-body pad">
            <form role="form" method="post" action="<?= URL_ADMIN ?>/solicitar" enctype="multipart/form-data">
                <textarea name="solicitacao" class="textarea" placeholder="Escreva sua necessidae" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              <br>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Grau de necessidade</label>
                    <div class="col-sm-4">
                        <select name="grau" class="form-control">
                            <option value="">-- SELECIONE --</option>
                            <option value="Baixo">Baixo</option>
                            <option value="Medio">Médio</option>
                            <option value="Urgente">Urgente</option>
                        </select>
                    </div>
                </div>
                <br><br>

                <div class="form-group">
                    <div class="col-sm-4">
                        <input type="hidden" name="id_solicitante" value="<?= $_SESSION['id_user'] ?>">
                        <input type="hidden" name="id_condominio" value="<?= $_SESSION['id_condominio'] ?>">
                      <button type="submit" class="btn btn-success">Solicitar Ajuda</button>
                      </form>
                    </div>
                </div>

            </div>
          </div>
        </div>
      </div>
    </section>
  </div>



<script>
  $(function () {

    $('.textarea').wysihtml5()
  })
</script>
    
<?php
require APP . 'view/admin/_templates/endFile.php';
?>