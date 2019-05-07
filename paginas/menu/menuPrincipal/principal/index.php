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
    <a href="../principal/index.php" class="logo">
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
  <!-- MENU LATERAL DE ESCOLHA DE PÁGINAS -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="../../../../sistema/adminlte/dist/img/avatar5.png" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Alexander Pierce</p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- /.search form -->

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MENU</li>
      <li class="active"><a href="#"><i class="fa fa-play"></i> <span>Início</span></a></li>
      <!-- Optionally, you can add icons to the links -->
      <li><a href="../../../agenda/index.php"><i class="fa fa-calendar"></i> <span>Agenda</span></a></li>
      <li class="treeview">
        <a href="#"><i class="fa fa-user-plus"></i> <span>Cadastro</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
        <ul class="treeview-menu">
          <li><a href="../../../menu/menuCadastro/paciente/index.php">Paciente</a></li>
          <li><a href="../../../menu/menuCadastro/profissional/index.php">Profissional</a></li>
          <li><a href="../../../menu/menuCadastro/convenio/index.php">Convênio</a></li>
          <li><a href="../../../menu/menuCadastro/funcionario/index.php">Funcionário</a></li>
          <li><a href="../../../menu/menuCadastro/valores/index.php">Valores</a></li>
        </ul>
      </li>
            <li class="treeview">
        <a href="../../menuCadastro/guias/index.php"><i class="fa fa-list"></i> <span>Guias</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
        <ul class="treeview-menu">
          <li><a href="../../menuCadastro/guias/index.php">Cadastro</a></li>
          <li><a href="../../menuBusca/guias/">Busca</a></li>
        </ul>
      </li>
            <li class="treeview">
        <a href="#"><i class="fa fa-money"></i> <span>Controle</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
        <ul class="treeview-menu">
          <li><a href="../../menuCadastro/upload/index.php">Uploads</a></li>
          <li><a href="../../menuBusca/uploads/pagamentos/index.php">Pagamentos</a></li>
          <li><a href="../../menuBusca/uploads/lotes/index.php">Lotes</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-cogs"></i> <span>Configurações</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
        <ul class="treeview-menu">
          <li><a href="../../menuBusca/paciente/">Paciente</a></li>
          <li><a href="../../menuBusca/profissional">Profissional</a></li>
          <li><a href="../../menuBusca/convenio">Convênio</a></li>
          <li><a href="../../menuBusca/funcionario">Funcionário</a></li>
        </ul>
      </li>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <small>Página Inicial</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

      </ol>
    </section>
    

      
    <section class="content container-fluid">
        <div class="box">
          <div class="box-header with-border" style="padding:15px;">
            <h3 class="box-title">Finalizar Cadastro de Pacientes</h3>     
            <!-- /.box-tools -->
          </div>
            
   
            
              <div class="box-body">
              <table id="tabela" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Nome</th>
                  <th>Telefone</th>
                  <th>CPF</th>
                  <th>Editar</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    require_once('../../../../sistema/php/conectaBd/index.php');
                    $objDb = new db();
                    $link = $objDb->conecta_mysql();
                    $sql = " SELECT * FROM paciente WHERE sexo = ''";
                    $resultado_ids = mysqli_query($link, $sql);
                      if($resultado_ids){
                      while($registros = mysqli_fetch_array($resultado_ids, MYSQLI_ASSOC)){
                      $id = $registros['idpaciente'];
                      $nome = $registros['nome'];
                      $telefone = $registros['telefone'];
                      $cpf = $registros['cpf'];
                      echo '<tr>';
                      echo "<td>$id</td>";
                      echo "<td>$nome</td>";
                      echo '<td>'.$registros['telefone'].'</td>';
                      echo '<td class="mailbox-subject"><b>'.$registros['cpf'].'</b></td>';
                      ?>
                      <td><div class='item_lista'><span class="fa fa-edit item_lista" data-toggle="modal" data-target="#exampleModal" data-whateverid="<?php echo $registros['idpaciente']; ?>"   data-whatevernome="<?php echo $registros['nome']; ?>" data-whateverdetalhes="<?php echo $registros['email']; ?>" data-whateverop="<?php echo $registros['operadora']; ?>" data-whatevercpf="<?php echo $registros['cpf']; ?>" data-whatevertel="<?php echo $registros['telefone']; ?>"data-whatevernomeres="<?php echo $registros['nome_responsavel']; ?>" data-whatevercpfres="<?php echo $registros['cpf_responsavel']; ?>"></span></div></td>
                      <?php
                      echo '</tr>';
                        }
                      }else{
                          echo 'Erro na consulta dos emails no banco de dados!';
                        }
                  ?>
              </tbody>
            </table>            <!-- Modal de adição -->
            <div id="exampleModal" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Adicionar</h4>
                  </div>
                  <div class="modal-body">
                  <div class="box">
                  <div class="box-header with-border" style="padding:15px;">
                  <h5 class="box-title">Finalizar Cadastro</h5>
                    <!-- /.box-tools -->
                  </div>
                  <!-- /.box-header -->
                    <form action="../../../../sistema/php/apresentaDados/paciente/completaCad.php" method="POST"> 
                    <div class="box-body">
                      <div class="row">
                        <div class="form-group col-lg-8">
                        <h5>Nome do Paciente</h5>
                            <input type="text" name= "nome" class="form-control" placeholder="Nome" id="recipient-name">
                        </div>
                        <div class="form-group col-lg-4">
                        <h5>Id do Paciente</h5>
                            <input type="text" name= "id" class="form-control" placeholder="Nome" id="recipient-id">
                        </div>
                        <div class="form-group col-lg-4">
                              <h5>Sexo</h5>
                              <select class="form-control" name="sexo" id="sexo">
                                <option value="#">Selecione...</option>                      
                                <option value="masculino">Masculino</option>
                                <option value="feminino">Feminino</option>
                              </select>
                        </div>
                        <div class="form-group col-lg-4">
                              <h5>Data de Nascimento</h5>
                              <input type="nascimento" name= "nascimento" class="form-control" placeholder="Data de Nascimento" OnKeyPress="formatar('##/##/####', this)" maxlength="10">
                        </div>
                        <div class="form-group col-lg-4">
                              <h5>Estado Civil</h5>
                              <select class="form-control" name="estado_civil" id="estado_civil">
                                <option value="#">Selecione...</option>                      
                                <option value="casado">Casado</option>
                                <option value="solteiro">Solteiro</option>
                                <option value="desquitado">Desquitado</option>
                                <option value="divorciado">Divorciado</option>
                                <option value="viuvo">Viúvo</option>
                                <option value="outro">Outro</option>
                                <option value="indefinido">Indefinido</option>
                              </select>
                        </div>
                      </div>
                      <div class="row">
                         <div class="form-group col-lg-12">
                        <h5>Email</h5>
                            <input type="email" name= "email" class="form-control" placeholder="Email" id="detalhes">
                        </div>
                        <div class="form-group col-lg-6">
                        <h5>Telefone</h5>
                          <input name="telefone" type="text" class="form-control" placeholder="Telefone" OnKeyPress="formatar('##-#####-####', this)" maxlength="13" id="telefone">
                        </div>
                        <div class="form-group col-lg-6">
                        <h5>CPF</h5>
                          <input name="cpf" type="text" class="form-control" placeholder="CPF" OnKeyPress="formatar('###.###.###-##', this)" maxlength="14" id="cpf">
                        </div>
                    </div>
                      <div class="row">
                        <div class="form-group col-lg-4">
                        <h5>CEP</h5>
                          <input name="cep" type="text" id="cep" value="" size="60" maxlength="8" onblur="pesquisacep(this.value);" class="form-control" placeholder="CEP"/>
                        </div>
                        <div class="form-group col-lg-8">
                        <h5>Rua</h5>
                          <input name="rua" type="text" id="rua" size="60" class="form-control" placeholder="Rua">
                        </div>
                        <div class="form-group col-lg-6">
                          <h5>Número</h5>
                          <input type="text" name= "numero" class="form-control" placeholder="Número">
                        </div>
                        <div class="form-group col-lg-6">
                          <h5>Complemento</h5>
                          <input type="text" name= "complemento" class="form-control" placeholder="Complemento">
                        </div>
                        <div class="form-group col-lg-6">
                        <h5>Bairro</h5>
                          <input name="bairro" type="text" id="bairro" size="60" class="form-control" placeholder="Bairro">
                        </div>
                        <div class="form-group col-lg-3">
                        <h5>Cidade</h5>
                          <input name="cidade" type="text" id="cidade" size="60" class="form-control" placeholder="Cidade">
                        </div>
                        <div class="form-group col-lg-3">
                        <h5>UF</h5>
                          <input name="uf" type="text" id="uf" size="60" class="form-control" placeholder="UF">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-4">
                        <h5>Operadora</h5>
                         <input type="text" name= "operadora" class="form-control" placeholder="Operadora" id = "operadora">
                        </div>
                        <div class="form-group col-lg-4">
                        <h5>Plano</h5>
                          <select class="form-control" name="plano" id="plano">
                            <option value="#">Selecione...</option>                      
                            <option value="#">Pegar do Banco de Dados...</option>
                            <option value="vazio">Vazio</option>
                          </select>
                        </div>
                        <div class="form-group col-lg-4">
                        <h5>Validade da Carteira</h5>
                              <input type="text" name= "validade" class="form-control" placeholder="Validade da Carteira" OnKeyPress="formatar('##/##/####', this)" maxlength="10">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-3">
                        <h5>CID10</h5>
                          <input name="CID10" type="text" class="form-control" placeholder="CID10">
                        </div>
                        <div class="form-group col-lg-9">
                        <h5>Médico</h5>
                          <input name="nome_medico" type="text" class="form-control" placeholder="Nome do Médico">
                        </div>
                        <div class="form-group col-lg-6">
                        <h5>Reg. do Conselho</h5>
                          <input name="reg_medico" type="text" class="form-control" placeholder="Registro do Conselho">
                        </div>
                        <div class="form-group col-lg-6">
                        <h5>Especialidade</h5>
                          <input name="especialidade" type="text" class="form-control" placeholder="Especialidade">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                        <h5>Nº da Carteira da Operadora</h5>
                          <input name="num_carteira" type="text" class="form-control" placeholder="Carteira da Operadora">
                        </div>
                        <div class="form-group col-lg-6">
                        <h5>Número da CNS</h5>
                          <input name="cns" type="text" class="form-control" placeholder="Nº da CNS">
                        </div>
                        <div class="form-group col-lg-12">
                        <h5>Nome do Responsável</h5>
                          <input name="responsavel" type="text" class="form-control" placeholder="Nome do Responsável" id="responsavel">
                        </div>
                        <div class="form-group col-lg-6">
                        <h5>CPF do Responsável</h5>
                          <input name="cpf_responsavel" type="text" class="form-control" placeholder="CPF do Responsável" OnKeyPress="formatar('###.###.###-##', this)" maxlength="14" id="cpfres">
                        </div>
                        <div class="form-group col-lg-6">
                        <h5>Telefone do Responsável</h5>
                          <input name="tel_responsavel" type="text" class="form-control" placeholder="Telefone do Responsável" OnKeyPress="formatar('##-#####-####', this)" maxlength="13">
                        </div>
                    </div>
                    <div class="modal-footer">
                          <input  type="submit" class="btn btn-primary" value="Cadastrar Paciente" name="submit">
                      </div>
                    </div>

                    </form>
                    </div>   
                  </div>
                </div>
              </div>
            </div>
            </div>
            <!-- /.box-body -->
          </div>
        
            <section class="content">
     <div class="box">
         <div class=" box-header with-border">
            <div class="container">
              <div class="row">
                <div class="col-sm-6">
                    <button type="button" class="btn btn-primary btn-lg">Enviar E-mail para <b>PACIENTES</b> sobre Consultas de amanhã</button>
                </div>
                <div class="col-sm-6">
                  <button type="button" class="btn btn-primary btn-lg">Enviar Pesquisa de Satisfação para PACIENTES</button>
                </div>
              </div>
            </div>
         </div>
     </div> 
    </section>
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

<script type="text/javascript">
    $('#exampleModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal

      var recipient = button.data('whatever') // Extract info from data-* attributes
      var recipientnome = button.data('whatevernome')
      var recipientid = button.data('whateverid')
      var recipientdetalhes = button.data('whateverdetalhes')
      var recipientop = button.data('whateverop')
      var recipientcpf = button.data('whatevercpf')
      var recipienttel = button.data('whatevertel')
      var recipientnomeres = button.data('whatevernomeres')
      var recipientcpfres = button.data('whatevercpfres')
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)

      modal.find('#id-curso').val(recipient)
      modal.find('#recipient-name').val(recipientnome)
      modal.find('#recipient-id').val(recipientid)
      modal.find('#detalhes').val(recipientdetalhes)
      modal.find('#operadora').val(recipientop)
      modal.find('#cpf').val(recipientcpf)
      modal.find('#telefone').val(recipienttel)
      modal.find('#responsavel').val(recipientnomeres)
      modal.find('#cpfres').val(recipientcpfres)
      
    })
  </script>

</body>
</html>
