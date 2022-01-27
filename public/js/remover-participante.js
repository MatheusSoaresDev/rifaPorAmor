function confirmarRemoverParticipante(id)
{
    Swal.fire({
        title: 'Atenção!',
        html: "Tem certeza que deseja remover esse usuário? <br>Após removido o numero escolhido ficará disponivel novamente!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim. Remover usuário',
        cancelButtonText: 'Cancelar',
    }).then((result) => {
        if (result.isConfirmed) {
            removerParticipante(id);
        }
    });
}

function removerParticipante(id){
    $.ajax({
        type:'DELETE',
        dataType: 'json',
        url: '/remove-part',
        data: {'id':id},
        beforeSend : function (){
            Swal.fire({
                title: 'Removendo',
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
        success: function(response){
            Swal.close();
            Swal.fire({
                icon: 'success',
                title: 'Otimo!',
                text: 'Rifa deletada com sucesso!',
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: false,
            }).then((result) => {
                location.reload();
            });
        }
    });
}
