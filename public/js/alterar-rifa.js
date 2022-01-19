$(document).ready(function(){
    $("#form-alterar-rifa").submit(function(e){
        e.preventDefault();

        alterarRifa();
    });})

function alterarRifa()
{
    var dados = {
        'id_rifa': document.getElementById("id_rifa").value,
        'nome_rifa': document.getElementById("nome_rifa").value,
        'data_fechamento': document.getElementById("data_fechamento").value,
        'limite_part': document.getElementById("limite_part").value,
        'premio': document.getElementById("premio").value,
        'objetivo': document.getElementById("objetivo").value,
    }

    var button = document.getElementById("alterar-button");

    $.ajax({
        type:'POST',
        dataType: 'json',
        url: '/alterar-rifa',
        data: dados,
        beforeSend : function (){
            button.innerHTML = `<div class="spinner-border text-light" role="status"><span class="visually-hidden">Loading...</span></div>`;
        },
        error: function (response){
            button.innerHTML = "Alterar";
            alert("Houve um erro em sua conexão. Tente novamente!");
        },
        success: function(response){
            button.innerHTML = "Alterar";
            alert("Rifa alterada com sucesso!");

            location.reload();
        }
    });
}

