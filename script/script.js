$(document).ready(function(){
    //Edit refere-se ao link do consultar_chamado_body
    $(".edit").click(function(){

            //Pegando o id do elemento clicado a partir do "a"
            var id = $(this).parents('.chamados').attr('id');
            
            //Enviando via url o id do elemento para editar
            window.location = "http:/127.0.0.1/help-desk/pages/editar_chamado.php?"+id;

    });
});

