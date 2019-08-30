<div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Agregar Tipo de Comercial</h3>
                </div>
                <form role="form" style="max-width: 500px;" id="formulario_tipo">
                    <div class="box-body">
                        <div class="row">
                            <div id="id_tipo" ></div> 
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nombre del tipo de Comercio</label>
                                    <input type="text" class="form-control" placeholder="Ingrese nombre de una ciudad" name="nombre_tipo" id="nombre_tipo">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" checked="" name="check_activo" id="check_activo">
                                        Activo
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button id="guadar_tipo" type="button" class="btn  btn-primary" style="max-width: 150px;" onclick="guardarTipoComercial(); return false;">Guardar</button>
                        <div class="box-footer" style="display: flex;">
                            <button id="actualizar_tipo" type="button" class="btn  btn-primary" style="max-width: 150px; display: none; margin-right: 20px;" onclick="actualizarTipo(); return false;">Actualizar</button>
                            <button id="cancelar_actualizar_tipo" onclick="cancelarActualizarTipo(); return false;" type="button" class="btn btn-primary" style="max-width: 150px; display: none;" onclick="guardarCiudad(); return false;">Cancelar</button>
                        </div>
                    </div>
                </form>
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
                        <h3 class="box-title">Lista de Ciudades</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Activo</th>
                                    <th>Opciones</th>

                                </tr>
                            </thead>
                            <tbody id="tabla_tipos">
                                <!-- aqui se cargan las ciudades -->
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Activo</th>
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
