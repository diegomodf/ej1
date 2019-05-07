<?php
   /* require_once('../../conectaBd/index.php');
    $objDb = new db();
    $link = $objDb->conecta_mysql();

class profissional{

    private $id;
    private $titulo;
    private $sexo;
    private $nascimento;
    private $atividade;
    private $email;
    private $telefone;
    private $cpf;
    private $rg;
    private $orgao;
    private $cep; 
    private $rua;
    private $numero;
    private $complemento;
    private $bairro;
    private $cidade;
    private $uf;
    private $conselho;
    private $num_conselho;
    private $uf_conselho;
    private $cbo;
    private $favorecido1;
    private $banco1;
    private $agencia1;
    private $conta1;
    private $tipo1;
    private $favorecido2;
    private $banco2;
    private $agencia2;
    private $conta2;
    private $tipo2;
    private $senha;
    private $funcao;

	public function insertProfissional($atividade, $titulo, $telefone, $email, $sexo, $nascimento, $cpf, $cep, $rua, $numero, $complemento, $bairro, $cidade, $uf, $rg, $orgao, $conselho, $num_conselho, $uf_conselho, $cbo, $favorecido1, $banco1, $agencia1, $conta1, $tipo1, $favorecido2, $banco2, $agencia2, $conta2, $tipo2, $senha, $link){    

		$nascimento = explode(" ", $nascimento);
        list($date, $hora) = $nascimento;
        $nascimento = array_reverse(explode("/", $date));
        $nascimento = implode("-", $nascimento);
        $nascimento = $nascimento . " " . $hora;     
        
        return $sql_profissional = "INSERT INTO `profissional` (`idprofissional`, `atividade`, `nome`, `telefone`, `email`, `sexo`, `nascimento`, `cpf`, `cep`, `rua`, `numero`, `complemento`, `bairro`, `cidade`, `uf`, `rg`, `expedicao_rg`, `conselho`, `num_conselho`, `uf_conselho`, `especialidade_cbo`, `favorecido1`, `banco1`, `agencia1`, `conta1`, `tipo_conta1`, `favorecido2`, `banco2`, `agencia2`, `conta2`, `tipo_conta2`, `senha`) VALUES (NULL, '$atividade', '$titulo', '$telefone', '$email', '$sexo', '$nascimento', '$cpf', '$cep', '$rua', '$numero', '$complemento', '$bairro', '$cidade', '$uf', '$rg', '$orgao', '$conselho', '$num_conselho', '$uf_conselho', '$cbo', '$favorecido1', '$banco1', '$agencia1', '$conta1', '$tipo1', '$favorecido2', '$banco2', '$agencia2', '$conta2', '$tipo2', '$senha');";
        
    }
    public function alterProfissional($id, $titulo, $sexo, $nascimento, $atividade, $email, $telefone, $cpf, $rg, $orgao, $cep, $rua, $numero, $complemento, $bairro, $cidade, $uf, $conselho, $num_conselho, $uf_conselho, $cbo, $favorecido1, $banco1, $agencia1, $conta1, $tipo1, $favorecido2, $banco2, $agencia2, $conta2, $tipo2, $senha){
        return $sql_profissional = "UPDATE `profissional` SET `idprofissional` = '$id', `atividade` = '$atividade', `nome` = '$titulo', `telefone` = '$telefone', `email` = '$email', `sexo` = '$sexo', `nascimento` = '$nascimento', `cpf` = '$cpf', `cep` = '$cep', `rua` = '$rua', `numero` = '$numero', `complemento` = '$complemento', `bairro` = '$bairro', `cidade` = '$cidade', `uf` = '$uf', `rg` = '$rg', `expedicao_rg` = '$orgao', `conselho` = '$conselho', `num_conselho` = '$num_conselho', `uf_conselho` = '$uf_conselho', `especialidade_cbo` = '$cbo', `favorecido1` = '$favorecido1', `banco1` = '$banco1', `agencia1` = '$agencia1', `conta1` = '$conta1', `tipo_conta1` = '$tipo1', `favorecido2` = '$favorecido2', `banco2` = '$banco2', `agencia2` = '$agencia2', `conta2` = '$conta2', `tipo_conta2` = '$conta2' senha = '$senha' WHERE `profissional`.`idprofissional` = $id";
    }

    public function insertFuncionario($titulo, $email, $telefone, $cpf, $funcao, $senha, $link){

        return  $sql_funcionario = "INSERT INTO `funcionario` (`idfuncionario`, `nome`, `email`, `telefone`, `sexo`, `cpf`, `nascimento`, `cep`, `rua`, `numero`, `complemento`, `bairro`, `cidade`, `uf`, `funcao`, `ingresso`, `favorecido1`, `banco1`, `agencia1`, `conta1`, `tipo_conta1`, `favorecido2`, `banco2`, `agencia2`, `conta2`, `tipo_conta2`, `senha`) VALUES (NULL, '$titulo', '$email', '$telefone', '', '$cpf', '', '', '', '', NULL, '', '', '', '$funcao', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$senha');";
    }
    
    
}
?> */

    require_once('../../conectaBd/index.php');
    $objDb = new db();
    $link = $objDb->conecta_mysql();

