<div class="wrapper">

  <!-- Main Header -->
<header class="main-header">

  <!-- Cabeçalho da página -->
     <!-- Logo -->
    <a href="../../usuarios/pacientes/index.php" class="logo">
      <img src="../../../strategos.png" style="height: 100%;" >
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
              <img src="../../../strategos.png" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="../../../strategos.png" class="img-circle" alt="User Image">

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
        <img src="../../../strategos.png" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Nome</p>
        <!--<p><?= $_SESSION['nome'] ?></p>-->
      </div>
    </div>
    <!-- /.search form -->

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <li><a href="../../salas/salas/index.php"><i class="fa fa-user"></i> <span>Clientes</span></a></li>
      <li><a href="../../salas/salas/index.php"><i class="fa fa-home"></i> <span>Funcionários</span></a></li>        
      <li class="treeview">
        <a href="#"><i class="fa fa-list"></i> <span>Documentos</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
        <ul class="treeview-menu">
          <li><a href="../../relatorios/pagamentos/index.php">Última leitura do DOU</a></li>
           <li><a href="../../relatorios/indicadores/">Leituras do DOU</a></li>
        </ul>
      </li>      
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>