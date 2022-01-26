function buscarNumerosAprovados(idRifa, emailPart){
    var listID = [];

    $.ajax({
        type:'GET',
        dataType: 'json',
        url: '/busca-numeros',
        data: {'id': idRifa, 'email': emailPart, 'status': 0},
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