class profissional{

    private $id;
    private $titulo;
    private $sexo;
    private $nascimento;
    private $atividade;
    private $email;
    private $telefone;
    private $cpf;
    private $rg;
    private $orgao;
    private $cep; 
    private $rua;
    private $numero;
    private $complemento;
    private $bairro;
    private $cidade;
    private $uf;
    private $conselho;
    private $num_conselho;
    private $uf_conselho;
    private $cbo;
    private $favorecido1;
    private $banco1;
    private $agencia1;
    private $conta1;
    private $tipo1;
    private $favorecido2;
    private $banco2;
    private $agencia2;
    private $conta2;
    private $tipo2;
    private $senha;
    private $funcao;

    public function insertProfissional($atividade, $titulo, $telefone, $email, $sexo, $nascimento, $cpf, $cep, $rua, $numero, $complemento, $bairro, $cidade, $uf, $rg, $orgao, $conselho, $num_conselho, $uf_conselho, $cbo, $favorecido1, $banco1, $agencia1, $conta1, $tipo1, $favorecido2, $banco2, $agencia2, $conta2, $tipo2, $senha, $link){    

        $nascimento = explode(" ", $nascimento);
        list($date, $hora) = $nascimento;
        $nascimento = array_reverse(explode("/", $date));
        $nascimento = implode("-", $nascimento);
        $nascimento = $nascimento . " " . $hora;     
        
        return $sql_profissional = "INSERT INTO `profissional` (`idprofissional`, `atividade`, `nome`, `telefone`, `email`, `sexo`, `nascimento`, `cpf`, `cep`, `rua`, `numero`, `complemento`, `bairro`, `cidade`, `uf`, `rg`, `expedicao_rg`, `conselho`, `num_conselho`, `uf_conselho`, `especialidade_cbo`, `favorecido1`, `banco1`, `agencia1`, `conta1`, `tipo_conta1`, `favorecido2`, `banco2`, `agencia2`, `conta2`, `tipo_conta2`, `senha`) VALUES (NULL, '$atividade', '$titulo', '$telefone', '$email', '$sexo', '$nascimento', '$cpf', '$cep', '$rua', '$numero', '$complemento', '$bairro', '$cidade', '$uf', '$rg', '$orgao', '$conselho', '$num_conselho', '$uf_conselho', '$cbo', '$favorecido1', '$banco1', '$agencia1', '$conta1', '$tipo1', '$favorecido2', '$banco2', '$agencia2', '$conta2', '$tipo2', '$senha');";
        
    }
    public function alterProfissional($id, $titulo, $sexo, $nascimento, $atividade, $email, $telefone, $cpf, $rg, $orgao, $cep, $rua, $numero, $complemento, $bairro, $cidade, $uf, $conselho, $num_conselho, $uf_conselho, $cbo, $favorecido1, $banco1, $agencia1, $conta1, $tipo1, $favorecido2, $banco2, $agencia2, $conta2, $tipo2, $senha){
        return $sql_profissional = "UPDATE `profissional` SET `idprofissional` = '$id', `atividade` = '$atividade', `nome` = '$titulo', `telefone` = '$telefone', `email` = '$email', `sexo` = '$sexo', `nascimento` = '$nascimento', `cpf` = '$cpf', `cep` = '$cep', `rua` = '$rua', `numero` = '$numero', `complemento` = '$complemento', `bairro` = '$bairro', `cidade` = '$cidade', `uf` = '$uf', `rg` = '$rg', `expedicao_rg` = '$orgao', `conselho` = '$conselho', `num_conselho` = '$num_conselho', `uf_conselho` = '$uf_conselho', `especialidade_cbo` = '$cbo', `favorecido1` = '$favorecido1', `banco1` = '$banco1', `agencia1` = '$agencia1', `conta1` = '$conta1', `tipo_conta1` = '$tipo1', `favorecido2` = '$favorecido2', `banco2` = '$banco2', `agencia2` = '$agencia2', `conta2` = '$conta2', `tipo_conta2` = '$conta2' senha = '$senha' WHERE `profissional`.`idprofissional` = $id";
    }

    public function insertFuncionario($titulo, $email, $telefone, $cpf, $funcao, $senha, $link){

        return  $sql_funcionario = "INSERT INTO `funcionario` (`idfuncionario`, `nome`, `email`, `telefone`, `sexo`, `cpf`, `nascimento`, `cep`, `rua`, `numero`, `complemento`, `bairro`, `cidade`, `uf`, `funcao`, `ingresso`, `favorecido1`, `banco1`, `agencia1`, `conta1`, `tipo_conta1`, `favorecido2`, `banco2`, `agencia2`, `conta2`, `tipo_conta2`, `senha`) VALUES (NULL, '$titulo', '$email', '$telefone', '', '$cpf', '', '', '', '', NULL, '', '', '', '$funcao', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$senha');";
    }
    
    
}
?>