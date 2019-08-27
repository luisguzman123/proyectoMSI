<?php

include_once '../includes/db.php';

if(isset($_POST['dame_todo'])){
    dameTodo();
}

function dameTodo(){
    $base_datos = new DB();
    $query = $base_datos->conectar()->prepare("SELECT id_nacionalidad, descripcion, activo "
            . "FROM nacionalidades;");
    $query->execute();
    
    if($query->rowCount()){
        $arreglo = array();
        foreach ($query as $fila) {
            array_push($arreglo, array(
                "id_nacionalidad" => $fila['id_nacionalidad'],
                "descripcion" => $fila['descripcion'],
                "activo" => $fila['activo']
            ));
        }
        echo json_encode($arreglo);
    }else{
        echo "0";
    }
}
