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
           
                  <div class="row">
                                    <div id="flFormsGrid" class="col-lg-12 layout-spacing">
                                        <div class="statbox widget box box-shadow">
                                            <div class="widget-header">
                                            <form  role="form" method="post">
                                                <div class="row">
                                          
                                                    <div class="col-md-4">
                                                        <img src="vistas/img/centevi-logo-in.png" class="navbar-logo" alt="logo" style="height: 80px;">
                                                    </div>   
                                                    
                                             
                                                    <div class="col-md-4">
                                                        <h4>Fecha de solicitud</h4>
                                                        <?php 
                                                            
                                                            date_default_timezone_set('America/Lima');

                                                            $fecha = date('Y-m-d');
                                                        
                                                          
                                                          echo '<p class="ml-5"><b>'.$fecha.'</b></p>'; 
                                                          
                                                         
                                                         ?>
                                                    </div>  
                                            
                                                    <div class="col-md-2">
                                                    <h4>Nro. Orden</h4>
                                                      <input style="color: red; font-weight: bold;" type="text" class="form-control" placeholder=""  name="nro_receta">
                                                    </div>                                                                       
                                                </div>
                                            </div>
                                            <div class="widget-content widget-content-area">
                                           
                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label for="inputEmail4">Paciente</label>
                                                         
                                                             
                                                            <?php

                                                   
                                                             
                                                                 $item = null;
                                                                 $valor = null;
                                                                 echo   '<select class="form-control form-small" name="paciente">
                                                                               <option value=""><--- Seleccione el paciente ---></option>';
                                                                 
                                                                 
                                                                 $pacientes = ControladorPacientes::ctrMostrarPacientes($item, $valor);
                                                                 
                                                                 foreach ($pacientes as $key => $value) {
                                                                 
                                                                     echo '<option value="' . $value["id_paciente"] . '"> Número Cedula: ' . $value['nro_cedula'] . ' || Nombres: ' . $value["nombres"] . ' ' . $value['apellidos'] . '</option>';
                                                                 }
                                                                                                                              
                                                             
                                                             
                                                             
                                                             
                                                             ?>




                                                         </select>
                                                         
                                                     
                                                        </div>

                                                        
                                                        <div class="form-group col-md-4">
                                                            <label for="inputEmail4">Sucursal</label>
                                                                            
                                                            <?php

                                                   
                                                             
                                                                 $item = null;
                                                                 $valor = null;
                                                                 echo   '<select class="form-control form-small" name="direccion">
                                                                               <option value=""><--- Seleccione la sucursal ---></option>';
                                                                 
                                                                 
                                                                 $sucursal = ControladorSucursales::ctrMostrarSurcursales($item, $valor);
                                                                 
                                                                 foreach ($sucursal as $key => $value) {
                                                                 
                                                                     echo '<option value="' . $value["nombre"] . '">'.$value['nombre'].'</option>';
                                                                 }
                                                                                                                              
                                                             
                                                             
                                                             
                                                             
                                                             ?>




                                                         </select>

                                                        </div> 
                                                        <div class="form-group col-md-2">
                                                            <label for="inputEmail4">Cedula</label>
                                                            <input type="text" class="form-control" placeholder=""  name="cedula">

                                                        </div>  
                                                        <div class="form-group col-md-2">
                                                            <label for="inputEmail4">Telefono</label>
                                                            <input type="text" class="form-control" placeholder=""  name="telefono">

                                                        </div>    
                                                       
                                                    </div>
                                                  
                                  

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
                                                                          <input type="text" class="form-control" placeholder=""  name="esfera_od">
                                                                          </td>
                                                                          <td>
                                                                          <input type="text" class="form-control" placeholder=""   name="cilindro_od">
                                                                          </td>
                                                                           <td>
                                                                          <input type="text" class="form-control" placeholder=""   name="eje_od">
                                                                          </td>
                                                                          <td>                                                    
                                                                           <input type="text" class="form-control" placeholder=""    name="add_od">   
                                                                          </td>
                                                                           <td>
                                                                           <input type="text" class="form-control"  value="△"  name="prisma_od">
                                                                           </td>
                                                                           <td>
                                                                           <input type="text" class="form-control" placeholder=""    name="distancia_od">
                                                                           </td>
                                                                           <td>
                                                                           <input type="text" class="form-control" placeholder=""   name="altura_od">
                                                                           </td>
                                                                      </tr>
                                                                      <tr>
                                                                          <td class="text-center">OI</td>
                                                                          <td>
                                                                          <input type="text" class="form-control" placeholder="" name="esfera_oi">
                                                                          </td>
                                                                          <td>
                                                                          <input type="text" class="form-control" placeholder="" name="cilindro_oi" >
                                                                          </td>
                                                                           <td>
                                                                          <input type="text" class="form-control" placeholder=""   name="eje_oi">
                                                                          </td>
                                                                          <td>                                                    
                                                                          <input type="text" class="form-control" placeholder="" name="add_oi"> 
                                                                          </td>
                                                                          <td>
                                                                          <input type="text" class="form-control" value="△" name="prisma_oi">
                                                                          </td>
                                                                          <td>
                                                                          <input type="text" class="form-control" placeholder="" name="distancia_oi">
                                                                          </td>
                                                                          <td>
                                                                          <input type="text" class="form-control" placeholder="" name="altura_oi">
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
                                                                  <input type="radio" class="new-control-input" name="tipo_lente_r" value="monofocal">
                                                                  <span class="new-control-indicator"></span>Monofocal
                                                                </label>
                                                              </div>
                                                           </div>
                                                           <div class="col-md-2 p-2">
                                                             <div class="n-chk">
                                                                <label class="new-control new-radio radio-classic-primary">
                                                                  <input type="radio" class="new-control-input" value="bifocal" name="tipo_lente_r">
                                                                  <span class="new-control-indicator"></span>Bifocal
                                                                </label>
                                                              </div>
                                                           </div>
                                                           <div class="col-md-2 p-2">
                                                             <div class="n-chk">
                                                                <label class="new-control new-radio radio-classic-primary">
                                                                  <input type="radio" class="new-control-input"  value="interview" name="tipo_lente_r">
                                                                  <span class="new-control-indicator"></span>Interview
                                                                </label>
                                                              </div>
                                                           </div>
                                                           <div class="col-md-2 p-2">
                                                             <div class="n-chk">
                                                                <label class="new-control new-radio radio-classic-primary">
                                                                  <input type="radio" class="new-control-input" value="antifatigue" name="tipo_lente_r">
                                                                  <span class="new-control-indicator"></span>Antifatigue
                                                                </label>
                                                              </div>
                                                           </div>
                                                           <div class="col-md-2 p-2">
                                                             <div class="n-chk">
                                                                <label class="new-control new-radio radio-classic-primary">
                                                                  <input type="radio" class="new-control-input"  value="progresivo" name="tipo_lente_r" >
                                                                  <span class="new-control-indicator"></span>Progresivo
                                                                </label>
                                                              </div>
                                                           </div>
                                                 </div>
                                                 </div>

                                           
                                                 
                                               
                                             <div style="margin-top:10px; border: 2px solid blue; border-radius:25px; padding: 10px 50px;">
                                                <div class="row p-1">
                                                           <div class="col-md-2">
                                                                <h6 class="text-center p-2">TRATAMIENTOS Y FILTROS:</h6>
                                                           </div>
                                                          <div class="col-md-2">
                                                             <div class="n-chk">
                                                                <label class="new-control new-radio radio-classic-primary">
                                                                  <input type="radio" class="new-control-input" value="transitions" name="transitions">
                                                                  <span class="new-control-indicator"></span>Transitions
                                                                </label>
                                                              </div>
                                                           </div>
                                                           <div class="col-md-2">
                                                           <div class="n-chk">
                                                                <label class="new-control new-radio radio-classic-primary">
                                                                  <input type="checkbox" class="new-control-input" value="filtro_a" name="filtro_a">
                                                                  <span class="new-control-indicator"></span>Filtro de luz azul
                                                                </label>
                                                              </div>
                                                          </div> 
                                                           <div class="col-md-2">
                                                            <label for="inputEmail4">Gris</label>
                                                            <input type="text" class="form-control" placeholder="" name="gris_t">
                                                          </div> 
                                                          <div class="col-md-2">
                                                            <label for="inputEmail4">Cafe</label>
                                                            <input type="text" class="form-control" placeholder="" name="cafe_t" >
                                                          </div> 
                                                 </div>

                                                <div class="row p-2">
                                                           <div class="col-md-2">
                                                                <h6 class="text-center p-2"></h6>
                                                           </div>
                                                          <div class="col-md-2">
                                                            <div class="n-chk">
                                                               <label class="new-control new-checkbox checkbox-outline-success">
                                                                 <input type="checkbox" class="new-control-input"  value="fotocromatico" name="fotocromatico">
                                                                 <span class="new-control-indicator"></span>Fotocromático
                                                               </label>
                                                              </div>
                                                           </div>
                                                           <div class="col-md-2">
                                                             <div class="n-chk">
                                                                <label class="new-control new-checkbox checkbox-outline-success">
                                                                  <input type="checkbox" class="new-control-input"  value="antireflejo" name="antireflejo"> 
                                                                  <span class="new-control-indicator"></span>Antireflejo
                                                                </label>
                                                              </div>
                                                           </div>
                                                           <div class="col-md-2">
                                                             <div class="n-chk">
                                                                <label class="new-control new-checkbox checkbox-outline-success">
                                                                  <input type="checkbox" class="new-control-input"  value="espejado" name="espejado">
                                                                  <span class="new-control-indicator"></span>Espejado
                                                                </label>
                                                              </div>
                                                           </div>
                                                           <div class="col-md-2">
                                                             <div class="n-chk">
                                                                 <label class="new-control new-checkbox checkbox-outline-success">
                                                                  <input type="checkbox" class="new-control-input"  value="uv" name="uv">
                                                                  <span class="new-control-indicator"></span>UV
                                                                </label>
                                                              </div>
                                                           </div>
                                                         
                                                </div>


                                                <div class="row p-2">
                                                          <div class="col-md-2">
                                                             <div class="n-chk">
                                                                <label class="new-control new-radio radio-classic-primary">
                                                                  <input type="checkbox" class="new-control-input"  value="tinte" name="tinte">
                                                                  <span class="new-control-indicator"></span>Tinte
                                                                </label>
                                                              </div>
                                                           </div>
                                                          <div class="col-md-2">
                                                             <div class="n-chk">
                                                                <label class="new-control new-radio radio-classic-primary">
                                                                  <input type="checkbox" class="new-control-input"  value="degradante" name="degradante">
                                                                  <span class="new-control-indicator"></span>Degradante
                                                                </label>
                                                              </div>
                                                           </div>
                                                           <div class="col-md-2">
                                                             <div class="n-chk">
                                                                <label class="new-control new-radio radio-classic-primary">
                                                                  <input type="checkbox" class="new-control-input"  value="uniforme" name="uniforme">  
                                                                  <span class="new-control-indicator"></span>Uniforme
                                                                </label>
                                                              </div>
                                                           </div>
                                                           <div class="col-md-2">
                                                            <label for="inputEmail4">Color</label>
                                                            <input type="text" class="form-control" placeholder="" name="color_t">
                                                          </div> 
                                                          <div class="col-md-2">
                                                            <label for="inputEmail4">Intensidad</label>
                                                            <input type="text" class="form-control" placeholder="" name="intensidad_t">
                                                          </div> 
                                                 </div>
                                              </div>
                                        <div  class="p-2" style="margin-top:10px; border: 2px solid blue; border-radius:25px;">
                                                 <div class="row">
                                                           <div class="col-md-2">
                                                                <h6 class="text-center p-2">MATERIAL:</h6>
                                                           </div>
                                                          <div class="col-md-2">
                                                             <div class="n-chk">
                                                                <label class="new-control new-radio radio-classic-primary">
                                                                  <input type="radio" class="new-control-input"  value="cr_39" name="material_1">
                                                                  <span class="new-control-indicator"></span>CR-39
                                                                </label>
                                                              </div>
                                                           </div>
                                                           <div class="col-md-2">
                                                             <div class="n-chk">
                                                                <label class="new-control new-radio radio-classic-primary">
                                                                  <input type="radio" class="new-control-input" value="policarbonato" name="material_1">
                                                                  <span class="new-control-indicator"></span>Policarbonato
                                                                </label>
                                                              </div>
                                                           </div>
                                                           <!--<div class="col-md-2">
                                                            <label for="inputEmail4">Gris</label>
                                                            <input type="text" class="form-control" placeholder="" name="gris_m">
                                                          </div> 
                                                          <div class="col-md-2">
                                                            <label for="inputEmail4">Cafe</label>
                                                            <input type="text" class="form-control" placeholder="" name="cafe_m">
                                                          </div> -->
                                                 </div>

                                                <div class="row p-2">
                                                           <div class="col-md-2">
                                                                <h6 class="text-center p-2"></h6>
                                                           </div>
                                                          <div class="col-md-2">
                                                             <div class="n-chk">
                                                                <label class="new-control new-radio radio-classic-primary">
                                                                  <input type="radio" class="new-control-input" value="drivewear" name="material_1">
                                                                  <span class="new-control-indicator"></span>DRIVEWEAR
                                                                </label>
                                                              </div>
                                                           </div>
                                                           <div class="col-md-2">
                                                             <div class="n-chk">
                                                                <label class="new-control new-radio radio-classic-primary">
                                                                  <input type="radio" class="new-control-input" value="polarizado" name="material_1">
                                                                  <span class="new-control-indicator"></span>POLARIZADO
                                                                </label>
                                                              </div>
                                                           </div>
                                                           <div class="col-md-2">
                                                             <div class="n-chk">
                                                                <label class="new-control new-radio radio-classic-primary">
                                                                  <input type="radio" class="new-control-input"  value="thin_lite" name="material_2">
                                                                  <span class="new-control-indicator"></span>THIN & LITE
                                                                </label>
                                                              </div>
                                                           </div>
                                                           <div class="col-md-2">
                                                             <div class="n-chk">
                                                                <label class="new-control new-radio radio-classic-primary">
                                                                  <input type="radio" class="new-control-input" value="policolor" name="material_2" >
                                                                  <span class="new-control-indicator"></span> POLICOLOR
                                                                </label>
                                                              </div>
                                                           </div>
                                                           <div class="col-md-2">
                                                             <div class="n-chk">
                                                                <label class="new-control new-radio radio-classic-primary">
                                                                  <input type="radio" class="new-control-input" value="super_thin" name="material_2" >
                                                                  <span class="new-control-indicator"></span> SUPER THIN & LITE
                                                                </label>
                                                              </div>
                                                           </div>
                                                  </div>
                                                </div>

                                             
                                         <div style="margin-top:10px; border: 2px solid blue; border-radius:25px; padding: 10px 50px;">
                                                 <div class="row ">
                                                 <div class="n-chk">
                                                             <label class="new-control new-radio radio-classic-primary">
                                                              <input type="checkbox" class="new-control-input" name="propio" value="aro_centevi" > 
                                                              <span class="new-control-indicator"></span><strong>Aro Centevi</strong>
                                                            </label>
                                                       
                                                             <label class="new-control new-radio radio-classic-primary">
                                                              <input type="checkbox" class="new-control-input" name="propio" value="aro_propio" > 
                                                              <span class="new-control-indicator"></span><strong>Aro Propio</strong>
                                                            </label>    
                                                          </div>
                                                     <div class="col-md-3" id="div1" style="max-width: fit-content">
                                                       
                                                        <div >
                                                        <div class="n-chk">
                                                            <label class="new-control new-radio radio-classic-primary">
                                                              <input type="radio" class="new-control-input" name="aro_centevi" value="metal_c"> 
                                                              <span class="new-control-indicator"></span>Metal Completo
                                                            </label>
                                                       
                                                            <label class="new-control new-radio radio-classic-primary">
                                                              <input type="radio" class="new-control-input" name="aro_centevi" value="metal_semi">
                                                              <span class="new-control-indicator"></span>Metal Semi - Aire
                                                            </label>
                                                       
                                                            <label class="new-control new-radio radio-classic-primary">
                                                              <input type="radio" class="new-control-input" name="aro_centevi" value="aire">
                                                              <span class="new-control-indicator"></span>Al Aire
                                                            </label>
                                                        </div>
                                                        </div>
                                                      </div>
                                                      <div class="col-md-4" id="div2" style="max-width: fit-content">
                                                          
                                                          <div >
                                                          <div class="n-chk">
                                                            <label class="new-control new-checkbox checkbox-outline-info">
                                                              <input type="checkbox" class="new-control-input" name="propio" value="pasta_c">
                                                              <span class="new-control-indicator"></span>Pasta Completo
                                                            </label>
                                                           </div>
                                                           <div class="n-chk">
                                                            <label class="new-control new-checkbox checkbox-outline-primary">
                                                              <input type="checkbox" class="new-control-input" name="propio" value="pasta_semi">
                                                              <span class="new-control-indicator"></span>Pasta Semi - Aire
                                                            </label>
                                                           </div>
                                                           <div class="n-chk">
                                                            <label class="new-control new-checkbox checkbox-outline-success">
                                                              <input type="checkbox" class="new-control-input" name="propio" value="seguridad">
                                                              <span class="new-control-indicator"></span>Seguridad
                                                            </label>
                                                            </div>
                                                        </div>

                                                        <!--<script>
    
  $(document).ready(function() {
    $("#individual").click(function() {
      $("#div1").show();
      $("#div2").hide();

    });

    $("#multiples").click(function() {
      $("#div1").hide();
      $("#div2").show();

    });
  });
