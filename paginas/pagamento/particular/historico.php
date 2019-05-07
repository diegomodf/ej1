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
  
          <div class="box-body with-border" style="text-align:center;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                                                        <a href="pagamento.php?id=<?php echo $id ?>">
                                                            Pagamento de Consultas
                                                        </a>
                        </div>
                        <div class="col-md-6">
                                                        <a href="historico.php?id= <?php echo $id ?>">
                                                            Histórico de Consultas
                                                        </a>                              
                        </div>

                </div>
                </div>
        </div> 

                <table id="tabela" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="text-align: center">Dia</th>
                  <th style="text-align: center">Inicio</th>
                  <th style="text-align: center">Fim</th>
                  <th style="text-align: center">Especialidade</th>
                  <th style="text-align: center">Profissional</th>
                  <th style="text-align: center">Valor</th>
                  <th style="text-align: center">Pago</th>
                </tr>
                </thead>
                


            
            
            
            
            <?php             
                $sql_consulta = " SELECT * FROM consultas WHERE cpf_paciente = '$cpf'";
                $resultado_consulta = mysqli_query($link, $sql_consulta);

                  if($resultado_consulta){                             
                      while($registros1 = mysqli_fetch_array($resultado_consulta, MYSQLI_ASSOC)){
                            //$terapeuta = $registros1['nome_terapeuta'];
                            $dia = $registros1['inicio'];
                            $dia1 = strtotime($dia);
                          
                            $inicio = $registros1['inicio'];
                            $inicio1 = strtotime($inicio);
                          
                            $fim = $registros1['termino'];
                            $fim1 = strtotime($fim);
                          
                            $status = $registros1['status_pagamento'];
                            $especialidade = $registros1['especialidade_profissional'];
                            $profissional = $registros1['nome_profissional'];
                            $valor = $registros1['valor'];
                            $valor_pago = $registros1['valor_pago'];
                            if($valor == $valor_pago){
                                $pago = '1';
                            }else{
                                $pago = 0;
                            }
                          
                            echo "<tbody>";
                            echo "<tr>";
                              if($pago == 1){
                                echo "<tr>"; 
                              }else{
                                echo "<tr bgcolor='FFAAAA'>";                         
                              }

                            echo "<td style='text-align:center;'>";
                                                      echo date('d/m', $dia1);
                            echo "</td>";
                            echo "<td style='text-align:center;'>";
                                                      echo date('H:i', $inicio1);
                            echo "</td>";
                            echo "<td style='text-align:center;'>";
                                                      echo date('H:i', $fim1);
                            echo "</td>";
                            echo "<td style='text-align:center;'> Especialidade </td>";
                            echo "<td style='text-align:center;'> $profissional </td>";
                            echo "<td style='text-align:center;'> $valor </td>";
                            echo "<td style='text-align:center;'> $valor_pago </td>";
                            echo "</tr>" ;  
                            
            
                            
                            
                            echo "</tbody>";

                          
                   
                          
                          
                       
                        }
                  }else{
                            echo 'Eskahsiahsiahsiarro na consulta dos emails no banco de dados!';
                        }

            ?>
            
            
            </table>
                  

                
    </div>
            
</section>
      
      
      
  </div>
      <!-- /.row -->

  <?php include '../../arquivos-include/rodape.php';?>
</div>
<?php include '../../arquivos-include/jquery.php';?>


    
    


</body>
</html>
