<?php

    require_once('../../conectaBd/index.php');
    
    $objDb = new db();
    $link = $objDb->conecta_mysql();
  
class paciente{

    private $id;
    private $titulo;
    private $telefone;
    private $sexo;
    private $estado_civil;
    private $nascimento; 
    private $cpf;
    private $cep;
    private $rua;
    private $numero;
    private $complemento;
    private $bairro;
    private $cidade;
    private $uf;
    private $responsavel;
    private $cpf_res;
    private $tel_responsavel;
    private $email;
    private $operadora;
    private $plano;
    private $validade;
    private $CID10;
    private $medico;
    private $registro;
    private $especialidade;
    private $cartao_op;    
    
    public function insertPaciente($titulo, $email, $sexo, $estado_civil, $nascimento, $cpf, $cep, $operadora, $plano, $validade, $CID10, $medico, $registro, $especialidade, $responsavel, $cpf_res, $tel_responsavel, $telefone, $rua, $numero, $complemento, $bairro, $cidade, $uf, $cartao_op, $link){

        $nascimento = explode(" ", $nascimento);
        list($date, $hora) = $nascimento;
        $nascimento = array_reverse(explode("/", $date));
        $nascimento = implode("-", $nascimento);
        $nascimento = $nascimento . " " . $hora;          
        
        $validade = explode(" ", $validade);
        list($date, $hora) = $validade;
        $validade = array_reverse(explode("/", $date));
        $validade = implode("-", $validade);
        $validade = $validade . " " . $hora;
        
        return $sql_paciente = "INSERT INTO `paciente` (`idpaciente`, `nome`, `email`, `sexo`, `estado_civil`, `nascimento`, `cpf`, `cep`, `operadora`, `plano_saude`, `validade_carteira`, `cide`, `nome_enc`, `registro_conselho_enc`, `especialidade_enc`, `nome_responsavel`, `cpf_responsavel`, `tel_responsavel`, `telefone`, `rua`, `numero`, `complemento`, `bairro`, `cidade`, `uf`, `cartao_operadora`) VALUES (NULL, '$titulo', '$email', '$sexo', '$estado_civil', '$nascimento', '$cpf', '$cep', '$operadora', '$plano', '$validade', '$CID10', '$medico', '$registro', '$especialidade', '$responsavel', '$cpf_res', '$tel_responsavel', '$telefone', '$rua', '$numero', '$complemento', '$bairro', '$cidade', '$uf', '$cartao_op');";
        
    }
    
    public function completaPaciente($id, $titulo, $email, $sexo, $estado_civil, $nascimento, $cpf, $cep, $operadora, $plano, $validade, $CID10, $medico, $registro, $especialidade, $responsavel, $cpf_res, $tel_responsavel, $telefone, $rua, $numero, $complemento, $bairro, $cidade, $uf, $cartao_op, $link){
        return $sql_paciente = "UPDATE `paciente` SET `idpaciente` = '$id', `nome` = '$titulo', `email` = '$email', `sexo` = '$sexo', `estado_civil` = '$estado_civil', `nascimento` = '$nascimento', `cpf` = '$cpf', `cep` = '$cep', `operadora` = '$operadora', `plano_saude` = '$plano', `validade_carteira` = '$validade', `CID10` = '$CID10', `nome_enc` = '$medico', `registro_conselho_enc` = '$registro', `especialidade_enc` = '$especialidade' =, `nome_responsavel` = '$responsavel', `cpf_responsavel` = '$cpf_res', `tel_responsavel` = '$tel_res', `telefone` = '$responsavel', `rua` = '$rua', `numero` = '$numero', `complemento` = '$complemento', `bairro` = '$bairro', `cidade` = '$cidade', `uf` = '$uf', `cartao_operadora` = '$cartao_op' WHERE `paciente`.`idpaciente` = $id";
    }
    
    public function alterPaciente($id, $titulo, $email, $sexo, $estado_civil, $nascimento, $cpf, $cep, $operadora, $plano, $validade, $medico, $registro, $especialidade, $responsavel, $cpf_res, $tel_responsavel, $telefone, $rua, $numero, $complemento, $bairro, $cidade, $uf, $cartao_op, $link){
        return $sql_paciente = "UPDATE `paciente` SET `nome` = '$titulo', `email` = '$email', `sexo` = '$sexo', `estado_civil` = '$estado_civil', `nascimento` = '$nascimento', `cpf` = '$cpf', `cep` = '$cep', `operadora` = '$operadora', `plano_saude` = '$plano', `validade_carteira` = '$validade', `nome_enc` = '$medico', `registro_conselho_enc` = '$registro', `especialidade_enc` = '$especialidade', `nome_responsavel` = '$responsavel', `cpf_responsavel` = '$cpf_res', `tel_responsavel` = '$tel_responsavel', `telefone` = '$telefone', `rua` = '$rua', `numero` = '$numero', `complemento` = '$complemento', `bairro` = '$bairro', `cidade` = '$cidade', `uf` = '$uf', `cartao_operadora` = '$cartao_op' WHERE `paciente`.`idpaciente` = $id";
        
    }
    
    
}


?>