</script>
</script>

</script>-->
                                                    

                                                      </div>
                                                       <div class="col-md-2">
                                                          <label for="inputEmail4">Codigo</label>
                                                          <input type="text" class="form-control" placeholder="" name="codigo_aro">
                                                       </div>
                                                       <div class="col-md-2">
                                                          <label for="inputEmail4">Color</label>
                                                          <input type="text" class="form-control" placeholder="" name="color_aro">
                                                       </div>
                                                        <div class="col-md-6 mt-3">
                                                    <label for="inputEmail4">Marca</label>
                                                          <input type="text" class="form-control" placeholder="" name="marca">
                                                    </div>
                                                  </div>
                                                </div>

                                                
                           

                                                <div style="margin-top:10px; border: 2px solid blue; border-radius:25px; padding: 10px 50px;">
                                                    <div class="row mt-2">
                                                    <div class="col-md-2">
                                                                <h6 class="text-center p-2">MEDIDA DE LENTE:</h6>
                                                           </div>
                                                    <div class="col-md-2">
                                                       <label for="inputEmail4">Altura (Vertical)</label>
                                                          <input type="text" class="form-control" placeholder="" name="alto_l">
                                                    </div>
                                                       <div class="col-md-2">
                                                          <label for="inputEmail4">Horizontal</label>
                                                          <input type="text" class="form-control" placeholder="" name="ancho_b_l">
                                                       </div>
                                                       <div class="col-md-2">
                                                          <label for="inputEmail4">Diagonal Total</label>
                                                          <input type="text" class="form-control" placeholder="" name="diagonal_l">
                                                       </div>

                                                       <div class="col-md-2">
                                                          <label for="inputEmail4">Puente</label>
                                                          <input type="text" class="form-control" placeholder="" name="separacion_l" >
                                                       </div>
                                                       
                                                    
                                                    </div>

                                                    </div>  

                                                <div style="margin-top:10px; border: 2px solid blue; border-radius:25px; padding: 10px 50px;">

                                                  <div class="row">
                                                   
                                                    <div class="col-md-6">
                                                          <label for="inputEmail4">Doctor</label>
                                                          <input type="text" class="form-control" placeholder="" name="doctor">
                                                       </div>
                                                       <div class="col-md-6">
                                                          <label for="inputEmail4">Elaborado por</label>
                                                          <input type="text" class="form-control" placeholder="" name="elaborado">
                                                       </div>

                                                       <div class="col-md-12">
                                                          <label for="inputEmail4"> Observación</label>
                                                          <textarea id="textarea" class="form-control textarea" maxlength="800" rows="6" placeholder="Esta área tiene un limite de 800 caracteres." name="observacion"></textarea>
                                                       </div>
                                                    </div>
                                                </div>  

                                                    <input type="hidden" name="crear_receta">
                                                     <input type="hidden"  name="sucursal" value="<?php echo $_SESSION['sucursal']; ?>">
                                                     <input type="hidden"  name="doctor" value="<?php echo $_SESSION['nombre']; ?>">
                                                     <button type="submit" class="btn btn-success mt-3">Crear Receta</button>
                                                </form>

                                                <?php

                                                 $crearReceta = new ControladorRecetas();
                                                 $crearReceta -> ctrCrearReceta();                                                                                      

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