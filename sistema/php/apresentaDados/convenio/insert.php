<?php

    require_once('../../conectaBd/index.php'); 
    require_once('../../funcoesBd/convenio/index.php');

    $registro_ans = $_POST['registro_ans'];
    $nome = $_POST['nome'];
    $identificacao = $_POST['identificacao'];

    $nome_contato = $_POST['nome_contato'];
    $email_contato = $_POST['email_contato'];
    $tel_contato = $_POST['tel_contato'];

    $tabela = $_POST['tabela'];
    $versao = $_POST['versao'];

    $objConvenio = new convenio();
    $convenio = $objConvenio->insertConvenio($nome, $identificacao, $registro_ans, $tabela, $versao, $nome_contato, $email_contato, $tel_contato, $link);
   $valores = strtoupper($convenio);
   mysqli_query($link, $valores);
   header("Location: ../../../../paginas/usuarios/operadoras/index.php");
    

?>