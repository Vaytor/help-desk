<?php

//View do header
require_once("header.php");

//Verificação para não deixar acessar páginas que não pertence a aquele user  
if($_SESSION['perfil'] == "admin"){
        
    header("Location: home.php");
    
}else{
    //View do chamado editar header
    require_once("../action/finalizando_chamado.php");
}