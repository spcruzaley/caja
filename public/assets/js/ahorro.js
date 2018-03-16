jQuery(document).ready(function($) {
    ini();

    var selectSocio = jQuery('#socioId');
    var checkSemanaActual = jQuery('#checkSemanaActual');
    var registrar = jQuery("#botonRegistra");

    selectSocio.change(function () {
        cleanChecksSemanales();
        removeMessageResult();
        populateSemanas(selectSocio.val());
        showSemanasForm(checkSemanaActual);
    });

    checkSemanaActual.change(function () {
        showSemanasForm(checkSemanaActual);
    });

    registrar.click(function (e) {
        e.preventDefault();
        removeMessageResult();
        jQuery("#semana").prop('disabled', false);

        var formdata = jQuery("#formulario_registro_ahorro");

        jQuery.ajax({
            type        : "POST",
            url         : "/ahorro.php/registrar",
            data        : formdata.serialize(),
            success     : function(data){
                data = JSON.parse(data);

                var status = data['status'];
                var message = data['message'];
                var link = "<br /><a href='/socio.php/consultar/"+selectSocio.val()+"'><i>Detalles del socio...</i></a>";

                updateMessageResult(status, message+link);

                if(status === "success") {
                    populateSemanas(selectSocio.val());
                }
                jQuery("#semana").prop('disabled', true);
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

function showSemanasForm(obj) {
    if(obj.is(':checked')) {
        showSemana();
    } else {
        showSemanas();
    }
}

function populateSemanas(socioId) {
    jQuery.ajax({
        type: "POST",
        url: "/socio.php/consultar/"+socioId,

        success: function(data) {
            data = JSON.parse(data);

            jQuery('#cantidad').val(data['socio']['Cantidad']);

            if(data['ahorros']) {
                var ahorros = data['ahorros'];
                var semana = data['semanaActual'];

                jQuery('#semana').val(semana);
                for (var i = 0; i < ahorros.length; i++) {
                    jQuery('#checkSemana'+ahorros[i]['Semana']).prop('checked',true);
                    jQuery('#checkSemana'+ahorros[i]['Semana']).prop('disabled',true);
                }
            }
        }
    });
}

function cleanChecksSemanales() {
    for (var i = 1; i <= 40; i++) {
        jQuery('#checkSemana'+i).prop('checked',false);
        jQuery('#checkSemana'+i).prop('disabled',false);
    }
}

function ini() {
    hideAll();

    if(jQuery('#socioId').val() !== "") {
        if(jQuery('#checkSemanaActual').is(':checked')) {
            showSemana();
        } else {
            showSemanas();
        }
    }
}

function hideAll() {
    jQuery("#divCheckbox").hide();
    jQuery("#divSemana").hide();
    jQuery("#divSemanas").hide();
    jQuery("#divCantidad").hide();
    jQuery("#divButton").hide();
}

function showSemana() {
    jQuery("#divCheckbox").show();
    jQuery("#divSemana").show();
    // jQuery("#semana").prop('disabled', true);
    jQuery("#divSemanas").hide();
    jQuery("#divCantidad").show();
    jQuery("#divButton").show();
}

function showSemanas() {
    jQuery("#divCheckbox").show();
    jQuery("#divSemana").hide();
    // jQuery("#semana").prop('disabled', true);
    jQuery("#divSemanas").show();
    jQuery("#divCantidad").show();
    jQuery("#divButton").show();
}
