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
   <link rel="stylesheet" href="../../../sistema/css/cadastro/convenio.css">
</head> 
    
    
<body class="hold-transition skin-purple sidebar-mini">
<div class="wrapper">
     
<?php include '../../arquivos-include/menu.php';?>    
  <!-- CORPO DA PÁGINA DO PROJETO!!! -->
<div class="content-wrapper">
    <section class="content-header">
      <h1><small>Mapa de Salas</small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Salas</li>
        
      </ol>
    </section>
  <!-- COLOQUE OS ARQUIVOS DA PÁGINA DO PROJETO AQUI!!! -->
    <section class="content container-fluid">
        <div class="box">
          <div class="box-header with-border" style="padding:15px;">
            <h3 class="box-title">Editar Cadastro de Pacientes</h3>  
            <div class="box-tools pull-right">
            <a href="../../salas/cadastro/index.php"><button class="btn btn-success" type="button" data-toggle="modal" data-target="#ModalAdicionar">Cadastrar nova Sala</button></a>
            </div>   
          </div>
          
              <div class="box-body" style="text-align: center">
              <table id="tabela" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="text-align: center">Sala</th>
                  <th style="text-align: center">Profissional</th>
                  <th style="text-align: center">Editar</th>

                </tr>
                </thead>
                <tbody>
                <?php 
                    require_once('../../../sistema/php/conectaBd/index.php');
                    $objDb = new db();
                    $link = $objDb->conecta_mysql();
                    $sql = " SELECT * FROM salas";
                    $resultado_ids = mysqli_query($link, $sql);
                      if($resultado_ids){
                      while($registros = mysqli_fetch_array($resultado_ids, MYSQLI_ASSOC)){
                      $id = $registros['idsala'];
                      $nome = $registros['nome_sala'];
                      $profissional = $registros['nome_profissional'];

                          echo "<td >$nome</td>";
                          echo "<td >$profissional</td>";

                      ?>
                      <td>
                          <div class='item_lista'>
                              <span class="fa fa-edit item_lista" data-toggle="modal" data-target="#exampleModal" data-whateverid="<?php echo $registros['idsala'];?>" data-whateversala="<?php echo $registros['nome_sala'];?>" ></span>
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
                  
                  
                  
                  <!-- Modal de adição -->
            <div id="exampleModal" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Atualizar Sala</h4>
                  </div>
                  <div class="modal-body">
                    <div class="box">
                        <form action="../../../sistema/php/apresentaDados/salas/alter.php" method="POST"> 
                            <div class="box-body">  
                              <div class="row">

                                <div class="form-group col-lg-10">
                                <h5>ID</h5>
                                    <input disabled type="text" name= "id" class="form-control" placeholder="Id" id="recipient-id">
                                </div>

                                  <div class="form-group col-lg-4">
                                    <label>Profissionais</label>
                                      <select class="form-control" name="profissional" id="sexo" placeholder="Profissional" id="recipient-profissional">
                                        <option value="">Selecione...</option>
                                        <option value=" ">Vazia</option>
                                          <?php 
                                            require_once('../../../sistema/php/conectaBd/index.php');
                                            $objDb = new db();
                                            $link = $objDb->conecta_mysql();
                                            $sql = " SELECT * FROM terapeuta";
                                                $resultado_ids = mysqli_query($link, $sql);
                                                if($resultado_ids){
                                                while($registros = mysqli_fetch_array($resultado_ids, MYSQLI_ASSOC)){
                                                echo '<option value="'.$registros['nome'].'">'.$registros['nome'].'</option>';
                                                }
                                                }else{
                                                    echo 'Erro na consulta dos emails no banco de dados!';
                                                }
                                          ?>
                                      </select>
                                    </div>
                                  
                              </div>
                              <div class="modal-footer">
                                  <a href="index.php">
                                        <span type="submit" class="btn btn-primary">Voltar</span>
                                  </a>
                                  
                                  <button type="submit" class="btn btn-primary">Filtrar</button>
                            </div>
                            </div>
                        </form>
                      </div>   
                  </div>
                </div>
              </div>
            </div>
        </div>
          
    
                  
        
          
        </div>
  </section>
  </div>
      

</div>
     <?php include '../../arquivos-include/rodape.php';?>


<?php include '../../arquivos-include/jquery.php';?>

<script type="text/javascript">
    $('#exampleModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal

      var recipient = button.data('whatever') // Extract info from data-* attributes
      var recipientnome = button.data('whatevernome')
      var recipientid = button.data('whateverid')


      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)

      modal.find('#id-curso').val(recipient)
      modal.find('#recipient-name').val(recipientnome)
      modal.find('#recipient-id').val(recipientid)

      
    })

    $('#seeModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal

      var recipient = button.data('whatever') // Extract info from data-* attributes
      var recipientnome = button.data('whatevernome')
      var recipientid = button.data('whateverid')



      var modal = $(this)

      modal.find('#id-curso').val(recipient)
      modal.find('#recipient-name').val(recipientnome)
      modal.find('#recipient-id').val(recipientid)


    })

  </script>
    
</body>
</html>