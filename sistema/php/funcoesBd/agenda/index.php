<?php

    require_once('../../conectaBd/index.php');
   
    $objDb = new db();
    $link = $objDb->conecta_mysql();

class agenda{

    private $titulo;
    private $telefone;
    private $cpf;
    private $responsavel;
    private $cpf_res;
    private $email;
    private $profissional;
    private $especialidade;
    private $repeticao;
    private $operadora;
    private $cor;
    private $datai;
    private $dataf;
    private $valor;
    private $pago;
    private $guia;
    
    public function insertConsultasAgenda($titulo, $cpf, $telefone, $responsavel, $cpf_res, $email, $profissional, $especialidade, $datai, $dataf, $repeticao, $cor, $operadora, $valor, $pago, $guia, $link){

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
        
        
        return $sql_evento = "INSERT INTO `consultas` (`idconsultas`, `nome_paciente`, `cpf_paciente`, `telefone`, `nome_responsavel`, `cpf_responsavel`, `email`, `nome_profissional`, `especialidade_profissional`, `inicio`, `termino`, `repeticao`, `status_consulta`, `status_pagamento`, `operadora`, `valor`, `valor_pago`, `consulta_incluida`) VALUES (NULL, '$titulo', '$cpf', '$telefone', '$responsavel', '$cpf_res', '$email', '$profissional', '$especialidade', '$datai', '$dataf', '$repeticao', '$cor', 'NAO', '$operadora', '$valor', '$pago', '$guia');";

    }
    
    public function insertPacientesAgenda($titulo, $email, $cpf, $operadora, $responsavel, $cpf_res, $telefone){

                
        return $sql_paciente = "INSERT INTO `paciente` (`idpaciente`, `nome`, `email`, `sexo`, `estado_civil`, `nascimento`, `cpf`, `cep`, `operadora`, `plano_saude`, `validade_carteira`, `cide`, `nome_enc`, `registro_conselho_enc`, `especialidade_enc`, `nome_responsavel`, `cpf_responsavel`, `tel_responsavel`, `telefone`, `rua`, `numero`, `complemento`, `bairro`, `cidade`, `uf`, `cartao_operadora`)VALUES (NULL, '$titulo', '$email', '', '', '', '$cpf', '', '$operadora', '', '', '', '', '', '','$responsavel', '$cpf_res', '', '$telefone', '', '', '', '', '', '', '');";
        
    }
    
    
}

?>