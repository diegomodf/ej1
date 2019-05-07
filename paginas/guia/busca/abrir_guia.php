<?php
    session_start();
    if(!isset($_SESSION['nome']) || !isset($_SESSION['email']) || !isset($_SESSION['funcao'])){
        header('Location: ../../../index.php?erro=1');    
    }


  $guia = $_GET['guia'];
  require_once('../../../sistema/php/conectaBd/index.php');
  $objDb = new db();
  $link = $objDb->conecta_mysql();
  $sql = " SELECT * FROM guias where numero_guia_principal = $guia";
  $resultado = mysqli_query($link, $sql);
  if($resultado){
  while($registros = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
    $seguradora = $registros['id_ans'];
    echo $seguradora;
    $guiap = $registros['numero_guia_principal'];
    $guiao = $registros['numero_guia_prestador'];
    $data_autorizacao = date('d/m/Y', strtotime($registros['data_autorizacao']));
    $data_validade = date('d/m/Y', strtotime($registros['data_validade']));
    $cpf = $registros['cpf'];
    $senha = $registros['senha'];
    $ngo = $registros['numero_guia_operadora'];

    $cartao = $registros['cartao_operadora'];
    $validade = date('d/m/Y', strtotime($registros['validade_carteira']));
    $nome = $registros['nome_paciente'];
    $saude = $registros['cartao_saude'];
    $rn = $registros['atendimento_rn'];

    $id = $registros['id_proc'];
    $contrato = $registros['nome_contratado'];
    $nps = $registros['nome_profissional_solicitante'];
    $cp = $registros['conselho_profissional'];
    $nc = $registros['numero_conselho'];
    $ufc = $registros['uf_conselho'];
    $codigo = $registros['codigo_cbo'];

    $atendimento = $registros['atendimento'];
    $data = $registros['data_solicitacao'];
    $ic = $registros['indicacao_acidente'];
    $coce = $registros['codigo_operadora_ce'];
    $ncce = $registros['nome_contrato_ce'];
    $ccns = $registros['codigo_cnes_ce'];

    $ta = $registros['tipo_atendimento'];
    $ia = $registros['indicacao_acidente'];
    $mc = $registros['motivo_consulta'];
    $mec = $registros['motivo_encerramento_consulta'];

    $sequencia = $registros['sequencia'];
    $grau = $registros['grau_part'];
    $cocpf = $registros['codigo_operadora_cpf'];
    $nm = $registros['nome_medico'];
    $cons = $registros['conselho'];
    $cnum = $registros['conselho_num'];
    $uf = $registros['UF'];
    $ccbo = $registros['cod_cbo'];

  }
  }else{
  echo 'Erro na consulta dos emails no banco de dados!';
  }

