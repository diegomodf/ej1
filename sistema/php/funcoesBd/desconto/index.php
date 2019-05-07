<?php

    require_once('../../conectaBd/index.php');
    
    $objDb = new db();
    $link = $objDb->conecta_mysql();
  
class desconto{

    private $id;
    private $referencia;
    private $valor;   
    
    public function insertDesconto($id, $referencia, $valor, $link){

        
        return $sql_desconto = "INSERT INTO `desconto` (`iddesconto`, `id_paciente`, `referencia`, `desconto`) VALUES (NULL, '$id', '$referencia', '$valor');";
        
    }
    
}


?>