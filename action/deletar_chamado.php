<?php
    
    //Importando a conexão
    require_once("../connects/conec_mysql.php");

    //Instanciando o objeto de conexão (db é o nome da classe)
    $obj_db = new db();

    //Realizando a conexão
    $mysqli = $obj_db->conec_mysql();

    //
