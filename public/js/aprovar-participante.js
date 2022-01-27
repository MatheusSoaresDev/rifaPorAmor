function buscarNumeros(idRifa, emailPart, funcao){ // Retorna tanto os numeros aprovados quanto reprovados.
    var listID = [];
    var status;

    if(funcao === 'aprovar'){
        status = 0;
    } else if(funcao === 'reprovar'){
        status = 1;
    }

    $.ajax({
        type:'GET',
        dataType: 'json',
        url: '/busca-numeros',
        data: {'id': idRifa, 'email': emailPart, 'status': status},
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
            listarNumerosRifaSwal(response, funcao);
        }
    });
}


async function listarNumerosRifaSwal(numerosEscolhidos, funcao) {
    var listcheck;
    var mensagem;
    var checked;

    if(funcao === 'aprovar'){
        mensagem = "O usuário tem os seguintes números que não foram aprovados. Selecione os que deseja aprovar!";
        checked = 'checked';
    } else if(funcao === 'reprovar'){
        mensagem = "O usuário tem os seguintes números que já foram aprovados. Selecione os que deseja reprovar!";
        checked = '';
    }

    for(i=0; i<numerosEscolhidos.length; i++){
        var input = '<div class="form-check" style="text-align: left; margin-left: 10px; line-height: 1.4">' +
            '<input class="form-check-input" type="checkbox" value="'+ numerosEscolhidos[i].id +'" id="flexCheckDefault" '+checked+'>' +
            '<label class="form-check-label" for="flexCheckDefault"># '+ numerosEscolhidos[i].numeroEscolhido +'</label>' +
            '</div>';

        if(i===0){
            listcheck = input;
        } else {
            listcheck = listcheck + input;
        }
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
    /*if (formValues) {
        Swal.fire(JSON.stringify(formValues))
        console.log(formValues);
    }*/
}

function atualizaStatusParticipantes(idList, funcao){
    var acao;

    if(funcao === 'aprovar'){
        acao = 'aprovados';

    } else if (funcao === 'reprovar'){
        acao = 'reprovados';
    }

    $.ajax({
        type:'PATCH',
        dataType: 'json',
        url: '/atualiza-status-participantes',
        data: {idList, 'funcao': funcao},
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
                text: 'Os números selecionados foram '+acao+'!',
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: false,
            }).then((result) => {
                location.reload();
            });
        }
    });
}
