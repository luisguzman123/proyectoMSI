/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


// ##################################################################
// #####CARGA EL CONTENIDO, FORMULARIO, TABLAS PARA TIPO COMERCIO####
// ###################################################################
function cargarContenidoTipoComercio(){
    var contenido = "";

    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "vista/pages/referencial/TipoComercial.php",
        success: function (datos) {
            contenido = datos;
        }
    });
    
    $("#contenido").html(contenido);
    $(".content-wrapper .content-header h1").html('Tipo de Comerciales');
    cargarTablaTipos();
    
}
// ##################################################################
// ##############GUARDA EL NOMBRE  PARA TIPO COMERCIO################
// ###################################################################
function guardarTipoComercial(){
    
    //validaciones de nombre
    if($("#nombre_tipo").val().length <= 0){
        alert("Debes ingresar un nombre.");
        $("#nombre_tipo").focus();
    }
    //valivacion de checked
    if(!$("#check_activo").prop('checked')){
        alert("No puedes guardar un tipo de comercial con estado inactivo.");
        
    }
    
    var parametros = new FormData($("#formulario_tipo")[0]);
 
    
    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        contentType: false,
        processData: false,
        data:parametros,
        url: "controlador/ControladorTipoComercio.php",
        success: function (datos) {
            alert("Datos guardados correctamente");
            $("#nombre_tipo").val("");
            cargarTablaTipos();
        }
    });
    
    
}



// ###################################################################
// #########CARGAR UNA TABLA DE TIPO COMERCIAL ACTIVAS################
// ###################################################################
function cargarTablaTipos(){
    var contenido = "";

    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "controlador/ControladorTipoComercio.php",
        data: "dame_tabla_tipos=cargar",
        success: function (datos) {
            contenido = datos;
        }
    });
    
    $("#tabla_tipos").html(contenido);
} 

// ###################################################################
// ###########PREPARA LA ACTUALIZACION  UNA CIUDAD ###################
// ###################################################################

function prepararActualizarTipos(id){
    
    //mostramos los botones
    $("#actualizar_tipo").css('display', 'block');
    $("#cancelar_actualizar_tipo").css('display', 'block');
    $("#guadar_tipo").css('display', 'none');
    
    
    var nombre = "";
    $.ajax({
            type: "POST",
            async: false,
            cache: false,
            url: "controlador/ControladorTipoComercio.php",
            data: "dame_nombre_por_id="+id,
            success: function (datos) {
                
                nombre = datos;
            }
        });
    
    $("#nombre_tipo").val(nombre);
    $("#nombre_tipo").focus();
    $("#id_tipo").val(id);
}

// ###################################################################
// ###########CANCELA LA ACTUALIZACION  UNA TIPO CO ###################
// ###################################################################

function cancelarActualizarTipo(){
    
    //mostramos los botones
    $("#actualizar_tipo").css('display', 'none');
    $("#cancelar_actualizar_tipo").css('display', 'none');
    $("#guadar_tipo").css('display', 'block');
    $("#nombre_tipo").val("");
    $("#id_tipo").val("");
    
    
}


// ###################################################################
// ###########CANCELA LA ACTUALIZACION  UNA CIUDAD ###################
// ###################################################################

function actualizarTipo(){
    
    //mostramos los botones
    //validaciones de nombre
    if($("#nombre_tipo").val().length <= 0){
        alert("Debes ingresar un nombre.");
        $("#nombre_tipo").focus();
    }
    //valivacion de checked
    if(!$("#check_activo").prop('checked')){
        alert("No puedes guardar una ciudad con estado inactivo.");
        
    }
   
  
    $.ajax({
            type: "POST",
            async: false,
            cache: false,
            url: "controlador/ControladorTipoComercio.php",
            data: "nombre_tipo_a="+$("#nombre_tipo").val()+"&id_tipo="+$("#id_tipo").val(),
            success: function (datos) {
                alert("Actualizado correctamente");
                cargarTablaTipos();
                cancelarActualizarTipo();
            }
        });
    
}



// ###################################################################
// #################ELIMINA UN TIPO DE COMERCIO ######################
// ###################################################################

function eliminarTipo(id){
    
    var r = confirm("deseas eliminar el tipo de comercio");
    
    if(r){
        
        $.ajax({
            type: "POST",
            async: false,
            cache: false,
            url: "controlador/ControladorTipoComercio.php",
            data: "eliminar_tipo="+id,
            success: function (datos) {
                alert("Eliminador Correctamente");
                cargarTablaTipos()();
            }
        });
    }
    
}