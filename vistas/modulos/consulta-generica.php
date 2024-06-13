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
                                            <h4>Historia Clinica</h4>
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
                                                <label for="textarea">Motivo de Consulta:</label>
                                                <textarea id="textarea" class="form-control textarea" maxlength="10000" rows="25" placeholder="" name="m_c"></textarea>
                                            </div>
                                        </div>
                                        
                                
                                </div>

                            
                             </div>

                                
                               


         



                                <input type="hidden" name="crear_consulta_generica" value="crear">
                     
                                <input type="hidden" name="doctor" value="<?php echo $_SESSION['nombre']; ?>">
                                <?php if (isset($_GET['id_terapia'])) {  ?>
                                    <input type="hidden" name="id_terapia" value="<?php echo $_GET['id_terapia']; ?>">
                                <?php  } else { ?>
                                    <input type="hidden" name="id_terapia" value="0">
                                <?php } ?>
                                <button type="submit" class="btn btn-success mt-3">Crear</button>
                                </form>
                                <?php

                                $crearConsulta = new  ControladorConsultaGenerica();
                                $crearConsulta->ctrCrearConsultaGenerica();

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