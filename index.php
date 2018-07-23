<?php 
    //Iniciando sessão
    session_start();
  
    //Verificando se o usuário foi autenticado, caso tenha, enviar para a home    
    if(isset($_SESSION['autenticacao'])){
      header("Location: pages/home.php");
    }

    if(isset($_GET['conta_criada'])){
      echo "<script>alert('Um email foi enviado para sua conta para ativar o cadastro!');</script>";
    }
?>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css"></link>
    
    <?if(isset($_GET['errorautenticacao'])){ ?>
      <script>alert("É preciso realizar login para acessar essa página!");</script>
    <? } ?>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
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
                  <input autocomplete="off" name="email" type="email" class="form-control" placeholder="E-mail">
                </div>
                <div class="form-group">
                  <input name="senha" type="password" class="form-control" placeholder="Senha">
                </div>
                
                <button class="btn btn-lg btn-info btn-block" type="submit">Entrar</button>

                <div style="margin-top: 2%">
                  <a href="./pages/tela_cadastro.php" class="badge badge-outline-info" title="Cadastra-se">Cadastre-se</a>                
                  <a href="#" class="badge badge-outline-info" title="Esqueceu sua senha?" style="float: right">Esqueci minha senha</a>
                </div>

                <? if(isset($_GET['invalido'])){ ?>                

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