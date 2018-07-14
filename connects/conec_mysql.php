<?php

class db{
    //Definindo dados de conexão
    private $server = "localhost";
    
    private $user = "root"; 
    
    private $senha = "";
    
    private $database = "help_desk";

    public function conec_mysql(){
        
        //Conexão sendo criada
        $con = mysqli_connect($this->server, $this->user, $this->senha, $this->database);

        //Verificando se ocorreu erro ao criar a conexão
        if(!$con){
            die("Erro ao se conectar ao banco de dados".mysqli_error());
        }

        return $con;

    }

}
