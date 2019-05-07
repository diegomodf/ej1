<?php

    //session_start();

    require_once('../../conectaBd/index.php'); 
    $objDb = new db();
    $link = $objDb->conecta_mysql();

        $id = $_GET['id'];
        $profissional = $_GET['profissional'];
        $consulta = $_GET['idconsulta'];
        $valor = $_GET['valorconsulta'];
        $pagamento = $_GET['forma_pagamento'];
        $texto1 = $_GET['info1'];
        $texto2 = $_GET['info2'];



        

        

        $valores = "UPDATE `consultas` SET `status_pagamento`='SIM',`tipo_de_pagamento` = '$pagamento', `texto1` = '$texto1', `texto2` = '$texto2',`valor_pago`= '$valor' WHERE `consultas`.`idconsultas` = $consulta";
       
        mysqli_query($link, $valores);
        header("Location: ../../../../paginas/pagamento/particular/pagamento_profissional.php?id='.$id.'&profissional='.$profissional.'");     
        

              
      
?>