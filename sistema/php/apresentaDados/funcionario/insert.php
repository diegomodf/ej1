<?php
    
    require_once('../../conectaBd/index.php'); 
    require_once('../../funcoesBd/funcionario/gerar_senha.php');
    require_once('e-mail.php');

    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $titulo = $_POST['nome']; 
    $sexo = $_POST['sexo'];
    //$nascimento = $_POST['nascimento'];
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
    //$ingresso = $_POST['ingresso'];
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


    $senha = 'EEEEE';
    /*$senha = gerar_senha(10, true, true, true, false); 

    $nascimento = explode(" ", $nascimento);
    list($date, $hora) = $nascimento;
    $nascimento = array_reverse(explode("/", $date));
    $nascimento = implode("-", $nascimento);
    $nascimento = $nascimento . " " . $hora;          
        
    $ingresso = explode(" ", $ingresso);
    list($date, $hora) = $ingresso;
    $ingresso = array_reverse(explode("/", $date));
    $ingresso = implode("-", $ingresso);
    $ingresso = $ingresso . " " . $hora;
    */
    $nascimento = '2019-04-09';
    $ingresso = '2019-04-09';
    $sql_funcionario = "INSERT INTO `funcionario` (`idfuncionario`, `nome`, `email`, `telefone`, `sexo`, `cpf`, `nascimento`, `cep`, `rua`, `numero`, `complemento`, `bairro`, `cidade`, `uf`, `funcao`, `favorecido1`, `banco1`, `agencia1`, `conta1`, `tipo_conta1`, `favorecido2`, `banco2`, `agencia2`, `conta2`, `tipo_conta2`, `senha`) VALUES (NULL, '$titulo', '$email', '$telefone', '$sexo', '$cpf', '$nascimento', '$cep', '$rua', '$numero', '$complemento', '$bairro', '$cidade', '$uf', '$funcao', '$favorecido1', '$banco1', '$agencia1', '$conta1', '$tipo1', '$favorecido2', '$banco2', '$agencia2', '$conta2', '$tipo2', '$senha');";
    //echo $sql_funcionario;
    envio($titulo, $email, $senha);
    /*$objFuncionario = new funcionario($titulo, $email, $telefone, $sexo, $cpf, $nascimento, $cep, $rua, $numero, $complemento, $bairro, $cidade, $uf, $funcao, $ingresso, $favorecido1, $banco1, $agencia1, $conta1, $tipo1, $favorecido2, $banco2, $agencia2, $conta2, $tipo2, $link);
    $funcionario = $objFuncionario->insertFuncionario();*/

    mysqli_query($link, $sql_funcionario);
    //header("Location: ../../../../paginas/usuarios/funcionarios/index.php");






