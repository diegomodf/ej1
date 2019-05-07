<?php
    require_once('../../conectaBd/index.php'); 
    require_once('../../funcoesBd/profissional/index.php');
    require_once('../../funcoesBd/funcionario/gerar_senha.php');
    require_once('e-mail.php');

    $titulo = $_POST['nome'];
    $sexo = $_POST['sexo'];
    $nascimento = $_POST['nascimento'];
    $atividade = $_POST['atividade'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $orgao = $_POST['orgao'];
    $cep = $_POST['cep'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $uf = $_POST['uf'];
    $conselho = $_POST['conselho'];
    $num_conselho = $_POST['num_conselho'];
    $uf_conselho = $_POST['uf_conselho'];
    $cbo = $_POST['cbo'];
    $favorecido1 = $_POST['favorecido1'];
    $banco1 = $_POST['banco1'];
    $agencia1 = $_POST['agencia1'];
    $conta1 = $_POST['conta1'];
    $tipo1 = $_POST['tipo1'];
    $favorecido2 = $_POST['favorecido2'];
    $banco2 = $_POST['banco2'];
    $agencia2 = $_POST['agencia2'];
    $conta2 = $_POST['conta2'];
    $tipo2 = $_POST['tipo2'];
    $funcao = 3;
    $ingresso = NULL;
    $senha = gerar_senha(10, true, true, true, false); 


    $objProfissional = new profissional();
    envio($titulo, $email, $senha);
    $profissional = $objProfissional->insertProfissional($atividade, $titulo, $telefone, $email, $sexo, $nascimento, $cpf, $cep, $rua, $numero, $complemento, $bairro, $cidade, $uf, $rg, $orgao, $conselho, $num_conselho, $uf_conselho, $cbo, $favorecido1, $banco1, $agencia1, $conta1, $tipo1, $favorecido2, $banco2, $agencia2, $conta2, $tipo2, $senha, $link);
    //$valores = strtoupper($profissional);
    mysqli_query($link, $profissional);

    $objFuncionario = new profissional();
    $funcionario = $objFuncionario->insertFuncionario($titulo, $email, $telefone, $cpf, $funcao, $senha, $link);
    //$valor = strtoupper($funcionario);
    mysqli_query($link, $funcionario);
    echo $valor;
    //envio($titulo, $email, $senha);
    header("Location: ../../../../paginas/usuarios/profissionais/index.php");
?>