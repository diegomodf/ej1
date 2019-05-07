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
        <small>Gerencie os seus Funcionários</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Calendar</li>
      </ol>
    </section>
    <section class="content container-fluid">
        <div class="box">
          <div class="box-header with-border" style="padding:15px;">
            <h3 class="box-title">Editar Cadastro de Funcionários</h3>     
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
                </tr>
                </thead>
                <tbody>
                <?php 
                    require_once('../../../sistema/php/conectaBd/index.php');
                    $objDb = new db();
                    $link = $objDb->conecta_mysql();
                    $sql = " SELECT * FROM funcionario";
                    $resultado_ids = mysqli_query($link, $sql);
                      if($resultado_ids){
                      while($registros = mysqli_fetch_array($resultado_ids, MYSQLI_ASSOC)){
                      $id = $registros['idfuncionario'];
                      $nome = $registros['nome'];
                      $telefone = $registros['telefone'];
                      $cpf = $registros['cpf'];
                      echo '<tr>';
                      echo "<td>$nome</td>";
                      echo '<td>'.$registros['telefone'].'</td>';
                      echo '<td class="mailbox-subject"><b>'.$registros['cpf'].'</b></td>';
                      ?>
                      <td><div class='item_lista'><span class="fa fa-edit item_lista" data-toggle="modal" data-target="#exampleModal" data-whatevernome="<?php echo $registros['nome']; ?>"data-whateverdetalhes="<?php echo $registros['email']; ?>" data-whateverop="<?php echo $registros['tipo_conta1']; ?>" data-whatevercpf="<?php echo $registros['cpf']; ?>" data-whatevertel="<?php echo $registros['telefone']; ?>"data-whatevernomeres="<?php echo $registros['rg']; ?>" data-whatevercpfres="<?php echo $registros['expedicao_rg']; ?>" data-whateversexo="<?php echo $registros['sexo']; ?>" data-whateverestadocv="<?php echo $registros['num_conselho']; ?>" data-whatevercep="<?php echo $registros['cep']; ?>"data-whateverrua="<?php echo $registros['rua']; ?>"data-whatevernumero="<?php echo $registros['numero']; ?>"data-whatevercomp="<?php echo $registros['complemento']; ?>" data-whateverbairro="<?php echo $registros['bairro']; ?>" data-whatevercity="<?php echo $registros['cidade']; ?>" data-whateveruf="<?php echo $registros['uf']; ?>" data-whatevertelres="<?php echo $registros['atividade']; ?>"  data-whatevercartao="<?php echo $registros['funcao']; ?>" data-whateverCID10="<?php echo $registros['banco1']; ?>" data-whatevermedico="<?php echo $registros['agencia1']; ?>" data-whateverreg="<?php echo $registros['conta1']; ?>" data-whateveresp="<?php echo date('d/m/Y', strtotime($registros['ingresso'])); ?>" data-whatevernasc="<?php echo date('d/m/Y', strtotime($registros['nascimento'])); ?>" data-whateverval="<?php echo $registros['conselho']; ?>" data-whateverfav="<?php echo $registros['favorecido2']; ?>" data-whateverbanco="<?php echo $registros['banco2']; ?>" data-whateverag="<?php echo $registros['agencia2']; ?>" data-whateverconta="<?php echo $registros['conta2']; ?>" data-whatevertipo="<?php echo $registros['tipo_conta2']; ?>"></span></div></td>
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
                                  <form action="../../../../sistema/php/apresentaDados/funcionario/insert.php" method="POST">
              <div class="box-body">
                <div class="row">
                  <div class="form-group col-lg-12">
                  <h5>Nome do(a) Funcionário</h5>
                      <input type="text" name= "nome" class="form-control" placeholder="Nome" id="recipient-name">
                  </div>
                  <div class="form-group col-lg-4">
                        <h5>Sexo</h5>
                        <select class="form-control" name="sexo" id="sexo">
                          <option value="#">Selecione...</option>                      
                          <option value="Feminino">Feminino</option>
                          <option value="Masculino">Masculino</option>
                          <option value="Outros">Outros</option>
                        </select>
                  </div>
                  <div class="form-group col-lg-4">
                        <h5>Data de Nascimento</h5>
                        <input type="text" name= "nascimento" class="form-control" placeholder="Data de Nascimento" OnKeyPress="formatar('##/##/####', this)" maxlength="10" id="nascimento">
                  </div>
                  <div class="form-group col-lg-4">
                        <h5>CPF</h5>
                    <input name="cpf" type="text" class="form-control" placeholder="CPF" OnKeyPress="formatar('###.###.###-##', this)" maxlength="14" id="cpf">
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
                  <div class="form-group col-lg-6">
                  <h5>Função</h5>
                    <select class="form-control" name="funcao" id="funcao">
                          <option value="#">Selecione...</option>                      
                          <option value="1">Funcionário(a) da Limpeza</option>
                          <option value="2">Gerente</option>
                          <option value="3">Terapeuta</option>
                          <option value="4">Secretário(a)</option>
                        </select>
                  </div>
                  <div class="form-group col-lg-6">
                  <h5>Data de Ingresso</h5>
                      <input type="text" name= "ingresso" class="form-control" placeholder="Data de Ingresso" OnKeyPress="formatar('##/##/####', this)" maxlength="10" id = "ingresso">
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
                  <div class="form-group col-lg-4">
                  <h5>Bairro</h5>
                    <input name="bairro" type="text" id="bairro" size="60" class="form-control" placeholder="Bairro">
                  </div>
                  <div class="form-group col-lg-4">
                  <h5>Cidade</h5>
                    <input name="cidade" type="text" id="cidade" size="60" class="form-control" placeholder="Cidade">
                  </div>
                  <div class="form-group col-lg-4">
                  <h5>Unidade da Federação</h5>
                    <input name="uf" type="text" id="uf" size="60" class="form-control" placeholder="UF">
                  </div>
              </div>
              <div class="row">
                  <div class="form-group col-lg-6">
                  <h5>Banco 1</h5>
                    <select class="form-control" name="banco1" id="CID10">
                          <option value="#">Selecione...</option>                      
                          <option value="BANCO DO BRASIL">Banco do Brasil</option>
                          <option value="CAIXA ECONôMICA">Caixa Econômica Federal</option>
                          <option value="BRADESCO">Bradesco</option>
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
                          <option value="BRADESCO">Bradesco</option>
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

<!-- ./wrapper -->
<?php include '../../arquivos-include/jquery.php';?>

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
      var recipientfuncao = button.data('whatevercartao')
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

      modal.find('#funcao').val(recipientfuncao)
      modal.find('#ingresso').val(recipientcbo)

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
