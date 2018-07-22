<?php

//Iniciando a sessão
session_start();

//Require da conexão
require_once("../connects/conec_mysql.php");

//Instanciando a classe da conexão
$obj_db = new db();

//Realizando a conexão
$mysqli = $obj_db->conec_mysql();

//Reperando o id do chamado para finalizar
$chamado_id = $_GET['chamado'];

//Query para a edição do chamado
$query = "delete from chamados where id = $chamado_id";

//Executando a query
$result = $mysqli->query($query);

//Verificando se ocorreu algum erro
if(!$result){
    die("Erro: ".$mysqli->error);
}else{
    //Caso seja sucesso, redirecionar para a lista de chamados
    header("Location: ../pages/consultar_chamado.php?finalizado");
}

