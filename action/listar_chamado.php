<?php
    //Conexão com o banco de dados
    require_once('../connects/conec_mysql.php');

    //Criando objeto de conexão
    $obj_db = new db();

    //Realizando a conexão
    $mysqli = $obj_db->conec_mysql();

    //Recuperando a váriavel de sessão que recebe o id do usuário ao realizar login
    $user_id = $_SESSION['user_id'];

    //Query para listar chamado referente ao usuário
    $query = "select id, titulo, categoria, descricao from chamados where user_id = $user_id";
    
    //Realizando o select da query
    $result = $mysqli->query($query);
    
    //Verificando se ocorreu algum erro
    if(!$result){

        die("Erro: ".$mysqli->error);

        //Verificando se retornou dados
    }else if(mysqli_num_rows($result) == 0){
        
        ?>
        <div class="card mb-3 bg-light">
            <span>Você não possui chamados abertos</span>
        </div>
        <?php
        //print_r($dados);
        
        //Percorrendo os resultados e atribuindo aos campos
        }else{

            while ($dados = mysqli_fetch_row($result)){

            require('../pages/view/user/consultar_chamado_body.html');
        }

    }

    //Limpando a query
    mysqli_free_result($result);

    //Fechando a conexão
    $mysqli->close();