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

</head>

<body class="hold-transition skin-purple sidebar-mini">
                <?php
                     $id = $_GET['id'];
                ?>
        
<div class="wrapper">
<?php include '../../arquivos-include/menu.php';?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <small>Particular</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pagamentos</li>
        <li class="active">Particular</li>
      </ol>
    </section>

                <?php
                    require_once('../../../sistema/php/conectaBd/index.php');
                    $objDb = new db();
                    $link = $objDb->conecta_mysql();
                    $sql = " SELECT * FROM paciente WHERE idpaciente = $id";
                    $resultado_ids = mysqli_query($link, $sql);
                      if($resultado_ids){
                          while($registros = mysqli_fetch_array($resultado_ids, MYSQLI_ASSOC)){
                                $id = $registros['idpaciente'];
                                $nome = $registros['nome'];
                                $telefone = $registros['telefone'];
                                $cpf = $registros['cpf'];
                                $email = $registros['email'];
                            }
                      }else{
                                echo 'Erro na consulta dos emails no banco de dados!';
                            }                          
                          
                ?>      
      
    <section class="content container-fluid">
        <div class="box">
          <div class="box-header with-border" style="padding:15px;">
            
                <div class="container">
                    <div class="row">
                        <div class="col-md-2">
                                                        <?php  echo "<h4 class='box-title'>$nome</h4>"  ?>
                        </div>
                        <div class="col-md-3">
                                                        <?php  echo "<h4 class='box-title'>$telefone</h4>"  ?>
                        </div>
                        <div class="col-md-3">
                                                        <?php  echo "<h4 class='box-title'>$cpf</h4>"  ?>
                        </div>     
                        <div class="col-md-3">
                                                        <?php  echo "<h4 class='box-title'>$email</h4>"  ?>
                        </div>                        
                    </div>
                </div>
            
          </div>
  
          <div class="box-body" style="text-align:center;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                                                        <a href="pagamento.php?id=<?php echo $id ?>">
                                                            Pagamento de Consultas
                                                        </a>
                        </div>
                        <div class="col-md-6">
                                                        <a href="historico.php?id=<?php echo $id ?>">
                                                            Histórico de Consultas
                                                        </a>                              
                        </div>

                </div>
                </div>
        </div>  
            

    </div>
            
</section>
      
      
      
  </div>
      <!-- /.row -->

  <?php include '../../arquivos-include/rodape.php';?>
</div>
<?php include '../../arquivos-include/jquery.php';?>


    
    


</body>
</html>
