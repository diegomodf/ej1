<?php
    
    require_once('../../conectaBd/index.php'); 
    $objDb = new db();
    $link = $objDb->conecta_mysql();


    $sala = $_POST['nome-da-sala'];
    $profissional = '';

    $sql_sala = "INSERT INTO `salas`(`idsala`, `nome_sala`, `nome_profissional`) VALUES (NULL, $sala, $profissional)";
    echo $sql_sala;
    mysqli_query($link, $sql_sala);
    header("Location: ../../../../paginas/salas/salas/index.php");
?>