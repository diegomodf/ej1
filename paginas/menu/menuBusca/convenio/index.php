<?php
    session_start();
    if(!isset($_SESSION['nome']) || !isset($_SESSION['email']) || !isset($_SESSION['funcao'])){
        header('Location: ../../../index.php?erro=1');    
    }
?>
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

   <header class="main-header">

  <!-- Cabeçalho da página -->
     <!-- Logo -->
    <a href="../../menuPrincipal/principal/index.php" class="logo">
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
        include('../../menuLateral/menu/busca.php');
    ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <small>Gerencie os seus Convênios</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Calendar</li>
      </ol>
    </section>
    <section class="content container-fluid">
        <div class="box">
          <div class="box-header with-border" style="padding:15px;">
            <h3 class="box-title">Editar Cadastro de Convênios</h3>     
            <!-- /.box-tools -->
          </div>
              <div class="box-body">
              <table id="tabela" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nome</th>
                  <th>Identificação CliFops</th>
                  <th>Editar</th>
                  <th>Visualizar</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    require_once('../../../../sistema/php/conectaBd/index.php');
                    $objDb = new db();
                    $link = $objDb->conecta_mysql();
                    $sql = " SELECT * FROM operadora";
                    $resultado_ids = mysqli_query($link, $sql);
                      if($resultado_ids){
                      while($registros = mysqli_fetch_array($resultado_ids, MYSQLI_ASSOC)){
                      $id = $registros['idoperadora'];
                      $nome = $registros['nome'];
                      $telefone = $registros['id_clifops'];
                      echo '<tr>';
                      echo "<td>$nome</td>";
                      echo '<td>'.$registros['id_clifops'].'</td>';
                      ?>
                      <td><div class='item_lista'><span class="fa fa-edit item_lista" data-toggle="modal" data-target="#exampleModal" data-whatevernome="<?php echo $registros['nome']; ?>" data-whateveridclifops="<?php echo $registros['id_clifops']; ?>" data-whatevertel="<?php echo $registros['contato_tel']; ?>" data-whateverdetalhes="<?php echo $registros['contato_email']; ?>" data-whatevercontatonome="<?php echo $registros['contato_nome']; ?>" data-whateverans="<?php echo $registros['registro_ans']; ?>" data-whatevertabelacobranca="<?php echo $registros['tabela_cobranca']; ?>" data-whateverversaotiss="<?php echo $registros['versao_tiss']; ?>"></span></div></td>
                      <td><div class='item_lista'><span class="fa fa-eye item_lista" data-toggle="modal" data-target="#seeModal" data-whatevernome="<?php echo $registros['nome']; ?>" data-whateveridclifops="<?php echo $registros['id_clifops']; ?>" data-whatevertel="<?php echo $registros['contato_tel']; ?>" data-whateverdetalhes="<?php echo $registros['contato_email']; ?>" data-whatevercontatonome="<?php echo $registros['contato_nome']; ?>" data-whateverans="<?php echo $registros['registro_ans']; ?>" data-whatevertabelacobranca="<?php echo $registros['tabela_cobranca']; ?>" data-whateverversaotiss="<?php echo $registros['versao_tiss']; ?>"></span></div></td>
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
                    <h4 class="modal-title">Atualizar Dados</h4>
                  </div>
                  <div class="modal-body">
                  <div class="box">
                    <div class="box-header with-border" style="padding:15px;">
                    <h5 class="box-title">Editar Operadora</h5>
                      <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                      <form action="../../../../sistema/php/apresentaDados/convenio/insert.php" method="POST">
                        <div class="box-body">
                          <div class="row">
                            <div class="form-group col-lg-3">
                            <h5>Nº do Registro ANS</h5>
                                <input id="ans" type="text" name= "registro_ans" class="form-control" placeholder="Registro ANS" required>
                            </div>
                            <div class="form-group col-lg-5">
                                  <h5>Nome da Operadora de Saúde</h5>
                                  <input id="recipient-name" type="text" name= "nome" class="form-control" placeholder="Nome da Operadora" required>
                            </div>
                            <div class="form-group col-lg-4">
                                  <h5>Sua Identificação nesta Operadora de Saúde</h5>
                                  <input id="id-clifops" type="text" name= "identificacao" class="form-control" placeholder="Identificação" required>
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-lg-6">
                            <h5>Tabela Padrão de Cobrança(opcional)</h5>
                              <select id="tabela-cobranca" class="form-control" name="tabela" id="tabela" required>
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
                              <select id="versao-tiss" class="form-control" name="versao" id="versao" required>
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
                                <input id="contato-nome" type="text" name= "nome_contato" class="form-control" placeholder="Nome p/ Contato" required>
                            </div>
                            <div class="form-group col-lg-4">
                                  <h5>E-mail de Contato</h5>
                                  <input id="detalhes" type="email" name= "email_contato" class="form-control" placeholder="E-mail p/ Contato" required>
                            </div>
                            <div class="form-group col-lg-4">
                                  <h5>Telefone de Contato</h5>
                                  <input id="telefone" type="text" name= "tel_contato" class="form-control" placeholder="Telefone p/ Contato" required>
                            </div>
                        </div>
                      </div>
                          </div>
                            
                              <div class="modal-footer">
                                <input type="submit" class="btn btn-alert" value="Cancelar" name="submit">
                                <input type="submit" class="btn btn-primary" value="Atualizar" name="submit">
                              </div>
                              </div>
                            </form>
                            </div>   
                          </div>
                          
                        </div>
                          
                      </div>
            </div>
            <div id="seeModal" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Atualizar Dados</h4>
                  </div>
                  <div class="modal-body">
                  <div class="box">
                    <div class="box-header with-border" style="padding:15px;">
                    <h5 class="box-title">Editar Operadora</h5>
                      <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                      <form action="../../../../sistema/php/apresentaDados/convenio/insert.php" method="POST">
                      <div class="box-body">
                          <div class="row">
                            <div class="form-group col-lg-3">
                            <h5>Nº do Registro ANS</h5>
                                <input disabled id="ans" type="text" name= "registro_ans" class="form-control" placeholder="Registro ANS" required>
                            </div>
                            <div class="form-group col-lg-5">
                                  <h5>Nome da Operadora de Saúde</h5>
                                  <input disabled id="recipient-name" type="text" name= "nome" class="form-control" placeholder="Nome da Operadora" required>
                            </div>
                            <div class="form-group col-lg-4">
                                  <h5>Sua Identificação nesta Operadora de Saúde</h5>
                                  <input disabled id="id-clifops" type="text" name= "identificacao" class="form-control" placeholder="Identificação" required>
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-lg-6">
                            <h5>Tabela Padrão de Cobrança(opcional)</h5>
                              <select disabled id="tabela-cobranca" class="form-control" name="tabela" id="tabela" required>
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
                              <select disabled id="versao-tiss" class="form-control" name="versao" id="versao" required>
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
                                <input disabled type="checkbox" aria-label="Checkbox for following text input">Operadora de Saúde ativa para o registro de Guias
                              </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-3" >
                            <h5>Contato</h5>
                                <input disabled id="contato-nome" type="text" name= "nome_contato" class="form-control" placeholder="Nome p/ Contato" required>
                            </div>
                            <div class="form-group col-lg-3">
                                  <h5>E-mail de Contato</h5>
                                  <input disabled id="detalhes" type="email" name= "email_contato" class="form-control" placeholder="E-mail p/ Contato" required>
                            </div>
                            <div class="form-group col-lg-3">
                                  <h5>Telefone de Contato</h5>
                                  <input disabled id="telefone" type="text" name= "tel_contato" class="form-control" placeholder="Telefone p/ Contato" required>
                            </div>
                        </div>
                      </div>
                        </form>
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
''
<script type="text/javascript">
    $('#exampleModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal

      var recipient = button.data('whatever') // Extract info from data-* attributes
      var recipientnome = button.data('whatevernome')
      var recipientdetalhes = button.data('whateverdetalhes')
      var recipientidclifops = button.data('whateveridclifops')
      var recipientcontatonome = button.data('whatevercontatonome')
      var recipienttel = button.data('whatevertel')
      var recipientans = button.data('whateverans')
      var recipienttabelacobranca = button.data('whatevertabelacobranca')
      var recipientversaotiss = button.data('whateverversaotiss')


      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)

      modal.find('#id-curso').val(recipient)
      modal.find('#recipient-name').val(recipientnome)
      modal.find('#detalhes').val(recipientdetalhes)
      modal.find('#id-clifops').val(recipientidclifops)
      modal.find('#contato-nome').val(recipientcontatonome)
      modal.find('#telefone').val(recipienttel)
      modal.find('#ans').val(recipientans)
      modal.find('#tabela-cobranca').val(recipienttabelacobranca)
      modal.find('#versao-tiss').val(recipientversaotiss)      
    })

    $('#seeModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal

      var recipient = button.data('whatever') // Extract info from data-* attributes
      var recipientnome = button.data('whatevernome')
      var recipientdetalhes = button.data('whateverdetalhes')
      var recipientidclifops = button.data('whateveridclifops')
      var recipientcontatonome = button.data('whatevercontatonome')
      var recipienttel = button.data('whatevertel')
      var recipientans = button.data('whateverans')
      var recipienttabelacobranca = button.data('whatevertabelacobranca')
      var recipientversaotiss = button.data('whateverversaotiss')


      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)

      modal.find('#id-curso').val(recipient)
      modal.find('#recipient-name').val(recipientnome)
      modal.find('#detalhes').val(recipientdetalhes)
      modal.find('#id-clifops').val(recipientidclifops)
      modal.find('#contato-nome').val(recipientcontatonome)
      modal.find('#telefone').val(recipienttel)
      modal.find('#ans').val(recipientans)
      modal.find('#tabela-cobranca').val(recipienttabelacobranca)
      modal.find('#versao-tiss').val(recipientversaotiss)      
    })
  </script>

</body>
</html>
