<link rel="stylesheet" type="text/css" href="vistas/assets/css/forms/theme-checkbox-radio.css">
<style>
  .bg_menor {
    border: 1px #e1e1e1 solid;
    background-color: #F7DC6F;
  }
</style>
<div class="admin-data-content" style="margin-top:50px;">

  <div class="row layout-top-spacing">
    <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
      <div class="widget-content-area br-4">
        <div class="widget-one">

          <div class="row">
            <div id="flFormsGrid" class="col-lg-12 layout-spacing">
              <div class="statbox widget box box-shadow">
                <div class="widget-header">
                  <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                      <h4>Crear Paciente</h4>
                    </div>
                  </div>
                </div>
                <div class="widget-content widget-content-area">
                  <form role="form" method="post">
                    <div class="form-row mb-4">
                      <div class="form-group col-md-6">
                        <label for="nombres">Nombres</label>
                        <input type="text" class="form-control" id="nombres" placeholder="Nombres" name="nombres">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" class="form-control" id="apellidos" placeholder="Apellidos" name="apellidos">
                      </div>
                    </div>
                    <div class="form-row mb-4">
                      <div class="form-group col-md-3">
                        <label for="nro_cedula">Nro.Cedula</label>
                        <input type="text" class="form-control" id="nro_cedula" placeholder="Nro.Cedula" name="nro_cedula">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="nro_seguro">Nro.Seguro Social</label>
                        <input type="text" class="form-control" id="nro_seguro" placeholder="Nro.Seguro Social" name="nro_seguro">
                      </div>
                      <div class="form-group col-md-3">
                        <label>Fecha de Nacimiento</label>
                        <input type="date" class="form-control" name="fecha_nacimiento">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="inputAddress">Genero</label>
                        <input type="text" class="form-control" placeholder="Genero" name="genero">
                      </div>
                    </div>
                    <div class="form-row mb-4">
                      <div class="form-group col-md-4">
                        <label for="lugarNacimiento">Lugar de Nacimiento</label>
                        <input type="text" class="form-control" id="lugarNacimiento" placeholder="Lugar de Nacimiento" name="lugar_nacimiento">
                      </div>
                      <div class="form-group col-md-8">
                        <label for="inputAddress2">Direccion Residencial</label>
                        <input type="text" class="form-control" id="inputAddress2" placeholder="Dirección Residencial" name="direccion">
                      </div>
                    </div>
                    <div class="form-row mb-4">
                      <div class="form-group col-md-4">
                        <label for="ocupacion">Ocupación</label>
                        <input type="text" class="form-control" id="ocupacion" placeholder="Ocupación" name="ocupacion" required>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="telefono">Teléfono de casa</label>
                        <input type="text" class="form-control" id="telefono" placeholder="Teléfono" name="telefono" required>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="celular">Número de celular</label>
                        <input type="text" class="form-control" id="celular" placeholder="Celular" name="celular" required>
                      </div>
                    </div>


                    <div class="form-row mb-4">
                      <div class="form-group col-md-6">
                        <label for="medico">Medico de Cabecera</label>
                        <input type="text" class="form-control" id="medico" placeholder="Medico de Cabecera" name="medico_cabecera">
                      </div>
                    </div>




                    <div class="form-group">
                      <div class="form-check pl-0">
                        <div class="custom-control custom-checkbox checkbox-info" style="display: none;">
                          <input type="checkbox" class="custom-control-input" id="urgencia" >
                          <label class="custom-control-label" for="urgencia"></label>
                           
                        </div>
                        <div class="form-group">
						<h4>EN CASO DE URGENCIA</h4>
					</div>
                      </div>
                    </div>
                    <div id="contenedor_urgencias"></div>


                    <div class="form-group">
						<h4>MENOR DE EDAD</h4>
					</div>
					


                    <div id="contenedor_menor"></div>
					
					

                    <input type="hidden" name="sucursal" value="<?php echo $_SESSION['sucursal']; ?>">
                    <input type="hidden" name="doctor" value="<?php echo $_SESSION['nombre']; ?>">

                    <button type="submit" class="btn btn-success mt-3">Crear Paciente</button>
                  </form>
                  <?php
				  $crearPaciente = new ControladorPacientes();
				  $crearPaciente->ctrCrearPaciente();
				  ?>
				  </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<!-- 
<script src="vistas/js/pacientes.js"></script> -->

<script>
var urgencia = document.getElementById('urgencia');
var contenedor = document.getElementById('contenedor_urgencias');
$("#contenedor_urgencias").append(
	'<div id="contenidour_hidden">' +
    '<input type="hidden" name="nombre_ur" value="">' +
    '<input type="hidden" name="parentesco_ur" value="">' +
    '<input type="hidden" name="nro_ur" value="">' +
    '</div>'
);
urgencia.addEventListener('click', function() {
	if (urgencia.checked) {
		$("#contenidour_hidden").remove();
		
	} else {
		$("#contenido_ur").remove();
		$("#contenedor_urgencias").append(
	        '<div id="contenidour_hidden">' +
    	    '<input type="hidden" name="nombre_ur" value="">' +
        	'<input type="hidden" name="parentesco_ur" value="">' +
	        '<input type="hidden" name="nro_ur" value="">' +
    	    '</div>'
		);
	}
});

$("#contenedor_menor").append(
	'<div  class="mt-4" id="contenido">' +
	'<div class="form-row mb-4">' +
	'<div class="form-group col-md-6">' +
	'<label for="responsable"> Por favor colocar el nombre del acudiente o responsable</label>' +
	'<input type="text" class="form-control" id="responsable" placeholder="Responsable" name="responsable">' +
	'</div>' +
	'<div class="form-group col-md-6">' +
	'<label for="parentesco"> Parentesco</label>' +
	'<input type="text" class="form-control" id="parentesco" placeholder="Parentesco" name="parentesco">' +
	'</div>' +
	'</div>' +
	'<div class="form-row mb-4">' +
	'<div class="form-group col-md-6">' +
	'<label for="nro_celular_responsable"> Nro.Celular</label>' +
	'<input type="text" class="form-control" id="nro_celular_responsable" placeholder="Nro Celular" name="nro_celular_responsable">' +
	'</div>' +
	'<div class="form-group col-md-4">' +
	'<label for="urg_celular">Remitido Por </label>' +
	'<input type="text" class="form-control" id="remitido" placeholder="Remitido Por" name="remitido">' +
	'</div>' +
	'</div>' +
	'</div>'
);

$("#contenedor_urgencias").append(
        	'<div  class="mt-4" id="contenido_ur">' +
	        '<div class="form-row mb-4">' +
        	'<div class="form-group col-md-4">' +
    	    '<label for="responsable"> Por favor colocar el nombre</label>' +
	        '<input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre_ur">' +
    	    '</div>' +
        	'<div class="form-group col-md-4">' +
	        '<label for="parentesco"> Parentesco</label>' +
    	    '<input type="text" class="form-control" id="parentesco_ur" placeholder="Parentesco" name="parentesco_ur">' +
        	'</div>' +
	        '<div class="form-group col-md-4">' +
    	    '<label for="nro_celular_responsable"> Nro.Celular</label>' +
        	'<input type="text" class="form-control" id="numero_ur" placeholder="Nro Celular" name="nro_ur">' +
	        '</div>' +
    	    '</div>' +
        	'</div>' +
	        '</div>'
    	);
</script>