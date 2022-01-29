function confirmarSortearVencedor(idRifa)
{
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
        url: '/rifa/sortear/'+id,
        beforeSend : function (){

        },
        error: function (xhr){
            Swal.fire({
                icon: 'error',
                title: 'Ops!',
                text: 'Erro. Verifique a sua conexão!'
            });
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
                inputPlaceholder: 'Deseja informa o vencedor?',
                confirmButtonText: 'OK <i class="fa fa-arrow-right"></i>',
            }).then((result) => {
                location.reload();
            });

            if (accept) {
                alert("teste");
            }
        }
    });
}
