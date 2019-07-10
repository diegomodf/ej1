<!DOCTYPE html>
<html lang="pt-br">
<head>
  <?php include '../../arquivos-include/head.php';?>
</head> 
    
    
<body class="hold-transition skin-purple sidebar-mini">
<div class="wrapper">
<?php include '../../arquivos-include/menu.php';?>    
  <!-- CORPO DA PÁGINA DO PROJETO!!! -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <section class="content container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                </div>
            </div>
        </div>
        
        <div class="box">
        
          <div class="box-header with-border" style="padding:15px;">
            <h3 class="box-title">Última leitura do DOU</h3>  
            <div class="box-tools pull-right">
            <button class="btn btn-success" type="button" data-toggle="modal" data-target="#addModal">Incluir nova leitura</button>  
            <!-- /.box-tools -->
          </div>
          
              <div class="box-body">
              <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Data</th>
                  <th>Última atualização</th>
                  <th>Responsável</th>
                  <th>Editar</th>
                  <th>Visualizar</th>
                </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>12/12/12</td>
                    <td>06:20</td>
                    <td>Exemplo</td>
                    <td>
                      <div class='item_lista'>
                        <span class="fa fa-edit item_lista" data-toggle="modal" data-target="#exampleModal" data-whateverid="<?php echo $registros['idfuncionario']; ?>" data-whatevernome="<?php echo $registros['nome']; ?>" data-whateverdetalhes="<?php echo $registros['email']; ?>" data-whatevertel="<?php echo $registros['telefone']; ?>" data-whatevercpf="<?php echo $registros['cpf']; ?>" data-whateversexo="<?php echo $registros['sexo']; ?>" data-whatevernasc="<?php echo date('d/m/Y', strtotime($registros['nascimento'])); ?>" data-whatevercep="<?php echo $registros['cep']; ?>" data-whateverrua="<?php echo $registros['rua']; ?>" data-whatevernumero="<?php echo $registros['numero']; ?>" data-whatevercomp="<?php echo $registros['complemento']; ?>" data-whateverbairro="<?php echo $registros['bairro']; ?>" data-whatevercity="<?php echo $registros['cidade']; ?>" data-whateveruf="<?php echo $registros['uf']; ?>" data-whatevertelfuncao="<?php echo $registros['funcao']; ?>" data-whateveringresso="<?php echo date('d/m/Y', strtotime($registros['ingresso'])); ?>" data-whateverfav1="<?php echo $registros['favorecido1']; ?>" data-whateverbanco1="<?php echo $registros['banco1']; ?>" data-whateveragencia1="<?php echo $registros['agencia1']; ?>" data-whateverconta1="<?php echo $registros['conta1']; ?>" data-whatevertipo1="<?php echo $registros['tipo_conta1']; ?>" data-whateverfav2="<?php echo $registros['favorecido2']; ?>" data-whateverbanco2="<?php echo $registros['banco2']; ?>" data-whateveragencia2="<?php echo $registros['agencia2']; ?>" data-whateverconta2="<?php echo $registros['conta2']; ?>" data-whatevertipo2="<?php echo $registros['tipo_conta2']; ?>">
                        </span>
                      </div>
                    </td>
                    <td>
                      <div class='item_lista'>
                        <span class="fa fa-eye item_lista" data-toggle="modal" data-target="#seeModal" data-whateverid="<?php echo $registros['idfuncionario']; ?>" data-whatevernome="<?php echo $registros['nome']; ?>" data-whateverdetalhes="<?php echo $registros['email']; ?>" data-whatevertel="<?php echo $registros['telefone']; ?>" data-whatevercpf="<?php echo $registros['cpf']; ?>" data-whateversexo="<?php echo $registros['sexo']; ?>" data-whatevernasc="<?php echo date('d/m/Y', strtotime($registros['nascimento'])); ?>" data-whatevercep="<?php echo $registros['cep']; ?>" data-whateverrua="<?php echo $registros['rua']; ?>" data-whatevernumero="<?php echo $registros['numero']; ?>" data-whatevercomp="<?php echo $registros['complemento']; ?>" data-whateverbairro="<?php echo $registros['bairro']; ?>" data-whatevercity="<?php echo $registros['cidade']; ?>" data-whateveruf="<?php echo $registros['uf']; ?>" data-whatevertelfuncao="<?php echo $registros['funcao']; ?>" data-whateveringresso="<?php echo date('d/m/Y', strtotime($registros['ingresso'])); ?>" data-whateverfav1="<?php echo $registros['favorecido1']; ?>" data-whateverbanco1="<?php echo $registros['banco1']; ?>" data-whateveragencia1="<?php echo $registros['agencia1']; ?>" data-whateverconta1="<?php echo $registros['conta1']; ?>" data-whatevertipo1="<?php echo $registros['tipo_conta1']; ?>" data-whateverfav2="<?php echo $registros['favorecido2']; ?>" data-whateverbanco2="<?php echo $registros['banco2']; ?>" data-whateveragencia2="<?php echo $registros['agencia2']; ?>" data-whateverconta2="<?php echo $registros['conta2']; ?>" data-whatevertipo2="<?php echo $registros['tipo_conta2']; ?>">
                        </span>
                      </div>
                    </td>
                  </tr>
                </tbody>
                </table>
              </div>
          </div>





  <!-- COLO OS ARQUIVOS DA PÁGINA DO PROJETO AQUI!!! -->
    <section class="content container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                </div>
            </div>
        </div>
        
        <div class="box">
        
          <div class="box-header with-border" style="padding:15px;">
            <h3 class="box-title">Histórico de leitura do DOU</h3>  
            <div class="box-tools pull-right">
            <!-- /.box-tools -->
          </div>
          
              <div class="box-body">
              <table id="tabela" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Data</th>
                  <th>Última atualização</th>
                  <th>Responsável</th>
                  <th>Editar</th>
                  <th>Visualizar</th>
                </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>12/12/12</td>
                    <td>06:20</td>
                    <td>Exemplo</td>
                    <td>
                      <div class='item_lista'>
                        <span class="fa fa-edit item_lista" data-toggle="modal" data-target="#exampleModal" data-whateverid="<?php echo $registros['idfuncionario']; ?>" data-whatevernome="<?php echo $registros['nome']; ?>" data-whateverdetalhes="<?php echo $registros['email']; ?>" data-whatevertel="<?php echo $registros['telefone']; ?>" data-whatevercpf="<?php echo $registros['cpf']; ?>" data-whateversexo="<?php echo $registros['sexo']; ?>" data-whatevernasc="<?php echo date('d/m/Y', strtotime($registros['nascimento'])); ?>" data-whatevercep="<?php echo $registros['cep']; ?>" data-whateverrua="<?php echo $registros['rua']; ?>" data-whatevernumero="<?php echo $registros['numero']; ?>" data-whatevercomp="<?php echo $registros['complemento']; ?>" data-whateverbairro="<?php echo $registros['bairro']; ?>" data-whatevercity="<?php echo $registros['cidade']; ?>" data-whateveruf="<?php echo $registros['uf']; ?>" data-whatevertelfuncao="<?php echo $registros['funcao']; ?>" data-whateveringresso="<?php echo date('d/m/Y', strtotime($registros['ingresso'])); ?>" data-whateverfav1="<?php echo $registros['favorecido1']; ?>" data-whateverbanco1="<?php echo $registros['banco1']; ?>" data-whateveragencia1="<?php echo $registros['agencia1']; ?>" data-whateverconta1="<?php echo $registros['conta1']; ?>" data-whatevertipo1="<?php echo $registros['tipo_conta1']; ?>" data-whateverfav2="<?php echo $registros['favorecido2']; ?>" data-whateverbanco2="<?php echo $registros['banco2']; ?>" data-whateveragencia2="<?php echo $registros['agencia2']; ?>" data-whateverconta2="<?php echo $registros['conta2']; ?>" data-whatevertipo2="<?php echo $registros['tipo_conta2']; ?>">
                        </span>
                      </div>
                    </td>
                    <td>
                      <div class='item_lista'>
                        <span class="fa fa-eye item_lista" data-toggle="modal" data-target="#seeModal" data-whateverid="<?php echo $registros['idfuncionario']; ?>" data-whatevernome="<?php echo $registros['nome']; ?>" data-whateverdetalhes="<?php echo $registros['email']; ?>" data-whatevertel="<?php echo $registros['telefone']; ?>" data-whatevercpf="<?php echo $registros['cpf']; ?>" data-whateversexo="<?php echo $registros['sexo']; ?>" data-whatevernasc="<?php echo date('d/m/Y', strtotime($registros['nascimento'])); ?>" data-whatevercep="<?php echo $registros['cep']; ?>" data-whateverrua="<?php echo $registros['rua']; ?>" data-whatevernumero="<?php echo $registros['numero']; ?>" data-whatevercomp="<?php echo $registros['complemento']; ?>" data-whateverbairro="<?php echo $registros['bairro']; ?>" data-whatevercity="<?php echo $registros['cidade']; ?>" data-whateveruf="<?php echo $registros['uf']; ?>" data-whatevertelfuncao="<?php echo $registros['funcao']; ?>" data-whateveringresso="<?php echo date('d/m/Y', strtotime($registros['ingresso'])); ?>" data-whateverfav1="<?php echo $registros['favorecido1']; ?>" data-whateverbanco1="<?php echo $registros['banco1']; ?>" data-whateveragencia1="<?php echo $registros['agencia1']; ?>" data-whateverconta1="<?php echo $registros['conta1']; ?>" data-whatevertipo1="<?php echo $registros['tipo_conta1']; ?>" data-whateverfav2="<?php echo $registros['favorecido2']; ?>" data-whateverbanco2="<?php echo $registros['banco2']; ?>" data-whateveragencia2="<?php echo $registros['agencia2']; ?>" data-whateverconta2="<?php echo $registros['conta2']; ?>" data-whatevertipo2="<?php echo $registros['tipo_conta2']; ?>">
                        </span>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>12/12/12</td>
                    <td>06:20</td>
                    <td>Exemplo</td>
                    <td>
                      <div class='item_lista'>
                        <span class="fa fa-edit item_lista" data-toggle="modal" data-target="#exampleModal" data-whateverid="<?php echo $registros['idfuncionario']; ?>" data-whatevernome="<?php echo $registros['nome']; ?>" data-whateverdetalhes="<?php echo $registros['email']; ?>" data-whatevertel="<?php echo $registros['telefone']; ?>" data-whatevercpf="<?php echo $registros['cpf']; ?>" data-whateversexo="<?php echo $registros['sexo']; ?>" data-whatevernasc="<?php echo date('d/m/Y', strtotime($registros['nascimento'])); ?>" data-whatevercep="<?php echo $registros['cep']; ?>" data-whateverrua="<?php echo $registros['rua']; ?>" data-whatevernumero="<?php echo $registros['numero']; ?>" data-whatevercomp="<?php echo $registros['complemento']; ?>" data-whateverbairro="<?php echo $registros['bairro']; ?>" data-whatevercity="<?php echo $registros['cidade']; ?>" data-whateveruf="<?php echo $registros['uf']; ?>" data-whatevertelfuncao="<?php echo $registros['funcao']; ?>" data-whateveringresso="<?php echo date('d/m/Y', strtotime($registros['ingresso'])); ?>" data-whateverfav1="<?php echo $registros['favorecido1']; ?>" data-whateverbanco1="<?php echo $registros['banco1']; ?>" data-whateveragencia1="<?php echo $registros['agencia1']; ?>" data-whateverconta1="<?php echo $registros['conta1']; ?>" data-whatevertipo1="<?php echo $registros['tipo_conta1']; ?>" data-whateverfav2="<?php echo $registros['favorecido2']; ?>" data-whateverbanco2="<?php echo $registros['banco2']; ?>" data-whateveragencia2="<?php echo $registros['agencia2']; ?>" data-whateverconta2="<?php echo $registros['conta2']; ?>" data-whatevertipo2="<?php echo $registros['tipo_conta2']; ?>">
                        </span>
                      </div>
                    </td>
                    <td>
                      <div class='item_lista'>
                        <span class="fa fa-eye item_lista" data-toggle="modal" data-target="#seeModal" data-whateverid="<?php echo $registros['idfuncionario']; ?>" data-whatevernome="<?php echo $registros['nome']; ?>" data-whateverdetalhes="<?php echo $registros['email']; ?>" data-whatevertel="<?php echo $registros['telefone']; ?>" data-whatevercpf="<?php echo $registros['cpf']; ?>" data-whateversexo="<?php echo $registros['sexo']; ?>" data-whatevernasc="<?php echo date('d/m/Y', strtotime($registros['nascimento'])); ?>" data-whatevercep="<?php echo $registros['cep']; ?>" data-whateverrua="<?php echo $registros['rua']; ?>" data-whatevernumero="<?php echo $registros['numero']; ?>" data-whatevercomp="<?php echo $registros['complemento']; ?>" data-whateverbairro="<?php echo $registros['bairro']; ?>" data-whatevercity="<?php echo $registros['cidade']; ?>" data-whateveruf="<?php echo $registros['uf']; ?>" data-whatevertelfuncao="<?php echo $registros['funcao']; ?>" data-whateveringresso="<?php echo date('d/m/Y', strtotime($registros['ingresso'])); ?>" data-whateverfav1="<?php echo $registros['favorecido1']; ?>" data-whateverbanco1="<?php echo $registros['banco1']; ?>" data-whateveragencia1="<?php echo $registros['agencia1']; ?>" data-whateverconta1="<?php echo $registros['conta1']; ?>" data-whatevertipo1="<?php echo $registros['tipo_conta1']; ?>" data-whateverfav2="<?php echo $registros['favorecido2']; ?>" data-whateverbanco2="<?php echo $registros['banco2']; ?>" data-whateveragencia2="<?php echo $registros['agencia2']; ?>" data-whateverconta2="<?php echo $registros['conta2']; ?>" data-whatevertipo2="<?php echo $registros['tipo_conta2']; ?>">
                        </span>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>12/12/12</td>
                    <td>06:20</td>
                    <td>Exemplo</td>
                    <td>
                      <div class='item_lista'>
                        <span class="fa fa-edit item_lista" data-toggle="modal" data-target="#exampleModal" data-whateverid="<?php echo $registros['idfuncionario']; ?>" data-whatevernome="<?php echo $registros['nome']; ?>" data-whateverdetalhes="<?php echo $registros['email']; ?>" data-whatevertel="<?php echo $registros['telefone']; ?>" data-whatevercpf="<?php echo $registros['cpf']; ?>" data-whateversexo="<?php echo $registros['sexo']; ?>" data-whatevernasc="<?php echo date('d/m/Y', strtotime($registros['nascimento'])); ?>" data-whatevercep="<?php echo $registros['cep']; ?>" data-whateverrua="<?php echo $registros['rua']; ?>" data-whatevernumero="<?php echo $registros['numero']; ?>" data-whatevercomp="<?php echo $registros['complemento']; ?>" data-whateverbairro="<?php echo $registros['bairro']; ?>" data-whatevercity="<?php echo $registros['cidade']; ?>" data-whateveruf="<?php echo $registros['uf']; ?>" data-whatevertelfuncao="<?php echo $registros['funcao']; ?>" data-whateveringresso="<?php echo date('d/m/Y', strtotime($registros['ingresso'])); ?>" data-whateverfav1="<?php echo $registros['favorecido1']; ?>" data-whateverbanco1="<?php echo $registros['banco1']; ?>" data-whateveragencia1="<?php echo $registros['agencia1']; ?>" data-whateverconta1="<?php echo $registros['conta1']; ?>" data-whatevertipo1="<?php echo $registros['tipo_conta1']; ?>" data-whateverfav2="<?php echo $registros['favorecido2']; ?>" data-whateverbanco2="<?php echo $registros['banco2']; ?>" data-whateveragencia2="<?php echo $registros['agencia2']; ?>" data-whateverconta2="<?php echo $registros['conta2']; ?>" data-whatevertipo2="<?php echo $registros['tipo_conta2']; ?>">
                        </span>
                      </div>
                    </td>
                    <td>
                      <div class='item_lista'>
                        <span class="fa fa-eye item_lista" data-toggle="modal" data-target="#seeModal" data-whateverid="<?php echo $registros['idfuncionario']; ?>" data-whatevernome="<?php echo $registros['nome']; ?>" data-whateverdetalhes="<?php echo $registros['email']; ?>" data-whatevertel="<?php echo $registros['telefone']; ?>" data-whatevercpf="<?php echo $registros['cpf']; ?>" data-whateversexo="<?php echo $registros['sexo']; ?>" data-whatevernasc="<?php echo date('d/m/Y', strtotime($registros['nascimento'])); ?>" data-whatevercep="<?php echo $registros['cep']; ?>" data-whateverrua="<?php echo $registros['rua']; ?>" data-whatevernumero="<?php echo $registros['numero']; ?>" data-whatevercomp="<?php echo $registros['complemento']; ?>" data-whateverbairro="<?php echo $registros['bairro']; ?>" data-whatevercity="<?php echo $registros['cidade']; ?>" data-whateveruf="<?php echo $registros['uf']; ?>" data-whatevertelfuncao="<?php echo $registros['funcao']; ?>" data-whateveringresso="<?php echo date('d/m/Y', strtotime($registros['ingresso'])); ?>" data-whateverfav1="<?php echo $registros['favorecido1']; ?>" data-whateverbanco1="<?php echo $registros['banco1']; ?>" data-whateveragencia1="<?php echo $registros['agencia1']; ?>" data-whateverconta1="<?php echo $registros['conta1']; ?>" data-whatevertipo1="<?php echo $registros['tipo_conta1']; ?>" data-whateverfav2="<?php echo $registros['favorecido2']; ?>" data-whateverbanco2="<?php echo $registros['banco2']; ?>" data-whateveragencia2="<?php echo $registros['agencia2']; ?>" data-whateverconta2="<?php echo $registros['conta2']; ?>" data-whatevertipo2="<?php echo $registros['tipo_conta2']; ?>">
                        </span>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>12/12/12</td>
                    <td>06:20</td>
                    <td>Exemplo</td>
                    <td>
                      <div class='item_lista'>
                        <span class="fa fa-edit item_lista" data-toggle="modal" data-target="#exampleModal" data-whateverid="<?php echo $registros['idfuncionario']; ?>" data-whatevernome="<?php echo $registros['nome']; ?>" data-whateverdetalhes="<?php echo $registros['email']; ?>" data-whatevertel="<?php echo $registros['telefone']; ?>" data-whatevercpf="<?php echo $registros['cpf']; ?>" data-whateversexo="<?php echo $registros['sexo']; ?>" data-whatevernasc="<?php echo date('d/m/Y', strtotime($registros['nascimento'])); ?>" data-whatevercep="<?php echo $registros['cep']; ?>" data-whateverrua="<?php echo $registros['rua']; ?>" data-whatevernumero="<?php echo $registros['numero']; ?>" data-whatevercomp="<?php echo $registros['complemento']; ?>" data-whateverbairro="<?php echo $registros['bairro']; ?>" data-whatevercity="<?php echo $registros['cidade']; ?>" data-whateveruf="<?php echo $registros['uf']; ?>" data-whatevertelfuncao="<?php echo $registros['funcao']; ?>" data-whateveringresso="<?php echo date('d/m/Y', strtotime($registros['ingresso'])); ?>" data-whateverfav1="<?php echo $registros['favorecido1']; ?>" data-whateverbanco1="<?php echo $registros['banco1']; ?>" data-whateveragencia1="<?php echo $registros['agencia1']; ?>" data-whateverconta1="<?php echo $registros['conta1']; ?>" data-whatevertipo1="<?php echo $registros['tipo_conta1']; ?>" data-whateverfav2="<?php echo $registros['favorecido2']; ?>" data-whateverbanco2="<?php echo $registros['banco2']; ?>" data-whateveragencia2="<?php echo $registros['agencia2']; ?>" data-whateverconta2="<?php echo $registros['conta2']; ?>" data-whatevertipo2="<?php echo $registros['tipo_conta2']; ?>">
                        </span>
                      </div>
                    </td>
                    <td>
                      <div class='item_lista'>
                        <span class="fa fa-eye item_lista" data-toggle="modal" data-target="#seeModal" data-whateverid="<?php echo $registros['idfuncionario']; ?>" data-whatevernome="<?php echo $registros['nome']; ?>" data-whateverdetalhes="<?php echo $registros['email']; ?>" data-whatevertel="<?php echo $registros['telefone']; ?>" data-whatevercpf="<?php echo $registros['cpf']; ?>" data-whateversexo="<?php echo $registros['sexo']; ?>" data-whatevernasc="<?php echo date('d/m/Y', strtotime($registros['nascimento'])); ?>" data-whatevercep="<?php echo $registros['cep']; ?>" data-whateverrua="<?php echo $registros['rua']; ?>" data-whatevernumero="<?php echo $registros['numero']; ?>" data-whatevercomp="<?php echo $registros['complemento']; ?>" data-whateverbairro="<?php echo $registros['bairro']; ?>" data-whatevercity="<?php echo $registros['cidade']; ?>" data-whateveruf="<?php echo $registros['uf']; ?>" data-whatevertelfuncao="<?php echo $registros['funcao']; ?>" data-whateveringresso="<?php echo date('d/m/Y', strtotime($registros['ingresso'])); ?>" data-whateverfav1="<?php echo $registros['favorecido1']; ?>" data-whateverbanco1="<?php echo $registros['banco1']; ?>" data-whateveragencia1="<?php echo $registros['agencia1']; ?>" data-whateverconta1="<?php echo $registros['conta1']; ?>" data-whatevertipo1="<?php echo $registros['tipo_conta1']; ?>" data-whateverfav2="<?php echo $registros['favorecido2']; ?>" data-whateverbanco2="<?php echo $registros['banco2']; ?>" data-whateveragencia2="<?php echo $registros['agencia2']; ?>" data-whateverconta2="<?php echo $registros['conta2']; ?>" data-whatevertipo2="<?php echo $registros['tipo_conta2']; ?>">
                        </span>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>12/12/12</td>
                    <td>06:20</td>
                    <td>Exemplo</td>
                    <td>
                      <div class='item_lista'>
                        <span class="fa fa-edit item_lista" data-toggle="modal" data-target="#exampleModal" data-whateverid="<?php echo $registros['idfuncionario']; ?>" data-whatevernome="<?php echo $registros['nome']; ?>" data-whateverdetalhes="<?php echo $registros['email']; ?>" data-whatevertel="<?php echo $registros['telefone']; ?>" data-whatevercpf="<?php echo $registros['cpf']; ?>" data-whateversexo="<?php echo $registros['sexo']; ?>" data-whatevernasc="<?php echo date('d/m/Y', strtotime($registros['nascimento'])); ?>" data-whatevercep="<?php echo $registros['cep']; ?>" data-whateverrua="<?php echo $registros['rua']; ?>" data-whatevernumero="<?php echo $registros['numero']; ?>" data-whatevercomp="<?php echo $registros['complemento']; ?>" data-whateverbairro="<?php echo $registros['bairro']; ?>" data-whatevercity="<?php echo $registros['cidade']; ?>" data-whateveruf="<?php echo $registros['uf']; ?>" data-whatevertelfuncao="<?php echo $registros['funcao']; ?>" data-whateveringresso="<?php echo date('d/m/Y', strtotime($registros['ingresso'])); ?>" data-whateverfav1="<?php echo $registros['favorecido1']; ?>" data-whateverbanco1="<?php echo $registros['banco1']; ?>" data-whateveragencia1="<?php echo $registros['agencia1']; ?>" data-whateverconta1="<?php echo $registros['conta1']; ?>" data-whatevertipo1="<?php echo $registros['tipo_conta1']; ?>" data-whateverfav2="<?php echo $registros['favorecido2']; ?>" data-whateverbanco2="<?php echo $registros['banco2']; ?>" data-whateveragencia2="<?php echo $registros['agencia2']; ?>" data-whateverconta2="<?php echo $registros['conta2']; ?>" data-whatevertipo2="<?php echo $registros['tipo_conta2']; ?>">
                        </span>
                      </div>
                    </td>
                    <td>
                      <div class='item_lista'>
                        <span class="fa fa-eye item_lista" data-toggle="modal" data-target="#seeModal" data-whateverid="<?php echo $registros['idfuncionario']; ?>" data-whatevernome="<?php echo $registros['nome']; ?>" data-whateverdetalhes="<?php echo $registros['email']; ?>" data-whatevertel="<?php echo $registros['telefone']; ?>" data-whatevercpf="<?php echo $registros['cpf']; ?>" data-whateversexo="<?php echo $registros['sexo']; ?>" data-whatevernasc="<?php echo date('d/m/Y', strtotime($registros['nascimento'])); ?>" data-whatevercep="<?php echo $registros['cep']; ?>" data-whateverrua="<?php echo $registros['rua']; ?>" data-whatevernumero="<?php echo $registros['numero']; ?>" data-whatevercomp="<?php echo $registros['complemento']; ?>" data-whateverbairro="<?php echo $registros['bairro']; ?>" data-whatevercity="<?php echo $registros['cidade']; ?>" data-whateveruf="<?php echo $registros['uf']; ?>" data-whatevertelfuncao="<?php echo $registros['funcao']; ?>" data-whateveringresso="<?php echo date('d/m/Y', strtotime($registros['ingresso'])); ?>" data-whateverfav1="<?php echo $registros['favorecido1']; ?>" data-whateverbanco1="<?php echo $registros['banco1']; ?>" data-whateveragencia1="<?php echo $registros['agencia1']; ?>" data-whateverconta1="<?php echo $registros['conta1']; ?>" data-whatevertipo1="<?php echo $registros['tipo_conta1']; ?>" data-whateverfav2="<?php echo $registros['favorecido2']; ?>" data-whateverbanco2="<?php echo $registros['banco2']; ?>" data-whateveragencia2="<?php echo $registros['agencia2']; ?>" data-whateverconta2="<?php echo $registros['conta2']; ?>" data-whatevertipo2="<?php echo $registros['tipo_conta2']; ?>">
                        </span>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>12/12/12</td>
                    <td>06:20</td>
                    <td>Exemplo</td>
                    <td>
                      <div class='item_lista'>
                        <span class="fa fa-edit item_lista" data-toggle="modal" data-target="#exampleModal" data-whateverid="<?php echo $registros['idfuncionario']; ?>" data-whatevernome="<?php echo $registros['nome']; ?>" data-whateverdetalhes="<?php echo $registros['email']; ?>" data-whatevertel="<?php echo $registros['telefone']; ?>" data-whatevercpf="<?php echo $registros['cpf']; ?>" data-whateversexo="<?php echo $registros['sexo']; ?>" data-whatevernasc="<?php echo date('d/m/Y', strtotime($registros['nascimento'])); ?>" data-whatevercep="<?php echo $registros['cep']; ?>" data-whateverrua="<?php echo $registros['rua']; ?>" data-whatevernumero="<?php echo $registros['numero']; ?>" data-whatevercomp="<?php echo $registros['complemento']; ?>" data-whateverbairro="<?php echo $registros['bairro']; ?>" data-whatevercity="<?php echo $registros['cidade']; ?>" data-whateveruf="<?php echo $registros['uf']; ?>" data-whatevertelfuncao="<?php echo $registros['funcao']; ?>" data-whateveringresso="<?php echo date('d/m/Y', strtotime($registros['ingresso'])); ?>" data-whateverfav1="<?php echo $registros['favorecido1']; ?>" data-whateverbanco1="<?php echo $registros['banco1']; ?>" data-whateveragencia1="<?php echo $registros['agencia1']; ?>" data-whateverconta1="<?php echo $registros['conta1']; ?>" data-whatevertipo1="<?php echo $registros['tipo_conta1']; ?>" data-whateverfav2="<?php echo $registros['favorecido2']; ?>" data-whateverbanco2="<?php echo $registros['banco2']; ?>" data-whateveragencia2="<?php echo $registros['agencia2']; ?>" data-whateverconta2="<?php echo $registros['conta2']; ?>" data-whatevertipo2="<?php echo $registros['tipo_conta2']; ?>">
                        </span>
                      </div>
                    </td>
                    <td>
                      <div class='item_lista'>
                        <span class="fa fa-eye item_lista" data-toggle="modal" data-target="#seeModal" data-whateverid="<?php echo $registros['idfuncionario']; ?>" data-whatevernome="<?php echo $registros['nome']; ?>" data-whateverdetalhes="<?php echo $registros['email']; ?>" data-whatevertel="<?php echo $registros['telefone']; ?>" data-whatevercpf="<?php echo $registros['cpf']; ?>" data-whateversexo="<?php echo $registros['sexo']; ?>" data-whatevernasc="<?php echo date('d/m/Y', strtotime($registros['nascimento'])); ?>" data-whatevercep="<?php echo $registros['cep']; ?>" data-whateverrua="<?php echo $registros['rua']; ?>" data-whatevernumero="<?php echo $registros['numero']; ?>" data-whatevercomp="<?php echo $registros['complemento']; ?>" data-whateverbairro="<?php echo $registros['bairro']; ?>" data-whatevercity="<?php echo $registros['cidade']; ?>" data-whateveruf="<?php echo $registros['uf']; ?>" data-whatevertelfuncao="<?php echo $registros['funcao']; ?>" data-whateveringresso="<?php echo date('d/m/Y', strtotime($registros['ingresso'])); ?>" data-whateverfav1="<?php echo $registros['favorecido1']; ?>" data-whateverbanco1="<?php echo $registros['banco1']; ?>" data-whateveragencia1="<?php echo $registros['agencia1']; ?>" data-whateverconta1="<?php echo $registros['conta1']; ?>" data-whatevertipo1="<?php echo $registros['tipo_conta1']; ?>" data-whateverfav2="<?php echo $registros['favorecido2']; ?>" data-whateverbanco2="<?php echo $registros['banco2']; ?>" data-whateveragencia2="<?php echo $registros['agencia2']; ?>" data-whateverconta2="<?php echo $registros['conta2']; ?>" data-whatevertipo2="<?php echo $registros['tipo_conta2']; ?>">
                        </span>
                      </div>
                    </td>
                  </tr>
              </tbody>
            </table>            
                    
                  
                  <!-- MODAL DE EDIÇÃO -->
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
                      <form action="../../../sistema/php/apresentaDados/funcionario/alter.php" method="POST"> 
                      <div class="box-body">
                        <div class="row">
                          <div class="form-group col-lg-12">
                          <h5>Novo arquivo</h5>
                              <input type="text" name= "nome" class="form-control" placeholder="ARQUIVO">
                          </div>
                    
                        </div>
                      </div>
                    
                      <div class="modal-footer">
                        <input type="submit" class="btn btn-alert" value="Cancelar" name="submit">
                        <input type="submit" class="btn btn-primary" value="Atualizar Entrega" name="submit">
                      </div>

                    </form>
                    </div>   
                  </div>
                  
                </div>
                  
              </div>
                
            </div>
                  
            <!-- MODAL DE Adição -->
            <div id="addModal" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Adicionar Leitura</h4>
                  </div>
                  <div class="modal-body">
                    <div class="box">
                  <!-- /.box-header -->
                  <div class="col-md-9"> 
                  <form action="../../../sistema/php/apresentaDados/funcionario/insert.php" method="POST" enctype="multipart/form-data">
                    <form action="select.php">
                    <div class="form-group">
                      <h5>Nome do Cliente</h5>
                        <select class="form-control" name="nome">
                          <option value="">Selecione...</option>
                            <?php 
                              require_once('../../../sistema/php/conectaBd/index.php');
                              $objDb = new db();
                              $link = $objDb->conecta_mysql();
                              $sql = " SELECT * FROM clientes";
                              $resultado_ids = mysqli_query($link, $sql);
                              if($resultado_ids){
                              while($registros = mysqli_fetch_array($resultado_ids, MYSQLI_ASSOC)){
                              echo '<option value="'.$registros['nomeClientes'].'">'.$registros['nomeClientes'].'</option>';
                                }
                              }else{
                                echo 'Erro na consulta dos emails no banco de dados!';
                              }
                            ?>
                          </select>
                              <h5>Nome do Funcionário</h5>
                                <select class="form-control" name="nome">
                                  <option value="">Selecione...</option>
                                    <?php 
                                      require_once('../../../sistema/php/conectaBd/index.php');
                                      $objDb = new db();
                                      $link = $objDb->conecta_mysql();
                                      $sql = " SELECT * FROM funcionarios";
                                      $resultado_ids = mysqli_query($link, $sql);
                                      if($resultado_ids){
                                      while($registros = mysqli_fetch_array($resultado_ids, MYSQLI_ASSOC)){
                                      echo '<option value="'.$registros['nomeFuncionarios'].'">'.$registros['nomeFuncionarios'].'</option>';
                                        }
                                      }else{
                                        echo 'Erro na consulta dos funcionários no banco de dados!';
                                      }
                                    ?>
                                </select>
                              <div class="row">
                                <div class="form-group col-lg-4">
                                  <h5>Selecionar arquivo</h5>
                                    <input type="file" name= "arquivo">
                                </div>
                                <div class="modal-footer">
                                      <input type="submit" class="btn btn-alert" value="Cancelar" name="submit">
                                      <input type="submit" class="btn btn-primary" value="Confirmar" name="submit">
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

      <!-- /.row -->
  </section>        

    </section>
