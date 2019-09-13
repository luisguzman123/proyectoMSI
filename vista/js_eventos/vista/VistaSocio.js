// Contenido Agregar Socio

function AgregarSocio() {

    var contenido = "";

    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "vista/pages/socio/socio.php",
        success: function (datos) {
            contenido += datos;
        }
    });

    $("#contenido").html(contenido);
    $(".content-wrapper .content-header h1").html('Socio');
    CargarCiudad();
    CargarTablaSocio();
}

function CargarTablaSocio() {

    var contenido = "";

    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "controlador/ControladorUsuario.php",
        data: "lista=1",
        success: function (datos) {
            contenido += datos;
        }
    });

    $("#lista-socio-tabla").html(contenido);

}

function GuardarDatosSocio() {

    if ($("#nombre_socio").val().length <= 0) {
        alert("Debes ingresar un nombre.");
        $("#nombre_socio").focus();
        $("#nombre_socio").parent().addClass("has-error");

        $("#nombre_socio").keypress(function () {
            $("#nombre_socio").parent().removeClass("has-error");
        });
        return;
    }

    if ($("#apellido_socio").val().length <= 0) {
        alert("Debes ingresar un apellido.");
        $("#apellido_socio").focus();
        $("#apellido_socio").parent().addClass("has-error");

        $("#apellido_socio").keypress(function () {
            $("#apellido_socio").parent().removeClass("has-error");
        });
        return;
    }

    if ($("#direccion_socio").val().length <= 0) {
        alert("Debes ingresar una dirección.");
        $("#direccion_socio").focus();
        $("#direccion_socio").parent().addClass("has-error");

        $("#direccion_socio").keypress(function () {
            $("#direccion_socio").parent().removeClass("has-error");
        });
        return;
    }

    if ($("#telefono_socio").val().length <= 0) {
        alert("Debes ingresar un teléfono.");
        $("#telefono_socio").focus();
        $("#telefono_socio").parent().addClass("has-error");

        $("#telefono_socio").keypress(function () {
            $("#telefono_socio").parent().removeClass("has-error");
        });
        return;
    }

    if ($("#cedula_socio").val().length <= 0) {
        alert("Debes ingresar una cédula.");
        $("#cedula_socio").focus();
        $("#cedula_socio").parent().addClass("has-error");

        $("#cedula_socio").keypress(function () {
            $("#cedula_socio").parent().removeClass("has-error");
        });
        return;
    }

    if ($("#edad_socio").val().length <= 0) {
        alert("Debes ingresar una edad.");
        $("#edad_socio").focus();
        $("#edad_socio").parent().addClass("has-error");

        $("#edad_socio").keypress(function () {
            $("#edad_socio").parent().removeClass("has-error");
        });
        return;
    }

    if ($("#ciudad_socio").val() == null) {
        alert("Debes ingresar una ciudad.");
        $("#ciudad_socio").focus();
        $("#ciudad_socio").parent().addClass("has-error");

        $("#ciudad_socio").click(function () {
            $("#ciudad_socio").parent().removeClass("has-error");
        });
        return;
    }

    if ($("#usuario_socio").val().length <= 0) {
        alert("Debes ingresar un usuario.");
        $("#usuario_socio").focus();
        $("#usuario_socio").parent().addClass("has-error");

        $("#usuario_socio").keypress(function () {
            $("#usuario_socio").parent().removeClass("has-error");
        });
        return;
    }

    if ($("#usuario_socio").val().length <= 0) {
        alert("Debes ingresar un usuario.");
        $("#usuario_socio").focus();
        $("#usuario_socio").parent().addClass("has-error");

        $("#usuario_socio").keypress(function () {
            $("#usuario_socio").parent().removeClass("has-error");
        });
        return;
    }

    var caract = new RegExp(/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i);
    var correo = $("#correo_socio").val();

    if (caract.test(correo) == false) {
        alert('correo inválido');
        $("#correo_socio").focus();
        $("#correo_socio").parent().addClass("has-error");

        $("#correo_socio").focusin(function () {
            $("#correo_socio").keyup(function () {

                if ($("#correo_socio").val().length <= 0) {
                    $("#correo_socio").parent().removeClass("has-error");
                }
            });
        });
        return;
    }
    
    if ($("#contra_socio").val().length <= 0) {
        alert("Debes ingresar una contraseña.");
        $("#contra_socio").focus();
        $("#contra_socio").parent().addClass("has-error");

        $("#contra_socio").keypress(function () {
            $("#contra_socio").parent().removeClass("has-error");
        });
        return;
    }
    
    if (document.getElementById("foto_socio").files.length == 0) {
        alert('no se selecciono ninguna foto');
        $("#foto_socio").focus();
        return;
    }

    var parametros = new FormData($("#form-agregar-socio")[0]);

    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        contentType: false,
        processData: false,
        data: parametros,
        url: "controlador/ControladorUsuario.php",
        success: function (datos) {
            alert("Socio guardado correctamente");
        }
    });

    AgregarSocio();
}