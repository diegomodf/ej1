<?php
    
    require_once('../../conectaBd/index.php'); 

    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $nome = $_POST['nome']; 
    $cnpj = $_POST['cnpj'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $areadeatuacao = $_POST['areadeatuacao'];
    $senha = $_POST['senha'];

    $sql_cliente = "INSERT INTO `Clientes` (`idClientes`, `nomeClientes`, `emailClientes`, `senhaClientes`, `telefoneClientes`, `cnpjClientes`, `areadeatuacaoClientes`, `enderecoClientes`) VALUES (NULL, '$nome', '$email', '$senha', '$telefone', '$cnpj', '$areadeatuacao', '$endereco');";
    /*$objFuncionario = new funcionario($titulo, $email, $telefone, $sexo, $cpf, $nascimento, $cep, $rua, $numero, $complemento, $bairro, $cidade, $uf, $funcao, $ingresso, $favorecido1, $banco1, $agencia1, $conta1, $tipo1, $favorecido2, $banco2, $agencia2, $conta2, $tipo2, $link);
    $funcionario = $objFuncionario->insertFuncionario();*/

    mysqli_query($link, $sql_cliente);
    header("Location: ../../../../paginas/usuarios/clientes/index.php");






