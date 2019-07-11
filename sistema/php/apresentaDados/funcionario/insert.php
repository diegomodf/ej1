<?php
    
    require_once('../../conectaBd/index.php'); 

    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $nome = $_POST['nome']; 
    $email = $_POST['email'];
    $areadeatuacao = $_POST['areadeatuacao'];
    $senha = $_POST['senha'];

    $sql_funcionario = "INSERT INTO `Funcionarios` (`idFuncionarios`, `nomeFuncionarios`, `emailFuncionarios`,`senhaFuncionarios`, `areadeatuaçãoFuncionarios`) VALUES (NULL, '$nome', '$email', '$senha', '$areadeatuacao');";
    /*$objFuncionario = new funcionario($titulo, $email, $telefone, $sexo, $cpf, $nascimento, $cep, $rua, $numero, $complemento, $bairro, $cidade, $uf, $funcao, $ingresso, $favorecido1, $banco1, $agencia1, $conta1, $tipo1, $favorecido2, $banco2, $agencia2, $conta2, $tipo2, $link);
    $funcionario = $objFuncionario->insertFuncionario();*/

    mysqli_query($link, $sql_funcionario);
    header("Location: ../../../../paginas/usuarios/funcionarios/index.php");






