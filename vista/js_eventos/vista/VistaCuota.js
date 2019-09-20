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
function verCuotas() {
    var contenido = "";

    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "controladores/cuotas.php",
        data: "dame_cuota=" + $("#lista_cuotas").val(),
        success: function (datos) {

            console.log(datos);
            contenido = datos;


        }
    });


    if (contenido == "0") {
    } else {

        var total = 0;
        var json_datos = JSON.parse(contenido);
        var tabla = "";

        json_datos.map(function (data) {
            tabla += "<tr>";
            tabla += "<td>" + data.nro_cuota + "</td>";
            tabla += "<td>" + data.fecha_vencimiento + "</td>";
            if (data.fecha_pagada == null) {

                tabla += "<td>-</td>";
            } else {

                tabla += "<td>" + data.fecha_pagada + "</td>";
            }
            tabla += "<td>" + formatearNumero(data.saldo) + "</td>";
            tabla += "</tr>";
            total += data.saldo;

        });

        $("#tabla_cuotas").html(tabla);
        $("#total_pagar").text(formatearNumero(total));


    }
}
