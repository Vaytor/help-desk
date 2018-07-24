<?php
//Iniciando a sessão
session_start();

//Importando conexão
require_once("../connects/conec_mysql.php");

//Criando a class de conexão
$obj_db = new db();

//Realizando a conexão
$mysqli = $obj_db->conec_mysql();

//Recuperando pelo url o chamado para editar
$id_chamado = $_GET["chamado"];

//Recuperando a váriavel de sessão que recebe o id do usuário ao realizar login
$user_id = $_SESSION["user_id"];

//Query para ser mostrado o chamado para editar
$query = "select id, titulo, categoria, descricao from chamados where user_id = $user_id and id = $id_chamado";

$result = $mysqli->query($query);

//Verificando se retornou dados
if(!$result){
    die("Erro: ".$mysqli->error);
}else{
    //Percorrendo os resultados e atribuindo aos campos
    while ($dados = mysqli_fetch_row($result))
    {
        require_once('../pages/view/user/consultar_chamado_body.html');
    }
    
}

//Limpando a query
mysqli_free_result($result);

//Fechando a conexão
$mysqli->close();



?>

