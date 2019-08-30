

function mostrarCargarNota() {

    var contenido = "";

    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "vista/pages/academico/cargarNota.php",
        success: function (datos) {
            contenido += datos;
        }
    });

    $("#contenido").html(contenido);
    $(".content-wrapper .content-header h1").html('Cargar Notas');


}


$(document).on("click", ".alumno_seleccionado", function (event) {
    var tr = $(this).closest('tr');
    var id = $(tr).find("th").text();
    $("#id_alumno").text(id);

    $(tr).each(function () {
        var tds = $(this).find("td");
        var nombre = tds.filter(":eq(0)").text();
        var cedula = tds.filter(":eq(1)").text();
        var curso = tds.filter(":eq(2)").text();

        $("#nombre_alumno_seleccionado").text(nombre);
        $("#cedula_alumno").text(cedula);
        $("#curso_alumno").text(curso);
    });


    $("#modal-alumno").modal("show");

});

$(document).on("click", ".remover", function (event) {

    var r = confirm("Desea remover el modulo?");
    if (!r) {
        return;
    }

    var tr = $(this).closest('tr');
    var id = $(tr).find("th").text();

    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "controladores/calificaciones.php",
        data: "id_calificacion_remover=" + id,
        success: function (datos) {
            alert("Removido correctamente");
            var contenido = "";

            $.ajax({
                type: "POST",
                async: false,
                cache: false,
                url: "controladores/calificaciones.php",
                data: "id_alumno_listar=" + $("#id_alumno_listar").text() +
                        "&curso_listar=" + $("#curso_alumno_listar").text(),
                success: function (datos) {

                    contenido = datos;
                }
            });

            $("#tabla-listar").html(contenido);

        }
    });


});




$(document).on("click", ".alumno_listar", function (event) {
    var tr = $(this).closest('tr');
    var id = $(tr).find("th").text();
    $("#id_alumno_listar").text(id);

    $(tr).each(function () {
        var tds = $(this).find("td");
        var nombre = tds.filter(":eq(0)").text();
        var cedula = tds.filter(":eq(1)").text();
        var curso = tds.filter(":eq(2)").text();
//        console.log(nombre);
//        console.log(cedula);
//        console.log(curso);

        $("#nombre_alumno_seleccionado_listar").text(nombre);
        $("#cedula_alumno_listar").text(cedula);
        $("#curso_alumno_listar").text(curso);

        //cargamos la tabla de calificaciones
        var contenido = "";

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

    });


    $("#modal-listar").modal("show");

});

$(document).on("click", ".editar", function (event) {
    var nombre = $("#nombre_alumno_seleccionado_listar").text();
    var cedula = $("#cedula_alumno_listar").text();
    var id_alumno = $("#id_alumno_listar").text();
    var curso = $("#curso_alumno_listar").text();

    $("#nombre_alumno_actualizar").text(nombre);
    $("#cedula_actualizar").text(cedula);
    $("#id_alumno_actualizar").text(id_alumno);
    $("#curso_alumno_actualizar").text(curso);

    var tr = $(this).closest('tr');
    var id = $(tr).find("th").text();

    $("#id_nota").text(id);

    $(tr).each(function () {
        var tds = $(this).find("td");
        var modulo = tds.filter(":eq(0)").text();
        var puntaje = tds.filter(":eq(1)").text();
        var nota = tds.filter(":eq(2)").text();

        $("#modulo_a").val(modulo);
        $("#puntaje_a").val(puntaje);
        $("#nota_a").val(nota);
        $("#modulo_a").focus();
    });

    $("#modal-actualizar").modal("show");
});

//                          ASIGNAR CURSO
//#############################################################################
//#############################################################################
//#############################################################################
//#############################################################################
//#############################################################################

function mostrarAsignarCurso() {

    var contenido = "";

    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "vista/pages/academico/asignarCurso.php",
        success: function (datos) {
            contenido += datos;
        }
    });

    $("#contenido").html(contenido);
    $(".content-wrapper .content-header h1").html('Asignar Curso');
    $("#bloque_cursos").css("display", "none");
    $("#tabla_bloque").css("display", "none");



}

function dameAlumnoPorCedula() {

    if (!validarCampoDeTextoID("cedula_b",
            "Debes ingresar un número de cedula"))
        return;

    var cedula = $("#cedula_b").val();

    cedula = cedula.replace('.', '');
    cedula = cedula.replace('.', '');
    cedula = cedula.replace('.', '');
    cedula = cedula.replace('.', '');
    cedula = cedula.replace('.', '');
    cedula = cedula.replace('.', '');
    cedula = cedula.replace('.', '');
    cedula = cedula.replace('.', '');

    var contenido = "";

    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "controladores/alumnos.php",
        data: "cedula_b=" + cedula,
        success: function (datos) {

            console.log(datos);
            contenido = datos;


        }
    });


    if (contenido == "0") {
        alert("No existe alumno");
    } else {

        var json_datos = JSON.parse(contenido);
        console.log(json_datos);

        //funcion para recorrer resultados de json
        json_datos.map(function (alumno) {
            $("#id_cliente").text(alumno.id_cliente);
            $("#nombre_apellido").text(`${alumno.nombre} ${alumno.apellido}`);
            $("#ciudad").text(alumno.nombre_ciudad);
        });

        dameCusosDisponibles("cursos_disponibles");
        $("#bloque_cursos").css("display", "block");
        cargarTablaCursos();
        $("#tabla_bloque").css("display", "block");

    }

}

