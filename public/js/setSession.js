function setSession(name) {
    $.ajax({
        type:'POST',
        dataType: 'json',
        url: '/set-session',
        data: {"name" : name},
        beforeSend : function (){

        },
        error: function (response){

        },
        success: function(response){

        }
    });

}
