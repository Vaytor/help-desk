<?php 

    //Carregando a barra de navegação
    require_once("header.php");

    //Carregando a view home
    require("view/home.html");

    if($_GET['query'] = "sucesso"){
        echo "<script>alert('Chamado criado com sucesso! Em até 8h entraremos em contato!');</script>";
    }

    