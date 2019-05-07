<?php
    session_start();
    if(!isset($_SESSION['nome']) || !isset($_SESSION['email']) || !isset($_SESSION['funcao'])){
        header('Location: ../../../index.php?erro=1');    
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
      <?php include '../../arquivos-include/head.php';?>
</head> 
    
    
<body class="hold-transition skin-purple sidebar-mini">
<div class="wrapper">
    <?php include '../../arquivos-include/menu.php';?>   
  <!-- CORPO DA PÁGINA DO PROJETO!!! -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><small>Gerencie os seus Funcionários</small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Usuarios</li>
        <li class="active">Funcionarios</li>
      </ol>
    </section>
  <!-- COLOQUE OS ARQUIVOS DA PÁGINA DO PROJETO AQUI!!! -->
    <section class="content container-fluid">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
          Upar arquivos
        </button>
            
    </section>
</div>
    <?php include '../../arquivos-include/rodape.php';?>
</div>
    
        
    <!-- MODAL DE UPAR O EXCEL NO BANCO DE DADOS -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLongTitle">Upar Arquivos</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                    <form method="POST" action="../../../../sistema/php/apresentaDados/upload/index.php" enctype="multipart/form-data">
                        <!--<h3 class="title">Upload Excel</h3>-->
                        <label class="subtitle">Arquivo:</label>
                        <input class="btn btn-secondary form-control" type="file" name="arquivo">
                        <br>
                        <input type="date" name="mes">
                        <input class="btn btn-primary" type="submit" value="Enviar">
                    </form>
      </div>

    </div>
  </div>
</div>
<?php include '../../arquivos-include/jquery.php';?>
</body>
</html>
