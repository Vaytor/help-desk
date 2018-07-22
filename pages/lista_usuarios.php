<?php

//Fazendo o require do header
require_once("header.php");

//Verificação para não deixar acessar páginas que não pertence a aquele user  
if($_SESSION["perfil"] == "admin"){
    
    //Reaproveitamento do chamado header
    require_once("view/consultar_chamado_header.html");

    //Require para listar os usuários
    require("../action/listar_usuarios.php");
    
    //Reaproveitamento do chamado footer
    require_once("view/consultar_chamado_footer.html");

}else{
    
    header("Location: home.php");

}