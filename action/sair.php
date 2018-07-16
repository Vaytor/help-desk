<?php
    //Iniciando sessão
    session_start();

    //Destruindo as váriaveis de sessão
    session_destroy();

    //Enviando para a tela de login
    header("Location: ../index.php");