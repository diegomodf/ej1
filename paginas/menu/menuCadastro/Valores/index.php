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

  <script type="text/javascript" >

    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
            
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
            
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }

    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";
                

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
            alert("Formato de CEP inválido.");
        }
    };

    </script>
</head>

<body class="hold-transition skin-purple sidebar-mini">

<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

  <!-- Cabeçalho da página -->
     <!-- Logo -->
    <a href="../../principal/index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>C</b>F</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">Cli<b>Fops</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only"></span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="../../../../sistema/adminlte/dist/img/avatar5.png" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="../../../../sistema/adminlte/dist/img/avatar5.png" class="img-circle" alt="User Image">

                <p>
                  <small>Sistema Clifops</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="alterar.php" class="btn btn-default btn-flat">Alterar Senha</a>
                </div>
              </li>
              <li class="user-footer">
                <div class="pull-right">
                  <a href="sair.php" class="btn btn-default btn-flat">Sair</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>

  </header>
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
            <h5 class="box-title">Cadastrar Valores Cobrados</h5>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="card">
              <button type="button" class="btn tela" style="text-align: center; width: 100%; background-color: #367fa9;" data-toggle="collapse" data-target="#demo">Procedimentos</button>
              <div id="demo" class="collapse">
                <p></p>
                <form action="../../../../sistema/php/apresentaDados/valores/insert.php" method="POST">
                <div class="box-body">
                <div class="row">
                  <div class="form-group col-lg-3">
                  <h5>Operadora / Convênio</h5>
                     <select class="form-control" name="operadora" id="operadora">
                          <option value="">Selecione...</option>                      
                          <option value="1">999999 - AMHPDF</option>
                          <option value="2">005711 - BRADESCO SAÚDE</option>
                          <option value="3">418374 - E-VIDA</option>
                          <option value="4">999999 - FUSEX</option>
                          <option value="5">000000 - PARTICULAR</option>
                          <option value="6">312924 - SAÚDE CAIXA</option>
                          <option value="7">361011 - UNAFISCO SAÚDE</option>
                        </select>
                  </div>
                  <div class="form-group col-lg-2">
                        <h5>Tabela</h5>
                        <select class="form-control" name="tabela" id="tabela">
                          <option value="">Selecione...</option>                      
                          <option value="18">18</option>
                          <option value="19">19</option>
                          <option value="20">20</option>
                          <option value="22">22</option>
                          <option value="00">00</option>
                          <option value="90">90</option>
                          <option value="98">98</option>
                        </select>
                  </div>
                  <div class="form-group col-lg-2">
                        <h5>Código Procedimento</h5>
                        <input type="text" name= "codigo" class="form-control" placeholder="Código Procedimento" maxlength="8">
                  </div>
                  <div class="form-group col-lg-2">
                        <h5>Descrição</h5>
                         <input type="text" name= "descricao" class="form-control" placeholder="Código Procedimento">
                  </div>
                  <div class="form-group col-lg-2">
                        <h5>Valor</h5>
                         <input type="text" name= "valor" class="form-control" placeholder="Código Procedimento">
                  </div>
                  <div class="form-group col-lg-1">
                        <h5>Incluir</h5>
                        <input type="submit" class="btn btn-primary" value="Incluir" name="submit">
                  </div>
                </div>
              </div>
              </form> 
            </div>
              <p></p>
            </div>
            <br>
            <div class="card">
                <button type="button" class="btn tela" style= "width: 100%; background-color: #367fa9;" data-toggle="collapse" data-target="#demo2">Outras Despesas</button>
              <div id="demo2" class="collapse">
                  <p></p>
                  <form action="#" method="POST">
                <div class="box-body">
                <div class="row">
                  <div class="form-group col-lg-3">
                  <h5>Operadora / Convênio</h5>
                     <select class="form-control" name="tema" id="design">
                          <option value="#">Selecione...</option>                      
                          <option value="#">Bradesco</option>
                          <option value="#">Caixa</option>
                        </select>
                  </div>
                  <div class="form-group col-lg-2">
                        <h5>Tabela</h5>
                        <select class="form-control" name="tema" id="design">
                          <option value="#">Selecione...</option>                      
                          <option value="#">Feminino</option>
                          <option value="#">Masculino</option>
                        </select>
                  </div>
                  <div class="form-group col-lg-2">
                        <h5>Código Procedimento</h5>
                        <input type="text" name= "#" class="form-control" placeholder="Código Procedimento">
                  </div>
                  <div class="form-group col-lg-2">
                        <h5>Descrição</h5>
                         <input type="text" name= "#" class="form-control" placeholder="Código Procedimento">
                  </div>
                  <div class="form-group col-lg-2">
                        <h5>Valor</h5>
                         <input type="text" name= "#" class="form-control" placeholder="Código Procedimento">
                  </div>
                  <div class="form-group col-lg-1">
                        <h5>Incluir</h5>
                        <input type="submit" class="btn btn-primary" value="Incluir" name="submit">
                  </div>
                </div>
              </div>
              </form> 
                  
              </div>
            </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
  </div>
      <!-- /.row -->
  </section>

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
