function somarValorRifa(valor){
    var checkbox = $('input:checkbox[name^=btn-check]:checked').length;
    var valorTotal = valor * checkbox;

    $("#valorRifa").html('R$ '+valorTotal.toFixed(2));
}
