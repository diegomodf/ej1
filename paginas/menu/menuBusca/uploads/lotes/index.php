<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistema Clifops</title>
  <link rel="stylesheet" href="../../../../sistema/adminlte/plugins/iCheck/square/blue.css">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../../../../../sistema/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../../../../sistema/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../../../../sistema/adminlte/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../../../../../sistema/adminlte/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../../../../../sistema/adminlte/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style>
  select {
    width: 100%;
    padding: 4px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }
  </style>

  <script type="text/javascript" >
  </script>
</head>

<body class="hold-transition skin-purple sidebar-mini">

    <div class="wrapper">


            <?php
            include('../../../menuLateral/head/index.php');
            ?>


<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="../../../../sistema/adminlte/dist/img/avatar5.png" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Alexander Pierce</p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- /.search form -->

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MENU</li>
      <li class=""><a href="../../menuPrincipal/principal/index.php"><i class="fa fa-play"></i> <span>Início</span></a></li>
      <!-- Optionally, you can add icons to the links -->
      <li><a href="../../../agenda/"><i class="fa fa-calendar"></i> <span>Agenda</span></a></li>
      <li class="treeview active">
        <a href="#"><i class="fa fa-user-plus"></i> <span>Cadastro</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
        <ul class="treeview-menu">
          <li><a href="../../../menuCadastro/paciente/index.php">Paciente</a></li>
          <li><a href="../../../menuCadastro/profissional/index.php">Profissional</a></li>
          <li><a href="../../../menuCadastro/convenio/index.php">Convênio</a></li>
          <li><a href="../../../menuCadastro/funcionario/index.php">Funcionário</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-list"></i> <span>Guias</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
        <ul class="treeview-menu">
          <li><a href="../../../menuCadastro/guias/index.php">Cadastro</a></li>
          <li><a href="../../../menuBusca/guias/">Busca</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-money"></i> <span>Controle</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
        <ul class="treeview-menu">
          <li><a href="../../../../menu/menuCadastro/upload/index.php">Uploads</a></li>
          <li><a href="../../../../menu/menuBusca/uploads/pagamentos/index.php">Pagamentos</a></li>
          <li><a href="../../../../menu/menuBusca/uploads/lotes/index.php">Lotes</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-cogs"></i> <span>Configurações</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
        <ul class="treeview-menu">
          <li><a href="../../../../menu/menuBusca/paciente/">Paciente</a></li>
          <li><a href="../../../../menu/menuBusca/profissional">Profissional</a></li>
          <li><a href="../../../../menu/menuBusca/convenio">Convênio</a></li>
          <li><a href="../../../../menu/menuBusca/funcionario">Funcionário</a></li>
        </ul>
      </li>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>

          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <h1>
                <small>Gerencie os seus Funcionários</small>
              </h1>
              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Controle</li>
                <li class="active">Lotes</li>
              </ol>
            </section>
              
                    <section class="content container-fluid">
                        <div class="box">
                          <div class="box-header with-border" style="padding:15px;">
                            <h3 class="box-title">Arquivos de Pagamento</h3>     
                            <!-- /.box-tools -->
                          </div>
                              <div class="box-body">
                              <table id="tabela" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>
                                    Contador
                                    </th>
                                  <th>Numero de registros</th>
                                  <th>Mês do lote</th>
                                  <th>Visualizar</th>
                                  <th>Editar</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        require_once('../../../../../sistema/php/conectaBd/index.php');
                                        $objDb = new db();
                                    $aux = 1;
                                        $link = $objDb->conecta_mysql();
                                        $sql = " SELECT * FROM pagamentos";
                                        $resultado_ids = mysqli_query($link, $sql);
                                          if($resultado_ids){
                                              while($registros = mysqli_fetch_array($resultado_ids, MYSQLI_ASSOC)){
                                                      $id = $registros['id'];
                                                      $numero = $registros['numero_guia'];
                                                      $mes = $registros['mes'];
                                                        $aux = $aux + 1;
                                                      echo '<tr>';
                                                      echo "<td>  $aux <td>";
                                                      echo "<td>$numero</td>";
                                                      echo "<td> $mes </td>";
                                                      echo '<td class="mailbox-subject"><b>'.$registros['mes'].'</b></td>';
                                                      echo '</tr>';
                                                        }
                                          }else{
                                              echo 'Erro na consulta dos emails no banco de dados!';
                                            }
                                      ?>
                              </tbody>
                            </table>

                            </div>
                            <!-- /.box-body -->
                          </div>
                          <!-- /.box -->
                    </section>
        </div>

              <!-- /.row -->


          <!-- Main Footer -->
          <footer class="main-footer">

              <!-- Rodapé da pagina -->
              <!-- To the right -->
            <div class="pull-right hidden-xs">
              EngNet Consultoria e Implementação
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2019 <a href="../../index.php">CliFops</a>.</strong> Todos os Direitos Reservados.

          </footer>
    
    </div>


    <script src="../../../../../sistema/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="../../../../../sistema/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../../../../sistema/adminlte/bower_components/jquery-ui/jquery-ui.min.js"></script>
    <script src="../../../../../sistema/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="../../../../../sistema/adminlte/bower_components/fastclick/lib/fastclick.js"></script>
    <script src="../../../../../sistema/adminlte/dist/js/adminlte.min.js"></script>
    <script src="../../../../../sistema/adminlte/dist/js/demo.js"></script>

</body>
</html>