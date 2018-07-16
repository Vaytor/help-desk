<?php
    //Iniciando sessão
    session_start();
    
    //Verificando se o usuário foi autenticado para não deixar o usuário acessar diretamente a página
    if(!$_SESSION['autenticacao']){
      header("Location: ../index.php?login=errorautenticacao");
    }
    
    require_once("view/header.html");