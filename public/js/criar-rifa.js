$(document).ready(function(){
    $("#form-rifa").submit(function(e){
        e.preventDefault();

        criarRifa();
    });})

function criarRifa()
{
    var dados = {
        'nome_rifa': document.getElementById("nome_rifa").value,
        'data_fechamento': document.getElementById("data_fechamento").value,
        'limite_part': document.getElementById("limite_part").value,
        'premio': document.getElementById("premio").value,
        'objetivo': document.getElementById("objetivo").value,
    }

    var button = document.getElementById("criar-button");

    $.ajax({
        type:'POST',
        dataType: 'json',
        url: '/criar-rifa',
        data: dados,
        beforeSend : function (){
            button.innerHTML = `<div class="spinner-border text-light" role="status"><span class="visually-hidden">Loading...</span></div>`;
        },
        error: function (response){
            button.innerHTML = "Criar Rifa";
        },
        success: function(response){
            button.innerHTML = "Criar Rifa";
            window.location.href = "/home";
        }
    });
}

