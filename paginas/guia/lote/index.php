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
</head>

<body class="hold-transition skin-purple sidebar-mini">

<div class="wrapper">
<?php include '../../arquivos-include/menu.php';?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <small>Gerenciamento de Lotes</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Calendar</li>
      </ol>
    </section>

    <section class="content container-fluid">
        <div class="box">
          <div class="box-header with-border" style="padding:15px;">
            <h3 class="box-title">Gerenciar Lotes</h3>  
            <div class="box-tools pull-right">
            <a href="../../guia/lote/guia.php"><button class="btn btn-success" type="button" data-toggle="modal" data-target="#ModalAdicionar">Cadastrar Novo Lote</button></a>
      </div>   
      </div>
      
      <div class="container-fluid bg-light ">
      <div class="row align-items-center justify-content-center">
                      <div class="col-md-4 pt-3">
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
                    <div class="col-md-4 pt-3">
                           <div class="form-group">
                              <select id="inputState" class="form-control">
                                <option>Mês/Referência</option>
                                <option value="TODAS">Todas</option>
                                <option value="EM LOTE">Em Lote</option>
                                <option value="FORA DE LOTE">Fora de Lote</option>
                                <!--teremos um select dinamico aqui-->
                              </select>
                           </div>
                        </div>
                        <div class="col-md-4">
                         <a href="../../guia/cadastrar/index.php"><button class="btn btn-danger" type="button" data-toggle="modal" data-target="#ModalAdicionar" style="margin-top: 7px; margin-left: 15px;">Filtrar Lote</button></a>
                      </div>
                  </div>
                  </div>



          </button>
              <div class="box-body" style="text-align: center;">
              <table id="tabela" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="text-align: center">Seguradora</th>
                  <th style="text-align: center">Cadastrar Lote</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    require_once('../../../sistema/php/conectaBd/index.php');
                    $objDb = new db();
                    $link = $objDb->conecta_mysql();
                    $sql = " SELECT * FROM operadora";
                    $resultado_ids = mysqli_query($link, $sql);
                      if($resultado_ids){
                      while($registros = mysqli_fetch_array($resultado_ids, MYSQLI_ASSOC)){
                      
                      echo '<td>'.$registros['nome'].'</td>';?>
                      <td><a href="gerenciar.php?guia=<?php echo $registros['nome']?>">Clique Aqui</a></td>
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
