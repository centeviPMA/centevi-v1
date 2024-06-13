<link href="vistas/assets/css/tables/table-basic.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="vistas/plugins/select2/select2.min.css">
<link rel="stylesheet" type="text/css" href="vistas/assets/css/forms/theme-checkbox-radio.css">


<style type="text/css" media="print">
@media print {
#page-topbar {display:none;}
#footer {display:none;}
#imprimir {display:none;}
#header {display:none;}


p {
    font-size:20px;
}
}
.second_page{
  margin-top:1200px;
  padding-top:20%;
}


.mreverse {
    margin-top: -50px; 
}
.table > thead > tr > th {
  color: white!important;
}


</style>
<div class="admin-data-content" style="margin-top:50px;">


  <div class="row layout-top-spacing" >
      <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
          <div class="widget-content-area br-4">
              <div class="widget-one">
              <a href="javascript:window.print()" id="imprimir" class="btn btn-primary waves-effect waves-light"><i class="fa fa-print m-r-5"></i> IMPRIMIR</a>
                  <div class="row">
                                    <div id="flFormsGrid" class="col-lg-12 layout-spacing">
                                        <div class="statbox widget box box-shadow">
                                            <div class="widget-header">
                                  
                                                <div class="row">
                                          
                                                    <div class="col-md-4">
                                                        <img src="vistas/img/centevi-logo-in.png" class="navbar-logo" alt="logo" style="height: 80px;">
                                                    </div>   
                                                    
                                                    <?php 
                                                    
                                                    $item = 'id_receta';
                                                    $valor = $_GET['id_receta'];
                                                    
                                                    $recetas = ControladorRecetas::ctrMostrarRecetas($item, $valor);
                                                                                   
                                                    
                                                    ?>
                                                    <div class="col-md-4">
                                                        <h4>Fecha de solicitud</h4>
                                                        <?php 
                                                              $fecha =  substr($recetas['fecha_creacion'], 0, 10); 
                                                          
                                                          echo '<p class="ml-5"><b>'.$fecha.'</b></p>'; 
                                                          
                                                         
                                                         ?>
                                                    </div>  
                                            
                                                    <div class="col-md-2">
                                                    <h4>Nro. Orden</h4>
                                                      <input style="color: red; font-weight: bold;" type="text" class="form-control" placeholder="" value="<?php echo $recetas['nro_receta']; ?>" name="nro_receta">
                                                    </div>                                                                       
                                                </div>
                                            </div>
                                            <div class="widget-content widget-content-area">
                                           
                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label for="inputEmail4">Paciente</label>
                                                         
                                                             
                                                            <?php

                                                   
                                                             
                                                             $item = 'id_paciente';
                                                             $valor = $recetas['id_paciente'];
                                                             
                                                             $paciente = ControladorPacientes::ctrMostrarPacientes($item, $valor);
                                                             
                                                             echo   '<select disabled class="form-control form-small" name="paciente"  value="'.$paciente['id_paciente'].'" readonly>
                                                             
                                                                    <option value="'.$paciente['id_paciente'].'" readonly> '.$paciente['nombres'].' '.$paciente['apellidos'].'</option>
                                                             ';
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             ?>




                                                         </select>
                                                         
                                                     
                                                        </div>

                                                        
                                                        <div class="form-group col-md-4">
                                                            <label for="inputEmail4">Sucursal</label>
                                                            <?php

                                                   
                                                             
                                                          $item = null;
                                                          $valor = null;
                                                          echo   '<select disabled class="form-control form-small" name="direccion">
                                                                        <option value="'.$recetas['direccion'].'">'.$recetas['direccion'].'</option>';
                                                          
                                                          
                                                          $sucursal = ControladorSucursales::ctrMostrarSurcursales($item, $valor);
                                                          
                                                          foreach ($sucursal as $key => $value) {
                                                          
                                                              echo '<option value="' . $value["nombre"] . '">'.$value['nombre'].'</option>';
                                                          }
                                                                                                                       
                                                          
                                                          
                                                          
                                                          
                                                          ?>
                                                        </select>

                                                        </div> 
                                                        <div class="form-group col-md-2">
                                                            <label for="inputEmail4">Cedula</label>
                                                            <input disabled type="text" class="form-control" placeholder=""  value="<?php echo $recetas['cedula']; ?>" name="cedula">

                                                        </div>  
                                                        <div class="form-group col-md-2">
                                                            <label for="inputEmail4">Telefono</label>
                                                            <input disabled type="text" class="form-control" placeholder=""   value="<?php echo $recetas['telefono']; ?>" name="telefono">

                                                        </div>    
                                                       
                                                    </div>
                                                  
                                                    <?php   $rx = json_decode($recetas['rx'] , true); ?>

                                                 <div class="form-row" style="margin-top: -30px;">
                                                      <div class="form-group col-md-12">
                                                            <div class="table-responsive">
                                                              <table class="table table-bordered">
                                                                  <thead>
                                                                      <tr style="background-color:#4361ee;">
                                                                          <th style="color: white!important;" class="text-center">RX</th>
                                                                          <th  style="color: white!important;" class="text-center">Esfera</th>
                                                                          <th style="color: white!important;" >Cilindro</th>
                                                                          <th style="color: white!important;" >Eje</th>
                                                                          <th style="color: white!important;" >ADD</th>
                                                                          <th style="color: white!important;" >PRISMA</th>
                                                                          <th style="color: white!important;" >DISTANCIA PUPILAR</th>
                                                                          <th style="color: white!important;" >ALTURA</th>
                                                                      </tr>
                                                                  </thead>
                                                                  <tbody>
                                                                      <tr>
                                                                          <td class="text-center">OD</td>
                                                                          <td>
                                                                          <input disabled type="text" class="form-control" placeholder="" value="<?php echo $rx['esfera_od'];?>" name="esfera_od">
                                                                          </td>
                                                                          <td>
                                                                          <input disabled type="text" class="form-control" placeholder=""   value="<?php echo $rx['cilindro_od'];?>" name="cilindro_od">
                                                                          </td>
                                                                           <td>
                                                                          <input disabled type="text" class="form-control" placeholder=""   value="<?php echo $rx['eje_od'];?>" name="eje_od">
                                                                          </td>
                                                                          <td>                                                    
                                                                           <input disabled type="text" class="form-control" placeholder=""   value="<?php echo $rx['add_od'];?>" name="add_od">   
                                                                          </td>
                                                                           <td>
                                                                           <input disabled type="text" class="form-control" placeholder=""   value="<?php echo $rx['prisma_od'];?>" name="prisma_od">
                                                                           </td>
                                                                           <td>
                                                                           <input disabled type="text" class="form-control" placeholder=""   value="<?php echo $rx['distancia_od'];?>" name="distancia_od">
                                                                           </td>
                                                                           <td>
                                                                           <input disabled type="text" class="form-control" placeholder=""  value="<?php echo $rx['altura_od'];?>" name="altura_od">
                                                                           </td>
                                                                      </tr>
                                                                      <tr>
                                                                          <td class="text-center">OI</td>
                                                                          <td>
                                                                          <input disabled type="text" class="form-control" placeholder="" name="esfera_oi" value="<?php echo $rx['esfera_oi'];?>">
                                                                          </td>
                                                                          <td>
                                                                          <input disabled type="text" class="form-control" placeholder="" name="cilindro_oi" value="<?php echo $rx['cilindro_oi'];?>">
                                                                          </td>
                                                                          <td>
                                                                          <input disabled type="text" class="form-control" placeholder="" name="eje_oi" value="<?php echo $rx['eje_oi'];?>">
                                                                          </td>
                                                                          <td>                                                    
                                                                          <input disabled type="text" class="form-control" placeholder="" name="add_oi" value="<?php echo $rx['add_oi'];?>"> 
                                                                          </td>
                                                                          <td>
                                                                          <input disabled type="text" class="form-control" placeholder="" name="prisma_oi" value="<?php echo $rx['prisma_oi'];?>">
                                                                          </td>
                                                                          <td>
                                                                          <input disabled type="text" class="form-control" placeholder="" name="distancia_oi" value="<?php echo $rx['distancia_oi'];?>">
                                                                          </td>
                                                                          <td>
                                                                          <input disabled type="text" class="form-control" placeholder="" name="altura_oi" value="<?php echo $rx['altura_oi'];?>">
                                                                          </td>
                                                                      </tr>
                                                                      
                                                                  </tbody>
                                                              </table>
                                                           </div>
                                                       </div>
                                                       
 
                                                 
                                                 </div>
                                                <div style="margin-top: -20px; border: 2px solid blue; border-radius:25px;">
                                                 <div class="row p-1" >
                                                           <div class="col-md-2">
                                                                <h6 class="text-center p-2">TIPO DE LENTE:</h6>
                                                           </div>
                                                           <div class="col-md-2 p-2">
                                                             <div class="n-chk">
                                                                <label class="new-control new-radio radio-classic-primary">
                                                                  <input disabled type="radio" class="new-control-input" name="tipo_lente_r" value="monofocal" <?php if($recetas['tipo_lente'] === 'monofocal'){ echo "checked"; }  ?>>
                                                                  <span class="new-control-indicator"></span>Monofocal
                                                                </label>
                                                              </div>
                                                           </div>
                                                           <div class="col-md-2 p-2">
                                                             <div class="n-chk">
                                                                <label class="new-control new-radio radio-classic-primary">
                                                                  <input disabled type="radio" class="new-control-input" value="bifocal" name="tipo_lente_r" <?php if($recetas['tipo_lente'] === 'bifocal'){ echo "checked"; }  ?>>
                                                                  <span class="new-control-indicator"></span>Bifocal
                                                                </label>
                                                              </div>
                                                           </div>
                                                           <div class="col-md-2 p-2">
                                                             <div class="n-chk">
                                                                <label class="new-control new-radio radio-classic-primary">
                                                                  <input disabled type="radio" class="new-control-input"  value="interview" name="tipo_lente_r" <?php if($recetas['tipo_lente'] === 'interview'){ echo "checked"; }  ?>>
                                                                  <span class="new-control-indicator"></span>Interview
                                                                </label>
                                                              </div>
                                                           </div>
                                                           <div class="col-md-2 p-2">
                                                             <div class="n-chk">
                                                                <label class="new-control new-radio radio-classic-primary">
                                                                  <input disabled type="radio" class="new-control-input" value="antifatigue" name="tipo_lente_r" <?php if($recetas['tipo_lente'] === 'antifatigue'){ echo "checked"; }  ?>>
                                                                  <span class="new-control-indicator"></span>Antifatigue
                                                                </label>
                                                              </div>
                                                           </div>
                                                           <div class="col-md-2 p-2">
                                                             <div class="n-chk">
                                                                <label class="new-control new-radio radio-classic-primary">
                                                                  <input disabled type="radio" class="new-control-input"  value="progresivo" name="tipo_lente_r" <?php if($recetas['tipo_lente'] === 'progresivo'){ echo "checked"; }  ?> >
                                                                  <span class="new-control-indicator"></span>Progresivo
                                                                </label>
                                                              </div>
                                                           </div>
                                                 </div>
                                                 </div>

                                                

                                                <?php   $tratamientos = json_decode($recetas['tratamientos'] , true); ?>
                                             <div style="margin-top:10px; border: 2px solid blue; border-radius:25px; padding: 10px 50px;">
                                                <div class="row p-1">
                                                           <div class="col-md-2">
                                                                <h6 class="text-center p-2">TRATAMIENTOS Y FILTROS:</h6>
                                                           </div>
                                                          <div class="col-md-2">
                                                             <div class="n-chk">
                                                                <label class="new-control new-radio radio-classic-primary">
                                                                  <input disabled type="radio" class="new-control-input" value="transitions" name="transitions" <?php if($tratamientos['transitions'] === 'transitions'){ echo "checked"; }  ?>>
                                                                  <span class="new-control-indicator"></span>Transitions
                                                                </label>
                                                              </div>
                                                           </div>
                                                           <div class="col-md-2">
                                                            <!-- <label for="inputEmail4">Transitions</label> -->
                                                            <div class="col-md-2">
                                                            <!-- <label for="inputEmail4">Transitions</label> -->
                                                            <div class="n-chk">
                                                                <label class="new-control new-radio radio-classic-primary">
                                                                  <input disabled type="checkbox" class="new-control-input" value="filtro_a" name="filtro_a" <?php if($tratamientos['filtro_a'] === 'filtro_a'){ echo "checked"; }  ?>>
                                                                  <span class="new-control-indicator"></span>Filtro luz azul
                                                                </label>
                                                              </div>
                                                          </div> 
                                                          </div> 
                                                           <div class="col-md-2">
                                                            <label for="inputEmail4">Gris</label>
                                                            <input disabled type="text" class="form-control" placeholder="" name="gris_t"  value="<?php echo $tratamientos['gris_t']; ?>">
                                                          </div> 
                                                          <div class="col-md-2">
                                                            <label for="inputEmail4">Cafe</label>
                                                            <input disabled type="text" class="form-control" placeholder="" name="cafe_t"  value="<?php echo $tratamientos['cafe_t']; ?>">
                                                          </div> 
                                                 </div>

                                                <div class="row p-2">
                                                           <div class="col-md-2">
                                                                <h6 class="text-center p-2"></h6>
                                                           </div>
                                                          <div class="col-md-2">
                                                            <div class="n-chk">
                                                               <label class="new-control new-checkbox checkbox-outline-success">
                                                                 <input disabled type="checkbox" class="new-control-input"  value="fotocromatico" name="fotocromatico"  <?php if($tratamientos['fotocromatico'] === 'fotocromatico'){ echo "checked"; }  ?>>
                                                                 <span class="new-control-indicator"></span>Fotocromático
                                                               </label>
                                                              </div>
                                                           </div>
                                                           <div class="col-md-2">
                                                             <div class="n-chk">
                                                                <label class="new-control new-checkbox checkbox-outline-success">
                                                                  <input disabled type="checkbox" class="new-control-input"  value="antireflejo" name="antireflejo" <?php if($tratamientos['antireflejo'] === 'antireflejo'){ echo "checked"; }  ?>> 
                                                                  <span class="new-control-indicator"></span>Antireflejo
                                                                </label>
                                                              </div>
                                                           </div>
                                                           <div class="col-md-2">
                                                             <div class="n-chk">
                                                                <label class="new-control new-checkbox checkbox-outline-success">
                                                                  <input disabled type="checkbox" class="new-control-input"  value="espejado" name="espejado"  <?php if($tratamientos['espejado'] === 'espejado'){ echo "checked"; }  ?>>
                                                                  <span class="new-control-indicator"></span>Espejado
                                                                </label>
                                                              </div>
                                                           </div>
                                                           <div class="col-md-2">
                                                             <div class="n-chk">
                                                                 <label class="new-control new-checkbox checkbox-outline-success">
                                                                  <input disabled type="checkbox" class="new-control-input"  value="uv" name="uv"  <?php if($tratamientos['uv'] === 'uv'){ echo "checked"; }  ?>>
                                                                  <span class="new-control-indicator"></span>UV
                                                                </label>
                                                              </div>
                                                           </div>
                                                         
                                                </div>


                                                <div class="row p-2">
                                                          <div class="col-md-2">
                                                             <div class="n-chk">
                                                                <label class="new-control new-radio radio-classic-primary">
                                                                  <input disabled type="checkbox" class="new-control-input"  value="tinte" name="tinte"  <?php if($tratamientos['tinte'] === 'tinte'){ echo "checked"; }  ?>>
                                                                  <span class="new-control-indicator"></span>Tinte
                                                                </label>
                                                              </div>
                                                           </div>
                                                          <div class="col-md-2">
                                                             <div class="n-chk">
                                                                <label class="new-control new-radio radio-classic-primary">
                                                                  <input disabled type="checkbox" class="new-control-input"  value="degradante" name="degradante"  <?php if($tratamientos['degradante'] === 'degradante'){ echo "checked"; }  ?>>
                                                                  <span class="new-control-indicator"></span>Degradante
                                                                </label>
                                                              </div>
                                                           </div>
                                                           <div class="col-md-2">
                                                             <div class="n-chk">
                                                                <label class="new-control new-radio radio-classic-primary">
                                                                  <input disabled type="checkbox" class="new-control-input"  value="uniforme" name="uniforme" <?php if($tratamientos['uniforme'] === 'uniforme'){ echo "checked"; }  ?>>  
                                                                  <span class="new-control-indicator"></span>Uniforme
                                                                </label>
                                                              </div>
                                                           </div>
                                                           <div class="col-md-2">
                                                            <label for="inputEmail4">Color</label>
                                                            <input disabled type="text" class="form-control" placeholder="" name="color_t" value="<?php  echo $tratamientos['color_t']; ?>">
                                                          </div> 
                                                          <div class="col-md-2">
                                                            <label for="inputEmail4">Intensidad</label>
                                                            <input disabled type="text" class="form-control" placeholder="" name="intensidad_t" value="<?php  echo $tratamientos['intensidad_t']; ?>">
                                                          </div> 
                                                 </div>
                                              </div>

                                               <?php   $material = json_decode($recetas['material'] , true); ?>
                                                 <div  class="p-2" style="margin-top:10px; border: 2px solid blue; border-radius:25px;">
                                                 <div class="row">
                                                           <div class="col-md-2">
                                                                <h6 class="text-center p-2">MATERIAL:</h6>
                                                           </div>
                                                          <div class="col-md-2">
                                                             <div class="n-chk">
                                                                <label class="new-control new-radio radio-classic-primary">
                                                                  <input disabled type="radio" class="new-control-input"  value="cr_39" name="material_1" <?php if($material['material_1'] === 'cr_39'){ echo "checked"; }  ?>>
                                                                  <span class="new-control-indicator"></span>CR-39
                                                                </label>
                                                              </div>
                                                           </div>
                                                           <div class="col-md-2">
                                                             <div class="n-chk">
                                                                <label class="new-control new-radio radio-classic-primary">
                                                                  <input disabled type="radio" class="new-control-input" value="policarbonato" name="material_1" <?php if($material['material_1'] === 'polarizado'){ echo "checked"; }  ?>>
                                                                  <span class="new-control-indicator"></span>Policarbonato
                                                                </label>
                                                              </div>
                                                           </div>
                                                           <!--<div class="col-md-2">
                                                            <label for="inputEmail4">Gris</label>
                                                            <input type="text" class="form-control" placeholder="" name="gris_m" value="<?php echo $material['gris_m']; ?>">
                                                          </div> 
                                                          <div class="col-md-2">
                                                            <label for="inputEmail4">Cafe</label>
                                                            <input type="text" class="form-control" placeholder="" name="cafe_m" value="<?php echo $material['cafe_m']; ?>">
                                                          </div>-->
                                                 </div>

                                                <div class="row p-2">
                                                           <div class="col-md-2">
                                                                <h6 class="text-center p-2"></h6>
                                                           </div>
                                                          <div class="col-md-2">
                                                             <div class="n-chk">
                                                                <label class="new-control new-radio radio-classic-primary">
                                                                  <input disabled type="radio" class="new-control-input" value="drivewear" name="material_1" <?php if($material['material_1'] === 'drivewear'){ echo "checked"; }  ?>>
                                                                  <span class="new-control-indicator"></span>DRIVEWEAR
                                                                </label>
                                                              </div>
                                                           </div>
                                                           <div class="col-md-2">
                                                             <div class="n-chk">
                                                                <label class="new-control new-radio radio-classic-primary">
                                                                  <input disabled type="radio" class="new-control-input" value="polarizado" name="material_1" <?php if($material['material_1'] === 'polarizado'){ echo "checked"; }  ?>>
                                                                  <span class="new-control-indicator"></span>POLARIZADO
                                                                </label>
                                                              </div>
                                                           </div>
                                                           <div class="col-md-2">
                                                             <div class="n-chk">
                                                                <label class="new-control new-radio radio-classic-primary">
                                                                  <input disabled type="radio" class="new-control-input"  value="thin_lite" name="material_2" required <?php if($material['material_2'] === 'thin_lite'){ echo "checked"; }  ?>>
                                                                  <span class="new-control-indicator"></span>THIN & LITE
                                                                </label>
                                                              </div>
                                                           </div>
                                                           <div class="col-md-2">
                                                             <div class="n-chk">
                                                                <label class="new-control new-radio radio-classic-primary">
                                                                  <input disabled type="radio" class="new-control-input" value="policolor" name="material_2" required <?php if($material['material_2'] === 'policolor'){ echo "checked"; }  ?>>
                                                                  <span class="new-control-indicator"></span> POLICOLOR
                                                                </label>
                                                              </div>
                                                           </div>
                                                           <div class="col-md-2">
                                                             <div class="n-chk">
                                                                <label class="new-control new-radio radio-classic-primary">
                                                                  <input disabled type="radio" class="new-control-input" value="super_thin" name="material_2" required <?php if($material['material_2'] === 'super_thin'){ echo "checked"; }  ?>>
                                                                  <span class="new-control-indicator"></span> SUPER THIN & LITE
                                                                </label>
                                                              </div>
                                                           </div>
                                                  </div>
                                                </div>

                                                 <?php   $aro_propio = json_decode($recetas['aro_propio'] , true); ?>
                                         <div style="margin-top:10px; border: 2px solid blue; border-radius:25px; padding: 10px 50px;">
                                                <div class="row ">
                                                     <div class="col-md-3" style="max-width: fit-content">
                                                       <div class="n-chk">
                                                            <label class="new-control new-radio radio-classic-primary">
                                                              <input disabled type="radio" class="new-control-input" name="propio" value="aro_centevi_1" <?php if($aro_propio['propio'] === 'aro_centevi_1'){ echo "checked"; }  ?>> 
                                                              <span class="new-control-indicator"></span><strong>Aro Centevi</strong>
                                                            </label>       
                                                        </div>
                                                        <div class="n-chk">
                                                            <label class="new-control new-radio radio-classic-primary">
                                                              <input disabled type="radio" class="new-control-input" name="propio" value="aro_propio_1" <?php if($aro_propio['propio'] === 'aro_propio_1'){ echo "checked"; }  ?>> 
                                                              <span class="new-control-indicator"></span><strong>Aro Propio</strong>
                                                            </label>
                                                          </div>
                                                    </div>
                                                     
                                                          
                                                    <div class="col-md-3" style="max-width: fit-content">
                                                        <div class="n-chk">
                                                            <label class="new-control new-radio radio-classic-primary">
                                                              <input disabled type="radio" class="new-control-input" name="aro_centevi" value="metal_c" <?php if($aro_propio['aro_centevi'] === 'metal_c'){ echo "checked"; }  ?>> 
                                                              <span class="new-control-indicator"></span>Metal Completo
                                                            </label>
                                                        </div>
                                                        <div class="n-chk">
                                                            <label class="new-control new-radio radio-classic-primary">
                                                              <input disabled type="radio" class="new-control-input" name="aro_centevi" value="metal_semi" <?php if($aro_propio['aro_centevi'] === 'metal_semi'){ echo "checked"; }  ?>>
                                                              <span class="new-control-indicator"></span>Metal Semi - Aire
                                                            </label>
                                                        </div>
                                                        <div class="n-chk">
                                                            <label class="new-control new-radio radio-classic-primary">
                                                              <input disabled type="radio" class="new-control-input" name="aro_centevi" value="aire" <?php if($aro_propio['aro_centevi'] === 'aire'){ echo "checked"; }  ?>>
                                                              <span class="new-control-indicator"></span>Al Aire
                                                            </label>
                                                        </div>
                                                      </div>
                                                      <div class="col-md-4" style="max-width: fit-content">
                                                          <div class="n-chk">
                                                            <label class="new-control new-checkbox checkbox-outline-info">
                                                              <input disabled type="checkbox" class="new-control-input" name="propio" value="pasta_c" <?php if($aro_propio['propio'] === 'pasta_c'){ echo "checked"; }  ?>>
                                                              <span class="new-control-indicator"></span>Pasta Completo
                                                            </label>
                                                           </div>
                                                           <div class="n-chk">
                                                            <label class="new-control new-checkbox checkbox-outline-primary">
                                                              <input disabled type="checkbox" class="new-control-input" name="propio" value="pasta_semi" <?php if($aro_propio['propio'] === 'pasta_semi'){ echo "checked"; }  ?>>
                                                              <span class="new-control-indicator"></span>Pasta Semi - Aire
                                                            </label>
                                                           </div>
                                                           <div class="n-chk">
                                                            <label class="new-control new-checkbox checkbox-outline-success">
                                                              <input disabled type="checkbox" class="new-control-input" name="propio" value="seguridad" <?php if($aro_propio['propio'] === 'seguridad'){ echo "checked"; }  ?>>
                                                              <span class="new-control-indicator"></span>Seguridad
                                                            </label>
                                                            </div>

                                                      </div>
                                                      
                                                       <div class="col-md-2">
                                                          <label for="inputEmail4">Codigo</label>
                                                          <input disabled type="text" class="form-control" placeholder="" name="codigo_aro" value="<?php echo $aro_propio['codigo_aro']; ?>">
                                                       </div>
                                                       <div class="col-md-2">
                                                          <label for="inputEmail4">Color</label>
                                                          <input disabled type="text" class="form-control" placeholder="" name="color_aro" value="<?php echo $aro_propio['color_aro']; ?>">
                                                       </div>
                                                       <div class="col-md-12 mt-3">
                                                    <label for="inputEmail4">Marca</label>
                                                          <input disabled type="text" class="form-control" placeholder="" name="marca" value="<?php echo $aro_propio['marca']; ?>">
                                                    </div>
                                                  </div>
                                                </div>

                                                
                                                    <?php   $medidas = json_decode($recetas['medidas'] , true); ?>

                                                <div style="margin-top:10px; border: 2px solid blue; border-radius:25px; padding: 10px 50px;">
                                                    <div class="row mt-2">
                                                    <div class="col-md-2">
                                                                <h6 class="text-center p-2">MEDIDAS DE LENTE:</h6>
                                                           </div>
                                                    <div class="col-md-2">
                                                       <label for="inputEmail4">Altura (Vertical)</label>
                                                          <input disabled type="text" class="form-control" placeholder="" name="alto_l" value="<?php echo $medidas['alto_l']; ?>">
                                                    </div>
                                                       <div class="col-md-2">
                                                          <label for="inputEmail4">Horizontal</label>
                                                          <input disabled type="text" class="form-control" placeholder="" name="ancho_b_l" value="<?php echo $medidas['ancho_b_l']; ?>">
                                                       </div>
                                                       <div class="col-md-2">
                                                          <label for="inputEmail4">Diagonal Total</label>
                                                          <input disabled type="text" class="form-control" placeholder="" name="diagonal_l" value="<?php echo $medidas['diagonal_l']; ?>">
                                                       </div>
                                                       <div class="col-md-2">
                                                          <label for="inputEmail4">Puente</label>
                                                          <input disabled type="text" class="form-control" placeholder="" name="separacion_l" value="<?php echo $medidas['separacion_l']; ?>">
                                                       </div>
                                                       
                   
                                                    </div>

                                                    </div>  
                            <div style="margin-top:10px; border: 2px solid blue; border-radius:25px; padding: 10px 50px;">

                                                  <div class="row">
                                                    
                                                    <div class="col-md-6">
                                                          <label for="inputEmail4">Doctor</label>
                                                          <input disabled type="text" class="form-control" placeholder="" name="doctor" value="<?php echo $aro_propio['doctor']; ?>">
                                                       </div>
                                                       <div class="col-md-6">
                                                          <label for="inputEmail4">Elaborado por</label>
                                                          <input disabled type="text" class="form-control" placeholder="" name="elaborado" value="<?php echo $aro_propio['elaborado']; ?>">
                                                       </div>

                                                       <div class="col-md-12">
                                                          <label for="inputEmail4"> Observación</label>
                                                          <textarea disabled id="textarea" class="form-control textarea" maxlength="800" rows="5" placeholder="Esta área tiene un limite de 800 caracteres." name="observacion"><?php echo $recetas['observacion']; ?></textarea>
                                                       </div>
                                                    </div>
                                                </div>  

                                        
                                
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