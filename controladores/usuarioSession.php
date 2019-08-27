<?php

include_once 'includes/db.php';

class UsuarioSession{
    
    public function __construct() {
        session_start();
    }
    
    public function  existeUsuario($usuario, $pass){
        
        //conversor  a md5
        $passMD5 = md5($pass);
        //instancia de la clase BD para conexiones con la base de datos
        $db = new DB();

        //preparamos la sentencia a ser ejecutada
        $query = $db->conectar()->prepare("SELECT CONCAT(nombre, ' ', apellido) as"
                . " nombre,"
                . "id_cliente, cedula FROM clientes WHERE usuario = :usuario "
                . "and pass = :pass;");
        //agregamos los valores a la consulta mediante la ayuda de un diccionario
        $query->execute(['usuario' => $usuario, 'pass' => $passMD5]);
        
        if($query->rowCount()){
            
            foreach ($query as $user) {
                $_SESSION['nombre_apellido'] = $user['nombre'];
                $_SESSION['id_cliente'] = $user['id_cliente'];
                $_SESSION['cedula'] = $user['cedula'];
                
                return true;
            }
        }else{
            return false;
        }
                
    }
    
    public function  usuarioLogeado(){
        if(isset($_SESSION['id_cliente'])){
            return true;
        }else{
            return false;
        }
    }
    
    public function  getNombre(){
        return $_SESSION['nombre_apellido'];
    }
    
    public function  getIdCliente(){
        return $_SESSION['id_cliente'];
    }
    public function  getCedula(){
        return $_SESSION['cedula'];
    }
    
//##############################################################################
//##############################################################################
//##############################PARA ADMINISTRADORES#######################
//##############################################################################
//##############################################################################
    
    public function existeAdmin($usuario, $pass){
        
        //conversor  a md5
        $passMD5 = md5($pass);
        //instancia de la clase BD para conexiones con la base de datos
        $db = new DB();

        //preparamos la sentencia a ser ejecutada
        $query = $db->conectar()->prepare("SELECT nombre_apellido,"
                . "id_usuario FROM usuario WHERE nombre = :usuario "
                . "and clave = :pass;");
        //agregamos los valores a la consulta mediante la ayuda de un diccionario
        $query->execute(['usuario' => $usuario, 'pass' => $passMD5]);
        
        if($query->rowCount()){
            
            foreach ($query as $user) {
                $_SESSION['nombre_apellido_admin'] = $user['nombre_apellido'];
                $_SESSION['id_usuario'] = $user['id_usuario'];
                
                return true;
            }
        }else{
            return false;
        }
    }
    
    /**
     * 
     * @return boolean
     */
    public function  adminLogeado(){
        if(isset($_SESSION['id_usuario'])){
            return true;
        }else{
            return false;
        }
    }
    
    public function  getNombreAdmin(){
        return $_SESSION['nombre_apellido_admin'];
    }
    
    public function  getIdAdmin(){
        return $_SESSION['id_usuario'];
    }
    
    
}
