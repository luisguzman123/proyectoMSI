/**
 * mostramos la pagina visualizar al usuario
 * @returns {undefined}
 */
function mostrarPagina() {

    var contenido = "";

    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "vista/pages/calificaciones/visualizar.php",
        success: function (datos) {
            contenido += datos;
        }
    });

    $("#contenido").html(contenido);
    $(".content-wrapper .content-header h1").html('Calificaciones Personales');
    dameListaCursos("lista_cursos");

}

//function  verNotas() {
//
//   
//    var id_curso = $("#lista_cursos").val();
//    alert(id_curso);
//    $.ajax({
//        type: "POST",
//        async: false,
//        cache: false,
//        url: "controladores/cursos.php",
//        data: "lista_cursos=1",
//        success: function (datos) {
//
//            contenido = datos;
//        }
//    });
//
//    $("#").html(contenido);
//}

function verNotas() {


    var id_curso = $("#lista_cursos").val();
    var contenido = "";

    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "controladores/calificaciones.php",
        data: "id_curso_seleccionado=" + id_curso,
        success: function (datos) {

            contenido = datos;
        }
    });

    $("#tabla_calificaciones").html(contenido);

}

function guardarCalificacion() {
    var id_alumno = $("#id_alumno").text();
    var nombre_curso = $("#curso_alumno").text();

    var modulo = $("#modulo").val();
    if ($("#modulo").val().length == 0) {
        alert("Ingrese módulo");
        $("#modulo").focus();
        return;
    }

    var puntaje = $("#puntaje").val();
    if (puntaje.length == 0) {
        alert("Ingrese un puntaje");
        $("#puntaje").focus();
        return;
    }

    var puntaje_n = parseInt(puntaje);
    if (puntaje_n <= 0 || puntaje > 100) {
        alert("El puntaje no se encuentra en el rango.\n\
        El rango es de 1 a 100.");
        $("#puntaje").focus();
        return;
    }

    var nota = $("#nota").val();
    if (nota.length == 0) {
        alert("Ingrese una nota");
        $("#nota").focus();
        return;
    }

    var nota_n = parseInt(nota);
    if (nota_n <= 0 || nota_n > 5) {
        alert("La nota no se encuentra en el rango.\n\
        El rango es de 1 a 5.");
        $("#nota").focus();
        return;
    }


    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "controladores/calificaciones.php",
        data: "id_alumno=" + id_alumno + "&nombre_curso=" + nombre_curso
                + "&modulo=" + modulo + "&puntaje=" + puntaje + "&nota=" + nota,
        success: function (datos) {
            alert("Guardado Correctamente");
            $("#modulo").val("");
            $("#puntaje").val("1");
            $("#nota").val("1");

        }
    });

}


function actualizarCalificacion() {
    var modulo = $("#modulo_a").val();
    if ($("#modulo_a").val().length == 0) {
        alert("Ingrese módulo");
        $("#modulo_a").focus();
        return;
    }

    var puntaje = $("#puntaje_a").val();
    if (puntaje.length == 0) {
        alert("Ingrese un puntaje");
        $("#puntaje_a").focus();
        return;
    }

    var puntaje_n = parseInt(puntaje);
    if (puntaje_n <= 0 || puntaje > 100) {
        alert("El puntaje no se encuentra en el rango.\n\
        El rango es de 1 a 100.");
        $("#puntaje_a").focus();
        return;
    }

    var nota = $("#nota_a").val();
    if (nota.length == 0) {
        alert("Ingrese una nota");
        $("#nota_a").focus();
        return;
    }

    var nota_n = parseInt(nota);
    if (nota_n <= 0 || nota_n > 5) {
        alert("La nota no se encuentra en el rango.\n\
        El rango es de 1 a 5.");
        $("#nota_a").focus();
        return;
    }

//    console.log("id_nota_a="+$("#id_nota").text()+
//                "&modulo_a="+modulo+
//                "&puntaje_a="+puntaje+
//                "&nota_a="+nota);
    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "controladores/calificaciones.php",
        data: "id_nota_a=" + $("#id_nota").text() +
                "&modulo_a=" + modulo +
                "&puntaje_a=" + puntaje +
                "&nota_a=" + nota,
        success: function (datos) {
//            console.log(datos);
            alert("Actualizado Correctamente");
            $("#modulo").val("");
            $("#puntaje").val("1");
            $("#nota").val("1");

            //cerramos el modal
            $("#modal-actualizar").modal("hide");


            //cargamos la tabla de calificaciones
            var contenido = "";

            var id = $("#id_alumno_listar").text();
            var curso = $("#curso_alumno_listar").text();
            
            $.ajax({
                type: "POST",
                async: false,
                cache: false,
                url: "controladores/calificaciones.php",
                data: "id_alumno_listar=" + id + "&curso_listar=" + curso,
                success: function (datos) {

                    contenido = datos;
                }
            });

            $("#tabla-listar").html(contenido);
        }
    });
}
