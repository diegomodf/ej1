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

        

                  <div class="box-body" style="text-align: center">
                      <table id="tabela" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="text-align: center">Especialidade</th>
                                    <th style="text-align: center">Nome do Profissional</th>
                                    <th style="text-align: center">Valores</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                    <?php
                        require_once('../../../sistema/php/conectaBd/index.php');
                        $objDb = new db();
                        $link = $objDb->conecta_mysql();
                        $sql1 = " SELECT cpf FROM paciente WHERE id = $id";
                        $resultado_consulta = mysqli_query($link, $sql);
                        $registro = mysqli_fetch_array($resultado_consulta, MYSQLI_ASSOC);
                        $cpf = $registro['cpf'];

                                $tam_cpf = strlen($cpf);
                                $novo_cpf = null;
                                    for($i = 0; $i < $tam_cpf; $i++){
                                            if($i == 3 || $i == 7 || $i == 11){
                                                
                                            }else{
                                             $novo_cpf .= $cpf[$i];   
                                            }

                                        }
                                

                        $sql = " SELECT DISTINCT nome_profissional FROM `consultas` WHERE cpf_paciente = '$cpf' AND status_pagamento = 'NAO'";
                        $resultado_ids = mysqli_query($link, $sql);
                         if($resultado_ids){
                              while($registros = mysqli_fetch_array($resultado_ids, MYSQLI_ASSOC)){
                                    $nome = $registros['nome_profissional'];
                                    //$especialidade = $registros['especialidade_profissional'];
                                    echo '<tr>';
                                    echo '<td>Especialidade</td>';
                                    echo "<td> $nome </td>";
                                    echo '<td><a href="pagamento_profissional.php?id='.$id.'&profissional='.$nome.'"><button class="fa fa-edit item_lista" class="btn btn_success" type="button"></button></a></td>';
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

      </section>
            
    </div>
            

      
      
      
  </div>
      <!-- /.row -->

  <?php include '../../arquivos-include/rodape.php';?>
</div>
<?php include '../../arquivos-include/jquery.php';?>


    
    


</body>
</html>
