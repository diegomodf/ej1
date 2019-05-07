<?php
    
    require_once('../../conectaBd/index.php');
    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $registro = $_POST['registro']; 
    $cpf = $_POST['cpf'];
    $numero_guia_prestador = $_POST['numero_guia_prestador'];
    $numero_guia_principal = $_POST['numero_guia_principal'];
    $data_autorizacao = $_POST['data_autorizacao'];

    $data_autorizacao = explode(" ", $data_autorizacao);
    list($date, $hora) = $data_autorizacao;
    $data_autorizacao = array_reverse(explode("/", $date));
    $data_autorizacao = implode("-", $data_autorizacao);
    $data_autorizacao = $data_autorizacao . " " . $hora;

    $senha = $_POST['senha'];
    $data_validade = $_POST['data_validade'];

    $data_validade = explode(" ", $data_validade);
    list($date, $hora) = $data_validade;
    $data_validade = array_reverse(explode("/", $date));
    $data_validade = implode("-", $data_validade);
    $data_validade = $data_validade . " " . $hora;

    $numero_guia_operadora = $_POST['numero_guia_operadora'];
    $numero_carteira = $_POST['cartao_operadora'];
    $validade_carteira = $_POST['validade_carteira'];

    $validade_carteira = explode(" ", $validade_carteira);
    list($date, $hora) = $validade_carteira;
    $validade_carteira = array_reverse(explode("/", $date));
    $validade_carteira = implode("-", $validade_carteira);
    $validade_carteira = $validade_carteira . " " . $hora;

    $nome = $_POST['nome_paciente'];
    $cartao_saude = $_POST['cartao_saude'];
    $atendimento_rn = $_POST['atendimento_rn'];
    $codigo_operadora = $_POST['codigo'];
    $nome_contratado = $_POST['nome_contratado'];
    $nome_profissional_solicitante = $_POST['nome_profissional_solicitante'];
    $conselho_profissional = $_POST['conselho_profissional'];
    $numero_conselho = $_POST['numero_conselho'];
    $uf_conselho = $_POST['uf_conselho'];
    $codigo_cbo = $_POST['codigo_cbo'];
    $atendimento = $_POST['atendimento'];
    $data_solicitacao = $_POST['data_solicitacao'];

    $data_solicitacao = explode(" ", $data_solicitacao);
    list($date, $hora) = $data_solicitacao;
    $data_solicitacao = array_reverse(explode("/", $date));
    $data_solicitacao = implode("-", $data_solicitacao);
    $data_solicitacao = $data_solicitacao . " " . $hora;

    $indicacao_clinica = $_POST['indicacao_clinica'];
    $codigo_operadora_ce = $_POST['codigo'];
    $nome_contrato_ce = $_POST['nome_contrato_ce'];
    $codigo_cnes_ce = $_POST['codigo_cnes_ce'];
    $tipo_atendimento = $_POST['tipo_atendimento'];
    $indicacao_acidente = $_POST['indicacao_acidente'];
    $motivo_consulta = $_POST['motivo_consulta'];
    $motivo_encerramento_consulta = $_POST['motivo_encerramento_consulta'];

    $sequencia = $_POST['sequencia'];
    $grau_part = $_POST['grau_part'];
    $nome_profissional = $_POST['nome_profissional'];
    $codigo_operadora_cpf = $_POST['codigo_operadora_cpf'];
    $conselho = $_POST['conselho'];
    $numero_conselho = $_POST['numero_profissional'];
    $UF = $_POST['UF'];
    $cod_cbo = $_POST['cod_cbo'];
    $o1 = $_POST['o1'];
    $o2 = $_POST['o2'];
    $o3 = $_POST['o3'];
    $o4 = $_POST['o4'];
    $o5 = $_POST['o5'];
    $o6 = $_POST['o6'];
    $o7 = $_POST['o7'];
    $o8 = $_POST['o8'];
    $o9 = $_POST['o9'];
    $um1 = $_POST['um1'];
    $um2 = $_POST['um2'];
    $obs = $_POST['obs'];
    $procedimento = $_POST['procedimento'];
    $taxa_alugueis = $_POST['taxa_alugueis'];
    $materias = $_POST['materias'];
    $opme = $_POST['opme'];
    $medicamento = $_POST['medicamento'];
    $gases_medicinais = $_POST['gases_medicinais'];
    $total_geral = $_POST['total_geral'];
    require_once('../../funcoesBd/lotes/index.php');  

    $guias = new lotes();
    $quantidade_guias = $guias->countLotes();
    $valor_total = $guias->somaValor();


    $sql = '';
    foreach ($_POST['consultas'] as $icon) {

        // no idea where to get EmpNo from, let's assume it is in $empno.
        $sql .= " $icon OR";
    
    }

    $resultado = substr($sql,0,-2);

    $update = "UPDATE `consultas_guias` SET guia = '$numero_guia_principal' WHERE `idconsulta_guia`= " . trim($resultado);
    //$sql = "UPDATE `consultas_guias` SET id = '$numero_guia_prestador' WHERE `idconsulta_guia` = $sql";
    //$sql = "INSERT INTO `consultas_guias` (`idconsulta_guia`) VALUES " . trim($sql,',');
    echo $update;

    mysqli_query($link, $update);


        $sql_guias = "INSERT INTO `guias` (`idguias`, `id_ans`, `cpf`, `registro_ANS`, `numero_guia_prestador`, `numero_guia_principal`, `data_autorizacao`, `senha`, `data_validade`, `numero_guia_operadora`, `cartao_operadora`, `validade_carteira`, `nome_paciente`, `cartao_saude`, `atendimento_rn`, `id_proc`, `nome_contratado`, `nome_profissional_solicitante`, `conselho_profissional`, `numero_conselho`, `uf_conselho`, `codigo_cbo`, `atendimento`, `data_solicitacao`, `indicacao_clinica`, `codigo_operadora_ce`, `nome_contrato_ce`, `codigo_cnes_ce`, `tipo_atendimento`, `indicacao_acidente`, `motivo_consulta`, `motivo_encerramento_consulta`, `data`, `hora_incial`, `hora_final`, `tabela`, `codigo_procedimento`, `descricao`, `quantidade`, `via`, `tecnica`, `fator`, `valor_unitario`, `valor_total`, `sequencia`, `grau_part`, `codigo_operadora_cpf`, `nome_medico`, `conselho`, `conselho_num`, `UF`, `cod_cbo`, `o1`, `o2`, `o3`, `o4`, `o5`, `o6`, `o7`, `o8`, `o9`, `um1`, `um2`, `obs`, `procedimento`, `taxa_alugueis`, `materias`, `opme`, `medicamento`, `gases_medicinais`, `total_geral`, `clifops_operadora`, `lote`) VALUES (NULL, '$registro', '$cpf', '$registro', '$numero_guia_prestador', '$numero_guia_principal', '$data_autorizacao', '$senha', '$data_validade', '$numero_guia_operadora', '$numero_carteira', '$validade_carteira', '$nome', '$cartao_saude', '$atendimento_rn', '$codigo_operadora', '$nome_contratado', '$nome_profissional_solicitante', '$conselho_profissional', '$numero_conselho', '$uf_conselho', '$codigo_cbo', '$atendimento', '$data_solicitacao', '$indicacao_clinica', '$codigo_operadora_ce', '$nome_contratado', '$codigo_cnes_ce', '$tipo_atendimento', '$indicacao_acidente', '$motivo_consulta', '$motivo_encerramento_consulta', '', '', '', '', '', '', '', '', '', '', '', '', '$sequencia', '$grau_part', '$codigo_operadora_cpf', '$nome_profissional', '$conselho', '$numero_conselho', '$UF', '$cod_cbo', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');";


    //echo $sql_guias;
    mysqli_query($link, $sql_guias);

    $atualiza = "UPDATE consultas SET consulta_incluida = 1 where `idconsultas` = " .trim($resultado);

    mysqli_query($link, $atualiza); 

    $lote = "INSERT INTO `lote` (`idlote`, `lote`, `quantidade_guias`, `valor`, `referencia`, `enviado`, `protocolo`, `guia`) VALUES (NULL, '', '$quantidade_guias', '$valor_total', '', '', '', '$numero_guia_principal');";

    echo $lote;

    mysqli_query($link, $lote);

    //header("Location: ../../../../paginas/guia/busca/index.php");
    echo ($quantidade_guias);

