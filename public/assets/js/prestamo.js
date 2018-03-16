jQuery(document).ready(function($) {
    removeMessageResult();

    var selectSocio = jQuery('#socioId');
    var registrar = jQuery("#botonRegistra");

    selectSocio.change(function () {
        removeMessageResult();
    });

    registrar.click(function (e) {
        e.preventDefault();
        removeMessageResult();

        var formdata = jQuery("#formulario_registro_prestamo");

        jQuery.ajax({
            type        : "POST",
            url         : "/prestamo.php/registrar",
            data        : formdata.serialize(),
            success     : function(data){
                data = JSON.parse(data);

                var status = data['status'];
                var message = data['message'];
                var link = "<br /><a href='/socio.php/consultar/"+selectSocio.val()+"'><i>Detalles del socio...</i></a>";

                updateMessageResult(status, message+link);
            },
            error: function(data) {
                console.log("Error al insertar ahorros");
            }
        });
    })
});

function updateMessageResult(status='', message='') {
    jQuery("#messageResult").addClass("alert alert-"+status);
    jQuery("#messageResult").append(message);
}

function removeMessageResult() {
    jQuery("#messageResult").removeClass();
    jQuery("#messageResult").html('');
}
