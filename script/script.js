$(document).ready(function(){
    //Edit refere-se ao link do consultar_chamado_body
    $(".edit").click(function(){

            //Pegando o id do elemento clicado a partir do "a"
            var id = $(this).parents('.chamados').attr('id');
            
            //Enviando via url o id do elemento para editar
            window.location = "/help-desk/pages/editar_chamado.php?chamado="+id;

    });

    $(".finalizar").click(function(){

        //Pegando o id do elemento clicado a partir do "a"
        var id = $(this).parents('.chamados').attr('id');
        
        //Perguntando ao usuário se ele realmente quer finalizar o chamado
        alert("Você tem certeza que deseja finalizar o chamado Nº"+id+"?");
        
        //Enviando via url o id do elemento para editar
        window.location = "/help-desk/pages/finalizar_chamado.php?chamado="+id;


    });

});

