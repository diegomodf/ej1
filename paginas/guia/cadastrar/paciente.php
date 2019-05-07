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
            <h3 class="box-title">Editar Cadastro de Pacientes</h3>  
            <div class="box-tools pull-right">
            </div>   
          </div>
      
          
              <div class="box-body" style="text-align: center">
              <table id="tabela" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="text-align: center">Nome</th>
                  <th style="text-align: center">Telefone</th>
                  <th style="text-align: center">CPF</th>
                  <th style="text-align: center">Cadastrar Guia</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    require_once('../../../sistema/php/conectaBd/index.php');
                    $objDb = new db();
                    $link = $objDb->conecta_mysql();
                    $sql = " SELECT * FROM paciente";
                    $resultado_ids = mysqli_query($link, $sql);
                      if($resultado_ids){
                      while($registros = mysqli_fetch_array($resultado_ids, MYSQLI_ASSOC)){
                      $id = $registros['idpaciente'];
                      $nome = $registros['nome'];
                      $telefone = $registros['telefone'];
                      $cpf = $registros['cpf'];
                      $nome = $registros['nome'];
                      
                      echo "<td >$nome</td>";
                      echo '<td>'.$registros['telefone'].'</td>';
                      echo '<td class="mailbox-subject"><b>'.$registros['cpf'].'</b></td>';?>
                      <td><a href="index.php?cpf=<?php echo $registros['cpf']?>">Clique Aqui</a></td>
                      <?php 
                      echo '</tr>';

                        }
                      }else{
                          echo 'Erro na consulta dos emails no banco de dados!';
                        }
                      ?>
              </tbody>
            </table> 
                  
                  
                  
                  <!-- Modal de adição -->
            <div id="exampleModal" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Atualizar Dados</h4>
                  </div>
                  <div class="modal-body">
                  <div class="box">

                  <!-- /.box-header -->
                    <form action="../../../sistema/php/apresentaDados/paciente/alter.php" method="POST"> 
                    <div class="box-body">
                      <div class="row">
                        <div class="form-group col-lg-8">
                        <h5>Nome do(a) Paciente</h5>
                            <input type="text" name= "nome" class="form-control" placeholder="Nome" id="recipient-name">
                        </div>
                        <div class="form-group col-lg-4">
                        <h5>ID</h5>
                            <input type="text" name= "id" class="form-control" placeholder="Id" id="recipient-id">
                        </div>
                        <div class="form-group col-lg-4">
                              <h5>Sexo</h5>
                              <select class="form-control" name="sexo" id="sexo">
                                <option value="#">Selecione...</option>                      
                                <option value="FEMININO">FEMININO</option>
                                <option value="MASCULINO">MASCULINO</option>
                                <option value="OUTROS">OUTROS</option>
                              </select>
                        </div>
                        <div class="form-group col-lg-4">
                              <h5>Data de Nascimento</h5>
                              <input type="nascimento" name= "nascimento" class="form-control" placeholder="Data de Nascimento" OnKeyPress="formatar('##/##/####', this)" maxlength="10" id="nascimento">
                        </div>
                        <div class="form-group col-lg-4">
                              <h5>Estado Civil</h5>
                              <select class="form-control" name="estado_civil" id="estado_civil">
                                <option value="#" id="estado_civil">Selecione...</option>                      
                                <option value="CASADO">CASADO</option>
                                <option value="SOLTEIRO">SOLTEIRO</option>
                                <option value="DESQUITADO">DESQUITADO</option>
                                <option value="DIVORCIADO">DIVORCIADO</option>
                                <option value="VIUVO">VIÚVO</option>
                                <option value="OUTRO">OUTRO</option>
                                <option value="INDEFINIDO">INDEFINIDO</option>
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
                          <input type="text" name= "numero" class="form-control" placeholder="Número" id="numero">
                        </div>
                        <div class="form-group col-lg-6">
                          <h5>Complemento</h5>
                          <input type="text" name= "complemento" class="form-control" placeholder="Complemento" id="complemento">
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
                              <input type="text" name= "validade" class="form-control" placeholder="Validade da Carteira" OnKeyPress="formatar('##/##/####', this)" maxlength="10" id="validade">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-3">
                        <h5>CID10</h5>
                          <input name="CID10" type="text" class="form-control" placeholder="CID10" id="CID10">
                        </div>
                        <div class="form-group col-lg-9">
                        <h5>Médico</h5>
                          <input name="nome_medico" type="text" class="form-control" placeholder="Nome do Médico" id="medico">
                        </div>
                        <div class="form-group col-lg-6">
                        <h5>Reg. do Conselho</h5>
                          <input name="reg_medico" type="text" class="form-control" placeholder="Registro do Conselho" id="registro">
                        </div>
                        <div class="form-group col-lg-6">
                        <h5>Especialidade</h5>
                          <input name="especialidade" type="text" class="form-control" placeholder="Especialidade" id="especialidade">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                        <h5>Nº da Carteira da Operadora</h5>
                          <input name="num_carteira" type="text" class="form-control" placeholder="Carteira da Operadora" id="cartao_op">
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
                          <input name="tel_responsavel" type="text" class="form-control" placeholder="Telefone do Responsável" id="telres">
                        </div>
                    </div>
                    <div class="modal-footer">
                          <input type="submit" class="btn btn-alert" value="Cancelar" name="submit">
                          <input type="submit" class="btn btn-primary" value="Cadastrar Paciente" name="submit">
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
                    <form action="../../../sistema/php/apresentaDados/paciente/insert.php" method="POST"> 
                    <div class="box-body">
                      <div class="row">
                        <div class="form-group col-lg-12">
                        <h5>Nome do Paciente</h5>
                            <input disabled type="text" name= "nome" class="form-control" placeholder="Nome" id="recipient-name">
                        </div>
                        <div class="form-group col-lg-4">
                              <h5>Sexo</h5>
                            <input disabled type="text" name= "sexo" class="form-control" placeholder="Sexo" id="sexo">
                        </div>
                        <div class="form-group col-lg-4">
                              <h5>Data de Nascimento</h5>
                              <input disabled type="nascimento" name= "nascimento" class="form-control" placeholder="Data de Nascimento" id="nascimento">
                        </div>
                        <div class="form-group col-lg-4">
                              <h5>Estado Civil</h5>
                            <input disabled type="text" name= "estado_civil" class="form-control" placeholder="Estado Civil" id="estado_civil">

                        </div>
                      </div>
                      <div class="row">
                         <div class="form-group col-lg-12">
                        <h5>Email</h5>
                            <input disabled type="email" name= "email" class="form-control" placeholder="Email" id="detalhes">
                        </div>
                        <div class="form-group col-lg-6">
                        <h5>Telefone</h5>
                          <input disabled name="telefone" type="text" class="form-control" placeholder="Telefone" OnKeyPress="formatar('##-#####-####', this)" maxlength="13" id="telefone">
                        </div>
                        <div class="form-group col-lg-6">
                        <h5>CPF</h5>
                          <input disabled name="cpf" type="text" class="form-control" placeholder="CPF" OnKeyPress="formatar('###.###.###-##', this)" maxlength="14" id="cpf">
                        </div>
                    </div>
                      <div class="row">
                        <div class="form-group col-lg-4">
                        <h5>CEP</h5>
                          <input disabled name="cep" type="text" id="cep" value="" size="60" maxlength="8" onblur="pesquisacep(this.value);" class="form-control" placeholder="CEP"/>
                        </div>
                        <div class="form-group col-lg-8">
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
                        <div class="form-group col-lg-6">
                        <h5>Bairro</h5>
                          <input disabled name="bairro" type="text" id="bairro" size="60" class="form-control" placeholder="Bairro">
                        </div>
                        <div class="form-group col-lg-3">
                        <h5>Cidade</h5>
                          <input disabled name="cidade" type="text" id="cidade" size="60" class="form-control" placeholder="Cidade">
                        </div>
                        <div class="form-group col-lg-3">
                        <h5>UF</h5>
                          <input disabled name="uf" type="text" id="uf" size="60" class="form-control" placeholder="UF">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-4">
                        <h5>Operadora</h5>
                         <input disabled type="text" name= "operadora" class="form-control" placeholder="Operadora" id = "operadora">
                        </div>
                        <div class="form-group col-lg-4">
                        <h5>Plano</h5>
                          <select disabled class="form-control" name="plano" id="plano">
                            <option value="#">Selecione...</option>                      
                            <option value="#">Pegar do Banco de Dados...</option>
                            <option value="vazio">Vazio</option>
                          </select>
                        </div>
                        <div class="form-group col-lg-4">
                        <h5>Validade da Carteira</h5>
                              <input disabled type="text" name= "validade" class="form-control" placeholder="Validade da Carteira" OnKeyPress="formatar('##/##/####', this)" maxlength="10" id="validade">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-3">
                        <h5>CID10</h5>
                          <input disabled name="CID10" type="text" class="form-control" placeholder="CID10" id="CID10">
                        </div>
                        <div class="form-group col-lg-9">
                        <h5>Médico</h5>
                          <input disabled name="nome_medico" type="text" class="form-control" placeholder="Nome do Médico" id="medico">
                        </div>
                        <div class="form-group col-lg-6">
                        <h5>Reg. do Conselho</h5>
                          <input disabled name="reg_medico" type="text" class="form-control" placeholder="Registro do Conselho" id="registro">
                        </div>
                        <div class="form-group col-lg-6">
                        <h5>Especialidade</h5>
                          <input disabled name="especialidade" type="text" class="form-control" placeholder="Especialidade" id="especialidade">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                        <h5>Nº da Carteira da Operadora</h5>
                          <input disabled name="num_carteira" type="text" class="form-control" placeholder="Carteira da Operadora" id="cartao_op">
                        </div>
                        <div class="form-group col-lg-12">
                        <h5>Nome do Responsável</h5>
                          <input disabled name="responsavel" type="text" class="form-control" placeholder="Nome do Responsável" id="responsavel">
                        </div>
                        <div class="form-group col-lg-6">
                        <h5>CPF do Responsável</h5>
                          <input disabled name="cpf_responsavel" type="text" class="form-control" placeholder="CPF do Responsável" OnKeyPress="formatar('###.###.###-##', this)" maxlength="14" id="cpfres">
                        </div>
                        <div class="form-group col-lg-6">
                        <h5>Telefone do Responsável</h5>
                          <input disabled name="tel_responsavel" type="text" class="form-control" placeholder="Telefone do Responsável" id="telres">
                        </div>
                        <div class="form-group col-lg-12">
                          <h5>Médicos já Consultados</h5>
                        <?php 
                          require_once('../../../sistema/php/conectaBd/index.php');
                          $objDb = new db();
                          $link = $objDb->conecta_mysql();
                          $sql = "SELECT DISTINCT nome_profissional FROM consultas where nome_paciente = '$nome';";
                          $resultado = mysqli_query($link, $sql);
                            if($resultado){
                            while($registro = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                              $medico = $registro['nome_profissional'];
                              echo "<input disabled type='text' class='form-control' value='$medico'>";
                              echo "<br>";
                            }

                            }else{
                          echo "<input disabled type='text' class='form-control' value='Não há médicos no histórico desse paciente'>";
                        }
                        ?>
                      </div>
                        
                    </div>
                    </div>

                    </form>
                    </div>   
                  </div>
                </div>
              </div>
            </div>
            <div id="desconto" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Cadastrar Descontos</h4>
                  </div>
                  <div class="modal-body"style="text-align: left;">
                  <div class="box">
                  <!-- /.box-header -->
                    <form action="../../../sistema/php/apresentaDados/desconto/insert.php" method="POST"> 
                    <div class="box-body">
                      <div class="row">
                        <div class="form-group col-lg-12">
                        <h5>Referência do Paciente</h5>
                            <input type="text" name="id" class="form-control" placeholder="Nome" id="paciente">
                        </div>
                        <div class="form-group col-lg-12">
                        <h5>Referência</h5>
                            <input type="text" name="referencia" class="form-control" placeholder="Referência">
                        </div>
                        <div class="form-group col-lg-12">
                        <h5>Valor do Desconto (%)</h5>
                            <input type="text" name="desconto" class="form-control" placeholder="Valor do Desconto (%)">
                        </div>
                        <div class="modal-footer">
                          <input type="submit" class="btn btn-alert" value="Cancelar" name="submit">
                          <input type="submit" class="btn btn-primary" value="Cadastrar Desconto" name="submit">
                      </div>
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
  <?php include '../../arquivos-include/rodape.php';?>
