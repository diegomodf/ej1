<?php
    require_once('../../conectaBd/index.php'); 
    require_once('../../funcoesBd/agenda/index.php');
    
    $id = $_POST['id'];
    $titulo = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];
    $responsavel = $_POST['responsavel'];
    $cpf_res = $_POST['cpf_res'];
    $email = $_POST['email'];
    $profissional = $_POST['id_sub_categoria'];
    $especialidade = $_POST['id_categoria'];
    $repeticao = $_POST['repeticao'];
    $operadora = $_POST['id_operadora'];
    $cor  = $_POST['color'];

    $datai = $_POST['start'];
    $dataf = $_POST['end'];

    $timestamp = strtotime($datai);
    $data = date('d/m/Y', $timestamp);

    $timestamp = strtotime($datai);
    $horai= date('H:i:s', $timestamp);

    $timestamp = strtotime($dataf);
    $horaf = date('H:i:s', $timestamp);

    $codigo = $_POST['id_proc'];
    $valor = $_POST['id_valor'];
    $datai = $_POST['start'];
    $dataf = $_POST['end'];
    $codigo = $_POST['id_valor'];
    $pago = 0;
    $guia = 0;
    $objDb = new db();
    $link = $objDb->conecta_mysql();
    $sql = "SELECT * FROM  valores AS V JOIN desconto AS D where D.referencia = V.idvalores and D.id_paciente = '$id'";
    $resultado_ids = mysqli_query($link, $sql);
    if($resultado_ids){
    while($registros = mysqli_fetch_array($resultado_ids, MYSQLI_ASSOC)){
        $desconto = $registros['desconto'];
        $dinheiro = $registros['valor'];

        $valor = $dinheiro - ($desconto/100)*$dinheiro;
    }
    }else{
        
    }
    //$objDb = new db();
    //$link = $objDb->conecta_mysql();
    
    if(!empty($titulo) && !empty($cor) && !empty($datai) && !empty($dataf)){
    //Converter a data e hora do formato brasileiro para o formato do Banco de Dados
    
    $objAgenda = new agenda();

    
    //for($i = 0; i < $repeticao; i++){
        $evento = $objAgenda->insertConsultasAgenda($titulo, $cpf, $telefone, $responsavel, $cpf_res, $email, $profissional, $especialidade, $datai, $dataf, $repeticao, $cor, $operadora, $valor, $pago, $guia, $link);
        $consulta = strtoupper($evento);  
        mysqli_query($link, $consulta); 
    //}
        
   
    $objAgenda1 = new agenda();
    $paciente = $objAgenda1->insertPacientesAgenda($titulo, $email, $cpf, $operadora, $responsavel, $cpf_res, $telefone);     
    $cliente = strtoupper($paciente);  
    mysqli_query($link, $cliente);
    echo $cliente;
    
    header('Location: ../../../../paginas/agenda/agenda/index.php?terapeuta='.$profissional.'');
        
    }else{
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro ao cadastrar o evento <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
    
    header("Location: ../../../../paginas/agenda/agenda/index.php");
    }

    $objDb = new db();
    $link = $objDb->conecta_mysql();
    $sql_id = "SELECT * from consultas";
    $resultado_ids = mysqli_query($link, $sql_id);
                            if($resultado_ids){
                              while($registros = mysqli_fetch_array($resultado_ids, MYSQLI_ASSOC)){
                                    $id_fk = $registros['idconsultas'];
                                    echo $id_fk;
                              }
                            } else {
                              echo 'Erro na consulta dos emails no banco de dados!';
                            }

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

    $sql = "INSERT INTO `consultas_guias` (`id`, `idconsulta_guia`, `data`, `inicio`, `termino`, `tabela`, `codigo`, `descricao`, `valor`, `valor_total`) VALUES (NULL, '$id_fk', '', '$datai', '$dataf', '', '$codigo', '', '$valor', '$valor');";
    $sql = strtoupper($sql);
    mysqli_query($link, $sql);
    echo $sql;
?>