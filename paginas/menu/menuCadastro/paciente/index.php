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
            <h5 class="box-title">Cadastrar Paciente</h5>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
              <form action="../../../../sistema/php/apresentaDados/paciente/insert.php" method="POST"> 
              <div class="box-body">
                <div class="row">
                  <div class="form-group col-lg-6">
                  <h5>Nome do Paciente</h5>
                      <input type="text" name= "nome" class="form-control" placeholder="Nome" required>
                  </div>
                  <div class="form-group col-lg-2">
                        <h5>Sexo</h5>
                        <select class="form-control" name="sexo" id="sexo" required>
                          <option value="">Selecione...</option>                      
                          <option value="feminino">Feminino</option>
                          <option value="masculino">Masculino</option>
                        </select>
                  </div>
                  <div class="form-group col-lg-2">
                        <h5>Data de Nascimento</h5>
                        <input type="nascimento" name= "nascimento" class="form-control" placeholder="Data de Nascimento" OnKeyPress="formatar('##/##/####', this)" maxlength="10" required>
                  </div>
                  <div class="form-group col-lg-2">
                        <h5>Estado Civil</h5>
                        <select class="form-control" name="estado_civil" id="estado_civil">
                          <option value="">Selecione...</option>                      
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
                   <div class="form-group col-lg-6">
                  <h5>Email</h5>
                      <input type="email" name= "email" class="form-control" placeholder="Email" required>
                  </div>
                  <div class="form-group col-lg-3">
                  <h5>Telefone</h5>
                    <input name="telefone" type="text" class="form-control" placeholder="Telefone" OnKeyPress="formatar('##-#####-####', this)" maxlength="13" required>
                  </div>
                  <div class="form-group col-lg-3">
                  <h5>CPF</h5>
                    <input name="cpf" type="text" class="form-control" placeholder="CPF" OnKeyPress="formatar('###.###.###-##', this)" maxlength="14" required>
                  </div>
              </div>
                <div class="row">
                  <div class="form-group col-lg-4">
                  <h5>CEP</h5>
                    <input name="cep" type="text" id="cep" value="" size="60" maxlength="8" onblur="pesquisacep(this.value);" class="form-control" placeholder="CEP" required/>
                  </div>
                  <div class="form-group col-lg-4">
                  <h5>Rua</h5>
                    <input name="rua" type="text" id="rua" size="60" class="form-control" placeholder="Rua">
                  </div>
                  <div class="form-group col-lg-4">
                    <h5>Número</h5>
                    <input type="text" name= "numero" class="form-control" placeholder="Número" required="3">
                  </div>
                  <div class="form-group col-lg-3">
                    <h5>Complemento</h5>
                    <input type="text" name= "complemento" class="form-control" placeholder="Complemento">
                  </div>
                  <div class="form-group col-lg-3">
                  <h5>Bairro</h5>
                    <input name="bairro" type="text" id="bairro" size="60" class="form-control" placeholder="Bairro">
                  </div>
                  <div class="form-group col-lg-3">
                  <h5>Cidade</h5>
                    <input name="cidade" type="text" id="cidade" size="60" class="form-control" placeholder="Cidade">
                  </div>
                  <div class="form-group col-lg-3">
                  <h5>Unidade da Federação</h5>
                    <input name="uf" type="text" id="uf" size="60" class="form-control" placeholder="UF">
                  </div>
              </div>
              <div class="row">
                  <div class="form-group col-lg-4">
                  <h5>Operadora</h5>
                    <select class="form-control" name="operadora" id="operadora" required>
                      <option value="">Selecione...</option>                      
                      <option value="AMHPDF">999999 - AMHPDF</option>
                      <option value="BRADESCO SAÚDE">005711 - BRADESCO SAÚDE</option>
                      <option value="E-VIDA">418374 - E-VIDA</option>
                      <option value="FUSEX">999999 - FUSEX</option>
                      <option value="PARTICULAR">000000 - PARTICULAR</option>
                      <option value="SAÚDE CAIXA">312924 - SAÚDE CAIXA</option>
                      <option value="UNAFISCO SAÚDE">361011 - UNAFISCO SAÚDE</option>
                    </select>
                  </div>
                  <div class="form-group col-lg-4">
                  <h5>Plano</h5>
                    <select class="form-control" name="plano" id="plano">
                      <option value="">Selecione...</option>                      
                      <option value="bd">Pegar do Banco de Dados...</option>
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
                  <div class="form-group col-lg-3">
                  <h5>Médico (Encaminhamento)</h5>
                    <input name="nome_medico" type="text" class="form-control" placeholder="Nome do Médico">
                  </div>
                  <div class="form-group col-lg-3">
                  <h5>Reg. do Conselho (Encaminhamento)</h5>
                    <input name="reg_medico" type="text" class="form-control" placeholder="Registro do Conselho">
                  </div>
                  <div class="form-group col-lg-3">
                  <h5>Especialidade  (Encaminhamento)</h5>
                    <input name="especialidade" type="text" class="form-control" placeholder="Especialidade">
                  </div>
              </div>
              <div class="row">
                  <div class="form-group col-lg-3">
                  <h5>Nº da Carteira da Operadora</h5>
                    <input name="num_carteira" type="text" class="form-control" placeholder="Carteira da Operadora">
                  </div>
                  <div class="form-group col-lg-2">
                  <h5>Número da CNS</h5>
                    <input name="cns" type="text" class="form-control" placeholder="Nº da CNS">
                  </div>
                  <div class="form-group col-lg-3">
                  <h5>Nome do Responsável</h5>
                    <input name="responsavel" type="text" class="form-control" placeholder="Nome do Responsável">
                  </div>
                  <div class="form-group col-lg-2">
                  <h5>CPF do Responsável</h5>
                    <input name="cpf_responsavel" type="text" class="form-control" placeholder="CPF do Responsável" OnKeyPress="formatar('###.###.###-##', this)" maxlength="14">
                  </div>
                  <div class="form-group col-lg-2">
                  <h5>Telefone do Responsável</h5>
                    <input name="tel_responsavel" type="text" class="form-control" placeholder="Telefone do Responsável" OnKeyPress="formatar('##-#####-####', this)" maxlength="13">
                  </div>
              </div>
              <div class="modal-footer">
                    <input type="submit" class="btn btn-alert" value="Cancelar" name="submit">
                    <input type="submit" class="btn btn-primary" value="Cadastrar Paciente" name="submit">
                </div>
              </div>

              </form>
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
