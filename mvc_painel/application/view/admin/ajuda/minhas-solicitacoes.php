<?php
$title = '';
$css = [
    'assets/admin/css/plugins/datatables.net-bs/dataTables.bootstrap.min.css',
    'assets/admin/css/plugins/sweetalert/sweetalert.css',
];
$script = [
    'assets/admin/js/plugins/datatables.net/jquery.dataTables.min.js',
    'assets/admin/js/plugins/datatables.net-bs/dataTables.bootstrap.min.js',
    'assets/admin/js/plugins/sweetalert/sweetalert.min.js',
];
require APP . 'view/admin/_templates/initFile.php';
?>

<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Minhas Solicitações 
        <small>Lista de Solicitações de Ajuda</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= URL_ADMIN ?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Solicitações de Ajuda</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

    <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lista de Solicitações de Ajuda</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped dataTables-example">
                <thead>
                <tr>
                  <th>Nome</th>
                  <th>Bloco / Torre</th>
                  <th>Casa / Apartamento</th>
                  <th>Nível</th>
                  <th>Solicitação</th>
                  <?php if(@$_SESSION['acesso'] == 'Administrador') { ?>
                  <th>Acesso</th>
                  <th width="100">Condominio</th>
                  <th>Situação</th>
                  <?php } ?>
                  <th>Detalhes</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    foreach ((array)$response['ajuda'] as $item) {
                    echo '<tr class="gradeX">';
                    echo '<td>' . $item['nome'] . '</td>';
                    echo '<td>' . $item['bloco_torre'] . '</td>';
                    echo '<td>' . $item['apto_casa'] . '</td>';
                    if($item['grau'] == 'Baixo') {
                        echo '<td><small class="label label-success">Baixo</small></td>';
                    } else if($item['grau'] == 'Medio') {
                        echo '<td><small class="label label-info">Médio</small></td>';
                    } else {
                        echo '<td><small class="label label-danger">Urgente</small></td>';
                    }                    
                    echo '<td>' . mb_strimwidth($item['solicitacao'], 0, 20, "...") . '</td>';
                    if(@$_SESSION['acesso'] == 'Administrador') {
                        echo '<td>' . $item['acesso'] . '</td>';
                        echo '<td>' . $item['condominio'] . '</td>';
                        if($item['situacao'] == 'Aguardando Ajuda') {
                            echo '<td><small class="label label-warning">Aguardando Ajuda</small></td>';
                        } else if($item['situacao'] == 'Sendo Ajudada') {
                            echo '<td><small class="label label-primary">Sendo Ajudada</small></td>';
                        } else if($item['situacao'] == 'Ajudada') {
                            echo '<td><small class="label label-success">Ajuda Concluida</small></td>';
                        }
                      }
                      echo '<td><a href="'. URL_ADMIN .'/ajuda-detalhes/'. $item['id'] .'"><small class="label label-primary"><i class="fa fa-search-plus"></i> Ver detalhes</small></a></td>';
                    echo '</tr>';
                    }
                    ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>


    </section>
  </div>

  <script>
  $(function () {
    $('#example1').DataTable(
        {
        pageLength: 10,
        responsive: true,
        dom: '<"html5buttons"B>Tfgitlp',
        buttons: [
            {extend: 'excel', title: '<?=APP_TITLE?>'},
            {extend: 'pdf', title: '<?=APP_TITLE?>'},

            {extend: 'print',
                customize: function (win){
                    $(win.document.body).addClass('white-bg');
                    $(win.document.body).css('font-size', '10px');

                    $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit');
                }
            }
        ],
        language: {
            "url": "/assets/admin/js/plugins/i18n/Portuguese-Brasil.json"
        }
    }
    )

  })



  
</script>

<?php
require APP . 'view/admin/_templates/endFile.php';
?>