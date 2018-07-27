<?php
    
    //Require da conexão
    require_once("../connects/conec_mysql.php");

    //Instanciando a classe da conexão
    $obj_db = new db();

    //Realizando a conexão
    $mysqli = $obj_db->conec_mysql();

    //Reperando o id do chamado para edição
    $chamado_id = $_GET['chamado'];

    //Query para listar todas as conversas
    $query = "SELECT conversa.msg, usuarios.perfil FROM conversa INNER JOIN 
    usuarios ON conversa.user_id = usuarios.id where conversa.chamado_id = $chamado_id;";
    
    //Realizando o select da query
    $result = $mysqli->query($query);

    //Verificando se ocorreu erro
    if(!$result){
        
        //Mostrar o erro
        die("Erro: ".$mysqli->error);

    }else{
        
        //Percorrendo os resultados 
        while ($dados = mysqli_fetch_row($result)){
            
            //Verificando qual o perfil do usuário
            if($dados[1] == 'admin' ){
                
                //Require das resposta do admin
                require("../pages/view/admin/conversa_admin.html");

            }else{

                //Require das resposta do usuario
                require("../pages/view/user/resposta_user.html");

            }
            
            
        }

        

    }