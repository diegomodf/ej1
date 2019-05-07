<?php include_once("../../conectaBd/index.php");

	$objDb = new db();
    $link = $objDb->conecta_mysql();

	$id_categoria = $_REQUEST['id_categoria'];
	
	$result_sub_cat = "SELECT * FROM profissional WHERE especialidade_cbo=$id_categoria ORDER BY nome";
	$resultado_sub_cat = mysqli_query($link, $result_sub_cat);
	
	while ($row_sub_cat = mysqli_fetch_assoc($resultado_sub_cat) ) {
		$sub_categorias_post[] = array(
			'idprofissional'	=> $row_sub_cat['idprofissional'],
			'nome' => utf8_encode($row_sub_cat['nome']),
		);
	}
	
	echo(json_encode($sub_categorias_post));
