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
   <link rel="stylesheet" href="../../../sistema/css/cadastro/convenio.css">
</head> 
    
    
<body class="hold-transition skin-purple sidebar-mini">
<div class="wrapper">
     
<?php include '../../arquivos-include/menu.php';?>    
  <!-- CORPO DA PÁGINA DO PROJETO!!! -->
<div class="content-wrapper">
    <section class="content-header">
      <h1><small>Mapa de Salas</small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Salas</li>
        
      </ol>
    </section>
  <!-- COLOQUE OS ARQUIVOS DA PÁGINA DO PROJETO AQUI!!! -->
    <section class="content">

        <div class="row justify-content-md-center border">
            <div class="col-xs-12">
              <div class="box">
            <div class="box-header with-border" style="padding:15px;">
            <h5 class="box-title">Cadastrar uma sala</h5>
            </div>
                <div class="box-body">
                  <form action="../../../sistema/php/apresentaDados/salas/insert.php" method="POST">
                      <div class="box-body">
                        <div class="row">
                          <div class="form-group col-lg-8">
                                <h5>Nome da Sala</h5>
                                <input type="text" name= "nome-da-sala" class="form-control" placeholder="Nome da Sala" required>
                          </div>
                        </div>
                        <div class="modal-footer">
                              <a href="../salas/index.php">
                                    <input type="cancel" class="btn btn-alert" value="Cancelar" name="submit">
                              </a>
                                    <input type="submit" class="btn btn-primary" value="Cadastrar" name="submit">
                        </div>
                            <div class="row">
                            </div>
                        </div>
                  </form>
                </div>
              </div>
            </div>
        </div>
  </section>
</div>
     <?php include '../../arquivos-include/rodape.php';?>
</div>

<?php include '../../arquivos-include/jquery.php';?>


</body>
</html>