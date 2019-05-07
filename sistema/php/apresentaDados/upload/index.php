<?php

	include_once("../../conectaBd/index.php");
	
    $objDb = new db();
    $conn = $objDb->conecta_mysql();

    //PEGAR REFERÊNCIA DO MÊS DO ARQUIVO VIA GET E ESCOLHIDA PELO USUARIO
    $mes = $_POST['mes'];


	if(!empty($_FILES['arquivo']['tmp_name'])){
		$arquivo = new DomDocument();
		$arquivo->load($_FILES['arquivo']['tmp_name']);
		
		
		$linhas = $arquivo->getElementsByTagName("Row");
				
		$primeira_linha = true;
		
		foreach($linhas as $linha){
			if($primeira_linha == false){
				$numero = $linha->getElementsByTagName("Data")->item(0)->nodeValue;
				
                
				$nomefunc = $linha->getElementsByTagName("Data")->item(1)->nodeValue;
                $nomecl = $linha->getElementsByTagName("Data")->item(2)->nodeValue;
				$valor = $linha->getElementsByTagName("Data")->item(3)->nodeValue;
				$convenio = $linha->getElementsByTagName("Data")->item(4)->nodeValue;
                $plano = $linha->getElementsByTagName("Data")->item(5)->nodeValue;
				    
                
                
                echo "Número: $numero <br>";
				echo "Nome do Funcionário: $nomefunc <br>";
                echo "Nome do Cliente: $nomecl <br>";
                echo "Valor Pago: $valor <br>";
                echo "Convênio: $convenio <br>";
                echo "Tipo do plano de saúde: $plano <br>";
                echo "Mês:  $mes <br>";
                echo "<hr>";
				
                
				//$result_usuario = "INSERT INTO usuarios (nome, email, niveis_acesso_id) VALUES ('$nome', '$email', '$niveis_acesso_id')";
                $result_usuario = "INSERT INTO pagamentos (numero_guia, nome_funcionario, nome_cliente, valor_pago, convenio, tipo_plano_de_saude, mes) VALUES ('$numero', '$nomefunc', '$nomecl', '$valor', '$convenio', '$plano', '$mes')";
                $valores = strtoupper($result_usuario);
				$resultado_usuario = mysqli_query($conn, $result_valores);

            
			}
			$primeira_linha = false;
		}
	}

?>