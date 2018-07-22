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

    //Verificando se ocorreu algum erro 
    if(!$result){
        die("Erro: ".$mysqli->error);
    }else{

        //A cada chamado criado adicionar mais um a quantidade de chamados criados pelo usuário  
        $query = "update usuarios set qtd_chamados = qtd_chamados + 1 where id = $user_id";

        //Realizado o update no banco
        $result = $mysqli->query($query);

        //Verificando se ocorreu algum erro
        if(!$result){
            die("Erro: ".$mysqli->error);
        }else{
            //Enviando para a home
            header("Location: ../pages/home.php?query=sucesso");
        }

        
    }
    
    //Limpando a query
    mysqli_free_result($result);

    //Fechando a conexão
    $mysqli->close();
    
