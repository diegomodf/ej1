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
        <small>Pagamento de profissionais</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Calendar</li>
      </ol>
    </section>

    <section class="content container-fluid">
        <div class="box">
          <div class="box-header with-border" style="padding:15px;">
            <h3 class="box-title">Pagamento de Profissionais</h3>  
  
          </div>
      
          
              <div class="box-body" style="text-align: center">
              <table id="tabela" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="text-align: center">Nome</th>
                  <th style="text-align: center">Telefone</th>
                  <th style="text-align: center">CPF</th>
                  <th style="text-align: center">Visualizar</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    require_once('../../../sistema/php/conectaBd/index.php');
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
                      $nome = $registros['nome'];
                      if($registros['sexo'] == ""){
                          $cor = 1;
                      }else{
                          $cor = 0;
                      }
                        
                        echo "<tr>";
                        if($cor == 0){
                            echo "<tr>";
                        }else if($cor == 1){
                            echo "<tr bgcolor='FF4000'>";
                        }
      
                          
                      //echo '<tr>';
                      echo "<td>$nome</td>";
                      echo '<td>'.$registros['telefone'].'</td>';
                      echo '<td class="mailbox-subject"><b>'.$registros['cpf'].'</b></td>';
                      ?>
                    
                      <td>
                          <a href="profissional.php?id=<?php echo $id ?>" class='item_lista'>
                              <span class="fa fa-eye item_lista">
                                  
                              </span>
                          </a>
                    </td>

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
      </section>
        </div>
  </div>
      <!-- /.row -->

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
