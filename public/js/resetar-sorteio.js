function confirmarResetarSorteio(idRifa)
{
    Swal.fire({
        title: 'Atenção',
        text: "Tem deseja que deseja resetar o sorteio",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Resetar'
    }).then((result) => {
        if (result.isConfirmed) {
            resetarSorteio(idRifa);
        }
    })
}

function resetarSorteio(idRifa){
    $.ajax({
        type:'PATCH',
        dataType: 'json',
        url: '/rifa/reset/'+idRifa,
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
            Swal.fire({
                title: 'Otimo!',
                icon: 'success',
                text: 'O sorteio foi resetado. Faça o sorteio novamente!',
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: false,
                confirmButtonText: 'OK <i class="fa fa-arrow-right"></i>',
            }).then((result) => {
                location.reload();
            });
        }
    });
}
