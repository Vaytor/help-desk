<?php

require_once("header.php");

//Verificação para não deixar acessar páginas que não pertence a aquele user  
if($_SESSION["perfil"] == "admin"){
    
    //Carregando a view (html) do consultar chamado header
    require_once("view/admin/lista_conversa_header.html");

    //Carregando a lista de chamados
    require_once('../action/listar_todos_chamados.php');

    //Carregando a view (html) do consultar chamado footer
    require_once("view/admin/lista_conversa_footer.html");


}else{
    
    header("Location: home.php");

}