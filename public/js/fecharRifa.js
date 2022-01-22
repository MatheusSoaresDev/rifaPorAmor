function confirmarfecharRifa(id)
{
    if (window.confirm("Tem certeza que deseja fechar essa rifa?")) {
        fecharRifa(id);
    }
}

function fecharRifa(id){
    $.ajax({
        type:'PATCH',
        dataType: 'json',
        url: '/fechar-rifa',
        data: {'id_rifa':id},
        beforeSend : function (){

        },
        error: function (xhr){
            alert('Houve um erro! Favor verifique a conexão!');
        },
        success: function(response){
            alert('Rifa fechada com sucesso!');

            location.reload();
        }
    });
}
