<?php 

    //Carregando a barra de navegação
    require_once("header.php");

    //Carregando a view home
    require("view/home.html");

    //Confirmando com o usuário que o chamado foi criado
    if(isset($_GET['query']) && $_GET['query'] == "sucesso"){
        echo "<script>alert('Chamado criado com sucesso! Em até 8h entraremos em contato!');</script>";
    }

?>
