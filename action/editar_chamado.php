<?php

//Importando conexão
require_once("../connects/conec_mysql.php");

//Criando a class de conexão
$obj_db = new db();

//Realizando a conexão
$mysqli = $obj_db->conec_mysql();

?>

