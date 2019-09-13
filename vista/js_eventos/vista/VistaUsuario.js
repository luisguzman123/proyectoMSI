// JavaScript Document


function validarUsuario() {

    var usuario = $('#usuario').val();
    var pass = $('#pass').val();
    if (usuario.length == 0) {
        alert("Debes ingresar un nombre de usuario");
        $('#usuario').focus();
        return;
    }

    if (pass.length == 0) {
        alert("Debes ingresar contraseña");
        $('#pass').focus();
        return;
    }

    var datos = "usuario=" + usuario + "&pass=" + pass;
    var respuesta = -1;
    $.ajax({
        type: "POST",
        async: false,
        cache: true,
        url: "../controlador/ControladorUsuario.php",
        data: datos,
        success: function (datos) {

            respuesta = datos;
        }
    });


    if (respuesta == 0) {
        window.location.href = "../";
    } else {
        alert("Verifique su usuario");
    }


}

function validarUsuarioAdministrador() {
    var usuario = $('#usuario').val();
    var pass = $('#pass').val();
    if (usuario.length == 0) {
        alert("Debes ingresar un nombre de usuario");
        $('#usuario').focus();
        return;
    }

    if (pass.length == 0) {
        alert("Debes ingresar contraseña");
        $('#pass').focus();
        return;
    }

    var datos = "usua=" + usuario + "&pass=" + pass + "&admin=1";
    var respuesta = -1;
    $.ajax({
        type: "POST",
        async: false,
        cache: true,
        url: "../controladores/ControladorUsuario.php",
        data: datos,
        success: function (datos) {

            respuesta = datos;
        }
    });

    if (respuesta == 0) {
        window.location.href = "administracion.php";
    } else {
        alert("Verifique su usuario");
    }


}

function dameNombreUsuario() {
    //cargamos el contenido de la tabla con ayuda de una peticion ajax

    var info = "";
    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "../controladores/ControladorUsuario.php",
        data: "nombre_usuario='hola'",

        success: function (datos) {

            info = datos;
            //$('.nombre_usuario').html(datos);
        }
    });
    $('.nombreu').html(info);
}

function cerrarSesion() {
    var info = "";
    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "../controladores/ControladorUsuario.php",
        data: "cerrar_sesion='hola'",

        success: function (datos) {

            info = datos;
            //$('.nombre_usuario').html(datos);
        }
    });
    if (info == 0) {
        location.href = "index.php"
    }
}

function validarUsuarioLink() {

    var datos = "validarlink=141";
    var respuesta = -1;
    $.ajax({
        type: "POST",
        async: false,
        cache: true,
        url: "../controladores/ControladorUsuario.php",
        data: datos,
        success: function (datos) {

            respuesta = datos;
        }
    });

    if (respuesta == 0) {
        alert("Usted no tiene permisos");
        window.location.href = "../login/";
    }
}





