<link href="vistas/assets/css/tables/table-basic.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="vistas/plugins/select2/select2.min.css">
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
                                            <h3 class="text-center">Optometria neonatos</h3>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form role="form" method="post">
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-12">
                                                <label for="inputEmail4">Pacientes</label>
                                                <?php

                                                if (isset($_GET['id_paciente'])) {

                                                    $item = 'id_paciente';
                                                    $valor = $_GET['id_paciente'];

                                                    $paciente = ControladorPacientes::ctrMostrarPacientes($item, $valor);

                                                    echo   '<select class="form-control form-small" name="paciente"  value="' . $paciente['id_paciente'] . '" readonly>
                                                   
                                                            <option value="' . $paciente['id_paciente'] . '" readonly>Número Cedula:  ' . $paciente['nro_cedula'] . '  || Nombres: ' . $paciente['nombres'] . ' ' . $paciente['apellidos'] . '</option>
                                                   ';
                                                } else {

                                                    $item = null;
                                                    $valor = null;
                                                    echo   '<select class="form-control form-small" name="paciente">
                                                    <option value=""><--- Seleccione el paciente ---></option>';


                                                    $pacientes = ControladorPacientes::ctrMostrarPacientes($item, $valor);

                                                   foreach ($pacientes as $key => $value) {
    echo '<option value="' . $value["id_paciente"] . '" data-fecha-nacimiento="' . $value['fecha_nacimiento'] . '"> Número Cedula: ' . $value['nro_cedula'] . ' || Nombres: ' . $value["nombres"] . ' ' . $value['apellidos'] . '</option>';
}
                                                }





                                                ?>

                                                </select>
                                            </div>
                                            
                                             

                                        </div>
                                        <div class="form-row mb-12">
                                           <div class="form-group col-md-6">
                                            <label for="inputSucursal">Sucursal</label>
                         
                                            <?php
                                             
                                         echo '<select required class="form-control" id="sucursal" name="sucursal">
                                                    <option value="">Seleccionar sucursal</option>';
                                            
                                            $sucursales = ControladorSucursales::ctrMostrarSurcursales(null, null);
                                            
                                            foreach ($sucursales as $key => $value) {
                                                echo '<option value="' . $value["id_sucursal"] . '">' . $value['nombre'] . '</option>';
                                            }
                                            
                                            echo '</select>';

                                              ?>
                                       
                                        </div>
                                         <div class="form-group col-md-3">
                                                <label for="edad">Edad</label>
                                                <input type="text" class="form-control" id="edad" name="edad" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="inputAddress">Fecha de atencion</label>
                                                <input type="date" required class="form-control" id="inputAddress" name="fecha_atencion" max="<?php echo date('Y-m-d'); ?>">
                                            </div>
                                        </div>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-12">
                                                <label for="inputAddress">Motivo de consulta:</label>
                                                <textarea id="textarea" class="form-control textarea" maxlength="10000" rows="15" placeholder="" name="m_c"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-4">
                                                <label for="lugarNacimiento">Antecedentes Oculares</label>
                                                <input type="text" class="form-control" id="lugarNacimiento" placeholder="" name="a_o">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputAddress2">Antecedentes Personales</label>
                                                <input type="text" class="form-control" id="inputAddress2" placeholder="" name="a_p">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputAddress2">Antecedentes Familiares</label>
                                                <input type="text" class="form-control" id="inputAddress2" placeholder="" name="a_f">
                                            </div>
                                        </div>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-12">
                                                <label for="medicamentos">Medicamentos</label>
                                                <input type="text" class="form-control" id="medicamentos" placeholder="" name="medicamentos">
                                            </div>
                                        </div>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-12">
                                                <label for="tratamientos">Tratamientos anteriores</label>
                                                <input type="text" class="form-control" id="tratamientos" placeholder="" name="tratamientos">
                                            </div>
                                        </div>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-12">
                                                <label for="tratamientos">Desarrollo del infante</label>
                                                <input type="text" class="form-control" id="tratamientos" placeholder="" name="desarrollo_infante">
                                            </div>
                                        </div>

                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-3">
                                                <label for="tratamientos">Nacimiento</label>
                                                <input type="text" class="form-control" id="tratamientos" placeholder="" name="nacimiento">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="tratamientos">Parto</label>
                                                <input type="text" class="form-control" id="tratamientos" placeholder="" name="parto">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="tratamientos">Gateo</label>
                                                <input type="text" class="form-control" id="tratamientos" placeholder="" name="gateo">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="tratamientos">Lenguaje</label>
                                                <input type="text" class="form-control" id="tratamientos" placeholder="" name="lenguaje">
                                            </div>
                                        </div>

                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-4">
                                                <label for="tratamientos">Complicaciones Prenatales</label>
                                                <input type="text" class="form-control" id="tratamientos" placeholder="" name="complicaciones">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="tratamientos">Perinatales</label>
                                                <input type="text" class="form-control" id="tratamientos" placeholder="" name="perinatales">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="tratamientos">Postnatales</label>
                                                <input type="text" class="form-control" id="tratamientos" placeholder="" name="postnatales">
                                            </div>
                                        </div>


                                        <h6>AGUDEZA VISUAL:</h6>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-3">
                                                <label for="tambor">Tambor Optocinético AO </label>
                                                <input type="text" class="form-control" id="tambor" placeholder="" name="tambor">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="fija">Fija</label>
                                                <input type="text" class="form-control" id="fija" placeholder="" name="fija">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="sigue">Sigue</label>
                                                <input type="text" class="form-control" id="sigue" placeholder="" name="sigue">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="mantiene">Mantiene</label>
                                                <input type="text" class="form-control" id="mantiene" placeholder="" name="mantiene">
                                            </div>
                                        </div>


                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-4">
                                                <label for="test">Test mirada preferencial OD </label>
                                                <input type="text" class="form-control" id="test" placeholder="" name="test">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="oi">OI</label>
                                                <input type="text" class="form-control" id="oi" placeholder="" name="a_oi">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="ao">AO</label>
                                                <input type="text" class="form-control" id="ao" placeholder="" name="a_ao">
                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <h5>RECETA EN USO</h5>
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">RX </th>
                                                            <th>ESFERA</th>
                                                            <th>CILINDRO</th>
                                                            <th>EJE</th>
                                                            <th>P/BASE △</th>
                                                            <th>ADD</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-center">Ojo Derecho</td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="" name="esfera_od">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="" name="cilindro_od">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="" name="eje_od">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="△" name="p_base_od">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="" name="add_od">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">Ojo Izquierdo</td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="" name="esfera_oi">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="" name="cilindro_oi">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="" name="eje_oi">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="△" name="p_base_oi">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="" name="add_oi">
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-3">
                                                <label for="objetivos">Tipo de lentes</label>
                                                <input type="text" class="form-control" name="len_tipo_lentes">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="objetivos">Filtros</label>
                                                <input type="text" class="form-control" name="len_filtros">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="objetivos">Tiempo</label>
                                                <input type="text" class="form-control" name="len_tiempo">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="objetivos">Tipo de Aro</label>
                                                <input type="text" class="form-control" name="len_tipo_aro">
                                            </div>
                                        </div>

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
                                                <input type="text" class="form-control" placeholder="" name="sa_od">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control" placeholder="" name="pp_od">
                                            </div>
                                        </div>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control" placeholder="" name="sa_oi">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control" placeholder="" name="pp_oi">
                                            </div>
                                        </div>
                                </div>






                                <div class="form-row mb-4">
                                    <div class="form-group col-md-6">
                                        <label for="tratamientos">Hirschberg</label>
                                        <input type="text" class="form-control" id="D" placeholder="" name="hirschberg">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tratamientos">Krismsky</label>
                                        <input type="text" class="form-control" id="I" placeholder="" name="krismsky">
                                    </div>
                                </div>

                                <div class="form-row mb-4">
                                    <div class="form-group col-md-12">
                                        <label for="inputAddress">VERSIONES:</label>
                                        <textarea id="textarea" class="form-control textarea" maxlength="10000" rows="15" placeholder="" name="plan_versiones"></textarea>
                                    </div>
                                </div>

                                <div class="form-row mb-4">
                                    <div class="form-group col-md-3">
                                        <label for="tratamientos">CT: VP:</label>
                                        <input type="text" class="form-control" id="D" placeholder="" name="ct_vp">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="tratamientos">Reflejo Cocleopalpebral</label>
                                        <input type="text" class="form-control" id="I" placeholder="" name="ct_reflejo">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="tratamientos">Ducciones:OD</label>
                                        <input type="text" class="form-control" id="I" placeholder="" name="ducciones_od">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="tratamientos">OI</label>
                                        <input type="text" class="form-control" id="I" placeholder="" name="ducciones_oi">
                                    </div>
                                </div>

                                <div class="form-row mb-4">
                                    <div class="form-group col-md-8">
                                        <label for="tratamientos">Posición Compensatoria</label>
                                        <input type="text" class="form-control" id="I" placeholder="" name="posicion_compensatoria">
                                    </div>
                                </div>


                                <div class="form-row mb-4">
                                    <div class="form-group col-md-3">
                                        <label for="tratamientos">Reflejos Pupilares: Fotomotor/OD </label>
                                        <input type="text" class="form-control" id="D" placeholder="" name="fotomotor_od">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="tratamientos">Consensual</label>
                                        <input type="text" class="form-control" id="I" placeholder="" name="consensual">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="tratamientos">Fotomotor:OI</label>
                                        <input type="text" class="form-control" id="I" placeholder="" name="fotomotor_oi">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="tratamientos">Consensual</label>
                                        <input type="text" class="form-control" id="I" placeholder="" name="fotomotor_consensual">
                                    </div>
                                </div>





                               

                                <div class="form-row mb-4">
                                    <div class="form-group col-md-6">
                                        <label for="inputAddress">Reflejo retinoscopico OD:</label>
                                        <input type="text" class="form-control" id="inputAddress" placeholder="" name="reflejo_r_od">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputAddress">OI:</label>
                                        <input type="text" class="form-control" id="inputAddress" placeholder="" name="reflejo_r_oi">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputAddress">AO:</label>
                                        <input type="text" class="form-control" id="inputAddress" placeholder="" name="reflejo_r_ao">
                                    </div>
                                </div>
                                <!-- 
                                <h6>Dibujo de la posición de los ojos en PPM: </h6> -->
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
                                                            <th>P/BASE △</th>
                                                            <th>ADD</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-center">Ojo Derecho</td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="" name="esfera_od_f">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="" name="cilindro_od_f">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="" name="eje_od_f">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="△" name="p_base_od_f">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="" name="add_od_f">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">Ojo Izquierdo</td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="" name="esfera_oi_f">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="" name="cilindro_oi_f">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="" name="eje_oi_f">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="△" name="p_base_oi_f">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="" name="add_oi_f">
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                         <div class="form-row mb-4">
                                    <div class="form-group col-md-6">
                                        <label for="inputAddress">Tipo Lentes</label>
                                        <input type="text" class="form-control" id="inputAddress" placeholder="" name="refraccion_tipo_lentes">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputAddress">PD:</label>
                                        <input type="text" class="form-control" id="inputAddress" placeholder="" name="refraccion_pd">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputAddress">USO:</label>
                                        <input type="text" class="form-control" id="inputAddress" placeholder="" name="refraccion_uso">
                                    </div>
                                </div>



                                <div class="form-row mb-4">
                                    <div class="form-group col-md-12">
                                        <label for="inputAddress">CONDUCTA A SEGUIR:</label>
                                        <textarea id="textarea" class="form-control textarea" maxlength="10000" rows="15" placeholder="" name="conducta_seguir"></textarea>
                                    </div>
                                </div>





                                <input type="hidden" name="crear_optometria_neonatos" value="crear">
                             
                                <input type="hidden" name="doctor" value="<?php echo $_SESSION['nombre']; ?>">
                                <?php if (isset($_GET['id_terapia'])) {  ?>
                                    <input type="hidden" name="id_terapia" value="<?php echo $_GET['id_terapia']; ?>">
                                <?php  } else { ?>
                                    <input type="hidden" name="id_terapia" value="0">
                                <?php } ?>
                                <button type="submit" class="btn btn-success mt-3">Guardar Consulta</button>
                                </form>

                                <?php

                                $crearConsulta = new  ControladorOptometriaNeonatos();
                                $crearConsulta->ctrCrearConsultaOptometriaNeonatos();

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
    $(document).ready(function() {
        $('select[name="paciente"]').on('change', function() {
            var selectedOption = $(this).find(':selected');
            var fechaNacimiento = selectedOption.data('fecha-nacimiento');
            var edad = calcularEdad(fechaNacimiento);
            $('#edad').val(edad);
        });

        function calcularEdad(fechaNacimiento) {
            var fechaNac = new Date(fechaNacimiento);
            var fechaActual = new Date();
            var edad = fechaActual.getFullYear() - fechaNac.getFullYear();
            var mes = fechaActual.getMonth() - fechaNac.getMonth();
            if (mes < 0 || (mes === 0 && fechaActual.getDate() < fechaNac.getDate())) {
                edad--;
            }
            return edad;
        }
    });
</script>

<script>
    $('textarea.textarea').maxlength({
        alwaysShow: true,
    });
</script>