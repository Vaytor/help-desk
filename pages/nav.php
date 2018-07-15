<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="http://127.0.0.1/help_desk/css/style.css"></link>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="http://127.0.0.1/help_desk/img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>

      <? if($_SESSION['autenticacao']){ #Se o usuário estiver autenticado, mostra o botão "sair"?>
        <a href="../action/sair.php" style="text-align: left; color: red" >SAIR</a>
      <? } ?>
      
    </nav>