function confirmarReabrirRifa(id)
{
    if (window.confirm("Tem certeza que deseja reabrir essa rifa?")) {
        reabrirRifa(id);
    }
}

function reabrirRifa(id){
    $.ajax({
        type:'PATCH',
        dataType: 'json',
        url: '/reabrir-rifa',
        data: {'id_rifa':id},
        beforeSend : function (){

        },
        error: function (xhr){
            alert('Houve um erro! Favor verifique a conexão!');
        },
        success: function(response){
            alert('Rifa reaberta com sucesso!');

            location.reload();
        }
    });
}
