<?php
	include_once("conexao.php");

	function retorna($nome_profissional_solicitante, $conn){
		$result_paciente = "SELECT * FROM profissional WHERE nome = '$nome_profissional_solicitante' LIMIT 1";
		$resultado_paciente = mysqli_query($conn, $result_paciente);
		if($resultado_paciente->num_rows){
			$row_paciente = mysqli_fetch_assoc($resultado_paciente);
			$valores['num_conselho'] = $row_paciente['num_conselho'];
			$valores['uf_conselho'] = $row_paciente['uf_conselho'];
			$valores['conselho'] = $row_paciente['conselho'];
			$valores['especialidade_cbo'] = $row_paciente['especialidade_cbo'];
			$valores['codigo_operadora_cpf'] = $row_paciente['cpf'];
			
			
		}else{
			$valores['nome'] = 'Médico não Encontrado';
		}
		return json_encode($valores);
	}

	if(isset($_GET['nome_profissional_solicitante'])){
		echo retorna($_GET['nome_profissional_solicitante'], $conn);
	}


?>