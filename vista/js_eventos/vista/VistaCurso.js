/**
 * funciones que permite cargar en una lista los cursos activos
 * @returns {undefined}
 */

function dameListaCursos(identidad){
    var contenido = "";

   $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "controladores/cursos.php",
        data: "lista_cursos=1",
        success: function (datos) {
            
            contenido = datos;
        }
    });

    $("#"+identidad).html(contenido);
}
function dameCusosDisponibles(identidad){
    var contenido = "";
    
   $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "controladores/cursos.php",
        data: "cursos_disponibles=1",
        success: function (datos) {
            contenido = datos;
        }
    });


    var json_datos = JSON.parse(contenido);
    var html = "";
    //primera opcion
    html += "<option value='0'>Selecciona un curso</option>";
    //completado de los cursos disponibles
    json_datos.map(function (curso) {
        html += `<option value='${curso.id_curso}'>${curso.descripcion}</option>`;
    });
//    console.log(html);

    $("#"+identidad).html(html);
}

function dameCusosalumno(identidad){
    var contenido = "";
    
   $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "controladores/cursos.php",
        data: "cursos_activos=1",
        success: function (datos) {
            contenido = datos;
        }
    });


    var json_datos = JSON.parse(contenido);
    var html = "";
    //primera opcion
    html += "<option value='0'>Selecciona un curso</option>";
    //completado de los cursos disponibles
    json_datos.map(function (curso) {
        html += `<option value='${curso.id_curso}'>${curso.descripcion}</option>`;
    });
//    console.log(html);

    $("#"+identidad).html(html);
}