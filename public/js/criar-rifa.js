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
        'valor': document.getElementById("valor").value,
        'objetivo': document.getElementById("objetivo").value,
    }

    var button = document.getElementById("criar-button");

    $.ajax({
        type:'POST',
        dataType: 'json',
        url: '/rifa',
        data: dados,
        beforeSend : function (){
            button.innerHTML = `<div class="spinner-border text-light" role="status"><span class="visually-hidden">Loading...</span></div>`;
        },
        error: function (xhr){
            button.innerHTML = "Criar Rifa";
            var arrayErrors = xhr.responseJSON.errors;
            var result = Object.keys(arrayErrors).map(function (key) {
                return [arrayErrors[key]];
            });
            var input;
            var msgHtml;

            for(i=0; i<result.length; i++){
                input = `${result[i][0][0]}<br>`;

                if(i===0){
                    msgHtml = input;
                } else {
                    msgHtml = msgHtml + input;
                }
            }

            Swal.fire({
                icon: 'error',
                title: 'Ops!',
                html: msgHtml,
            });
        },
        success: function(response){
            button.innerHTML = "Criar Rifa";
            location.reload();
        }
    });
}



