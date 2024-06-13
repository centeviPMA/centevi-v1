<link href="vistas/assets/css/tables/table-basic.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="vistas/plugins/select2/select2.min.css">
<link rel="stylesheet" type="text/css" href="vistas/assets/css/forms/theme-checkbox-radio.css">


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
  padding-top:10%;
}
.third_page {
    padding-top: 10%;
}
</style>
<div class="admin-data-content" style="margin-top:50px;">

  <div class="row layout-top-spacing" >
      <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
          <div class="widget-content-area br-4">
              <div class="widget-one">
              <a id="imprimir" href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i class="fa fa-print m-r-5"></i> IMPRIMIR</a>

                  <div class="row">
                                    <div id="flFormsGrid" class="col-lg-12 layout-spacing">
                                        <div class="statbox widget box box-shadow">
                                            <div class="widget-header">
                                                <div class="row">
                                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                        <h4>ORTOPTICA</h4>
                                                    </div>                                                                        
                                                </div>
                                            </div>
                                            <div class="widget-content widget-content-area">

                                            <?php
                              
                                               $item = 'id_consulta';
                                               
                                               $valor = $_GET['id_consulta'];
                                               
                                               $consultaOrtoptica = ControladorOrtopticaAdultos::ctrMostrarOrtopticaAdultosID($item, $valor);
                                              

                                                //   echo '<pre>';
                                                //   var_dump($consultaOrtoptica);
                                                //   echo '</pre>';


                                               
                                               ?>
                                            <nav class="breadcrumb-one" aria-label="breadcrumb">
                                               <ol class="breadcrumb" style="background: rgb(0 150 136 / 11%)!important;">
                                                   <li class="breadcrumb-item"><a href="javascript:void(0);">Doctor:</a></li>
                                                   <li class="breadcrumb-item active" aria-current="page"><b><?php echo $consultaOrtoptica['doctor']; ?></b></li>
                                               </ol>
                                             </nav>

                                             <?php 
                                              $editado = json_decode($consultaOrtoptica['editado'], true);

                                          
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
        
                                                  <form  role="form" method="post">
                                                    <div class="form-row mb-4">
                                                        <div class="form-group col-md-12">
                                                            <label for="inputEmail4">Paciente:</label>
                                                        

                                                            
                                                             
                                                             <?php
                                                             
                                                             $item = 'id_paciente';
                                                             $valor = $consultaOrtoptica['paciente'];
                                                           
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
                                                        <select class="form-control" id="sucursal" readonly name="sucursal">
                                                            <?php
                                                            $sucursales = ControladorSucursales::ctrMostrarSurcursales(null, null);
                                                            foreach ($sucursales as $key => $value) {
                                                                $selected = ($consultaOrtoptica['sucursal'] == $value["id_sucursal"]) ? 'selected' : '';
                                                                echo '<option value="' . $value["id_sucursal"] . '" ' . $selected . '>' . $value['nombre'] . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                         <div class="form-group col-md-3">
                                                <label for="edad">Edad</label>
                                                <input type="text" class="form-control" id="edad" name="edad" value="<?php echo $consultaOrtoptica['edad']; ?>" readonly>
                                            </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="inputAddress">Fecha de atencion</label>
                                                            <input disabled type="date" class="form-control" id="inputAddress" name="fecha_atencion" value="<?php echo $consultaOrtoptica['fecha_atencion']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-row mb-4">
                                                        <div class="form-group col-md-12">
                                                            <label for="inputAddress">M/C:</label>
                                                            <textarea disabled id="textarea" class="form-control textarea" maxlength="225" rows="2" placeholder="Esta área tiene un limite de 225 caracteres." name="m_c" ><?php echo $consultaOrtoptica['m_c']; ?></textarea>
                                                        </div>
                                                      </div>
                                                    <div class="form-row mb-4">
                                                        <div class="form-group col-md-4">
                                                            <label for="lugarNacimiento">A/O</label>
                                                            <input disabled type="text" class="form-control" id="lugarNacimiento" placeholder="A/O" name="a_o" value="<?php echo $consultaOrtoptica['a_o']; ?>">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="inputAddress2">A/P</label>
                                                            <input disabled type="text" class="form-control" id="inputAddress2" placeholder="A/P" name="a_p" value="<?php echo $consultaOrtoptica['a_p']; ?>">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="inputAddress2">A/F</label>
                                                            <input disabled type="text" class="form-control" id="inputAddress2" placeholder="A/F" name="a_f" value="<?php echo $consultaOrtoptica['a_f']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-row mb-4">
                                                        <div class="form-group col-md-12">
                                                            <label for="medicamentos">Medicamentos</label>
                                                            <input disabled type="text" class="form-control" id="medicamentos" placeholder="Medicamentos" name="medicamentos" value="<?php echo $consultaOrtoptica['medicamentos']; ?>">
                                                         </div>
                                                    </div>
                                                    <div class="form-row mb-4">
                                                        <div class="form-group col-md-12">
                                                            <label for="tratamientos">Tratamientos anteriores</label>
                                                            <input disabled type="text" class="form-control" id="tratamientos" placeholder="Tratamientos" name="tratamientos" value="<?php echo $consultaOrtoptica['tratamientos']; ?>">
                                                         </div>
                                                    </div>
                                                   
                                                     <?php 
                                                         $decode_av_sc = json_decode($consultaOrtoptica['av_sc'] , true);
                                                    
                                                      ?>
                            
                                                     
                                                    <div class="form-row mb-4">
                                                      <div class="form-group col-md-6">
                                                            <div class="table-responsive">
                                                              <table class="table table-bordered">
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

                                                       <?php 
                                                         $decode_av_cc = json_decode($consultaOrtoptica['av_cc'] , true);
                                                    
                                                      ?>
                                                       <div class="form-group col-md-6">
                                                            <div class="table-responsive">
                                                              <table class="table table-bordered">
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
                                                                          <input disabled type="text" class="form-control" placeholder="od_vl" name="av/cc_od_vl" value="<?php echo $decode_av_cc['av_cc_oi_ph']; ?>" >
                                                                          </td>
                                                                          <td>                                                    
                                                                           <input disabled type="text" class="form-control" placeholder="oi_vl" name="av/cc_oi_vl" value="<?php echo $decode_av_cc['av_cc_oi_ph']; ?>">   
                                                                          </td>
                                                                      </tr>
                                                                      <tr>
                                                                          <td class="text-center">VP</td>
                                                                          <td>
                                                                          <input disabled type="text" class="form-control" placeholder="od_vp" name="av/cc_od_vp" value="<?php echo $decode_av_cc['av_cc_oi_ph']; ?>">
                                                                          </td>
                                                                          <td>                                                    
                                                                          <input disabled type="text" class="form-control" placeholder="oi_vp" name="av/cc_oi_vp" value="<?php echo $decode_av_cc['av_cc_oi_ph']; ?>"> 
                                                                          </td>
                                                                      </tr>
                                                                      <tr>
                                                                          <td class="text-center">PH</td>
                                                                          <td>
                                                                          <input disabled type="text" class="form-control" placeholder="od_ph" name="av/cc_od_ph" value="<?php echo $decode_av_cc['av_cc_oi_ph']; ?>"> 
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

                                             
                                                <div class="row">
                                                   <div class="col-md-6"> 
                                                      <h6>OJO DOMINANTE</h6>
                                                      <div class="form-row mb-4">
                                                        <div class="form-group col-md-3">
                                                           <div class="n-chk">
                                                             <label class="new-control new-radio radio-classic-success">
                                                               <input readonly type="radio" class="new-control-input" name="ojo_dominante" value="izquierdo" <?php if($consultaOrtoptica['ojo_dominante'] === 'izquierdo'){ echo "checked"; }  ?>>
                                                               <span class="new-control-indicator"></span>IZQUIEDO
                                                             </label>
                                                           </div>
                                                         </div>
                                                         <div class="form-group col-md-3">
                                                         <div class="n-chk">
                                                             <label class="new-control new-radio radio-classic-success">
                                                               <input readonly type="radio" class="new-control-input" name="ojo_dominante"  value="derecho" <?php if($consultaOrtoptica['ojo_dominante'] === 'derecho'){ echo "checked"; }  ?>>
                                                               <span class="new-control-indicator"></span>DERECHO
                                                             </label>
                                                           </div>
                                                         </div>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-6"> 
                                                    <h6>MANO DOMINANTE</h6>
                                                      <div class="form-row mb-4">
                                                        <div class="form-group col-md-3">
                                                           <div class="n-chk">
                                                             <label class="new-control new-radio radio-classic-success">
                                                               <input disabled type="radio" class="new-control-input" name="mano_dominante"  value="izquierda" <?php if($consultaOrtoptica['mano_dominante'] === 'derecha'){ echo "checked"; }  ?>>
                                                               <span class="new-control-indicator"></span>IZQUIEDA
                                                             </label>
                                                           </div>
                                                         </div>
                                                         <div class="form-group col-md-3">
                                                            <div class="n-chk">
                                                             <label class="new-control new-radio radio-classic-success">
                                                               <input disabled type="radio" class="new-control-input" name="mano_dominante" value="derecha" <?php if($consultaOrtoptica['mano_dominante'] === 'izquierda'){ echo "checked"; }  ?>>
                                                               <span class="new-control-indicator"></span>DERECHA
                                                             </label>
                                                           </div>
                                                         </div>
                                                      </div>
                                                    </div>

                                                 </div>


                                                
                                                   <?php 
                                                         $decode_lensometria = json_decode($consultaOrtoptica['lensometria'] , true);
                                                    
                                                    ?>


                                                   <div class="form-group second_page">
                                                    <h5>RECETA</h5>
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
                                                                      <input disabled type="text" class="form-control" placeholder="esfera_od" name="esfera_od" value="<?php echo $decode_lensometria['esfera_od']; ?>">
                                                                      </td>
                                                                      <td>                                                    
                                                                       <input disabled type="text" class="form-control" placeholder="cilindro_od" name="cilindro_od" value="<?php echo $decode_lensometria['cilindro_od']; ?>">  
                                                                      </td>
                                                                      <td>                                                    
                                                                       <input disabled type="text" class="form-control" placeholder="eje_od" name="eje_od" value="<?php echo $decode_lensometria['eje_od']; ?>">  
                                                                      </td>
                                                                      <td>                                                    
                                                                       <input disabled type="text" class="form-control" placeholder="p_base_od" name="p_base_od" value="<?php echo $decode_lensometria['p_base_od']; ?>">  
                                                                      </td>
                                                                      <td>                                                    
                                                                       <input disabled type="text" class="form-control" placeholder="add_od" name="add_od" value="<?php echo $decode_lensometria['add_od']; ?>">  
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
                                                                       <input disabled type="text" class="form-control" placeholder="eje_oi" name="eje_oi" value="<?php echo $decode_lensometria['eje_oi']; ?>" >  
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
                                                         $decode_lensometria_extra = json_decode($consultaOrtoptica['lensometria_extra'] , true);
                                                    
                                                    ?>

                                                   <div class="form-row mb-4">
                                                      <div class="form-group col-md-3">
                                                          <label for="objetivos">Tipo de lentes</label>
                                                          <input disabled type="text" class="form-control" name="len_tipo_lentes" value="<?php echo $decode_lensometria_extra['len_tipo_lentes']; ?>">
                                                       </div>
                                                       <div class="form-group col-md-3">
                                                          <label for="objetivos">Filtros</label>
                                                          <input disabled type="text" class="form-control" name="len_filtros" value="<?php echo $decode_lensometria_extra['len_filtros']; ?>">
                                                       </div>
                                                       <div class="form-group col-md-3">
                                                          <label for="objetivos">Tiempo</label>
                                                          <input disabled type="text" class="form-control" name="len_tiempo" value="<?php echo $decode_lensometria_extra['len_tiempo']; ?>">
                                                       </div>
                                                       <div class="form-group col-md-3">
                                                          <label for="objetivos">Tipo de Aro</label>
                                                          <input disabled type="text" class="form-control" name="len_tipo_arco" value="<?php echo $decode_lensometria_extra['len_tipo_arco']; ?>">
                                                       </div>
                                                   </div>

                                                   <?php 
                                                         $decode_sa_pp = json_decode($consultaOrtoptica['sa_pp'] , true);
                                                    
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
                                                          <input disabled type="text" class="form-control" placeholder="OD" name="sa_od" value="<?php echo $decode_sa_pp['sa_od']; ?>">
                                                       </div>
                                                       <div class="form-group col-md-3">
                                                          <input disabled type="text" class="form-control" placeholder="OD" name="pp_od" value="<?php echo $decode_sa_pp['pp_od']; ?>">
                                                       </div>
                                                   </div> 
                                                   <div class="form-row mb-4">
                                                       <div class="form-group col-md-3">
                                                          <input disabled type="text" class="form-control" placeholder="OI" name="sa_oi" value="<?php echo $decode_sa_pp['sa_oi']; ?>">
                                                       </div>
                                                       <div class="form-group col-md-3">
                                                          <input disabled type="text" class="form-control" placeholder="OI" name="pp_oi" value="<?php echo $decode_sa_pp['pp_oi']; ?>">
                                                       </div>
                                                   </div> 
                                                </div>

                                                <?php 
                                                   $decode_visuscopia = json_decode($consultaOrtoptica['visuscopia'] , true);
                                                    
                                                ?>


                                                <h6>VISUSCOPIA:</h6>
                                                <div class="form-row mb-4">
                                                      <div class="form-group col-md-6">
                                                        <label for="v_od">OD</label>
                                                        <input disabled type="text" class="form-control" id="v_od" placeholder="OD" name="viscopia_od" value="<?php echo $decode_visuscopia['viscopia_od']; ?>">
                                                      </div>
                                                      <div class="form-group col-md-6">
                                                         <label for="v_oi">OI</label>
                                                         <input disabled type="text" class="form-control" id="v_oi" placeholder="OI" name="viscopia_oi" value="<?php echo $decode_visuscopia['viscopia_od']; ?>">
                                                      </div>
                                                 </div>

                                                 
                                                 <div class="form-row mb-4">
                                                      <div class="form-group col-md-6">
                                                        <label for="tratamientos">Hirschberg</label>
                                                        <input disabled type="text" class="form-control" id="hirschberg" placeholder="hirschberg" name="hirschberg" value="<?php echo $decode_visuscopia['hirschberg']; ?>">
                                                      </div>
                                                      <div class="form-group col-md-6">
                                                         <label for="tratamientos">Krismsky</label>
                                                         <input disabled type="text" class="form-control" id="krismsky" placeholder="krismsky" name="krismsky" value="<?php echo $decode_visuscopia['krismsky']; ?>">
                                                      </div>
                                                 </div>

                                                 <div class="form-group col-md-12">
                                                            <label for="inputAddress">VERSIONES:</label>
                                                            <textarea disabled id="textarea" class="form-control textarea" maxlength="225" rows="2" placeholder="Esta área tiene un limite de 225 caracteres." name="plan_versiones"><?php echo $consultaOrtoptica['plan_versiones']; ?></textarea>
                                                        </div>
                                                      </div>

                                                 <div class="form-row mb-4">
                                                      <div class="form-group col-md-4">
                                                        <label for="VL">CT: VL:</label>
                                                        <input disabled type="text" class="form-control" id="VL" placeholder="VL" name="ct_vl" value="<?php echo $decode_visuscopia['ct_vl']; ?>">
                                                      </div>
                                                      <div class="form-group col-md-4">
                                                         <label for="VP">VP</label>
                                                         <input disabled type="text" class="form-control" id="VP" placeholder="VP" name="ct_vp" value="<?php echo $decode_visuscopia['ct_vp']; ?>">
                                                      </div>
                                                      <div class="form-group col-md-4">
                                                         <label for="maddox">MADDOX:</label>
                                                         <input disabled type="text" class="form-control" id="maddox" placeholder="maddox" name="maddox" value="<?php echo $decode_visuscopia['maddox']; ?>">
                                                      </div> 
                                                 </div>

                                                 <?php 
                                                   $decode_visuscopia_extra = json_decode($consultaOrtoptica['visuscopia_extra'] , true);
                                                    
                                                ?>

                                                 <div class="form-row mb-4">
                                                    <div class="form-group col-md-6">
                                                         <label for="tratamientos">Seguimiento Visual(AO): </label>
                                                         <input disabled type="text" class="form-control" id="seguimiento" placeholder="seguimiento" name="seguimiento_ao" value="<?php echo $decode_visuscopia_extra['seguimiento_ao']; ?>">
                                                      </div>
                                                      <div class="form-group col-md-6">
                                                         <label for="tratamientos">Sacádicos(AO): </label>
                                                         <input disabled type="text" class="form-control" id="sacadicos" placeholder="sacadicos" name="sacadicos_ao" value="<?php echo $decode_visuscopia_extra['sacadicos_ao']; ?>">
                                                      </div>
                                                 </div>

                                                 <div class="form-row mb-4">
                                                      <div class="form-group col-md-2">
                                                         <label for="tratamientos">PPC: OR </label>
                                                         <input disabled type="text" class="form-control" id="ppc_or" placeholder="ppc_or" name="ppc_or" value="<?php echo $decode_visuscopia_extra['ppc_or']; ?>">
                                                      </div>
                                                      <div class="form-group col-md-2">
                                                         <label for="tratamientos">L: </label>
                                                         <input disabled type="text" class="form-control" id="ppc_l" placeholder="ppc_l" name="ppc_l" value="<?php echo $decode_visuscopia_extra['ppc_l']; ?>" >
                                                      </div>
                                                      <div class="form-group col-md-2">
                                                         <label for="tratamientos">FR: </label>
                                                         <input disabled type="text" class="form-control" id="ppc_fr" placeholder="ppc_fr" name="ppc_fr" value="<?php echo $decode_visuscopia_extra['ppc_fr']; ?>">
                                                      </div>
                                                      <div class="form-group col-md-6">
                                                         <label for="tratamientos">Posicion compensatoria: </label>
                                                         <input disabled type="text" class="form-control" id="ppc_posicion" placeholder="ppc_posicion" name="ppc_posicion" value="<?php echo $decode_visuscopia_extra['ppc_posicion']; ?>">
                                                      </div>
                                                 </div>

                                                 <div class="form-row mb-4">
                                                     <div class="form-group col-md-6">
                                                         <label for="tratamientos">HELSHOSWSKY</label>
                                                         <input disabled type="text" class="form-control" id="helshoswky" placeholder="helshoswky" name="helshoswky" value="<?php echo $decode_visuscopia_extra['helshoswky']; ?>">
                                                      </div>
                                                      <div class="form-group col-md-6">
                                                         <label for="tratamientos">VON GRAEFE</label>
                                                         <input disabled type="text" class="form-control" id="von_graefe" placeholder="von_graefe" name="von_graefe" value="<?php echo $decode_visuscopia_extra['von_graefe']; ?>">
                                                      </div>

                                                 </div>
                                                    
                                                                                                
                                                    
                                                  

                                                   <?php 
                                                   $decode_pruebas = json_decode($consultaOrtoptica['pruebas'] , true);
                                                    
                                                   ?>
                                                   <div class="table-responsive">
                                                          <table class="table table-bordered">
                                                              <thead>
                                                                  <tr>
                                                                      <th class="text-center">PRUEBAS</th>
                                                                      <th>VL</th>
                                                                      <th>VP</th>
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
                                                                  <tr>
                                                                      <td class="text-center">Bagolinni</td>
                                                                      <td>
                                                                      <input disabled type="text" class="form-control" name="vl_bg" placeholder="vl_bg" value="<?php echo $decode_pruebas['vl_bg']; ?>">
                                                                      </td>
                                                                      <td>                                                    
                                                                       <input disabled type="text" class="form-control" name="vp_bg" placeholder="vp_bg" value="<?php echo $decode_pruebas['vp_bg']; ?>">  
                                                                      </td>
                                                                  </tr>
                                                              </tbody>
                                                          </table>
                                                       </div>
                                                             
                                                         <?php 
                                                         $decode_pruebas_extra = json_decode($consultaOrtoptica['pruebas_extra'] , true);
                                                          
                                                         ?>

                                                       <div class="form-row mb-4">
                                                          <div class="form-group col-md-3">
                                                              <h5 class="text-center">Estereopsis</h5>
                                                              
                                                          </div>
                                                          <div class="form-group col-md-3">
                                                              <label for="inputAddress">Randot:</label>
                                                              <input disabled type="text" class="form-control" id="inputAddress" placeholder="randot" name="randot"  value="<?php  echo $decode_pruebas_extra['randot']; ?>">
                                                          </div>
                                                          <div class="form-group col-md-3">
                                                              <label for="inputAddress">Lang:</label>
                                                              <input disabled type="text" class="form-control" id="inputAddress" placeholder="lang" name="lang"  value="<?php  echo $decode_pruebas_extra['lang']; ?>">
                                                          </div>
                                                          <!--<div class="form-group col-md-3">
                                                              <lang for="inputAddress">Seg.Arco:</label>
                                                              <input type="text" class="form-control" id="inputAddress" placeholder="seg.arco" name="seg_arco"  value="<?php  echo $decode_pruebas_extra['seg_arco']; ?>">
                                                          </div>-->
                                                       </div>

                                                       <div class="form-row mb-4">
                                                          <div class="form-group col-md-12">
                                                              <label for="inputAddress">Visión de Color</label>
                                                              <input disabled type="text" class="form-control" id="inputAddress" placeholder="vision" name="vision_color" value="<?php  echo $decode_pruebas_extra['vision_color']; ?>">
                                                          </div>
                                                       </div>

                                                       <?php 
                                                         $decode_acomodacion = json_decode($consultaOrtoptica['acomodacion'] , true);
                                                          
                                                         ?>
                                                        
                                                        <h4>EVALUACION DE LA ACOMODACION</h4>
                                                       <div class="form-row mb-4">
                                                         <div class="form-group col-md-3">
                                                              <label for="inputAddress">A.A OD:</label>
                                                              <input disabled type="text" class="form-control" id="inputAddress" placeholder="aa_od" name="aa_od" value="<?php echo $decode_acomodacion['aa_od']; ?>">
                                                          </div>
                                                          <div class="form-group col-md-3">
                                                              <label for="inputAddress">OI</label>
                                                              <input disabled type="text" class="form-control" id="inputAddress" placeholder="aa_oi" name="aa_oi"  value="<?php echo $decode_acomodacion['aa_oi']; ?>"> 
                                                          </div>
                                                          <div class="form-group col-md-3">
                                                              <label for="inputAddress">FAN: OD</label>
                                                              <input disabled type="text" class="form-control" id="inputAddress" placeholder="fan_od" name="fan_od"  value="<?php echo $decode_acomodacion['fan_od']; ?>">
                                                          </div>
                                                          <div class="form-group col-md-3">
                                                              <label for="inputAddress">OI:</label>
                                                              <input disabled type="text" class="form-control" id="inputAddress" placeholder="fan_cpm" name="fan_cpm"  value="<?php echo $decode_acomodacion['fan_cpm']; ?>">
                                                          </div>

                                                       </div>
                                                       <div class="form-row mb-4">
                                                       <div class="form-group col-md-3">
                                                              <label for="inputAddress">FAB</label>
                                                              <input disabled type="text" class="form-control" id="inputAddress" placeholder="aco_oi" name="aco_oi"  value="<?php echo $decode_acomodacion['aco_oi']; ?>">
                                                          </div>
                                                          <div class="form-group col-md-3">
                                                              <label for="inputAddress">MEM: OD</label>
                                                              <input disabled type="text" class="form-control" id="inputAddress" placeholder="aco_cpm" name="aco_cpm"  value="<?php echo $decode_acomodacion['aco_cpm']; ?>">
                                                          </div>
                                                          <div class="form-group col-md-3">
                                                              <label for="inputAddress">OI</label> 
                                                              <input disabled type="text" class="form-control" id="inputAddress" placeholder="acp_fab" name="acp_fab"  value="<?php echo $decode_acomodacion['acp_fab']; ?>">
                                                          </div>
                                                          <!--<div class="form-group col-md-3">
                                                              <label for="inputAddress">CPM Falla</label>
                                                              <input type="text" class="form-control" id="inputAddress" placeholder="aco_falla" name="aco_falla"  value="<?php echo $decode_acomodacion['aco_falla']; ?>">
                                                          </div>-->

                                                       </div>

                                                       <?php 
                                                         $decode_acomodacion_extra = json_decode($consultaOrtoptica['acomodacion_extra'] , true);
                                                          
                                                         ?>

                                                       <div class="form-row mb-4">
                                                         <!-- <div class="form-group col-md-3">
                                                              <label for="inputAddress">MEM:OD</label>
                                                              <input type="text" class="form-control" id="inputAddress" placeholder="mem_od" name="mem_od" value="<?php echo $decode_acomodacion_extra['mem_od']; ?>">
                                                          </div>
                                                          <div class="form-group col-md-3">
                                                              <label for="inputAddress">OI</label>
                                                              <input type="text" class="form-control" id="inputAddress" placeholder="mem_oi" name="mem_oi" value="<?php echo $decode_acomodacion_extra['mem_oi']; ?>">
                                                          </div>-->
                                                          <div class="form-group col-md-3">
                                                              <label for="inputAddress">ARN</label>
                                                              <input disabled type="text" class="form-control" id="inputAddress" placeholder="mem_arn" name="mem_arn" value="<?php echo $decode_acomodacion_extra['mem_arn']; ?>">
                                                          </div>
                                                          <div class="form-group col-md-3">
                                                              <label for="inputAddress">ARP</label>
                                                              <input disabled type="text" class="form-control" id="inputAddress" placeholder="mem_arp" name="mem_arp" value="<?php echo $decode_acomodacion_extra['mem_arp']; ?>">
                                                          </div>

                                                       </div>

                                                         <?php 
                                                         $decode_vergencia = json_decode($consultaOrtoptica['vergencia'] , true);
                                                          
                                                         ?>
                                                      
                                                       <h4>EVALUACION DE LAS VERGENCIAS</h4>
                                                       <div class="form-row mb-4">
                                                          <div class="form-group col-md-3">
                                                              <label for="inputAddress">BT/VL</label>
                                                              <input disabled type="text" class="form-control" id="inputAddress" placeholder="v_vt_vl" name="v_vt_vl" value="<?php echo $decode_vergencia['v_vt_vl'];?>">
                                                          </div>
                                                          <div class="form-group col-md-3">
                                                              <label for="inputAddress">BT/VP</label>
                                                              <input disabled type="text" class="form-control" id="inputAddress" placeholder="v_bt_vp" name="v_bt_vp" value="<?php echo $decode_vergencia['v_bt_vp'];?>">
                                                          </div>
                                                      </div>
                                                       
                                                      <div class="form-row mb-4">
                                                          <div class="form-group col-md-3">
                                                              <label for="inputAddress">BN/VL</label>
                                                              <input disabled type="text" class="form-control" id="inputAddress" placeholder="v_bn_vl" name="v_bn_vl" value="<?php echo $decode_vergencia['v_bn_vl'];?>">
                                                          </div>
                                                          <div class="form-group col-md-3">
                                                              <label for="inputAddress">BN/VP</label>
                                                              <input disabled type="text" class="form-control" id="inputAddress" placeholder="v_bn_vp" name="v_bn_vp" value="<?php echo $decode_vergencia['v_bn_vp'];?>">
                                                          </div>
                                                      </div>
                                                       

                                                    <?php 
                                                   $decode_refraccion = json_decode($consultaOrtoptica['refraccion'] , true);
                                                    
                                                ?>

 <div class="form-group">
                                                    <h5>RECETA FINAL</h5>
                                                   <div class="table-responsive">
                                                          <table class="table table-bordered">
                                                              <thead>
                                                                  <tr>
                                                                      <th class="text-center">RX </th>
                                                                      <th>ESFERA</th>
                                                                      <th>CILINDRO</th>
                                                                      <th>EJE</th>
                                                                      <th>P/BASE</th>
                                                                      <th>ADD</th>
                                                                      <th>AGUDEZA VISUAL</th>
                                                                  </tr>
                                                              </thead>
                                                              <tbody>
                                                                  <tr>
                                                                      <td class="text-center">OD</td>
                                                                      <td>
                                                                      <input disabled type="text" class="form-control" name="esfera_od_f" value="<?php echo $decode_refraccion['esfera_od_f']; ?>">
                                                                      </td>
                                                                      <td>                                                    
                                                                       <input disabled type="text" class="form-control" name="cilindro_od_f" value="<?php echo $decode_refraccion['cilindro_od_f']; ?>">  
                                                                      </td>
                                                                      <td>                                                    
                                                                       <input disabled type="text" class="form-control" name="eje_od_f" value="<?php echo $decode_refraccion['eje_od_f']; ?>">  
                                                                      </td>
                                                                      <td>                                                    
                                                                       <input disabled type="text" class="form-control" name="p_base_od_f"  value="<?php echo $decode_refraccion['p_base_od_f']; ?>">  
                                                                      </td>
                                                                      <td>                                                    
                                                                       <input disabled type="text" class="form-control" name="add_od_f"  value="<?php echo $decode_refraccion['add_od_f']; ?>">  
                                                                      </td>
                                                                      <td>                                                    
                                                                       <input disabled type="text" class="form-control" name="agz_od_f"  value="<?php echo $decode_refraccion['agz_od_f']; ?>">  
                                                                      </td>
                                                                  </tr>
                                                                  <tr>
                                                                      <td class="text-center">OI</td>
                                                                      <td>
                                                                      <input disabled type="text" class="form-control" name="esfera_oi_f"  value="<?php echo $decode_refraccion['esfera_oi_f']; ?>">
                                                                      </td>
                                                                      <td>                                                    
                                                                      <input disabled type="text" class="form-control" name="cilindro_oi_f"  value="<?php echo $decode_refraccion['cilindro_oi_f']; ?>"> 
                                                                      </td>
                                                                      <td>                                                    
                                                                       <input disabled type="text" class="form-control" name="eje_oi_f"  value="<?php echo $decode_refraccion['eje_oi_f']; ?>">  
                                                                      </td>
                                                                      <td>                                                    
                                                                       <input disabled type="text" class="form-control" name="p_base_oi_f"  value="<?php echo $decode_refraccion['p_base_oi_f']; ?>">  
                                                                      </td>
                                                                      <td>                                                    
                                                                       <input disabled type="text" class="form-control" name="add_oi_f"  value="<?php echo $decode_refraccion['add_oi_f']; ?>">  
                                                                      </td>
                                                                      <td>                                                    
                                                                       <input disabled type="text" class="form-control" name="agz_oi_f"  value="<?php echo $decode_refraccion['agz_oi_f']; ?>">  
                                                                      </td>
                                                                  </tr>
                                                              </tbody>
                                                          </table>
                                                       </div>
                                                   </div>
                                
                                                     <?php 
                                                   $decode_lentes_contacto = json_decode($consultaOrtoptica['lentes_contacto'] , true);
                                                    
                                                   ?>

                                                   <div class="form-row mb-4">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputAddress">TIPO DE LENTE</label>
                                                            <input disabled type="text" class="form-control" id="inputAddress" placeholder="Marca" name="lente_marca_1" value="<?php echo $decode_lentes_contacto['lente_marca_1']; ?>">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label for="inputAddress">PD:</label>
                                                            <input disabled type="text" class="form-control" id="inputAddress" placeholder="pd" name="lente_pd_1" value="<?php echo $decode_lentes_contacto['lente_pd_1']; ?>">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label for="inputAddress">DNP:</label>
                                                            <input disabled type="text" class="form-control" id="inputAddress" placeholder="dnp" name="lente_pd_1" value="<?php echo $decode_lentes_contacto['lente_dnp_1']; ?>">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label for="inputAddress">ALTURA:</label>
                                                            <input disabled type="text" class="form-control" id="inputAddress" placeholder="altura" name="lente_altura_1" value="<?php echo $decode_lentes_contacto['lente_altura_1']; ?>">
                                                        </div>
                                                   </div>

                                                   <div class="form-group">
                                                    <h5>Lente de Contacto</h5>
                                                   <div class="table-responsive">
                                                          <table class="table table-bordered">
                                                              <thead>
                                                                  <tr>
                                                                      <th>PARAMETROS</th>
                                                                      <th>OD</th>
                                                                      <th class="text-center">OI</th>
                                                                    </tr>
                                                              </thead>
                                                              <tbody>
                                                                  <tr>
                                                                      <td class="text-center">PODER</td>
                                                                      <td>
                                                                      <input disabled type="text" class="form-control" placeholder="poder_od" name="poder_od" value="<?php echo $decode_lentes_contacto['poder_od']; ?>">
                                                                      </td>
                                                                      <td>                                                    
                                                                       <input disabled type="text" class="form-control" placeholder="poder_oi" name="poder_oi" value="<?php echo $decode_lentes_contacto['poder_oi']; ?>">  
                                                                      </td>
                                                                  </tr>
                                                                  <tr>
                                                                      <td class="text-center">C.B</td>
                                                                      <td>
                                                                      <input disabled type="text" class="form-control" placeholder="cb_od" name="cb_od" value="<?php echo $decode_lentes_contacto['cb_od']; ?>">
                                                                      </td>
                                                                      <td>                                                    
                                                                      <input disabled type="text" class="form-control" placeholder="cb_oi" name="cb_oi" value="<?php echo $decode_lentes_contacto['cb_oi']; ?>"> 
                                                                      </td>
                                                                  </tr>
                                                                  <tr>
                                                                      <td class="text-center">DIA</td>
                                                                      <td>
                                                                      <input disabled type="text" class="form-control" placeholder="dia_od" name="dia_od" value="<?php echo $decode_lentes_contacto['dia_od']; ?>">
                                                                      </td>
                                                                      <td>                                                    
                                                                      <input disabled type="text" class="form-control" placeholder="dia_oi" name="dia_oi" value="<?php echo $decode_lentes_contacto['dia_oi']; ?>"> 
                                                                      </td>  
                                                                  </tr>
                                                              </tbody>
                                                          </table>
                                                       </div>
                                                   </div>


                                                   <div class="form-row mb-4">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputAddress">Marca</label>
                                                            <input disabled type="text" class="form-control" id="inputAddress" placeholder="Marca" name="lente_marca" value="<?php echo $decode_lentes_contacto['lente_marca']; ?>">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="inputAddress">Tipo:</label>
                                                            <input disabled type="text" class="form-control" id="inputAddress" placeholder="Tipo" name="lente_tipo" value="<?php echo $decode_lentes_contacto['lente_tipo']; ?>">
                                                        </div>
                                                   </div>

                                                      <div class="form-row mb-4">
                                                        <div class="form-group col-md-12">
                                                            <label for="inputAddress">CONDUCTA A SEGUIR:</label>
                                                            <textarea disabled id="textarea" class="form-control textarea" maxlength="225" rows="2" placeholder="Esta área tiene un limite de 225 caracteres." name="conducta_seguir"><?php echo $consultaOrtoptica['conducta_seguir']; ?></textarea>
                                                        </div>
                                                      </div>

<div class="form-row mb-4">
                                                        

                 

                                                   
                                              
                                                </form>
                                                <?php

                                                 $editarConsulta = new  ControladorOrtopticaAdultos();
                                                 $editarConsulta -> ctrEditarConsultaOrtopticaAdultos();                                     
                                                 
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