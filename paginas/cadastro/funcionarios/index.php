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
            <h5 class="box-title">Cadastrar Funcionário(a)</h5>
              <!-- /.box-tools -->
            </div> 
            <!-- /.box-header -->
              <form action="../../../sistema/php/apresentaDados/funcionario/insert.php" method="POST">
              <div class="box-body">
                <div class="row">
                  <div class="form-group col-lg-6">
                  <h5>Nome do(a) Funcionário(a)</h5>
                      <input type="text" name= "nome" class="form-control" placeholder="Nome" required>
                  </div>
                  <div class="form-group col-lg-2">
                        <h5>Sexo</h5>
                        <select class="form-control" name="sexo" id="sexo" required>
                          <option value="">Selecione...</option>                      
                          <option value="Feminino">Feminino</option>
                          <option value="Masculino">Masculino</option>
                          <option value="Outros">Outros</option>
                        </select>
                  </div>
                  <div class="form-group col-lg-2">
                        <h5>Data de Nascimento</h5>
                        <input type="text" name= "nascimento" class="form-control" placeholder="Data de Nascimento" OnKeyPress="formatar('##/##/####', this)" maxlength="10" required>
                  </div>
                  <div class="form-group col-lg-2">
                        <h5>CPF</h5>
                    <input name="cpf" type="text" class="form-control" placeholder="CPF" OnKeyPress="formatar('###.###.###-##', this)" maxlength="14" required onblur="TestaCPF(this)" >
                  </div>
                </div>
                <div class="row">
                   <div class="form-group col-lg-4">
                  <h5>Email</h5>
                      <input type="email" name= "email" class="form-control" placeholder="Email" required>
                  </div>
                  <div class="form-group col-lg-3">
                  <h5>Telefone</h5>
                    <input name="telefone" type="text" class="form-control" placeholder="Telefone" OnKeyPress="formatar('##-#####-####', this)" maxlength="13" required>
                  </div>
                  <div class="form-group col-lg-3">
                  <h5>Função</h5>
                    <select class="form-control" name="funcao" id="funcao" required>
                          <option value="">Selecione...</option>                      
                          <option value="1">Funcionário(a) da Limpeza</option>
                          <option value="2">Gerente</option>
                          <option value="3">Terapeuta</option>
                          <option value="4">Secretário(a)</option>
                        </select>
                  </div>
                  <div class="form-group col-lg-2">
                  <h5>Data de Ingresso</h5>
                      <input type="text" name= "ingresso" class="form-control" placeholder="Data de Ingresso" OnKeyPress="formatar('##/##/####', this)" maxlength="10" required>
                  </div>
              </div>
                
              <div class="modal-footer">
                  <a href="../../usuarios/funcionarios/index.php">
                    <input type="cancel" class="btn btn-alert" value="Cancelar" name="submit">
                  </a>

                    <input type="submit" class="btn btn-primary" value="Cadastrar Funcionário" name="submit">
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
