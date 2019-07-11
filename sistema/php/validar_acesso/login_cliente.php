<?php

    session_start();

    require_once('../conectaBd/index.php'); 
    $objDb = new db();
    $link = $objDb->conecta_mysql();


    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM `Clientes` WHERE `emailClientes` = '$email' AND `senhaClientes` = '$senha';";
    $resultado = mysqli_query($link, $sql);
    
    if($resultado){
        while($dados_usuario = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            if(isset($dados_usuario['emailClientes'])){
                $_SESSION['email'] = $dados_usuario['emailClientes'];
                $_SESSION['nome'] = $dados_usuario['nomeClientes'];
                header('Location: ../../../paginas/usuarios/funcionarios');
            }else{
                header('Location: ../../../index.php?erro=1');
            }
        }
    }else{
        echo "Erro na execução da consulta, favor entrar em contato  o admin do site";
    }




?>
