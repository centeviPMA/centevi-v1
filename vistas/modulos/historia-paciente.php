<style>
    @media (min-width: 700px) {
        .btn_eliminar_terapia {
            margin-left: 420px;
        }


    }


    @media (max-width: 500px) {
        .btn_eliminar_terapia {
            margin-left: 120px;
            margin-top: -20px;
        }


    }
</style>

<link href="vistas/assets/css/components/cards/card.css" rel="stylesheet" type="text/css" />
<link href="vistas/plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />
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
                                            <h4>Historia Paciente</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form role="form" method="post">


                                        <?php

                                        $item = 'id_paciente';
                                        $valor = $_GET['id_paciente'];

                                        $paciente = ControladorPacientes::ctrMostrarPacientes($item, $valor);

                                        ?>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-6">
                                                <p>Creado por: <b> <?php echo $paciente['doctor']; ?></b></p>

                                            </div>
                                        </div>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-4">
                                                <label class="labelBold" for="nombres">Nombres</label>
                                                <input type="text" class="form-control labelBold" id="nombres" name="nombres" placeholder="Nombres" value="<?php echo $paciente['nombres']; ?>" readonly>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="apellidos">Apellidos</label>
                                                <input type="text" class="form-control labelBold" id="apellidos" name="apellidos" placeholder="Apellidos" value="<?php echo $paciente['apellidos']; ?>" readonly>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control labelBold" id="email" name="email" placeholder="Email" value="<?php echo $paciente['email']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-3">
                                                <label for="nro_cedula">Nro.Cedula</label>
                                                <input type="text" class="form-control" name="nro_cedula" placeholder="Nro.Cedula" value="<?php echo $paciente['nro_cedula']; ?>" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="nro_seguro">Nro.Seguro Social</label>
                                                <input type="text" class="form-control" name="nro_seguro" placeholder="Nro.Seguro Social" value="<?php echo $paciente['nro_seguro']; ?>" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="nacimiento">Fecha de Nacimiento</label>
                                                <input type="date" class="form-control" name="fecha_nacimiento" value="<?php echo $paciente['fecha_nacimiento']; ?>" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="genero">Genero</label>
                                                <input type="text" class="form-control" placeholder="Genero" name="genero" value="<?php echo $paciente['genero']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-4">
                                                <label for="lugarNacimiento">Lugar de Nacimiento</label>
                                                <input type="text" class="form-control" id="lugarNacimiento" placeholder="Lugar de Nacimiento" name="lugar_nacimiento" value="<?php echo $paciente['lugar_nacimiento']; ?>" readonly>
                                            </div>
                                            <div class="form-group col-md-8">
                                                <label for="inputAddress2">Direccion Residencial</label>
                                                <input type="text" class="form-control" id="inputAddress2" placeholder="Dirección Residencial" name="direccion" value="<?php echo $paciente['direccion']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-4">
                                                <label for="ocupacion">Ocupación</label>
                                                <input type="text" class="form-control" id="ocupacion" placeholder="Ocupación" name="ocupacion" value="<?php echo $paciente['ocupacion']; ?>" readonly>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="telefono">Teléfono de casa</label>
                                                <input type="text" class="form-control" id="telefono" placeholder="Teléfono" name="telefono" value="<?php echo $paciente['telefono']; ?>" readonly>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="celular">Número de celular</label>
                                                <input type="text" class="form-control" id="celular" placeholder="Celular" name="celular" value="<?php echo $paciente['celular']; ?>" readonly>
                                            </div>
                                        </div>
                
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-6">
                                                <label for="medico">Medico de Cabecera</label>
                                                <input type="text" class="form-control" id="medico" placeholder="Medico de Cabecera" name="medico" value="<?php echo $paciente['medico']; ?>" readonly>
                                            </div>
                                        </div>

                                        <?php
                                        $decode_urgencia = json_decode($paciente['urgencia'], true);
                                        ?>
                                            <h4>EN CASO DE URGENCIA</h4>
                                            <div class="form-row mb-4">
                                                <div class="form-group col-md-4">
                                                    <label for="nombre_ur"> Nombre</label>
                                                    <input disabled type="text" class="form-control" id="nombre_ur" placeholder="Responsable" name="nombre_ur" value="<?php echo $decode_urgencia['nombre_ur']; ?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="parentesco_ur"> Parentesco</label>
                                                    <input disabled type="text" class="form-control" id="parentesco_ur" placeholder="Parentesco" name="parentesco_ur" value="<?php echo $decode_urgencia['parentesco_ur']; ?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="nro_ur"> Número</label>
                                                    <input disabled type="text" class="form-control" id="nro_ur" placeholder="Parentesco" name="nro_ur" value="<?php echo $decode_urgencia['nro_ur']; ?>">
                                                </div>
                                            </div>

                                        <?php
                                        $nacimiento = new DateTime($paciente['fecha_nacimiento']);
                                        $ahora = new DateTime(date("Y-m-d"));
                                        $diferencia = $ahora->diff($nacimiento);
                                        $edadString =  $diferencia->format("%y");
                                        $edad = (int) $edadString;
                                        $decode_menor = json_decode($paciente['menor'], true);
                                        ?>
                                            <h4>MENOR DE EDAD</h4>
                                            <div class="form-row mb-4">
                                                <div class="form-group col-md-6">
                                                    <label for="responsable"> Por favor colocar el nombre del acudiente o responsable</label>
                                                    <input disabled type="text" class="form-control" id="responsable" placeholder="Responsable" name="responsable" value="<?php echo $decode_menor['responsable']; ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="parentesco"> Parentesco</label>
                                                    <input disabled type="text" class="form-control" id="parentesco" placeholder="Parentesco" name="parentesco" value="<?php echo $decode_menor['parentesco']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-row mb-4">
                                                <div class="form-group col-md-6">
                                                    <label for="nro_celular_responsable"> Nro.Celular</label>
                                                    <input disabled type="text" class="form-control" id="nro_celular_responsable" placeholder="Nro Celular" name="nro_celular_responsable" value="<?php echo $decode_menor['nro_celular_responsable']; ?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="urg_responsable"> Remitido Por</label>
                                                    <input disabled type="text" class="form-control" id="remitido" placeholder="Remitido" name="remitido" value="<?php echo $decode_menor['remitido']; ?>">
                                                </div>
                                            </div>


                                        <!-- Adicional 
                                        
                                        <h5>En caso de emergencia</h5>
                                        <div class="form-row mb-4">
                                                <div class="form-group col-md-4">
                                                    <label for="nombre_ur"> Nombre</label>
                                                    <input type="text" class="form-control" id="nombre_ur" placeholder="Responsable" name="nombre_ur" value="<?php echo $paciente['nombre_ur']; ?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="parentesco_ur"> Parentesco</label>
                                                    <input type="text" class="form-control" id="parentesco_ur" placeholder="Parentesco" name="parentesco_ur" value="<?php echo $paciente['parentesco_ur']; ?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="nro_ur"> Número</label>
                                                    <input type="text" class="form-control" id="nro_ur" placeholder="Parentesco" name="nro_ur" value="<?php echo $paciente['nro_ur']; ?>">
                                                </div>
                                            </div>


                                             <h5>Menor de Edad</h5>
                                            <div class="form-row mb-4">
                                                <div class="form-group col-md-6">
                                                    <label for="responsable"> Por favor colocar el nombre del acudiente o responsable</label>
                                                    <input type="text" class="form-control" id="responsable" placeholder="Responsable" name="responsable" value="<?php echo $paciente['responsable']; ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="parentesco"> Parentesco</label>
                                                    <input type="text" class="form-control" id="parentesco" placeholder="Parentesco" name="parentesco" value="<?php echo $paciente['parentesco']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-row mb-4">
                                                <div class="form-group col-md-6">
                                                    <label for="nro_celular_responsable"> Nro.Celular</label>
                                                    <input type="text" class="form-control" id="nro_celular_responsable" placeholder="Nro Celular" name="nro_celular_responsable" value="<?php echo $paciente['nro_celular_responsable']; ?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="urg_responsable"> Remitido:</label>
                                                    <input type="text" class="form-control" id="remitido" placeholder="Remitido" name="remitido" value="<?php echo $paciente['remitido']; ?>">
                                                </div>

                                            </div>
                                         end adicional -->





                                        <a href="index.php?ruta=editar-paciente&id_paciente=<?php echo $_GET['id_paciente'] ?>" class="btn btn-success mt-3">Editar Paciente</a>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- HISTORIAL DE CONSULTAS -->

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
                                            <h4>LISTA DE CONSULTAS</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">


                                    <div class="row mb-4">


                                        <?php



                                        $item = 'id_terapia';
                                        $item2 = 'paciente';
                                        $valor = "0";
                                        $valor2 = $_GET['id_paciente'];



                                        $verificacion_bv = ControladorConsultaBajaVision::ctrVerificarExistencia($item, $item2, $valor, $valor2);

                                        if (isset($verificacion_bv['consulta'])) {
                                        ?>
                                            <div class="card component-card_7 mb-4" style="width:100%; background: rgb(0 150 136 / 11%);">
                                                <h6 class="p-3">CONSULTAS BAJA VISION:</h6>
                                                <div class="table-responsive-md">

                                                    <table id="zero-config" class="table dt-table-hover" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Nro</th>
                                                                <th>Consulta</th>
                                                                <th>Medico</th>
                                                                <th>Fecha Atención</th>
                                                                <th class="no-content">Acción</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php

                                                            $item = 'id_terapia';
                                                            $item2 = 'paciente';
                                                            $valor = "0";
                                                            $valor2 = $_GET['id_paciente'];



                                                            $consultaBajaVision = ControladorConsultaBajaVision::ctrMostrarBajaVision($item, $item2, $valor, $valor2);

                                                            foreach ($consultaBajaVision as $key => $value) {


                                                                echo '<tr>
                                                                   <td class="text-center">' . ($key + 1) . '</td>
                                                                   <td>Consulta Baja Vision </td>
                                                                   <td>' . $value['doctor'] . '</td>
                                                                   <td>' . $value['fecha_creacion'] . '</td>
                                                                   <td>
                                                                     <button id_consulta="' . $value['id_consulta'] . '" class="btnVerConsultaBV btn btn-primary mb-2 p-1 mr-2 rounded-circle"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                                     </svg></button>
                                                                     <button id_consulta="' . $value['id_consulta'] . '" class="btnEditarConsultaBV btn btn-warning mb-2 p-1 mr-2 rounded-circle"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                                     </svg></button>';

                                                                if ($_SESSION['perfil'] == 'Administrador' || $_SESSION['perfil'] == 'superadministrador' || $_SESSION['perfil'] == 'doctor') {

                                                                    echo '<button borrar_consulta="' . $value['id_consulta'] . '" id_paciente="' . $_GET['id_paciente'] . '" class="btnEliminarConsultaBV btn btn-danger mb-2 p-1 mr-2 rounded-circle"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                     </svg></button>';
                                                                }
                                                                echo '</td>
                                                                   </tr>
                                                               ';
                                                            }

                                                            ?>


                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Nro</th>
                                                                <th>Consulta</th>
                                                                <th>Medico</th>
                                                                <th>Fecha Atención</th>
                                                                <th class="no-content"></th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>

                                                </div>
                                            </div>
                                        <?php  } ?>



                                        <?php

                                        $itemOPE = 'id_terapia';
                                        $itemOPE2 = 'paciente';
                                        $valorOPE = "0";
                                        $valorOPE2 = $_GET['id_paciente'];



                                        $verificacion_OPE = ControladorOptometriaPediatrica::ctrVerificarExistencia($itemOPE, $itemOPE2, $valorOPE, $valorOPE2);
										
										//debug-si
										//echo "<pre>"; print_r($verificacion_OPE); echo "</pre>";
										//
										
                                        if (isset($verificacion_OPE['consulta'])) {
                                        ?>


                                            <!-- CONSULTAS OPTOMETRIA PEDIATRICA -->

                                            <div class="card component-card_7 mt-4 mb-4" style="width:100%; background: rgb(0 150 136 / 11%);">
                                                <h6 class="p-3">CONSULTAS OPTOMETRIA PEDIATRICA:</h6>
                                                <div class="table-responsive-md">

                                                    <table id="zero-config" class="table dt-table-hover" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Nro.</th>
                                                                <th>Consulta</th>
                                                                <th>Medico</th>
                                                                <th>Fecha Atención</th>
                                                                <th class="no-content">Acción</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php

                                                            $item = 'id_terapia';
                                                            $item2 = 'paciente';
                                                            $valor = "0";
                                                            $valor2 = $_GET['id_paciente'];



                                                            $consultaOptometriaPediatrica = ControladorOptometriaPediatrica::ctrMostrarOptometriaPediatrica($item, $item2, $valor, $valor2);

                                                            foreach ($consultaOptometriaPediatrica as $key => $value) {


                                                                echo '<tr>
                                                                   <td class="text-center">' . ($key + 1) . '</td>
                                                                   <td>Consulta Optometría Pediatrica </td>
                                                                   <td>' . $value['doctor'] . '</td>
                                                                   <td>' . $value['fecha_creacion'] . '</td>
                                                                   <td>
                                                                     <button id_consulta="' . $value['id_consulta'] . '" class="btnVerConsultaPediatrica btn btn-primary mb-2 p-1 mr-2 rounded-circle"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                                     </svg></button>
                                                                     <button id_consulta="' . $value['id_consulta'] . '" class="btnEditarConsultaPediatrica btn btn-warning mb-2 p-1 mr-2 rounded-circle"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                                     </svg></button>';

                                                                if ($_SESSION['perfil'] == 'Administrador' || $_SESSION['perfil'] == 'superadministrador' || $_SESSION['perfil'] == 'doctor') {

                                                                    echo '<button borrar_consulta="' . $value['id_consulta'] . '" id_paciente="' . $_GET['id_paciente'] . '" class="btnEliminarConsultaPediatrica btn btn-danger mb-2 p-1 mr-2 rounded-circle"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                     </svg></button>';
                                                                }
                                                                echo '</td>
                                                                   </tr>
                                                               ';
                                                            }

                                                            ?>


                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Nro</th>
                                                                <th>Consulta</th>
                                                                <th>Medico</th>
                                                                <th>Fecha Atención</th>
                                                                <th class="no-content"></th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>

                                                </div>
                                            </div>

                                        <?php
                                        }
                                        ?>

                                        <!-- CONSULTAS OPTOMETRIA NEONATOS -->

                                        <?php

                                        $itemNO = 'id_terapia';
                                        $itemNO2 = 'paciente';
                                        $valorNO = "0";
                                        $valorNO2 = $_GET['id_paciente'];



                                        $verificacion_NO = ControladorOptometriaNeonatos::ctrVerificarExistencia($itemNO, $itemNO2, $valorNO, $valorNO2);

                                        if (isset($verificacion_NO['consulta'])) {
                                        ?>

                                            <div class="card component-card_7 mt-4" style="width:100%; background: rgb(0 150 136 / 11%);">
                                                <h6 class="p-3">CONSULTAS OPTOMETRIA NEONATOS:</h6>
                                                <div class="table-responsive-md">

                                                    <table id="zero-config" class="table dt-table-hover" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Nro</th>
                                                                <th>Consulta</th>
                                                                <th>Medico</th>
                                                                <th>Fecha Atención</th>
                                                                <th class="no-content">Acción</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php

                                                            $item = 'id_terapia';
                                                            $item2 = 'paciente';
                                                            $valor = "0";
                                                            $valor2 = $_GET['id_paciente'];



                                                            $consultaOptometriaNeonatos = ControladorOptometriaNeonatos::ctrMostrarOptometriaNeonatos($item, $item2, $valor, $valor2);

                                                            foreach ($consultaOptometriaNeonatos as $key => $value) {


                                                                echo '<tr>
                                                                   <td class="text-center">' . ($key + 1) . '</td>
                                                                   <td>Consulta Optometría Neonatos </td>
                                                                   <td>' . $value['doctor'] . '</td>
                                                                   <td>' . $value['fecha_creacion'] . '</td>
                                                                   <td>
                                                                     <button id_consulta="' . $value['id_consulta'] . '" class="btnVerConsultaNeonatos btn btn-primary mb-2 p-1 mr-2 rounded-circle"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                                     </svg></button>
                                                                     <button id_consulta="' . $value['id_consulta'] . '" class="btnEditarConsultaNeonatos btn btn-warning mb-2 p-1 mr-2 rounded-circle"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                                     </svg></button>';

                                                                if ($_SESSION['perfil'] == 'Administrador' || $_SESSION['perfil'] == 'superadministrador' || $_SESSION['perfil'] == 'doctor') {

                                                                    echo '<button borrar_consulta="' . $value['id_consulta'] . '" id_paciente="' . $_GET['id_paciente'] . '" class="btnEliminarConsultaNeonatos btn btn-danger mb-2 p-1 mr-2 rounded-circle"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                     </svg></button>';
                                                                }
                                                                echo '</td>
                                                                   </tr>
                                                               ';
                                                            }

                                                            ?>


                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Nro</th>
                                                                <th>Consulta</th>
                                                                <th>Medico</th>
                                                                <th>Fecha Atención</th>
                                                                <th class="no-content"></th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>

                                                </div>
                                            </div>

                                        <?php  } ?>



                                        <!-- CONSULTAS ORTOPTICA ADULTOS -->


                                        <?php

                                        $itemOA = 'id_terapia';
                                        $itemOA2 = 'paciente';
                                        $valorOA = "0";
                                        $valorOA2 = $_GET['id_paciente'];



                                        $verificacion_OA = ControladorOrtopticaAdultos::ctrVerificarExistencia($itemOA, $itemOA2, $valorOA, $valorOA2);



                                        if (isset($verificacion_OA['consulta'])) {



                                        ?>


                                            <div class="card component-card_7 mt-4" style="width:100%; background: rgb(0 150 136 / 11%);">
                                                <h6 class="p-3">CONSULTAS ORTOPTICA ADULTOS:</h6>
                                                <div class="table-responsive-md">

                                                    <table id="zero-config" class="table dt-table-hover" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Nro</th>
                                                                <th>Consulta</th>
                                                                <th>Medico</th>
                                                                <th>Fecha Atención</th>
                                                                <th class="no-content">Acción</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php

                                                            $item = 'id_terapia';
                                                            $item2 = 'paciente';
                                                            $valor = "0";
                                                            $valor2 = $_GET['id_paciente'];



                                                            $consultaOrtopticaAdultos = ControladorOrtopticaAdultos::ctrMostrarOrtopticaAdultos($item, $item2, $valor, $valor2);

                                                            foreach ($consultaOrtopticaAdultos as $key => $value) {


                                                                echo '<tr>
                                                                   <td class="text-center">' . ($key + 1) . '</td>
                                                                   <td>Consulta Ortoptica Adultos </td>
                                                                   <td>' . $value['doctor'] . '</td>
                                                                   <td>' . $value['fecha_creacion'] . '</td>
                                                                   <td>
                                                                     <button id_consulta="' . $value['id_consulta'] . '" class="btnVerConsultaOA btn btn-primary mb-2 p-1 mr-2 rounded-circle"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                                     </svg></button>
                                                                     <button id_consulta="' . $value['id_consulta'] . '" class="btnEditarConsultaOA btn btn-warning mb-2 p-1 mr-2 rounded-circle"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                                     </svg></button>';

                                                                if ($_SESSION['perfil'] == 'Administrador' || $_SESSION['perfil'] == 'superadministrador' || $_SESSION['perfil'] == 'doctor') {

                                                                    echo '<button borrar_consulta="' . $value['id_consulta'] . '" id_paciente="' . $_GET['id_paciente'] . '" class="btnEliminarConsultaOA btn btn-danger mb-2 p-1 mr-2 rounded-circle"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                     </svg></button>';
                                                                }
                                                                echo '</td>
                                                                   </tr>
                                                               ';
                                                            }

                                                            ?>


                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Nro</th>
                                                                <th>Consulta</th>
                                                                <th>Medico</th>
                                                                <th>Fecha Atención</th>
                                                                <th class="no-content"></th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>

                                                </div>
                                            </div>
                                        <?php   } ?>

                                        <!-- CONSULTA GENERICA -->
										
										 <?php



                                        $item = 'id_terapia';
                                        $item2 = 'paciente';
                                        $valor = "0";
                                        $valor2 = $_GET['id_paciente'];



                                        $verificacion_bv = ControladorConsultaGenerica::ctrVerificarExistencia($item, $item2, $valor, $valor2);

                                        if (isset($verificacion_bv['consulta'])) {
                                        ?>
                                            <div class="card component-card_7 mb-4" style="width:100%; background: rgb(0 150 136 / 11%);">
                                                <h6 class="p-3">CONSULTAS GENERICAS:</h6>
                                                <div class="table-responsive-md">

                                                    <table id="zero-config" class="table dt-table-hover" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Nro</th>
                                                                <th>Consulta</th>
                                                                <th>Medico</th>
                                                                <th>Fecha Atención</th>
                                                                <th class="no-content">Acción</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php

                                                            $item = 'id_terapia';
                                                            $item2 = 'paciente';
                                                            $valor = "0";
                                                            $valor2 = $_GET['id_paciente'];



                                                            $consultaGenerica = ControladorConsultaGenerica::ctrMostrarConsultaGenerica($item, $item2, $valor, $valor2);

                                                            foreach ($consultaGenerica as $key => $value) {


                                                                echo '<tr>
                                                                   <td class="text-center">' . ($key + 1) . '</td>
                                                                   <td>Consulta Historia Clinica </td>
                                                                   <td>' . $value['doctor'] . '</td>
                                                                   <td>' . $value['fecha_creacion'] . '</td>
                                                                   <td>
                                                                     <button id_consulta="' . $value['id_consulta'] . '" class="btnVerConsultaCG btn btn-primary mb-2 p-1 mr-2 rounded-circle"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                                     </svg></button>
                                                                     <button id_consulta="' . $value['id_consulta'] . '" class="btnEditarConsultaCG btn btn-warning mb-2 p-1 mr-2 rounded-circle"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                                     </svg></button>';

                                                                if ($_SESSION['perfil'] == 'Administrador' || $_SESSION['perfil'] == 'superadministrador' || $_SESSION['perfil'] == 'doctor') {

                                                                    echo '<button borrar_consulta="' . $value['id_consulta'] . '" id_paciente="' . $_GET['id_paciente'] . '" class="btnEliminarConsultaCG btn btn-danger mb-2 p-1 mr-2 rounded-circle"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                     </svg></button>';
                                                                }
                                                                echo '</td>
                                                                   </tr>
                                                               ';
                                                            }

                                                            ?>


                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Nro</th>
                                                                <th>Consulta</th>
                                                                <th>Medico</th>
                                                                <th>Fecha Atención</th>
                                                                <th class="no-content"></th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>

                                                </div>
                                            </div>
                                        <?php  } ?>
										
										
										<!-- CONSULTA GENERICA FIN -->

                                          <!-- CONSULTAS REFRACCION GENERAL -->


                                          <?php

                                         $itemRG = 'id_terapia';
                                         $itemRG2 = 'paciente';
                                         $valorRG = "0";
                                         $valorRG2 = $_GET['id_paciente'];
                                         
                                         
                                         
                                         $verificacion_RG = ControladorRefraccionGeneral::ctrVerificarExistencia($itemRG, $itemRG2, $valorRG, $valorRG2);
                                         
                                         
                                         
                                         if (isset($verificacion_RG['consulta'])) {
                                         
                                         
                                         
                                         ?>
                                         
                                         
                                             <div class="card component-card_7 mt-4" style="width:100%; background: rgb(0 150 136 / 11%);">
                                                 <h6 class="p-3">CONSULTAS REFRACCIÓN GENERAL:</h6>
                                                 <div class="table-responsive-md">
                                         
                                                     <table id="zero-config" class="table dt-table-hover" style="width:100%">
                                                         <thead>
                                                             <tr>
                                                                 <th>Nro</th>
                                                                 <th>Consulta</th>
                                                                 <th>Medico</th>
                                                                 <th>Fecha Atención</th>
                                                                 <th class="no-content">Acción</th>
                                                             </tr>
                                                         </thead>
                                                         <tbody>
                                                             <?php
                                         
                                                             $item = 'id_terapia';
                                                             $item2 = 'paciente';
                                                             $valor = "0";
                                                             $valor2 = $_GET['id_paciente'];
                                         
                                         
                                         
                                                             $consultaRefraccionGeneral = ControladorRefraccionGeneral::ctrMostrarRefraccionGeneral($item, $item2, $valor, $valor2);
                                         
                                                             foreach ($consultaRefraccionGeneral as $key => $value) {
                                         
                                         
                                                                 echo '<tr>
                                                                    <td class="text-center">' . ($key + 1) . '</td>
                                                                    <td>Consulta Refracción General </td>
                                                                    <td>' . $value['doctor'] . '</td>
                                                                    <td>' . $value['fecha_creacion'] . '</td>
                                                                    <td>
                                                                      <button id_consulta="' . $value['id_consulta'] . '" class="btnVerConsultaRG btn btn-primary mb-2 p-1 mr-2 rounded-circle"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                                      </svg></button>
                                                                      <button id_consulta="' . $value['id_consulta'] . '" class="btnEditarConsultaRG btn btn-warning mb-2 p-1 mr-2 rounded-circle"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                                      </svg></button>';
                                         
                                                                 if ($_SESSION['perfil'] == 'Administrador' || $_SESSION['perfil'] == 'superadministrador' || $_SESSION['perfil'] == 'doctor') {
                                         
                                                                     echo '<button borrar_consulta="' . $value['id_consulta'] . '" id_paciente="' . $_GET['id_paciente'] . '" class="btnEliminarConsultaRG btn btn-danger mb-2 p-1 mr-2 rounded-circle"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                      </svg></button>';
                                                                 }
                                                                 echo '</td>
                                                                    </tr>
                                                                ';
                                                             }
                                         
                                                             ?>
                                         
                                         
                                                         </tbody>
                                                         <tfoot>
                                                             <tr>
                                                                 <th>Nro</th>
                                                                 <th>Consulta</th>
                                                                 <th>Medico</th>
                                                                 <th>Fecha Atención</th>
                                                                 <th class="no-content"></th>
                                                             </tr>
                                                         </tfoot>
                                                     </table>
                                         
                                                 </div>
                                             </div>
                                            <?php   } ?>







                                    </div>

                                    <!-- END LISTADO DE CONSULTAS -->


                                    <div class="widget-header mt-4" style="padding-top:15%;">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h3>TERAPIAS:</h3>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row mt-4">

                                        <div class="col-md-3">
                                            <form role="form" method="post">

                                                <button class="btn btn-success mb-4 ml-3 mt-4">Crear Terapia Baja Vision</button>
                                                <input type="hidden" name="id_paciente" value="<?php echo $_GET['id_paciente']; ?>">
                                                <input type="hidden" name="crear_terapiaBV" value="crear">
                                            </form>
                                            <?php

                                            $crearTerapiaBj = new  ControladorTerapiasBajaVision();
                                            $crearTerapiaBj->ctrCrearTerapiaBajaVision();

                                            ?>
                                        </div>
                                        <?php

                                        $nacimiento = new DateTime($paciente['fecha_nacimiento']);
                                        $ahora = new DateTime(date("Y-m-d"));
                                        $diferencia = $ahora->diff($nacimiento);


                                        $edadString =  $diferencia->format("%y");

                                        $edad = (int) $edadString;


                                        if ($edad <= 3) {

                                            $decode_menor = json_decode($paciente['menor'], true);



                                        ?>

                                            <div class="col-md-3">
                                                <form role="form" method="post">
                                                    <button class="btn btn-success mb-4 ml-3 mt-4">Crear Terapia Optometría Neonatos</button>
                                                    <input type="hidden" name="id_paciente" value="<?php echo $_GET['id_paciente']; ?>">
                                                    <input type="hidden" name="crear_optometria_n" value="crear">
                                                </form>
                                                <?php

                                                $crearTerapiaOptometriaN = new  ControladorTerapiasOptometriaNeonatos();
                                                $crearTerapiaOptometriaN->ctrCrearTerapiaOptometriaNeonatos();

                                                ?>
                                            </div>
                                        <?php } else if ($edad <= 18) { ?>
                                            <div class="col-md-3">
                                                <form role="form" method="post">
                                                    <button class="btn btn-success mb-4 ml-3 mt-4">Crear Terapia Optometría Pediatrica</button>
                                                    <input type="hidden" name="id_paciente" value="<?php echo $_GET['id_paciente']; ?>">
                                                    <input type="hidden" name="crear_optometria_p" value="crear">
                                                </form>
                                                <?php

                                                $crearTerapiaOptometriaP = new  ControladorTerapiasOptometriaPediatrica();
                                                $crearTerapiaOptometriaP->ctrCrearTerapiaOptometriaPediatrica();

                                                ?>
                                            </div>
                                        <?php } else if ($edad >= 19) { ?>
                                            <div class="col-md-4">
                                                <form role="form" method="post">
                                                    <button class="btn btn-success mb-4 ml-3 mt-4">Crear Terapia Ortoptica Adultos</button>
                                                    <input type="hidden" name="id_paciente" value="<?php echo $_GET['id_paciente']; ?>">
                                                    <input type="hidden" name="crear_ortoptica_adultos" value="crear">
                                                </form>
                                                <?php

                                                $crearTerapiaOrtopticaA = new  ControladorTerapiasOrtopticaAdultos();
                                                $crearTerapiaOrtopticaA->ctrCrearTerapiaOrtopticaAdultos();

                                                ?>
                                            </div>
                                        <?php } ?>
                                    </div>




                                    <?php




                                    $item = 'id_paciente';
                                    $valor = $_GET['id_paciente'];

                                    $terapias = ControladorTerapiasBajaVision::ctrMostrarTerapiaBajaVision($item, $valor);



                                    foreach ($terapias as $key => $value) {

                                        $item_cantidad = "id_terapia";
                                        $valor_cantidad = $value['id_terapia'];

                                        $cantidad_citas = ControladorConsultaBajaVision::ctrMostrarCantidadBajaVisionID($item_cantidad, $valor_cantidad);



                                        echo  '
                                                                  <div class="row">
                                                                    <div class="col-md-12">
                                                                     <div class="widget-content widget-content-area">
                                                                        <div class="card component-card_7" style="width:100%; background: rgb(0 150 136 / 11%);">
                                                                    
                                                                             <div class="card-body">
                                                                               <button  id_terapia="' . $value['id_terapia'] . '" id_paciente="' . $value["id_paciente"] . '" style="margin-bottom:-80px;  position:absolute; z-index:3;" class="btn btn-danger btn_eliminar_terapia btn_eliminar_terapiagbv"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                                </svg></button>
                                                                                 <h5 class="">Terapia Baja Vision:</h5>
                                                                                
                                                                                 <div class="rating-stars">
                                                                                    <p>Cantidad de terapias realizadas <b>' . $cantidad_citas['cantidad'] . '</b></p>
                                                                                     <p>Fecha de creación: <b>' . $value["fecha_creacion"] . '</b></p>
                                                                                    <a href="index.php?ruta=terapiasBajaVision&id_terapia=' . $value["id_terapia"] . '&id_paciente=' . $value["id_paciente"] . '" class="btn btn-success mb-4 ml-3 mt-4">VER</a>
                                                                                 </div>
                                                                             </div>
                                                                          </div>
                                                                        </div>
                                                                      </div>
                                                                   </div>';
                                    }

                                    ?>


                                    <?php

                                    $borraTerapia = new ControladorConsultaBajaVision();
                                    $borraTerapia->ctrEliminarTodasTerapias();

                                    ?>

                                    <!-- CARD OPTOMETRIA NEONATOS -->


                                    <?php

                                    $itemON = 'id_paciente';
                                    $valorON = $_GET['id_paciente'];

                                    $terapiasON = ControladorTerapiasOptometriaNeonatos::ctrMostrarTerapiaOptometriaNeonatos($itemON, $valorON);



                                    foreach ($terapiasON as $key => $value) {


                                        $item_cantidadON = "id_terapia";
                                        $valor_cantidadON = $value['id_terapia'];

                                        $cantidad_consultas = ControladorOptometriaNeonatos::ctrMostrarCantidadOptometriaNeonatosID($item_cantidadON, $valor_cantidadON);




                                        echo  '<div class="row">
                                                                    <div class="col-md-12">
                                                                     <div class="widget-content widget-content-area">
                                                                        <div class="card component-card_7" style="width:100%; background: rgb(0 150 136 / 11%);">
                                                                             <div class="card-body">
                                                                             <button  id_terapia="' . $value['id_terapia'] . '" id_paciente="' . $value["id_paciente"] . '" style="margin-bottom:-80px;  position:absolute; z-index:3;" class="btn btn-danger btn_eliminar_terapia btn_eliminar_terapiagopn"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                             </svg></button>
                                                                                 <h5 class="">Terapia Optometría Neonatos:</h5>
                                                                                 <div class="rating-stars">
                                                                                    <p>Cantidad de terapias realizadas <b>' . $cantidad_consultas['cantidad'] . '</b></p>
                                                                                     <p>Fecha de creación: <b>' . $value["fecha_creacion"] . '</b></p>
                                                                                     <a href="index.php?ruta=terapiasOptometriaNeonatos&id_terapia=' . $value["id_terapia"] . '&id_paciente=' . $value["id_paciente"] . '" class="btn btn-success mb-4 ml-3 mt-4">VER</a>
                                                                                 </div>
                                                                             </div>
                                                                          </div>
                                                                        </div>
                                                                      </div>
                                                                   </div>';
                                    }

                                    ?>

                                    <?php

                                    $borraTerapia = new ControladorOptometriaNeonatos();
                                    $borraTerapia->ctrEliminarTodasTerapiasOPN();

                                    ?>


                                    <!-- CARD OPTOMETRIA PEDIATRICA -->




                                    <?php

                                    $itemOP = 'id_paciente';
                                    $valorOP = $_GET['id_paciente'];

                                    $terapiasOP = ControladorTerapiasOptometriaPediatrica::ctrMostrarTerapiaOptometriaPediatrica($itemOP, $valorOP);



                                    foreach ($terapiasOP as $key => $value) {



                                        $item_cantidadOP = "id_terapia";
                                        $valor_cantidadOP = $value['id_terapia'];

                                        $cantidad_consultas = ControladorOptometriaPediatrica::ctrMostrarCantidadOptometriaPediatricaID($item_cantidadOP, $valor_cantidadOP);



                                        echo  '<div class="row">
                                                                    <div class="col-md-12">
                                                                     <div class="widget-content widget-content-area">
                                                                        <div class="card component-card_7" style="width:100%; background: rgb(0 150 136 / 11%);">
                                                                             <div class="card-body">
                                                                             <button  id_terapia="' . $value['id_terapia'] . '" id_paciente="' . $value["id_paciente"] . '" style="margin-bottom:-80px;  position:absolute; z-index:3;" class="btn btn-danger btn_eliminar_terapia btn_eliminar_terapiagopp"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                             </svg></button>
                                                                                 <h5 class="">Terapia Optometría Pediatrica:</h5>
                                                                                 <div class="rating-stars">
                                                                                    <p>Cantidad de terapias realizadas <b>' . $cantidad_consultas['cantidad'] . '</b></p>
                                                                                     <p>Fecha de creación: <b>' . $value["fecha_creacion"] . '</b></p>
                                                                                     <a href="index.php?ruta=terapiasOptometriaPediatrica&id_terapia=' . $value["id_terapia"] . '&id_paciente=' . $value["id_paciente"] . '" class="btn btn-success mb-4 ml-3 mt-4">VER</a>
                                                                                 </div>
                                                                             </div>
                                                                          </div>
                                                                        </div>
                                                                      </div>
                                                                   </div>';
                                    }

                                    ?>

                                    <?php

                                    $borraTerapia = new ControladorOptometriaPediatrica();
                                    $borraTerapia->ctrEliminarTodasTerapiasOPP();

                                    ?>



                                    <!-- CARD ORTOPTICA ADULTOS -->




                                    <?php

                                    $itemOA = 'id_paciente';
                                    $valorOA = $_GET['id_paciente'];

                                    $terapiasOA = ControladorTerapiasOrtopticaAdultos::ctrMostrarTerapiaOrtopticaAdultos($itemOA, $valorOA);



                                    foreach ($terapiasOA as $key => $value) {

                                        $item_cantidadOA = "id_terapia";
                                        $valor_cantidadOA = $value['id_terapia'];

                                        $cantidad_consultas = ControladorOrtopticaAdultos::ctrMostrarCantidadOrtopticaAdultosID($item_cantidadOA, $valor_cantidadOA);



                                        echo  '<div class="row">
                                                                    <div class="col-md-12">
                                                                     <div class="widget-content widget-content-area">
                                                                        <div class="card component-card_7" style="width:100%; background: rgb(0 150 136 / 11%);">
                                                                             <div class="card-body">
                                                                             <button  id_terapia="' . $value['id_terapia'] . '" id_paciente="' . $value["id_paciente"] . '" style="margin-bottom:-80px;  position:absolute; z-index:3;" class="btn btn-danger btn_eliminar_terapia btn_eliminar_terapiagoa"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                             </svg></button>
                                                                                 <h5 class="">Terapia Ortoptica Adultos:</h5>
                                                                                 <div class="rating-stars">
                                                                                    <p>Cantidad de terapias realizadas <b>' . $cantidad_consultas['cantidad'] . '</b></p>
                                                                                     <p>Fecha de creación: <b>' . $value["fecha_creacion"] . '</b></p>
                                                                                     <a href="index.php?ruta=terapiasOrtopticaAdultos&id_terapia=' . $value["id_terapia"] . '&id_paciente=' . $value["id_paciente"] . '" class="btn btn-success mb-4 ml-3 mt-4">VER</a>
                                                                                 </div>
                                                                             </div>
                                                                          </div>
                                                                        </div>
                                                                      </div>
                                                                   </div>';
                                    }

                                    ?>

                                    <?php

                                    $borraTerapia = new ControladorOrtopticaAdultos();
                                    $borraTerapia->ctrEliminarTodasTerapiasOA();

                                    ?>



                                    <?php

                                    $borrarConsulta = new ControladorOptometriaNeonatos();
                                    $borrarConsulta->ctrEliminarConsulta();

                                    ?>



                                    <?php

                                    $borrarConsulta = new ControladorConsultaBajaVision();
                                    $borrarConsulta->ctrEliminarConsulta();

                                    ?>

                                    <?php

                                    $borrarConsulta = new ControladorOptometriaPediatrica();
                                    $borrarConsulta->ctrEliminarConsulta();

                                    ?>

                                    <?php

                                    $borrarConsulta = new ControladorOrtopticaAdultos();
                                    $borrarConsulta->ctrEliminarConsulta();

                                    ?>


                                     <?php
                                     
                                     $borrarConsulta = new ControladorRefraccionGeneral();
                                     $borrarConsulta->ctrEliminarConsulta();
                                     
                                     ?>

                                     <?php
                                     
                                     $borrarConsulta = new ControladorConsultaGenerica();
                                     $borrarConsulta->ctrEliminarConsulta();
                                     
                                     ?>




                                    <div class="row mt-3 p-3">
                                        <h6>SUBIR DOCUMENTOS DEL PACIENTE:</h6>
                                        <div id="fuSingleFile" class="col-lg-12 layout-spacing">
                                            <div class="statbox widget box box-shadow">
                                                <div class="widget-header">
                                                    <div class="row">
                                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="widget-content widget-content-area">
                                                    <div class="custom-file-container" data-upload-id="myFirstImage">
                                                        <label>Limpiar <a href="javascript:void(0)" class="custom-file-container__image-clear">x</a></label>

                                                        <form role="form" method="post" enctype="multipart/form-data">
                                                            <label class="custom-file-container__custom-file">


                                                                <input type="file" class="custom-file-container__custom-file__custom-file-input" name="documento" required>
                                                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                            </label>

                                                            <input type="hidden" name="nombrePaciente" value="<?php echo $paciente['nombres']; ?>">
                                                            <input type="hidden" name="apellidoPaciente" value="<?php echo $paciente['apellidos']; ?>">
                                                            <input type="hidden" name="id_paciente" value="<?php echo $_GET['id_paciente']; ?>">
                                                            <input type="hidden" name="nuevoDocumento" value="subir_documento">
                                                            <button type="submit" class="btn btn-primary mt-4">Subir Documento</button>

                                                            <?php

                                                            $subirDocumento = new ControladorPacientes();
                                                            $subirDocumento->ctrSubirDocumentoPaciente();

                                                            ?>

                                                        </form>
                                                        <!--<div class="custom-file-container__image-preview"></div>-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4 class="p-2">DOCUMENTOS PACIENTE:</h4>
                                            </div>
                                        </div>
                                    </div>





                                    <div class="row mt-4">
                                        <?php

                                        $item = 'id_paciente';
                                        $valor = $_GET['id_paciente'];

                                        $documentos = ControladorPacientes::ctrMostrarDocumentos($item, $valor);


                                        foreach ($documentos as $key => $value) {



                                           echo '<div class="col-md-6" style="min-width:100px; border: 2px solid black; background-color:#e1e1e1; border-radius:20px 20px">
                                                  <svg xmlns="http://www.w3.org/2000/svg"  style="width:60px;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                                  </svg>
                                                  
                                                  <a  title="Visualizar Archivo" href="' . $value['url'] . '" target="_blank" class="btn btn-info">
												  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
												  </svg>
												  </a>
                                                  ';

                                            if ($_SESSION['perfil'] == 'superadministrador' || $_SESSION['perfil'] == 'doctor') {
                                                echo '  

                                                <a  title="Descargar Archivo" href="' . $value['url'] . '" download="' . $value['nombre'] . '"  class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                                </svg></a> 
                                                 
                                                  <button type="submit" class="btn btn-danger eliminarDocumentoPaciente" id_paciente="' . $_GET['id_paciente'] . '"   nombre="' . $value['nombre'] . '" borrar_documento="' . $value['id_documento'] . '" ><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg></button>
                                                  ';
                                            }
                                            echo '
                                                  <p class="mt-3">Nombre:' . $value['nombre'] . '</p>
                                                  </div>
                                                 ';
                                        }



                                        ?>

                                        <?php

                                        $borraDocumento = new ControladorPacientes();
                                        $borraDocumento->ctrEliminarDocumento();

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

    <!-- AQUI FINALIZA EL HISTORIAL DE CONSULTAS -->




