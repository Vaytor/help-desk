<?php

    //Iniciando sessão
    session_start();

    //Conexão com o banco de dados
    require_once('../connects/conec_mysql.php');

    //Criando objeto de conexão (db é o nome da classe)
    $obj_db = new db();

    //Realizando a conexão
    $mysqli = $obj_db->conec_mysql();

    //Recuperar valor dos campos
    $titulo = $_POST['titulo'];
    $categoria = $_POST['categoria'];
    $descricao = $_POST['descricao'];

    //Recuperando a váriavel de sessão que recebe o id do usuário ao realizar login
    $user_id = $_SESSION['user_id'];

    //Query para inserir no banco de dados o chamado referente ao usuário
    $query = "insert into chamados(user_id, titulo, categoria, descricao) 
                    values($user_id, '$titulo', '$categoria', '$descricao')";

    //Realizado o insert no banco (result recebe a conexão que executa a query pela função "query")
    $result = $mysqli->query($query);

    //Verificando que a query foi executada com sucesso
    if(!$result){
        die("Erro ao inserir no banco de dados: <br/>".$mysqli->error);
    }else{
        header("Location: ../pages/home.php?query=sucesso");
    }

    //Fechando a conexão
    $mysqli->close();
    
