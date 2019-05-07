<?php
	include_once("conexao.php");

	function retorna($registro, $conn){
		$result_paciente = "SELECT * FROM operadora WHERE nome = '$registro' LIMIT 1";
		$resultado_paciente = mysqli_query($conn, $result_paciente);
		if($resultado_paciente->num_rows){
			$row_paciente = mysqli_fetch_assoc($resultado_paciente);
			$valores['id_clifops'] = $row_paciente['id_clifops'];
			$valores['versao_tiss'] = $row_paciente['versao_tiss'];
			
			
		}else{
			$valores['nome'] = 'Operadora não Encontrada';
		}
		return json_encode($valores);
	}

	if(isset($_GET['registro'])){
		echo retorna($_GET['registro'], $conn);
	}


?>