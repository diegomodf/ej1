<?php
    require_once('../../conectaBd/index.php');

    $objDb = new db();
    $link = $objDb->conecta_mysql();

class funcionario{

    private $titulo;
    private $sexo;
    private $nascimento;
    private $email;
    private $telefone;
    private $cpf;
    private $cep; 
    private $rua;
    private $numero;
    private $complemento;
    private $bairro;
    private $cidade;
    private $uf;
    private $ingresso;
    private $funcao;
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
    
	public function insertFuncionario($titulo, $email, $telefone, $sexo, $cpf, $nascimento, $cep, $rua, $numero, $complemento, $bairro, $cidade, $uf, $funcao, $ingresso, $favorecido1, $banco1, $agencia1, $conta1, $tipo1, $favorecido2, $banco2, $agencia2, $conta2, $tipo2, $link){    

		
        return $sql_funcionario = "INSERT INTO `funcionario` (`idfuncionario`, `nome`, `email`, `telefone`, `sexo`, `cpf`, `nascimento`, `cep`, `rua`, `numero`, `complemento`, `bairro`, `cidade`, `uf`, `funcao`, `ingresso`, `favorecido1`, `banco1`, `agencia1`, `conta1`, `tipo_conta1`, `favorecido2`, `banco2`, `agencia2`, `conta2`, `tipo_conta2`) VALUES (NULL, '$nome', '$email', '$telefone', '$sexo', '$cpf', '$nascimento', '$cep', '$rua', '$numero', '$complemento', '$bairro', '$cidade', '$uf', '$funcao', '$ingresso', '$favorecido1', '$banco1', '$agencia1', '$conta1', '$tipo1', '$favorecido2', '$banco2', '$agencia2', '$conta2', '$tipo2');";
        
    }
    

    
    
}
?>