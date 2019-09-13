function cargarListaNacionalidad(identidad){
    var contenido = "";
    $.ajax({
        type: "POST",
        async: false,
        cache: false,
        url: "controladores/nacionalidad.php",
        data: "dame_todo=123",
        success: function (datos) {
            contenido = datos;
        }
    });
    
    
    
    if(contenido == "0"){
        $("#"+identidad).html("");
    }else{
        var json_data = JSON.parse(contenido);
        var valores =  "<option value='0'>Seleciona nacionalidad</option>";
        json_data.map(function (objeto) {
            (objeto.activo == 1 ) ?
            valores += `<option value='${objeto.id_nacionalidad}'>${objeto.descripcion}</option>` 
            : "";
        });
        $("#"+identidad).html(valores);
        
        
    }
}
