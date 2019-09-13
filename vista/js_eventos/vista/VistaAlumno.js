

function buscarAlumno() {
    var contenido = "";
    var nombre = $('#nombre_alumno').val();
    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "controladores/alumnos.php",
        data: "nombre_alumno=" + nombre,
        success: function (datos) {
            
            contenido = datos;
        }
    });

    $("#tabla_alumnos").html(contenido);
}