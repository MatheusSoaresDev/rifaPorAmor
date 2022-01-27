/*function buscarDadosPart(email){
    $.ajax({
        type:'GET',
        dataType: 'json',
        url: '/buscar-dados-part',
        data: {'email': email},
        beforeSend : function (){
            Swal.fire({
                title: 'Buscando informações.',
                html: 'Aguarde...',
                allowEscapeKey: false,
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading()
                }
            });
        },
        error: function (xhr){
            Swal.fire({
                icon: 'error',
                title: 'Ops!',
                text: 'Erro. Verifique a sua conexão!'
            });
        },
        success: function (response) {
            swal.close();

        }
    });
}

async function listarDadosSwal(dadosUsers) {

    for(i=0; i<dadosUsers.length; i++){
        var input =
    }

    var formFinal = "<form><p>"+mensagem+"</p>"+listcheck+"</form>";

    const {value: formValues} = await Swal.fire({
        title: 'Atenção!',
        html: formFinal,
        focusConfirm: false,
        preConfirm: () => {
            var checks = $("input:checkbox:checked.form-check-input");
            var listId = [];

            for(i=0; i<checks.length; i++){
                listId.push(checks[i].defaultValue);
            }

            if(listId.length > 0) {
                atualizaStatusParticipantes(listId, funcao);
            }
        }
    })
}*/
