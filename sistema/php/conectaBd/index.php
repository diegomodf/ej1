<?php

class db{

    private $host ='localhost';
    private $usuario ='root';
    private $senha ='';
    private $database ='clifops_teste';
    
    //localhost
    //clifopsc_clifops
    //ges2018@)!*    
    //clifopsc_wp610    
    
    public function conecta_mysql(){
        //Cria conexão
        $con = mysqli_connect($this->host, $this->usuario, $this->senha, $this->database);
        mysqli_set_charset($con, 'utf8');
          
        if(mysqli_connect_errno()){
            //Retorna a frase + erro caso dê falha na conexão com o db
            echo('Erro ao tentar se conectar com o banco de dados Mysql: '.mysqli_connect_error());
                
        }
            //se tudo der certo, retorna conexão
        return $con;
    }
}

?>