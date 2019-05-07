<div class="wrapper">

  <!-- Main Header -->
<header class="main-header">

  <!-- Cabeçalho da página -->
     <!-- Logo -->
    <a href="../index.php" class="logo">
      <img src="../strategos.png" style="height: 100%;" >
    </a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only"></span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="../../../sistema/adminlte/dist/img/avatar5.png" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="../../../sistema/adminlte/dist/img/avatar5.png" class="img-circle" alt="User Image">

                <p>
                  <small>Sistema Strategos</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="alterar.php" class="btn btn-default btn-flat">Alterar Senha</a>
                </div>
              </li>
              <li class="user-footer">
                <div class="pull-right">
                  <a href="../../../sistema/php/validar_acesso/sair.php" class="btn btn-default btn-flat">Sair</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
</header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="../../../sistema/adminlte/dist/img/avatar5.png" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <!-- <p><?= $_SESSION['nome'] ?></p> -->
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- /.search form -->

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MENU</li>
      <li><a href="../../agenda/agenda/index.php?terapeuta="><i class="fa fa-calendar"></i> <span>Agenda</span></a></li>
      <li class="treeview">
      <li><a href="../../salas/salas/index.php"><i class="fa fa-home"></i> <span>Mapa de Salas</span></a></li>
      <li class="treeview">
        <a href="#"><i class="fa fa-user-plus"></i> <span>Usuário</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
        <ul class="treeview-menu">
          <li><a href="../../usuarios/pacientes/index.php">Paciente</a></li>
          <li><a href="../../usuarios/funcionarios/index.php">Funcionários(as)</a></li>
          <li><a href="../../usuarios/profissionais/index.php">Profissionais</a></li>
        </ul> <!--Parte de Usuários-->
      </li>
      <!--
                    <li class="treeview">
                    <a href="#"><i class="fa fa-money"></i> <span>Pagamentos</span>
                          <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                          </span>
                        </a>
                    <ul class="treeview-menu">
                      <li><a href="../../pagamento/convenio/index.php">Convênio</a></li>
                      <li><a href="../../pagamento/particular/index.php">Particular</a></li>
                    </ul>
                    </li>
        
    -->    
        
      <li class="treeview">
        <a href="#"><i class="fa fa-money"></i> <span>Convênio</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
        <ul class="treeview-menu">
          <li><a href="../../usuarios/operadoras/index.php">Cadastro</a></li>
          <li><a href="../../usuarios/valores/index.php">Valores</a></li>
          <li><a href="../../guia/busca/index.php">Guias</a></li>
          <li><a href="../../guia/lote/index.php">Fechar Lote</a></li>
          <li><a href="../../guia/lote/gerenciar.php">Gerenciar Lote</a></li>
          <li><a href="../guia/busca/index.php">Acompanhamento</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-money"></i> <span>Particular</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
        <ul class="treeview-menu">
          <li><a href="../../pagamento/particular/index.php">Particular</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#"><i class="fa fa-list"></i> <span>Relatórios</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
        <ul class="treeview-menu">
          <li><a href="../../relatorios/pagamentos/index.php">Pagamento de profissionais</a></li>
           <li><a href="../../relatorios/indicadores/">Indicadores</a></li>
          <li><a href="../../relatorios/receitas/">Receitas</a></li>
          <li><a href="../../guia/busca/index.php">Configurações do Sistema </a></li>
        </ul>
      </li>        
        
        <!--
              <li class="treeview">
                <a href="#"><i class="fa fa-list"></i> <span>Convênio</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                <ul class="treeview-menu">
                  <li><a href="../../usuarios/operadoras/index.php">Operadora</a></li>
                   <li><a href="../../usuarios/valores/index.php">Valores</a></li>
                  <li><a href="../../guia/busca/index.php">Guias</a></li>
                </ul>
              </li>
        -->
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
