<script src="./vista/bower_components/jquery/dist/jquery.min.js"></script>

<?php

include_once 'controladores/usuarioSession.php';
include_once 'controladores/usuarioActivo.php';

$usuario = new UsuarioSession();
$usuario_activo = new UsuarioActivo();

if ($usuario->adminLogeado()) {
    //pasamos los datos de sesion a la clase usuario activo
    $usuario_activo->setNombre($usuario->getNombreAdmin());
    $usuario_activo->setId_cliente($usuario->getIdAdmin());
    
    include_once './vista/templateAdmin.php';
//    echo "usuario logeado";
} else if (isset ($_POST['usuario']) && isset ($_POST['pass'])) {


    if ($usuario->existeAdmin($_POST['usuario'], $_POST['pass'])) {
//    
        
        //pasamos los datos de sesion a la clase usuario activo
        $usuario_activo->setNombre($usuario->getNombreAdmin());
        $usuario_activo->setId_cliente($usuario->getIdAdmin());
        include_once './vista/templateAdmin.php';
    } else {
        
        $error_sesion = 'Ususario y/o contraseña incorrecta.';
//        echo $error_sesion;
        include_once 'paginas/login.php';
    }
} else {
//    echo "login";
    include_once 'paginas/login.php';
}