</div>
<?php include '../../arquivos-include/jquery.php';?>

<script type="text/javascript">
    $('#exampleModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal

      var recipient = button.data('whatever') // Extract info from data-* attributes
      var recipientnome = button.data('whatevernome')
      var recipientid = button.data('whateverid')
      var recipientdetalhes = button.data('whateverdetalhes')
      var recipientop = button.data('whateverop')
      var recipientnasc = button.data('whatevernasc')
      var recipientval = button.data('whateverval')
      var recipientcpf = button.data('whatevercpf')
      var recipienttel = button.data('whatevertel')
      var recipientnomeres = button.data('whatevernomeres')
      var recipientcpfres = button.data('whatevercpfres')
      var recipienttelres = button.data('whatevertelres')
      var recipientsexo = button.data('sexo')
      var recipientestadocv = button.data('whateverestadocv')
      var recipientcep = button.data('whatevercep')
      var recipientrua = button.data('whateverrua')
      var recipientnumero = button.data('whatevernumero')
      var recipientcomplemento = button.data('whatevercomp')
      var recipientbairro = button.data('whateverbairro')
      var recipientcidade = button.data('whatevercity')
      var recipientestuf = button.data('whateveruf')
      var recipientcartaop = button.data('whatevercartao')
      var recipientCID10 = button.data('whateverCID10')
      var recipientmedicoenc = button.data('whatevermedico')
      var recipientregistroenc = button.data('whateverreg')
      var recipientespecialidade = button.data('whateveresp')

      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)

      modal.find('#id-curso').val(recipient)
      modal.find('#recipient-name').val(recipientnome)
      modal.find('#recipient-id').val(recipientid)
      modal.find('#detalhes').val(recipientdetalhes)
      modal.find('#operadora').val(recipientop)
      modal.find('#nascimento').val(recipientnasc)
      modal.find('#validade').val(recipientval)
      modal.find('#cpf').val(recipientcpf)
      modal.find('#telefone').val(recipienttel)
      modal.find('#responsavel').val(recipientnomeres)
      modal.find('#cpfres').val(recipientcpfres)
      modal.find('#telres').val(recipienttelres)
      modal.find('#sexo').val(recipientsexo)
      modal.find('#estado_civil').val(recipientestadocv)
      modal.find('#cep').val(recipientcep)
      modal.find('#rua').val(recipientrua)
      modal.find('#numero').val(recipientnumero)
      modal.find('#bairro').val(recipientbairro)
      modal.find('#complemento').val(recipientcomplemento)
      modal.find('#cidade').val(recipientcidade)
      modal.find('#uf').val(recipientestuf)
      modal.find('#cartao_op').val(recipientcartaop)
      modal.find('#CID10').val(recipientCID10)
      modal.find('#medico').val(recipientmedicoenc)
      modal.find('#registro').val(recipientregistroenc)
      modal.find('#especialidade').val(recipientespecialidade)
      
    })

    $('#seeModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal

      var recipient = button.data('whatever') // Extract info from data-* attributes
      var recipientnome = button.data('whatevernome')
      var recipientid = button.data('whateverid')
      var recipientdetalhes = button.data('whateverdetalhes')
      var recipientop = button.data('whateverop')
      var recipientnasc = button.data('whatevernasc')
      var recipientval = button.data('whateverval')
      var recipientcpf = button.data('whatevercpf')
      var recipienttel = button.data('whatevertel')
      var recipientnomeres = button.data('whatevernomeres')
      var recipientcpfres = button.data('whatevercpfres')
      var recipienttelres = button.data('whatevertelres')
      var recipientsexo = button.data('sexo')
      var recipientestadocv = button.data('whateverestadocv')
      var recipientcep = button.data('whatevercep')
      var recipientrua = button.data('whateverrua')
      var recipientnumero = button.data('whatevernumero')
      var recipientcomplemento = button.data('whatevercomp')
      var recipientbairro = button.data('whateverbairro')
      var recipientcidade = button.data('whatevercity')
      var recipientestuf = button.data('whateveruf')
      var recipientcartaop = button.data('whatevercartao')
      var recipientCID10 = button.data('whateverCID10')
      var recipientmedicoenc = button.data('whatevermedico')
      var recipientregistroenc = button.data('whateverreg')
      var recipientespecialidade = button.data('whateveresp')

      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)

      modal.find('#id-curso').val(recipient)
      modal.find('#recipient-name').val(recipientnome)
      modal.find('#recipient-id').val(recipientid)
      modal.find('#detalhes').val(recipientdetalhes)
      modal.find('#operadora').val(recipientop)
      modal.find('#nascimento').val(recipientnasc)
      modal.find('#validade').val(recipientval)
      modal.find('#cpf').val(recipientcpf)
      modal.find('#telefone').val(recipienttel)
      modal.find('#responsavel').val(recipientnomeres)
      modal.find('#cpfres').val(recipientcpfres)
      modal.find('#telres').val(recipienttelres)
      modal.find('#sexo').val(recipientsexo)
      modal.find('#estado_civil').val(recipientestadocv)
      modal.find('#cep').val(recipientcep)
      modal.find('#rua').val(recipientrua)
      modal.find('#numero').val(recipientnumero)
      modal.find('#bairro').val(recipientbairro)
      modal.find('#complemento').val(recipientcomplemento)
      modal.find('#cidade').val(recipientcidade)
      modal.find('#uf').val(recipientestuf)
      modal.find('#cartao_op').val(recipientcartaop)
      modal.find('#CID10').val(recipientCID10)
      modal.find('#medico').val(recipientmedicoenc)
      modal.find('#registro').val(recipientregistroenc)
      modal.find('#especialidade').val(recipientespecialidade)

    })

      $('#desconto').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal

      var recipientid = button.data('whateverid') // Extract info from data-* attributes

      var modal = $(this)

      modal.find('#paciente').val(recipientid)
      
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
