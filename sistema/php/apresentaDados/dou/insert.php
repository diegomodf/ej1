<?php
    
    require_once('../../conectaBd/index.php'); 

    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $nome_c = $_POST['nome_cliente']; 
    $nome_f = $_POST['nome_func'];
    $arquivo = $_POST['arquivo'];

    $sql_dou = "INSERT INTO `dou` (`idDOU`, `nomeCliente`, `nomeFuncionario`, `arquivo`, `nomeUltimoFuncionario`, `idFuncionario`, `idCliente`, `idUltimoFuncionario`, `dataUpload`, `dataUpdate` ) VALUES (NULL, '$nome_c', '$nome_f', '$arquivo', '$nome_f', NULL , NULL, NULL, NULL, NULL );";
    echo $sql_dou;
    /*$objFuncionario = new funcionario($titulo, $email, $telefone, $sexo, $cpf, $nascimento, $cep, $rua, $numero, $complemento, $bairro, $cidade, $uf, $funcao, $ingresso, $favorecido1, $banco1, $agencia1, $conta1, $tipo1, $favorecido2, $banco2, $agencia2, $conta2, $tipo2, $link);
    $funcionario = $objFuncionario->insertFuncionario();*/

    mysqli_query($link, $sql_dou);
    header("Location: ../../../../paginas/usuarios/funcionarios/index.php");






