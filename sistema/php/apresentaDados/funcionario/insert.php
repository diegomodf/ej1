<?php
    
    require_once('../../conectaBd/index.php'); 
    require_once('../../funcoesBd/funcionario/gerar_senha.php');
    require_once('e-mail.php');

    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $titulo = $_POST['nome']; 
    $email = $_POST['email'];
    $areadeatuacao = $_POST['areadeatuacao'];
    $senha = $_POST['senha'];

    $sql_funcionario = "INSERT INTO `funcionarios` (`idfuncionario`, `nome`, `email`, `areadeatuacao`,`senha`) VALUES (NULL, '$titulo', '$email', '$areadeatuacao', '$senha');";
    echo $sql_funcionario;
    envio($titulo, $email, $senha);
    /*$objFuncionario = new funcionario($titulo, $email, $telefone, $sexo, $cpf, $nascimento, $cep, $rua, $numero, $complemento, $bairro, $cidade, $uf, $funcao, $ingresso, $favorecido1, $banco1, $agencia1, $conta1, $tipo1, $favorecido2, $banco2, $agencia2, $conta2, $tipo2, $link);
    $funcionario = $objFuncionario->insertFuncionario();*/

    mysqli_query($link, $sql_funcionario);
    //header("Location: ../../../../paginas/usuarios/funcionarios/index.php");






