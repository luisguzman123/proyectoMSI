<script>
    dameCusosalumno("lista_cuotas");
</script>
<div class="box-body">
    <!--fila-->
    <div class="row" >
        <!--columna mediana--> 
        <div class="col-md-6">
            <div class="form-group">
                <label>Cuota</label>
                <!--cargamos una lista con los cursos disponibles-->
                <select class="form-control select2 select2-hidden-accessible"
                        style="width: 100%;" tabindex="-1" aria-hidden="true" id="lista_cuotas">
             
                </select>

            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>. </label>
                <button type="button" class="btn btn-block btn-primary"
                        onclick="verCuotas();">Ver Cuotas</button>
            </div>
        </div>

    </div>
</div>

<div>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"> </h3>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Numero de cuotas</th>
                                <th>Fecha de vencimiento</th>
                                <th>fecha pagada</th>
                                <th>Saldo</th>
                            </tr>
                        </thead>
                        <tbody id="tabla_cuotas">
                            
                        </tbody>
                    </table>
                    <div class="row" style="margin-top: 30px; font-size: 25px; background: #006699; color: #fff;"> 
                        <div style="text-align: center; margin: 0px auto;">Total a pagar</div>
                        <div id="total_pagar" style="text-align: center; margin: 0px auto;">0</div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>   

<!--tabla de calificaciones
<div>
    <div class="row">
        <div class="col-md-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Calificaciones</h3>
                </div>
                 /.box-header 
                  
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Módulo</th>
                                <th>Puntaje</th>
                                <th>Calificación</th>

                            </tr>
                        </thead>
                        
                        <tbody id="tabla_calificaciones">
                             aqui se cargan las calificaciones 
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Módulo</th>
                                <th>Puntaje</th>
                                <th>Calificación</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                 /.box-body 
            </div>
-->

        </div>
    </div>
</div>
