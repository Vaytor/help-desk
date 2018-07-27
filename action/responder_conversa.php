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

//Recuperando a mensagem
$msg = $_POST['msg'];

//Query para a edição do chamado
$query = "insert into conversa(chamado_id, user_id, msg) values ($chamado_id, $user_id, '$msg')";

//Executando a query
$result = $mysqli->query($query);

//Verificando se ocorreu algum erro
if(!$result){
    
    //Mostrar o erro
    die("Erro: ".$mysqli->error);

}else{

    //Caso seja sucesso, atualizar a página
    header("Location: ../pages/entrar_conversa.php?chamado=".$chamado_id);


}

