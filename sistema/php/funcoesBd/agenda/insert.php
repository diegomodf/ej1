<?php

    require_once('../../conectaBd/index.php');
    $objDb = new db();
    $link = $objDb->conecta_mysql();
    
    $titulo = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];
    $responsavel = $_POST['responsavel'];
    $cpf_res = $_POST['cpf_res'];
    $email = $_POST['email'];
    $profissional = $_POST['profissional'];
    $especialidade = $_POST['especialidade'];
    $repeticao = $_POST['repeticao'];
    $operadora = $_POST['operadora'];
    $cor  = $_POST['color'];
    $datai = $_POST['start'];
    $dataf = $_POST['end'];
  
if(!empty($titulo) && !empty($cor) && !empty($datai) && !empty($dataf)){
    //Converter a data e hora do formato brasileiro para o formato do Banco de Dados
    $datai = explode(" ", $datai);
    list($date, $hora) = $datai;
    $datai = array_reverse(explode("/", $date));
    $datai = implode("-", $datai);
    $datai = $datai . " " . $hora;

    $dataf = explode(" ", $dataf);
    list($date, $hora) = $dataf;
    $dataf = array_reverse(explode("/", $date));
    $dataf = implode("-", $dataf);
    $dataf = $dataf . " " . $hora;

    $sql_evento = "INSERT INTO `consultas` (`idconsultas`, `nome_paciente`, `cpf_paciente`, `telefone`, `nome_responsavel`, `cpf_responsavel`, `email`, `nome_profissional`, `especialidade_profissional`, `inicio`, `termino`, `repeticao`, `status_consulta`, `status_pagamento`, `operadora`) VALUES (NULL, '$titulo', '$cpf', '$telefone', '$responsavel', '$cpf_res', '$email', '$profissional', '$especialidade', '$datai', '$dataf', '$repeticao', '$cor', 'Não', '$operadora');";
    mysqli_query($link, $sql_evento);

    $sql_paciente = "INSERT INTO `paciente` (`idpaciente`, `nome`, `email`, `sexo`, `estado_civil`, `nascimento`, `cpf`, `cep`, `operadora`, `plano_saude`, `validade_carteira`, `CID10`, `nome_enc`, `registro_conselho_enc`, `especialidade_enc`, `cns`, `nome_responsavel`, `cpf_responsavel`, `tel_responsavel`, `telefone`, `rua`, `numero`, `complemento`, `bairro`, `cidade`, `uf`, `cartao_operadora`) VALUES (NULL, '$titulo', '$email', '', '', '', '$cpf', '', '$operadora', '', '', NULL, NULL, NULL, NULL, NULL, '$responsavel','$cpf_res', '', '$telefone', '', '', NULL, '', '', '', NULL);";

    mysqli_query($link, $sql_paciente);
          

    //Verificar se salvou no banco de dados através "mysqli_insert_id" o qual verifica se existe o ID do último dado inserido
     if(mysqli_insert_id($link)){
       $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>O Evento cadastrado com sucesso<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
       header("Location: ../../../../paginas/agenda/index.php");
     }
     else{
       $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro na conexão <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
       header("Location: ../../../../paginas/agenda/index.php");
     }
    }
    else{
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro ao cadastrar o evento <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
    header("Location: ../../../../paginas/agenda/index.php");
    }
    
//    $url = '../agenda.php';
//    echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
?>
