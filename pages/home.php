<?php 
    //Iniciando sessão
    session_start();

    //Verificando se o usuário foi autenticado para não deixar o usuário acessar diretamente a página
    if(!$_SESSION['autenticacao']){
      header("Location: ../index.php?login=errorautenticacao");
    }
    
    //Carregando a barra de navegação
    require_once("nav.php");
?>

    <div class="container">    
      <div class="row">

        <div class="card-home">
          <div class="card">
            <div class="card-header">
              Menu
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-6 d-flex justify-content-center">
                  <img src="../img/formulario_abrir_chamado.png" width="70" height="70">
                </div>
                <div class="col-6 d-flex justify-content-center">
                  <img src="../img/formulario_consultar_chamado.png" width="70" height="70">
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>