<div class="box">
    <div class="row">
        <div class="col-md-6">
            <label for="nombre_alumno">Nombre y Apellido</label>
            <input type="text" id="nombre_alumno"
                   class="form-control" 
                   placeholder="Ingrese nombre o apellido" 
                   onkeyup="buscarAlumno(); return false;">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box title"> </h3>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover"> 
<!--                    thead>tr>th*5-->
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre y Apellido</th>
                            <th>Cedula</th>
                            <th>Curso</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
<!--                    tbody#tabla_alumnos-->
                    <tbody id="tabla_alumnos">
                        <!-- aqui se cargan los alumnos -->

                    </tbody>
                    
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Nombre y Apellido</th>
                            <th>Cedula</th>
                            <th>Curso</th>
                            <th>Opciones</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            
        </div>
    </div>
</div>


<div class="modal fade" id="modal-alumno">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"> 
                <button class="close"
                        type="button"
                        data-dismiss="modal"
                        aria-label="Close"
                        
                        ><span aria-hidden="true">&times;</span> </button>
                <h4 class="modal-title">Cargar Notas</h4>
            </div>
            <div class="modal-body">
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nombre y Apellido</label>
                            <div id="nombre_alumno_seleccionado"></div>
                            
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for=" ">Cédula</label>
                            <div id="cedula_alumno"></div>
                        </div>
                    </div>
                </div>
                <hr> 
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">ID Alumno</label>
                            <div id="id_alumno"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for=" ">Curso</label>
                            <div id="curso_alumno"></div>
                        </div>
                    </div>
                </div>
                <hr> 
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="modulo">Modulo</label>
                            <input type="text" id="modulo" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12"> 
                        <div class="form-group">
                            <label for="puntaje">Puntaje</label>
                            <input type="number" id="puntaje" class="form-control"
                                   value="70" min="1" max="100">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nota">Nota</label>
                            <input type="number" id="nota" class="form-control" 
                                   value="1" min="1" max="5">
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="modal-footer">
                <button type="button"
                        class="btn btn-default pull-left" 
                        data-dismiss="modal">Cerrar</button>
                <button type="button"
                        class="btn btn-default pull-right btn-primary" 
                        onclick="guardarCalificacion(); return false;">Guardar Nota</button>
            </div>
        </div>
    </div>
</div>




<!--MODAL DE LISTAR LAS CALIFICACIONES-->

<div class="modal fade" id="modal-listar">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"> 
                <button class="close"
                        type="button"
                        data-dismiss="modal"
                        aria-label="Close"
                        
                        ><span aria-hidden="true">&times;</span> </button>
                <h4 class="modal-title">Calificaciones</h4>
            </div>
            <div class="modal-body">
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nombre y Apellido</label>
                            <div id="nombre_alumno_seleccionado_listar"></div>
                            
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for=" ">Cédula</label>
                            <div id="cedula_alumno_listar"></div>
                        </div>
                    </div>
                </div>
                <hr> 
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">ID Alumno</label>
                            <div id="id_alumno_listar"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for=" ">Curso</label>
                            <div id="curso_alumno_listar"></div>
                        </div>
                    </div>
                </div>
                <hr> 
                <div class="row">
<!--                    table.table.table-hover.table-bordered-->
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Modulo</th>
                                <th>Puntaje</th>
                                <th>Nota</th>
                                <th>Operaciones</th>
                            </tr>
                        </thead>
                        <tbody id="tabla-listar"></tbody>
                        <tfoot> 
                            <tr>
                                <th>ID</th>
                                <th>Modulo</th>
                                <th>Puntaje</th>
                                <th>Nota</th>
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
                <button type="button"
                        class="btn btn-default pull-right btn-primary" 
                        onclick="guardarCalificacion(); return false;">Guardar Nota</button>
            </div>
        </div>
    </div>
</div>


<!--modal actualizar modulo-->
<div class="modal fade" id="modal-actualizar">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"> 
                <button class="close"
                        type="button"
                        data-dismiss="modal"
                        aria-label="Close"
                        
                        ><span aria-hidden="true">&times;</span> </button>
                <h4 class="modal-title">Actualizar Notas</h4>
            </div>
            <div class="modal-body">
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nombre y Apellido</label>
                            <div id="nombre_alumno_actualizar"></div>
                            
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for=" ">Cédula</label>
                            <div id="cedula_actualizar"></div>
                        </div>
                    </div>
                </div>
                <hr> 
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">ID Alumno</label>
                            <div id="id_alumno_actualizar"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for=" ">Curso</label>
                            <div id="curso_alumno_actualizar"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for=" ">ID Nota</label>
                            <div id="id_nota"></div>
                        </div>
                    </div>
                </div>
                <hr> 
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="modulo">Modulo</label>
                            <input type="text" id="modulo_a" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12"> 
                        <div class="form-group">
                            <label for="puntaje">Puntaje</label>
                            <input type="number" id="puntaje_a" class="form-control"
                                   value="70" min="1" max="100">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nota">Nota</label>
                            <input type="number" id="nota_a" class="form-control" 
                                   value="1" min="1" max="5">
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="modal-footer">
                <button type="button"
                        class="btn btn-default pull-left" 
                        data-dismiss="modal">Cerrar</button>
                <button type="button"
                        class="btn btn-default pull-right btn-primary" 
                        onclick="actualizarCalificacion(); return false;">Actualizar Nota</button>
            </div>
        </div>
    </div>
</div>



