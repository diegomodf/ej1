<?php
    session_start();
    if(!isset($_SESSION['nome']) || !isset($_SESSION['email'])){
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
        
      </h1>
      <!--<ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Calendario</li>
      </ol>-->
    </section>
  
    <section class="content">

        <div class="row justify-content-md-center border">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border" style="padding:15px;">
            <h5 class="box-title">Cadastrar Nova Leitura de DOU</h5>
              <!-- /.box-tools -->
            </div> 
            <!-- /.box-header -->
              <form action="../../../sistema/php/apresentaDados/dou/insert.php" method="POST" enctype="multipart/form-data">
              <div class="box-body">
                <div class="row">
                  <div class="form-group col-lg-4">
                  <h5>Cliente</h5>
                    <select class="form-control" name="cliente" id="cliente" required>
                      <option value="">Selecione...</option>
                        <?php 
                          require_once('../../../sistema/php/conectaBd/index.php');
                          $objDb = new db();
                          $link = $objDb->conecta_mysql();
                          $sql = " SELECT * FROM Clientes";
                          $resultado_ids = mysqli_query($link, $sql);
                          if($resultado_ids){
                          while($registros = mysqli_fetch_array($resultado_ids, MYSQLI_ASSOC)){
                          echo '<option value="'.$registros['idClientes'].'">'.$registros['nomeClientes'].'</option>';
                            }
                          }else{
                            echo 'Erro na consulta dos emails no banco de dados!';
                          }
                        ?>
                    </select>
                  </div>
                  <div class="form-group col-lg-4">
                    <h5>Funcionário</h5>
                    <select class="form-control" name="funcionario" id="funcionario" required>
                      <option value="">Selecione...</option>
                        <?php 
                          require_once('../../../sistema/php/conectaBd/index.php');
                          $objDb = new db();
                          $link = $objDb->conecta_mysql();
                          $sql = " SELECT * FROM Funcionarios";
                          $resultado_ids = mysqli_query($link, $sql);
                          if($resultado_ids){
                          while($registros = mysqli_fetch_array($resultado_ids, MYSQLI_ASSOC)){
                          echo '<option value="'.$registros['idFuncionarios'].'">'.$registros['nomeFuncionarios'].'</option>';
                            }
                          }else{
                            echo 'Erro na consulta dos emails no banco de dados!';
                          }
                        ?>
                    </select>
                  </div>
                  <div class="form-group col-lg-4">
                    <input type="hidden" name="enviou" value="1">
                    <h5>Arquivo PDF</h5>
                    <input type="file" name="arquivo">
                  </div>
                </div>
              
              <div class="modal-footer">
                  <a href="../../usuarios/clientes/index.php">
                    <input type="cancel" class="btn btn-alert" value="Cancelar" name="submit">
                  </a>

                    <input type="submit" class="btn btn-primary" value="Cadastrar Cliente" name="submit">
                </div>
              </div>

              </form>
              </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
  </section>
</div>
  <?php include '../../arquivos-include/rodape.php';?>
</div>

<!-- ./wrapper -->

<?php include '../../arquivos-include/jquery.php';?>

<script>
    function formatar(mascara, documento){
      var i = documento.value.length;
      var saida = mascara.substring(0,1);
      var texto = mascara.substring(i)
      
      if (texto.substring(0,1) != saida){
                documento.value += texto.substring(0,1);
      }
      
    }
</script>

<script>
function TestaCPF(elemento) {
  cpf = elemento.value;
  cpf = cpf.replace(/[^\d]+/g, '');
  if (cpf == '') return elemento.style.borderColor = "red";
  // Elimina CPFs invalidos conhecidos    
  if (cpf.length != 11 ||
    cpf == "00000000000" ||
    cpf == "11111111111" ||
    cpf == "22222222222" ||
    cpf == "33333333333" ||
    cpf == "44444444444" ||
    cpf == "55555555555" ||
    cpf == "66666666666" ||
    cpf == "77777777777" ||
    cpf == "88888888888" ||
    cpf == "99999999999")
    return elemento.style.borderColor = "red";
  // Valida 1o digito 
  add = 0;
  for (i = 0; i < 9; i++)
    add += parseInt(cpf.charAt(i)) * (10 - i);
  rev = 11 - (add % 11);
  if (rev == 10 || rev == 11)
    rev = 0;
  if (rev != parseInt(cpf.charAt(9)))
    return elemento.style.borderColor = "red";
  // Valida 2o digito 
  add = 0;
  for (i = 0; i < 10; i++)
    add += parseInt(cpf.charAt(i)) * (11 - i);
  rev = 11 - (add % 11);
  if (rev == 10 || rev == 11)
    rev = 0;
  if (rev != parseInt(cpf.charAt(10)))
   return elemento.style.borderColor = "red";
  return elemento.style.borderColor = "green";
}
</script>

</body>
</html>
