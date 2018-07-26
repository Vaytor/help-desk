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

//Query para selecionar o chamado e então depois realizar um insert na tabela de chamados_finalizados
$query = "select * from chamados where id = $chamado_id";

//Executando a query
$result = $mysqli->query($query);

//Verificando se ocorreu algum erro
if(!$result){
    
    die("Erro ao realizar o select: ".$mysqli->error);

}else{
    
    //Transformando o resultado em um array
    $dados = mysqli_fetch_row($result);

    //Query para inserir os chamados para os chamados finalizados
    $query = "insert into chamados_finalizados(id, user_id, titulo, categoria, descricao) 
    values ($dados[0], $dados[1], '$dados[2]', '$dados[3]', '$dados[4]')";

    //Executando a query
    $result = $mysqli->query($query);

    if(!$result){

        die("Erro ao inserir em chamados_finalizados : ".$mysqli->error);

    }else{
        
        //Query para a apagar o chamado do banco de chamados
        $query = "delete from chamados where id = $chamado_id";

        //Executando a query
        $result = $mysqli->query($query);

        //Verificando se ocorreu erro
        if(!$result){
            
            die("Erro ao apagar: ".$mysqli->error);

        }else{

            //Caso seja sucesso, redirecionar para a lista de chamados
            header("Location: ../pages/consultar_chamado.php?finalizado");

        }

    }
    
}

