$(document).ready(function(){
    $("#form-part").submit(function(e){
        e.preventDefault();

        cadastrarPart();
    });
});

function cadastrarPart() {
    var checkbox = $('input:checkbox[name^=btn-check]:checked');
    var valores = [];

    for (i = 0; i < checkbox.length; i++) {
        valores[i] = checkbox[i].defaultValue;
    }

    var dados = {
        'nome': document.getElementById("nome").value,
        'email': document.getElementById("email").value,
        'confirma_email': document.getElementById("confirma_email").value,
        'contato': document.getElementById("contato").value,
        'id_rifa' : location.href.split("/").pop(),
        'numeros': valores
    }

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: '/participante',
        data: dados,
        beforeSend: function () {
            Swal.fire({
                title: 'Cadastrando números',
                html: 'Aguarde...',
                allowEscapeKey: false,
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading()
                }
            });
        },
        error: function (xhr) {
            Swal.close();

            Swal.fire({
                icon: 'error',
                title: 'Ops!',
                text: xhr.responseJSON.message,
            });
        },
        success: function (response) {
            var valorTotal = valorRifa * valores.length;

            window.location.href = "/sucesso";
        }
    });
}


