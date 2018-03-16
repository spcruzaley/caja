jQuery(document).ready(function($) {
    ini();

    var selectSocio = jQuery('#socioId');
    var selectPrestamo = jQuery('#prestamoId');
    var radioTipoAbono = jQuery('#tipoAbono');
    var registrar = jQuery("#botonRegistra");

    selectSocio.change(function () {
        ini();
        var socioId = selectSocio.val();

        jQuery.ajax({
            type        : "POST",
            url         : "/socio.php/consultar/"+socioId,

            success     : function(data){
                data = JSON.parse(data);
                var prestamos = getPrestamosConDeuda(data);
                cleanPrestamosSelect();
                populatePrestamosSelect(prestamos);
            },
            error: function(data) {
                console.log("Error al obtener prestamos");
            }
        });
    });

    selectPrestamo.change(function () {
        disableTipoAbono(false);
        setInteres(selectPrestamo);
    });

    radioTipoAbono.click(function (e) {
        validaTipoAbono();
        disableButton(false);
    });

    registrar.click(function (e) {
        e.preventDefault();
        removeMessageResult();
        var formdata = jQuery("#formulario_registro_abono");
        validaTipoAbono
        validaTipoAbonoParaRegistro();

        jQuery.ajax({
            type        : "POST",
            url         : "/abono.php/registrar",
            data        : formdata.serialize(),
            success     : function(data){
                data = JSON.parse(data);

                var status = data['status'];
                var message = data['message'];
                var link = "<br /><a href='/socio.php/consultar/"+selectSocio.val()+"'><i>Detalles del socio...</i></a>";

                validaTipoAbonoParaRegistro(false);
                updateMessageResult(status, message+link);
            },
            error: function(data) {
                console.log("Error al insertar ahorros");
            }
        });
    })
});

function ini() {
    disableSelectPrestamo();
    disableTipoAbono();
    disableInteres();
    disableCapital();
    disableButton();
    disableComment();
    removeMessageResult();
}

function updateMessageResult(status='', message='') {
    jQuery("#messageResult").addClass("alert alert-"+status);
    jQuery("#messageResult").append(message);
}

function removeMessageResult() {
    jQuery("#messageResult").removeClass();
    jQuery("#messageResult").html("");
}

function validaTipoAbono(enableInteres = false) {
    var tipoAbono = jQuery('input[name=tipoAbono]:checked').val();
    disableComment(false);

    if(tipoAbono === "capital") {
        disableInteres();
        disableCapital(false);
    } else if(tipoAbono === "interes") {
        disableInteres(false);
        disableCapital();
    }
}

function validaTipoAbonoParaRegistro(initial = true) {
    var tipoAbono = jQuery('input[name=tipoAbono]:checked').val();

    if(tipoAbono === "interes") {
        jQuery('#capital').attr("disabled", initial);
        jQuery('#interes').attr("disabled", !initial);
    }
}

function setInteres(selectPrestamo) {
    var cantidad = selectPrestamo
                        .children("option")
                        .filter(":selected")
                        .attr("Cantidad");

    var porcentajeInteres = selectPrestamo
                        .children("option")
                        .filter(":selected")
                        .attr("porcentaje");

    var interes = ((porcentajeInteres/100) * cantidad);
    jQuery("#interes").val(interes);
}

function getPrestamosConDeuda(data) {
    var prestamos = data['prestamos'];
    var prestamosArray = [];
    var abonos = data['abonos'];
    var prestamo = null;
    var abono = null;
    var prestamosActivos;
    var abonosPrestamo;
    var abonosCount;
    var cont = 0;

    if(prestamos) {
        for (var i = 0; i < prestamos.length; i++) {
            prestamo = prestamos[i];

            abonosCount = 0;
            abonosPrestamo = 0;

            if(abonos) {
                for (var j = 0; j < abonos.length; j++) {
                    abono = abonos[j];
                    if(abono.PrestamoId == prestamo.Id && abono.Capital > 0) {
                        abonosCount += abono.Capital;
                    }
                }
            }

            abonosPrestamo = prestamo.Cantidad - abonosCount;

            if(abonosPrestamo > 0) {
                var prestamosActualizados = {};

                prestamosActualizados['Id'] = prestamo.Id;
                prestamosActualizados['Cantidad'] = prestamo.Cantidad;
                prestamosActualizados['adeudo'] = abonosPrestamo;
                prestamosActualizados['porcentajeInteres'] = prestamo.Interes;

                prestamosArray[cont++] = prestamosActualizados;
            }
        }
    } else {
        updateMessageResult("info", "El socio no cuenta con prestamos");
    }

    return prestamosArray;
}

function populatePrestamosSelect(prestamos) {
    disableSelectPrestamo(false);

    if(prestamos.length > 0) {
        jQuery.each(prestamos, function (key, value) {
            jQuery("#prestamoId")
                    .append(jQuery("<option></option>")
                    .attr("porcentaje",value['porcentajeInteres'])
                    .attr("cantidad",value['Cantidad'])
                    .attr("value",value['Id'])
                    .text("Prestamo: "+value['Cantidad']+" | adeudo: "+value['adeudo']+" | interes: "+value['porcentajeInteres']+" %"));
        });
    } else {
        disableSelectPrestamo();
    }
}

function cleanPrestamosSelect() {
    jQuery("#prestamoId")
            .html(jQuery("<option></option>")
            .attr("value","")
            .text("Seleccionar prestamo..."));
}

function disableSelectPrestamo(disabled = true) {
    if(disabled) {
        jQuery("#prestamoId").hide();
        jQuery("#prestamoId").attr("disabled", true);
    } else {
        jQuery("#prestamoId").show();
        jQuery("#prestamoId").attr("disabled", false);
    }
}

function disableTipoAbono(disabled = true) {
    //Simula un click, para resolver los reload con F5
    jQuery("#tipoAbono").click();

    if(disabled) {
        jQuery("#tipoAbono").hide();
        jQuery("#tipoAbono").attr("disabled", true);
    } else {
        jQuery("#tipoAbono").show();
        jQuery("#tipoAbono").attr("disabled", false);
    }
}

function disableInteres(disabled = true) {
    var divInteres = jQuery('#divCantidadInteres');

    if(disabled) {
        divInteres.hide();
    } else {
        divInteres.show();
    }
}

function disableCapital(disabled = true) {
    var divCapital = jQuery('#divCantidadCapital');

    if(disabled) {
        divCapital.hide();
        divCapital.attr("disabled", true);
        jQuery("#capital").val("");
    } else {
        divCapital.show();
        divCapital.attr("disabled", false);
    }
}

function disableButton(disabled = true) {
    if(disabled) {
        jQuery("#botonRegistra").hide();
    } else {
        jQuery("#botonRegistra").show();
    }
}

function disableComment(disabled = true) {
    if(disabled) {
        jQuery("#divComentario").hide();
        jQuery("#comentario").val("");
    } else {
        jQuery("#divComentario").show();
    }
}
