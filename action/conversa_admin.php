<?php

    //Conexão com o banco de dados
    require_once('../connects/conec_mysql.php');

    //Criando objeto de conexão
    $obj_db = new db();

    //Realizando a conexão
    $mysqli = $obj_db->conec_mysql();

    //Recuperando a váriavel de sessão que recebe o id do usuário ao realizar login
    $user_id = $_SESSION['user_id'];

    //Reperando o id do chamado para edição
    $chamado_id = $_GET['chamado'];

    //Query para listar chamado referente ao usuário
    $query = "select id, titulo, categoria, descricao from chamados where id = $chamado_id";
    
    //Realizando o select da query
    $result = $mysqli->query($query);
    
    //Verificando se ocorreu algum erro
    if(!$result){
        die("Erro: ".$mysqli->error);
    }else{
        
        //Percorrendo os resultados e atribuindo aos campos
        while ($dados = mysqli_fetch_row($result)){
            
            require('../pages/view/user/conversa_header.html');
            
        }

       

    }
    
    //Limpando a query
    mysqli_free_result($result);

    //Fechando a conexão
    $mysqli->close();