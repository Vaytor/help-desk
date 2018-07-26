<?php 
    
    //Carregando a barra de navegação
    require_once("header.php");

    //Verificação para não deixar acessar páginas que não pertence a aquele user  
    if($_SESSION['perfil'] == "admin"){
        
        header("Location: home.php");

        
    }else{
        //Carregando a view (html) do consultar chamado header
        require_once("view/user/consultar_chamado_header.html");

        //Carregando a lista de chamados
        require_once('../action/listar_chamado.php');

        //Carregando a view (html) do consultar chamado footer
        require_once("view/user/consultar_chamado_footer.html");

        if(isset($_GET['editado'])){
            
            echo "<script>alert('Chamado editado com sucesso!');</script>";
        
        }else if(isset($_GET['finalizado'])){
            
            echo "<script>alert('Chamado finalizado com sucesso!');</script>";

        }
    
    }
    