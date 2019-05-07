<?php
    session_start();
    if(!isset($_SESSION['nome']) || !isset($_SESSION['email']) || !isset($_SESSION['funcao'])){
        header('Location: ../../../index.php?erro=1');    
    }
?>
<?php
  $lote = $_GET['lote'];
  require_once('../../../sistema/php/conectaBd/index.php');
  $objDb = new db();
  $link = $objDb->conecta_mysql();
  $sql = " SELECT * FROM lote where lote = $lote";
  $resultado = mysqli_query($link, $sql);
  if($resultado){
  while($registros = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
    $numero = $registros['lote'];
    $quantidade = $registros['quantidade_guias'];
    $enviado = $registros['enviado'];
    $operadora = $registros['operadora'];
    $referencia = $registros['referencia'];
    $valor = $registros['valor'];
    $protocolo = $registros['protocolo'];

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
            <h5 class="box-title">Lote</h5><br>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
                  <div style="margin-left: 50px;">
                  </div>
                  <form action="../../../sistema/php/apresentaDados/guia/index.php" method="POST">
              <div class="box-body">
                <div class="centered"><a>LOTE</a></div>
                <div class="row">
                  <div class="form-group col-lg-6">
                        <h5>1- Operadora</h5>
                        <input type="text" name= "numero_guia_prestador" class="form-control" id="detalhes" value="<?php echo $operadora ?>" placeholder="Operadora">
                  </div>
                  <div class="form-group col-lg-6">
                        <h5>2- Número do Lote</h5>
                        <input type="text" name= "numero_guia_prestador" class="form-control" id="detalhes" value="<?php echo $numero ?>" placeholder="Número do Lote">
                  </div>
                  <div class="form-group col-lg-6">
                        <h5>3- Mês/Referência</h5>
                        <input type="text" name= "numero_guia_prestador" class="form-control" id="detalhes" value="<?php echo $referencia ?>" placeholder="Mes/Referência">
                  </div>
                  <div class="form-group col-lg-6">
                        <h5>4- Quantidade de Guias</h5>
                        <input type="text" name= "numero_guia_principal" class="form-control" id="tipo1" value="<?php echo $quantidade?>" placeholder="Quantidade de Guias">
                  </div>
                <div class="form-group col-lg-12" style="text-align: center">
                <h5>Guias desse Lote</h5>
                <table id="tabela" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="text-align: center">Guia</th>
                  <th style="text-align: center">Profissional</th>
                  <th style="text-align: center">Paciente</th>
                  <th style="text-align: center">Carteira</th>
                  <th style="text-align: center">Valor</th>
                </tr>
                </thead>
                <tbody>

                <?php 
                    require_once('../../../sistema/php/conectaBd/index.php');
                    $objDb = new db();
                    $link = $objDb->conecta_mysql();
                    $sql = 'SELECT * FROM guias where lote = '.$lote.'';
                    $resultado_ids = mysqli_query($link, $sql);
                      if($resultado_ids){
                      while($registros = mysqli_fetch_array($resultado_ids, MYSQLI_ASSOC)){
                      $id = $registros['numero_guia_principal'];
                      $nm = $registros['nome_medico'];
                      $np = $registros['nome_paciente'];
                      $co = $registros['cartao_operadora'];
                      $vl = $registros['valor_total']; 
                      echo '<tr>';
                      echo "<td>$id</td>";
                      echo '<td>'.$registros['nome_medico'].'</td>';
                      echo '<td>'.$registros['nome_paciente'].'</td>';
                      echo '<td>'.$registros['cartao_operadora'].'</td>';
                      echo '<td>'.$registros['valor_total'].'</td>';
                      echo '</tr>';

                        }
                      }else{
                          echo 'Erro na consulta dos emails no banco de dados!';
                        }
                      ?>
                    </tbody>
                  </table> 
                  </div>
                  <div class="form-group col-lg-4">
                        <h5>5- Envio</h5>
                        <input type="text" name= "numero_guia_prestador" class="form-control" id="detalhes" placeholder="Envio" value="<?php echo $enviado ?>">
                  </div>
                  <div class="form-group col-lg-4">
                        <h5>6- Protocolo</h5>
                        <input type="text" name= "numero_guia_prestador" class="form-control" id="detalhes" placeholder="Protocolo"value="<?php echo $protocolo ?>">
                  </div>
                  <div class="form-group col-lg-4">
                        <h5>7- Valor</h5>
                        <input type="text" name= "numero_guia_prestador" class="form-control" id="detalhes" placeholder="Valor" value="<?php echo $valor ?>">
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
