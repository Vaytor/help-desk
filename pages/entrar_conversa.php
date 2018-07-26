<?php

//View do header
require_once("header.php");

//Verificação para não deixar acessar páginas que não pertence a aquele user  
if($_SESSION['perfil'] == "admin"){
    
    //Informações sobre a conversa(nome, titulo... etc)
    require_once("../action/conversa_admin.php");

    //Resposta
    require("view/admin/conversa_admin.html");
   
    //Resposta
    require("view/user/resposta_user.html");

    //Input para resposter e footer
    require_once("view/user/conversa_footer.html");

}else{

    //View do chamado
    require_once("../action/conversa.php");

    //Resposta
    require("view/admin/conversa_admin.html");
       
    //Resposta
    require("view/user/resposta_user.html");
    
    //Input para resposter e footer
    require_once("view/user/conversa_footer.html");

}




