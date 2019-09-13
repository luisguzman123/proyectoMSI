<?php
if(isset($_POST['dame_cuota'])){
    dameCuota();
}

function dameCuota(){
    session_start();
    $base_datos = new DB();
    $query = $base_datos->conectar()->prepare("SELECT 
CONCAT(c.nombre, ' ',c.apellido) as cliente,
a.nombre as curso,
cd.nro_cuota,
cd.fecha_vencimiento,
cd.fecha_pagada,
cd.saldo


FROM clientes c 

JOIN ventas_cabeceras vc 
ON vc.id_cliente = c.id_cliente

JOIN ventas_detalles vd 
ON vd.id_venta_cabecera =  vc.id_venta_cabecera

JOIN articulos a 
ON a.id_articulos = vd.id_articulo

JOIN cuentas_recibir_cabecera cc
ON cc.id_venta_detalle = vc.id_venta_cabecera

JOIN cuentas_recibir_detalle cd 
ON cd.id_cuenta_recibir_cabecera = cc.id_cuenta_recibir_cabecera

WHERE c.id_cliente = ". $_SESSION["id_cliente"]." AND a.id_articulos = :id_articulos");
    $query->execute();
    
    if($query->rowCount()){
        $arreglo = array();
        foreach ($query as $fila) {
            array_push($arreglo, array(
                "cliente" => $fila['cliente'],
                "curso" => $fila['curso'],
                "nro_cuota" => $fila['nro_cuota'],
                "fecha_vencimiento" => $fila['fecha_vencimiento'],
                "fecha_pagada" => $fila['fecha_pagada'],
                "saldo" => $fila['saldo']
                
            ));
        }
        echo json_encode($arreglo);
    }else{
        echo "0";
    }
}


