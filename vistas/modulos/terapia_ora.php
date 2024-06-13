<link rel="stylesheet" type="text/css" href="vistas/plugins/select2/select2.min.css">
<div class="admin-data-content" style="margin-top:50px;">
   <div class="row layout-top-spacing" >
      <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
             <div class="widget-content-area br-4">
                 <div class="widget-one">
                     <div class="row">
                                             
                     
                                   <div class="col-md-12">
                                    <div class="widget-content widget-content-area">

                      
                                          <?php  if(isset($_GET['agregar_terapia'])) {?>
                                         
                                             <h5 class="p-3"> AGREGAR:</h5>
                                            <form  role="form" method="post">
                                            <div class="form-row mb-4">
                                                <div class="form-group col-md-12">
                                                    <label>Actividad</label>
                                                    <textarea id="textarea" class="form-control textarea" maxlength="500" rows="4" placeholder="Esta área tiene un limite de 500 caracteres." name="actividad"></textarea>
                                                </div>
                                              </div>
                                             <div class="form-row mb-4">
                                                <div class="form-group col-md-12">
                                                    <label>Resultado</label>
                                                    <textarea id="textarea" class="form-control textarea" maxlength="500" rows="4" placeholder="Esta área tiene un limite de 500 caracteres." name="resultado"></textarea>
                                                </div>
                                              </div>
                                               <input type="hidden" name="crear_terapia" value="crear">
                                               <input type="hidden" name="id_paciente" value="<?php echo $_GET['id_paciente']; ?>">
                                               <input type="hidden" name="id_terapias" value="<?php echo $_GET['agregar_terapia']; ?>">
                                               <input type="hidden" name="doctor" value="<?php echo $_SESSION['nombre']; ?>">
                                               <button type="submit" class="btn btn-success mt-3">Agregar</button>
                                            </form>
                                            <?php

                                              $crearR = new ControladorOrtopticaAdultos();
                                              $crearR -> ctrCrearTerapia();                                     
                                            
                                            ?>  
                                           <?php } else if(isset($_GET['editar_terapia'])) {  ?>

                                             <h5 class="p-3"> EDITAR:</h5>
                                                <?php
                              
                                                $item = 'id';
                      
                                                $valor = $_GET['editar_terapia'];
                      

                                                
                                                $resultado = ControladorOrtopticaAdultos::ctrMostrarTerapiaIndividual($item, $valor);

                                                $sesion = json_decode($resultado['sesion'], true);

                      
                                                ?>
                                               <form role="form" method="post">

                                                <h5 class="p-3">Actividad:</h5>
                                                
                                                <div class="card component-card_7" style="width:100%; background: rgb(0 150 136 / 11%);">
                                                   <div class="table-responsive-md">
                                                
                                                      <table id="zero-config" class="table dt-table-hover" style="width:100%">
                                                         <thead>
                                                            <tr>
                                                               <th>Actividad</th>
                                                               <th>Resultado</th>
                                                
                                                
                                                            </tr>
                                                         </thead>
                                                         <tbody>
                                                            <?php if ($sesion != "") { ?>
                                                               <?php
                                                               // echo '<pre>';
                                                               // var_dump($sesion);
                                                               // echo  '</pre>';
                                                               ?>
                                                               <tr>
                                                                  <td><textarea id="textarea" class="form-control textarea" maxlength="800" rows="4" placeholder="Esta área tiene un limite de 800 caracteres." name="actividad_1"><?php echo $sesion['actividad_1']; ?></textarea></td>
                                                                  <td><textarea id="textarea" class="form-control textarea" maxlength="800" rows="4" placeholder="Esta área tiene un limite de 800 caracteres." name="resultado_1"><?php echo $sesion['resultado_1']; ?></textarea></td>
                                                               </tr>
                                                               <tr>
                                                                  <td><textarea id="textarea" class="form-control textarea" maxlength="800" rows="4" placeholder="Esta área tiene un limite de 800 caracteres." name="actividad_2"><?php echo $sesion['actividad_2']; ?></textarea></td>
                                                                  <td><textarea id="textarea" class="form-control textarea" maxlength="800" rows="4" placeholder="Esta área tiene un limite de 800 caracteres." name="resultado_2"><?php echo $sesion['resultado_2']; ?></textarea></td>
                                                               </tr>
                                                               <tr>
                                                                  <td><textarea id="textarea" class="form-control textarea" maxlength="800" rows="4" placeholder="Esta área tiene un limite de 800 caracteres." name="actividad_3"><?php echo $sesion['actividad_3']; ?></textarea></td>
                                                                  <td><textarea id="textarea" class="form-control textarea" maxlength="800" rows="4" placeholder="Esta área tiene un limite de 800 caracteres." name="resultado_3"><?php echo $sesion['resultado_3']; ?></textarea></td>
                                                               </tr>
                                                               <tr>
                                                                  <td><textarea id="textarea" class="form-control textarea" maxlength="800" rows="4" placeholder="Esta área tiene un limite de 800 caracteres." name="actividad_4"><?php echo $sesion['actividad_4']; ?></textarea></td>
                                                                  <td><textarea id="textarea" class="form-control textarea" maxlength="800" rows="4" placeholder="Esta área tiene un limite de 800 caracteres." name="resultado_4"><?php echo $sesion['resultado_4']; ?></textarea></td>
                                                               </tr>
                                                
                                                            <?php } else { ?>
                                                               <?php
                                                               // echo '<pre>';
                                                               // var_dump($sesion);
                                                               // echo  '</pre>';
                                                               ?>
                                                
                                                               <tr>
                                                                  <td><textarea id="textarea" class="form-control textarea" maxlength="800" rows="4" placeholder="Esta área tiene un limite de 800 caracteres." name="actividad_1"></textarea></td>
                                                                  <td><textarea id="textarea" class="form-control textarea" maxlength="800" rows="4" placeholder="Esta área tiene un limite de 800 caracteres." name="resultado_1"></textarea></td>
                                                               </tr>
                                                               <tr>
                                                                  <td><textarea id="textarea" class="form-control textarea" maxlength="800" rows="4" placeholder="Esta área tiene un limite de 800 caracteres." name="actividad_2"></textarea></td>
                                                                  <td><textarea id="textarea" class="form-control textarea" maxlength="800" rows="4" placeholder="Esta área tiene un limite de 800 caracteres." name="resultado_2"></textarea></td>
                                                               </tr>
                                                               <tr>
                                                                  <td><textarea id="textarea" class="form-control textarea" maxlength="800" rows="4" placeholder="Esta área tiene un limite de 800 caracteres." name="actividad_3"></textarea></td>
                                                                  <td><textarea id="textarea" class="form-control textarea" maxlength="800" rows="4" placeholder="Esta área tiene un limite de 800 caracteres." name="resultado_3"></textarea></td>
                                                               </tr>
                                                               <tr>
                                                                  <td><textarea id="textarea" class="form-control textarea" maxlength="800" rows="4" placeholder="Esta área tiene un limite de 800 caracteres." name="actividad_4"></textarea></td>
                                                                  <td><textarea id="textarea" class="form-control textarea" maxlength="800" rows="4" placeholder="Esta área tiene un limite de 800 caracteres." name="resultado_4"></textarea></td>
                                                               </tr>
                                                
                                                
                                                            <?php } ?>
                                                
                                                
                                                         </tbody>
                                                
                                                      </table>
                                                
                                                
                                                   </div>
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                </div>
                                                <input type="hidden" name="editar" value="editar">
                                                <input type="hidden" name="id_paciente" value="<?php echo $_GET['id_paciente']; ?>">
                                                <input type="hidden" name="id_terapia" value="<?php echo $_GET['id_terapia']; ?>">
                                                <input type="hidden" name="id" value="<?php echo $resultado['id']; ?>">
                                                <button type="submit" class="btn btn-success mt-3">Editar</button>
                                                </form>
                                                <?php
                                                
                                                $editarResultado = new ControladorOrtopticaAdultos();
                                                $editarResultado->ctrEditarTerapia();
                                                
                                                ?>

                                             <?php }else if(isset($_GET['ver_terapia'])) {  ?>

                                                <h6 class="p-3"><b>Actividad:</b></h6>
                                                <?php
                              
                                                $item = 'id';
                      
                                                $valor = $_GET['ver_terapia'];
                      

                                                
                                                $resultado = ControladorOrtopticaAdultos::ctrMostrarTerapiaIndividual($item, $valor);

                                                $sesion = json_decode($resultado['sesion'], true);

                      
                                                ?>
                                                  <div class="card component-card_7" style="width:100%; background: rgb(0 150 136 / 11%);">
                                                    <div class="table-responsive-md">
                                                  
                                                       <table id="zero-config" class="table dt-table-hover" style="width:100%">
                                                          <thead>
                                                             <tr>
                                                                <th>Actividad</th>
                                                                <th>Resultado</th>

                                                                </tr>
                                                             </thead>
                                                             <tbody>

                                                             <?php if ($sesion != "") { ?>
                                             <?php
                                             // echo '<pre>';
                                             // var_dump($sesion);
                                             // echo  '</pre>';
                                             ?>
                                             <tr>
                                                <td><textarea id="textarea" class="form-control textarea" maxlength="800" rows="4"  readonly style="color:green;" name="actividad_1"><?php echo $sesion['actividad_1']; ?></textarea></td>
                                                <td><textarea id="textarea" class="form-control textarea" maxlength="800" rows="4"  readonly style="color:green;" name="resultado_1"><?php echo $sesion['resultado_1']; ?></textarea></td>
                                             </tr>
                                             <tr>
                                                <td><textarea id="textarea" class="form-control textarea" maxlength="800" rows="4"   readonly style="color:green;" name="actividad_2"><?php echo $sesion['actividad_2']; ?></textarea></td>
                                                <td><textarea id="textarea" class="form-control textarea" maxlength="800" rows="4" readonly style="color:green;"  name="resultado_2"><?php echo $sesion['resultado_2']; ?></textarea></td>
                                             </tr>
                                             <tr>
                                                <td><textarea id="textarea" class="form-control textarea" maxlength="800" rows="4"  readonly style="color:green;" name="actividad_3"><?php echo $sesion['actividad_3']; ?></textarea></td>
                                                <td><textarea id="textarea" class="form-control textarea" maxlength="800" rows="4"  readonly style="color:green;" name="resultado_3"><?php echo $sesion['resultado_3']; ?></textarea></td>
                                             </tr>
                                             <tr>
                                                <td><textarea id="textarea" class="form-control textarea" maxlength="800" rows="4"  readonly style="color:green;" name="actividad_4"><?php echo $sesion['actividad_4']; ?></textarea></td>
                                                <td><textarea id="textarea" class="form-control textarea" maxlength="800" rows="4"  readonly style="color:green;" name="resultado_4"><?php echo $sesion['resultado_4']; ?></textarea></td>
                                             </tr>

                                          <?php } else { ?>
                                             <?php
                                             // echo '<pre>';
                                             // var_dump($sesion);
                                             // echo  '</pre>';
                                             ?>

                                             <tr>
                                                <td><textarea id="textarea" class="form-control textarea" maxlength="800" rows="4"  readonly style="color:green;"  name="actividad_1"></textarea></td>
                                                <td><textarea id="textarea" class="form-control textarea" maxlength="800" rows="4"   readonly style="color:green;" name="resultado_1"></textarea></td>
                                             </tr>
                                             <tr>
                                                <td><textarea id="textarea" class="form-control textarea" maxlength="800" rows="4"  readonly style="color:green;" name="actividad_2"></textarea></td>
                                                <td><textarea id="textarea" class="form-control textarea" maxlength="800" rows="4"  readonly style="color:green;" name="resultado_2"></textarea></td>
                                             </tr>
                                             <tr>
                                                <td><textarea id="textarea" class="form-control textarea" maxlength="800" rows="4"  readonly style="color:green;" name="actividad_3"></textarea></td>
                                                <td><textarea id="textarea" class="form-control textarea" maxlength="800" rows="4"  readonly style="color:green;" name="resultado_3"></textarea></td>
                                             </tr>
                                             <tr>
                                                <td><textarea id="textarea" class="form-control textarea" maxlength="800" rows="4"  readonly style="color:green;" name="actividad_4"></textarea></td>
                                                <td><textarea id="textarea" class="form-control textarea" maxlength="800" rows="4"   readonly style="color:green;"  name="resultado_4"></textarea></td>
                                             </tr>


                                          <?php } ?>

                                                            <tbody>

                                                           </table>


                              </div>
                          </div>
                                       
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


<script src="vistas/js/bajaVision.js"></script>
<script src="vistas/plugins/bootstrap-maxlength/bootstrap-maxlength.js"></script>


<script>
    $('textarea.textarea').maxlength({
    alwaysShow: true,
    });
</script>