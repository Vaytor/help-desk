<?php

    //Inciando a sessão
    session_start();

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
    $query = "select titulo, categoria, descricao from chamados where user_id = $user_id and id = $chamado_id";
    
    //Realizando o select da query
    $result = $mysqli->query($query);
    
    //Verificando se retornou dados
    if(!$result){
        ?>
        <div class="card mb-3 bg-light">
            <span>ERRO</span>
        </div>
        <?php
    }else{
        
        //Percorrendo os resultados e atribuindo aos campos
        while ($dados = mysqli_fetch_row($result))
        {
            require('../pages/view/editar_chamado.html');
        }

       

    }

    //Fechando a conexão
    $mysqli->close();