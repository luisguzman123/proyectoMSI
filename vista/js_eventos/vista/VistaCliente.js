function guardarCliente(){
    var contenido = "";
    var arreglo = {
        "nombre" : $("#nombre").val(), 
        "apellido" : $("#apellido").val(),
        "cedula" : $("#cedula").val(),
        "ruc" : $("#ruc").val(),
        "direccion" : $("#direccion").val(),
        "telefono" : $("#telefono").val(),
        "celular" : $("#celular").val(),
        "nacionalidad" : $("#nacionalidad").val(),
        "id_ciudad" : $("#ciudad").val(),
        "fecha_nacimiento" : $("#fecha_nacimiento").val(),
        "usuario" : $("#usuario").val(),
        "pass" : $("#pass").val()
    };

    var s = JSON.stringify(arreglo);
    alert(s);
    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "controladores/cliente.php",
        data: "cliente_nuevo="+s,
        success: function (datos) {
            console.log(datos);
            alert("Datos guardados.");
            
        },error: function (jqXHR, textStatus, errorThrown) {
            console.log("Error en "+textStatus);
            
        },beforeSend: function (xhr) {
            //logo de cargando
        }
    });
    
}
function actualizarCliente(){
    var contenido = "";
    var arreglo = {
        "nombre" : $("#nombre_a").val(), 
        "apellido" : $("#apellido_a").val(),
        "cedula" : $("#cedula_a").val(),
        "ruc" : $("#ruc_a").val(),
        "direccion" : $("#direccion_a").val(),
        "telefono" : $("#telefono_a").val(),
        "celular" : $("#celular_a").val(),
        "nacionalidad" : $("#nacionalidad_a").val(),
        "id_ciudad" : $("#ciudad_a").val(),
        "fecha_nacimiento" : $("#fecha_nacimiento_a").val(),
        "usuario" : $("#usuario_a").val(),
        "pass" : $("#pass_a").val(),
        "id_cliente" : $("#id_alumno_ac").text()
    };

    var s = JSON.stringify(arreglo);
    
    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "controladores/cliente.php",
        data: "cliente_actualizar="+s,
        success: function (datos) {
            console.log(datos);
            alert("Datos actualizados.");
        },error: function (jqXHR, textStatus, errorThrown) {
            console.log("Error en "+textStatus);
            
        },beforeSend: function (xhr) {
            //logo de cargando
        }
    });
    
}
