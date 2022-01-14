function criarRifa()
{
    var dados = {
        'nome_rifa': document.getElementById("nome_rifa").value,
        'data_fechamento': document.getElementById("data_fechamento").value,
        'limite_part': document.getElementById("limite_part").value,
        'premio': document.getElementById("premio").value,
        'objetivo': document.getElementById("objetivo").value,
    }

    $.ajax({
        type:'POST',
        dataType: 'json',
        url: '/criar-rifa',
        data: dados,
        beforeSend : function (){

        },
        error: function (response){

        },
        success: function(response){

        }
    });
}

