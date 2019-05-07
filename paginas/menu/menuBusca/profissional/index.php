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
        <small>Gerencie os seus Profissionais</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Calendar</li>
      </ol>
    </section>
    <section class="content container-fluid">
        <div class="box">
          <div class="box-header with-border" style="padding:15px;">
            <h3 class="box-title">Editar Cadastro de Profissionais</h3>     
            <!-- /.box-tools -->
          </div>
              <div class="box-body">
              <table id="tabela" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nome</th>
                  <th>Telefone</th>
                  <th>CPF</th>
                  <th>Editar</th>
                  <th>Visualizar</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    require_once('../../../../sistema/php/conectaBd/index.php');
                    $objDb = new db();
                    $link = $objDb->conecta_mysql();
                    $sql = " SELECT * FROM profissional";
                    $resultado_ids = mysqli_query($link, $sql);
                      if($resultado_ids){
                      while($registros = mysqli_fetch_array($resultado_ids, MYSQLI_ASSOC)){
                      $id = $registros['idprofissional'];
                      $nome = $registros['nome'];
                      $telefone = $registros['telefone'];
                      $cpf = $registros['cpf'];
                      echo '<tr>';
                      echo "<td>$nome</td>";
                      echo '<td>'.$registros['telefone'].'</td>';
                      echo '<td class="mailbox-subject"><b>'.$registros['cpf'].'</b></td>';
                      ?>
                      <td><div class='item_lista'><span class="fa fa-edit item_lista" data-toggle="modal" data-target="#exampleModal" data-whatevernome="<?php echo $registros['nome']; ?>"data-whateverdetalhes="<?php echo $registros['email']; ?>" data-whateverop="<?php echo $registros['tipo_conta1']; ?>" data-whatevercpf="<?php echo $registros['cpf']; ?>" data-whatevertel="<?php echo $registros['telefone']; ?>"data-whatevernomeres="<?php echo $registros['rg']; ?>" data-whatevercpfres="<?php echo $registros['expedicao_rg']; ?>" data-whateversexo="<?php echo $registros['sexo']; ?>" data-whateverestadocv="<?php echo $registros['num_conselho']; ?>" data-whatevercep="<?php echo $registros['cep']; ?>"data-whateverrua="<?php echo $registros['rua']; ?>"data-whatevernumero="<?php echo $registros['numero']; ?>"data-whatevercomp="<?php echo $registros['complemento']; ?>" data-whateverbairro="<?php echo $registros['bairro']; ?>" data-whatevercity="<?php echo $registros['cidade']; ?>" data-whateveruf="<?php echo $registros['uf']; ?>" data-whatevertelres="<?php echo $registros['atividade']; ?>"  data-whatevercartao="<?php echo $registros['uf_conselho']; ?>" data-whateverCID10="<?php echo $registros['banco1']; ?>" data-whatevermedico="<?php echo $registros['agencia1']; ?>" data-whateverreg="<?php echo $registros['conta1']; ?>" data-whateveresp="<?php echo $registros['especialidade_cbo']; ?>" data-whatevernasc="<?php echo date('d/m/Y', strtotime($registros['nascimento'])); ?>" data-whateverval="<?php echo $registros['conselho']; ?>" data-whateverfav="<?php echo $registros['favorecido2']; ?>" data-whateverbanco="<?php echo $registros['banco2']; ?>" data-whateverag="<?php echo $registros['agencia2']; ?>" data-whateverconta="<?php echo $registros['conta2']; ?>" data-whatevertipo="<?php echo $registros['tipo_conta2']; ?>"></span></div></td>
                      <td><div class='item_lista'><span class="fa fa-eye item_lista" data-toggle="modal" data-target="#seeModal" data-whatevernome="<?php echo $registros['nome']; ?>"data-whateverdetalhes="<?php echo $registros['email']; ?>" data-whateverop="<?php echo $registros['tipo_conta1']; ?>" data-whatevercpf="<?php echo $registros['cpf']; ?>" data-whatevertel="<?php echo $registros['telefone']; ?>"data-whatevernomeres="<?php echo $registros['rg']; ?>" data-whatevercpfres="<?php echo $registros['expedicao_rg']; ?>" data-whateversexo="<?php echo $registros['sexo']; ?>" data-whateverestadocv="<?php echo $registros['num_conselho']; ?>" data-whatevercep="<?php echo $registros['cep']; ?>"data-whateverrua="<?php echo $registros['rua']; ?>"data-whatevernumero="<?php echo $registros['numero']; ?>"data-whatevercomp="<?php echo $registros['complemento']; ?>" data-whateverbairro="<?php echo $registros['bairro']; ?>" data-whatevercity="<?php echo $registros['cidade']; ?>" data-whateveruf="<?php echo $registros['uf']; ?>" data-whatevertelres="<?php echo $registros['atividade']; ?>"  data-whatevercartao="<?php echo $registros['uf_conselho']; ?>" data-whateverCID10="<?php echo $registros['banco1']; ?>" data-whatevermedico="<?php echo $registros['agencia1']; ?>" data-whateverreg="<?php echo $registros['conta1']; ?>" data-whateveresp="<?php echo $registros['especialidade_cbo']; ?>" data-whatevernasc="<?php echo date('d/m/Y', strtotime($registros['nascimento'])); ?>" data-whateverval="<?php echo $registros['conselho']; ?>" data-whateverfav="<?php echo $registros['favorecido2']; ?>" data-whateverbanco="<?php echo $registros['banco2']; ?>" data-whateverag="<?php echo $registros['agencia2']; ?>" data-whateverconta="<?php echo $registros['conta2']; ?>" data-whatevertipo="<?php echo $registros['tipo_conta2']; ?>"></span></div></td>
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
                  <h5 class="box-title">Editar Cadastro</h5>
                    <!-- /.box-tools -->
                  </div>
                  <!-- /.box-header -->
                    <form action="../../../../sistema/php/apresentaDados/profissional/insert.php" method="POST">
              <div class="box-body">
                <div class="row">
                  <div class="form-group col-lg-12">
                  <h5>Nome do Profissional</h5>
                      <input type="text" name= "nome" class="form-control" placeholder="Nome" id="recipient-name">
                  </div>
                  <div class="form-group col-lg-4">
                        <h5>Sexo</h5>
                        <select class="form-control" name="sexo" id="sexo">
                          <option value="#">Selecione...</option>                      
                          <option value="feminino">Feminino</option>
                          <option value="masculino">Masculino</option>
                          <option value="outros">Outros</option>
                        </select>
                  </div>
                  <div class="form-group col-lg-4">
                        <h5>Data de Nascimento</h5>
                        <input type="text" name= "nascimento" class="form-control" placeholder="Data de Nascimento" OnKeyPress="formatar('##/##/####', this)" maxlength="10" id="nascimento">
                  </div>
                  <div class="form-group col-lg-4">
                        <h5>Atividade</h5>
                        <select class="form-control" name="atividade" id="atividade">
                          <option value="#">Selecione...</option>                      
                          <option value="ativo">Ativo</option>
                          <option value="inativo">Inativo</option>
                        </select>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-lg-8">
                  <h5>Email</h5>
                      <input type="email" name= "email" class="form-control" placeholder="Email" id="detalhes">
                  </div>
                  <div class="form-group col-lg-4">
                  <h5>Telefone</h5>
                    <input name="telefone" type="text" class="form-control" placeholder="Telefone" OnKeyPress="formatar('##-#####-####', this)" maxlength="13" id="telefone">
                  </div>
                  <div class="form-group col-lg-4">
                  <h5>CPF</h5>
                    <input name="cpf" type="text" class="form-control" placeholder="CPF" OnKeyPress="formatar('###.###.###-##', this)" maxlength="14" id="cpf">
                  </div>
                  <div class="form-group col-lg-4">
                  <h5>RG</h5>
                    <input name="rg" type="text" class="form-control" placeholder="RG" id="rg">
                  </div>
                  <div class="form-group col-lg-4">
                  <h5>Órgão Expeditor</h5>
                    <select class="form-control" name="orgao" id="expeditor">
                          <option value="#">Selecione...</option>                      
                          <option value="ssp">SSP</option>
                          <option value="detran">Detran</option>
                          <option value="cartorio">Cartório</option>
                          <option value="pf">Polícia Federal</option>
                        </select>
                  </div>
              </div>
                <div class="row">
                  <div class="form-group col-lg-3">
                  <h5>CEP</h5>
                    <input name="cep" type="text" id="cep" value="" size="60" maxlength="8" onblur="pesquisacep(this.value);" class="form-control" placeholder="CEP"/>
                  </div>
                  <div class="form-group col-lg-9">
                  <h5>Rua</h5>
                    <input name="rua" type="text" id="rua" size="60" class="form-control" placeholder="Rua">
                  </div>
                  <div class="form-group col-lg-6">
                    <h5>Número</h5>
                    <input type="text" name= "numero" class="form-control" placeholder="Número" id="numero">
                  </div>
                  <div class="form-group col-lg-6">
                    <h5>Complemento</h5>
                    <input type="text" name= "complemento" class="form-control" placeholder="Complemento" id="complemento">
                  </div>
                  <div class="form-group col-lg-5">
                  <h5>Bairro</h5>
                    <input name="bairro" type="text" id="bairro" size="60" class="form-control" placeholder="Bairro">
                  </div>
                  <div class="form-group col-lg-4">
                  <h5>Cidade</h5>
                    <input name="cidade" type="text" id="cidade" size="60" class="form-control" placeholder="Cidade">
                  </div>
                  <div class="form-group col-lg-3">
                  <h5>UF</h5>
                    <input name="uf" type="text" id="uf" size="60" class="form-control" placeholder="UF">
                  </div>
              </div>
              <div class="row">
                  <div class="form-group col-lg-6">
                  <h5>Conselho Profissional</h5>
                      <select class="form-control" name="conselho" id="conselho">
                          <option value="#">Selecione...</option>                      
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
                  <div class="form-group col-lg-6">
                  <h5>Número do Conselho</h5>
                    <input name="num_conselho" type="text" class="form-control" placeholder="Número do Conselho" id="num_conselho">
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-lg-6">
                  <h5>UF do Conselho</h5>
                      <select class="form-control" name="uf_conselho" id="uf_conselho">
                          <option value="#">Selecione...</option>                      
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
                  <div class="form-group col-lg-6">
                  <h5>Especialidade/Código CBO</h5>
                        <select class="form-control" name="cbo" id="cbo">
                            <option>Selecione...</option>
                            <option value="201115 Geneticista">201115 Geneticista</option>
                            <option value="203015 Pesquisador em Biologia de Micro-organismos e Parasitas">203015 Pesquisador em Biologia de Micro-organismos e Parasitas</option>
                            <option value="213150 Físico Médico">213150 Físico Médico</option>
                            <option value="221105 Biólogo">221105 Biólogo</option>
                            <option value="223204 Cirurgião Dentista - Auditor">223204 Cirurgião Dentista - Auditor</option>
                            <option value="AC">223208 Cirurgião Dentista - Clínico Geral</option>
                            <option value="223208 Cirurgião Dentista - Clínico Geral">223212 Cirurgião Dentista - Endodontista</option>
                            <option value="223216 Cirurgião Dentista - Epidemiologista">223216 Cirurgião Dentista - Epidemiologista</option>
                            <option value="223220 Cirurgião Dentista - Estomatologista">223220 Cirurgião Dentista - Estomatologista</option>
                            <option value="223224 Cirurgião Dentista - Implantodontista">223224 Cirurgião Dentista - Implantodontista</option>
                            <option value="223228 Cirurgião Dentista - Odontogeriatra">223228 Cirurgião Dentista - Odontogeriatra</option>
                            <option value="223232 Cirurgião Dentista - Odontologista Legal">223232 Cirurgião Dentista - Odontologista Legal</option>
                            <option value="223236 Cirurgião Dentista - Odontopediatra">223236 Cirurgião Dentista - Odontopediatra</option>
                            <option value="223240 Cirurgião Dentista - Ortopedista E Ortodontista">223240 Cirurgião Dentista - Ortopedista E Ortodontista</option>
                            <option value="223244 Cirurgião Dentista - Patologista Bucal">223244 Cirurgião Dentista - Patologista Bucal</option>
                            <option value="223248 Cirurgião Dentista - Periodontista">223248 Cirurgião Dentista - Periodontista</option>
                            <option value="223252 Cirurgião Dentista - Protesiólogo Bucomaxilofacial">223252 Cirurgião Dentista - Protesiólogo Bucomaxilofacial</option>
                            <option value="223256 Cirurgião Dentista - Protesista">223256 Cirurgião Dentista - Protesista</option>
                            <option value="223260 Cirurgião Dentista - Radiologista">223260 Cirurgião Dentista - Radiologista</option>
                            <option value="223264 Cirurgião Dentista - Reabilitador Oral">223264 Cirurgião Dentista - Reabilitador Oral</option>
                            <option value="223268 Cirurgião Dentista - Traumatologista Bucomaxilofacial">223268 Cirurgião Dentista - Traumatologista Bucomaxilofacial</option>
                            <option value="223272 Cirurgião Dentista de Saúde Coletiva">223272 Cirurgião Dentista de Saúde Coletiva</option>
                            <option value="223276 Cirurgião Dentista – Odontologia do Trabalho">223276 Cirurgião Dentista – Odontologia do Trabalho</option>
                            <option value="223280 Cirurgião Dentista - Dentística">223280 Cirurgião Dentista - Dentística</option>
                            <option value="223284 Cirurgião Dentista - Disfunção Temporomandibular e Dor Orofacial">223284 Cirurgião Dentista - Disfunção Temporomandibular e Dor Orofacial</option>
                            <option value="223288 Cirurgião Dentista - Odontologia para Pacientes com Necessidades Especiais">223288 Cirurgião Dentista - Odontologia para Pacientes com Necessidades Especiais</option>
                            <option value="223293 Cirurgião-Dentista da Estratégia de Saúde da Família">223293 Cirurgião-Dentista da Estratégia de Saúde da Família</option>
                            <option value="223505 Enfermeiro">223505 Enfermeiro</option>
                            <option value="223605 Fisioterapeuta Geral">223605 Fisioterapeuta Geral</option>
                            <option value="223710 Nutricionista">223710 Nutricionista</option>
                            <option value="223810 Fonoaudiólogo">223810 Fonoaudiólogo</option>
                            <option value="223905 Terapeuta Ocupacional">223905 Terapeuta Ocupacional</option>
                            <option value="223910 Ortoptista">223910 Ortoptista</option>
                            <option value="225103 Médico Infectologista">225103 Médico Infectologista</option>
                            <option value="225105 Médico Acupunturista">225105 Médico Acupunturista</option>
                            <option value="225106 Médico Legista">225106 Médico Legista</option>
                            <option value="225109 Médico Nefrologista">225109 Médico Nefrologista</option>
                            <option value="225110 Médico Alergista e Imunologista">225110 Médico Alergista e Imunologista</option>
                            <option value="225112 Médico Neurologista">225112 Médico Neurologista</option>
                            <option value="225115 Médico Angiologista">225115 Médico Angiologista</option>
                            <option value="225118 Médico Nutrologista">225118 Médico Nutrologista</option>
                            <option value="225120 Médico Cardiologista">225120 Médico Cardiologista</option>
                            <option value="225121 Médico Oncologista Clínico">225121 Médico Oncologista Clínico</option>
                            <option value="225122 Médico Cancerologista Pediátrico">225122 Médico Cancerologista Pediátrico</option>
                            <option value="225124 Médico Pediatra">225124 Médico Pediatra</option>
                            <option value="225125 Médico Clínico">225125 Médico Clínico</option>
                            <option value="225127 Médico Pneumologista">225127 Médico Pneumologista</option>
                            <option value="225130 Médico de Família e Comunidade">225130 Médico de Família e Comunidade</option>
                            <option value="225133 Médico Psiquiatra">225133 Médico Psiquiatra</option>
                            <option value="225135 Médico Dermatologista">225135 Médico Dermatologista</option>
                            <option value="225136 Médico Reumatologista">225136 Médico Reumatologista</option>
                            <option value="225139 Médico Sanitarista">225139 Médico Sanitarista</option>
                            <option value="225140 Médico do Trabalho">225140 Médico do Trabalho</option>
                            <option value="225142 Médico da Estratégia de Saúde da Família">225142 Médico da Estratégia de Saúde da Família</option>
                            <option value="225145 Médico em Medicina de Tráfego">225145 Médico em Medicina de Tráfego</option>
                            <option value="225148 Médico Anatomopatologista">225148 Médico Anatomopatologista</option>
                            <option value="225150 Médico em Medicina Intensiva">225150 Médico em Medicina Intensiva</option>
                            <option value="225151 Médico Anestesiologista">225151 Médico Anestesiologista</option>
                            <option value="225155 Médico Endocrinologista e Metabologista">225155 Médico Endocrinologista e Metabologista</option>
                            <option value="225160 Médico Fisiatra">225160 Médico Fisiatra</option>
                            <option value="225165 Médico Gastroenterologista">225165 Médico Gastroenterologista</option>
                            <option value="225170 Médico Generalista">225170 Médico Generalista</option>
                            <option value="225175 Médico Geneticista">225175 Médico Geneticista</option>
                            <option value="225180 Médico Geriatra">225180 Médico Geriatra</option>
                            <option value="225185 Médico Hematologista">225185 Médico Hematologista</option>
                            <option value="225195 Médico Homeopata">225195 Médico Homeopata</option>
                            <option value="225203 Médico em Cirurgia Vascular">225203 Médico em Cirurgia Vascular</option>
                            <option value="225210 Médico Cirurgião Cardiovascular">225210 Médico Cirurgião Cardiovascular</option>
                            <option value="225215 Médico Cirurgião de Cabeça e Pescoço">225215 Médico Cirurgião de Cabeça e Pescoço</option>
                            <option value="225220 Médico Cirurgião do Aparelho Digestivo">225220 Médico Cirurgião do Aparelho Digestivo</option>
                            <option value="225225 Médico Cirurgião Geral">225225 Médico Cirurgião Geral</option>
                            <option value="225230 Médico Cirurgião Pediátrico">225230 Médico Cirurgião Pediátrico</option>
                            <option value="225235 Médico Cirurgião Plástico">225235 Médico Cirurgião Plástico</option>
                            <option value="225240 Médico Cirurgião Torácico">225240 Médico Cirurgião Torácico</option>
                            <option value="225250 Médico Ginecologista e Obstetra">225250 Médico Ginecologista e Obstetra</option>
                            <option value="225255 Médico Mastologista">225255 Médico Mastologista</option>
                            <option value="225260 Médico Neurocirurgião">225260 Médico Neurocirurgião</option>
                            <option value="225265 Médico Oftalmologista">225265 Médico Oftalmologista</option>
                            <option value="225270 Médico Ortopedista e Traumatologista">225270 Médico Ortopedista e Traumatologista</option>
                            <option value="225275 Médico Otorrinolaringologista">225275 Médico Otorrinolaringologista</option>
                            <option value="225280 Médico Proctologista">225280 Médico Proctologista</option>
                            <option value="225285 Médico Urologista">225285 Médico Urologista</option>
                            <option value="225290 Médico Cancerologista Cirúrgico">225290 Médico Cancerologista Cirúrgico</option>
                            <option value="225295 Médico Cirurgião da Mão">225295 Médico Cirurgião da Mão</option>
                            <option value="225305 Médico Citopatologista">225305 Médico Citopatologista</option>
                            <option value="225310 Médico em Endoscopia">225310 Médico em Endoscopia</option>
                            <option value="225315 Médico em Medicina Nuclear">225315 Médico em Medicina Nuclear</option>
                            <option value="225320 Médico em Radiologia e Diagnóstico por Imagem">225320 Médico em Radiologia e Diagnóstico por Imagem </option>
                            <option value="225325 Médico Patologista">225325 Médico Patologista</option>
                            <option value="225330 Médico Radioterapeuta">225330 Médico Radioterapeuta</option>
                            <option value="225335 Médico Patologista Clínico / Medicina Laboratorial">225335 Médico Patologista Clínico / Medicina Laboratorial</option>
                            <option value="225340 Médico Hemoterapeuta">225340 Médico Hemoterapeuta</option>
                            <option value="225345 Médico Hiperbarista">225345 Médico Hiperbarista</option>
                            <option value="225350 Médico Neurofisiologista">225350 Médico Neurofisiologista</option>
                            <option value="239425 Psicopedagogo">239425 Psicopedagogo</option>
                            <option value="251510 Psicólogo Clínico">251510 Psicólogo Clínico</option>
                            <option value="251545 Neuropsicólogo">251545 Neuropsicólogo</option>
                            <option value="251550 Psicanalista">251550 Psicanalista</option>
                            <option value="251605 Assistente Social">251605 Assistente Social</option>
                            <option value="322205 Técnico de Enfermagem">322205 Técnico de Enfermagem</option>
                            <option value="322220 Técnico de Enfermagem Psiquiátrica">322220 Técnico de Enfermagem Psiquiátrica</option>
                            <option value="322225 Instrumentador Cirúrgico">322225 Instrumentador Cirúrgico</option>
                            <option value="322230 Auxiliar de Enfermagem">322230 Auxiliar de Enfermagem</option>
                            <option value="516210 Cuidador de Idosos">516210 Cuidador de Idosos</option>
                            <option value=">999999 CBO Desconhecido ou não Informado pelo Solicitante">999999 CBO Desconhecido ou não Informado pelo Solicitante</option>
                        </select>
                  </div>
              </div>
              <div class="row">
                  <div class="form-group col-lg-6">
                   <h5>Favorecido 1</h5>
                      <input type="text" name= "favorecido1" class="form-control" placeholder="Favorecido" id="cns">
                  </div>
                  <div class="form-group col-lg-6">
                  <h5>Banco 1</h5>
                    <select class="form-control" name="banco1" id="CID10">
                          <option value="#">Selecione...</option>                      
                          <option value="BANCO DO BRASIL">Banco do Brasil</option>
                          <option value="CAIXA ECONôMICA">Caixa Econômica Federal</option>
                          <option value="Bradesco">Bradesco</option>
                          <option value="SANTANDER">Santander</option>
                          <option value="ITAú / UNIBANCO">Itaú / Unibanco</option>
                        </select>
                  </div>
                  <div class="form-group col-lg-4">
                  <h5>Agência 1</h5>
                    <input name="agencia1" type="text" class="form-control" placeholder="Agência" id="medico">
                  </div>
                  <div class="form-group col-lg-4">
                  <h5>Conta 1</h5>
                    <input name="conta1" type="text" class="form-control" placeholder="Conta" id="registro">
                  </div>
                  <div class="form-group col-lg-4">
                    <h5>Tipo de Conta 1</h5>
                    <select class="form-control" name="tipo1" id="tipo1">
                          <option value="#">Selecione...</option>                      
                          <option value="Conta Corrente">Conta Corrente</option>
                          <option value="Conta Poupança">Conta Poupança</option>
                        </select>
                  </div>
              </div>
              <div class="row">
                  <div class="form-group col-lg-6">
                   <h5>Favorecido 2</h5>
                      <input type="text" name= "favorecido2" class="form-control" placeholder="Favorecido" id="favorecido2">
                  </div>
                  <div class="form-group col-lg-6">
                  <h5>Banco 2</h5>
                    <select class="form-control" name="banco2" id="banco2">
                          <option value="#">Selecione...</option>                      
                          <option value="BANCO DO BRASIL">Banco do Brasil</option>
                          <option value="CAIXA ECONôMICA">Caixa Econômica Federal</option>
                          <option value="Bradesco">Bradesco</option>
                          <option value="SANTANDER">Santander</option>
                          <option value="ITAú / UNIBANCO">Itaú / Unibanco</option>
                        </select>
                  </div>
                  <div class="form-group col-lg-4">
                  <h5>Agência 2</h5>
                    <input name="agencia2" type="text" class="form-control" placeholder="Agência" id="agencia2">
                  </div>
                  <div class="form-group col-lg-4">
                  <h5>Conta 2</h5>
                    <input name="conta2" type="text" class="form-control" placeholder="Conta" id="conta2">
                  </div>
                  <div class="form-group col-lg-4">
                    <h5>Tipo de Conta 2</h5>
                    <select class="form-control" name="tipo2" id="tipo2">
                          <option value="#">Selecione...</option>                      
                          <option value="Conta Corrente">Conta Corrente</option>
                          <option value="Conta Poupança">Conta Poupança</option>
                        </select>
                  </div>
              </div>
              <div class="row">
                  <div class="form-group col-lg-6">
                   <h5>Curso fora da Área Médica</h5>
                      <input type="text" name= "#" class="form-control" placeholder="Nome do Curso">
                  </div>
                  <div class="form-group col-lg-6">
                    <h5>Responsável Técnico</h5>
                        <input type="text" name= "#" class="form-control" placeholder="Responsável Técnico">
                  </div>
                  <div class="form-group col-lg-12">
                  <h5>Especializações na Área do Desenvolvimento SNC</h5>
                    <input name="rua" type="text" class="form-control" placeholder="Especializações">
                  </div>
                  <div class="form-group col-lg-6">
                  <h5>Curso de Especialização 1</h5>
                    <input name="rua" type="text" class="form-control" placeholder="Informações">
                  </div>
                  <div class="form-group col-lg-6">
                  <h5>Curso de Especialização 2</h5>
                    <input name="rua" type="text" class="form-control" placeholder="Informações">
                  </div>
                  <div class="form-group col-lg-6">
                    <h5>Pós-Graduação (Atuação Clínica)</h5>
                      <input name="rua" type="text" class="form-control" placeholder="Pós-Graduação">
                  </div>
                  <div class="form-group col-lg-6">
                    <h5>Curso Padovan - Módulos</h5>
                      <input name="rua" type="text" class="form-control" placeholder="Curso Padovan">
                  </div>
                  <div class="form-group col-lg-6">
                    <h5>Curso Padovan - Completo</h5>
                      <input name="rua" type="text" class="form-control" placeholder="Curso Padovan">
                  </div>
                  <div class="form-group col-lg-6">
                    <h5>Mestrado</h5>
                      <input name="rua" type="text" class="form-control" placeholder="Mestrado">
                  </div>
                  <div class="form-group col-lg-6">
                    <h5>Doutorado</h5>
                      <input name="rua" type="text" class="form-control" placeholder="Doutorado">
                  </div>
                  <div class="form-group col-lg-6">
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
                  </div>
                </div>
              </div>
            </div>
            <div id="seeModal" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Visualizar Dados</h4>
                  </div>
                  <div class="modal-body">
                  <div class="box">
                  
                  <!-- /.box-header -->
                    <form action="../../../../sistema/php/apresentaDados/profissional/insert.php" method="POST">
              <div class="box-body">
                <div class="row">
                  <div class="form-group col-lg-12">
                  <h5>Nome do Profissional</h5>
                      <input disabled type="text" name= "nome" class="form-control" placeholder="Nome" id="recipient-name">
                  </div>
                  <div class="form-group col-lg-4">
                        <h5>Sexo</h5>
                        <select disabled class="form-control" name="sexo" id="sexo">
                          <option value="#">Selecione...</option>                      
                          <option value="feminino">Feminino</option>
                          <option value="masculino">Masculino</option>
                          <option value="outros">Outros</option>
                        </select>
                  </div>
                  <div class="form-group col-lg-4">
                        <h5>Data de Nascimento</h5>
                        <input disabled type="text" name= "nascimento" class="form-control" placeholder="Data de Nascimento" OnKeyPress="formatar('##/##/####', this)" maxlength="10" id="nascimento">
                  </div>
                  <div class="form-group col-lg-4">
                        <h5>Atividade</h5>
                        <select disabled class="form-control" name="atividade" id="atividade">
                          <option value="#">Selecione...</option>                      
                          <option value="ativo">Ativo</option>
                          <option value="inativo">Inativo</option>
                        </select>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-lg-8">
                  <h5>Email</h5>
                      <input disabled type="email" name= "email" class="form-control" placeholder="Email" id="detalhes">
                  </div>
                  <div class="form-group col-lg-4">
                  <h5>Telefone</h5>
                    <input disabled name="telefone" type="text" class="form-control" placeholder="Telefone" OnKeyPress="formatar('##-#####-####', this)" maxlength="13" id="telefone">
                  </div>
                  <div class="form-group col-lg-4">
                  <h5>CPF</h5>
                    <input disabled name="cpf" type="text" class="form-control" placeholder="CPF" OnKeyPress="formatar('###.###.###-##', this)" maxlength="14" id="cpf">
                  </div>
                  <div class="form-group col-lg-4">
                  <h5>RG</h5>
                    <input disabled name="rg" type="text" class="form-control" placeholder="RG" id="rg">
                  </div>
                  <div class="form-group col-lg-4">
                  <h5>Órgão Expeditor</h5>
                    <select disabled class="form-control" name="orgao" id="expeditor">
                          <option value="#">Selecione...</option>                      
                          <option value="ssp">SSP</option>
                          <option value="detran">Detran</option>
                          <option value="cartorio">Cartório</option>
                          <option value="pf">Polícia Federal</option>
                        </select>
                  </div>
              </div>
                <div class="row">
                  <div class="form-group col-lg-3">
                  <h5>CEP</h5>
                    <input disabled name="cep" type="text" id="cep" value="" size="60" maxlength="8" onblur="pesquisacep(this.value);" class="form-control" placeholder="CEP"/>
                  </div>
                  <div class="form-group col-lg-9">
                  <h5>Rua</h5>
                    <input disabled name="rua" type="text" id="rua" size="60" class="form-control" placeholder="Rua">
                  </div>
                  <div class="form-group col-lg-6">
                    <h5>Número</h5>
                    <input disabled type="text" name= "numero" class="form-control" placeholder="Número" id="numero">
                  </div>
                  <div class="form-group col-lg-6">
                    <h5>Complemento</h5>
                    <input disabled type="text" name= "complemento" class="form-control" placeholder="Complemento" id="complemento">
                  </div>
                  <div class="form-group col-lg-5">
                  <h5>Bairro</h5>
                    <input disabled name="bairro" type="text" id="bairro" size="60" class="form-control" placeholder="Bairro">
                  </div>
                  <div class="form-group col-lg-4">
                  <h5>Cidade</h5>
                    <input disabled name="cidade" type="text" id="cidade" size="60" class="form-control" placeholder="Cidade">
                  </div>
                  <div class="form-group col-lg-3">
                  <h5>UF</h5>
                    <input disabled name="uf" type="text" id="uf" size="60" class="form-control" placeholder="UF">
                  </div>
              </div>
              <div class="row">
                  <div class="form-group col-lg-6">
                  <h5>Conselho Profissional</h5>
                      <select disabled class="form-control" name="conselho" id="conselho">
                          <option value="#">Selecione...</option>                      
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
                  <div class="form-group col-lg-6">
                  <h5>Número do Conselho</h5>
                    <input disabled name="num_conselho" type="text" class="form-control" placeholder="Número do Conselho" id="num_conselho">
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-lg-6">
                  <h5>UF do Conselho</h5>
                      <select disabled class="form-control" name="uf_conselho" id="uf_conselho">
                          <option value="#">Selecione...</option>                      
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
                  <div class="form-group col-lg-6">
                  <h5>Especialidade/Código CBO</h5>
                        <select disabled class="form-control" name="cbo" id="cbo">
                            <option>Selecione...</option>
                            <option value="201115 Geneticista">201115 Geneticista</option>
                            <option value="203015 Pesquisador em Biologia de Micro-organismos e Parasitas">203015 Pesquisador em Biologia de Micro-organismos e Parasitas</option>
                            <option value="213150 Físico Médico">213150 Físico Médico</option>
                            <option value="221105 Biólogo">221105 Biólogo</option>
                            <option value="223204 Cirurgião Dentista - Auditor">223204 Cirurgião Dentista - Auditor</option>
                            <option value="AC">223208 Cirurgião Dentista - Clínico Geral</option>
                            <option value="223208 Cirurgião Dentista - Clínico Geral">223212 Cirurgião Dentista - Endodontista</option>
                            <option value="223216 Cirurgião Dentista - Epidemiologista">223216 Cirurgião Dentista - Epidemiologista</option>
                            <option value="223220 Cirurgião Dentista - Estomatologista">223220 Cirurgião Dentista - Estomatologista</option>
                            <option value="223224 Cirurgião Dentista - Implantodontista">223224 Cirurgião Dentista - Implantodontista</option>
                            <option value="223228 Cirurgião Dentista - Odontogeriatra">223228 Cirurgião Dentista - Odontogeriatra</option>
                            <option value="223232 Cirurgião Dentista - Odontologista Legal">223232 Cirurgião Dentista - Odontologista Legal</option>
                            <option value="223236 Cirurgião Dentista - Odontopediatra">223236 Cirurgião Dentista - Odontopediatra</option>
                            <option value="223240 Cirurgião Dentista - Ortopedista E Ortodontista">223240 Cirurgião Dentista - Ortopedista E Ortodontista</option>
                            <option value="223244 Cirurgião Dentista - Patologista Bucal">223244 Cirurgião Dentista - Patologista Bucal</option>
                            <option value="223248 Cirurgião Dentista - Periodontista">223248 Cirurgião Dentista - Periodontista</option>
                            <option value="223252 Cirurgião Dentista - Protesiólogo Bucomaxilofacial">223252 Cirurgião Dentista - Protesiólogo Bucomaxilofacial</option>
                            <option value="223256 Cirurgião Dentista - Protesista">223256 Cirurgião Dentista - Protesista</option>
                            <option value="223260 Cirurgião Dentista - Radiologista">223260 Cirurgião Dentista - Radiologista</option>
                            <option value="223264 Cirurgião Dentista - Reabilitador Oral">223264 Cirurgião Dentista - Reabilitador Oral</option>
                            <option value="223268 Cirurgião Dentista - Traumatologista Bucomaxilofacial">223268 Cirurgião Dentista - Traumatologista Bucomaxilofacial</option>
                            <option value="223272 Cirurgião Dentista de Saúde Coletiva">223272 Cirurgião Dentista de Saúde Coletiva</option>
                            <option value="223276 Cirurgião Dentista – Odontologia do Trabalho">223276 Cirurgião Dentista – Odontologia do Trabalho</option>
                            <option value="223280 Cirurgião Dentista - Dentística">223280 Cirurgião Dentista - Dentística</option>
                            <option value="223284 Cirurgião Dentista - Disfunção Temporomandibular e Dor Orofacial">223284 Cirurgião Dentista - Disfunção Temporomandibular e Dor Orofacial</option>
                            <option value="223288 Cirurgião Dentista - Odontologia para Pacientes com Necessidades Especiais">223288 Cirurgião Dentista - Odontologia para Pacientes com Necessidades Especiais</option>
                            <option value="223293 Cirurgião-Dentista da Estratégia de Saúde da Família">223293 Cirurgião-Dentista da Estratégia de Saúde da Família</option>
                            <option value="223505 Enfermeiro">223505 Enfermeiro</option>
                            <option value="223605 Fisioterapeuta Geral">223605 Fisioterapeuta Geral</option>
                            <option value="223710 Nutricionista">223710 Nutricionista</option>
                            <option value="223810 Fonoaudiólogo">223810 Fonoaudiólogo</option>
                            <option value="223905 Terapeuta Ocupacional">223905 Terapeuta Ocupacional</option>
                            <option value="223910 Ortoptista">223910 Ortoptista</option>
                            <option value="225103 Médico Infectologista">225103 Médico Infectologista</option>
                            <option value="225105 Médico Acupunturista">225105 Médico Acupunturista</option>
                            <option value="225106 Médico Legista">225106 Médico Legista</option>
                            <option value="225109 Médico Nefrologista">225109 Médico Nefrologista</option>
                            <option value="225110 Médico Alergista e Imunologista">225110 Médico Alergista e Imunologista</option>
                            <option value="225112 Médico Neurologista">225112 Médico Neurologista</option>
                            <option value="225115 Médico Angiologista">225115 Médico Angiologista</option>
                            <option value="225118 Médico Nutrologista">225118 Médico Nutrologista</option>
                            <option value="225120 Médico Cardiologista">225120 Médico Cardiologista</option>
                            <option value="225121 Médico Oncologista Clínico">225121 Médico Oncologista Clínico</option>
                            <option value="225122 Médico Cancerologista Pediátrico">225122 Médico Cancerologista Pediátrico</option>
                            <option value="225124 Médico Pediatra">225124 Médico Pediatra</option>
                            <option value="225125 Médico Clínico">225125 Médico Clínico</option>
                            <option value="225127 Médico Pneumologista">225127 Médico Pneumologista</option>
                            <option value="225130 Médico de Família e Comunidade">225130 Médico de Família e Comunidade</option>
                            <option value="225133 Médico Psiquiatra">225133 Médico Psiquiatra</option>
                            <option value="225135 Médico Dermatologista">225135 Médico Dermatologista</option>
                            <option value="225136 Médico Reumatologista">225136 Médico Reumatologista</option>
                            <option value="225139 Médico Sanitarista">225139 Médico Sanitarista</option>
                            <option value="225140 Médico do Trabalho">225140 Médico do Trabalho</option>
                            <option value="225142 Médico da Estratégia de Saúde da Família">225142 Médico da Estratégia de Saúde da Família</option>
                            <option value="225145 Médico em Medicina de Tráfego">225145 Médico em Medicina de Tráfego</option>
                            <option value="225148 Médico Anatomopatologista">225148 Médico Anatomopatologista</option>
                            <option value="225150 Médico em Medicina Intensiva">225150 Médico em Medicina Intensiva</option>
                            <option value="225151 Médico Anestesiologista">225151 Médico Anestesiologista</option>
                            <option value="225155 Médico Endocrinologista e Metabologista">225155 Médico Endocrinologista e Metabologista</option>
                            <option value="225160 Médico Fisiatra">225160 Médico Fisiatra</option>
                            <option value="225165 Médico Gastroenterologista">225165 Médico Gastroenterologista</option>
                            <option value="225170 Médico Generalista">225170 Médico Generalista</option>
                            <option value="225175 Médico Geneticista">225175 Médico Geneticista</option>
                            <option value="225180 Médico Geriatra">225180 Médico Geriatra</option>
                            <option value="225185 Médico Hematologista">225185 Médico Hematologista</option>
                            <option value="225195 Médico Homeopata">225195 Médico Homeopata</option>
                            <option value="225203 Médico em Cirurgia Vascular">225203 Médico em Cirurgia Vascular</option>
                            <option value="225210 Médico Cirurgião Cardiovascular">225210 Médico Cirurgião Cardiovascular</option>
                            <option value="225215 Médico Cirurgião de Cabeça e Pescoço">225215 Médico Cirurgião de Cabeça e Pescoço</option>
                            <option value="225220 Médico Cirurgião do Aparelho Digestivo">225220 Médico Cirurgião do Aparelho Digestivo</option>
                            <option value="225225 Médico Cirurgião Geral">225225 Médico Cirurgião Geral</option>
                            <option value="225230 Médico Cirurgião Pediátrico">225230 Médico Cirurgião Pediátrico</option>
                            <option value="225235 Médico Cirurgião Plástico">225235 Médico Cirurgião Plástico</option>
                            <option value="225240 Médico Cirurgião Torácico">225240 Médico Cirurgião Torácico</option>
                            <option value="225250 Médico Ginecologista e Obstetra">225250 Médico Ginecologista e Obstetra</option>
                            <option value="225255 Médico Mastologista">225255 Médico Mastologista</option>
                            <option value="225260 Médico Neurocirurgião">225260 Médico Neurocirurgião</option>
                            <option value="225265 Médico Oftalmologista">225265 Médico Oftalmologista</option>
                            <option value="225270 Médico Ortopedista e Traumatologista">225270 Médico Ortopedista e Traumatologista</option>
                            <option value="225275 Médico Otorrinolaringologista">225275 Médico Otorrinolaringologista</option>
                            <option value="225280 Médico Proctologista">225280 Médico Proctologista</option>
                            <option value="225285 Médico Urologista">225285 Médico Urologista</option>
                            <option value="225290 Médico Cancerologista Cirúrgico">225290 Médico Cancerologista Cirúrgico</option>
                            <option value="225295 Médico Cirurgião da Mão">225295 Médico Cirurgião da Mão</option>
                            <option value="225305 Médico Citopatologista">225305 Médico Citopatologista</option>
                            <option value="225310 Médico em Endoscopia">225310 Médico em Endoscopia</option>
                            <option value="225315 Médico em Medicina Nuclear">225315 Médico em Medicina Nuclear</option>
                            <option value="225320 Médico em Radiologia e Diagnóstico por Imagem">225320 Médico em Radiologia e Diagnóstico por Imagem </option>
                            <option value="225325 Médico Patologista">225325 Médico Patologista</option>
                            <option value="225330 Médico Radioterapeuta">225330 Médico Radioterapeuta</option>
                            <option value="225335 Médico Patologista Clínico / Medicina Laboratorial">225335 Médico Patologista Clínico / Medicina Laboratorial</option>
                            <option value="225340 Médico Hemoterapeuta">225340 Médico Hemoterapeuta</option>
                            <option value="225345 Médico Hiperbarista">225345 Médico Hiperbarista</option>
                            <option value="225350 Médico Neurofisiologista">225350 Médico Neurofisiologista</option>
                            <option value="239425 Psicopedagogo">239425 Psicopedagogo</option>
                            <option value="251510 Psicólogo Clínico">251510 Psicólogo Clínico</option>
                            <option value="251545 Neuropsicólogo">251545 Neuropsicólogo</option>
                            <option value="251550 Psicanalista">251550 Psicanalista</option>
                            <option value="251605 Assistente Social">251605 Assistente Social</option>
                            <option value="322205 Técnico de Enfermagem">322205 Técnico de Enfermagem</option>
                            <option value="322220 Técnico de Enfermagem Psiquiátrica">322220 Técnico de Enfermagem Psiquiátrica</option>
                            <option value="322225 Instrumentador Cirúrgico">322225 Instrumentador Cirúrgico</option>
                            <option value="322230 Auxiliar de Enfermagem">322230 Auxiliar de Enfermagem</option>
                            <option value="516210 Cuidador de Idosos">516210 Cuidador de Idosos</option>
                            <option value=">999999 CBO Desconhecido ou não Informado pelo Solicitante">999999 CBO Desconhecido ou não Informado pelo Solicitante</option>
                        </select>
                  </div>
              </div>
              <div class="row">
                  <div class="form-group col-lg-6">
                   <h5>Favorecido 1</h5>
                      <input disabled type="text" name= "favorecido1" class="form-control" placeholder="Favorecido" id="cns">
                  </div>
                  <div class="form-group col-lg-6">
                  <h5>Banco 1</h5>
                    <select disabled class="form-control" name="banco1" id="CID10">
                          <option value="#">Selecione...</option>                      
                          <option value="BANCO DO BRASIL">Banco do Brasil</option>
                          <option value="CAIXA ECONôMICA">Caixa Econômica Federal</option>
                          <option value="Bradesco">Bradesco</option>
                          <option value="SANTANDER">Santander</option>
                          <option value="ITAú / UNIBANCO">Itaú / Unibanco</option>
                        </select>
                  </div>
                  <div class="form-group col-lg-4">
                  <h5>Agência 1</h5>
                    <input disabled name="agencia1" type="text" class="form-control" placeholder="Agência" id="medico">
                  </div>
                  <div class="form-group col-lg-4">
                  <h5>Conta 1</h5>
                    <input disabled name="conta1" type="text" class="form-control" placeholder="Conta" id="registro">
                  </div>
                  <div class="form-group col-lg-4">
                    <h5>Tipo de Conta 1</h5>
                    <select disabled class="form-control" name="tipo1" id="tipo1">
                          <option value="#">Selecione...</option>                      
                          <option value="Conta Corrente">Conta Corrente</option>
                          <option value="Conta Poupança">Conta Poupança</option>
                        </select>
                  </div>
              </div>
              <div class="row">
                  <div class="form-group col-lg-6">
                   <h5>Favorecido 2</h5>
                      <input disabled type="text" name= "favorecido2" class="form-control" placeholder="Favorecido" id="favorecido2">
                  </div>
                  <div class="form-group col-lg-6">
                  <h5>Banco 2</h5>
                    <select disabled class="form-control" name="banco2" id="banco2">
                          <option value="#">Selecione...</option>                      
                          <option value="BANCO DO BRASIL">Banco do Brasil</option>
                          <option value="CAIXA ECONôMICA">Caixa Econômica Federal</option>
                          <option value="Bradesco">Bradesco</option>
                          <option value="SANTANDER">Santander</option>
                          <option value="ITAú / UNIBANCO">Itaú / Unibanco</option>
                        </select>
                  </div>
                  <div class="form-group col-lg-4">
                  <h5>Agência 2</h5>
                    <input disabled name="agencia2" type="text" class="form-control" placeholder="Agência" id="agencia2">
                  </div>
                  <div class="form-group col-lg-4">
                  <h5>Conta 2</h5>
                    <input disabled name="conta2" type="text" class="form-control" placeholder="Conta" id="conta2">
                  </div>
                  <div class="form-group col-lg-4">
                    <h5>Tipo de Conta 2</h5>
                    <select disabled class="form-control" name="tipo2" id="tipo2">
                          <option value="#">Selecione...</option>                      
                          <option value="Conta Corrente">Conta Corrente</option>
                          <option value="Conta Poupança">Conta Poupança</option>
                        </select>
                  </div>
              </div>
              <div class="row">
                  <div class="form-group col-lg-6">
                   <h5>Curso fora da Área Médica</h5>
                      <input disabled type="text" name= "#" class="form-control" placeholder="Nome do Curso">
                  </div>
                  <div class="form-group col-lg-6">
                    <h5>Responsável Técnico</h5>
                        <input disabled type="text" name= "#" class="form-control" placeholder="Responsável Técnico">
                  </div>
                  <div class="form-group col-lg-12">
                  <h5>Especializações na Área do Desenvolvimento SNC</h5>
                    <input disabled name="rua" type="text" class="form-control" placeholder="Especializações">
                  </div>
                  <div class="form-group col-lg-6">
                  <h5>Curso de Especialização 1</h5>
                    <input disabled name="rua" type="text" class="form-control" placeholder="Informações">
                  </div>
                  <div class="form-group col-lg-6">
                  <h5>Curso de Especialização 2</h5>
                    <input disabled name="rua" type="text" class="form-control" placeholder="Informações">
                  </div>
                  <div class="form-group col-lg-6">
                    <h5>Pós-Graduação (Atuação Clínica)</h5>
                      <input disabled name="rua" type="text" class="form-control" placeholder="Pós-Graduação">
                  </div>
                  <div class="form-group col-lg-6">
                    <h5>Curso Padovan - Módulos</h5>
                      <input disabled name="rua" type="text" class="form-control" placeholder="Curso Padovan">
                  </div>
                  <div class="form-group col-lg-6">
                    <h5>Curso Padovan - Completo</h5>
                      <input disabled name="rua" type="text" class="form-control" placeholder="Curso Padovan">
                  </div>
                  <div class="form-group col-lg-6">
                    <h5>Mestrado</h5>
                      <input disabled name="rua" type="text" class="form-control" placeholder="Mestrado">
                  </div>
                  <div class="form-group col-lg-6">
                    <h5>Doutorado</h5>
                      <input disabled name="rua" type="text" class="form-control" placeholder="Doutorado">
                  </div>
                  <div class="form-group col-lg-6">
                    <h5>Anos de Trabalhos</h5>
                      <input disabled name="rua" type="text" class="form-control" placeholder="Anos Completos">
                  </div>
              </div>
               <div class="modal-footer">
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

<script type="text/javascript">
    $('#exampleModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal

      var recipient = button.data('whatever') // Extract info from data-* attributes
      var recipientnome = button.data('whatevernome')
      var recipientdetalhes = button.data('whateverdetalhes')
      var recipientnasc = button.data('whatevernasc')
      var recipientcpf = button.data('whatevercpf')
      var recipienttel = button.data('whatevertel')
      var recipientsexo = button.data('whateversexo')
      var recipientcep = button.data('whatevercep')
      var recipientrua = button.data('whateverrua')
      var recipientnumero = button.data('whatevernumero')
      var recipientcomplemento = button.data('whatevercomp')
      var recipientbairro = button.data('whateverbairro')
      var recipientcidade = button.data('whatevercity')
      var recipientestuf = button.data('whateveruf')
      var recipientrg = button.data('whatevernomeres')
      var recipientexprg = button.data('whatevercpfres')
      var recipientatividade = button.data('whatevertelres')
      var recipientconselho = button.data('whateverval')
      var recipientnumconselho = button.data('whateverestadocv') 
      var recipientufconselho = button.data('whatevercartao')
      var recipientcbo = button.data('whateveresp')
      var recipientCID10 = button.data('whateverCID10')
      var recipientmedicoenc = button.data('whatevermedico')
      var recipientregistroenc = button.data('whateverreg')
      var recipientop = button.data('whateverop')

      var recipientfav = button.data('whateverfav')
      var recipientbanco = button.data('whateverbanco')
      var recipientag = button.data('whateverag')
      var recipientconta = button.data('whateverconta')
      var recipienttipo = button.data('whatevertipo')

      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)

      modal.find('#id-curso').val(recipient)
      modal.find('#recipient-name').val(recipientnome)
      modal.find('#detalhes').val(recipientdetalhes)
      modal.find('#nascimento').val(recipientnasc)
      modal.find('#conselho').val(recipientconselho)
      modal.find('#cpf').val(recipientcpf)
      modal.find('#telefone').val(recipienttel)
      modal.find('#rg').val(recipientrg)
      modal.find('#expeditor').val(recipientexprg)
      modal.find('#atividade').val(recipientatividade)
      modal.find('#sexo').val(recipientsexo)
      modal.find('#num_conselho').val(recipientnumconselho)
      modal.find('#cep').val(recipientcep)
      modal.find('#rua').val(recipientrua)
      modal.find('#numero').val(recipientnumero)
      modal.find('#bairro').val(recipientbairro)
      modal.find('#complemento').val(recipientcomplemento)
      modal.find('#cidade').val(recipientcidade)
      modal.find('#uf').val(recipientestuf)
      modal.find('#uf_conselho').val(recipientufconselho)
      modal.find('#cbo').val(recipientcbo)
      modal.find('#CID10').val(recipientCID10)
      modal.find('#medico').val(recipientmedicoenc)
      modal.find('#registro').val(recipientregistroenc)
      modal.find('#tipo1').val(recipientop)

      modal.find('#favorecido2').val(recipientfav)
      modal.find('#banco2').val(recipientbanco)
      modal.find('#agencia2').val(recipientag)
      modal.find('#conta2').val(recipientconta)
      modal.find('#tipo2').val(recipienttipo)
      
    })

    $('#seeModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal

      var recipient = button.data('whatever') // Extract info from data-* attributes
      var recipientnome = button.data('whatevernome')
      var recipientdetalhes = button.data('whateverdetalhes')
      var recipientnasc = button.data('whatevernasc')
      var recipientcpf = button.data('whatevercpf')
      var recipienttel = button.data('whatevertel')
      var recipientsexo = button.data('whateversexo')
      var recipientcep = button.data('whatevercep')
      var recipientrua = button.data('whateverrua')
      var recipientnumero = button.data('whatevernumero')
      var recipientcomplemento = button.data('whatevercomp')
      var recipientbairro = button.data('whateverbairro')
      var recipientcidade = button.data('whatevercity')
      var recipientestuf = button.data('whateveruf')
      var recipientrg = button.data('whatevernomeres')
      var recipientexprg = button.data('whatevercpfres')
      var recipientatividade = button.data('whatevertelres')
      var recipientconselho = button.data('whateverval')
      var recipientnumconselho = button.data('whateverestadocv') 
      var recipientufconselho = button.data('whatevercartao')
      var recipientcbo = button.data('whateveresp')
      var recipientCID10 = button.data('whateverCID10')
      var recipientmedicoenc = button.data('whatevermedico')
      var recipientregistroenc = button.data('whateverreg')
      var recipientop = button.data('whateverop')

      var recipientfav = button.data('whateverfav')
      var recipientbanco = button.data('whateverbanco')
      var recipientag = button.data('whateverag')
      var recipientconta = button.data('whateverconta')
      var recipienttipo = button.data('whatevertipo')

      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)

      modal.find('#id-curso').val(recipient)
      modal.find('#recipient-name').val(recipientnome)
      modal.find('#detalhes').val(recipientdetalhes)
      modal.find('#nascimento').val(recipientnasc)
      modal.find('#conselho').val(recipientconselho)
      modal.find('#cpf').val(recipientcpf)
      modal.find('#telefone').val(recipienttel)
      modal.find('#rg').val(recipientrg)
      modal.find('#expeditor').val(recipientexprg)
      modal.find('#atividade').val(recipientatividade)
      modal.find('#sexo').val(recipientsexo)
      modal.find('#num_conselho').val(recipientnumconselho)
      modal.find('#cep').val(recipientcep)
      modal.find('#rua').val(recipientrua)
      modal.find('#numero').val(recipientnumero)
      modal.find('#bairro').val(recipientbairro)
      modal.find('#complemento').val(recipientcomplemento)
      modal.find('#cidade').val(recipientcidade)
      modal.find('#uf').val(recipientestuf)
      modal.find('#uf_conselho').val(recipientufconselho)
      modal.find('#cbo').val(recipientcbo)
      modal.find('#CID10').val(recipientCID10)
      modal.find('#medico').val(recipientmedicoenc)
      modal.find('#registro').val(recipientregistroenc)
      modal.find('#tipo1').val(recipientop)

      modal.find('#favorecido2').val(recipientfav)
      modal.find('#banco2').val(recipientbanco)
      modal.find('#agencia2').val(recipientag)
      modal.find('#conta2').val(recipientconta)
      modal.find('#tipo2').val(recipienttipo)
      
    })
  </script>

</body>
</html>
