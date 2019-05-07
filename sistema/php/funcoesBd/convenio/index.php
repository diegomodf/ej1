<?php
    
    require_once('../../conectaBd/index.php');

    $objDb = new db();
    $link = $objDb->conecta_mysql();

class convenio{

    private $registro_ans;
    private $nome;
    private $identificacao;
	private $nome_contato;
    private $email_contato;
    private $tel_contato;
    private $tabela;
    private $versao;

    public function insertConvenio($nome, $identificacao, $registro_ans, $tabela, $versao, $nome_contato, $email_contato, $tel_contato, $link){

        return $sql_convenio = "INSERT INTO `operadora` (`idoperadora`, `nome`, `id_clifops`, `registro_ans`, `tabela_cobranca`, `versao_tiss`, `contato_nome`, `contato_email`, `contato_tel`) VALUES (NULL, '$nome', '$identificacao', '$registro_ans', '$tabela_cobranca', '$versao', '$nome_contato', '$email_contato', '$tel_contato');";

    }
   
    
}

?>