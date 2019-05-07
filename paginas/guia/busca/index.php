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
  <link rel="stylesheet" href="../../../sistema/css/cadastro/guia.css">
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
<?php include '../../arquivos-include/menu.php';?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <small>Gerencie os seus Pacientes</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Calendar</li>
      </ol>
    </section>

    <section class="content container-fluid">
        <div class="box">
          <div class="box-header with-border" style="padding:15px;">
            <h3 class="box-title">Gerenciar Guias</h3>  
            <div class="box-tools pull-right">
            <a href="../../guia/cadastrar/paciente.php"><button class="btn btn-success" type="button" data-toggle="modal" data-target="#ModalAdicionar">Cadastrar Nova Guia</button></a>
      </div>   
      </div>
      
      <div class="container-fluid bg-light ">
      <div class="row align-items-center justify-content-center">
                      <div class="col-md-2 pt-3">
                           <div class="form-group ">
                              <select id="operadora" class="form-control">
                                <option selected>Operadora</option>
                                <option>BMW</option>
                                <option>Audi</option>
                                <option>Maruti</option>
                                <option>Tesla</option>
                                <!--teremos um select dinamico aqui-->
                              </select>
                           </div>
                        </div>
                    <div class="col-md-2 pt-3">
                           <div class="form-group">
                              <select id="inputState" class="form-control">
                                <option>Situação:</option>
                                <option value="TODAS">Todas</option>
                                <option value="EM LOTE">Em Lote</option>
                                <option value="FORA DE LOTE">Fora de Lote</option>
                                <!--teremos um select dinamico aqui-->
                              </select>
                           </div>
                        </div>
                        <div class="col-md-2 pt-3">
                            <div class="form-group">
                              <select id="inputState" class="form-control">
                                <option selected>Profissional Executante</option>
                                <option>BMW</option>
                                <option>Audi</option>
                                <option>Maruti</option>
                                <option>Tesla</option>
                              </select>
                            </div>
                        </div>
                        <div class="col-md-2 pt-3">
                            <div class="form-group">
                             <input type="text" name="fim" class="form-control" placeholder="Entre o dia:" style="margin-top: 8px;">
                            </div>
                        </div>
                        <div class="col-md-2 pt-3">
                            <div class="form-group">
                              <input type="text" name="fim" class="form-control" placeholder="Até o dia:" style="margin-top: 8px;">
                            </div>
                        </div>
                        <div class="col-md-2">
                         <a href="../../guia/cadastrar/index.php"><button class="btn btn-danger" type="button" data-toggle="modal" data-target="#ModalAdicionar" style="margin-top: 7px; margin-left: 15px;">Filtrar Guias</button></a>
                      </div>
                  </div>
                  </div>



          </button>
              <div class="box-body" style="text-align: center;">
              <table id="tabela" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="text-align: center">Número</th>
                  <th style="text-align: center">Paciente</th>
                  <th style="text-align: center">Data de Preenchimento</th>
                  <th style="text-align: center">Valor</th>
                  <th style="text-align: center">Situação</th>
                  <th style="text-align: center">Visualizar Guia</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    require_once('../../../sistema/php/conectaBd/index.php');
                    $objDb = new db();
                    $link = $objDb->conecta_mysql();
                    $sql = " SELECT * FROM guias";
                    $resultado_ids = mysqli_query($link, $sql);
                      if($resultado_ids){
                      while($registros = mysqli_fetch_array($resultado_ids, MYSQLI_ASSOC)){
                      $id = $registros['numero_guia_principal'];
                      $nome = $registros['cpf'];
                      $data = $registros['data_autorizacao'];
                      $valor = $registros['total_geral'];
                      echo '<tr>';
                      echo "<td>$id</td>";
                      echo '<td>'.$registros['cpf'].'</td>';
                      echo '<td>'.date('d/m/Y', strtotime($data)).'</td>';
                      echo '<td>'.$registros['total_geral'].'</td>';
                      echo "<td>000000</td>";?>
                      <!--<td><div class='item_lista'><span class="fa fa-edit item_lista" data-toggle="modal" data-target="#exampleModal" data-whateverid="<?php echo $registros['id_ans']; ?>" data-whatevernome="<?php echo $registros['registro_ANS']; ?>" data-whateverdetalhes="<?php echo $registros['numero_guia_prestador']; ?>" data-whateverop="<?php echo $registros['numero_guia_principal']; ?>" data-whatevercpf="<?php echo date('d/m/Y', strtotime($registros['data_autorizacao'])); ?>" data-whatevertel="<?php echo $registros['senha']; ?>"data-whatevernomeres="<?php echo date('d/m/Y', strtotime($registros['data_validade']));?>" data-whatevercpfres="<?php echo $registros['numero_guia_operadora']; ?>"


                       data-whateversexo="<?php echo $registros['cartao_operadora']; ?>" data-whateverestadocv="<?php echo date('d/m/Y', strtotime($registros['validade_carteira']));?>" data-whatevercep="<?php echo $registros['nome_paciente']; ?>"data-whateverrua="<?php echo $registros['cartao_saude']; ?>"data-whatevernumero="<?php echo $registros['atendimento_rn']; ?>"


                       data-whatevercomp="<?php echo $registros['id_proc']; ?>" data-whateverbairro="<?php echo $registros['nome_profissional_solicitante']; ?>" data-whatevercity="<?php echo $registros['conselho_profissional']; ?>" data-whateveruf="<?php echo $registros['numero_conselho']; ?>" data-whatevertelres="<?php echo $registros['uf_conselho']; ?>" data-whatevercartao="<?php echo $registros['codigo_cbo']; ?>" 


                       data-whateverCID10="<?php echo $registros['atendimento']; ?>" data-whatevermedico="<?php echo date('d/m/Y', strtotime($registros['data_solicitacao'])); ?>" data-whateverreg="<?php echo $registros['indicacao_clinica']; ?>" 

                      data-whateveresp="<?php echo $registros['codigo_operadora_ce']; ?>" data-whatevernasc="<?php echo $registros['nome_contrato_ce']; ?>" data-whateverval="<?php echo $registros['codigo_cnes_ce']; ?>" 

                      data-whateverfav="<?php echo $registros['tipo_atendimento']; ?>" data-whateverbanco="<?php echo $registros['indicacao_acidente']; ?>" data-whateverag="<?php echo $registros['motivo_consulta']; ?>" data-whateverconta="<?php echo $registros['motivo_encerramento_consulta']; ?>" 

                      data-whatevertipo="<?php echo $registros['tipo_conta2']; ?>"></span></div></td>-->
                      <td><a href="abrir_guia.php?guia=<?php echo $registros['numero_guia_principal']?>">Clique Aqui</a></td>
                      <?php
                      echo '</tr>';

                        }
                      }else{
                          echo 'Erro na consulta dos emails no banco de dados!';
                        }
                      ?>
              </tbody>
            </table> 
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
  </div>
      <!-- /.row -->
  </section>
  <?php include '../../arquivos-include/rodape.php';?>
