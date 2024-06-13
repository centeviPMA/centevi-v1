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
                                            <h4>Refracción General</h4>
                                        </div>
                                    </div>
                                </div>

                                    
                                <?php
                              
                                  $item = 'id_consulta';
                                  
                                  $valor = $_GET['id_consulta'];
                                  
                                  $consultaRefraccion = ControladorRefraccionGeneral::ctrMostrarRefraccionGeneralID($item, $valor);
                             



                              
                              ?>

                                 <nav class="breadcrumb-one" aria-label="breadcrumb">
                                               <ol class="breadcrumb" style="background: rgb(0 150 136 / 11%)!important;">
                                                   <li class="breadcrumb-item"><a href="javascript:void(0);">Doctor:</a></li>
                                                   <li class="breadcrumb-item active" aria-current="page"><b><?php echo $consultaRefraccion['doctor']; ?></b></li>
                                               </ol>
                                             </nav>

                                             <?php 
                                              $editado = json_decode($consultaRefraccion['editado'], true);

                                          
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
                                                             $valor = $consultaRefraccion['paciente'];
                                                           
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
                                                                $selected = ($consultaRefraccion['sucursal'] == $value["id_sucursal"]) ? 'selected' : '';
                                                                echo '<option value="' . $value["id_sucursal"] . '" ' . $selected . '>' . $value['nombre'] . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                         <div class="form-group col-md-3">
                                                <label for="edad">Edad</label>
                                                <input type="text" class="form-control" id="edad" name="edad" value="<?php echo $consultaRefraccion['edad']; ?>" readonly>
                                            </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="inputAddress">Fecha de atencion</label>
                                                            <input disabled type="date" class="form-control" id="inputAddress" name="fecha_atencion" value="<?php echo $consultaRefraccion['fecha_atencion']; ?>">
                                                        </div>
                                                    </div>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-12">
                                                <label for="inputAddress">Motivo de Consulta:</label>
                                                <textarea readonly id="textarea" class="form-control textarea" maxlength="800" rows="5" placeholder="Esta área tiene un limite de 800 caracteres." name="m_c"><?php echo $consultaRefraccion['m_c']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-4">
                                                <label for="lugarNacimiento">Antecedentes Oculares</label>
                                                <input readonly type="text" class="form-control" id="lugarNacimiento" placeholder="A/O" name="a_o" value="<?php echo $consultaRefraccion['a_o']; ?>">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputAddress2">Antecedentes Personales</label>
                                                <input  readonly type="text" class="form-control" id="inputAddress2" placeholder="A/P" name="a_p" value="<?php echo $consultaRefraccion['a_p']; ?>">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputAddress2">Antecedentes Familiares</label>
                                                <input readonly type="text" class="form-control" id="inputAddress2" placeholder="A/F" name="a_f" value="<?php echo $consultaRefraccion['a_f']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-12">
                                                <label for="medicamentos">Medicamentos</label>
                                                <input readonly type="text" class="form-control" id="medicamentos" placeholder="Medicamentos" name="medicamentos" value="<?php echo $consultaRefraccion['medicamentos']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-12">
                                                <label for="tratamientos">Tratamientos anteriores</label>
                                                <input readonly type="text" class="form-control" id="tratamientos" placeholder="Tratamientos" name="tratamientos" value="<?php echo $consultaRefraccion['tratamientos']; ?>">
                                            </div>
                                        </div>


                                   <?php     $av_sc = json_decode($consultaRefraccion['av_sc'], true); ?>
                                   

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
                                                                    <input readonly type="text" class="form-control" placeholder="od_vl" name="av/sc_od_vl" value="<?php echo $av_sc['av_sc_od_vl']; ?>">
                                                                </td>
                                                                <td>
                                                                    <input readonly type="text" class="form-control" placeholder="oi_vl" name="av/sc_oi_vl" value="<?php echo $av_sc['av_sc_oi_vl']; ?>">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-center">VP</td>
                                                                <td>
                                                                    <input readonly type="text" class="form-control" placeholder="od_vp" name="av/sc_od_vp" value="<?php echo $av_sc['av_sc_od_vp']; ?>">
                                                                </td>
                                                                <td>
                                                                    <input readonly type="text" class="form-control" placeholder="oi_vp" name="av/sc_oi_vp" value="<?php echo $av_sc['av_sc_oi_vp']; ?>">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <?php     $av_cc = json_decode($consultaRefraccion['av_cc'], true); ?>
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
                                                                <td class="text-center">Visión Lejana</td>
                                                                <td>
                                                                    <input readonly type="text" class="form-control" placeholder="od_vl" name="av/cc_od_vl" value="<?php echo $av_cc['av_cc_od_vl']; ?>">
                                                                </td>
                                                                <td>
                                                                    <input readonly type="text" class="form-control" placeholder="oi_vl" name="av/cc_oi_vl" value="<?php echo $av_cc['av_cc_oi_vl']; ?>">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-center">Visión Próxima</td>
                                                                <td>
                                                                    <input readonly type="text" class="form-control" placeholder="od_vp" name="av/cc_od_vp" value="<?php echo $av_cc['av_cc_od_vp']; ?>">
                                                                </td>
                                                                <td>
                                                                    <input readonly type="text" class="form-control" placeholder="oi_vp" name="av/cc_oi_vp" value="<?php echo $av_cc['av_cc_oi_vp']; ?>">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>


                                       <!-- <div class="row">
                                            <div class="col-md-6">
                                                <h6>OJO DOMINANTE</h6>
                                                <div class="form-row mb-4">
                                                    <div class="form-group col-md-3">
                                                        <div class="n-chk">
                                                            <label class="new-control new-radio radio-classic-success">
                                                                <input type="radio" class="new-control-input" name="ojo_dominante" value="izquierdo" <?php if($consultaRefraccion['ojo_dominante'] === 'izquierdo'){ echo "checked"; }  ?>>
                                                                <span class="new-control-indicator"></span>IZQUIEDO
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <div class="n-chk">
                                                            <label class="new-control new-radio radio-classic-success">
                                                                <input type="radio" class="new-control-input" name="ojo_dominante" value="derecho" <?php if($consultaRefraccion['ojo_dominante'] === 'derecho'){ echo "checked"; }  ?>>
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
                                                                <input type="radio" class="new-control-input" name="mano_dominante" value="izquierda" <?php if($consultaRefraccion['mano_dominante'] === 'izquierda'){ echo "checked"; }  ?>>
                                                                <span class="new-control-indicator"></span>IZQUIEDA
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <div class="n-chk">
                                                            <label class="new-control new-radio radio-classic-success">
                                                                <input type="radio" class="new-control-input" name="mano_dominante" value="derecha" <?php if($consultaRefraccion['mano_dominante'] === 'derecha'){ echo "checked"; }  ?>>
                                                                <span class="new-control-indicator"></span>DERECHA
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>-->





                                        <?php     $lensometria = json_decode($consultaRefraccion['lensometria'], true); ?>
                                        <div class="form-group">
                                             <h5>LENSOMETRIA</h5> 
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">RX</th>
                                                            <th>ESFERA</th>
                                                            <th>CILINDRO</th>
                                                            <th>EJE</th>
                                                            <th>P/BASE △</th>
                                                            <th>ADD</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-center">OD</td>
                                                            <td>
                                                                <input readonly type="text" class="form-control" placeholder="esfera_od" name="esfera_od" value="<?php echo $lensometria['esfera_od']; ?>">
                                                            </td>
                                                            <td>
                                                                <input readonly type="text" class="form-control" placeholder="cilindro_od" name="cilindro_od" value="<?php echo $lensometria['cilindro_od']; ?>">
                                                            </td>
                                                            <td>
                                                                <input readonly type="text" class="form-control" placeholder="eje_od" name="eje_od" value="<?php echo $lensometria['eje_od']; ?>">
                                                            </td>
                                                            <td>
                                                                <input readonly type="text" class="form-control" placeholder="△" name="p_base_od" value="<?php echo $lensometria['p_base_od']; ?>">
                                                            </td>
                                                            <td>
                                                                <input readonly type="text" class="form-control" placeholder="add_od" name="add_od" value="<?php echo $lensometria['add_od']; ?>">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">OI</td>
                                                            <td>
                                                                <input readonly type="text" class="form-control" placeholder="esfera_oi" name="esfera_oi" value="<?php echo $lensometria['esfera_oi']; ?>">
                                                            </td>
                                                            <td>
                                                                <input readonly type="text" class="form-control" placeholder="cilindro_oi" name="cilindro_oi" value="<?php echo $lensometria['cilindro_oi']; ?>">
                                                            </td>
                                                            <td>
                                                                <input readonly type="text" class="form-control" placeholder="eje_oi" name="eje_oi" value="<?php echo $lensometria['eje_oi']; ?>">
                                                            </td>
                                                            <td>
                                                                <input readonly type="text" class="form-control" placeholder="△" name="p_base_oi" value="<?php echo $lensometria['p_base_oi']; ?>">
                                                            </td>
                                                            <td>
                                                                <input readonly type="text" class="form-control" placeholder="add_oi" name="add_oi" value="<?php echo $lensometria['add_oi']; ?>">
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <?php     $lensometria_extra = json_decode($consultaRefraccion['lensometria_extra'], true); ?>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-3">
                                                <label for="objetivos">Tipo de lentes</label>
                                                <input readonly type="text" class="form-control" name="len_tipo_lentes" value="<?php echo $lensometria_extra['len_tipo_lentes']; ?>">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="objetivos">Filtros</label>
                                                <input readonly type="text" class="form-control" name="len_filtros" value="<?php echo $lensometria_extra['len_filtros']; ?>">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="objetivos">Tiempo</label>
                                                <input readonly type="text" class="form-control" name="len_tiempo" value="<?php echo $lensometria_extra['len_tiempo']; ?>">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="objetivos">Tipo de Aro</label>
                                                <input readonly type="text" class="form-control" name="len_tipo_arco" value="<?php echo $lensometria_extra['len_tipo_arco']; ?>">
                                            </div>
                                        </div>


                                        <?php     $sa_pp = json_decode($consultaRefraccion['sa_pp'], true); ?>
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
                                                <input readonly type="text" class="form-control" placeholder="Ojo Derecho" name="sa_od"  value="<?php echo $sa_pp['sa_od']; ?>">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input readonly type="text" class="form-control" placeholder="Ojo Derecho" name="pp_od"  value="<?php echo $sa_pp['pp_od']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-3">
                                                <input readonly type="text" class="form-control" placeholder="Ojo Izquierdo" name="sa_oi"  value="<?php echo $sa_pp['sa_oi']; ?>">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input readonly type="text" class="form-control" placeholder="Ojo Izquierdo" name="pp_oi"  value="<?php echo $sa_pp['pp_oi']; ?>">
                                            </div>
                                        </div>
                                </div>

                            
                                <?php     $visuscopia = json_decode($consultaRefraccion['visuscopia'], true); ?>

                                <div class="form-row mb-4">
                                    <div class="form-group col-md-6">
                                        <label for="tratamientos">Hirschberg</label>
                                        <input readonly type="text" class="form-control" id="hirschberg" placeholder="hirschberg" name="hirschberg" value="<?php echo $visuscopia['hirschberg']; ?>">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="VL">CT: VL:</label>
                                        <input readonly type="text" class="form-control" id="VL" placeholder="VL" name="ct_vl" value="<?php echo $visuscopia['ct_vl']; ?>">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="VP">VP</label>
                                        <input readonly type="text" class="form-control" id="VP" placeholder="VP" name="ct_vp" value="<?php echo $visuscopia['ct_vp']; ?>">
                                    </div>
                                </div>

                                <div class="form-row mb-4">
                                    <div class="form-group col-md-12">
                                        <label for="inputAddress">VERSIONES:</label>
                                        <textarea readonly id="textarea" class="form-control textarea" maxlength="800" rows="5" placeholder="Esta área tiene un limite de 800 caracteres." name="plan_versiones"><?php echo $consultaRefraccion['plan_versiones']; ?></textarea>
                                    </div>
                                </div>

                                <?php     $visuscopia_extra = json_decode($consultaRefraccion['visuscopia_extra'], true); ?>

                                <div class="form-row mb-4">
                                    <div class="form-group col-md-2">
                                        <label for="tratamientos">PPC: OR </label>
                                        <input readonly type="text" class="form-control" id="ppc_or" placeholder="ppc_or" name="ppc_or" value="<?php echo $visuscopia_extra['ppc_or']; ?>">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="tratamientos">L: </label>
                                        <input readonly type="text" class="form-control" id="ppc_l" placeholder="ppc_l" name="ppc_l" value="<?php echo $visuscopia_extra['ppc_l']; ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tratamientos">Posicion compensatoria: </label>
                                        <input readonly type="text" class="form-control" id="ppc_posicion" placeholder="ppc_posicion" name="ppc_posicion" value="<?php echo $visuscopia_extra['ppc_posicion']; ?>">
                                    </div>
                                </div>

                                <div class="form-row mb-4">
                                    <div class="form-group col-md-12">
                                        <label for="inputAddress">OBSERVACIONES:</label>
                                        <textarea readonly id="textarea" class="form-control textarea" maxlength="500" rows="3" placeholder="Esta área tiene un limite de 500 caracteres." name="observaciones"><?php echo $visuscopia_extra['observaciones'];?></textarea>
                                    </div>
                                </div>

                               
                               

                                <?php  $pruebas = json_decode($consultaRefraccion['pruebas'], true); ?>

                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center">PRUEBAS SENSORIALES</th>
                                                <th class="text-center">Visión Lejana</th>
                                                <th class="text-center">Visión Próxima</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center">Luces de Worth</td>
                                                <td>
                                                    <input readonly type="text" class="form-control" name="vl_luces" placeholder="vl_luces"  value="<?php echo $pruebas['vl_luces']; ?>">
                                                </td>
                                                <td>
                                                    <input readonly type="text" class="form-control" name="vp_luces" placeholder="vp_luces" value="<?php echo $pruebas['vp_luces']; ?>">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <?php  $pruebas_extra = json_decode($consultaRefraccion['pruebas_extra'], true); ?>

                                <div class="form-row mb-4">
                                    <div class="form-group col-md-3">
                                        <h4 class="text-center">Estereopsis</h4>
                                        <!--<input type="text" class="form-control" id="inputAddress" placeholder="estereopsis" name="estereopsis" value="<?php echo $pruebas_extra['estereopsis']; ?>">-->
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputAddress">Randot:</label>
                                        <input readonly type="text" class="form-control" id="inputAddress" placeholder="randot" name="randot" value="<?php echo $pruebas_extra['randot']; ?>">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputAddress">Lang:</label>
                                        <input readonly type="text" class="form-control" id="inputAddress" placeholder="lang" name="lang" value="<?php echo $pruebas_extra['lang']; ?>">
                                    </div>
                                    <!--<div class="form-group col-md-3">
                                        <label for="inputAddress">Seg. Arco:</label>
                                        <input type="text" class="form-control" id="inputAddress" placeholder="seg.arco" name="seg_arco" value="<?php echo $pruebas_extra['seg_arco']; ?>">
                                    </div>-->
                                </div>

                                <div class="form-row mb-4">
                                    <div class="form-group col-md-12">
                                        <label for="inputAddress">Visión de Color</label>
                                        <input readonly type="text" class="form-control" id="inputAddress" placeholder="vision" name="vision_color" value="<?php echo $pruebas_extra['vision_color']; ?>"> 
                                    </div>
                                </div>

                               <!-- <?php  $acomodacion = json_decode($consultaRefraccion['acomodacion'], true); ?>
                                <h6>Acomodación</h6>
                                <div class="form-row mb-4">
                                    <div class="form-group col-md-3">
                                        <label for="inputAddress">A.A OD:</label>
                                        <input type="text" class="form-control" id="inputAddress" placeholder="aa_od" name="aa_od" value="<?php echo $acomodacion['aa_od']; ?>">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputAddress">OI</label>
                                        <input type="text" class="form-control" id="inputAddress" placeholder="aa_oi" name="aa_oi" value="<?php echo $acomodacion['aa_oi']; ?>">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputAddress">FAM: OD</label>
                                        <input type="text" class="form-control" id="inputAddress" placeholder="fan_od" name="fan_od" value="<?php echo $acomodacion['fan_od']; ?>">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputAddress">CPM</label>
                                        <input type="text" class="form-control" id="inputAddress" placeholder="fan_cpm" name="fan_cpm" value="<?php echo $acomodacion['fan_cpm']; ?>">
                                    </div>

                                </div>
                                <div class="form-row mb-4">
                                    <div class="form-group col-md-3">
                                        <label for="inputAddress">OI</label>
                                        <input type="text" class="form-control" id="inputAddress" placeholder="aco_oi" name="aco_oi" value="<?php echo $acomodacion['aco_oi']; ?>">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputAddress">CPM</label>
                                        <input type="text" class="form-control" id="inputAddress" placeholder="aco_cpm" name="aco_cpm" value="<?php echo $acomodacion['aco_cpm']; ?>">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputAddress">FAB</label>
                                        <input type="text" class="form-control" id="inputAddress" placeholder="acp_fab" name="acp_fab" value="<?php echo $acomodacion['acp_fab']; ?>">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputAddress">CPM Falla</label>
                                        <input type="text" class="form-control" id="inputAddress" placeholder="aco_falla" name="aco_falla" value="<?php echo $acomodacion['aco_falla']; ?>">
                                    </div>

                                </div>                   
                                
                                <?php  $acomodacion_extra = json_decode($consultaRefraccion['acomodacion_extra'], true); ?>

                                <div class="form-row mb-4">
                                    <div class="form-group col-md-3">
                                        <label for="inputAddress">MEM:OD</label>
                                        <input type="text" class="form-control" id="inputAddress" placeholder="mem_od" name="mem_od" value="<?php echo $acomodacion_extra['mem_od']; ?>">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputAddress">OI</label>
                                        <input type="text" class="form-control" id="inputAddress" placeholder="mem_oi" name="mem_oi" value="<?php echo $acomodacion_extra['mem_oi']; ?>">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputAddress">ARN</label>
                                        <input type="text" class="form-control" id="inputAddress" placeholder="mem_arn" name="mem_arn" value="<?php echo $acomodacion_extra['mem_arn']; ?>">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputAddress">ARP</label>
                                        <input type="text" class="form-control" id="inputAddress" placeholder="mem_arp" name="mem_arp" value="<?php echo $acomodacion_extra['mem_arp']; ?>">
                                    </div>

                                </div>-->

 
                                

                            <?php     $refraccion = json_decode($consultaRefraccion['refraccion'], true); ?>

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
                                                                  </tr>
                                                              </thead>
                                                              <tbody>
                                                                  <tr>
                                                                      <td class="text-center">OD</td>
                                                                      <td>
                                                                      <input readonly type="text" class="form-control" name="esfera_od_f" value="<?php echo $refraccion['esfera_od_f']; ?>">
                                                                      </td>
                                                                      <td>                                                    
                                                                       <input readonly type="text" class="form-control" name="cilindro_od_f" value="<?php echo $refraccion['cilindro_od_f']; ?>">  
                                                                      </td>
                                                                      <td>                                                    
                                                                       <input readonly type="text" class="form-control" name="eje_od_f" value="<?php echo $refraccion['eje_od_f']; ?>">  
                                                                      </td>
                                                                      <td>                                                    
                                                                       <input readonly type="text" class="form-control" name="p_base_od_f"  value="<?php echo $refraccion['p_base_od_f']; ?>">  
                                                                      </td>
                                                                      <td>                                                    
                                                                       <input readonly type="text" class="form-control" name="add_od_f"  value="<?php echo $refraccion['add_od_f']; ?>">  
                                                                      </td>
                                                                  </tr>
                                                                  <tr>
                                                                      <td class="text-center">OI</td>
                                                                      <td>
                                                                      <input readonly type="text" class="form-control" name="esfera_oi_f"  value="<?php echo $refraccion['esfera_oi_f']; ?>">
                                                                      </td>
                                                                      <td>                                                    
                                                                      <input readonly type="text" class="form-control" name="cilindro_oi_f"  value="<?php echo $refraccion['cilindro_oi_f']; ?>"> 
                                                                      </td>
                                                                      <td>                                                    
                                                                       <input readonly type="text" class="form-control" name="eje_oi_f"  value="<?php echo $refraccion['eje_oi_f']; ?>">  
                                                                      </td>
                                                                      <td>                                                    
                                                                       <input readonly type="text" class="form-control" name="p_base_oi_f"  value="<?php echo $refraccion['p_base_oi_f']; ?>">  
                                                                      </td>
                                                                      <td>                                                    
                                                                       <input readonly type="text" class="form-control" name="add_oi_f"  value="<?php echo $refraccion['add_oi_f']; ?>">  
                                                                      </td>
                                                                  </tr>
                                                              </tbody>
                                                          </table>
                                                       </div>
                                                   </div>

                                            <?php     $tipo_lentes = json_decode($consultaRefraccion['tipo_lentes'], true); ?>

                                <div class="form-row mb-4">
                                    <div class="form-group col-md-6">
                                        <label for="tratamientos">Tipo Lentes </label>
                                        <input readonly type="text" class="form-control" id="tipo_l" placeholder="tipo_l" name="tipo_l"  value="<?php echo $tipo_lentes['tipo_l']; ?>">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="tratamientos">PD: </label>
                                        <input readonly type="text" class="form-control" id="pd" placeholder="pd" name="pd"  value="<?php echo $tipo_lentes['pd']; ?>">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="tratamientos">DNP</label>
                                        <input readonly type="text" class="form-control" id="dnp" placeholder="dnp" name="dnp"  value="<?php echo $tipo_lentes['dnp']; ?>">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="tratamientos">ALTURA</label>
                                        <input readonly type="text" class="form-control" id="alt" placeholder="alt" name="alt"  value="<?php echo $tipo_lentes['alt']; ?>">
                                    </div>
                                </div>

                                 <?php     $lentes_contacto = json_decode($consultaRefraccion['lentes_contacto'], true); ?>


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
                                                        <input readonly type="text" class="form-control" placeholder="poder_od" name="poder_od"  value="<?php echo $lentes_contacto['poder_od']; ?>">
                                                    </td>
                                                    <td>
                                                        <input readonly type="text" class="form-control" placeholder="poder_oi" name="poder_oi"  value="<?php echo $lentes_contacto['poder_oi']; ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">C.B</td>
                                                    <td>
                                                        <input readonly type="text" class="form-control" placeholder="cb_od" name="cb_od"  value="<?php echo $lentes_contacto['cb_od']; ?>">
                                                    </td>
                                                    <td>
                                                        <input readonly type="text" class="form-control" placeholder="cb_oi" name="cb_oi"  value="<?php echo $lentes_contacto['cb_oi']; ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">DIA</td>
                                                    <td>
                                                        <input readonly type="text" class="form-control" placeholder="dia_od" name="dia_od"  value="<?php echo $lentes_contacto['dia_od']; ?>">
                                                    </td>
                                                    <td>
                                                        <input readonly type="text" class="form-control" placeholder="dia_oi" name="dia_oi"  value="<?php echo $lentes_contacto['dia_oi']; ?>">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>


                                <div class="form-row mb-4">
                                    <div class="form-group col-md-6">
                                        <label for="inputAddress">Marca</label>
                                        <input readonly type="text" class="form-control" id="inputAddress" placeholder="Marca" name="lente_marca" value="<?php echo $lentes_contacto['lente_marca']; ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputAddress">Tipo:</label>
                                        <input readonly type="text" class="form-control" id="inputAddress" placeholder="Tipo" name="lente_tipo" value="<?php echo $lentes_contacto['lente_tipo']; ?>">
                                    </div>
                                </div>


                                <div class="form-row mb-4">
                                    <div class="form-group col-md-12">
                                        <label for="inputAddress">CONDUCTA A SEGUIR:</label>
                                        <textarea readonly id="textarea" class="form-control textarea" maxlength="800" rows="5" placeholder="Esta área tiene un limite de 800 caracteres." name="conducta_seguir"><?php echo $consultaRefraccion['conducta_seguir']; ?></textarea>
                                    </div>
                                </div>

                                




                                <input type="hidden" name="crear_refraccion_general" value="crear">
                                <input type="hidden" name="sucursal" value="<?php echo $_SESSION['sucursal']; ?>">
                                <input type="hidden" name="doctor" value="<?php echo $_SESSION['nombre']; ?>">
                                <?php if (isset($_GET['id_terapia'])) {  ?>
                                    <input type="hidden" name="id_terapia" value="<?php echo $_GET['id_terapia']; ?>">
                                <?php  } else { ?>
                                    <input type="hidden" name="id_terapia" value="0">
                                <?php } ?>
                                <!-- <button type="submit" class="btn btn-success mt-3">Crear</button> -->
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