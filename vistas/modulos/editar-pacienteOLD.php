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
                                                        <h4>Editar Paciente</h4>
                                                    </div>                                                                        
                                                </div>
                                            </div>
                                            <div class="widget-content widget-content-area">
                                                <form  role="form" method="post">
                                                    <div class="form-row mb-4">
                                                    <?php
                              
                                                      $item = 'id_paciente';
                                                      $valor = $_GET['id_paciente'];
                                                      
                                                      $paciente = ControladorPacientes::ctrMostrarPacientes($item, $valor);

                                                     ?> 
                                                        <div class="form-group col-md-6">
                                                            <label for="nombres">Nombres</label>
                                                            <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres"  value="<?php echo $paciente['nombres']; ?>" required>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="apellidos">Apellidos</label>
                                                            <input type="text" class="form-control" id="apellidos"  name="apellidos" placeholder="Apellidos"  value="<?php echo $paciente['apellidos']; ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-row mb-4">
                                                        <div class="form-group col-md-3">
                                                            <label for="nro_cedula">Nro.Cedula</label>
                                                            <input type="text" class="form-control" name="nro_cedula" placeholder="Nro.Cedula"  value="<?php echo $paciente['nro_cedula']; ?>" required>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="nro_seguro">Nro.Seguro Social</label>
                                                            <input type="text" class="form-control" name="nro_seguro" placeholder="Nro.Seguro Social"   value="<?php echo $paciente['nro_seguro']; ?>" required>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="nacimiento">Fecha de Nacimiento</label>
                                                            <input type="date" class="form-control" name="fecha_nacimiento"  value="<?php echo $paciente['fecha_nacimiento']; ?>" required>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="genero">Genero</label>
                                                            <input type="text" class="form-control" placeholder="Genero" name="genero"  value="<?php echo $paciente['genero']; ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-row mb-4">
                                                        <div class="form-group col-md-4">
                                                            <label for="lugarNacimiento">Lugar de Nacimiento</label>
                                                            <input type="text" class="form-control" id="lugarNacimiento" placeholder="Lugar de Nacimiento" name="lugar_nacimiento"   value="<?php echo $paciente['lugar_nacimiento']; ?>" required>
                                                        </div>
                                                        <div class="form-group col-md-8">
                                                            <label for="inputAddress2">Direccion Residencial</label>
                                                            <input type="text" class="form-control" id="inputAddress2" placeholder="Dirección Residencial" name="direccion"  value="<?php echo $paciente['direccion']; ?>"  required>
                                                        </div>
                                                    </div>
                                                    <div class="form-row mb-4">
                                                        <div class="form-group col-md-4">
                                                            <label for="ocupacion">Ocupación</label>
                                                            <input type="text" class="form-control" id="ocupacion" placeholder="Ocupación" name="ocupacion"  value="<?php echo $paciente['ocupacion']; ?>" required>
                                                         </div>
                                                         <div class="form-group col-md-4">
                                                            <label for="telefono">Teléfono de casa</label>
                                                            <input type="text" class="form-control" id="telefono" placeholder="Teléfono" name="telefono"   value="<?php echo $paciente['telefono']; ?>" required>
                                                         </div>
                                                         <div class="form-group col-md-4">
                                                            <label for="celular">Número de celular</label>
                                                            <input type="text" class="form-control" id="celular" placeholder="Celular" name="celular"  value="<?php echo $paciente['celular']; ?>" required>
                                                         </div>
                                                    </div>

                                                    <div class="form-row mb-4">
                                                        <div class="form-group col-md-6">
                                                            <label for="medico">Medico de Cabecera</label>
                                                            <input type="text" class="form-control" id="medico" placeholder="Medico de Cabecera" name="medico"  value="<?php echo $paciente['medico']; ?>" required>
                                                         </div>
                                                    </div>
                                            
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                              <label for="">Alergico</label>
                                                              <input type="text" class="form-control" name="alergico"  value="<?php echo $paciente['alergico']; ?>" placeholder="Ingrese a que es alergico el paciente">'
                                                        </div>
                                                    </div>
                                                    
                                                
                                             
                                              
                                                    <input type="hidden" name="id_paciente" value="<?php echo $_GET['id_paciente']; ?>" >
                                                    <input type="hidden" name="actualizar" value="exito" >
                                                  <button type="submit" class="btn btn-success mt-3">Editar Paciente</button>
                                                </form>
                                                <?php

                                                 $editarPaciente = new ControladorPacientes();
                                                 $editarPaciente -> ctrEditarPaciente();                                     
                                                 
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

