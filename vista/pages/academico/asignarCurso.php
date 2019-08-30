<script>

    $('#cedula_b').keyup(function (e) {
        $('#cedula_b').val(formatearNumero(
                $('#cedula_b').val()));
        if (e.keyCode == 13)
        {
            dameAlumnoPorCedula();
        }
    });
</script>

<div class="row">
    <div class="col-md-5">
        <label for=" ">Ingrese Nº de cédula</label>
        <input type="text" class="form-control" id="cedula_b" 
               placeholder="Ingrese cedula y presiona ENTER">
    </div>
</div>
<hr> 
<div class="row">
    <div class="col-md-4">
        <label for=" ">ID</label>
        <div id="id_cliente"></div>
    </div>
    <div class="col-md-4">
        <label for=" ">Nombre y Apellido</label>
        <div id="nombre_apellido"></div>
    </div>
    <div class="col-md-4">
        <label for=" ">Ciudad</label>
        <div id="ciudad"> </div>
    </div>
</div>
<hr> 
<div class="row" id="bloque_cursos">
    <div class="col-md-6">
        <label for=" ">Cursos Disponibles</label>
        <select name=" " id="cursos_disponibles" 
                class="select2 select2-hidden-accessible 
                form-control">

        </select>
    </div>
    <div class="col-md-2"> 
        <label for=" ">Operaciones</label><br>
        <button class="btn btn-primary" onclick="agregarCurso(); return false;">Agregar</button>
    </div>
</div>
<hr> 

<div class="row"> 
    <div class="col-md-12"> 
        <table class="table table-bordered table-hover" id="tabla_bloque">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Curso</th>
                    <th>Operaciones</th>
                </tr>
            </thead>
            <tbody id="tabla_cursos"> </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Curso</th>
                    <th>Operaciones</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

