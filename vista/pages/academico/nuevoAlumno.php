
<hr> 
<div class="row"> 
    <div class="col-md-4">
        <div class="form-group"> 
            <label for=" ">Nombre</label>
            <input type="text" class="form-control" id="nombre">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group"> 
            <label for=" ">Apellido</label>
            <input type="text" class="form-control" id="apellido">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group"> 
            <label for=" ">Cedula</label>
            <input type="text" class="form-control" id="cedula">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group"> 
            <label for=" ">RUC</label>
            <input type="text" class="form-control" id="ruc">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group"> 
            <label for=" ">Direccion</label>
            <input type="text" class="form-control" id="direccion">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group"> 
            <label for=" ">Telefono</label>
            <input type="text" class="form-control" id="telefono">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group"> 
            <label for=" ">Celular</label>
            <input type="text" class="form-control" id="celular">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group"> 
            <label for=" ">Nacionalidad</label>
            <select name="" id="nacionalidad"
                    class="select2 select2-hidden-accessible 
                    form-control">

            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group"> 
            <label for=" ">Ciudad</label>
            <select name="" id="ciudad"
                    class="select2 select2-hidden-accessible 
                    form-control">

            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group"> 
            <label for=" ">Fecha de Nacimiento</label>
            <input type="date" class="form-control datepicker" id="fecha_nacimiento">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group"> 
            <label for=" ">Usuario</label>
            <input type="text" class="form-control" id="usuario">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group"> 
            <label for=" ">Contraseña</label>
            <input type="password" class="form-control" id="pass">
        </div>
    </div>
</div>
<button class="btn btn-primary" onclick="guardarCliente(); return false;">Guardar</button>
<button class="btn btn-warning" data-toggle="modal"
        data-target="#modal-listar">Listar</button>




<!--modales de la ventana-->
<div class="modal fade" id="modal-listar" >
    <div class="modal-dialog" style="width: 90%;">
        <div class="modal-content">
            <div class="modal-header"> 
                <button class="close"
                        type="button"
                        data-dismiss="modal"
                        aria-label="Close"

                        ><span aria-hidden="true">&times;</span> </button>
                <h4 class="modal-title">Busqueda de Alumnos</h4>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nombre y Apellido</label>
                            <input type="text" class="form-control"
                                   id="nombre_buscar">

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for=" ">Cédula</label>
                            <input type="text" class="form-control"
                                   id="cedula_buscar" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <table class="table table-bordered table-hover"> 
                        <thead> 
                            <tr>
                                <th>ID</th>
                                <th>Nombre y Apellido</th>
                                <th>Cedula</th>
                                <th>Telefono</th>
                                <th>Operaciones</th>
                            </tr>
                        </thead>
                        <tbody id="alumnos_resultado"></tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Nombre y Apellido</th>
                                <th>Cedula</th>
                                <th>Telefono</th>
                                <th>Operaciones</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>


            </div>

            <div class="modal-footer">
                <button type="button"
                        class="btn btn-default pull-left" 
                        data-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>

<!--MODAL PARA EDITAR DATOS DEL ALUMNO-->
<div class="modal fade" id="modal-editar" >
    
    <div class="modal-dialog" style="width: 90%; ">
        <div class="modal-content">
            <div class="modal-header"> 
                <button class="close"
                        type="button"
                        data-dismiss="modal"
                        aria-label="Close"

                        ><span aria-hidden="true">&times;</span> </button>
                <h4 class="modal-title">Edición de alumno</h4>
            </div>
            <div class="modal-body">
                <div id="id_alumno_ac" style="display: none;">0</div>
                <div class="row"> 
                    <div class="col-md-4">
                        <div class="form-group"> 
                            <label for=" ">Nombre</label>
                            <input type="text" class="form-control" id="nombre_a">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group"> 
                            <label for=" ">Apellido</label>
                            <input type="text" class="form-control" id="apellido_a">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group"> 
                            <label for=" ">Cedula</label>
                            <input type="text" class="form-control" id="cedula_a">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group"> 
                            <label for=" ">RUC</label>
                            <input type="text" class="form-control" id="ruc_a">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group"> 
                            <label for=" ">Direccion</label>
                            <input type="text" class="form-control" id="direccion_a">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group"> 
                            <label for=" ">Telefono</label>
                            <input type="text" class="form-control" id="telefono_a">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group"> 
                            <label for=" ">Celular</label>
                            <input type="text" class="form-control" id="celular_a">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group"> 
                            <label for=" ">Nacionalidad</label>
                            <select name="" id="nacionalidad_a"
                                    class="select2 select2-hidden-accessible 
                                    form-control">

                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group"> 
                            <label for=" ">Ciudad</label>
                            <select name="" id="ciudad_a"
                                    class="select2 select2-hidden-accessible 
                                    form-control">

                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group"> 
                            <label for=" ">Fecha de Nacimiento</label>
                            <input type="date" class="form-control datepicker" 
                                   id="fecha_nacimiento_a">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group"> 
                            <label for=" ">Usuario</label>
                            <input type="text" class="form-control" id="usuario_a">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group"> 
                            <label for=" ">Contraseña</label>
                            <input type="password" class="form-control" id="pass_a">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button"
                        class="btn btn-default pull-left" 
                        data-dismiss="modal">Cerrar</button>
                <button type="button"
                        class="btn btn-success pull-right" 
                        data-dismiss="modal" onclick="actualizarCliente(); 
                        return false;">Confirmar cambios</button>

            </div>
        </div>
    </div>
</div>