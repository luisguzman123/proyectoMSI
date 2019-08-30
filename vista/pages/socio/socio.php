<div>
    <div class="row">

        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Agregar Socio</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div id="formulario">
                    <form role="form" id="form-agregar-socio" enctype="multipart/form-data" method="post">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nombre_socio">Nombre</label>
                                        <input type="text" class="form-control" name="nombre_socio" id="nombre_socio" placeholder="Introduce un nombre">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="apellido_socio">Apellido</label>
                                        <input type="text" class="form-control" name="apellido_socio" id="apellido_socio" placeholder="Introduce un apellido">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="direccion_socio">Dirección</label>
                                        <input type="text" class="form-control" name="direccion_socio" id="direccion_socio" placeholder="Introduce una dirección">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="telefono_socio">Teléfono</label>
                                        <input type="number" class="form-control" name="telefono_socio" id="telefono_socio" placeholder="Introduce un teléfono">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cedula_socio">Cédula</label>
                                        <input type="number" class="form-control" name="cedula_socio" id="cedula_socio" placeholder="Introduce una cédula">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="edad_socio">Edad</label>
                                        <input type="number" class="form-control" name="edad_socio" id="edad_socio" placeholder="Introduce una edad" min="16" max="70">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ciudad_socio">Ciudad</label>
                                        <select id="ciudad_socio" name="ciudad_socio" class="form-control contenedor-option">
                                            <!--Cargar Ciudad-->
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="usuario_socio">Usuario</label>
                                        <input type="text" class="form-control" name="usuario_socio" id="usuario_socio" placeholder="Introduce un usuario">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Correo electrónico</label>
                                        <input type="email" class="form-control" name="correo_socio" id="correo_socio" placeholder="Introduce un correo">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Contraseña</label>
                                        <input type="password" class="form-control" name="contra_socio" id="contra_socio" placeholder="Introduce una contraseña">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Introduce una foto</label>
                                <input type="file" name="foto_socio" id="foto_socio" accept="image/*" />

                        <!--<p class="help-block">Example block-level help text here.</p>-->
                            </div>
                            <!--                    <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> Check me out
                                                    </label>
                                                </div>-->
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary" onclick="GuardarDatosSocio(); return false;">Agregar</button>
                            <button type="reset" class="btn btn-primary">Limpiar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div>
    <div class="row">
        <div class="col-md-12">
            <div>
                <div class="box"> 
                    <div class="box-header">
                        <h3 class="box-title">Lista de Socios</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Posición</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Teléfono</th>
                                    <th>Cédula</th>
                                    <th>Ciudad</th>
                                    <th>Correo electrónico</th>
                                    <th>Usuario</th> 
                                    <th>foto</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody id="lista-socio-tabla">
                                <!-- Lista de Socios -->
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Posición</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Teléfono</th>
                                    <th>Cédula</th>
                                    <th>Ciudad</th>
                                    <th>Correo electrónico</th>
                                    <th>Usuario</th> 
                                    <th>foto</th>
                                    <th>Opciones</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>

        </div>
    </div>
</div>