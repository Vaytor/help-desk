<?php

//View do header
require_once("view/header.html");

//Verificação para não deixar acessar páginas que não pertence a aquele user  
if($_SESSION['perfil'] == "admin"){
        
    header("Location: home.php");

}else{
    //View do chamado editar header
    require_once("../action/edicao_chamado.php");
}




