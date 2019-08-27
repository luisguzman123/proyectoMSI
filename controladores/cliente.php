<?php

include_once '../includes/db.php';

if (isset($_POST['cliente_nuevo'])) {
    guardar($_POST['cliente_nuevo']);
}

function guardar($nuevo_cliente) {

    $json_datos = json_decode($nuevo_cliente, true);
    
    $base_datos = new DB();
    $query = $base_datos->conectar()->prepare("INSERT INTO `clientes`("
            . " `nombre`, "
            . "`apellido`,"
            . " `ruc`, "
            . "`cedula`,"
            . " `direccion`, "
            . " `telefono`, "
            . "`celular`, "
            . "`estado`, "
            . "`id_nacionalidad`,"
            . " `id_ciudad`, "
            . "`nro_domicilio`, "
            . "`fecha_nacimiento`, "
            . "`usuario`, "
            . "`pass`) VALUES ( :nombre , :apellido , :ruc , :cedula , :direccion , "
            . " :telefono , :celular , :estado , :id_nacionalidad , :id_ciudad , "
            . " :nro_domicilio , :fecha_nacimiento , :usuario , :pass );");
    $query->execute([
        "nombre" => $json_datos['nombre'],
        "apellido" => $json_datos['apellido'],
        "ruc" => $json_datos['ruc'],
        "cedula" => $json_datos['cedula'],
        "direccion" => $json_datos['direccion'],
        "telefono" => $json_datos['telefono'],
        "celular" => $json_datos['celular'],
        "estado" => 1,
        "id_nacionalidad" => $json_datos['nacionalidad'],
        "id_ciudad" => $json_datos['id_ciudad'],
        "nro_domicilio" => 0,
        "fecha_nacimiento" => $json_datos['fecha_nacimiento'],
        "usuario" => $json_datos['usuario'],
        "pass" => md5($json_datos['pass'])
    ]);
}
//#############################################################################
//#############################################################################
//#############################################################################
//#############################################################################
if (isset($_POST['cliente_actualizar'])) {
    actualizar($_POST['cliente_actualizar']);
}

function actualizar($cliente) {

    $json_datos = json_decode($cliente, true);
    
    $base_datos = new DB();
    $query = $base_datos->conectar()->prepare("UPDATE `clientes` SET "
            . " `nombre` = :nombre , "
            . "`apellido` = :apellido ,"
            . " `ruc` = :ruc , "
            . "`cedula` = :cedula ,"
            . " `direccion` = :direccion , "
            . " `telefono` = :telefono , "
            . "`celular` = :celular , "
            . "`estado` = :estado , "
            . "`id_nacionalidad` = :id_nacionalidad ,"
            . " `id_ciudad` = :id_ciudad , "
            . "`nro_domicilio` = :nro_domicilio , "
            . "`fecha_nacimiento` = :fecha_nacimiento , "
            . "`usuario` = :usuario , "
            . "`pass` = :pass  "
            . "WHERE id_cliente = :id_cliente ");
    $query->execute([
        "nombre" => $json_datos['nombre'],
        "apellido" => $json_datos['apellido'],
        "ruc" => $json_datos['ruc'],
        "cedula" => $json_datos['cedula'],
        "direccion" => $json_datos['direccion'],
        "telefono" => $json_datos['telefono'],
        "celular" => $json_datos['celular'],
        "estado" => 1,
        "id_nacionalidad" => $json_datos['nacionalidad'],
        "id_ciudad" => $json_datos['id_ciudad'],
        "nro_domicilio" => 0,
        "fecha_nacimiento" => $json_datos['fecha_nacimiento'],
        "usuario" => $json_datos['usuario'],
        "pass" => md5($json_datos['pass']),
        "id_cliente" => $json_datos['id_cliente']
    ]);
}
//#############################################################################
//#############################################################################
//#############################################################################
//#############################################################################
if (isset($_POST['cliente_nombre_b'])) {
    buscarClientePorNombre($_POST['cliente_nombre_b']);
}

function buscarClientePorNombre($nombre) {

    $base_datos = new DB();
    $nombre = strtoupper($nombre);
    $query = $base_datos->conectar()->prepare("SELECT c.id_cliente, 
        c.nombre, c.apellido, c.telefono, c.cedula
        FROM clientes c 
        WHERE UPPER(CONCAT(c.nombre, ' ' ,c.apellido))  LIKE '%".$nombre."%' "
            . "LIMIT 10");
    $query->execute();
    
    if($query->rowCount()){
        $arreglo = array();
        foreach ($query as $fila) {
            array_push($arreglo, array(
                'id_cliente' => $fila['id_cliente'],
                'nombre' => $fila['nombre'],
                'apellido' => $fila['apellido'],
                'telefono' => $fila['telefono'],
                'cedula' => $fila['cedula'],
            ));
        }
        echo json_encode($arreglo);
    }else{
        echo "0";
    }
    
}
if (isset($_POST['cliente_cedula_b'])) {
    buscarClientePorCedula($_POST['cliente_cedula_b']);
}

function buscarClientePorCedula($cedula) {

    $base_datos = new DB();
    $query = $base_datos->conectar()->prepare("SELECT c.id_cliente, 
        c.nombre, c.apellido, c.telefono, c.cedula
        FROM clientes c 
        WHERE c.cedula = :cedula ");
    $query->execute(["cedula" => $cedula]);
    
    if($query->rowCount()){
        $arreglo = array();
        foreach ($query as $fila) {
            array_push($arreglo, array(
                'id_cliente' => $fila['id_cliente'],
                'nombre' => $fila['nombre'],
                'apellido' => $fila['apellido'],
                'telefono' => $fila['telefono'],
                'cedula' => $fila['cedula'],
            ));
        }
        echo json_encode($arreglo);
    }else{
        echo "0";
    }
    
}
//#############################################################################
//#############################################################################
//#############################################################################
//#############################################################################

if (isset($_POST['id_cliente_b'])) {
    buscarClientePorID($_POST['id_cliente_b']);
}

function buscarClientePorID($id_cliente) {

    $base_datos = new DB();
    $query = $base_datos->conectar()->prepare("SELECT "
            . " `id_cliente`, "
            . " `nombre`, "
            . "`apellido`,"
            . " `ruc`, "
            . "`cedula`,"
            . " `direccion`, "
            . " `telefono`, "
            . "`celular`, "
            . "`estado`, "
            . "`id_nacionalidad`,"
            . " `id_ciudad`, "
            . "`nro_domicilio`, "
            . "`fecha_nacimiento`, "
            . "`usuario`, "
            . "`pass` FROM clientes WHERE id_cliente = :id_cliente "
            );
    
    $query->execute([
        "id_cliente" => $id_cliente
    ]);
    
    if($query->rowCount()){
        $arreglo = array();
        foreach ($query as $fila) {
            array_push($arreglo, array(
                'id_cliente' => $fila['id_cliente'],
                'nombre' => $fila['nombre'],
                'apellido' => $fila['apellido'],
                'telefono' => $fila['telefono'],
                'cedula' => $fila['cedula'],
                'ruc' => $fila['ruc'],
                'direccion' => $fila['direccion'],
                'celular' => $fila['celular'],
                'estado' => $fila['estado'],
                'id_nacionalidad' => $fila['id_nacionalidad'],
                'id_ciudad' => $fila['id_ciudad'],
                'nro_domicilio' => $fila['nro_domicilio'],
                'fecha_nacimiento' => $fila['fecha_nacimiento'],
                'usuario' => $fila['usuario'],
                'pass' => $fila['pass']
            ));
        }
        echo json_encode($arreglo);
    }else{
        echo "0";
    }
    
}



