function mostrarCuota() {

    var contenido = "";

    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "vista/pages/cuotas/cuotaV.php",
        success: function (datos) {
            contenido += datos;
        }
    });

    $("#contenido").html(contenido);
    $(".content-wrapper .content-header h1").html('Cargar Notas');


}
