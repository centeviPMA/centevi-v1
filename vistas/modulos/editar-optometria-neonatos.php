<link href="vistas/assets/css/tables/table-basic.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="vistas/plugins/select2/select2.min.css">
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
                                                        <h4> Editar Optometria neonatos</h4>
                                                    </div>                                                                        
                                                </div>
                                            </div>

                                            
                                            <?php
                              
                                             $item = 'id_consulta';
                                             
                                             $valor = $_GET['id_consulta'];
                                             
                                             $consultaOptometria = ControladorOptometriaNeonatos::ctrMostrarOptometriaNeonatosID($item, $valor);
                                            

                                                // echo '<pre>';
                                                // var_dump($consultaOptometria);
                                                // echo '</pre>';


                                             
                                             ?>
                                             <nav class="breadcrumb-one" aria-label="breadcrumb">
                                               <ol class="breadcrumb" style="background: rgb(0 150 136 / 11%)!important;">
                                                   <li class="breadcrumb-item"><a href="javascript:void(0);">Creado por:</a></li>
                                                   <li class="breadcrumb-item active" aria-current="page"><b><?php echo $consultaOptometria['doctor']; ?></b></li>
                                               </ol>
                                             </nav>
                                            <div class="widget-content widget-content-area">
                                              <form  role="form" method="post">
                                                    <div class="form-row mb-4">
                                                        <div class="form-group col-md-12">
                                                            <label for="inputEmail4">Pacientes</label>

                                                            <?php
                                                             
                                                             $item = 'id_paciente';
                                                             $valor = $consultaOptometria['paciente'];
                                                           
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
                                                                $selected = ($consultaOptometria['sucursal'] == $value["id_sucursal"]) ? 'selected' : '';
                                                                echo '<option value="' . $value["id_sucursal"] . '" ' . $selected . '>' . $value['nombre'] . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                      <div class="form-group col-md-3">
                                                <label for="edad">Edad</label>
                                                <input type="text" class="form-control" id="edad" name="edad" value="<?php echo $consultaOptometria['edad']; ?>" readonly>
                                            </div>
                                                                        <div class="form-group col-md-3">
                                                            <label for="inputAddress">Fecha de atencion</label>
                                                            <input type="date" required class="form-control" id="inputAddress" name="fecha_atencion" value="<?php echo $consultaOptometria['fecha_atencion']; ?>" max="<?php echo date('Y-m-d'); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-row mb-4">
                                                        <div class="form-group col-md-12">
                                                            <label for="inputAddress">Motivo de Consulta:</label>
                                                            <textarea id="textarea" class="form-control textarea" maxlength="10000" rows="15" placeholder="Esta área tiene un limite de 10000 caracteres." name="m_c" ><?php echo $consultaOptometria['m_c']; ?></textarea>
                                                        </div>
                                                      </div>
                                                    <div class="form-row mb-4">
                                                        <div class="form-group col-md-4">
                                                            <label for="lugarNacimiento">Antecedentes Oculares</label>
                                                            <input type="text" class="form-control" id="lugarNacimiento" placeholder="A/O" name="a_o" value=" <?php echo $consultaOptometria['a_o']; ?>">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="inputAddress2">Antecedentes Personales</label>
                                                            <input type="text" class="form-control" id="inputAddress2" placeholder="A/P" name="a_p" value=" <?php echo $consultaOptometria['a_p']; ?>">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="inputAddress2">Antecedentes Familiares</label>
                                                            <input type="text" class="form-control" id="inputAddress2" placeholder="A/F" name="a_f" value=" <?php echo $consultaOptometria['a_f']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-row mb-4">
                                                        <div class="form-group col-md-12">
                                                            <label for="medicamentos">Medicamentos</label>
                                                            <input type="text" class="form-control" id="medicamentos" placeholder="Medicamentos" name="medicamentos" value=" <?php echo $consultaOptometria['medicamentos']; ?>">
                                                         </div>
                                                    </div>
                                                    <div class="form-row mb-4">
                                                        <div class="form-group col-md-12">
                                                            <label for="tratamientos">Tratamientos anteriores</label>
                                                            <input type="text" class="form-control" id="tratamientos" placeholder="Tratamientos" name="tratamientos" value=" <?php echo $consultaOptometria['tratamientos']; ?>">
                                                         </div>
                                                    </div>
                                                    <div class="form-row mb-4">
                                                        <div class="form-group col-md-12">
                                                            <label for="tratamientos">Desarrollo del infante</label>
                                                            <input type="text" class="form-control" id="tratamientos" placeholder="Desarrollo del infante" name="desarrollo_infante" value=" <?php echo $consultaOptometria['desarrollo']; ?>">
                                                         </div>
                                                    </div>

                                                    <div class="form-row mb-4">
                                                        <div class="form-group col-md-3">
                                                            <label for="tratamientos">Nacimiento</label>
                                                            <input type="text" class="form-control" id="tratamientos" placeholder="Nacimiento" name="nacimiento" value=" <?php echo $consultaOptometria['nacimiento']; ?>">
                                                         </div>
                                                         <div class="form-group col-md-3">
                                                            <label for="tratamientos">Parto</label>
                                                            <input type="text" class="form-control" id="tratamientos" placeholder="Parto" name="parto" value=" <?php echo $consultaOptometria['parto']; ?>">
                                                         </div>
                                                         <div class="form-group col-md-3">
                                                            <label for="tratamientos">Gateo</label>
                                                            <input type="text" class="form-control" id="tratamientos" placeholder="Gateo" name="gateo" value=" <?php echo $consultaOptometria['gateo']; ?>">
                                                         </div>
                                                         <div class="form-group col-md-3">
                                                            <label for="tratamientos">Lenguaje</label>
                                                            <input type="text" class="form-control" id="tratamientos" placeholder="Lenguaje" name="lenguaje" value=" <?php echo $consultaOptometria['lenguaje']; ?>">
                                                         </div>
                                                    </div>

                                                    <div class="form-row mb-4">
                                                        <div class="form-group col-md-4">
                                                            <label for="tratamientos">Complicaciones Prenatales</label>
                                                            <input type="text" class="form-control" id="tratamientos" placeholder="Complicaciones Prenatales" name="complicaciones" value=" <?php echo $consultaOptometria['complicaciones']; ?>">
                                                         </div>
                                                         <div class="form-group col-md-4">
                                                            <label for="tratamientos">Perinatales</label>
                                                            <input type="text" class="form-control" id="tratamientos" placeholder="Perinatales" name="perinatales" value=" <?php echo $consultaOptometria['perinatales']; ?>">
                                                         </div>
                                                         <div class="form-group col-md-4">
                                                            <label for="tratamientos">Postnatales</label>
                                                            <input type="text" class="form-control" id="tratamientos" placeholder="Postnatales" name="postnatales" value=" <?php echo $consultaOptometria['postnatales']; ?>">
                                                         </div>
                                                    </div>

                                                     
                                                     <h6>AGUDEZA VISUAL:</h6>
                                                     <?php 
                                                         $decode_agudeza = json_decode($consultaOptometria['agudeza_visual'] , true);
                                                         
                                                      ?>
                                                     <div class="form-row mb-4">
                                                        <div class="form-group col-md-3">
                                                            <label for="tambor">Tambor Optocinético AO </label>
                                                            <input type="text" class="form-control" id="tambor" placeholder="Tambor Optocinético" name="tambor" value=" <?php echo $decode_agudeza['tambor']; ?>">
                                                         </div>
                                                         <div class="form-group col-md-3">
                                                            <label for="fija">Fija</label>
                                                            <input type="text" class="form-control" id="fija" placeholder="Fija" name="fija" value=" <?php echo $decode_agudeza['fija']; ?>">
                                                         </div>
                                                         <div class="form-group col-md-3">
                                                            <label for="sigue">Sigue</label>
                                                            <input type="text" class="form-control" id="sigue" placeholder="Sigue" name="sigue" value=" <?php echo $decode_agudeza['sigue']; ?>">
                                                         </div>
                                                         <div class="form-group col-md-3">
                                                            <label for="mantiene">Mantiene</label>
                                                            <input type="text" class="form-control" id="mantiene" placeholder="Mantiene" name="mantiene" value=" <?php echo $decode_agudeza['mantiene']; ?>">
                                                         </div>
                                                     </div>


                                                     <div class="form-row mb-4">
                                                        <div class="form-group col-md-4">
                                                            <label for="test">Test mirada prefencial OD </label>
                                                            <input type="text" class="form-control" id="test" placeholder="Test" name="test" value="<?php echo $decode_agudeza['test']; ?>">
                                                         </div>
                                                         <div class="form-group col-md-4">
                                                            <label for="oi">OI</label>
                                                            <input type="text" class="form-control" id="oi" placeholder="OI" name="a_oi" value="<?php echo $decode_agudeza['a_oi']; ?>">
                                                         </div>
                                                         <div class="form-group col-md-4">
                                                            <label for="ao">AO</label>
                                                            <input type="text" class="form-control" id="ao" placeholder="AO" name="a_ao" value="<?php echo $decode_agudeza['a_ao']; ?>">
                                                         </div>  
                                                     </div>



                                                   <div class="form-group">
                                                    <h5>RECETA</h5>
                                                    <?php 
                                                         $decode_lensometria = json_decode($consultaOptometria['lensometria'] , true);
                                                         
                                                      ?>
                                                   <div class="table-responsive">
                                                          <table class="table table-bordered">
                                                              <thead>
                                                                  <tr>
                                                                      <th class="text-center">RX</th>
                                                                      <th>ESFERA</th>
                                                                      <th>CILINDRO</th>
                                                                      <th>EJE</th>
                                                                      <th>P/BASE</th>
                                                                      <th>ADD</th>
                                                                  </tr>
                                                              </thead>
                                                              <tbody>
                                                                  <tr>
                                                                      <td class="text-center">Ojo Derecho </td>
                                                                      <td>
                                                                      <input type="text" class="form-control" placeholder="esfera_od" name="esfera_od" value="<?php echo $decode_lensometria['esfera_od']; ?>">
                                                                      </td>
                                                                      <td>                                                    
                                                                       <input type="text" class="form-control" placeholder="cilindro_od" name="cilindro_od" value="<?php echo $decode_lensometria['cilindro_od']; ?>">  
                                                                      </td>
                                                                      <td>                                                    
                                                                       <input type="text" class="form-control" placeholder="eje_od" name="eje_od" value="<?php echo $decode_lensometria['eje_od']; ?>">  
                                                                      </td>
                                                                      <td>                                                    
                                                                       <input type="text" class="form-control" placeholder="p_base_od" name="p_base_od" value="<?php echo $decode_lensometria['p_base_od']; ?>">  
                                                                      </td>
                                                                      <td>                                                    
                                                                       <input type="text" class="form-control" placeholder="add_od" name="add_od" value="<?php echo $decode_lensometria['add_od']; ?>">  
                                                                      </td>
                                                                  </tr>
                                                                  <tr>
                                                                      <td class="text-center">Ojo Izquierdo</td>
                                                                      <td>
                                                                      <input type="text" class="form-control" placeholder="esfera_oi" name="esfera_oi" value="<?php echo $decode_lensometria['esfera_oi']; ?>">
                                                                      </td>
                                                                      <td>                                                    
                                                                      <input type="text" class="form-control" placeholder="cilindro_oi" name="cilindro_oi" value="<?php echo $decode_lensometria['cilindro_oi']; ?>"> 
                                                                      </td>
                                                                      <td>                                                    
                                                                       <input type="text" class="form-control" placeholder="eje_oi" name="eje_oi" value="<?php echo $decode_lensometria['eje_oi']; ?>">  
                                                                      </td>
                                                                      <td>                                                    
                                                                       <input type="text" class="form-control" placeholder="p_base_oi" name="p_base_oi" value="<?php echo $decode_lensometria['p_base_oi']; ?>">  
                                                                      </td>
                                                                      <td>                                                    
                                                                       <input type="text" class="form-control" placeholder="add_oi" name="add_oi" value="<?php echo $decode_lensometria['add_oi']; ?>">  
                                                                      </td>
                                                                  </tr>
                                                              </tbody>
                                                          </table>
                                                       </div>
                                                   </div>
                                                    <?php 
                                                         $decode_lensometria_extra = json_decode($consultaOptometria['lensometria_extra'] , true);
                                                         
                                                    ?>

                                                   <div class="form-row mb-4">
                                                      <div class="form-group col-md-3">
                                                          <label for="objetivos">Tipo de lentes</label>
                                                          <input type="text" class="form-control" name="len_tipo_lentes" value="<?php echo $decode_lensometria_extra['len_tipo_lentes']; ?>">
                                                       </div>
                                                       <div class="form-group col-md-3">
                                                          <label for="objetivos">Filtros</label>
                                                          <input type="text" class="form-control" name="len_filtros" value="<?php echo $decode_lensometria_extra['len_filtros']; ?>">
                                                       </div>
                                                       <div class="form-group col-md-3">
                                                          <label for="objetivos">Tiempo</label>
                                                          <input type="text" class="form-control" name="len_tiempo" value="<?php echo $decode_lensometria_extra['len_tiempo']; ?>">
                                                       </div>
                                                       <div class="form-group col-md-3">
                                                          <label for="objetivos">Tipo de Aro</label>
                                                          <input type="text" class="form-control" name="len_tipo_aro" value="<?php echo $decode_lensometria_extra['len_tipo_aro']; ?>">
                                                       </div>
                                                   </div>

                                                   <?php 
                                                         $decode_sa_pp = json_decode($consultaOptometria['sa_pp'] , true);
                                                         
                                                    ?>

                                                   <div class="form-row mb-4">
                                                        <div class="form-group col-md-3">
                                                           <h5>Segmento Anterior</h5>
                                                        </div>
                                                       <div class="form-group col-md-3">
                                                            <h5>Polo Posterior</h5>
                                                       </div>
                                                   </div>
                                                   <div class="form-row mb-4">
                                                       <div class="form-group col-md-3">
                                                          <input type="text" class="form-control" placeholder="SA_OD" name="sa_od" value="<?php echo $decode_sa_pp['sa_od']; ?>">
                                                       </div>
                                                       <div class="form-group col-md-3">
                                                          <input type="text" class="form-control" placeholder="PP_OD" name="pp_od" value="<?php echo $decode_sa_pp['pp_od']; ?>">
                                                       </div>
                                                   </div> 
                                                   <div class="form-row mb-4">
                                                       <div class="form-group col-md-3">
                                                          <input type="text" class="form-control" placeholder="SA_OI" name="sa_oi" value="<?php echo $decode_sa_pp['sa_oi']; ?>">
                                                       </div>
                                                       <div class="form-group col-md-3">
                                                          <input type="text" class="form-control" placeholder="PP_OI" name="pp_oi" value="<?php echo $decode_sa_pp['pp_oi']; ?>">
                                                       </div>
                                                   </div> 
                                                </div>




                                                 <?php 
                                                    
                                                         $decode_pruebas_extras = json_decode($consultaOptometria['pruebas_extras'] , true);

                                                 ?>
                                                 
                                                 <div class="form-row mb-4">
                                                      <div class="form-group col-md-6">
                                                        <label for="tratamientos">Hirschberg</label>
                                                        <input type="text" class="form-control" id="D" placeholder="Hirschberg" name="hirschberg" value="<?php echo $decode_pruebas_extras['hirschberg']; ?>">
                                                      </div>
                                                      <div class="form-group col-md-6">
                                                         <label for="tratamientos">Krismsky</label>
                                                         <input type="text" class="form-control" id="I" placeholder="Krismsky" name="krismsky" value="<?php echo $decode_pruebas_extras['krismsky']; ?>">
                                                      </div>
                                                 </div>

