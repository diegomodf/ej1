<?php
    
    require_once('../../conectaBd/index.php'); 
    require_once('../../funcoesBd/paciente/index.php');

    $id = $_POST['id']; //check
    $titulo = $_POST['nome']; //check
    $telefone = $_POST['telefone']; //check
    $sexo = $_POST['sexo']; //check
    $estado_civil = $_POST['estado_civil']; //check
    $nascimento = $_POST['nascimento']; //check
    $cpf = $_POST['cpf']; //check
    $cep = $_POST['cep']; //check
    $rua = $_POST['rua']; //check
    $numero = $_POST['numero']; //check
    $complemento = $_POST['complemento']; //check
    $bairro = $_POST['bairro']; //check
    $cidade = $_POST['cidade']; //check
    $uf = $_POST['uf']; //check
    $responsavel = $_POST['responsavel']; //check
    $cpf_res = $_POST['cpf_responsavel']; //check
    $tel_responsavel = $_POST['tel_responsavel']; //check
    $email = $_POST['email']; //check
    $operadora = $_POST['operadora']; //check
    $plano = $_POST['plano']; //check
    $validade = $_POST['validade']; //check
    $CID10 = $_POST['CID10']; //check
    $medico = $_POST['nome_medico']; //check
    $registro = $_POST['reg_medico']; //check
    $especialidade = $_POST['especialidade']; //check
    //$cns = $_POST['cns']; //check
    $cartao_op = $_POST['num_carteira']; //check

    $objPaciente = new paciente();
    $paciente = $objPaciente->completaPaciente($id, $titulo, $email, $sexo, $estado_civil, $nascimento, $cpf, $cep, $operadora, $plano, $validade, $CID10, $medico, $registro, $especialidade, $responsavel, $cpf_res, $tel_responsavel, $telefone, $rua, $numero, $complemento, $bairro, $cidade, $uf, $cartao_op, $link);

       //$valores = strtoupper($paciente);
       //echo $valores;
       mysqli_query($link, $paciente);
       header("Location: ../../../../paginas/usuarios/pacientes/index.php");

       echo $paciente;
?>