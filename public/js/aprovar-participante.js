async function aprovarParticipante(idRifa) {
    /*Swal.fire({
        title: 'Buscando informações.',
        html: 'Aguarde...',
        allowEscapeKey: false,
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading()
        }
    });*/

    //swal.close();

    const {value: formValues} = await Swal.fire({
        title: 'Multiple inputs',
        html:
            '<form method="" action="">' +
                '<input class="checkpart" type="checkbox" name="teste[]" value="tes1">' +
                '<label for="scales">Teste1</label>' +
                '<input class="checkpart" type="checkbox" name="teste[]" value="tes2">' +
                '<label for="scales">Teste2</label>' +
            '</form>',
        focusConfirm: false,
        preConfirm: () => {
            var checks = $("input:checkbox:checked.checkpart");
            var listId = [];

            for(i=0; i<checks.length; i++){
                listId.push(checks[i].defaultValue);
            }

            pegaIds(listId);
        }
    })

    if (formValues) {
        //Swal.fire(JSON.stringify(formValues))
        console.log(formValues);
    }
}

function pegaIds(ids){
    console.log(ids);
}
