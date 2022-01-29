$(document).ready(function(){
    $("#form-alterar-rifa").submit(function(e){
        e.preventDefault();

        alterarRifa();
    });})

function alterarRifa()
{
    var dados = {
        'id': document.getElementById("id_rifa").value,
        'nome_rifa': document.getElementById("nome_rifa").value,
        'data_fechamento': document.getElementById("data_fechamento").value,
        'limite_part': document.getElementById("limite_part").value,
        'premio': document.getElementById("premio").value,
        'valor': document.getElementById("valor").value,
        'objetivo': document.getElementById("objetivo").value,
    }

    var button = document.getElementById("alterar-button");

    $.ajax({
        type:'PATCH',
        dataType: 'json',
        url: '/rifa',
        data: dados,
        beforeSend : function (){
            button.innerHTML = `<div class="spinner-border text-light" role="status"><span class="visually-hidden">Loading...</span></div>`;
        },
        error: function (xhr){
            button.innerHTML = "Alterar";
        },
        success: function(response){
            button.innerHTML = "Alterar";

            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: 'Rifa editada com sucesso!'
            })
        }
    });
}

