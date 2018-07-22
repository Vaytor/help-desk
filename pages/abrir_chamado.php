<?php 
        
    //Carregando a barra de navegação
    require_once("header.php");

    //Verificação para não deixar acessar páginas que não pertence a aquele user  
    if($_SESSION['perfil'] == "admin"){
        
        header("Location: home.php");

    }else{
        
        //Carregando a view de abrir chamado
        require_once("view/abrir_chamado.html");
    }
    
   