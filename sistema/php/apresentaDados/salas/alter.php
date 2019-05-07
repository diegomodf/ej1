<?php

    require_once('../../conectaBd/index.php'); 
    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $profissional = $_POST['profissional'];
    $sala = $_POST['nome'];
    $id = $_POST['id'];
    echo $id;
    echo $sala;
    echo $profissional;

    $sql_sala = "UPDATE `salas` SET `nome_profissional` = '$profissional' WHERE `salas`.`idsala` = $id";
    mysqli_query($link, $sql_sala);
    header("Location: ../../../../paginas/salas/salas/index.php");
?>