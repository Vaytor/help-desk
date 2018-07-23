<?php

    //Conexão com o banco de dados
    require_once('../connects/conec_mysql.php');

    //Criando objeto de conexão (db é o nome da classe)
    $obj_db = new db();

    //Realizando a conexão
    $mysqli = $obj_db->conec_mysql();

    //Recuperar valor dos campos
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    //Verificando se já existe uma conta criada com esse email
    $query = "select * from usuarios where email = '$email' ";

    //Realizado o select no banco 
    $result = $mysqli->query($query);
    
    //Verificando se ocorreu erro na query
    if(!$result){
    
        die("Erro: ".$mysqli->error);
        
    //Se não retornou nenhuma linha quer dizer que não existe um email cadastrado
    }else if(mysqli_num_rows($result) == 0){

        //Query para inserir o usuários no banco
        $query = "insert into usuarios(nome, email, senha, perfil) 
        values('$nome', '$email', '$senha', 'user')";

        //Realizado o insert no banco
        $result = $mysqli->query($query);

        //Verificando se ocorreu algum erro 
        if(!$result){

            die("Erro: ".$mysqli->error);

        }else{

            //Enviando para a index com mensagem de conta criada
            header("Location: ../index.php?conta_criada");
        
        }

    //Se o usuários já existir
    }else{
        
        //Enviando para a tela de cadastro falando que a conta já existe
        header("Location: ../pages/tela_cadastro.php?conta_existe");

    }
    
    
    //Limpando a query
    mysqli_free_result($result);

    //Fechando a conexão
    $mysqli->close();
    
