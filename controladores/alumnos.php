<?php

include_once '../includes/db.php';

if (isset($_POST['nombre_alumno'])) {
    cargarTablaAlumnosPorNombre($_POST['nombre_alumno']);
}

function cargarTablaAlumnosPorNombre($nombre) {
    $base_datos = new DB();
    $nombre_mayuscula = strtoupper($nombre);

    $query = $base_datos->conectar()->prepare("SELECT 
    a.id_alumno,
    CONCAT(c.nombre,' ',c.apellido) as nombre_apellido,
    c.cedula,
    cur.descripcion
    FROM alumnos a
    JOIN clientes c 
    ON c.id_cliente = a.id_cliente
    JOIN cursos cur 
    ON cur.id_curso = a.id_curso
    WHERE UPPER(CONCAT(c.nombre,' ',c.apellido)) LIKE '%" . $nombre_mayuscula . "%'");
    $query->execute();

    if ($query->rowCount()) {
        foreach ($query as $fila) {
            echo "<tr>";
            echo "<th>" . $fila['id_alumno'] . "</th>";
            echo "<td>" . $fila['nombre_apellido'] . "</td>";
            echo "<td>" . $fila['cedula'] . "</td>";
            echo "<td>" . $fila['descripcion'] . "</td>";
            echo "<td>"
            . "<button type='button' "
            . "class='btn  btn-primary alumno_seleccionado' >Cargar Nota</button>"
            . " <button type='button' "
            . "class='btn  btn-warning alumno_listar' >Listar</button>"
            . "</td>";
            echo "</tr>";
        }
    } else {
        echo "No hay registros.";
    }
}

//###########################################################################
//###########################################################################
//###########################################################################

if (isset($_POST['cedula_b'])) {
    dameAlumnoPorCedula($_POST['cedula_b']);
}

function dameAlumnoPorCedula($cedula) {
    $base_datos = new DB();
    $query = $base_datos->conectar()->prepare("SELECT c.id_cliente, "
            . "c.nombre, c.apellido, c.ruc, c.cedula, "
            . "c.direccion, c.id_tipo_cliente, c.telefono,"
            . " c.celular, c.estado, c.id_nacionalidad, "
            . "c.id_ciudad, c.nro_domicilio, c.fecha_nacimiento, "
            . "c.usuario , c.pass , ciu.nombre as nombre_ciudad "
            . "FROM clientes c "
            . "JOIN ciudades ciu "
            . "ON ciu.id_ciudad = c.id_ciudad "
            . "WHERE c.cedula = :cedula LIMIT 1");
    $query->execute([
        "cedula" => $cedula
    ]);

    if ($query->rowCount()) {
        $arreglo = array();
        foreach ($query as $fila) {
            array_push($arreglo, array(
                "id_cliente" => $fila['id_cliente'],
                "nombre" => $fila['nombre'],
                "apellido" => $fila['apellido'],
                "ruc" => $fila['ruc'],
                "cedula" => $fila['cedula'],
                "direccion" => $fila['direccion'],
                "id_tipo_cliente" => $fila['id_tipo_cliente'],
                "telefono" => $fila['telefono'],
                "celular" => $fila['celular'],
                "estado" => $fila['estado'],
                "id_nacionalidad" => $fila['id_nacionalidad'],
                "id_ciudad" => $fila['id_ciudad'],
                "nro_domicilio" => $fila['nro_domicilio'],
                "fecha_nacimiento" => $fila['fecha_nacimiento'],
                "usuario" => $fila['usuario'],
                "pass" => $fila['pass'],
                "nombre_ciudad" => $fila['nombre_ciudad']
            ));
        }
        echo json_encode($arreglo);
    } else {
        echo "0";
    }
}

//######################################################################
//######################################################################
//######################################################################
//#####################################################################

if (isset($_POST['id_cliente'])) {
    dameRegistrosPorIdCliente($_POST['id_cliente']);
}

function dameRegistrosPorIdCliente($id_cliente) {
    $base_datos = new DB();
    $query = $base_datos->conectar()->prepare("SELECT a.id_alumno,
    c.descripcion as nombre_curso
    FROM alumnos a
    JOIN cursos c 
    ON c.id_curso = a.id_curso
    WHERE a.id_cliente = :id_cliente and a.activo = 1");

    $query->execute([
        "id_cliente" => $id_cliente
    ]);

    if ($query->rowCount()) {
        $arreglo = array();
        foreach ($query as $fila) {
            array_push($arreglo, array(
                "id_alumno" => $fila['id_alumno'],
                "nombre_curso" => $fila['nombre_curso']
            ));
        }
        echo json_encode($arreglo);
    } else {
        echo "0";
    }
}

//###########################################################################
//###########################################################################
//###########################################################################
if (isset($_POST['id_cliente_g']) &&
        isset($_POST['id_curso_g'])) {
    guardar($_POST['id_cliente_g'], $_POST['id_curso_g']);
}

function guardar($id_cliente, $id_curso) {
    $base_datos = new DB();
    $query = $base_datos->conectar()->prepare("
        INSERT INTO alumnos
        (id_cliente, id_curso, id_sucursal, activo) 
        VALUES ( :id_cliente , :id_curso , :id_sucursal , :activo  )");
    $query->execute([
        "id_cliente" => $id_cliente,
        "id_curso" => $id_curso,
        "id_sucursal" => 1,
        "activo" => 1
    ]);
    
}
//###########################################################################
//###########################################################################
//###########################################################################
if (isset($_POST['id_alumno_r'])) {
    remover($_POST['id_alumno_r']);
}

function remover($id_alumno) {
    $base_datos = new DB();
    $query = $base_datos->conectar()->prepare("UPDATE alumnos SET activo = 0 "
            . "WHERE id_alumno = :id_alumno ");
    
    $query->execute([
        "id_alumno" => $id_alumno
    ]);
    
}
