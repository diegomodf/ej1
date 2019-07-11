<?php

    session_start();

    require_once('../conectaBd/index.php'); 
    $objDb = new db();
    $link = $objDb->conecta_mysql();


    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM `Funcionarios` WHERE `emailFuncionarios` = '$email' AND `senhaFuncionarios` = '$senha';";
    $resultado = mysqli_query($link, $sql);
    
    if($resultado){
        while($dados_usuario = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            if(isset($dados_usuario['emailClientes'])){
                $_SESSION['email'] = $dados_usuario['emailFuncionarios'];
                $_SESSION['nome'] = $dados_usuario['nomeFuncionarios'];
                header('Location: ../../../paginas/usuarios/funcionarios');
            }else{
                header('Location: ../../../index_funcionarios.php?erro=1');
            }
        }
    }else{
        echo "Erro na execução da consulta, favor entrar em contato  o admin do site";
    }




?>
