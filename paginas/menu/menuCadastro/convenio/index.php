<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistema Clifops</title>
  <link rel="stylesheet" href="../../../../sistema/adminlte/plugins/iCheck/square/blue.css">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../../../../sistema/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../../../sistema/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../../../sistema/adminlte/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../../../../sistema/adminlte/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../../../../sistema/adminlte/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="../../../../sistema/css/cadastro/convenio.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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
</head>

<body class="hold-transition skin-purple sidebar-mini">

<div class="wrapper">

  <!-- Main Header -->
    <?php
        include('../../menuLateral/head/index.php');
    ?>
  <!-- Left side column. contains the logo and sidebar -->
    <?php
        include('../../menuLateral/menu/index.php');
    ?>

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
            <h5 class="box-title">Cadastrar Operadora</h5>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
              <form action="../../../../sistema/php/apresentaDados/convenio/insert.php" method="POST">
              <div class="box-body">
                <div class="row">
                  <div class="form-group col-lg-3">
                  <h5>Nº do Registro ANS</h5>
                      <input type="text" name= "registro_ans" class="form-control" placeholder="Registro ANS" required>
                  </div>
                  <div class="form-group col-lg-5">
                        <h5>Nome da Operadora de Saúde</h5>
                        <input type="text" name= "nome" class="form-control" placeholder="Nome da Operadora" required>
                  </div>
                  <div class="form-group col-lg-4">
                        <h5>Sua Identificação nesta Operadora de Saúde</h5>
                        <input type="text" name= "identificacao" class="form-control" placeholder="Identificação" required>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-lg-6">
                  <h5>Tabela Padrão de Cobrança(opcional)</h5>
                    <select class="form-control" name="tabela" id="tabela" required>
                      <option value="#">Selecione...</option>                      
                      <option value="18 - TUSS TAXAS HOSPITALARES E GASES MEDICINAIS">18 - TUSS TAXAS HOSPITALARES E GASES MEDICINAIS</option>
                      <option value="19 - TUSS MATERIAIS">19 - TUSS MATERIAIS</option>
                      <option value="20 - TUSS MEDICAMENTOS">20 - TUSS MEDICAMENTOS</option>
                      <option value="22 - TUSS PROCEDIMENTOS E EVENTOS EM SAÚDE">22 - TUSS PROCEDIMENTOS E EVENTOS EM SAÚDE (MEDICINA, ODONTO E DEMAIS ÁREAS DA SAÚDE)</option>
                      <option value="90 - TABELA PRÓPRIA DE PACOTE ODONTOLÓGICO">90 - TABELA PRÓPRIA DE PACOTE ODONTOLÓGICO</option>
                      <option value="98 - TABELA PRÓPRIA DE PACOTES">98 - TABELA PRÓPRIA DE PACOTES</option>
                      <option value="00 - TABELA PRÓPRIA DAS OPERADORAS">00 - TABELA PRÓPRIA DAS OPERADORAS</option>
                    </select>
                  </div>
                  <div class="form-group col-lg-6">
                  <h5>Versão do Padrão TISS</h5>
                    <select class="form-control" name="versao" id="versao" required>
                      <option value="#">Selecione...</option>                      
                      <option value="TISS VERSÃO 3.02.00">TISS VERSÃO 3.02.00</option>
                      <option value="TISS VERSÃO 3.02.01">TISS VERSÃO 3.02.01</option>
                      <option value="TISS VERSÃO 3.02.02">TISS VERSÃO 3.02.02</option>
                      <option value="TISS VERSÃO 3.03.00">TISS VERSÃO 3.03.00</option>
                      <option value="TISS VERSÃO 3.03.01">TISS VERSÃO 3.03.01</option>
                      <option value="TISS VERSÃO 3.03.02">TISS VERSÃO 3.03.02</option>
                      <option value="TISS VERSÃO 3.03.03">TISS VERSÃO 3.03.03</option>
                    </select>
                  </div>
                  <div class="row check">
                    <div class="form-group col-lg-3">
                    </div>
                    <div class="form-group col-lg-5">
                      <input type="checkbox" aria-label="Checkbox for following text input">Operadora de Saúde ativa para o registro de Guias
                    </div>
                  </div>
              </div>
              <div class="row">
                  <div class="form-group col-lg-4" >
                  <h5>Contato</h5>
                      <input type="text" name= "nome_contato" class="form-control" placeholder="Nome p/ Contato" required>
                  </div>
                  <div class="form-group col-lg-4">
                        <h5>E-mail de Contato</h5>
                        <input type="email" name= "email_contato" class="form-control" placeholder="E-mail p/ Contato" required>
                  </div>
                  <div class="form-group col-lg-4">
                        <h5>Telefone de Contato</h5>
                        <input type="text" name= "tel_contato" class="form-control" placeholder="Telefone p/ Contato" required>
                  </div>
                <div class="form-group col-lg-3" style="text-align: center;">
                        <h5>Possíveis Ações</h5>
                        <input type="cancel" class="btn btn-alert" value="Cancelar" name="submit">
                        <input type="submit" class="btn btn-primary" value="Cadastrar" name="submit">
                    </div>
              </div>
            <div class="row">
                <div class="form-group col-lg-3">
                </div>
                <div class="form-group col-lg-3">
                </div>
                <div class="form-group col-lg-3">
                </div>
                <div class="form-group col-lg-3" style="text-align: center;">
                        <h5>Possíveis Ações</h5>
                        <input type="cancel" class="btn btn-alert" value="Cancelar" name="submit">
                        <input type="submit" class="btn btn-primary" value="Cadastrar" name="submit">
                </div>
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
      <!-- /.row -->


  <!-- Main Footer -->
  <footer class="main-footer">

      <!-- Rodapé da pagina -->
      <!-- To the right -->
    <div class="pull-right hidden-xs">
      EngNet Consultoria e Implementação
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2019 <a href="../../index.php">CliFops</a>.</strong> Todos os Direitos Reservados.

  </footer>
</div>

<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../../../../sistema/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../../../sistema/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../../../sistema/adminlte/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Slimscroll -->
<script src="../../../../sistema/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../../../sistema/adminlte/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../../../sistema/adminlte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../../../sistema/adminlte/dist/js/demo.js"></script>

</body>
</html>
