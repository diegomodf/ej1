<?php

    require_once('../../conectaBd/index.php');
   
    $objDb = new db();
    $link = $objDb->conecta_mysql();

class lotes{

    private $id;
    private $numero_guia;
    private $nome_funcionario;
    private $nome_cliente;
    private $valor_pago;
    private $convenio;
    private $tipo_plano_de_saude;
    private $mes;

    public function getLotes($id, $mes){
        
        return $sql = "SELECT * FROM pagamentos WHERE mes = $mes";
        echo($sql1);
    }

    public function countLotes()
    {
               // Setting up connection with database Geeks 
              $connection = mysqli_connect("localhost", "root", "",  
                                                           "clifops_teste"); 
                
              // Check connection 
              if (mysqli_connect_errno()) 
              { 
                  echo "Database connection failed."; 
              } 
                
              // query to fetch Username and Password from 
              // the table geek 
              $query = "SELECT id FROM consultas_guias where guia = '121234534'"; 
                
              // Execute the query and store the result set 
              $result = mysqli_query($connection, $query); 
                
              if ($result) 
              { 
                  // it return number of rows in the table. 
                  $row = mysqli_num_rows($result);
                    
              return $row;
              
                  // close the result. 
                  mysqli_free_result($result); 
              } 
            
              // Connection close  
              mysqli_close($connection);
    }

    public function somaValor()
    {
        return $sql2 = "SELECT SUM(valor_total) FROM consultas_guias";
    }
    
      
   }
  $fip = new lotes();
  $aaaa = $fip->countLotes();
   echo($aaaa);
?>