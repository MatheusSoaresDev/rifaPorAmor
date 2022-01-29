function confirmarfecharRifa(id)
{
    Swal.fire({
        title: 'Atenção!',
        html: "Tem certeza que deseja fechar essa rifa? <br>Ao fazer isso, não será mais possivel receber participantes!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim. Fechar esta rifa!',
        cancelButtonText: 'Cancelar',
    }).then((result) => {
        if (result.isConfirmed) {
            fecharRifa(id);
        }
    });
}

function fecharRifa(id){
    $.ajax({
        type:'PATCH',
        dataType: 'json',
        url: '/rifa/close/'+id,
        beforeSend : function (){

        },
        error: function (xhr){
            Swal.fire({
                icon: 'error',
                title: 'Ops!',
                text: 'Erro. Verifique a sua conexão!'
            });
        },
        success: function(response){
            Swal.fire({
                icon: 'success',
                title: 'Otimo!',
                text: 'A rifa foi fechada com sucesso!',
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: false,
            }).then((result) => {
                location.reload();
            });
        }
    });
}
