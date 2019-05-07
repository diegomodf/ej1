<?php

    require_once('../../conectaBd/index.php');
   
    $objDb = new db();
    $link = $objDb->conecta_mysql();

class operadora{

    private $idoperadora;
    private $nome;
    private $id_clifops;
    private $registro_ans;
    private $tabela_cobranca;
    private $versao_tiss;
    private $contato_nome;
    private $contato_email;
    private $contato_tel;
    
    public function insertOperadora($idoperadora, $nome, $id_clifops, $id_registro_ans, $tabela_cobranca, $versao_tiss, $contato_nome, $contato_email, $contato_telm $link){

        return $sql_evento = "INSERT INTO `operadora` (`idoperadora`, `nome`, `id_clifops`, `registro_ans`, `tabela_cobranca`, `versao_tiss`, `contato_nome`, `contato_email`, `contato_tel`) VALUES (NULL, '$nome', '$id_clifops', '$registro_ans', '$tabela_cobranca', '$versao_tiss', '$contato_nome', '$contato_email', '$contato_tel')";
    }
    
    //public function alterOperadora($idoperadora, $nome, $id_clifops, $id_registro_ans, $tabela_cobranca, $versao_tiss, $contato_nome, $contato_email, $contato_telm $link){ return $sql_evento = "FUNÇÃO DE ALTERAR OPERADORA"}
        
}

?>