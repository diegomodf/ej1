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
    
    <?php
        $id = $_GET['id'];
    ?>
    
<div class="wrapper">
<?php include '../../arquivos-include/menu.php';?>   
  <!-- CORPO DA PÁGINA DO PROJETO!!! -->
<div class="content-wrapper">
    <section class="content-header">
      <h1><small>Gerencie os seus Profissionais</small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Usuarios</li>
        <li class="active">Profissionais</li>
      </ol>
    </section>


        
    <section class="content container-fluid">
        <div class="box">
          <div class="box-header with-border" style="padding:15px;">
            <h3 class="box-title">Editar Cadastro de Indicador</h3>  
            <div class="box-tools pull-right">
            <a href="../../cadastro/valores/index.php"><button class="btn btn-success" type="button" data-toggle="modal" data-target="#ModalAdicionar">Cadastrar Procedimento</button></a>   
            <!-- /.box-tools -->
          </div>
              <div class="box-body">
              <table id="tabela" class="table table-bordered table-striped">
                <tbody>
                <?php 
                    require_once('../../../sistema/php/conectaBd/index.php');
                    $objDb = new db();
                    $link = $objDb->conecta_mysql();
                    $sql = "SELECT * FROM indicadores WHERE idindicadores = $id";
                    $resultado_ids = mysqli_query($link, $sql);
                      if($resultado_ids){
                      while($registros = mysqli_fetch_array($resultado_ids, MYSQLI_ASSOC)){
                      $id = $registros['idindicadores'];
                      $nome = $registros['nome'];
                      $pontuacao = $registros['pontuacao'];
                      $porcentagem = $registros['porcentagem'];  
                      ?>
              <form action="../../../sistema/php/apresentaDados/indicadores/alter.php" method='POST'>
                <div class="box-body">
                    <div class="row">
                      <div class="form-group col-lg-1">
                      <h5>Id</h5>
                          <input readonly type="text" name="id" id="id" class="form-control" placeholder="id" value="<?php echo $id?>">
                      </div>
                      <div class="form-group col-lg-3">
                      <h5>Nome</h5>
                          <input disabled type="text" name="nome" class="form-control" placeholder="Nome" value="<?php echo $nome ?>">
                      </div>
                      <div class="form-group col-lg-2">
                      <h5>Pontuação</h5>
                          <input type="text" name="pontuacao" class="form-control" placeholder="pontuacao" value="<?php echo $pontuacao ?>">
                      </div>
                      <div class="form-group col-lg-2">
                      <h5>Porcentagem</h5>
                          <input  type="text" name="porcentagem" class="form-control" placeholder="porcentagem" value="<?php echo $porcentagem ?>">
                      </div>
                    </div>
                          <div class="modal-footer">    
                                  <input type="submit" class="btn btn-primary" placeholder="Atualizar consulta" name="submit">
                          </div>    
              </div>
                      </form>
                      <?php
                      echo '</tr>';
                        }
                      }else{
                          echo 'Erro na consulta dos emails no banco de dados!';
                        }
                  ?>
              </tbody>
            </table>    
            </div>

          </div>
        </div>
  </section>
</section>

    
    
    
</div>
    <?php include '../../arquivos-include/rodape.php';?>
</div>
<?php include '../../arquivos-include/jquery.php';?> 

</body>
</html>