function cargarTablaCursos() {
    var contenido = "";

    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "controladores/alumnos.php",
        data: "id_cliente=" + $("#id_cliente").text(),
        success: function (datos) {

            console.log(datos);
            contenido = datos;


        }
    });


    if (contenido == "0") {
//        alert("No existe alumno");
    } else {

        var json_datos = JSON.parse(contenido);
//        console.log(json_datos);
        var tabla = "";

        //funcion para recorrer resultados de json
        json_datos.map(function (data) {
            tabla += "<tr>";
            tabla += "<th>" + data.id_alumno + "</th>";
            tabla += "<td>" + data.nombre_curso + "</td>";
            tabla += "<td> \n\
            <button class='btn btn-danger remover_alumno'>Remover</button>";
            tabla += "</tr>";

        });

        $("#tabla_cursos").html(tabla);


    }
}


function agregarCurso() {
    if (!confirm("Desea agregar el curso?")) {
        return;
    }

    var id_curso = $("#cursos_disponibles").val();

    if (id_curso == "0") {
        alert("Debes seleccionar un curso");
        return;
    }

    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "controladores/alumnos.php",
        data: "id_cliente_g=" + $("#id_cliente").text() + "&id_curso_g=" + id_curso,
        success: function (datos) {
            console.log(datos);
            cargarTablaCursos();
            alert("Curso agregado.");



        }
    });



}



$(document).on("click", ".remover_alumno", function (evt) {
    var tr = $(this).closest('tr');
    var id = $(tr).find("th").text();

    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "controladores/alumnos.php",
        data: "id_alumno_r=" + id,
        success: function (datos) {
            alert("Curso removido.");
            cargarTablaCursos();



        }
    });

});

//##############################################################################
//##############################################################################
//##############################NUEVO ALUMNO###################################
//##############################################################################
function mostrarNuevoAlumno() {

    var contenido = "";

    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "vista/pages/academico/nuevoAlumno.php",
        success: function (datos) {
            contenido += datos;
        }
    });

    $("#contenido").html(contenido);
    $(".content-wrapper .content-header h1").html('Nuevo Alumno');


    cargarListaNacionalidad("nacionalidad");
    cargarListaCiudad("ciudad");
}


//EVENTO DE TECLADO SOBRE NOMBRE BUSCAR

$(document).on("keyup", "#nombre_buscar", function (evt) {
    var resultado = "";
    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "controladores/cliente.php",
        data: "cliente_nombre_b=" + $(this).val(),
        success: function (datos) {
//            console.log(datos);
            resultado = datos;
        }
    });

    if (resultado == "0") {
        $("#alumnos_resultado").html("");
    } else {
        var json_datos = JSON.parse(resultado);
        var tabla = "";
        json_datos.map(function (data) {
            tabla += "<tr>";
            tabla += `<th>${data.id_cliente}</th>`;
            tabla += `<td>${data.nombre} ${data.apellido}</td>`;
            tabla += `<td>${data.cedula}</td>`;
            tabla += `<td>${data.telefono}</td>`;
            tabla += `<td><button class='btn btn-warning editar_alumno'>Editar</button> 
    <button class='btn btn-danger remover_alumno'>Remover</button></td>`;
            tabla += "</tr>";
        });
        $("#alumnos_resultado").html(tabla);

    }
});
//EVENTO DE TECLADO SOBRE CEDULA BUSCAR

$(document).on("keyup", "#cedula_buscar", function (evt) {
//    console.log(evt.keyCode);
    if (evt.keyCode == 13) {
        var resultado = "";
        $.ajax({
            type: "POST",
            async: false,
            cache: false,
            url: "controladores/cliente.php",
            data: "cliente_cedula_b=" + $(this).val(),
            success: function (datos) {
//            console.log(datos);
                resultado = datos;
            }
        });

        if (resultado == "0") {
            $("#alumnos_resultado").html("");
        } else {
            var json_datos = JSON.parse(resultado);
            var tabla = "";
            json_datos.map(function (data) {
                tabla += "<tr>";
                tabla += `<th>${data.id_cliente}</th>`;
                tabla += `<td>${data.nombre} ${data.apellido}</td>`;
                tabla += `<td>${data.cedula}</td>`;
                tabla += `<td>${data.telefono}</td>`;
                tabla += `<td><button class='btn btn-warning editar_alumno'>Editar</button> 
    <button class='btn btn-danger remover_alumno'>Remover</button></td>`;
                tabla += "</tr>";
            });
            $("#alumnos_resultado").html(tabla);

        }
    }

});

$(document).on("click", ".editar_alumno", function (evt) {
    var tr = $(this).closest("tr");
    var id = $(tr).find("th").text();

    var resultado = "";
    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "controladores/cliente.php",
        data: "id_cliente_b=" + id,
        success: function (datos) {
//                console.log(datos);
            resultado = datos;
        }
    });
    
    if(resultado == "0"){
        //error
    }else{
        //cargamos las listas
        cargarListaCiudad("ciudad_a");
        cargarListaNacionalidad("nacionalidad_a");
        var json_datos = JSON.parse(resultado);
        
        json_datos.map(function (c) {
            //seleccionamos la ciudad del cliente
            $("#ciudad_a option[value='"+c.id_ciudad+"']").attr("selected", true);
            //selecciona la nacionalidad de la lista
            $("#nacionalidad_a option[value='"+c.id_nacionalidad+"']").attr("selected", true);
            $("#nombre_a").val(c.nombre);
            $("#apellido_a").val(c.apellido);
            $("#cedula_a").val(c.cedula);
            $("#ruc_a").val(c.ruc);
            $("#direccion_a").val(c.direccion);
            $("#telefono_a").val(c.telefono);
            $("#celular_a").val(c.celular);
            $("#usuario_a").val(c.usuario);
            $("#pass_a").val(c.pass);
            $("#fecha_nacimiento_a").val(c.fecha_nacimiento);
            $("#id_alumno_ac").text(id);
            
        });
        $("#modal-editar").modal("show");
    }

});
