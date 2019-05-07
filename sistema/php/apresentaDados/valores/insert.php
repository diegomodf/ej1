<?php

    require_once('../../conectaBd/index.php'); 
    require_once('../../funcoesBd/valores/index.php');

    $operadora = $_POST['operadora'];
    $descricao = $_POST['descricao'];
    $tabela = $_POST['tabela'];
    $codigo = $_POST['codigo'];
    $valor = $_POST['valor'];
    

    $objValor = new valor();
    $valor = $objValor->insertValor($operadora, $tabela, $codigo, $descricao, $valor, $link);
    $valores = strtoupper($valor);
    mysqli_query($link, $valores);
    echo $valores;
    header("Location: ../../../../paginas/usuarios/valores/index.php");
    

?>