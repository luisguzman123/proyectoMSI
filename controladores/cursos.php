<?php

//##########################################################################
//IMPORTACIONES
include_once '../includes/db.php';
//##########################################################################
//##########################################################################
//##########################################################################
//##########################################################################
//pregutamos si el metodo post pide que se cargue una lista de los cursos
if (isset($_POST['lista_cursos'])) {
    listaCursosAlumno();
}

function listaCursos() {
    //iniciamos la sesion
    session_start();
    //instanciamos la conexion
    $conexion = new DB();
    //preparamos una consulta
    $query = $conexion->conectar()->prepare("SELECT cur.id_curso, cur.descripcion
    FROM clientes c 
    JOIN alumnos a 
    ON a.id_cliente = c.id_cliente
    JOIN cursos cur 
    ON cur.id_curso = a.id_curso 
    WHERE c.id_cliente = " . $_SESSION["id_cliente"]);
    //ejecutamos la consulta 
    $query->execute();

    //recorremos la lista
    echo "<option value='0' selected='selected'>Selecciona su curso</option>";
    if ($query->rowCount()) {
        foreach ($query as $fila) {
            echo "<option value='" . strval($fila[0]) . "'>"
            . $fila[1] . "</option>";
        }
    }
}

function listaCursosAlumno() {
    //iniciamos sesion para obtener el id del cliente
    session_start();
    //instanciamos la conexion
    $conexion = new DB();
    //preparamos una consulta

    $query = $conexion->conectar()->prepare("SELECT cur.id_curso, cur.descripcion 
        FROM clientes c 
        JOIN alumnos a 
        ON a.id_cliente = c.id_cliente 
        JOIN cursos cur 
        ON cur.id_curso =  a.id_curso 
        WHERE c.id_cliente = " . $_SESSION['id_cliente']);
    //ejecutamos la consulta 
    $query->execute();

    //recorremos la lista
    echo "<option value='0' selected='selected'>Selecciona su curso</option>";
    if ($query->rowCount()) {
        foreach ($query as $fila) {
            echo "<option value='" . strval($fila[0]) . "'>" . $fila[1] . "</option>";
        }
    }
}

//##########################################################################
//##########################################################################
//##########################################################################

if (isset($_POST['cursos_disponibles'])) {
    cursosDisponibles();
}

function cursosDisponibles() {
    $conexion = new DB();
    //preparamos una consulta

    $query = $conexion->conectar()->prepare("SELECT "
            . "id_curso, descripcion, costo_promocional, "
            . "costo_normal, contado, duracion, activo "
            . "FROM cursos WHERE activo = 1");
    
    $query->execute();
    
    if($query->rowCount()){
        $arreglo = array();
        foreach ($query as $fila) {
            array_push($arreglo, array(
                "id_curso" => $fila['id_curso'],
                "descripcion" => $fila['descripcion'],
                "costo_promocional" => $fila['costo_promocional'],
                "costo_normal" => $fila['costo_normal'],
                "contado" => $fila['contado'],
                "duracion" => $fila['duracion'],
                "activo" => $fila['activo']
            ));
        }
        echo json_encode($arreglo);
    }else{
        echo "0";
    }
}

/////////////////////////////// push /////////////////////////
if (isset($_POST['cursos_activos'])) {
    cursosactivos();
}
function cursosactivos() {
     session_start();
    //instanciamos la conexion
    $conexion = new DB();
    //preparamos una consulta

    $query = $conexion->conectar()->prepare("SELECT cur.id_curso, cur.descripcion 
        FROM clientes c 
        JOIN alumnos a 
        ON a.id_cliente = c.id_cliente 
        JOIN cursos cur 
        ON cur.id_curso =  a.id_curso 
        WHERE c.id_cliente = " . $_SESSION['id_cliente']);
    //ejecutamos la consulta 
    $query->execute();
    
    if($query->rowCount()){
        $arreglo = array();
        foreach ($query as $fila) {
            array_push($arreglo, array(
                "id_curso" => $fila['id_curso'],
                "descripcion" => $fila['descripcion'] 
            ));
        }
        echo json_encode($arreglo);
    }else{
        echo "0";
    }
}
