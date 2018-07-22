<?php 

    //Iniciando sessão, não necessários pois no header já foi iniciado
    //session_start();

    //Carregando a barra de navegação
    require_once("header.php");

    if($_SESSION['perfil'] == "admin"){
        
        //Carregando a view home para usuários administradores
        require_once("view/home_admin.html");

    }else{
        
        //Carregando a view home para usuários normais
        require_once("view/home.html");

    }
    
    //print_r($_SESSION['perfil']);

    //Confirmando com o usuário que o chamado foi criado
    if(isset($_GET['query']) && $_GET['query'] == "sucesso"){
        echo "<script>alert('Chamado criado com sucesso!');</script>";
    }

?>
