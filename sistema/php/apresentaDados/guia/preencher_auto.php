<?php
	include_once("conexao.php");

	function retorna($cpf, $conn){
		$result_paciente = "SELECT * FROM paciente WHERE cpf = '$cpf' LIMIT 1";
		$resultado_paciente = mysqli_query($conn, $result_paciente);
		if($resultado_paciente->num_rows){
			$row_paciente = mysqli_fetch_assoc($resultado_paciente);
			$valores['cartao_operadora'] = $row_paciente['cartao_operadora'];
			$valores['nome'] = $row_paciente['nome'];
			$valores['validade_carteira'] = $row_paciente['validade_carteira'];

			$timestamp = strtotime($valores['validade_carteira']);
            $valores['validade_carteira'] = date('d/m/Y', $timestamp);
			
			
		}else{
			$valores['nome'] = 'Paciente não Encontrado';
		}
		return json_encode($valores);
	}

	if(isset($_GET['cpf'])){
		echo retorna($_GET['cpf'], $conn);
	}


?>