</div>
<?php include '../../arquivos-include/jquery.php';?>

                  <!-- Modal de edição -->
            <div id="exampleModal" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                  <div class="box">
                  <div class="box-header with-border" style="padding:15px;">
                  </div>
                  <!-- /.box-header -->
                  <form action="../../../sistema/php/apresentaDados/guia/index.php" method="POST">
              <div class="box-body">
                <div class="centered"><a>GUIA DE SP/SADT - INCLUSÃO</a></div>
                <div class="row">
                  <div class="form-group col-lg-6">
                  <h5>1- Registro ANS</h5>
                    <select class="form-control" name="registro" id="recipient-id" required>
                    <option value="">Selecione...</option>
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
                        <input type="text" name= "numero_guia_prestador" class="form-control" id="detalhes" placeholder="Guia do Prestador">
                  </div>
                  <div class="form-group col-lg-12">
                        <h5>3- Número da Guia Principal</h5>
                        <input type="text" name= "numero_guia_principal" class="form-control" id="tipo1" placeholder="Guia Principal">
                  </div>
                  <div class="form-group col-lg-6">
                        <h5>4- Data da Autorização</h5>
                        <input type="text" name= "data_autorização" class="form-control" placeholder="Data da Autorização" OnKeyPress="formatar('##/##/####', this)" id="cpf" maxlength="10">
                  </div>
                  <div class="form-group col-lg-6">
                        <h5>5- Senha</h5>
                        <input type="text" name= "senha" id="telefone" class="form-control" placeholder="Senha">
                  </div>
                  <div class="form-group col-lg-6">
                        <h5>6- Data da Validade da Senha</h5>
                        <input type="text" name= "data_validade" class="form-control" placeholder="Validade da Senha" OnKeyPress="formatar('##/##/####', this)" id="rg" maxlength="10">
                  </div>
                  <div class="form-group col-lg-6">
                        <h5>7- Nº da Guia Atribuído pela Operadora</h5>
                        <input type="text" name= "numero_guia_operadora" id="expeditor" class="form-control" placeholder="Nº Atríbuído pela Operadora">
                  </div>
                </div>
                <div class="left"><a>Dados do Beneficiário</a></div>
                <div class="row">
                  <div class="form-group col-lg-6">
                        <h5>8- Número da Carteira</h5>
                        <input type="text" name= "cartao_operadora" class="form-control" id="sexo" placeholder="Número da Carteira">
                  </div>
                  <div class="form-group col-lg-6">
                        <h5>9- Validade da Carteira</h5>
                        <input type="text" name= "validade_carteira" class="form-control" placeholder="Validade da Carteira" OnKeyPress="formatar('##/##/####', this)" id="num_conselho"maxlength="10">
                  </div>
                  <div class="form-group col-lg-12">
                        <h5>10- Nome</h5>
                        <input type="text" name= "nome_paciente" id="cep" class="form-control" placeholder="Nome">
                  </div>
                  <div class="form-group col-lg-6">
                        <h5>11- Cartão Nacional de Saúde</h5>
                        <input type="text" name= "cartao_saude" id= "rua" class="form-control" placeholder="Nº Nacional de Saúde">
                  </div>
                  <div class="form-group col-lg-6">
                        <h5>12- Atendimento a RN</h5>
                        <select class="form-control" name="atendimento_rn" id="numero">
                          <option value="NAO">NÃO</option>                      
                          <option value="SIM">SIM</option>
                          <option value="NAO">NÃO</option>
                        </select>
                  </div>
                </div>
                <div class="left"><a>Dados do Solicitante</a></div>
                <div class="row">
                  <div class="form-group col-lg-4">
                  <h5>13- Código da Operadora</h5>
                    <input type="text" name= "codigo" class="form-control" id="complemento" placeholder="Código na Operadora">
                  </div>
                  <div class="form-group col-lg-8">
                        <h5>14- Nome do Contratado</h5>
                        <input type="text" name= "nome_contratado" class="form-control" placeholder="Validade da Carteira" maxlength="10" value = "CLINICA DE FONOAUDIOLOGIA E PSICOLOGIA">
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-lg-8">
                        <h5>15- Nome do Profissional Solicitante</h5>
                        <select class="form-control" name="nome_profissional_solicitante" id="bairro" required>
                            <option value="">Selecione...</option>
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
                   <div class="form-group col-lg-4">
                        <h5>17- Número do Conselho</h5>
                        <input type="text" name= "numero_conselho" class="form-control" id="uf" placeholder="Código da Operadora">
                  </div>
                   <div class="form-group col-lg-4">
                        <h5>18- UF</h5>
                        <select class="form-control" name="uf_conselho" id="atividade">                    
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
                        <option value="">Selecione...</option>
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
                <div class="left"><a>Dados da Solicitação / Procedimentos e Exames Solicitados</a></div>
                <div class="row">
                   <div class="form-group col-lg-4">
                        <h5>21- Caráter de Atendimento</h5>
                        <select class="form-control" name="atendimento">                     
                          <option value="E - ELETIVA">E - ELETIVA</option>
                          <option value="U - URGÊNCIA/EMERGÊNCIA">U - URGÊNCIA/EMERGÊNCIA</option>
                        </select>
                  </div>
                  <div class="form-group col-lg-4">
                        <h5>22- Data da Solicitação</h5>
                        <input type="text" name= "data_solicitacao" class="form-control" placeholder="Data da Solicitação" OnKeyPress="formatar('##/##/####', this)" id="medico" maxlength="10">
                  </div>
                  <div class="form-group col-lg-4">
                        <h5>23- Indicação Clínica</h5>
                        <input type="text" name= "indicacao_clinica" class="form-control" id="registro" placeholder="Indicação Clínica">
                  </div>
                </div>
                <div class="alert alert-danger" role="alert" style="text-align: center;">
                  OS PROCEDIMENTOS E EXAMES SOLICITADOS SERÃO AUTOMATICAMENTE REGISTRADOS DE ACORDO COM OS PROCEDIMENTOS E EXAMES EXECUTADOS INSERIDOS ABAIXO
                </div>
                <div class="left"><a>Dados do Contratado Executante</a></div>
                <div class="row">
                   <div class="form-group col-lg-6">
                       <h5>29 - Código da Operadora</h5>
                       <input type="text" name= "codigo" class="form-control" id="cbo" placeholder="Código na Operadora">
                  </div>
                  <div class="form-group col-lg-6">
                        <h5>31- Código CNES</h5>
                        <input type="text" name= "codigo_cnes_ce" class="form-control" id="conselho" placeholder="Indicação Clínica" value = "3401642">
                  </div>
                  <div class="form-group col-lg-12">
                        <h5>30- Nome do Contratado</h5>
                        <input type="text" name= "nome_contrato_ce" class="form-control" id="nascimento" placeholder="Data da Solicitação" value="CLINICA DE FONOAUDIOOGIA E PSICOLOGIA">
                  </div>
                </div>
                <div class="left"><a>Dados do Atendimento</a></div>
                <div class="row">
                  <div class="form-group col-lg-6">
                        <h5>32- Tipo de Atendimento</h5>
                        <select class="form-control" name="tipo_atendimento" id="favorecido2">
                          <option value="">Selecione...</option>                      
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
                    $sql = 'SELECT * FROM consultas_guias where guia';
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
                            <option value="#">Selecione...</option>                      
                            <option value="#">1</option>
                            <option value="#">2</option>
                            <option value="#">até 100</option>
                          </select>
                  </div>
                  <div class="form-group col-lg-6">
                        <h5>Grau Part</h5>
                        <select class="form-control" name="grau_part" id="design">
                            <option value="#">Selecione...</option>                      
                            <option value="#">1</option>
                            <option value="#">2</option>
                            <option value="#">até 100</option>
                          </select>
                  </div>
                  <div class="form-group col-lg-12">
                        <h5>15- Nome do Profissional Solicitante</h5>
                        <select class="form-control" name="nome_profissional" id="nome_profissional_solicitante" required>
                            <option value="">Selecione...</option>
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
                        <input type="text" name= "codigo_operadora_cpf" class="form-control" placeholder="Cód. na Operadora / CPF">
                </div>
                  <div class="form-group col-lg-6">
                    <h5>Conselho</h5>
                        <select class="form-control" name="conselho" id="design">
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
                  <div class="form-group col-lg-4">
                        <h5>Nº no Conselho</h5>
                        <input type="text" name= "numero_profissional" class="form-control" placeholder="Nº do Conselho">
                  </div>
                  <div class="form-group col-lg-4">
                        <h5>UF</h5>
                        <select class="form-control" name="UF" id="design">
                          <option value="">...</option>                      
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
                        <option value="">Selecione...</option>
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
                  </div>
                </div>
              </div>
            </div>

