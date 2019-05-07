<?php
    
    require_once('../../conectaBd/index.php'); 

    date_default_timezone_set('America/Sao_Paulo');
    $date = date('Y-m');
    $data = date('m/Y', strtotime($date));

    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $lote = $_POST['lote'];
    $seguradora = $_POST['seguradora'];

    $sql = '';
    foreach ($_POST['guias'] as $icon) {

        // no idea where to get EmpNo from, let's assume it is in $empno.
        $sql .= " $icon OR";
    
    }

    $resultado = substr($sql,0,-2);

    $update = "UPDATE `lote` SET lote = '$lote', referencia = '$data', operadora = '$seguradora' WHERE `guia`= " . trim($resultado);
    $guia = "UPDATE `guias` SET lote = '$lote' WHERE `numero_guia_principal`= " . trim($resultado);
    mysqli_query($link, $update);
    echo $update;
    mysqli_query($link, $guia);
    header("Location: ../../../../paginas/guia/lote/index.php");


