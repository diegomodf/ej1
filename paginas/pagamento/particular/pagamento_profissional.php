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
                     $profissional = $_GET['profissional'];
                    
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

              <div class="box-header  with-border" style="text-align:center;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-5">
                                                            <a class="nav-link active" href="pagamento.php?id=<?php echo $id ?>">
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

        

                  <div class="box-body " style="text-align: center">
 
                      <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <?php echo $profissional ?>
                            </div>
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-3">
                            </div>
                        </div>
                      </div>
                      
                      <?php
                            require_once('../../../sistema/php/conectaBd/index.php');
                            $objDb = new db();
                            $link = $objDb->conecta_mysql();
                            $sql = "SELECT * FROM consultas WHERE nome_paciente = '$nome' AND nome_profissional = '$profissional' AND status_pagamento = 'NAO'";
                            $resultado_ids = mysqli_query($link, $sql);
                              if($resultado_ids){
                                  while($registros = mysqli_fetch_array($resultado_ids, MYSQLI_ASSOC)){
                                        $idconsulta = $registros['idconsultas'];
                                      
                                        $dia = $registros['inicio'];
                                        $dia1 = strtotime($dia);    
                                        
                                        $inicio = $registros['inicio'];
                                        $inicio1 = strtotime($inicio);
                                      
                                        $fim = $registros['termino'];
                                        $fim1 = strtotime($fim);
                                        
                                        $valor = $registros['valor'];    
                      ?>                      
              <form action="../../../sistema/php/apresentaDados/consultas/update.php?id='<?php echo $id ?>'&profissional=<?= profissional?>" method='GET'>
                <div class="box-body">
                    <div class="row">
                      <div class="form-group col-lg-2">
                      <h5>Dia</h5>
                          <input disabled type="text" name="diaconsulta" id="diaconsulta" class="form-control" placeholder="Nome" value="<?php echo date('d/m/y', $dia1); ?> " >
                      </div>
                      <div class="form-group col-lg-1">
                      <h5>Inicio</h5>
                          <input disabled type="text" name="inicioconsulta" class="form-control" placeholder="Nome" value="<?php echo date('H:i',$inicio1); ?>">
                      </div>
                      <div class="form-group col-lg-1">
                      <h5>Fim</h5>
                          <input disabled type="text" name="fimconsulta" class="form-control" placeholder="Nome" value="<?php echo date('H:i',$fim1); ?>">
                      </div>
                      <div class="form-group col-lg-1">
                      <h5>Valor</h5>
                          <input readonly type="text" name="valorconsulta" class="form-control" placeholder="Nome" value="<?php echo $valor ?>">
                      </div>
                      <div class="form-group col-lg-2">
                            <h5>Pagamento</h5>
                            <select class="form-control" name="forma_pagamento" id="estado_civil" required>
                              <option value="">Selecione...</option>                      
                              <option value="Dinheiro">Dinheiro</option>
                              <option value="Cartão">Cartão</option>
                              <option value="Cheque">Cheque</option>
                              <option value="Transferência">Transferência</option>
                            </select>
                      </div>
                      <div class="form-group col-lg-2">
                      <h5>Informações adicionais</h5>
                          <input type="text" name= "info1" class="form-control" placeholder="Nome" required>
                      </div>
                      <div class="form-group col-lg-2">
                      <h5>Informações adicionais</h5>
                          <input type="text" name= "info2" class="form-control" placeholder="Nome" >
                      </div>
                      <div class="form-group col-lg-1">
                      <h5>Id</h5>
                          <input readonly type="text" name="idconsulta" id="idconsulta" class="form-control" value="<?php echo $idconsulta ?>" >
                      </div>
                    </div>
                  <div class="modal-footer">
                            <input type="hidden" name="id" class="form-control" value="<?php echo $id ?>">
                            <input type="hidden" name="profissional" class="form-control" value="<?php echo $profissional ?>">
                          <input type="submit" class="btn btn-primary" placeholder="Atualizar consulta" name="submit">
                  </div>
              </div>
                      </form>
                    <?php 
                                    }
                              }else{
                                        echo 'Erro na consulta dos emails no banco de dados!';
                                    } 
                      ?>
                  </div>

            </div> 
                  </section>
    </div>
            

      
      
      
  </div>
      <!-- /.row -->

  <?php include '../../arquivos-include/rodape.php';?>
</div>
<?php include '../../arquivos-include/jquery.php';?>


    
    


</body>
</html>
