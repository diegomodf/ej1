<?php
	include_once("conexao.php");

	function retorna($cpf, $conn){
		$result_paciente = "SELECT * FROM consultas WHERE cpf_paciente = '$cpf' and valor_pago = 0 LIMIT 3";
		$resultado_paciente = mysqli_query($conn, $result_paciente);
		if($resultado_paciente){
			while($row_paciente = mysqli_fetch_array($resultado_paciente, MYSQLI_ASSOC)){

			$valores['valor'] = $row_paciente['valor'];
			$valores['inicio'] = $row_paciente['inicio'];
			$valores['termino'] = $row_paciente['termino'];

			$timestamp = strtotime($valores['inicio']);
            $valores['inicio'] = date('d/m/Y', $timestamp);

			$timestamp = strtotime($valores['termino']);
            $valores['termino'] = date('d/m/Y', $timestamp);
			}
			
		}else{
			$valores['nome_paciente'] = 'Paciente não Encontrado';
		}
		return json_encode($valores);
	}

	if(isset($_GET['cpf'])){
		echo retorna($_GET['cpf'], $conn);
	}


?>
