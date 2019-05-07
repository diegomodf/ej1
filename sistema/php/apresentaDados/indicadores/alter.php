<?php
    require_once('../../conectaBd/index.php'); 

    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $id = $_POST['id'];
    $pontuacao = $_POST['pontuacao'];
    $porcentagem = $_POST['porcentagem'];
    
    $sql = "UPDATE `indicadores` SET `pontuacao` = $pontuacao, `porcentagem` = $porcentagem WHERE `indicadores`.`idindicadores` = $id";

    mysqli_query($link, $sql);
    header('Location: ../../../../paginas/relatorios/indicadores/index.php');
?>