<?php
    
    require_once('../../conectaBd/index.php'); 
    require_once('../../funcoesBd/operadora/index.php');

    $nome = $_POST['nome'];
    $id_clifops = $_POST['identificacao'];
    $registro_ans = $_POST['registro_ans'];
    $tabela_cobranca = $_POST['tabela'];
    $versao_tiss = $_POST['versao'];
    $contato_nome = $_POST['nome_contato'];
    $contato_email = $_POST['email_contato'];
    $contato_tel = $_POST['tel_contato'];    

    $objOperadora = new operadora();
    $operadora = $objOperadora->insertOperadora($idoperadora, $nome, $id_clifops, $id_registro_ans, $tabela_cobranca, $versao_tiss, $contato_nome, $contato_email, $contato_telm $link);
    
    $valores = strtoupper($operadora);
    mysqli_query($link, $operadora);
    header("Location: ../../../../paginas/cadastro/operadora/index.php");
?>