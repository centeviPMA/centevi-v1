<div class="admin-data-content" style="margin-top:50px;">
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
            <div class="widget-content-area br-4">
                <div class="widget-one">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="widget-content widget-content-area">

                            <?php
                            
                            $item = 'id_terapia';
                            $valor = $_GET['id_terapia'];
                            
                            $terapia = ControladorTerapiasOptometriaPediatrica::ctrMostrarTerapiaOptometriaPediatricaID($item, $valor);
                            
                            ?>

                            

                            <div class="col-md-12">
                            <form role="form" method="post">
                                <label for="textarea">Motivo</label>
                                <textarea id="textarea" class="form-control textarea" maxlength="200" rows="1" placeholder="Limite de 200 caracteres." name="motivo"><?php echo $terapia['motivo']; ?></textarea>
                                 <input type="hidden" name="actualizar_motivo" value="actualizar">
                                 <input type="hidden" name="id_terapia" value="<?php echo $_GET['id_terapia']; ?>">
                                 <input type="hidden" name="id_paciente" value="<?php echo $_GET['id_paciente']; ?>">
                                <button type="submit" class="btn btn-success mt-3">Actualizar Motivo</button> 
                             </form>
                             <?php

                              $actualizarMotivo = new ControladorTerapiasOptometriaPediatrica();
                              $actualizarMotivo->ctrActualizarMotivoTerapia();
                              
                              ?>
                            </div>

                                <?php

                                $item_cantidadON = "id_terapia";
                                $valor_cantidadON = $_GET['id_terapia'];

                                //$cantidad_consultas = ControladorOptometriaPediatrica::ctrMostrarCantidadOptometriaPediatricaID($item_cantidadON, $valor_cantidadON);
                                ?>
                                
                                <form role="form" method="post">
                                 <input type="hidden" name="crear_terapia" value="crear">
                                 <input type="hidden" name="id_paciente" value="<?php echo $_GET['id_paciente']; ?>">
                                 <input type="hidden" name="id_terapias" value="<?php echo $_GET['id_terapia']; ?>">
                                 <input type="hidden" name="doctor" value="<?php echo $_SESSION['nombre']; ?>">
                                 <button class="btn btn-success mb-4 ml-3 mt-4">

                                     Agregar Sesión

                                 </button>

                                    </form>
                                    <?php

                                     $crearResultado = new ControladorOptometriaPediatrica();
                                     $crearResultado->ctrCrearTerapia();
                                     
                                     ?>
                                <h5 class="p-3">Sesiones:</h5>

                                <div class="card component-card_7" style="width:100%; background: rgb(0 150 136 / 11%);">
                                    <div class="table-responsive-md">

                                        <table id="zero-config" class="table dt-table-hover sesiones" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Sesión</th>
                                                    <th>Pagado</th>
                                                    <th>Sucursal</th>
                                                    <th>Terapeuta</th>
                                                    <th>Fecha de Atención</th>
                                                    <th class="no-content">Acción</th>

                                                </tr>

                                            </thead>
                                            <tbody>

                                                <?php

                                                $item = 'id_terapia';

                                                $valor = $_GET['id_terapia'];



                                                $resultado = ControladorOptometriaPediatrica::ctrMostrarTerapia($item, $valor);


                                                foreach ($resultado as $key => $value) {

                                                    echo '<tr>';

                                                    echo '
                                                              
                                                    <td class="text-center"> 
                                                        ';
                                                      if($value['completado'] == 1){
                                                          echo '<img src="vistas/img/check.jpg" style="width:4%;" alt="">';
                                                      } else{
                                                          echo "";
                                                      }
                                                       echo' 
                                                         Sesión ' . ($key + 1) . '
                                                     </td>';

                                                     if($_SESSION['perfil'] == 'Administrador' || $_SESSION['perfil'] == 'superadministrador' || $_SESSION['perfil'] == 'doctor' ||                                                                  $_SESSION['perfil'] == 'gestor'){

                                                        if($value["pagado"] != 0){
                                 
                                                           echo '<td><button class="btn btn-success btn-xs btnActivar" idSesion="'.$value["id"].'" idPaciente="'.$_GET["id_paciente"].'"  idTerapia="'.$_GET["id_terapia"].'" estadoPago="0">Pagado</button></td>';
                                               
                                                         }else{
                                               
                                                           echo '<td><button class="btn btn-danger btn-xs btnActivar" idSesion="'.$value["id"].'" idPaciente="'.$_GET["id_paciente"].'"  idTerapia="'.$_GET["id_terapia"].'" estadoPago="1">Sin Pago</button></td>';
                                               
                                                         }
                                                       
                                                   } else{
       
                                                       if($value["pagado"] != 0){
                                 
                                                           echo '<td><button class="btn btn-success btn-xs btnActivar" idSesion="'.$value["id"].'" idPaciente="'.$_GET["id_paciente"].'"  idTerapia="'.$_GET["id_terapia"].'" estadoPago="0">Pagado</button></td>';
                                               
                                                          }
                                                    
                                                   }









                                                   
                                                   echo '<td style="width: 220px">
                                                        <select required class="form-control" id="sucursal" name="sucursal" idPaciente="'.$_GET["id_paciente"].'"  idTerapia="'.$_GET["id_terapia"].'" idSesion="'.$value["id"].'">
                                                            <option value="">Seleccionar sucursal</option>
                                                    ';
                                                    $sucursales = ControladorSucursales::ctrMostrarSurcursales(null, null);
                                                
                                                    foreach ($sucursales as $key => $sucursal) {
                                                        if($value["sucursal"] == $sucursal["id_sucursal"]){
                                                            echo '<option selected value="' . $sucursal["id_sucursal"] . '">' . $sucursal['nombre'] ." - -".$value["sucursal"]. '</option>';
                                                        }else{
                                                            echo '<option value="' . $sucursal["id_sucursal"] . '">' . $sucursal['nombre'] . '</option>';
                                                        }
                                                    }
                                                    echo '
                                                        </select>
                                                    </td>';







                                                    echo '<td>'.$value['doctor'].'</td>';
                                                    echo '<td>'.$value['fecha_creacion'].'</td>';
                                                    echo '<td>';
                                               




                                                    echo '<button ver_terapia="' . $value['id'] . '"  id_paciente="' . $_GET['id_paciente'] . '"  id_terapia="' . $_GET['id_terapia'] . '" class="btnVerTerapiaOPP btn btn-primary mb-2 p-1 mr-2 rounded-circle"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                           </svg></button>
                                                          <button    idSucursal="'.$value["sucursal"].'"     editar_terapia="' . $value['id'] . '" id_paciente="' . $_GET['id_paciente'] . '"  id_terapia="' . $_GET['id_terapia'] . '" class="btnEditarTerapiaOPP btn btn-warning mb-2 p-1 mr-2 rounded-circle"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                          </svg></button>';

                                                    if ($_SESSION['perfil'] == 'Administrador' || $_SESSION['perfil'] == 'superadministrador') {

                                                        echo '<button eliminar_terapia="' . $value['id'] . '" id_paciente="' . $_GET['id_paciente'] . '" id_terapia="' . $_GET['id_terapia'] . '" class="btnEliminarTerapiaOPP btn btn-danger mb-2 p-1 mr-2 rounded-circle"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                              </svg></button>';
                                                    }

                                                    echo '    
                                                          </td>
                                                 
                                                          </tr>';
                                                }

                                                ?>


                                            </tbody>
                                            <!-- <tfoot>
                                                <tr>
                                                    <th>Nro</th>
                                                    <th>Medico</th>
                                                    <th>Fecha Atención</th>
                                                    <th class="no-content"></th>
                                                </tr>
                                            </tfoot> -->
                                        </table>


                                    </div>

                                    <?php

                                    $borrar_terapia = new ControladorOptometriaPediatrica();
                                    $borrar_terapia->ctrEliminarTerapia();

                                    ?>




                                </div>

                                <?php
                                $item_cantidad = "id_terapia";
                                $valor_cantidad = $_GET['id_terapia'];

                                $cantidad_citas = ControladorOptometriaPediatrica::ctrMostrarCantidadOptometriaPediatricaID($item_cantidad, $valor_cantidad);


                                if ($cantidad_citas['cantidad'] >= 4) {








                                ?>
                                    <form role="form" method="post">
                                        <?php
                                        $item = 'id_terapia';
                                        $valor = $_GET['id_terapia'];

                                        $evaluación = ControladorTerapiasOptometriaPediatrica::ctrMostrarTerapiaOptometriaPediatricaID($item, $valor);


                                        if ($evaluación['evaluacion'] == "") { ?>
                                            <h5 class="p-3">Evaluación:</h5>

                                            <div class="form-row mb-12">
                                                <div class="form-group col-md-12">
                                                  <textarea id="evaluacion" name="evaluacion" style="width: 100%; height: 50vh;"></textarea>
                                                </div>
                                            </div>
                     
                                            <?php } else { ?>
                                            <h5 class="p-3">Evaluación:</h5>
                                            <div class="form-row mb-12">
                                                <div class="form-group col-md-12">
                                                  <textarea id="evaluacion" name="evaluacion" style="width: 100%; height: 50vh;"><?php echo $evaluación['evaluacion'];  ?></textarea>
                                                </div>
                                            </div>
                                  
                                        <?php } ?>
                                        
                                            <input type="hidden" name="editar_evaluacion" value="editar">
                                            <input type="hidden" name="id_terapia" value="<?php echo $_GET['id_terapia']; ?>">
                                            <button type="submit" class="btn btn-success mt-3">Actualizar Campos</button>


                                    </form>
                                    <?php

                                    $actualizarEvaluacion = new ControladorOptometriaPediatrica();
                                    $actualizarEvaluacion->ctrEditarEvaluacionOP();

                                    ?>

                                <?php } ?>
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


<script src="vistas/js/optometriaPediatrica.js"></script>