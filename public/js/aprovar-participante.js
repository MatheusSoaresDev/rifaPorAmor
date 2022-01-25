async function listarNumerosRifaSwal(numerosEscolhidos) {

    var listcheck;

    for(i=0; i<numerosEscolhidos.length; i++){
        var input = '<div class="form-check" style="text-align: left; margin-left: 10px; line-height: 1.4">' +
                        '<input class="form-check-input" type="checkbox" value="'+ numerosEscolhidos[i].id +'" id="flexCheckDefault" checked>' +
                        '<label class="form-check-label" for="flexCheckDefault"># '+ numerosEscolhidos[i].numeroEscolhido +'</label>' +
                    '</div>';

        if(i===0){
            listcheck = input;
        } else {
            listcheck = listcheck + input;
        }
    }

    var formFinal = "<form> <p>O usuário cadastrou os seguintes números. Selecione os que deseja aprovar!</p>"+listcheck+"</form>";

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

            atualizaStatusParticipantes(listId);
        }
    })
    /*if (formValues) {
        Swal.fire(JSON.stringify(formValues))
        console.log(formValues);
    }*/
}

function buscarNumeros(idRifa, emailPart){
    var listID = [];

    $.ajax({
        type:'GET',
        dataType: 'json',
        url: '/busca-numeros',
        data: {'id': idRifa, 'email': emailPart},
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
            listarNumerosRifaSwal(response);
        }
    });
}

function atualizaStatusParticipantes(idList){
    $.ajax({
        type:'PATCH',
        dataType: 'json',
        url: '/atualiza-status-participantes',
        data: {idList},
        beforeSend : function (){
            Swal.fire({
                title: 'Atualizando Status!',
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

            Swal.fire({
                icon: 'success',
                title: 'Otimo!',
                text: 'O participante e seus números foram aprovados!',
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: false,
            }).then((result) => {
                location.reload();
            });
        }
    });
}