</div>
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

      var recipientfuncao = button.data('whatevertelfuncao')
      var recipientingresso = button.data('whateveringresso')

      var recipientfav1 = button.data('whateverfav1')
      var recipientbanco1 = button.data('whateverbanco1')
      var recipientagencia1 = button.data('whateveragencia1')
      var recipientconta1 = button.data('whateverconta1')
      var recipienttipo1 = button.data('whatevertipo1')

      var recipientfav2 = button.data('whateverfav2')
      var recipientbanco2 = button.data('whateverbanco2')
      var recipientagencia2 = button.data('whateveragencia2')
      var recipientconta2 = button.data('whateverconta2')
      var recipienttipo2 = button.data('whatevertipo2')


      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)

      modal.find('#id-curso').val(recipient)
      modal.find('#recipient-name').val(recipientnome)
      modal.find('#recipient-id').val(recipientid)
      modal.find('#detalhes').val(recipientdetalhes)
      modal.find('#nascimento').val(recipientnasc)
      modal.find('#cpf').val(recipientcpf)
      modal.find('#telefone').val(recipienttel)
      modal.find('#sexo').val(recipientsexo)
      modal.find('#cep').val(recipientcep)
      modal.find('#rua').val(recipientrua)
      modal.find('#numero').val(recipientnumero)
      modal.find('#bairro').val(recipientbairro)
      modal.find('#complemento').val(recipientcomplemento)
      modal.find('#cidade').val(recipientcidade)
      modal.find('#uf').val(recipientestuf)
      modal.find('#funcao').val(recipientfuncao)
      modal.find('#ingresso').val(recipientingresso)
      modal.find('#favorecido1').val(recipientfav1)
      modal.find('#banco1').val(recipientbanco1)
      modal.find('#agencia1').val(recipientagencia1)
      modal.find('#conta1').val(recipientconta1)
      modal.find('#tipo1').val(recipienttipo1)
      modal.find('#favorecido2').val(recipientfav2)
      modal.find('#banco2').val(recipientbanco2)
      modal.find('#agencia2').val(recipientagencia2)
      modal.find('#conta2').val(recipientconta2)
      modal.find('#tipo2').val(recipienttipo2)
      
    })

    $('#seeModal').on('show.bs.modal', function (event) {
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

      var recipientfuncao = button.data('whatevertelfuncao')
      var recipientingresso = button.data('whateveringresso')

      var recipientfav1 = button.data('whateverfav1')
      var recipientbanco1 = button.data('whateverbanco1')
      var recipientagencia1 = button.data('whateveragencia1')
      var recipientconta1 = button.data('whateverconta1')
      var recipienttipo1 = button.data('whatevertipo1')

      var recipientfav2 = button.data('whateverfav2')
      var recipientbanco2 = button.data('whateverbanco2')
      var recipientagencia2 = button.data('whateveragencia2')
      var recipientconta2 = button.data('whateverconta2')
      var recipienttipo2 = button.data('whatevertipo2')


      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)

      modal.find('#id-curso').val(recipient)
      modal.find('#recipient-name').val(recipientnome)
      modal.find('#recipient-id').val(recipientid)
      modal.find('#detalhes').val(recipientdetalhes)
      modal.find('#nascimento').val(recipientnasc)
      modal.find('#cpf').val(recipientcpf)
      modal.find('#telefone').val(recipienttel)
      modal.find('#sexo').val(recipientsexo)
      modal.find('#cep').val(recipientcep)
      modal.find('#rua').val(recipientrua)
      modal.find('#numero').val(recipientnumero)
      modal.find('#bairro').val(recipientbairro)
      modal.find('#complemento').val(recipientcomplemento)
      modal.find('#cidade').val(recipientcidade)
      modal.find('#uf').val(recipientestuf)
      modal.find('#funcao').val(recipientfuncao)
      modal.find('#ingresso').val(recipientingresso)
      modal.find('#favorecido1').val(recipientfav1)
      modal.find('#banco1').val(recipientbanco1)
      modal.find('#agencia1').val(recipientagencia1)
      modal.find('#conta1').val(recipientconta1)
      modal.find('#tipo1').val(recipienttipo1)
      modal.find('#favorecido2').val(recipientfav2)
      modal.find('#banco2').val(recipientbanco2)
      modal.find('#agencia2').val(recipientagencia2)
      modal.find('#conta2').val(recipientconta2)
      modal.find('#tipo2').val(recipienttipo2)
      
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
    $('#ModalApagar').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipient = button.data('id') // Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)
      modal.find('.modal-footer #id').val(recipient)
    })
</script>

</body>
</html>