<div class="form-row mb-4">
                                                        <div class="form-group col-md-12">
                                                            <label for="inputAddress">VERSIONES:</label>
                                                            <textarea id="textarea" class="form-control textarea" maxlength="10000" rows="15" placeholder="limite de 10000* caracteres." name="plan_versiones" ><?php echo $consultaOptometria['plan_versiones']; ?></textarea>
                                                        </div>
                                                      </div>


                                                 <div class="form-row mb-4">
                                                      <div class="form-group col-md-3">
                                                        <label for="tratamientos">CT: VP:</label>
                                                        <input type="text" class="form-control" id="D" placeholder="VP" name="ct_vp" value="<?php echo $decode_pruebas_extras['ct_vp']; ?>">
                                                      </div>
                                                      <div class="form-group col-md-3">
                                                         <label for="tratamientos">Reflejo Cocleopalpebral</label>
                                                         <input type="text" class="form-control" id="I" placeholder="Reflejo Cocleopalpebral" name="ct_reflejo" value="<?php echo $decode_pruebas_extras['ct_reflejo']; ?>">
                                                      </div>
                                                      <div class="form-group col-md-3">
                                                         <label for="tratamientos">Ducciones:OD</label>
                                                         <input type="text" class="form-control" id="I" placeholder="OD" name="ducciones_od" value="<?php echo $decode_pruebas_extras['ducciones_od']; ?>">
                                                      </div>
                                                      <div class="form-group col-md-3">
                                                         <label for="tratamientos">OI</label>
                                                         <input type="text" class="form-control" id="I" placeholder="OI" name="ducciones_oi" value="<?php echo $decode_pruebas_extras['ducciones_oi']; ?>"> 
                                                      </div>
                                                 </div>

                                                 <div class="form-row mb-4">
                                                    <div class="form-group col-md-8">
                                                         <label for="tratamientos">Posición Compensatoria</label>
                                                         <input type="text" class="form-control" id="I" placeholder="Posicion Compensatoria" name="posicion_compensatoria" value="<?php echo $decode_pruebas_extras['posicion_compensatoria']; ?>">
                                                      </div>
                                                 </div>


                                                 <div class="form-row mb-4">
                                                      <div class="form-group col-md-3">
                                                        <label for="tratamientos">Reflejos Pupilares: Fotomotor/OD </label>
                                                        <input type="text" class="form-control" id="D" placeholder="Fotomotor/OD" name="fotomotor_od" value="<?php echo $decode_pruebas_extras['fotomotor_od']; ?>">
                                                      </div>
                                                      <div class="form-group col-md-3">
                                                         <label for="tratamientos">Consensual</label>
                                                         <input type="text" class="form-control" id="I" placeholder="Consensual" name="consensual" value="<?php echo $decode_pruebas_extras['consensual']; ?>">
                                                      </div>
                                                      <div class="form-group col-md-3">
                                                         <label for="tratamientos">Fotomotor:OI</label>
                                                         <input type="text" class="form-control" id="I" placeholder="Fotomotor OI" name="fotomotor_oi" value="<?php echo $decode_pruebas_extras['fotomotor_oi']; ?>">
                                                      </div>
                                                      <div class="form-group col-md-3">
                                                         <label for="tratamientos">Consensual</label>
                                                         <input type="text" class="form-control" id="I" placeholder="Fotomotor Consensual" name="fotomotor_consensual" value="<?php echo $decode_pruebas_extras['fotomotor_consensual']; ?>">
                                                      </div>
                                                 </div>



                                         

                                                 
                                                   

                                                    <!--<h6>Dibujo de la posición de los ojos en PPM:  </h6>-->

                                                    <?php 
                                                         $decode_refraccion = json_decode($consultaOptometria['refraccion'] , true);

                                                 ?>

