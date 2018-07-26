<?php

//Iniciando a sessão
session_start();

//Require da conexão
require_once("../connects/conec_mysql.php");

//Instanciando a classe da conexão
$obj_db = new db();

//Realizando a conexão
$mysqli = $obj_db->conec_mysql();

//Recuperando a váriavel de sessão que recebe o id do usuário ao realizar login
$user_id = $_SESSION['user_id'];

//Reperando o id do chamado para edição
$chamado_id = $_GET['chamado'];

//Recuperando o valor da descricao para alterar
$descricao = $_POST['descricao'];

//Query para a edição do chamado
$query = "update chamados set descricao = '$descricao' where id = $chamado_id and user_id = $user_id";

//Executando a query
$result = $mysqli->query($query);

//Verificando se ocorreu algum erro
if(!$result){
    die("Erro: ".$mysqli->error);
}else{
    //Caso seja sucesso, redirecionar para a lista de chamados
    header("Location: ../pages/consultar_chamado.php");
}