</div>



<script src="vistas/js/historia.js"></script>

<script src="vistas/plugins/file-upload/file-upload-with-preview.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.2.228/pdf.min.js"></script>

<script>
    var _PDF_DOC,
        _CURRENT_PAGE,
        _TOTAL_PAGES,
        _PAGE_RENDERING_IN_PROGRESS = 0,
        _CANVAS = document.querySelector('#pdf-canvas');

    // initialize and load the PDF
    async function showPDF(pdf_url) {
        document.querySelector("#pdf-loader").style.display = 'block';

        // get handle of pdf document
        try {
            _PDF_DOC = await pdfjsLib.getDocument({
                url: pdf_url
            });
        } catch (error) {
            alert(error.message);
        }

        // total pages in pdf
        _TOTAL_PAGES = _PDF_DOC.numPages;

        // Hide the pdf loader and show pdf container
        document.querySelector("#pdf-loader").style.display = 'none';
        document.querySelector("#pdf-contents").style.display = 'block';
        document.querySelector("#pdf-total-pages").innerHTML = _TOTAL_PAGES;

        // show the first page
        showPage(1);
    }

    // load and render specific page of the PDF
    async function showPage(page_no) {
        _PAGE_RENDERING_IN_PROGRESS = 1;
        _CURRENT_PAGE = page_no;

        // disable Previous & Next buttons while page is being loaded
        document.querySelector("#pdf-next").disabled = true;
        document.querySelector("#pdf-prev").disabled = true;

        // while page is being rendered hide the canvas and show a loading message
        document.querySelector("#pdf-canvas").style.display = 'none';
        document.querySelector("#page-loader").style.display = 'block';

        // update current page
        document.querySelector("#pdf-current-page").innerHTML = page_no;

        // get handle of page
        try {
            var page = await _PDF_DOC.getPage(page_no);
        } catch (error) {
            alert(error.message);
        }

        // original width of the pdf page at scale 1
        var pdf_original_width = page.getViewport(1).width;

        // as the canvas is of a fixed width we need to adjust the scale of the viewport where page is rendered
        var scale_required = _CANVAS.width / pdf_original_width;

        // get viewport to render the page at required scale
        var viewport = page.getViewport(scale_required);

        // set canvas height same as viewport height
        _CANVAS.height = viewport.height;

        // setting page loader height for smooth experience
        document.querySelector("#page-loader").style.height = _CANVAS.height + 'px';
        document.querySelector("#page-loader").style.lineHeight = _CANVAS.height + 'px';

        // page is rendered on <canvas> element
        var render_context = {
            canvasContext: _CANVAS.getContext('2d'),
            viewport: viewport
        };

        // render the page contents in the canvas
        try {
            await page.render(render_context);
        } catch (error) {
            alert(error.message);
        }

        _PAGE_RENDERING_IN_PROGRESS = 0;

        // re-enable Previous & Next buttons
        document.querySelector("#pdf-next").disabled = false;
        document.querySelector("#pdf-prev").disabled = false;

        // show the canvas and hide the page loader
        document.querySelector("#pdf-canvas").style.display = 'block';
        document.querySelector("#page-loader").style.display = 'none';
    }

    // click on "Show PDF" buuton
    document.querySelector(".verPDF").addEventListener('click', function() {
        this.style.display = 'none';
        url = this.getAttribute('url');

        showPDF(url);
    });

    // click on the "Previous" page button
    document.querySelector("#pdf-prev").addEventListener('click', function() {
        if (_CURRENT_PAGE != 1)
            showPage(--_CURRENT_PAGE);
    });

    // click on the "Next" page button
    document.querySelector("#pdf-next").addEventListener('click', function() {
        if (_CURRENT_PAGE != _TOTAL_PAGES)
            showPage(++_CURRENT_PAGE);
    });
</script>

<script>
    //First upload
    var firstUpload = new FileUploadWithPreview('myFirstImage')
    //Second upload
    var secondUpload = new FileUploadWithPreview('mySecondImage')
</script>