?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
  <?php include '../../arquivos-include/head.php';?>
  <link rel="stylesheet" href="../../../sistema/css/cadastro/guia.css">
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

  <style type="text/css">
      .carregando{
        color:#ff0000;
        display:none;
      }

      .carrega{
        color:#ff0000;
        display:none;
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
            <?php

            if($seguradora == 'CAIXA SEGURADORA'){
              echo '<img src="imagens/image.png" class="user-image" style="width:30%; margin-left:330px;" alt="User Image">';
            }
            if($seguradora == 'E-VIDA'){
              echo '<img src="imagens/evida.png" class="user-image" style="width:30%; margin-left:330px;" alt="User Image">';
            }
            if($seguradora == 'BRADESCO SAUDE'){
              echo '<img src="imagens/bradescosaude.png" class="user-image" style="width:30%; margin-left:330px;" alt="User Image">';
            }
            if($seguradora == 'AMHP'){
              echo '<img src="imagens/amhp.jpg" class="user-image" style="width:30%; margin-left:330px;" alt="User Image">';
            }
            if($seguradora == 'FUSEX'){
              echo '<img src="imagens/fusex.png" class="user-image" style="width:30%; margin-left:330px;" alt="User Image">';
            }


            ?>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
                  <div style="margin-left: 50px;">
                  </div>
                  <form action="../../../sistema/php/apresentaDados/guia/index.php" method="POST">
              <div class="box-body">
                <div class="centered"><a>GUIA DE SP/SADT - INCLUSÃO</a></div>
                <div class="row">
                  <div class="form-group col-lg-6">
                  <h5>1- Registro ANS</h5>
                    <select class="form-control" name="registro" id="recipient-id" required>
                    <option value=""><?php echo $seguradora?></option>
                  <?php 
                    require_once('../../../sistema/php/conectaBd/index.php');
                    $objDb = new db();
                    $link = $objDb->conecta_mysql();
                    $sql = " SELECT * FROM operadora";
                    $resultado = mysqli_query($link, $sql);
                    if($resultado){
                    while($registro = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                    echo '<option value="'.$registro['nome'].'">'.$registro['nome'].'</option>';
                      }
                    }else{
                      echo 'Erro na consulta dos emails no banco de dados!';
                    }
                  ?>
                  </select>
                  </div>
                  <div class="form-group col-lg-6">
                        <h5>2- Número da Guia do Prestador</h5>
                        <input type="text" name= "numero_guia_prestador" class="form-control" id="detalhes" value="<?php echo $guiao ?>">
                  </div>
                  <div class="form-group col-lg-12">
                        <h5>3- Número da Guia Principal</h5>
                        <input type="text" name= "numero_guia_principal" class="form-control" id="tipo1" value="<?php echo $guiap?>" placeholder="<?php echo $guiap?>">
                  </div>
                  <div class="form-group col-lg-6">
                        <h5>4- Data da Autorização</h5>
                        <input type="text" name= "data_autorização" class="form-control" placeholder="Data da Autorização" id="cpf" maxlength="10" value="<?php echo $data_autorizacao?>" placeholder="<?php echo $data_autorizacao?>">
                  </div>
                  <div class="form-group col-lg-6">
                        <h5>5- Senha</h5>
                        <input type="text" name= "senha" id="telefone" class="form-control" value="<?php echo $senha?>" placeholder="<?php echo $senha?>">
                  </div>
                  <div class="form-group col-lg-6">
                        <h5>6- Data da Validade da Senha</h5>
                        <input type="text" name= "data_validade" class="form-control" id="rg" maxlength="10" value="<?php echo $data_validade?>" placeholder="<?php echo $data_validade?>">
                  </div>
                  <div class="form-group col-lg-6">
                        <h5>7- Nº da Guia Atribuído pela Operadora</h5>
                        <input type="text" name= "numero_guia_operadora" id="expeditor" class="form-control" value="<?php echo $ngo?>" placeholder="<?php echo $ngo?>">
                  </div>
                </div>
                <div class="left"><a>Dados do Beneficiário</a></div>
                <div class="row">
                  <div class="form-group col-lg-6">
                        <h5>8- Número da Carteira</h5>
                        <input type="text" name= "cartao_operadora" class="form-control" id="sexo" placeholder="Número da Carteira" value="<?php echo $cartao?>">
                  </div>
                  <div class="form-group col-lg-6">
                        <h5>9- Validade da Carteira</h5>
                        <input type="text" name= "validade_carteira" class="form-control" placeholder="Validade da Carteira" id="num_conselho" value="<?php echo $validade?>" maxlength="10">
                  </div>
                  <div class="form-group col-lg-12">
                        <h5>10- Nome</h5>
                        <input type="text" name= "nome_paciente" id="cep" class="form-control" placeholder="Nome" value="<?php echo $nome?>">
                  </div>
                  <div class="form-group col-lg-6">
                        <h5>11- Cartão Nacional de Saúde</h5>
                        <input type="text" name= "cartao_saude" id= "rua" class="form-control" placeholder="Nº Nacional de Saúde" value="<?php echo $saude?>">
                  </div>
                  <div class="form-group col-lg-6">
                        <h5>12- Atendimento a RN</h5>
                        <select class="form-control" name="atendimento_rn" id="numero">

                          <option value=""><?php echo $rn?></option>                      
                          <option value="SIM">SIM</option>
                          <option value="NAO">NÃO</option>
                        </select>
                  </div>
                </div>
                <div class="left"><a>Dados do Solicitante</a></div>
                <div class="row">
                  <div class="form-group col-lg-4">
                  <h5>13- Código da Operadora</h5>
                    <input type="text" name= "codigo" class="form-control" id="complemento" placeholder="Código na Operadora" value="<?php echo $id?>">
                  </div>
                  <div class="form-group col-lg-8">
                        <h5>14- Nome do Contratado</h5>
                        <input type="text" name= "nome_contratado" class="form-control" placeholder="Validade da Carteira" maxlength="10" value="<?php echo $contrato?>">
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-lg-8">
                        <h5>15- Nome do Profissional Solicitante</h5>
                        <select class="form-control" name="nome_profissional_solicitante" id="bairro" required>
                            <option value=""><?php echo $nps?>"</option>
                          <?php 
                            require_once('../../../sistema/php/conectaBd/index.php');
                            $objDb = new db();
                            $link = $objDb->conecta_mysql();
                            $sql = " SELECT * FROM profissional";
                            $resultado = mysqli_query($link, $sql);
                            if($resultado){
                            while($registro = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                            echo '<option value="'.$registro['nome'].'">'.$registro['nome'].'</option>';
                              }
                            }else{
                              echo 'Erro na consulta dos emails no banco de dados!';
                            }
                          ?>
                      </select>
                  </div>
                  <div class="form-group col-lg-4">
                        <h5>16- Conselho Profissional</h5>
                        <select class="form-control" name="conselho_profissional" id="cidade">
                          <option value=""><?php echo $cp?></option>                      
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
                   <div class="form-group col-lg-4">
                        <h5>17- Número do Conselho</h5>
                        <input type="text" name= "numero_conselho" class="form-control" id="uf" placeholder="Código da Operadora" value="<?php echo $nc?>">
                  </div>
                   <div class="form-group col-lg-4">
                        <h5>18- UF</h5>
                        <select class="form-control" name="uf_conselho" id="atividade"> 
                          <option value=""><?php echo $ufc?></option>                   
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
                   <div class="form-group col-lg-4">
                        <h5>19- Código CBO</h5>
                        <select class="form-control" name="codigo_cbo" id="uf_conselho">
                          <?php 
                            require_once('../../../sistema/php/conectaBd/index.php');
                            $objDb = new db();
                            $link = $objDb->conecta_mysql();
                            $sql = " SELECT * FROM especialidade where idespecialidade = $codigo";
                            $resultado = mysqli_query($link, $sql);
                            if($resultado){
                            while($registro = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                            echo '<option value="'.$registro['idespecialidade'].'">'.$registro['especialidade'].'</option>';
                              }
                            }else{
                              echo 'Erro na consulta dos emails no banco de dados!';
                            }
                          ?>
                        </select>
                  </div>
                </div>
                <div class="left"><a>Dados da Solicitação / Procedimentos e Exames Solicitados</a></div>
                <div class="row">
                   <div class="form-group col-lg-4">
                        <h5>21- Caráter de Atendimento</h5>
                        <select class="form-control" name="atendimento">  
                          <option><?php echo $atendimento?></option>                   
                          <option value="E - ELETIVA">E - ELETIVA</option>
                          <option value="U - URGÊNCIA/EMERGÊNCIA">U - URGÊNCIA/EMERGÊNCIA</option>
                        </select>
                  </div>
                  <div class="form-group col-lg-4">
                        <h5>22- Data da Solicitação</h5>
                        <input type="text" name= "data_solicitacao" class="form-control" placeholder="Data da Solicitação"  id="medico" maxlength="10" value="<?php echo $data?>">
                  </div>
                  <div class="form-group col-lg-4">
                        <h5>23- Indicação Clínica</h5>
                        <input type="text" name= "indicacao_clinica" class="form-control" id="registro" placeholder="Indicação Clínica" value="<?php echo $ic?>">
                  </div>
                </div>
                <div class="alert alert-danger" role="alert" style="text-align: center;">
                  OS PROCEDIMENTOS E EXAMES SOLICITADOS SERÃO AUTOMATICAMENTE REGISTRADOS DE ACORDO COM OS PROCEDIMENTOS E EXAMES EXECUTADOS INSERIDOS ABAIXO
                </div>
                <div class="left"><a>Dados do Contratado Executante</a></div>
                <div class="row">
                   <div class="form-group col-lg-6">
                       <h5>29 - Código da Operadora</h5>
                       <input type="text" name= "codigo" class="form-control" id="cbo" placeholder="Código na Operadora" value="<?php echo $coce?>">
                  </div>
                  <div class="form-group col-lg-6">
                        <h5>31- Código CNES</h5>
                        <input type="text" name= "codigo_cnes_ce" class="form-control" id="conselho" placeholder="Indicação Clínica" value="<?php echo $ccns?>">
                  </div>
                  <div class="form-group col-lg-12">
                        <h5>30- Nome do Contratado</h5>
                        <input type="text" name= "nome_contrato_ce" class="form-control" id="nascimento" placeholder="Data da Solicitação" value="<?php echo $ncce?>">
                  </div>
                </div>
                <div class="left"><a>Dados do Atendimento</a></div>
                <div class="row">
                  <div class="form-group col-lg-6">
                        <h5>32- Tipo de Atendimento</h5>
                        <select class="form-control" name="tipo_atendimento" id="favorecido2">
                          <option value="<?php echo $ta?>"><?php echo $ta?></option>                      
                          <option value="REMOÇÃO">REMOÇÃO</option>
                          <option value="PEQUENA CIRURGIA">PEQUENA CIRURGIA</option>
                          <option value="TERAPIAS">TERAPIAS</option>
                          <option value="CONSULTA">CONSULTA</option>               
                          <option value="EXAMES">EXAMES (INCLUI-SE RADIOLÓGICOS)</option>                      
                          <option value="ATENDIMENTO DOMICILIAR">ATENDIMENTO DOMICILIAR</option>
                          <option value="INTERNAÇÃO">INTERNAÇÃO</option>
                          <option value="QUIMIOTERAPIA">QUIMIOTERAPIA</option>
                          <option value="RADIOTERAPIA">RADIOTERAPIA</option>
                          <option value="TERAPIA RENAL SUBSTITUTIVA">TERAPIA RENAL SUBSTITUTIVA</option> 
                          <option value="PRONTO SOCORRO">PRONTO SOCORRO</option>
                          <option value="PEQUENOS ATENDIMENTOS">PEQUENOS ATENDIMENTOS</option>
                          <option value="SAÚDE OCUPACIONAL - ADMISSIONAL">SAÚDE OCUPACIONAL - ADMISSIONAL</option>
                          <option value="SAÚDE OCUPACIONAL - DEMISSIONAL">SAÚDE OCUPACIONAL - DEMISSIONAL</option>
                          <option value="SAÚDE OCUPACIONAL - PERIÓDICO">SAÚDE OCUPACIONAL - PERIÓDICO</option>      
                          <option value="SAÚDE OCUPACIONAL - RETORNO AO TRABALHO">SAÚDE OCUPACIONAL - RETORNO AO TRABALHO</option>
                          <option value="SAÚDE OCUPACIONAL - MUDANÇA DE FUNÇÃO">SAÚDE OCUPACIONAL - MUDANÇA DE FUNÇÃO</option>
                          <option value="SAÚDE OCUPACIONAL - PROMOÇÃO A SAÚDE">SAÚDE OCUPACIONAL - PROMOÇÃO A SAÚDE</option>
                          <option value="SAÚDE OCUPACIONAL - BENEFIÁRIO NOVO">SAÚDE OCUPACIONAL - BENEFIÁRIO NOVO</option>
                          <option value="SAÚDE OCUPACIONAL - ASSISTÊNCIA A DEMITIDOS">SAÚDE OCUPACIONAL - ASSISTÊNCIA A DEMITIDOS</option>
                        </select>
                  </div>
                  <div class="form-group col-lg-6">
                        <h5>33- Indicação de acidente</h5>
                        <select class="form-control" name="indicacao_acidente" id="banco2">
                          <option value="NãO ACIDENTE">NAO ACIDENTE</option>h                     
                          <option value="TRABALHO">TRABALHO</option>
                          <option value="NãO ACIDENTE">NAO ACIDENTE</option>
                          <option value="OUTROS">OUTROS</option>
                          <option value="TRâNSITO">TRâNSITO</option>
                        </select>
                  </div>
                  <div class="form-group col-lg-6">
                        <h5>34- Motivo de Consulta</h5>
                        <select class="form-control" name="motivo_consulta" id="agencia2">
                          <option value="SEGUIMENTO">SEGUIMENTO</option>                      
                          <option value="PRIMEIRA">PRIMEIRA</option>
                          <option value="SEGUIMENTO">SEGUIMENTO</option>
                          <option value="PRé-NATAL">PRé-NATAL</option>
                          <option value="POR ENCAMINHAMENTO">POR ENCAMINHAMENTO</option>
                        </select>
                  </div>
                  <div class="form-group col-lg-6">
                        <h5>35- Motivo de Encerramento de Consulta</h5>
                        <select class="form-control" name="motivo_encerramento_consulta" id="conta2">
                          <option value="">Selecione...</option>                      
                          <option value="OBT COM DEC. FORNECIDA PELO MéDICO ASSISTENTE">OBITO COM DECLARACAO FORNECIDA PELO MÉDICO ASSISTENTE</option>
                          <option value="OBITO COM DECLARAÇÃO FORNECIDA PELO PELO IML">OBITO COM DECLARAÇÃO FORNECIDA PELO IML</option>
                          <option value="OBITO COM DECLARAÇÃO FORNECIDA PELO PELO SVO">OBITO COM DECLARAÇÃO FORNECIDA PELO SVO</option>
                        </select>
                  </div>
                </div>
                <div class="left"><a>Dados da Execução / Procedimentos e Exames Realizados</a></div>
                <div class="row dados">
                <div class="form-group col-lg-12" style="text-align: center">
                <h5>Consultas dessa Guia</h5>
                <table id="tabela" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="text-align: center">Guia</th>
                  <th style="text-align: center">Inicio</th>
                  <th style="text-align: center">Término</th>
                  <th style="text-align: center">Valor</th>
                </tr>
                </thead>
                <tbody>

                <?php 
                    require_once('../../../sistema/php/conectaBd/index.php');
                    $objDb = new db();
                    $link = $objDb->conecta_mysql();
                    $sql = 'SELECT * FROM consultas_guias where guia = '.$guia.'';
                    $resultado_ids = mysqli_query($link, $sql);
                      if($resultado_ids){
                      while($registros = mysqli_fetch_array($resultado_ids, MYSQLI_ASSOC)){
                      $id = $registros['guia'];
                      $nome = $registros['inicio'];
                      $data = $registros['termino'];
                      $valor = $registros['valor'];
                      echo '<tr>';
                      echo "<td>$id</td>";
                      echo '<td>'.date('d/m/Y', strtotime($nome)).'</td>';
                      echo '<td>'.date('d/m/Y', strtotime($data)).'</td>';
                      echo '<td>'.$registros['valor'].'</td>';
                      echo '</tr>';

                        }
                      }else{
                          echo 'Erro na consulta dos emails no banco de dados!';
                        }
                      ?>
                    </tbody>
                  </table> 
                  </div>
                </div>
                <div class="left last"><a>Identificação do(s) Profissional(is) Executante(s)</a></div>
                <div class="row dados">
                  <div class="form-group col-lg-6">
                        <h5>Sequência</h5>
                          <select class="form-control" name="sequencia" id="design">
                            <option value="#"><?php echo $sequencia?></option>                      
                            <option value="#">1</option>
                            <option value="#">2</option>
                            <option value="#">até 100</option>
                          </select>
                  </div>
                  <div class="form-group col-lg-6">
                        <h5>Grau Part</h5>
                        <select class="form-control" name="grau_part" id="design">
                            <option value="#"><?php echo $grau?></option>                      
                            <option value="#">1</option>
                            <option value="#">2</option>
                            <option value="#">até 100</option>
                          </select>
                  </div>
                  <div class="form-group col-lg-12">
                        <h5>15- Nome do Profissional Solicitante</h5>
                        <select class="form-control" name="nome_profissional" id="nome_profissional_solicitante" required>
                            <option value=""><?php echo $nm?></option>
                          <?php 
                            require_once('../../../sistema/php/conectaBd/index.php');
                            $objDb = new db();
                            $link = $objDb->conecta_mysql();
                            $sql = " SELECT * FROM profissional";
                            $resultado = mysqli_query($link, $sql);
                            if($resultado){
                            while($registro = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                            echo '<option value="'.$registro['nome'].'">'.$registro['nome'].'</option>';
                              }
                            }else{
                              echo 'Erro na consulta dos emails no banco de dados!';
                            }
                          ?>
                      </select>
                  </div>
                </div>
                <div class="row dados">
                  <div class="form-group col-lg-6">
                        <h5>Cód. na Operadora / CPF</h5>
                        <input type="text" name= "codigo_operadora_cpf" class="form-control" placeholder="Cód. na Operadora/CPF" value="<?php echo $cocpf?>">
                </div>
                  <div class="form-group col-lg-6">
                    <h5>Conselho</h5>
                        <select class="form-control" name="conselho" id="design">
                          <option value=""><?php echo $cons?></option>                      
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
                  <div class="form-group col-lg-4">
                        <h5>Nº no Conselho</h5>
                        <input type="text" name= "numero_profissional" class="form-control" placeholder="Nº do Conselho" value="<?php echo $cnum ?>">
                  </div>
                  <div class="form-group col-lg-4">
                        <h5>UF</h5>
                        <select class="form-control" name="UF" id="design">
                          <option value=""><?php echo $uf?></option>                      
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
                  <div class="form-group col-lg-4">
                        <h5>Cód. CBO</h5>
                        <select class="form-control" name="cod_cbo" id="design">
                        <option value=""><?php echo $ccbo?></option>
                          <?php 
                            require_once('../../../sistema/php/conectaBd/index.php');
                            $objDb = new db();
                            $link = $objDb->conecta_mysql();
                            $sql = " SELECT * FROM especialidade";
                            $resultado = mysqli_query($link, $sql);
                            if($resultado){
                            while($registro = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                            echo '<option value="'.$registro['idespecialidade'].'">'.$registro['especialidade'].'</option>';
                              }
                            }else{
                              echo 'Erro na consulta dos emails no banco de dados!';
                            }
                          ?>
                        </select>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-lg-6">
                        <h5>Procedimentos (R$)</h5>
                        <input type="text" name= "procedimento" class="form-control" placeholder="Procedimentos (R$)">
                  </div>
                  <div class="form-group col-lg-6">
                        <h5>Taxas e Aluguéis (R$)</h5>
                        <input type="text" name= "taxa_alugueis" class="form-control" placeholder="Taxas e Aluguéis (R$)">
                  </div>
                  <div class="form-group col-lg-6">
                        <h5>Materiais (R$)</h5>
                        <input type="text" name= "materias" class="form-control" placeholder="Materiais (R$)">
                  </div>
                  <div class="form-group col-lg-6">
                        <h5>OPME (R$)</h5>
                        <input type="text" name= "opme" class="form-control" placeholder="OPME (R$)">
                  </div>
                  <div class="form-group col-lg-4">
                        <h5>Medicamentos (R$)</h5>
                        <input type="text" name= "medicamento" class="form-control" placeholder="Medicamentos (R$)">
                  </div>
                  <div class="form-group col-lg-4">
                        <h5>Gases Medicinais (R$)</h5>
                        <input type="text" name= "gases_medicinais" class="form-control" placeholder="Gases Medicinais (R$)">
                  </div>
                  <div class="form-group col-lg-4">
                        <h5>Total Geral (R$)</h5>
                        <input type="text" name= "total_geral" class="form-control" placeholder="Total Geral (R$)">
                  </div>
                </div>
                <div class="modal-footer">
                        <input type="submit" class="btn btn-secondary" value="Imprimir Guia" name="submit">
                        <input type="submit" class="btn btn-primary" value="Gravar Informações da Guia" name="submit">
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
 <?php include '../../arquivos-include/rodape.php';?>
</div>

<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../../../sistema/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../../sistema/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../../sistema/adminlte/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Slimscroll -->
<script src="../../../sistema/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../../sistema/adminlte/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../../sistema/adminlte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../../sistema/adminlte/dist/js/demo.js"></script>


      <script type='text/javascript'>
            $(document).ready(function(){
              $("input[name='cpf']").blur(function(){
                var $cartao_operadora = $("input[name='cartao_operadora']");
                var $nome = $("input[name='nome_paciente']");
                var $validade_carteira = $("input[name='validade_carteira']");
                $.getJSON('../../../sistema/php/apresentaDados/guia/preencher_auto.php',{ 
                  cpf: $( this ).val() 
                },function( json ){
                  $cartao_operadora.val( json.cartao_operadora);
                  $nome.val( json.nome);
                  $validade_carteira.val( json.validade_carteira );
                });
              });
            });
      </script>

      <script type="text/javascript">
        $(function(){
          $('#id_categoria').change(function(){
            if( $(this).val() ) {
              $('#id_sub_categoria').hide();
              $('.carregando').show();
              $.getJSON('../../../sistema/php/apresentaDados/profissional/search.php?search=',{id_categoria: $(this).val(), ajax: 'true'}, function(j){
                var options = '<option value="">Escolha o Profissional</option>'; 
                for (var i = 0; i < j.length; i++) {
                  options += '<option value="' + j[i].nome + '">' + j[i].nome + '</option>';
                } 
                $('#id_sub_categoria').html(options).show();
                $('.carregando').hide();
              });
            } else {
              $('#id_sub_categoria').html('<option value="">– Escolha Subcategoria –</option>');
            }
          });
        });
        </script>

      <script type='text/javascript'>
          $(document).ready(function(){
            $("select[name='registro']").blur(function(){
              var $id_clifops = $("input[name='codigo']");
              var $versao_tiss = $("select[name='versao_tiss']");
              $.getJSON('../../../sistema/php/apresentaDados/guia/preencher_convenio.php',{ 
                registro: $( this ).val() 
              },function( json ){
                $id_clifops.val( json.id_clifops);
                $versao_tiss.val( json.versao_tiss);
              });
            });
          });
    </script>

    <script type='text/javascript'>
          $(document).ready(function(){
            $("select[name='nome_profissional_solicitante']").blur(function(){
              var $num_conselho = $("input[name='numero_conselho']");
              var $conselho = $("select[name='conselho_profissional']");
              var $uf_conselho = $("select[name='uf_conselho']");
              var $especialidade_cbo = $("select[name='codigo_cbo']");
              $.getJSON('../../../sistema/php/apresentaDados/guia/preencher_profissional.php',{ 
                nome_profissional_solicitante: $( this ).val() 
              },function( json ){
                $num_conselho.val( json.num_conselho);
                $uf_conselho.val( json.uf_conselho);
                $conselho.val( json.conselho );
                $especialidade_cbo.val( json.especialidade_cbo );
              });
            });
          });
    </script>

    <script type='text/javascript'>
          $(document).ready(function(){
            $("select[name='nome_profissional']").blur(function(){
              var $num_conselho = $("input[name='numero_profissional']");
              var $conselho = $("select[name='conselho']");
              var $uf_conselho = $("select[name='UF']");
              var $especialidade_cbo = $("select[name='cod_cbo']");
              var $codigo_operadora_cpf = $("input[name='codigo_operadora_cpf']")
              $.getJSON('../../../sistema/php/apresentaDados/guia/preencher_profissional.php',{ 
                nome_profissional_solicitante: $( this ).val() 
              },function( json ){
                $num_conselho.val( json.num_conselho);
                $uf_conselho.val( json.uf_conselho);
                $conselho.val( json.conselho );
                $especialidade_cbo.val( json.especialidade_cbo );
                $codigo_operadora_cpf.val( json.codigo_operadora_cpf);
              });
            });
          });
    </script>

    <script type='text/javascript'>
            $(document).ready(function(){
              $("input[name='cpf']").blur(function(){
                var $inicio = $("input[name='inicio']");
                var $termino = $("input[name='termino']");
                var $valor = $("input[name='valor']");
                $.getJSON('../../../sistema/php/apresentaDados/guia/preencher_consulta.php',{ 
                  cpf: $( this ).val() 
                },function( json ){
                  
                      $inicio.val( json.inicio);
                      $termino.val( json.termino);
                      $valor.val( json.valor );
                  
                });
              });
            });
      </script>
  </body>
</html>