<div class="form-row mb-4">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputAddress">Reflejo retinoscopico OD:</label>
                                                            <input type="text" class="form-control" id="inputAddress" placeholder="Reflejo retinoscopico OD" name="reflejo_r_od" value="<?php echo $decode_refraccion['reflejo_r_od']; ?>">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="inputAddress">OI:</label>
                                                            <input type="text" class="form-control" id="inputAddress" placeholder="OI" name="reflejo_r_oi" value="<?php echo $decode_refraccion['reflejo_r_oi']; ?>">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="inputAddress">AO:</label>
                                                            <input type="text" class="form-control" id="inputAddress" placeholder="AO" name="reflejo_r_ao" value="<?php echo $decode_refraccion['reflejo_r_ao']; ?>">
                                                        </div>
                                                    </div>

                                                 <h5>RECETA FINAL</h5>
                                                 <div class="table-responsive">
                                                          <table class="table table-bordered">
                                                              <thead>
                                                                  <tr>
                                                                      <th class="text-center">RX</th>
                                                                      <th>ESFERA</th>
                                                                      <th>CILINDRO</th>
                                                                      <th>EJE</th>
                                                                      <th>P/BASE</th>
                                                                      <th>ADD</th>
                                                                  </tr>
                                                              </thead>
                                                              <tbody>
                                                                  <tr>
                                                                      <td class="text-center">Ojo Derecho</td>
                                                                      <td>
                                                                      <input type="text" class="form-control" placeholder="esfera_od" name="esfera_od_f" value="<?php echo $decode_refraccion['esfera_od_f']; ?>">
                                                                      </td>
                                                                      <td>                                                    
                                                                       <input type="text" class="form-control" placeholder="cilindro_od" name="cilindro_od_f" value="<?php echo $decode_refraccion['cilindro_od_f']; ?>">  
                                                                      </td>
                                                                      <td>                                                    
                                                                       <input type="text" class="form-control" placeholder="eje_od" name="eje_od_f" value="<?php echo $decode_refraccion['eje_od_f']; ?>">  
                                                                      </td>
                                                                      <td>                                                    
                                                                       <input type="text" class="form-control" placeholder="p_base_od" name="p_base_od_f" value="<?php echo $decode_refraccion['p_base_od_f']; ?>">  
                                                                      </td>
                                                                      <td>                                                    
                                                                       <input type="text" class="form-control" placeholder="add_od" name="add_od_f" value="<?php echo $decode_refraccion['add_od_f']; ?>">  
                                                                      </td>
                                                                  </tr>
                                                                  <tr>
                                                                      <td class="text-center">Ojo Izquierdo</td>
                                                                      <td>
                                                                      <input type="text" class="form-control" placeholder="esfera_oi" name="esfera_oi_f" value="<?php echo $decode_refraccion['esfera_oi_f']; ?>">
                                                                      </td>
                                                                      <td>                                                    
                                                                      <input type="text" class="form-control" placeholder="cilindro_oi" name="cilindro_oi_f" value="<?php echo $decode_refraccion['cilindro_oi_f']; ?>"> 
                                                                      </td>
                                                                      <td>                                                    
                                                                       <input type="text" class="form-control" placeholder="eje_oi" name="eje_oi_f" value="<?php echo $decode_refraccion['eje_oi_f']; ?>">  
                                                                      </td>
                                                                      <td>                                                    
                                                                       <input type="text" class="form-control" placeholder="p_base_oi" name="p_base_oi_f" value="<?php echo $decode_refraccion['p_base_oi_f']; ?>">  
                                                                      </td>
                                                                      <td>                                                    
                                                                       <input type="text" class="form-control" placeholder="add_oi" name="add_oi_f" value="<?php echo $decode_refraccion['add_oi_f']; ?>">  
                                                                      </td>
                                                                  </tr>
                                                              </tbody>
                                                          </table>
                                                       </div>
                                                   </div>
                                <div class="form-row mb-4">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputAddress">Tipo Lentes</label>
                                                            <input type="text" class="form-control" id="inputAddress" placeholder="Tipo Lentes" name="refraccion_tipo_lentes" value="<?php echo $decode_refraccion['refraccion_tipo_lentes']; ?>">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="inputAddress">PD:</label>
                                                            <input type="text" class="form-control" id="inputAddress" placeholder="PD" name="refraccion_pd" value="<?php echo $decode_refraccion['refraccion_pd']; ?>">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="inputAddress">USO:</label>
                                                            <input type="text" class="form-control" id="inputAddress" placeholder="USO" name="refraccion_uso" value="<?php echo $decode_refraccion['refraccion_uso']; ?>">
                                                        </div>
                                                    </div>

                                                    

                                                      <div class="form-row mb-4">
                                                        <div class="form-group col-md-12">
                                                            <label for="inputAddress">CONDUCTA A SEGUIR:</label>
                                                            <textarea id="textarea" class="form-control textarea" maxlength="10000" rows="15" placeholder="Esta área tiene un limite de 10000 caracteres." name="conducta_seguir" ><?php echo $consultaOptometria['conducta_seguir']; ?></textarea>
                                                        </div>
                                                      </div>

                                                      


                 
                                                 <input type="hidden" name="id_consulta" value="<?php echo $_GET['id_consulta']; ?>"> 
                                                 <input type="hidden"  name="editadoDoctor" value="<?php echo $_SESSION['nombre']; ?>"> 
                                                 <input type="hidden" name="editar_optometria_neonatos" value="editar">
                                                 <input type="hidden" name="actualizar" value="exito">
                                                 <button type="submit" class="btn btn-success mt-3">Editar Consulta</button>
                                                </form>
                                              
                                                  <?php

                                                   $editarConsulta = new  ControladorOptometriaNeonatos();
                                                   $editarConsulta -> ctrEditarConsultaOptometriaNeonatos();                                     
                                                   
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