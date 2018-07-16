<?php 
    //Iniciando sessão
    session_start();
  
    //Verificando se o usuário foi autenticado, caso tenha, enviar para a home    
    if(isset($_SESSION['autenticacao'])){
      header("Location: pages/home.php");
    }

?>
<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="http://127.0.0.1/help_desk/css/style.css"></link>
    
    <?if(isset($_GET['login']) && $_GET['login'] == "errorautenticacao"){ ?>
      <script>alert("É preciso realizar login para acessar essa página!");</script>
    <? } ?>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="http://127.0.0.1/help_desk/img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
      
    </nav>
    <div class="container">    
      <div class="row">

        <div class="card-login">
          <div class="card">
            <div class="card-header">
              Login
            </div>
            <div class="card-body">
              <form action="./action/valida_login.php" method="POST">
                <div class="form-group">
                  <input name="email" type="email" class="form-control" placeholder="E-mail">
                </div>
                <div class="form-group">
                  <input name="senha" type="password" class="form-control" placeholder="Senha">
                </div>
                <button class="btn btn-lg btn-info btn-block" type="submit">Entrar</button>

                <? if(isset($_GET['login']) && $_GET['login'] == "invalido"){ ?>                

                    <div class="text-danger">
                        Usuário e/ou senha inválido(s)
                    </div>

                <? } ?>

                
              </form>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>