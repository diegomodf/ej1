<?php
    
    require_once('../../conectaBd/index.php'); 
    require_once('../../funcoesBd/profissional/index.php');


    $id = $_POST['id']; //Check
    $titulo = $_POST['nome'];  //Check
    $email = $_POST['email'];  //Check
    $sexo = $_POST['sexo']; //Check
    $nascimento = $_POST['nascimento']; //Check
    $atividade = $_POST['atividade']; //Check
    $especialidade = $_POST['cbo']; //Check
    $telefone = $_POST['telefone']; //Check
    $cpf = $_POST['cpf']; //Check
    $rg = $_POST['rg']; //Check
    $orgao = $_POST['orgao']; //Check
    $cep = $_POST['cep']; //Check
    $rua = $_POST['rua']; //Check
    $numero = $_POST['numero']; //Check
    $complemento = $_POST['complemento']; //Check
    $bairro = $_POST['bairro']; //Check
    $cidade = $_POST['cidade']; //Check
    $uf = $_POST['uf']; //Check
    $conselho = $_POST['conselho']; //Check
    $num_conselho = $_POST['num_conselho']; //Check
    $uf_conselho = $_POST['uf_conselho']; //Check
    $favorecido1 = $_POST['favorecido1'];
    $banco1 = $_POST['banco1'];
    $agencia1 = $_POST['agencia1'];
    $conta1 = $_POST['conta1'];
    $tipo1 = $_POST['tipo1'];
    $favorecido2 = $_POST['favorecido2'];
    $banco2 = $_POST['banco2'];
    $agencia2 = $_POST['agencia2'];
    $conta2 = $_POST['conta2'];
    $tipo2 = $_POST['tipo2'];

    

    echo $id;
    echo $titulo;
    echo $telefone;

    $objProfissional = new profissional();
    $profissional = $objProfissional->alterProfissional($id, $titulo, $sexo, $nascimento, $atividade, $email, $telefone, $cpf, $rg, $orgao, $cep, $rua, $numero, $complemento, $bairro, $cidade, $uf, $conselho, $num_conselho, $uf_conselho, $especialidade, $favorecido1, $banco1, $agencia1, $conta1, $tipo1, $favorecido2, $banco2, $agencia2, $conta2, $tipo2);

       //$valores = strtoupper($profissional);
       mysqli_query($link, $profissional);
       //header("Location: ../../../../paginas/usuarios/pacientes/index.php");           
      
?>