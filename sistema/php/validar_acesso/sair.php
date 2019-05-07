<?php
    session_start();

    unset($_SESSION['nome']);
    unset($_SESSION['email']);
    unset($_SESSION['funcao']);
    header('Location: ../../../index.php');
?>