<?php 
    require_once('../../conectaBd/index.php'); 

    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $id = $_POST['idfuncionario'];
    echo $abc;
    $titulo = $_POST['nome']; 
    echo $titulo;
    $sexo = $_POST['sexo'];
    $nascimento = $_POST['nascimento'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];
    $cep = $_POST['cep'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $uf = $_POST['uf'];
    $ingresso = $_POST['ingresso'];
    $funcao = $_POST['funcao'];
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

    $sql_funcionario = "UPDATE `funcionario` SET `nome` = '$titulo', `email` = '$email', `telefone` = '$telefone', `sexo` = '$sexo', `cpf` = '$cpf', `nascimento` = '$nascimento', `cep` = '$cep', `rua` = '$rua', `numero` = '$numero', `complemento` = '$complemento', `bairro` = '$bairro', `cidade` = '$cidade', `uf` = '$uf', `funcao` = '$funcao', `ingresso` = '$ingresso', `favorecido1` = '$favorecido1', `banco1` = '$banco1', `agencia1` = '$agencia1', `conta1` = '$conta1', `tipo_conta1` = '$tipo1', `favorecido2` = '$favorecido2', `banco2` = '$banco2', `agencia2` = '$agencia2', `conta2` = '$conta2', `tipo_conta2` = '$tipo2' WHERE `funcionario`.`idfuncionario` = $id ";

    

    //$valores = strtoupper($sql_funcionario);
    mysqli_query($link, $sql_funcionario);
    header("Location: ../../../../paginas/usuarios/funcionarios/index.php");

?>