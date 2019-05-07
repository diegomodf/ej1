<?php

    require_once('../../conectaBd/index.php');
    
    $objDb = new db();
    $link = $objDb->conecta_mysql();
  
class valor{

    private $id;
    private $tabela;
    private $operadora;
    private $codigo;
    private $descricao;
    private $valor;
    
    
    public function insertValor($operadora, $tabela, $codigo, $descricao, $valor, $link){
        
        return $sql_valor = "INSERT INTO `valores` (`idvalores`, `id_operadora`, `tabela`, `codigo`, `descricao`, `valor`, `tipo`) VALUES (NULL, '$operadora', '$tabela', '$codigo', '$descricao', '$valor', '');";
        
    }
    
}


?>