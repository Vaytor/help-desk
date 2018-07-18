<?php

class db{
    //Definindo dados de conexão
    private $server = "127.0.0.1";
    
    private $user = "root"; 
    
    private $senha = "root";
    
    private $database = "help_desk";

    public function conec_mysql(){
        
        //Conexão sendo criada
        $con = mysqli_connect($this->server, $this->user, $this->senha, $this->database);

        //Verificando se ocorreu erro ao criar a conexão
        if(!$con){
            die("Erro ao se conectar ao banco de dados".mysqli_error());
        }

        //Retornando a conexão
        return $con;

    }

}
