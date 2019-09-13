// ###################################################################
// #########CARGAR UNA LISTA CON LOS NOMBRES DE LAS CIUDADES##########
// ###################################################################

function CargarCiudad() {
    
    var contenido = "";

    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "controlador/ControladorCiudad.php",
        data: "dame_todo=1",
        success: function (datos) {
            contenido += datos;
        }
    });
    
    $(".contenedor-option").html(contenido);
    

}

// ###################################################################
// ########CARGA EL CONTENIDO, FORMULARIO, TABLAS PARA CIUDADES#######
// ###################################################################
function cargarContenidoCiudad(){
    var contenido = "";

    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "vista/pages/referencial/ciudad.php",
        success: function (datos) {
            contenido = datos;
        }
    });
    
    $("#contenido").html(contenido);
    $(".content-wrapper .content-header h1").html('Ciudades');
    cargarTablaCiudades();
}


// ###################################################################
// #########GUARDA UNA CIUDAD EN LA BASE DE DATOS VALIDANDO###########
// ###################################################################

function guardarCiudad() {
    
    
    //validaciones de nombre
    if($("#nombre_ciudad").val().length <= 0){
        alert("Debes ingresar un nombre.");
        $("#nombre_ciudad").focus();
    }
    //valivacion de checked
    if(!$("#check_activo").prop('checked')){
        alert("No puedes guardar una ciudad con estado inactivo.");
        
    }
    
    var parametros = new FormData($("#formulario_ciudad")[0]);
 
    
    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        contentType: false,
        processData: false,
        data:parametros,
        url: "controlador/ControladorCiudad.php",
        success: function (datos) {
            alert("Ciudad guardada correctamente");
            $("#nombre_ciudad").val("");
            
        }
    });
    cargarTablaCiudades();

}

// ###################################################################
// #########CARGAR UNA TABLA DE CIUDADES ACTIVAS#####################
// ###################################################################
function cargarTablaCiudades(){
    var contenido = "";

    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "controlador/ControladorCiudad.php",
        data: "dame_tabla_ciudad=cargar",
        success: function (datos) {
            contenido = datos;
        }
    });
    
    $("#lista_ciudades_tabla").html(contenido);
} 

// ###################################################################
// ###ELIMINA UNA CIUDAD DE LA LISTA CAMBIANDO EL ESTADO ACTIVO#######
// ###################################################################

function eliminarCiudad(id){
    
    var r = confirm("deseas eliminar esta ciudads");
    
    if(r){
        
        $.ajax({
            type: "POST",
            async: false,
            cache: false,
            url: "controlador/ControladorCiudad.php",
            data: "eliminar_ciudad="+id,
            success: function (datos) {
                alert("Eliminador Correctamente");
                cargarTablaCiudades();
            }
        });
    }
    
}


// ###################################################################
// ###########PREPARA LA ACTUALIZACION  UNA CIUDAD ###################
// ###################################################################

function prepararActualizar(id){
    
    //mostramos los botones
    $("#actualizar_ciudad").css('display', 'block');
    $("#cancelar_actualizar").css('display', 'block');
    $("#guadar_ciudad").css('display', 'none');
    
    var nombre = "";
    $.ajax({
            type: "POST",
            async: false,
            cache: false,
            url: "controlador/ControladorCiudad.php",
            data: "dame_nombre_por_id="+id,
            success: function (datos) {
                nombre = datos;
            }
        });
    
    $("#nombre_ciudad").val(nombre);
    $("#nombre_ciudad").focus();
    $("#id_ciudad").val(id);
}

// ###################################################################
// ###########CANCELA LA ACTUALIZACION  UNA CIUDAD ###################
// ###################################################################

function cancelarActualizar(){
    
    //mostramos los botones
    $("#actualizar_ciudad").css('display', 'none');
    $("#cancelar_actualizar").css('display', 'none');
    $("#guadar_ciudad").css('display', 'block');
    $("#nombre_ciudad").val("");
    $("#id_ciudad").val("");
    
    
}
// ###################################################################
// ###########CANCELA LA ACTUALIZACION  UNA CIUDAD ###################
// ###################################################################

function actualizarCiudad(){
    
    //mostramos los botones
    //validaciones de nombre
    if($("#nombre_ciudad").val().length <= 0){
        alert("Debes ingresar un nombre.");
        $("#nombre_ciudad").focus();
    }
    //valivacion de checked
    if(!$("#check_activo").prop('checked')){
        alert("No puedes guardar una ciudad con estado inactivo.");
        
    }
   
    
    $.ajax({
            type: "POST",
            async: false,
            cache: false,
            url: "controlador/ControladorCiudad.php",
            data: "nombre_ciudad="+$("#nombre_ciudad").val()+"&id_ciudad="+$("#id_ciudad").val(),
            success: function (datos) {
                alert("Actualizado correctamente");
                cargarTablaCiudades();
                cancelarActualizar();
            }
        });
    
}


//#############################################################################
//#############################################################################
//#############################################################################
//#############################################################################

function cargarListaCiudad(identidad){
    var contenido = "";
    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "controladores/ciudad.php",
        data: "dame_todo=123",
        success: function (datos) {
            contenido = datos;
        }
    });
    
    
    
    if(contenido == "0"){
        $("#"+identidad).html("");
    }else{
        var json_data = JSON.parse(contenido);
        var valores =  "<option value='0'>Seleciona una ciudad</option>";
        json_data.map(function (objeto) {
            (objeto.activo == 1 ) ? valores += `<option value='${objeto.id_ciudad}'>${objeto.nombre}</option>` : "";
        });
        $("#"+identidad).html(valores);
        
        
    }
}

