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
    $query = "select titulo, categoria, descricao from chamados where user_id = $user_id";
    
    //Realizando o select da query
    $result = $mysqli->query($query);
    
    //Verificando que a query foi executada com sucesso/se retornou dados
    if(!$result){
        ?>
        <div class="card mb-3 bg-light">
            <span>Você não possui chamados abertos</span>
        </div>
        <?php
    }else{
        
        //print_r($dados);
        
        //Percorrendo os resultados e atribuindo aos campos
        while ($dados = mysqli_fetch_row($result))
        {
        ?>
            <div class="card mb-3 bg-light">
              <div class="card-body">
                <h5 class="card-title"><? echo $dados[0]; ?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><? echo $dados[1]; ?></h6>
                <p class="card-text"><? echo $dados[2]; ?></p>
              </div>
            </div>
        <?php
        }

       

    }

    //Fechando a conexão
    $mysqli->close();