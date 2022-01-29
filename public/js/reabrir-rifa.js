function confirmarReabrirRifa(id)
{
    Swal.fire({
        title: 'Atenção!',
        html: "Tem certeza que deseja reabrir essa rifa? <br>Ao fazer isso, a rifa passará a aceitar novos participantes!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim. Reabrir esta rifa!',
        cancelButtonText: 'Cancelar',
    }).then((result) => {
        if (result.isConfirmed) {
            reabrirRifa(id);
        }
    });
}

function reabrirRifa(id){
    $.ajax({
        type:'PATCH',
        dataType: 'json',
        url: '/rifa/reopen/'+id,
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
                text: 'A rifa foi reaberta com sucesso!',
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: false,
            }).then((result) => {
                location.reload();
            });
        }
    });
}
