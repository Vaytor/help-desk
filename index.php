<?php 
    //Iniciando sessão
    session_start();
    
    //Verificando se o usuário foi autenticado, caso tenha, enviar para a home
    if($_SESSION['autenticacao']){
      header("Location: pages/home.php");
    }
    
    //Carregando a barra de navegação
    require_once("pages/nav.php");

?>

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

                <?if(isset($_GET['login']) && $_GET['login'] == "errorautenticacao"){ ?>
                    <script>alert("É preciso realizar login para acessar essa página!");</script>
                <? } ?>
              </form>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>