<script type="text/javascript">
    $('#exampleModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal

      var recipient = button.data('whatever') // Extract info from data-* attributes
      var recipientnome = button.data('whatevernome')
      var recipientid = button.data('whateverid')
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
      modal.find('#recipient-id').val(recipientid)
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

<script>
  $(function () {
    $('#tabela').DataTable()})
  function DataHora(evento, objeto){
        var keypress=(window.event)?event.keyCode:evento.which;
        campo = eval (objeto);
          if (campo.value == '00/00/0000 00:00:00'){
            campo.value=""
          }
          caracteres = '0123456789';
          separacao1 = '/';
          separacao2 = ' ';
          separacao3 = ':';
          conjunto1 = 2;
          conjunto2 = 5;
          conjunto3 = 10;
          conjunto4 = 13;
          conjunto5 = 16;
          if ((caracteres.search(String.fromCharCode (keypress))!=-1) && campo.value.length < (19)){
            if (campo.value.length == conjunto1 )
            campo.value = campo.value + separacao1;
            else if (campo.value.length == conjunto2)
            campo.value = campo.value + separacao1;
            else if (campo.value.length == conjunto3)
            campo.value = campo.value + separacao2;
            else if (campo.value.length == conjunto4)
            campo.value = campo.value + separacao3;
            else if (campo.value.length == conjunto5)
            campo.value = campo.value + separacao3;
          }else{
            event.returnValue = false;
          }
    }
</script>


</body>
</html>
