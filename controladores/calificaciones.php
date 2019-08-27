<?php

//##########################################################################
//IMPORTACIONES
include_once '../includes/db.php';
//##########################################################################
//##########################################################################
//##########################################################################
//##########################################################################
//pregutamos si el metodo post pide que se cargue una lista de los cursos
if (isset($_POST['id_curso_seleccionado'])) {
    mostrarCalificacionesDelAlumno($_POST['id_curso_seleccionado']);
}

function mostrarCalificacionesDelAlumno($id_curso_seleccionado) {
    //inciamos session
    session_start();
    //instanciamos la conexion
    $conexion = new DB();
    //preparamos una consulta
    $query = $conexion->conectar()->prepare("SELECT c.modulo, c.puntaje,
        c.nota
    FROM alumnos a 
    JOIN calificaciones c
    ON c.id_alumno = a.id_alumno 
    WHERE a.id_cliente = " . $_SESSION["id_cliente"] . " "
            . "AND a.id_curso = " . $id_curso_seleccionado . "
    ORDER BY c.id_calificaciones ASC");
    //ejecutamos la consulta 
    $query->execute();

    //recorremos la lista
    if ($query->rowCount()) {
        foreach ($query as $fila) {
            echo "<tr>" // abre fila fila
            . "<td>" . $fila[0] . "</td>" //columna modulo
            . "<td>" . $fila[1] . "</td>" //columna puntaje
            . "<td>" . $fila[2] . "</td>" //columna calificacion
            . "<tr>"; //cierra fila
        }
    }
}

//##########################################################################
//##########################################################################
//##########################################################################
if (isset($_POST['id_alumno']) &&
        isset($_POST['nombre_curso']) &&
        isset($_POST['modulo']) &&
        isset($_POST['puntaje']) &&
        isset($_POST['nota'])) {

    guardarCalificacion($_POST['id_alumno'],
            $_POST['nombre_curso'],
            $_POST['modulo'],
            $_POST['puntaje'],
            $_POST['nota']);
}

function guardarCalificacion($id_alumno, $nombre_curso, $modulo,
        $puntaje, $nota) {
    $base = new DB();
    $query = $base->conectar()->prepare("INSERT INTO `calificaciones`
        ( `id_alumno`, `id_curso`, `modulo`, `puntaje`, `nota`, `activo`) 
        VALUES (:id_alumno,
        (SELECT id_curso FROM cursos WHERE descripcion = :nombre_curso ),
        :modulo ,:puntaje ,:nota, 1)");

    $query->execute([
        'id_alumno' => $id_alumno,
        'nombre_curso' => $nombre_curso,
        'modulo' => $modulo,
        'puntaje' => $puntaje,
        'nota' => $nota
    ]);
}

//##########################################################################
//##########################################################################
//##########################################################################
if (isset($_POST['id_alumno_listar']) &&
        isset($_POST['curso_listar'])) {

    cargarTablaCalificaciones($_POST['id_alumno_listar'],
            $_POST['curso_listar']);
}

function cargarTablaCalificaciones($id_alumno, $curso) {
    $conexion = new DB();
    //preparamos una consulta
    $query = $conexion->conectar()->prepare("SELECT ca.id_calificaciones, 
        ca.modulo, ca.puntaje, ca.nota
    FROM calificaciones ca 
    JOIN cursos cu 
    ON cu.id_curso = ca.id_curso
    WHERE ca.id_alumno =  :id_alumno and cu.descripcion = :curso and ca.activo = 1 ");
    //ejecutamos la consulta 
    $query->execute(['id_alumno' => $id_alumno, 'curso' => $curso]);

    //recorremos la lista
    if ($query->rowCount()) {
        foreach ($query as $fila) {
            echo "<tr>" // abre fila fila
            . "<th>" . $fila['id_calificaciones'] . "</th>" //columna modulo
            . "<td>" . $fila['modulo'] . "</td>" //columna puntaje
            . "<td>" . $fila['puntaje'] . "</td>" //columna calificacion
            . "<td>" . $fila['nota'] . "</td>" //columna calificacion
            . "<td>"
            . "<button class='btn btn-danger remover'>Remover</button>"
            . "<button class='btn btn-success editar'>Editar</button>"
            . "</td>" //columna calificacion
            . "<tr>"; //cierra fila
        }
    }
}

//##########################################################################
//##########################################################################
//##########################################################################
if (isset($_POST['id_calificacion_remover'])) {

    removerCalificacionPorID($_POST['id_calificacion_remover']);
}

function removerCalificacionPorID($id_calificacion) {
    $conexion = new DB();
    //preparamos una consulta
    $query = $conexion->conectar()->prepare("UPDATE calificaciones "
            . "SET activo = 0 WHERE id_calificaciones = :id");
    //ejecutamos la consulta 
    $query->execute(['id' => $id_calificacion]);
}

//############################################################################
//##################ACTUALIZACION DE CALIFICACION#############################
//############################################################################
if (isset($_POST['id_nota_a']) &&
        isset($_POST['modulo_a']) &&
        isset($_POST['puntaje_a']) &&
        isset($_POST['nota_a'])) {
    actualizarCalificacion(
            $_POST['id_nota_a'],
            $_POST['modulo_a'],
            $_POST['puntaje_a'],
            $_POST['nota_a']);
}

function actualizarCalificacion(
        $id_nota,
        $modulo,
        $puntaje,
        $nota) {
    $conexion = new DB();
    //preparamos una consulta
    $query = $conexion->conectar()->prepare("UPDATE calificaciones "
            . "SET modulo = :modulo, puntaje = :puntaje, nota = :nota"
            . " WHERE id_calificaciones = :id");
    //ejecutamos la consulta 
    $query->execute([
        'id' => $id_nota,
        'modulo' => $modulo,
        'puntaje' => $puntaje,
        'nota' => $nota
    ]);
//    echo $id_nota;
//    echo $modulo;
//    echo $puntaje;
//    echo $nota;
}
