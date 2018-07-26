<?php
    
    if(isset($_GET['conta_existe'])){
        echo "<script>alert('Esse email já está cadastrado');</script>";
    }
    //Require do header
    require_once("view/header.html");

    //Require do form para o cadastro do dados
    require_once("view/tela_cadastro.html");