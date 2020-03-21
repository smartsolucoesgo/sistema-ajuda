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
        Usuários 
        <small>Lista de Usuários</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= URL_ADMIN ?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Usuários</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

    <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lista de Usuários Cadastrados</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped dataTables-example">
                <thead>
                <tr>
                  <th>Nome</th>
                  <th>Tipo</th>
                  <th>Torre / Bloco</th>
                  <th>Apartamento / Casa</th>
                  <?php if(@$_SESSION['acesso'] == 'Administrador') { ?>
                  <th>Condominio</th>
                  <th width="100">Ações</th>
                  <?php } ?>
                </tr>
                </thead>
                <tbody>
                <?php
                    foreach ((array)$response as $item) {
                    echo '<tr class="gradeX">';
                    echo '<td>' . $item['nome'] . '</td>';
                    echo '<td>' . $item['acesso'] . '</td>';                    
                    echo '<td>' . $item['bloco_torre'] . '</td>';
                    echo '<td>' . $item['apto_casa'] . '</td>';
                    if(@$_SESSION['acesso'] == 'Administrador') {
                      echo '<td>' . $item['condominio'] . '</td>';
                    echo '<td class="text-center">';
                        echo '<a class="btn btn-primary btn-xs" href="' . URL_ADMIN . '/usuario/editar/' . $item['id'] . '"><i class="fa fa-edit"></i> Editar</a> ';
                        echo '<a class="btn btn-danger btn-xs" onClick="aviso(' .$item['id']. ')"  id="remover"><i class="fa  fa-ban"></i> Excluir</a></td>';
                      }
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

  function aviso(id) {
   
   swal({
       title: "Deseja realmente excluir ?",
       text: "Esta ação é irreversivél, após feita será impossivél reverter!",
       type: "warning",
       showCancelButton: true,
       confirmButtonColor: "#DD6B55",
       confirmButtonText: "Sim, quero excluir!",
       cancelButtonText: "Cancelar",
       closeOnConfirm: false,
       closeOnCancel: false },
       function(isConfirm){
           if (isConfirm) {
               swal("Excluido!", "Registro excluido com sucesso.", "success");
           location.href = 'painel/usuario/remover/'+id;
       } else {
           swal("Cancelado", "Operação cancelada pelo usuário :)", "error");
       }

   });

}

  
</script>

<?php
require APP . 'view/admin/_templates/endFile.php';
?>