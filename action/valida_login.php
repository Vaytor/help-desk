<?php 

    //Iniciando a sessão
    session_start();

    //Fazendo um require da conexão
    require_once("../connects/conec_mysql.php");

    //Criando o objeto da conexão
    $obj_db = new db();
    
    //Realizando a conexão
    $mysqli = $obj_db->conec_mysql();

    //Recuperando os valores de email e senha
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    //Query para verificar se email ou senha são validos
    $query = "SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha' ";

    //Recebendo o resultado da query
    $result = $mysqli->query($query);

    //Verificando se ocorreu algum erro na consulta
    if (!$result) {
        die("Erro ao realizar consulta no banco de dados, verifique nome das tabelas");
    }else{
        //Recuperando dados da consulta
        $dados = mysqli_fetch_array($result);
        
        //Verificando se usuário ou senha são válidos e autenticanto, ou não, o usuário
        if($dados == NULL){
            //Se for invalido, é enviado por GET login=invalido, para então ser recuperado na pagina index
            header("Location: ../index.php?login=invalido");
            $_SESSION['autenticacao'] = FALSE;
        }else{
            //print_r($dados);
            $_SESSION['autenticacao'] = TRUE;
            header("Location: ../pages/home.php");

        }

    }
