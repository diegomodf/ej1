<?php

    session_start();

    require_once('../conectaBd/index.php'); 



    $email = $_POST['email'];
    $senha = $_POST['senha'];
     

    $sql = "SELECT * FROM `clientes` WHERE email = '$email' AND senha = '$senha'";

    $objDb = new db();
    $link = $objDb->conecta_mysql();

    if($resultado_id = mysqli_query($link, $sql))
    
    if($resultado_id){
        $dados_usuario = mysqli_fetch_array($resultado_id);
        
        if(isset($dados_usuario['email'])){
            $_SESSION['email'] = $dados_usuario['email'];
            $_SESSION['nome'] = $dados_usuario['nome'];
            header('Location: ../../../paginas/usuarios/funcionarios');
        }else{
            header('Location: ../../../index_funcionarios.php?erro=1');
        }
    }else{
        echo "Erro na execução da consulta, favor entrar em contato com o admin do site";
    }




?>
