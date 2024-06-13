<div class="admin-data-content" style="margin-top:50px;">

  <div class="row layout-top-spacing" >
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
                                                <form  role="form" method="post">
                                                    <div class="form-row mb-4">
                                                        <div class="form-group col-md-6">
                                                            <label for="nombres">Nombres</label>
                                                            <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres" required>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="apellidos">Apellidos</label>
                                                            <input type="text" class="form-control" id="apellidos"  name="apellidos" placeholder="Apellidos" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-row mb-4">
                                                        <div class="form-group col-md-3">
                                                            <label for="nro_cedula">Nro.Cedula</label>
                                                            <input type="text" class="form-control" name="nro_cedula" placeholder="Nro.Cedula" required>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="nro_seguro">Nro.Seguro Social</label>
                                                            <input type="text" class="form-control" name="nro_seguro" placeholder="Nro.Seguro Social" required>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="nacimiento">Fecha de Nacimiento</label>
                                                            <input type="date" class="form-control" name="fecha_nacimiento" required>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="genero">Genero</label>
                                                            <input type="text" class="form-control" placeholder="Genero" name="genero" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-row mb-4">
                                                        <div class="form-group col-md-4">
                                                            <label for="lugarNacimiento">Lugar de Nacimiento</label>
                                                            <input type="text" class="form-control" id="lugarNacimiento" placeholder="Lugar de Nacimiento" name="lugar_nacimiento" required>
                                                        </div>
                                                        <div class="form-group col-md-8">
                                                            <label for="inputAddress2">Direccion Residencial</label>
                                                            <input type="text" class="form-control" id="inputAddress2" placeholder="Dirección Residencial" name="direccion" required>
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
                                                            <input type="text" class="form-control" id="medico" placeholder="Medico de Cabecera" name="medico" required>
                                                         </div>
                                                    </div>
                                            
                                                    <div class="form-group">
                                                        <div class="form-check pl-0">
                                                            <div class="custom-control custom-checkbox checkbox-info">
                                                                <input type="checkbox" class="custom-control-input" id="gridCheck">
                                                                <label class="custom-control-label" for="gridCheck">Alergico</label>
                                                              
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                
                                                    <div id="contenedor_alergico"></div>
                                                  <button type="submit" class="btn btn-success mt-3">Crear Paciente</button>
                                                </form>
                                                <?php

                                                 $crearPaciente = new ControladorPacientes();
                                                 $crearPaciente -> ctrCrearPaciente();                                     
                                                 
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
//     $("#gridCheck").find("checkbox").each(function () {
//     if ($(this).prop('checked') == true) {
//         alert("Hola")
//     }
// });

var miCheckbox = document.getElementById('gridCheck');

  var contenedor = document.getElementById('contenedor_alergico');

  contenedor.innerHTML = '<input type="hidden" name="alergico" value="-">';

  miCheckbox.addEventListener('click', function() {
    if(miCheckbox.checked) {
    

      contenedor.innerHTML = '<input type="text" class="form-control" name="alergico" placeholder="Ingrese a que es alergico el paciente">';
    
      
    }
  });

</script>