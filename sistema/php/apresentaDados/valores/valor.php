<?php include_once("../../conectaBd/index.php");

	$objDb = new db();
    $link = $objDb->conecta_mysql();

	$id_operadora = $_REQUEST['id_operadora'];
	
	$result_sub_cat = "SELECT * FROM valores WHERE id_operadora = '$id_operadora'";
	$resultado_sub_cat = mysqli_query($link, $result_sub_cat);
	
	while ($row_sub_cat = mysqli_fetch_assoc($resultado_sub_cat) ) {
		$sub_categorias_post[] = array(
			'valor'	=> $row_sub_cat['valor'],
			'descricao'	=> $row_sub_cat['descricao'],
			'codigo' => utf8_encode($row_sub_cat['codigo']),
		);
	}
	
	echo(json_encode($sub_categorias_post));