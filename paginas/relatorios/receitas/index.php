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
    <section class="content-header">
      <h1><small>Receita da empresa </small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Usuarios</li>
        <li class="active">Profissionais</li>
      </ol>
    </section>


        
    <section class="content container-fluid">
        <div class="box">
          <div class="box-header with-border" style="padding:15px;">
            <h3 class="box-title">Receitas</h3>  
            <div class="box-tools pull-right">  
            <!-- /.box-tools -->
          </div>
              <div class="box-body">
              <table id="tabela" class="table table-bordered table-striped">
                
                <?php 
                    require_once('../../../sistema/php/conectaBd/index.php');
                    $objDb = new db();
                    $link = $objDb->conecta_mysql();
                    $sql = "SELECT DISTINCT inicio FROM `consultas` ORDER BY `inicio` DESC";
                    $resultado_ids = mysqli_query($link, $sql);
                    if($resultado_ids){
                      while($registros = mysqli_fetch_array($resultado_ids, MYSQLI_ASSOC)){
                                        $dia = $registros['inicio'];
                                        $dia1 = strtotime($dia); 
                ?>  
                 
                  <h1>
                  <?php echo date('m/Y', $dia1); ?>
                  </h1>
                
                <?php
                    $sql2 = "SELECT * FROM `consultas` where inicio = $dia";
                    $resultado_ids2 = mysqli_query($link, $sql2);
                    if($resultado_ids2){
                        while($registro2 = mysqli_fetch_array($resultado_ids2, MYSQLI_ASSOC)){
                                        
                        }
                    }
                          
                          
                ?>
                  
                  
                  
                  
                  
                <?php        
                      }
                      }else{
                          echo 'Erro na consulta dos emails no banco de dados!';
                        }

                      
                      

                ?>
              
            </table>    
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