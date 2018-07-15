<?php
    //Iniciando sessão
    session_start();

    //Colocando false para a autenticação
    $_SESSION['autenticacao'] = FALSE;

    //Enviando para a tela de login
    header("Location: ../index.php");