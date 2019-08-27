<?php

include_once '../includes/db.php';

if(isset($_POST['dame_todo'])){
    dameTodo();
}

function dameTodo(){
    $base_datos = new DB();
    $query = $base_datos->conectar()->prepare("SELECT id_ciudad, nombre, activo "
            . "FROM ciudades;");
    $query->execute();
    
    if($query->rowCount()){
        $arreglo = array();
        foreach ($query as $fila) {
            array_push($arreglo, array(
                "id_ciudad" => $fila['id_ciudad'],
                "nombre" => $fila['nombre'],
                "activo" => $fila['activo']
            ));
        }
        echo json_encode($arreglo);
    }else{
        echo "0";
    }
}
