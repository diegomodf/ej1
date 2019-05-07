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
  <!-- CORPO DA PÁGINA DO PROJETO!!! -->
<div class="content-wrapper">
    <section class="content-header">
      <h1><small>Gerencie os seus Profissionais</small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Usuarios</li>
        <li class="active">Profissionais</li>
      </ol>
    </section>

  <!-- COLOQUE OS ARQUIVOS DA PÁGINA DO PROJETO AQUI!!! -->
    <section class="content container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                </div>
            </div>
        </div>
        
    <section class="content container-fluid">
        <div class="box">
          <div class="box-header with-border" style="padding:15px;">
            <h3 class="box-title">Editar Cadastro de Profissionais</h3>  
            <div class="box-tools pull-right">
            <a href="../../cadastro/valores/index.php"><button class="btn btn-success" type="button" data-toggle="modal" data-target="#ModalAdicionar">Cadastrar Procedimento</button></a>   
            <!-- /.box-tools -->
          </div>
              <div class="box-body">
              <table id="tabela" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Nome</th>
                  <th>Pontuação</th>
                  <th>Porcentagem</th>
                  <th>Editar</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    require_once('../../../sistema/php/conectaBd/index.php');
                    $objDb = new db();
                    $link = $objDb->conecta_mysql();
                    $sql = "SELECT * FROM indicadores";
                    $resultado_ids = mysqli_query($link, $sql);
                      if($resultado_ids){
                      while($registros = mysqli_fetch_array($resultado_ids, MYSQLI_ASSOC)){
                      $id = $registros['idindicadores'];
                      $nome = $registros['nome'];
                      $pontuacao = $registros['pontuacao'];
                      $porcentagem = $registros['porcentagem'];  
                      echo '<tr>';
                      echo "<td>$id</td>";
                      echo '<td>'.$nome.'</td>';
                      echo '<td class="mailbox-subject"><b>'.$pontuacao.'</b></td>';
                      echo '<td class="mailbox-subject"><b>'.$porcentagem.'</b></td>';
                      ?>
                      <td>
                          <div class='item_lista'>
                              <a class="fa fa-edit item_lista" href="alter.php?id=<?php echo $id ?>"></a>
                          </div>
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

          </div>
        </div>
  </section>
</section>

    
    
    
</div>
    <?php include '../../arquivos-include/rodape.php';?>
</div>
<?php include '../../arquivos-include/jquery.php';?> 

</body>
</html>