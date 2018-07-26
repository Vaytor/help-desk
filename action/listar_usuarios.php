<?php

 //Conexão com o banco de dados
 require_once('../connects/conec_mysql.php');

 //Criando objeto de conexão (db é o nome da classe)
 $obj_db = new db();

 //Realizando a conexão
 $mysqli = $obj_db->conec_mysql();

 //Query para selecionar todos os usuários
 $query = "select * from usuarios";

 //Realizado o insert no banco (result recebe a conexão que executa a query pela função "query")
 $result = $mysqli->query($query);

 //Verificando se ocorreu algum erro 
 if(!$result){
    
    die("Erro: ".$mysqli->error);

 }else{

    //Percorrendo os resultados e atribuindo aos campos
    while ($dados = mysqli_fetch_row($result)){

        require("../pages/view/admin/consultar_usuario_body.html");

    }
     
 }
 
 //Limpando a query
 mysqli_free_result($result);

 //Fechando a conexão
 $mysqli->close();
 