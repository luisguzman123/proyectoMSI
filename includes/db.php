<?php

Class DB {
    //variables o atributos de la clase
    private $host;
    private $usuario;
    private $pass;
    private $base_de_datos;
    private $charset;
    
    public function __construct() {
        $this->host = 'localhost';
        $this->base_de_datos = 'alumnos';
        $this->usuario = 'root';
        $this->pass = '';
        $this->charset = 'utf8mb4';  
    }
    
    public function  conectar(){
       
        try{
            
            $connection = "mysql:host=" . $this->host .
                    ";dbname=" . $this->base_de_datos . 
                    ";charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES=> false,
            ];
           
            $pdo = new PDO($connection, $this->usuario, $this->pass,
                    $options);
//            echo "conectado";
            return $pdo;
        }catch(PDOException $e){
            print_r('Error connection: ' . $e->getMessage());
        }   
    }
    
}
