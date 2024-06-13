<link href="vistas/assets/css/tables/table-basic.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="vistas/plugins/select2/select2.min.css">
<link rel="stylesheet" type="text/css" href="vistas/assets/css/forms/theme-checkbox-radio.css">
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
                                            <h4> Editar Historia Clínica</h4>
                                        </div>
                                    </div>
                                </div>

                                    
                                <?php
                              
                                  $item = 'id_consulta';
                                  
                                  $valor = $_GET['id_consulta'];
                                  
                                  $consultaGenerica = ControladorConsultaGenerica::ctrMostrarConsultaGenericaID($item, $valor);
                             



                              
                              ?>

                                 <nav class="breadcrumb-one" aria-label="breadcrumb">
                                               <ol class="breadcrumb" style="background: rgb(0 150 136 / 11%)!important;">
                                                   <li class="breadcrumb-item"><a href="javascript:void(0);">Doctor:</a></li>
                                                   <li class="breadcrumb-item active" aria-current="page"><b><?php echo $consultaGenerica['doctor']; ?></b></li>
                                               </ol>
                                             </nav>

                                             <?php 
                                              $editado = json_decode($consultaGenerica['editado'], true);

                                          
                                             if(isset($editado)){

                                             

                                           ?>

                                           

                                           <nav id="editado" class="breadcrumb-one" aria-label="breadcrumb">
                                               <ol class="breadcrumb" style="background-color:#F7DC6F !important;">
                                                   <li class="breadcrumb-item"><a href="javascript:void(0);">Editado por:</a></li>
                                                   <li class="breadcrumb-item active" aria-current="page"><b><?php echo $editado['doctor']; ?></b></li>
                                                   <li class="breadcrumb-item active" aria-current="page"><b><?php echo $editado['fecha_edicion']; ?></b></li>
                                               </ol>
                                           </nav>
                                           <?php } ?>

                                <div class="widget-content widget-content-area">
                                    <form role="form" method="post">
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-12">
                                                <label for="inputEmail4">Paciente</label>

                                                <?php
                                                             
                                                             $item = 'id_paciente';
                                                             $valor = $consultaGenerica['paciente'];
                                                           
                                                             $paciente = ControladorPacientes::ctrMostrarPacientes($item, $valor);

                                                         

                                                             ?>
                                                        

                                                             <select class="form-control form-small" name="paciente"  value="<?php echo $paciente['id_paciente']?>" required>

                                                             <option value="<?php echo $paciente['id_paciente']?>"> <?php echo $paciente['nro_cedula']; ?> || <?php echo $paciente['nombres']; ?> <?php echo $paciente['apellidos']; ?>  </option>
                                                             
                                                             <?php
                                                             
                                                               $item = null;
                                                               $valor = null;
                                                             
                                                               $pacientes = ControladorPacientes::ctrMostrarPacientes($item, $valor);
                                                             
                                                                foreach ($pacientes as $key => $value) {
                                                             
                                                                  echo '<option value="'.$value["id_paciente"].'"> Número Cedula: '.$value['nro_cedula'].' || Nombres: '.$value["nombres"].' '.$value['apellidos'].'</option>';
                                                             
                                                                
                                                             
                                                                }
                                                             
                                                             ?>
                                                             
                                                             </select>



                                              
                                            </div>

                                        </div>
                                        <div class="form-row mb-12">
                                                       <div class="form-group col-md-6">
                                                        <label for="inputSucursal">Sucursal</label>
                                                        <select required class="form-control" id="sucursal" name="sucursal">
                                                            <option value="">Seleccionar sucursal</option>
                                                            <?php
                                                            $sucursales = ControladorSucursales::ctrMostrarSurcursales(null, null);
                                                            foreach ($sucursales as $key => $value) {
                                                                $selected = ($consultaGenerica['sucursal'] == $value["id_sucursal"]) ? 'selected' : '';
                                                                echo '<option value="' . $value["id_sucursal"] . '" ' . $selected . '>' . $value['nombre'] . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                      <div class="form-group col-md-3">
                                                <label for="edad">Edad</label>
                                                <input type="text" class="form-control" id="edad" name="edad" value="<?php echo $consultaGenerica['edad']; ?>" readonly>
                                            </div>
                                                                        <div class="form-group col-md-3">
                                                            <label for="inputAddress">Fecha de atencion</label>
                                                            <input type="date" required class="form-control" id="inputAddress" name="fecha_atencion" value="<?php echo $consultaGenerica['fecha_atencion']; ?>" max="<?php echo date('Y-m-d'); ?>">
                                                        </div>
                                                    </div>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-12">
                                                <label for="inputAddress">Motivo de Consulta:</label>
                                                <textarea id="textarea" class="form-control textarea" maxlength="10000" rows="25" placeholder="Esta área tiene un limite de 800 caracteres." name="m_c"><?php echo $consultaGenerica['m_c']; ?></textarea>
                                            </div>
                                        </div>
                         
                                </div>

                                <input type="hidden" name="id_consulta" value="<?php echo $_GET['id_consulta']; ?>"> 
                                  <input type="hidden"  name="editadoDoctor" value="<?php echo $_SESSION['nombre']; ?>">    
                                  <input type="hidden" name="editar_consulta_generica" value="editar">
                                  <input type="hidden" name="actualizar" value="exito">
                                  <button type="submit" class="btn btn-success mt-3">Editar Consulta</button>
                                <!-- <button type="submit" class="btn btn-success mt-3">Crear</button> -->
                                </form>

                                <?php

                                   $editarConsulta = new  ControladorConsultaGenerica();
                                   $editarConsulta -> ctrEditarConsultaGenerica();                                     
                                   
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

<script src="vistas/plugins/select2/select2.min.js"></script>
<script src="vistas/plugins/select2/custom-select2.js"></script>
<script src="vistas/plugins/bootstrap-maxlength/bootstrap-maxlength.js"></script>

<script>
    $('textarea.textarea').maxlength({
        alwaysShow: true,
    });
</script>