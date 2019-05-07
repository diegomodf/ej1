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

    <section class="content container-fluid">
        <div class="box">
          <div class="box-header with-border" style="padding:15px;">
            <h3 class="box-title">Particular</h3>  
  
          </div>
      
          
              <div class="box-body" style="text-align: center">
              <table id="tabela" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="text-align: center">Nome</th>
                  <th style="text-align: center">Telefone</th>
                  <th style="text-align: center">CPF</th>
                  <th style="text-align: center">Email</th>
                  <th style="text-align: center">Pagamentos</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    require_once('../../../sistema/php/conectaBd/index.php');
                    $objDb = new db();
                    $link = $objDb->conecta_mysql();
                    $sql = " SELECT * FROM paciente WHERE operadora = '1'";
                    $resultado_ids = mysqli_query($link, $sql);
                      if($resultado_ids){
                          while($registros = mysqli_fetch_array($resultado_ids, MYSQLI_ASSOC)){
                          $id = $registros['idpaciente'];
                          $nome = $registros['nome'];
                          $telefone = $registros['telefone'];
                          $cpf = $registros['cpf'];
                          $nome = $registros['nome'];
                          echo '<tr>';
                          echo "<td>$nome</td>";
                          echo '<td>'.$registros['telefone'].'</td>';
                          echo '<td class="mailbox-subject"><b>'.$registros['cpf'].'</b></td>';
                          echo '<td class="mailbos-subject"><b>'.$registros['email'].'</b></td>';
                          echo '<td><a href="paciente.php?id='.$id.'"><button class="fa fa-edit item_lista" class="btn btn_success" type="button"></button></a></td>';
                          echo '</tr>';
                        }                      
                      }else{
                          echo 'Erro na consulta dos emails no banco de dados!';
                        }
                ?>

              </tbody>
            </table>   
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->  
      </section>
        </div>
  </div>
      <!-- /.row -->

  <?php include '../../arquivos-include/rodape.php';?>
</div>
<?php include '../../arquivos-include/jquery.php';?>


    
    
  <script>
  $(function () {
    $('#tabela').DataTable()})
  function DataHora(evento, objeto){
        var keypress=(window.event)?event.keyCode:evento.which;
        campo = eval (objeto);
          if (campo.value == '00/00/0000 00:00:00'){
            campo.value=""
          }
          caracteres = '0123456789';
          separacao1 = '/';
          separacao2 = ' ';
          separacao3 = ':';
          conjunto1 = 2;
          conjunto2 = 5;
          conjunto3 = 10;
          conjunto4 = 13;
          conjunto5 = 16;
          if ((caracteres.search(String.fromCharCode (keypress))!=-1) && campo.value.length < (19)){
            if (campo.value.length == conjunto1 )
            campo.value = campo.value + separacao1;
            else if (campo.value.length == conjunto2)
            campo.value = campo.value + separacao1;
            else if (campo.value.length == conjunto3)
            campo.value = campo.value + separacao2;
            else if (campo.value.length == conjunto4)
            campo.value = campo.value + separacao3;
            else if (campo.value.length == conjunto5)
            campo.value = campo.value + separacao3;
          }else{
            event.returnValue = false;
          }
    }
</script>

</body>
</html>
