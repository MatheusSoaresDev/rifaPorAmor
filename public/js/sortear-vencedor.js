function confirmarSortearVencedor(idRifa)
{
    /*if (window.confirm("")) {
        sortearVencedor(idRifa);
    }*/

    Swal.fire({
        title: 'Atenção',
        text: "Tem deseja que deseja sortear o vencedor?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Sortear'
    }).then((result) => {
        if (result.isConfirmed) {
            sortearVencedor(idRifa);
        }
    })
}

function sortearVencedor(idRifa){
    $.ajax({
        type:'PATCH',
        dataType: 'json',
        url: '/sortear-vencedor',
        data: {'id_rifa': idRifa},
        beforeSend : function (){

        },
        error: function (xhr){
            alert("Erro! Verifique sua conexão!")
        },
        success: async function (response) {
            const {value: accept} = await Swal.fire({
                title: 'Temos um vencedor!!!',
                html: 'A rifa vencedora foi o número: ' + response.numeroEscolhido +
                    '<div>' +
                    '<br>Nome: ' + response.nome +
                    '<br>Email: ' + response.email +
                    '<br>Contato: ' + response.contato +
                    '</div>',
                imageUrl: '../img/victoria-justice.gif',
                imageWidth: 400,
                imageAlt: 'Victoria Justice',
                input: 'checkbox',
                inputValue: 1,
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: false,
                inputPlaceholder:
                    'Deseja informa o vencedor?',
                confirmButtonText:
                    'OK <i class="fa fa-arrow-right"></i>',
            });

            if (accept) {
                alert("teste");
            }

            /*alert(");*/
            //location.reload();
        }
    });
}
