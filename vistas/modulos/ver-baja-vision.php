<link href="vistas/assets/css/tables/table-basic.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="vistas/plugins/select2/select2.min.css">
<style type="text/css" media="print">
@media print {
#page-topbar {display:none;}
#footer {display:none;}
#imprimir {display:none;}
#header {display:none;}
#editado{display:none;}

p {
    font-size:20px;
}
}
.second_page{
  /* margin-top:1200px; */
  padding-top:20%;
}
.third_page {
    padding-top: 10%;
}
.reflejos{
    font-size:10px;
}
</style>
<div class="admin-data-content" style="margin-top:50px;">

  <div class="row layout-top-spacing" >
      <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
          <div class="widget-content-area br-4">
              <div class="widget-one">
              <a  id="imprimir" href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i class="fa fa-print m-r-5"></i> IMPRIMIR</a>

                  <div class="row">
                                    <div id="flFormsGrid" class="col-lg-12 layout-spacing">
                                        <div class="statbox widget box box-shadow">
                                            <div class="widget-header">
                                                <div class="row">
                                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                        <h4>Baja Vision</h4>
                                                    </div>                                                                        
                                                </div>
                                            </div>
                                         
                                            <?php
                              
                                             $item = 'id_consulta';
                                             
                                             $valor = $_GET['id_consulta'];
                                             
                                             $consultaBajaVision = ControladorConsultaBajaVision::ctrMostrarBajaVisionID($item, $valor);
                                            

                                                // echo '<pre>';
                                                // var_dump($consultaBajaVision);
                                                // echo '</pre>';


                                             
                                             ?>

                                           <nav class="breadcrumb-one" aria-label="breadcrumb">
                                               <ol class="breadcrumb" style="background: rgb(0 150 136 / 11%)!important;">
                                                   <li class="breadcrumb-item"><a href="javascript:void(0);">Doctor:</a></li>
                                                   <li class="breadcrumb-item active" aria-current="page"><b><?php echo $consultaBajaVision['doctor']; ?></b></li>
                                               </ol>
                                           </nav>
                                           <?php 
                                              $editado = json_decode($consultaBajaVision['editado'], true);

                                          
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
                                         
                                                <form  role="form" method="post">
                                                    <div class="form-row mb-4">

                  
                                                        <div class="form-group col-md-12">
                                                            <label for="inputEmail4">Paciente</label>
                                                            <!-- <select class="form-control form-small">
                                                               <option selected="selected">orange</option>
                                                               <option>white</option>
                                                               <option>purple</option>
                                                             </select> -->

                                                             <select class="form-control form-small" name="paciente" required>
                                                             <?php
                                                               
                                                               $item = 'id_paciente';
                                                               $valor = $consultaBajaVision['paciente'];
                                                              
                                                               $paciente = ControladorPacientes::ctrMostrarPacientes($item, $valor);

                                                          
                                                              
                                                                 echo '<option value="'.$paciente["id_paciente"].'"> Número Cedula: '.$paciente['nro_cedula'].' || Nombres: '.$paciente["nombres"].' '.$paciente['apellidos'].'</option>';
                                                              
                                                              ?>
                                                    
                                                             
                                                         
                                                             
                                                             </select>
                                                        </div>
                                                       
                                                    </div>
                                                    <div class="form-row mb-12">
                                                         <div class="form-group col-md-6">
                                                        <label for="inputSucursal">Sucursal</label>
                                                        <select class="form-control" id="sucursal" readonly name="sucursal">
                                                            <?php
                                                            $sucursales = ControladorSucursales::ctrMostrarSurcursales(null, null);
                                                            foreach ($sucursales as $key => $value) {
                                                                $selected = ($consultaBajaVision['sucursal'] == $value["id_sucursal"]) ? 'selected' : '';
                                                                echo '<option value="' . $value["id_sucursal"] . '" ' . $selected . '>' . $value['nombre'] . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                         <div class="form-group col-md-3">
                                                <label for="edad">Edad</label>
                                                <input type="text" class="form-control" id="edad" name="edad" value="<?php echo $consultaBajaVision['edad']; ?>" readonly>
                                            </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="inputAddress">Fecha de atencion</label>
                                                            <input disabled type="date" class="form-control" id="inputAddress" name="fecha_atencion" value="<?php echo $consultaBajaVision['fecha_atencion']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-row mb-4">
                                                        <div class="form-group col-md-12">
                                                            <label for="inputAddress">Motivo de Consulta:</label>
                                                            <textarea disabled id="textarea" class="form-control textarea" maxlength="225" rows="2" placeholder="Esta área tiene un limite de 225 caracteres." name="m_c"><?php echo $consultaBajaVision['m_c']?></textarea>
                                                        </div>
                                                      </div>
                                                    <div class="form-row mb-4">
                                                        
                                                        <div class="form-group col-md-4">
                                                            <label for="a_o">Antecendentes Oculares</label>
                                                            <input disabled type="text" class="form-control" id="a_o"  value="<?php echo $consultaBajaVision['a_o']?>">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="a_P">Antecedentes personales</label>
                                                            <input disabled type="text" class="form-control" id="a_P"  value="<?php echo $consultaBajaVision['a_p']?>">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="a_f">Antecedentes familiares</label>
                                                            <input disabled type="text" class="form-control" id="a_f"  value="<?php echo $consultaBajaVision['a_f']?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-row mb-4">
                                                        <div class="form-group col-md-12">
                                                            <label for="medicamentos">Medicamentos</label>
                                                            <input disabled type="text" class="form-control" id="medicamentos" value="<?php echo $consultaBajaVision['medicamentos']?>">
                                                         </div>
                                                    </div>
                                                    <div class="form-row mb-4">
                                                        <div class="form-group col-md-12">
                                                            <label for="tratamientos">Tratamientos anteriores</label>
                                                            <input disabled type="text" class="form-control" id="tratamientos" value="<?php echo $consultaBajaVision['tratamientos']?>">
                                                         </div>
                                                    </div>
                                                    <div class="form-row mb-4">
                                                        <div class="form-group col-md-6">
                                                            <label for="dx_oftalmoligico">DX. Oftalmologico Principal</label>
                                                            <input disabled type="text" class="form-control" id="dx_oftalmoligico" value="<?php echo $consultaBajaVision['dx_oft_princ']?>">
                                                         </div>
                                                         <div class="form-group col-md-6">
                                                            <label for="objetivos">Objetivos de paciente</label>
                                                            <input disabled type="text" class="form-control" id="objetivos" value="<?php echo $consultaBajaVision['objetivos']?>">
                                                         </div>
                                                    </div>

                                                 <div class="form-row mb-4">
                                                      <div class="form-group col-md-6">
                                                            <div class="table-responsive">
                                                              <table class="table table-bordered">
                                                                  <?php 
                                                                     $decode_av_sc = json_decode($consultaBajaVision['av_sc'] , true);
                                                                     
                                                                  ?>
                                                                  <thead>
                                                                      <tr>
                                                                          <th class="text-center">AV/SC</th>
                                                                          <th>OD</th>
                                                                          <th>OI</th>
                                                                      </tr>
                                                                  </thead>
                                                                  <tbody>
                                                                      <tr>
                                                                          <td class="text-center">VL</td>
                                                                          <td>
                                                                          <input disabled type="text" class="form-control" placeholder="od_vl" name="av/sc_od_vl" value="<?php echo $decode_av_sc['av_sc_od_vl']; ?>">
                                                                          </td>
                                                                          <td>                                                    
                                                                           <input disabled type="text" class="form-control" placeholder="oi_vl" name="av/sc_oi_vl" value="<?php echo $decode_av_sc['av_sc_oi_vl']; ?>">    
                                                                          </td>
                                                                      </tr>
                                                                      <tr>
                                                                          <td class="text-center">VP</td>
                                                                          <td>
                                                                          <input disabled type="text" class="form-control" placeholder="od_vp" name="av/sc_od_vp" value="<?php echo $decode_av_sc['av_sc_od_vp']; ?>">
                                                                          </td>
                                                                          <td>                                                    
                                                                          <input disabled type="text" class="form-control" placeholder="oi_vp" name="av/sc_oi_vp" value="<?php echo $decode_av_sc['av_sc_oi_vp']; ?>"> 
                                                                          </td>
                                                                      </tr>
                                                                      <tr>
                                                                          <td class="text-center">PH</td>
                                                                          <td>
                                                                          <input disabled type="text" class="form-control" placeholder="od_ph" name="av/sc_od_ph" value="<?php echo $decode_av_sc['av_sc_od_ph']; ?>"> 
                                                                          </td>
                                                                          <td>                                                    
                                                                          <input disabled type="text" class="form-control" placeholder="oi_ph" name="av/sc_oi_ph" value="<?php echo $decode_av_sc['av_sc_oi_ph']; ?>"> 
                                                                          </td>
                                                                      </tr>
                                                                  </tbody>
                                                              </table>
                                                           </div>
                                                       </div>
                                                       <div class="form-group col-md-6">
                                                            <div class="table-responsive">
                                                              <table class="table table-bordered">
                                                                  <?php 
                                                                     $decode_av_cc = json_decode($consultaBajaVision['av_cc'] , true);
                                                                     
                                                                  ?>
                                                                  <thead>
                                                                      <tr>
                                                                          <th class="text-center">AV/CC</th>
                                                                          <th>OD</th>
                                                                          <th>OI</th>
                                                                      </tr>
                                                                  </thead>
                                                                  <tbody>
                                                                      <tr>
                                                                          <td class="text-center">VL</td>
                                                                          <td>
                                                                          <input disabled type="text" class="form-control" placeholder="od_vl" name="av/cc_od_vl" value="<?php echo $decode_av_cc['av_cc_od_vl']; ?>">
                                                                          </td>
                                                                          <td>                                                    
                                                                           <input disabled type="text" class="form-control" placeholder="oi_vl" name="av/cc_oi_vl" value="<?php echo $decode_av_cc['av_cc_oi_vl']; ?>">   
                                                                          </td>
                                                                      </tr>
                                                                      <tr>
                                                                          <td class="text-center">VP</td>
                                                                          <td>
                                                                          <input disabled type="text" class="form-control" placeholder="od_vp" name="av/cc_od_vp" value="<?php echo $decode_av_cc['av_cc_od_vp']; ?>">
                                                                          </td>
                                                                          <td>                                                    
                                                                          <input disabled type="text" class="form-control" placeholder="oi_vp" name="av/cc_oi_vp" value="<?php echo $decode_av_cc['av_cc_oi_vp']; ?>"> 
                                                                          </td>
                                                                      </tr>
                                                                      <tr>
                                                                          <td class="text-center">PH</td>
                                                                          <td>
                                                                          <input disabled type="text" class="form-control" placeholder="od_ph" name="av/cc_od_ph" value="<?php echo $decode_av_cc['av_cc_od_ph']; ?>"> 
                                                                          </td>
                                                                          <td>                                                    
                                                                          <input disabled type="text" class="form-control" placeholder="oi_ph" name="av/cc_oi_ph" value="<?php echo $decode_av_cc['av_cc_oi_ph']; ?>"> 
                                                                          </td>
                                                                      </tr>
                                                                  </tbody>
                                                              </table>
                                                           </div>
                                                       </div>
                                                 </div>
                                                 
                                                <!-- <label for="tratamientos">Vision Excéntrica</label>
                                                      <?php 
                                                         $decode_vision_exentrica = json_decode($consultaBajaVision['vision_exentrica'] , true);
                                                         
                                                      ?>
                                                 <div class="form-row mb-4">
                                                      <div class="form-group col-md-2">
                                                        <input disabled type="text" class="form-control" id="D" placeholder="D" name="ve_D" value="<?php echo $decode_vision_exentrica['ve_D']; ?>">
                                                      </div>
                                                      <div class="form-group col-md-2">
                                                         <input disabled type="text" class="form-control" id="I" placeholder="I" name="ve_I" value="<?php echo $decode_vision_exentrica['ve_I']; ?>">
                                                      </div>
                                                 </div>-->


                                             
                                                <div class="form-group second_page">
                                                    <h5>RECETA</h5>
                                                   <div class="table-responsive">
                                                          <table class="table table-bordered">
                                                          <?php 
                                                            $decode_lensometria = json_decode($consultaBajaVision['lensometria'] , true);
                                                         
                                                           ?>
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
                                                                      <input disabled type="text" class="form-control"  placeholder="esfera_od"  name="esfera_od" value="<?php echo $decode_lensometria['esfera_od']; ?>">
                                                                      </td>
                                                                      <td>                                                
                                                                       <input disabled type="text" class="form-control" placeholder="cilindro_od"  name="cilindro_od"  value="<?php echo $decode_lensometria['cilindro_od']; ?>" >  
                                                                      </td>
                                                                      <td>                                              
                                                                       <input disabled type="text" class="form-control" placeholder="eje_od"  name="eje_od"  value="<?php echo $decode_lensometria['eje_od']; ?>">  
                                                                      </td>
                                                                      <td>                                               
                                                                       <input disabled type="text" class="form-control" placeholder="p_base_od"  name="p_base_od"  value="<?php echo $decode_lensometria['p_base_od']; ?>">  
                                                                      </td>
                                                                      <td>                                                    
                                                                       <input disabled type="text" class="form-control" placeholder="add_od"  name="add_od"  value="<?php echo $decode_lensometria['add_od']; ?>">  
                                                                      </td>
                                                                  </tr>
                                                                  <tr>
                                                                      <td class="text-center">Ojo Izquierdo</td>
                                                                      <td>
                                                                      <input disabled type="text" class="form-control" placeholder="esfera_oi" name="esfera_oi" value="<?php echo $decode_lensometria['esfera_oi']; ?>">
                                                                      </td>
                                                                      <td>                                                    
                                                                      <input disabled type="text" class="form-control" placeholder="cilindro_oi" name="cilindro_oi" value="<?php echo $decode_lensometria['cilindro_oi']; ?>"> 
                                                                      </td>
                                                                      <td>                                                    
                                                                       <input disabled type="text" class="form-control" placeholder="eje_oi"  name="eje_oi" value="<?php echo $decode_lensometria['eje_oi']; ?>">  
                                                                      </td>
                                                                      <td>                                                    
                                                                       <input disabled type="text" class="form-control" placeholder="p_base_oi" name="p_base_oi" value="<?php echo $decode_lensometria['p_base_oi']; ?>">  
                                                                      </td>
                                                                      <td>                                                    
                                                                       <input disabled type="text" class="form-control" placeholder="add_oi" name="add_oi" value="<?php echo $decode_lensometria['add_oi']; ?>">  
                                                                      </td>
                                                                  </tr>
                                                              </tbody>
                                                          </table>
                                                       </div>
                                                   </div>

                                                   <?php 
                                                            $decode_lensometria_extra = json_decode($consultaBajaVision['lensometria_extra'] , true);
                                                         
                                                   ?>
                                                   <div class="form-row mb-4">
                                                      <div class="form-group col-md-3">
                                                          <label for="objetivos">Tipo de lentes</label>
                                                          <input disabled type="text" class="form-control" name="len_tipo_lentes"  value="<?php echo $decode_lensometria_extra['len_tipo_lentes']; ?>">
                                                       </div>
                                                       <div class="form-group col-md-3">
                                                          <label for="objetivos">Filtros</label>
                                                          <input disabled type="text" class="form-control" name="len_filtros"  value="<?php echo $decode_lensometria_extra['len_filtros']; ?>">
                                                       </div>
                                                       <div class="form-group col-md-3">
                                                          <label for="objetivos">Tiempo</label>
                                                          <input disabled type="text" class="form-control" name="len_tiempo"  value="<?php echo $decode_lensometria_extra['len_tiempo']; ?>">
                                                       </div>
                                                       <div class="form-group col-md-3">
                                                          <label for="objetivos">Tipo de Aro</label>
                                                          <input disabled type="text" class="form-control" name="len_tipo_aro"  value="<?php echo $decode_lensometria_extra['len_tipo_aro']; ?>">
                                                       </div>
                                                   </div>
                                                   <div class="form-row mb-4">
                                                        <div class="form-group col-md-3">
                                                           <h5>CV.CONFRONTACION</h5>
                                                        </div>
                                                       <div class="form-group col-md-3">
                                                            <h5>SALUD OCULAR</h5>
                                                       </div>
                                                   </div>
                                                   <?php 
                                                            $decode_cv_so = json_decode($consultaBajaVision['cv_so'] , true);
                                                         
                                                   ?>
                                                   <div class="form-row mb-4">
                                                       <div class="form-group col-md-3">
                                                          <input disabled type="text" class="form-control" placeholder="OD" name="cv_od" value="<?php echo $decode_cv_so['cv_od']; ?>">
                                                       </div>
                                                       <div class="form-group col-md-3">
                                                          <input disabled type="text" class="form-control" placeholder="OD" name="so_od" value="<?php echo $decode_cv_so['so_od']; ?>">
                                                       </div>
                                                   </div> 
                                                   <div class="form-row mb-4">
                                                       <div class="form-group col-md-3">
                                                          <input disabled type="text" class="form-control" placeholder="OI" name="cv_oi" value="<?php echo $decode_cv_so['cv_oi']; ?>">
                                                       </div>
                                                       <div class="form-group col-md-3">
                                                          <input disabled type="text" class="form-control" placeholder="OI" name="so_oi" value="<?php echo $decode_cv_so['so_oi']; ?>">
                                                       </div>
                                                   </div> 
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h6>AMSLER</h6>
                                                        <?php 
                                                            $decode_amsler = json_decode($consultaBajaVision['amsler'] , true);
                                                         
                                                        ?>
                                                        <div class="form-row mb-4">
                                                             <div class="form-group col-md-6">
                                                                <input disabled  type="text" class="form-control" placeholder="OD" name="amsler_od" value="<?php echo $decode_amsler['amsler_od']; ?>">
                                                             </div>
                                                             <div class="form-group col-md-6">
                                                                <input disabled type="text" class="form-control" placeholder="OI" name="amsler_oi" value="<?php echo $decode_amsler['amsler_oi']; ?>">
                                                             </div>
                                                         </div> 
                                                      </div>     
                                                      <div class="col-md-6">
                                                         <h6>SENSIBILIDAD AL CONTRASTE</h6>
                                                         <?php 
                                                            $decode_sensibilidad_c = json_decode($consultaBajaVision['sensibilidad_c'] , true);
                                                         
                                                        ?>
                                                         <div class="form-row mb-4">
                                                             <div class="form-group col-md-6">
                                                                <input disabled type="text" class="form-control" placeholder="OD" name="sensibilidad_od" value="<?php echo $decode_sensibilidad_c['sensibilidad_od']; ?>">
                                                             </div>
                                                             <div class="form-group col-md-6">
                                                                <input disabled type="text" class="form-control" placeholder="OI" name="sensibilidad_oi" value="<?php echo $decode_sensibilidad_c['sensibilidad_oi']; ?>">
                                                             </div>
                                                          </div> 
                                                        </div>
                                                 </div>

                                                <div class="form-row mb-4">
                                                        <div class="form-group col-md-12">
                                                            <label for="inputAddress">Versiones</label>
                                                            <textarea disabled  id="textarea" class="form-control textarea" maxlength="225" rows="2" placeholder="Esta área tiene un limite de 225 caracteres." name="plan_versiones">
                                                            <?php echo $consultaBajaVision['plan_versiones']?>
                                                            </textarea>
                                                        </div>
                                                      </div>
                                                
                                                  


                                                    <div class="table-responsive">
                                                          <table class="table table-bordered">
                                                          <?php 
                                                            $decode_pruebas = json_decode($consultaBajaVision['pruebas'] , true);
                                                         
                                                          ?>
                                                              <thead>
                                                                  <tr>
                                                                      <th class="text-center">PRUEBAS SENSORIALES</th>
                                                                      <th>VISION LEJANA</th>
                                                                      <th>VISION PROXIMA</th>
                                                                  </tr>
                                                              </thead>
                                                              <tbody>
                                                                  <tr>
                                                                      <td class="text-center">Luces de Worth</td>
                                                                      <td>
                                                                      <input disabled type="text" class="form-control" name="vl_luces" placeholder="vl_luces" value="<?php echo $decode_pruebas['vl_luces']; ?>">
                                                                      </td>
                                                                      <td>                                                    
                                                                       <input disabled type="text" class="form-control" name="vp_luces" placeholder="vp_luces" value="<?php echo $decode_pruebas['vp_luces']; ?>">  
                                                                      </td>
                                                                  </tr>
                                                              </tbody>
                                                          </table>
                                                       </div>

                                                      <div class="form-row mb-4">
                                                        <div class="form-group col-md-12">
                                                            <label for="inputAddress">Visión de Color</label>
                                                            <input disabled type="text" class="form-control" id="inputAddress" placeholder="Visión de Color" name="vision_color" value="<?php echo $decode_pruebas['vision_color']; ?>">
                                                        </div>
                                                      </div>

                                                      <div class="form-row mb-4">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputAddress">Ojo Derecho</label>
                                                            <input disabled type="text" class="form-control" id="inputAddress" placeholder="OD" name="prueba_od" value="<?php echo $decode_pruebas['prueba_od']; ?>">
                                                        </div>
                                                        <div class="prueba_od-group col-md-6">
                                                            <label for="inputAddress">Ojo Izquierdo</label>
                                                            <input disabled type="text" class="form-control" id="inputAddress" placeholder="OI" name="prueba_oi" value="<?php echo $decode_pruebas['prueba_oi']; ?>">
                                                        </div>
                                                      </div>

                                                         <?php 
                                                            $decode_refraccion = json_decode($consultaBajaVision['refraccion'] , true);
                                                         
                                                           ?>
                                                    <div class="form-group">
                                                    <h5>RECETA FINAL PARA DISTANCIA</h5>
                                                   <div class="table-responsive">
                                                          <table class="table table-bordered">
                                                        
                                                              <thead>
                                                                  <tr>
                                                                      <th class="text-center">RX</th>
                                                                      <th>ESFERA</th>
                                                                      <th>CILINDRO</th>
                                                                      <th>EJE</th>
                                                                      <th>P/BASE</th>
                                                                      <th>AGUDEZA VISUAL</th>
                                                                  </tr>
                                                              </thead>
                                                              <tbody>
                                                                  <tr>
                                                                      <td class="text-center">Ojo Derecho</td>
                                                                      <td>
                                                                      <input disabled type="text" class="form-control"  placeholder="esfera_od"  name="esfera_od_f" value="<?php echo $decode_refraccion['esfera_od_f']; ?>">
                                                                      </td>
                                                                      <td>                                                
                                                                       <input disabled type="text" class="form-control" placeholder="cilindro_od"  name="cilindro_od_f"  value="<?php echo $decode_refraccion['cilindro_od_f']; ?>" >  
                                                                      </td>
                                                                      <td>                                              
                                                                       <input disabled type="text" class="form-control" placeholder="eje_od"  name="eje_od_f"  value="<?php echo $decode_refraccion['eje_od_f']; ?>">  
                                                                      </td>
                                                                      <td>                                               
                                                                       <input disabled type="text" class="form-control" placeholder="p_base_od"  name="p_base_od_f"  value="<?php echo $decode_refraccion['p_base_od_f']; ?>">  
                                                                      </td>
                                                                      <td>                                                    
                                                                       <input disabled type="text" class="form-control" placeholder="agz_od"  name="agz_od_f"  value="<?php echo $decode_refraccion['agz_od_f']; ?>">  
                                                                      </td>
                                                                  </tr>
                                                                  <tr>
                                                                      <td class="text-center">Ojo Izquierdo</td>
                                                                      <td>
                                                                      <input disabled type="text" class="form-control" placeholder="esfera_oi" name="esfera_oi_f" value="<?php echo $decode_refraccion['esfera_oi_f']; ?>">
                                                                      </td>
                                                                      <td>                                                    
                                                                      <input disabled type="text" class="form-control" placeholder="cilindro_oi" name="cilindro_oi_f" value="<?php echo $decode_refraccion['cilindro_oi_f']; ?>"> 
                                                                      </td>
                                                                      <td>                                                    
                                                                       <input disabled type="text" class="form-control" placeholder="eje_oi"  name="eje_oi_f" value="<?php echo $decode_refraccion['eje_oi_f']; ?>">  
                                                                      </td>
                                                                      <td>                                                    
                                                                       <input disabled type="text" class="form-control" placeholder="p_base_oi" name="p_base_oi_f" value="<?php echo $decode_refraccion['p_base_oi_f']; ?>">  
                                                                      </td>
                                                                      <td>                                                    
                                                                       <input disabled type="text" class="form-control" placeholder="agz_oi" name="agz_oi_f" value="<?php echo $decode_refraccion['agz_oi_f']; ?>">  
                                                                      </td>
                                                                  </tr>
                                                              </tbody>
                                                          </table>
                                                       </div>
                                                   </div>

                                                   <div class="form-row mb-4">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputAddress">TIPO DE LENTE</label>
                                                            <input disabled type="text" class="form-control" id="inputAddress" placeholder="Marca" name="lentes_marca_1" value="<?php echo $decode_refraccion['lentes_marca_1']; ?>">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label for="inputAddress">PD:</label>
                                                            <input disabled type="text" class="form-control" id="inputAddress" placeholder="Tipo" name="lentes_pd_1" value="<?php echo $decode_refraccion['lentes_pd_1']; ?>">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label for="inputAddress">PD:</label>
                                                            <input disabled type="text" class="form-control" id="inputAddress" placeholder="Tipo" name="lentes_dpn_1" value="<?php echo $decode_refraccion['lentes_dpn_1']; ?>">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label for="inputAddress">Altura:</label>
                                                            <input disabled type="text" class="form-control" id="inputAddress" placeholder="Tipo" name="lentes_altura_1" value="<?php echo $decode_refraccion['lentes_altura_1']; ?>">
                                                        </div>
                                                   </div>

<div class="form-group">
                                                    <h5>RECETA FINAL PARA CERCA</h5>
                                                   <div class="table-responsive">
                                                          <table class="table table-bordered">
                                                        
                                                              <thead>
                                                                  <tr>
                                                                      <th class="text-center">RX</th>
                                                                      <th>ESFERA</th>
                                                                      <th>CILINDRO</th>
                                                                      <th>EJE</th>
                                                                      <th>P/BASE</th>
                                                                      <th>AGUDEZA VISUAL</th>
                                                                  </tr>
                                                              </thead>
                                                              <tbody>
                                                                  <tr>
                                                                      <td class="text-center">Ojo Derecho</td>
                                                                      <td>
                                                                      <input disabled type="text" class="form-control"  placeholder="esfera_od"  name="esfera_od_fc" value="<?php echo $decode_refraccion['esfera_od_fc']; ?>">
                                                                      </td>
                                                                      <td>                                                
                                                                       <input disabled type="text" class="form-control" placeholder="cilindro_od"  name="cilindro_od_fc"  value="<?php echo $decode_refraccion['cilindro_od_fc']; ?>" >  
                                                                      </td>
                                                                      <td>                                              
                                                                       <input disabled type="text" class="form-control" placeholder="eje_od"  name="eje_od_fc"  value="<?php echo $decode_refraccion['eje_od_fc']; ?>">  
                                                                      </td>
                                                                      <td>                                               
                                                                       <input disabled type="text" class="form-control" placeholder="p_base_od"  name="p_base_od_fc"  value="<?php echo $decode_refraccion['p_base_od_fc']; ?>">  
                                                                      </td>
                                                                      <td>                                                    
                                                                       <input disabled type="text" class="form-control" placeholder="agz_od"  name="agz_od_fc"  value="<?php echo $decode_refraccion['agz_od_fc']; ?>">  
                                                                      </td>
                                                                  </tr>
                                                                  <tr>
                                                                      <td class="text-center">Ojo Izquierdo</td>
                                                                      <td>
                                                                      <input disabled type="text" class="form-control" placeholder="esfera_oi" name="esfera_oi_fc" value="<?php echo $decode_refraccion['esfera_oi_fc']; ?>">
                                                                      </td>
                                                                      <td>                                                    
                                                                      <input disabled type="text" class="form-control" placeholder="cilindro_oi" name="cilindro_oi_fc" value="<?php echo $decode_refraccion['cilindro_oi_fc']; ?>"> 
                                                                      </td>
                                                                      <td>                                                    
                                                                       <input disabled type="text" class="form-control" placeholder="eje_oi"  name="eje_oi_fc" value="<?php echo $decode_refraccion['eje_oi_fc']; ?>">  
                                                                      </td>
                                                                      <td>                                                    
                                                                       <input disabled type="text" class="form-control" placeholder="p_base_oi" name="p_base_oi_fc" value="<?php echo $decode_refraccion['p_base_oi_fc']; ?>">  
                                                                      </td>
                                                                      <td>                                                    
                                                                       <input disabled type="text" class="form-control" placeholder="agz_oi" name="agz_oi_fc" value="<?php echo $decode_refraccion['agz_oi_fc']; ?>">  
                                                                      </td>
                                                                  </tr>
                                                              </tbody>
                                                          </table>
                                                       </div>
                                                   </div>

                                                   <div class="form-row mb-4">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputAddress">Tipo Lentes</label>
                                                            <input disabled type="text" class="form-control" id="inputAddress" placeholder="Tipo Lentes" name="lentes_marca_2" value="<?php echo $decode_refraccion['lentes_marca_2']; ?>">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label for="inputAddress">PD:</label>
                                                            <input disabled type="text" class="form-control" id="inputAddress" placeholder="PD" name="lentes_pd_2" value="<?php echo $decode_refraccion['lentes_pd_2']; ?>">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label for="inputAddress">DNP:</label>
                                                            <input disabled type="text" class="form-control" id="inputAddress" placeholder="USO" name="lentes_dnp_2" value="<?php echo $decode_refraccion['lentes_dnp_2']; ?>">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label for="inputAddress">ALTURA:</label>
                                                            <input disabled type="text" class="form-control" id="inputAddress" placeholder="USO" name="lentes_altura_2" value="<?php echo $decode_refraccion['lentes_altura_2']; ?>">
                                                        </div>
                                                    </div>

                                                    <!--<div class="form-row mb-4">
                                                        <div class="form-group col-md-3">
                                                            <label for="inputAddress">Tipo Lente Lejos</label>
                                                            <input disabled type="text" class="form-control" id="inputAddress" placeholder="Tipo Lente Lejos" name="tipo_lente_lejos" value="<?php echo $decode_refraccion['tipo_lente_lejos']; ?>">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="inputAddress">Tipo Lente Cerca</label>
                                                            <input disabled type="text" class="form-control" id="inputAddress" placeholder="Tipo Lente Cerca" name="tipo_lente_cerca" value="<?php echo $decode_refraccion['tipo_lente_cerca']; ?>">
                                                        </div>
                                                    </div>-->

                                                      <div class="form-row mb-4">
                                                        <div class="form-group col-md-12">
                                                            <label for="inputAddress">Ayudas Opticas Para Baja Visión</label>
                                                            <textarea disabled id="textarea" class="form-control textarea" maxlength="225" rows="2" placeholder="Esta área tiene un limite de 225 caracteres." name="ayudas_opticas" >
                                                            <?php echo $consultaBajaVision['ayudas_opticas']?>
                                                            </textarea>
                                                        </div>
                                                      </div>


                                                      <div class="form-row mb-4">
                                                        <div class="form-group col-md-12">
                                                            <label for="inputAddress">Ayudas No Opticas Para Baja Visión</label>
                                                            <textarea disabled  id="textarea" class="form-control textarea" maxlength="225" rows="2" placeholder="Esta área tiene un limite de 225 caracteres." name="ayudas_no_opticas">
                                                            <?php echo $consultaBajaVision['ayudas_no_opticas']?>
                                                            </textarea>
                                                        </div>
                                                      </div>


                                                      <div class="form-row mb-4">
                                                        <div class="form-group col-md-12">
                                                            <label for="inputAddress">Plan de Rehabilitación Visual</label>
                                                            <textarea disabled id="textarea" class="form-control textarea" maxlength="225" rows="2" placeholder="Esta área tiene un limite de 225 caracteres." name="plan_rehabilitacion">
                                                            <?php echo $consultaBajaVision['plan_rehabilitacion']?>
                                                            </textarea>
                                                        </div>
                                                      </div>

                                                      

                                           
                                                </form>
                                             
                                
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