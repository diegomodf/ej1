<?php
	include_once("conexao.php");

	function retorna($cpf, $conn){
		$result_paciente = "SELECT * FROM paciente WHERE cpf = '$cpf' LIMIT 1";
		$resultado_paciente = mysqli_query($conn, $result_paciente);
		if($resultado_paciente->num_rows){
			$row_paciente = mysqli_fetch_assoc($resultado_paciente);
			$valores['nome'] = $row_paciente['nome'];
			$valores['email'] = $row_paciente['email'];
			$valores['telefone'] = $row_paciente['telefone'];
			$valores['idpaciente'] = $row_paciente['idpaciente'];
			
			
		}else{
			$valores['nome'] = 'Paciente não encontrado';
		}
		return json_encode($valores);
	}

	if(isset($_GET['cpf'])){
		echo retorna($_GET['cpf'], $conn);
	}
	?>
