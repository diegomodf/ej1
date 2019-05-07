<?php
    
    require_once('../../conectaBd/index.php'); 

    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $especialidade = $_POST['cbo'];

    $sql_especialidade = "INSERT INTO `especialidade` (`idespecialidade`, `especialidade`) VALUES (NULL, '$especialidade')";

    $especialidade = strtoupper($sql_especialidade);
    if(mysqli_query($link, $especialidade)){
        echo "CADASTROU!";
    }
    header("Location: ../../../../paginas/usuarios/profissionais/especialidade.php");