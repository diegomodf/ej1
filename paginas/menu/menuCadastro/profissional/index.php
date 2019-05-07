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
            <h5 class="box-title">Cadastrar Profissional</h5>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
              <form action="../../../../sistema/php/apresentaDados/profissional/insert.php" method="POST">
              <div class="box-body">
                <div class="row">
                  <div class="form-group col-lg-6">
                  <h5>Nome do Profissional</h5>
                      <input type="text" name= "nome" class="form-control" placeholder="Nome" required>
                  </div>
                  <div class="form-group col-lg-2">
                        <h5>Sexo</h5>
                        <select class="form-control" name="sexo" id="sexo" required>
                          <option value="">Selecione...</option>                      
                          <option value="feminino">Feminino</option>
                          <option value="masculino">Masculino</option>
                          <option value="outros">Outros</option>
                        </select>
                  </div>
                  <div class="form-group col-lg-2">
                        <h5>Data de Nascimento</h5>
                        <input type="text" name= "nascimento" class="form-control" placeholder="Data de Nascimento" OnKeyPress="formatar('##/##/####', this)" maxlength="10" required>
                  </div>
                  <div class="form-group col-lg-2">
                        <h5>Atividade</h5>
                        <select class="form-control" name="atividade" id="atividade" required>
                          <option value="">Selecione...</option>                      
                          <option value="ativo">Ativo</option>
                          <option value="inativo">Inativo</option>
                        </select>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-lg-4">
                  <h5>Email</h5>
                      <input type="email" name= "email" class="form-control" placeholder="Email" required>
                  </div>
                  <div class="form-group col-lg-2">
                  <h5>Telefone</h5>
                    <input name="telefone" type="text" class="form-control" placeholder="Telefone" OnKeyPress="formatar('##-#####-####', this)" maxlength="13" required>
                  </div>
                  <div class="form-group col-lg-2">
                  <h5>CPF</h5>
                    <input name="cpf" type="text" class="form-control" placeholder="CPF" OnKeyPress="formatar('###.###.###-##', this)" maxlength="14" required>
                  </div>
                  <div class="form-group col-lg-2" required>
                  <h5>RG</h5>
                    <input name="rg" type="text" class="form-control" placeholder="RG" required>
                  </div>
                  <div class="form-group col-lg-2">
                  <h5>Órgão Expeditor</h5>
                    <select class="form-control" name="orgao" id="orgao" required>
                          <option value="">Selecione...</option>                      
                          <option value="ssp">SSP</option>
                          <option value="detran">Detran</option>
                          <option value="cartorio">Cartório</option>
                          <option value="pf">Polícia Federal</option>
                        </select>
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
                    <input type="text" name= "numero" class="form-control" placeholder="Número" required>
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
                  <div class="form-group col-lg-3">
                  <h5>Conselho Profissional</h5>
                      <select class="form-control" name="conselho" id="conselho" required>
                          <option value="">Selecione...</option>                      
                          <option value="CRAS">CRAS</option>
                          <option value="COREN">COREN</option>
                          <option value="CRF">CRF</option>
                          <option value="CRFA">CRFA</option>
                          <option value="CREFITO">CREFITO</option>
                          <option value="CRM">CRM</option>
                          <option value="CRN">CRN</option>
                          <option value="CR0">CR0</option>
                          <option value="CRP">CRP</option>
                          <option value="OUTROS">OUTROS</option>
                        </select>
                  </div>
                  <div class="form-group col-lg-3">
                  <h5>Número do Conselho</h5>
                    <input name="num_conselho" type="text" class="form-control" placeholder="Número do Conselho" required>
                  </div>
                  <div class="form-group col-lg-3">
                  <h5>UF do Conselho</h5>
                      <select class="form-control" name="uf_conselho" id="uf_conselho" required>
                          <option value="">Selecione...</option>                      
                          <option value="AC">AC</option>
                          <option value="AL">AL</option>
                          <option value="AP">AP</option>
                          <option value="AM">AM</option>
                          <option value="BA">BA</option>
                          <option value="CE">CE</option>
                          <option value="DF">DF</option>
                          <option value="ES">ES</option>
                          <option value="GO">GO</option>
                          <option value="MA">MA</option>
                          <option value="MG">MG</option>
                          <option value="MS">MS</option>
                          <option value="MT">MT</option>
                          <option value="PA">PA</option>
                          <option value="PB">PB</option>
                          <option value="PE">PE</option>
                          <option value="PI">PI</option>
                          <option value="PR">PR</option>
                          <option value="RJ">RJ</option>
                          <option value="RO">RO</option>
                          <option value="RO">RN</option>
                          <option value="RR">RR</option>
                          <option value="RS">RS</option>
                          <option value="SC">SC</option>
                          <option value="SE">SE</option>
                          <option value="SP">SP</option>
                          <option value="TO">TO</option>
                        </select>
                  </div>
                  <div class="form-group col-lg-3">
                  <h5>Especialidade/Código CBO</h5>
                  <select class="form-control" name="cbo" id="cbo" required>
                      <option value="">Selecione...</option>
                      <?php 
                        require_once('../../../../sistema/php/conectaBd/index.php');
                        $objDb = new db();
                        $link = $objDb->conecta_mysql();
                        $sql = " SELECT * FROM especialidade";
                        $resultado_ids = mysqli_query($link, $sql);
                          if($resultado_ids){
                          while($registros = mysqli_fetch_array($resultado_ids, MYSQLI_ASSOC)){
                          echo '<option value="'.$registros['idespecialidade'].'">'.$registros['especialidade'].'</option>';
                            }
                          }else{
                              echo 'Erro na consulta dos emails no banco de dados!';
                          }
                      ?>
                      </select>                  
                  </div>
              </div>
              <div class="row">
                  <div class="form-group col-lg-3">
                   <h5>Favorecido 1</h5>
                      <input type="text" name= "favorecido1" class="form-control" placeholder="Favorecido" required>
                  </div>
                  <div class="form-group col-lg-3">
                  <h5>Banco 1</h5>
                    <select class="form-control" name="banco1" id="banco1" required>
                          <option value="">Selecione...</option>                      
                          <option value="BANCO DO BRASIL">Banco do Brasil</option>
                          <option value="CAIXA ECONôMICA">Caixa Econômica Federal</option>
                          <option value="Bradesco">Bradesco</option>
                          <option value="SANTANDER">Santander</option>
                          <option value="ITAú / UNIBANCO">Itaú / Unibanco</option>
                        </select>
                  </div>
                  <div class="form-group col-lg-2">
                  <h5>Agência 1</h5>
                    <input name="agencia1" type="text" class="form-control" placeholder="Agência" required>
                  </div>
                  <div class="form-group col-lg-2">
                  <h5>Conta 1</h5>
                    <input name="conta1" type="text" class="form-control" placeholder="Conta" required>
                  </div>
                  <div class="form-group col-lg-2">
                    <h5>Tipo de Conta 1</h5>
                    <select class="form-control" name="tipo1" id="tipo1" required>
                          <option value="">Selecione...</option>                      
                          <option value="Conta Corrente">Conta Corrente</option>
                          <option value="Conta Poupança">Conta Poupança</option>
                        </select>
                  </div>
              </div>
              <div class="row">
                  <div class="form-group col-lg-3">
                   <h5>Favorecido 2</h5>
                      <input type="text" name= "favorecido2" class="form-control" placeholder="Favorecido">
                  </div>
                  <div class="form-group col-lg-3">
                  <h5>Banco 2</h5>
                    <select class="form-control" name="banco2" id="banco2">
                          <option value="">Selecione...</option>                      
                          <option value="BANCO DO BRASIL">Banco do Brasil</option>
                          <option value="CAIXA ECONôMICA">Caixa Econômica Federal</option>
                          <option value="Bradesco">Bradesco</option>
                          <option value="SANTANDER">Santander</option>
                          <option value="ITAú / UNIBANCO">Itaú / Unibanco</option>
                        </select>
                  </div>
                  <div class="form-group col-lg-2">
                  <h5>Agência 2</h5>
                    <input name="agencia2" type="text" class="form-control" placeholder="Agência">
                  </div>
                  <div class="form-group col-lg-2">
                  <h5>Conta 2</h5>
                    <input name="conta2" type="text" class="form-control" placeholder="Conta">
                  </div>
                  <div class="form-group col-lg-2">
                    <h5>Tipo de Conta 2</h5>
                    <select class="form-control" name="tipo2" id="tipo2">
                          <option value="">Selecione...</option>                      
                          <option value="Conta Corrente">Conta Corrente</option>
                          <option value="Conta Poupança">Conta Poupança</option>
                        </select>
                  </div>
              </div>
              <div class="row">
                  <div class="form-group col-lg-4">
                   <h5>Curso fora da Área Médica</h5>
                      <input type="text" name= "#" class="form-control" placeholder="Nome do Curso">
                  </div>
                  <div class="form-group col-lg-4">
                    <h5>Responsável Técnico</h5>
                        <input type="text" name= "#" class="form-control" placeholder="Responsável Técnico">
                  </div>
                  <div class="form-group col-lg-4">
                  <h5>Especializações na Área do Desenvolvimento SNC</h5>
                    <input name="rua" type="text" class="form-control" placeholder="Especializações">
                  </div>
                  <div class="form-group col-lg-3">
                  <h5>Curso de Especialização 1</h5>
                    <input name="rua" type="text" class="form-control" placeholder="Informações">
                  </div>
                  <div class="form-group col-lg-3">
                  <h5>Curso de Especialização 2</h5>
                    <input name="rua" type="text" class="form-control" placeholder="Informações">
                  </div>
                  <div class="form-group col-lg-3">
                    <h5>Pós-Graduação (Atuação Clínica)</h5>
                      <input name="rua" type="text" class="form-control" placeholder="Pós-Graduação">
                  </div>
                  <div class="form-group col-lg-3">
                    <h5>Curso Padovan - Módulos</h5>
                      <input name="rua" type="text" class="form-control" placeholder="Curso Padovan">
                  </div>
                  <div class="form-group col-lg-3">
                    <h5>Curso Padovan - Completo</h5>
                      <input name="rua" type="text" class="form-control" placeholder="Curso Padovan">
                  </div>
                  <div class="form-group col-lg-3">
                    <h5>Mestrado</h5>
                      <input name="rua" type="text" class="form-control" placeholder="Mestrado">
                  </div>
                  <div class="form-group col-lg-3">
                    <h5>Doutorado</h5>
                      <input name="rua" type="text" class="form-control" placeholder="Doutorado">
                  </div>
                  <div class="form-group col-lg-3">
                    <h5>Anos de Trabalhos</h5>
                      <input name="rua" type="text" class="form-control" placeholder="Anos Completos">
                  </div>
              </div>
               <div class="modal-footer">
                    <input type="submit" class="btn btn-alert" value="Cancelar" name="submit">
                    <input type="submit" class="btn btn-primary" value="Cadastrar Profissional" name="submit">
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
