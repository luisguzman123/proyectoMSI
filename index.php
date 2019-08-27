
<?php



include_once './controladores/usuarioSession.php';
include_once './controladores/usuarioActivo.php';

$usuario = new UsuarioSession();
$usuario_activo = new UsuarioActivo();

if ($usuario->usuarioLogeado()) {
    //pasamos los datos de sesion a la clase usuario activo
    $usuario_activo->setNombre($usuario->getNombre());
    $usuario_activo->setId_cliente($usuario->getIdCliente());
    $usuario_activo->setCedula($usuario->getCedula());
    include_once 'vista/template.php';
//    echo "usuario logeado";
} else if (isset ($_POST['usuario']) && isset ($_POST['pass'])) {


    if ($usuario->existeUsuario($_POST['usuario'], $_POST['pass'])) {
//    
        
        //pasamos los datos de sesion a la clase usuario activo
        $usuario_activo->setNombre($usuario->getNombre());
        $usuario_activo->setId_cliente($usuario->getIdCliente());
        $usuario_activo->setCedula($usuario->getCedula());
        include_once 'vista/template.php';
    } else {
        
        $error_sesion = 'Ususario y/o contraseña incorrecta.';
//        echo $error_sesion;
        include_once './paginas/login.php';
    }
} else {
//    echo "login";
    include_once './paginas/login.php';
}
?>
<div class="col"> hola</div>
<div class="lalala">christian</div>