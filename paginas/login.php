<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <form style="width: 400px; margin: 20px auto; background: #ededed; 
              padding: 60px; box-shadow: 0px 0px 2px #666666" method="POST">
            <h1>LOGIN</h1>
            <?php 
            if(isset($error_sesion)){
                echo $error_sesion;
                echo "<br>";
            }
            ?>
            <div class="form-group">
                <label for="usuario">Usuario</label>
                <input type="text" class="form-control" id="usuario" placeholder="Ingrese su nombre" name="usuario">
            </div>
            <div class="form-group">
                <label for="pass">Contraseña</label>
                <input type="password" class="form-control" id="pass" placeholder="Ingrese contraseña" name="pass">
            </div>
            <button type="submit" class="btn btn-primary" id="ingresar" style="margin: 0px auto;">Acceder</button>
        </form>

    </body>
</html>
