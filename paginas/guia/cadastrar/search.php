<?php 

    session_start();
    if(!isset($_SESSION['nome']) || !isset($_SESSION['email']) || !isset($_SESSION['funcao'])){
        header('Location: ../../../index.php?erro=1');    
    }

	$cpf = $_POST['cpf'];
	header('Location: index.php?cpf='.$cpf.'');


?>