<?php

class UsuarioActivo{
    private $nombre;
    private $cedula;
    private $id_cliente;
    
    function getNombre() {
        return $this->nombre;
    }

    function getCedula() {
        return $this->cedula;
    }

    function getId_cliente() {
        return $this->id_cliente;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setCedula($cedula) {
        $this->cedula = $cedula;
    }

    function setId_cliente($id_cliente) {
        $this->id_cliente = $id_cliente;
    }




    
}

