<?php
    
    require_once('../../conectaBd/index.php'); 
    require_once('../../funcoesBd/paciente/index.php');

    $titulo = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $sexo = $_POST['sexo'];
    $estado_civil = $_POST['estado_civil'];
    $nascimento = $_POST['nascimento'];
    $cpf = $_POST['cpf'];
    $cep = $_POST['cep'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $uf = $_POST['uf'];
    $responsavel = $_POST['responsavel'];
    $cpf_res = $_POST['cpf_responsavel'];
    $tel_responsavel = $_POST['tel_responsavel'];
    $email = $_POST['email'];
    $operadora = $_POST['operadora'];
    $plano = $_POST['plano'];
    $validade = $_POST['validade'];
    $CID10 = $_POST['CID10'];
    $medico = $_POST['nome_medico'];
    $registro = $_POST['reg_medico'];
    $especialidade = $_POST['especialidade'];
    //$cns = $_POST['cns'];
    $cartao_op = $_POST['num_carteira'];

    $objPaciente = new paciente();
    $paciente = $objPaciente->insertPaciente($titulo, $email, $sexo, $estado_civil, $nascimento, $cpf, $cep, $operadora, $plano, $validade, $CID10, $medico, $registro, $especialidade, $responsavel, $cpf_res, $tel_responsavel, $telefone, $rua, $numero, $complemento, $bairro, $cidade, $uf, $cartao_op, $link);
    //$valores = strtoupper($paciente);
    mysqli_query($link, $paciente);
    
    echo $valores;
    header("Location: ../../../../paginas/usuarios/pacientes/index.php");
?>