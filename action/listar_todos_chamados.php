<?php
    
    //Conexão com o banco de dados
    require_once('../connects/conec_mysql.php');

    //Criando objeto de conexão
    $obj_db = new db();

    //Realizando a conexão
    $mysqli = $obj_db->conec_mysql();

    //Query para listar chamado referente ao usuário
    $query = "select id, titulo, categoria, descricao from chamados";
    
    //Realizando o select da query
    $result = $mysqli->query($query);
    
    //Verificando se ocorreu algum erro
    if(!$result){

        die("Erro: ".$mysqli->error);

        //Verificando se retornou dados
    }else if($result == NULL){
        
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