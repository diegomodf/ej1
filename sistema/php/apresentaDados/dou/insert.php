<?php
    
    require_once('../../conectaBd/index.php'); 

    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $id_cliente = $_POST['cliente'];
    $sql = " SELECT * FROM Clientes WHERE `idClientes`= ".$id_cliente;
    $resultado_ids = mysqli_query($link, $sql);
    if($resultado_ids){
        while($registros = mysqli_fetch_array($resultado_ids, MYSQLI_ASSOC)){
            $nome_cliente = $registros['nomeClientes'];
        }
    }else{
        echo 'Erro na consulta dos emails no banco de dados!';
    }

    $id_funcionario = $_POST['funcionario'];
    $sql = " SELECT * FROM Funcionarios WHERE `idFuncionarios`= ".$id_funcionario;
    $resultado_ids = mysqli_query($link, $sql);
    if($resultado_ids){
        while($registros = mysqli_fetch_array($resultado_ids, MYSQLI_ASSOC)){
            $nome_funcionario = $registros['nomeFuncionarios'];
        }
    }else{
        echo 'Erro na consulta dos emails no banco de dados!';
    }

    $data = date("Y-m-d H:i:s");
    $update = date("Y-m-d");

    
    /*$objFuncionario = new funcionario($titulo, $email, $telefone, $sexo, $cpf, $nascimento, $cep, $rua, $numero, $complemento, $bairro, $cidade, $uf, $funcao, $ingresso, $favorecido1, $banco1, $agencia1, $conta1, $tipo1, $favorecido2, $banco2, $agencia2, $conta2, $tipo2, $link);
    $funcionario = $objFuncionario->insertFuncionario();*/

    include "funcoes.php";
 
    $msg = false;
    
    if( isset($_POST['enviou']) && $_POST['enviou'] == 1 ){
    
        // arquivo
        $arquivo = $_FILES['arquivo'];
    
        // Tamanho máximo do arquivo (em Bytes)
        $tamanhoPermitido = 1024 * 1024 * 2; // 2Mb
    
        //Define o diretorio para onde enviaremos o arquivo
        $diretorio = "uploads/";
    
        // verifica se arquivo foi enviado e sem erros
        if( $arquivo['error'] == UPLOAD_ERR_OK ){
    
            // pego a extensão do arquivo
            $extensao = extensao($arquivo['name']);
    
            // valida a extensão
            if( in_array( $extensao, array("pdf") ) ){
    
                // verifica tamanho do arquivo
                if ( $arquivo['size'] > $tamanhoPermitido ){
    
                    $msg = "<strong>Aviso!</strong> O arquivo enviado é muito grande, envie arquivos de até ".$tamanhoPermitido/MB." MB.";
                    $class = "alert-warning";
    
                }else{
    
                    // atribui novo nome ao arquivo
                    $novo_nome  = $arquivo['name'];
    
                    // faz o upload
                    $enviou = move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome);
    
                    if($enviou){
                        $msg = "<strong>Sucesso!</strong> Arquivo enviado corretamente.";
                        $class = "alert-success";
                    }else{
                        $msg = "<strong>Erro!</strong> Falha ao enviar o arquivo.";
                        $class = "alert-danger";
                    }
                }
    
            }else{
                $msg = "<strong>Erro!</strong> Somente arquivos PDF são permitidos.";
                $class = "alert-danger";
            }
    
        }else{
            $msg = "<strong>Atenção!</strong> Você deve enviar um arquivo.";
            $class = "alert-info";
        }
    }
    $sql_dou = "INSERT INTO `DOU`(`idDOU`, `idCliente`, `idFuncionario`, `nomeCliente`, `nomeFuncionario`, `idUltimoFuncionario`, `nomeUltimoFuncionario`, `dataUpload`, `dataUpdate`, `arquivo`) VALUES ('','$id_cliente','$id_funcionario','$nome_cliente','$nome_funcionario','$id_funcionario','$nome_funcionario','$data','$update','$novo_nome');";
    mysqli_query($link, $sql_dou);
    //header("Location: ../../../../paginas/usuarios/funcionarios/index.php");
