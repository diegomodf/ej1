<?php
    
    require_once('../../conectaBd/index.php'); 
    require_once('../../funcoesBd/desconto/index.php');

    $id = $_POST['id'];
    $referencia = $_POST['referencia'];
    $valor = $_POST['desconto'];

    $objDesconto = new desconto();
    $desconto = $objDesconto->insertDesconto($id, $referencia, $valor, $link);
    $valores = strtoupper($desconto);
    mysqli_query($link, $valores);
    header("Location: ../../../../paginas/usuarios/pacientes/index.php");
?>