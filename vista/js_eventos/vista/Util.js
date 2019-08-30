function validarCampoDeTextoID(id, mensaje) {
    //validaciones de nombre
    if ($("#" + id + "").val().length <= 0) {
        alert(mensaje);
        $("#" + id + "").focus();
        $("#" + id + "").parent().addClass("has-error");

        $("#" + id + "").keypress(function () {
            $("#" + id + "").parent().removeClass("has-error");
        });
        return false;
    }
    return true;
}

function validarListaDesplegableID(id, mensaje) {
    //validaciones de nombre
    if ($("#" + id + "").val() == null) {
        alert(mensaje);
        $("#" + id + "").focus();
        $("#" + id + "").parent().addClass("has-error");

        $("#" + id + "").click(function () {
            $("#" + id + "").parent().removeClass("has-error");
        });
        return false;
    }
    return true;
}



/**
 * Funcion que devuelve un numero separando los separadores de miles
 * Puede recibir valores negativos y con decimales
 */
function formatearNumero(numero) {
    // Variable que contendra el resultado final
    var resultado = "";

    // Si el numero empieza por el valor "-" (numero negativo)
    if (numero[0] == "-")
    {
        // Cogemos el numero eliminando los posibles puntos que tenga, y sin
        // el signo negativo
        nuevoNumero = numero.replace(/\./g, '').substring(1);
    } else {
        // Cogemos el numero eliminando los posibles puntos que tenga
        nuevoNumero = numero.replace(/\./g, '');
    }

    // Si tiene decimales, se los quitamos al numero
    if (numero.indexOf(",") >= 0)
        nuevoNumero = nuevoNumero.substring(0, nuevoNumero.indexOf(","));

    // Ponemos un punto cada 3 caracteres
    for (var j, i = nuevoNumero.length - 1, j = 0; i >= 0; i--, j++)
        resultado = nuevoNumero.charAt(i) + ((j > 0) && (j % 3 == 0) ? "." : "") + resultado;

    // Si tiene decimales, se lo añadimos al numero una vez forateado con 
    // los separadores de miles
    if (numero.indexOf(",") >= 0)
        resultado += numero.substring(numero.indexOf(","));

    if (numero[0] == "-")
    {
        // Devolvemos el valor añadiendo al inicio el signo negativo
        return "-" + resultado;
    } else {
        return resultado;
    }
}

function dameFechaActual(id_componente){
    var fecha = new Date();
    var dia = fecha.getDate();
    var mes = fecha.getMonth() + 1;
    var anio = fecha.getFullYear();
    
    $("#"+id_componente).attr("value", dia+"-"+mes+"-"+anio);
    
}

function formatearFecha(fecha){
    
    var dia = fecha.getDate() + 1;
    var mes = fecha.getMonth() + 1;
    var anio = fecha.getFullYear();
    return  dia+"-"+mes+"-"+anio;
}

function quitarDecimalesConvertir(num){
    var numer = num.replace(/\./g, '');
    var nuevo_n = parseInt(numer);
    return nuevo_n;
}