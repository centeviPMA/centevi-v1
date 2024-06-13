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
                                            <h4>Editar Paciente</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">

                                    <?php

                                    $item = 'id_paciente';
                                    $valor = $_GET['id_paciente'];

                                    $paciente = ControladorPacientes::ctrMostrarPacientes($item, $valor);

                                    ?>
                                    <form role="form" method="post">
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-6">
                                                <label for="nombres">Nombres</label>
                                                <input type="text" class="form-control" id="nombres" placeholder="Nombres" name="nombres" value="<?php echo $paciente['nombres']; ?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="apellidos">Apellidos</label>
                                                <input type="text" class="form-control" id="apellidos" placeholder="Apellidos" name="apellidos" value="<?php echo $paciente['apellidos']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-3">
                                                <label for="nro_cedula">Nro.Cedula</label>
                                                <input type="text" class="form-control" id="nro_cedula" placeholder="Nro.Cedula" name="nro_cedula" value="<?php echo $paciente['nro_cedula']; ?>">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="nro_seguro">Nro.Seguro Social</label>
                                                <input type="text" class="form-control" id="nro_seguro" placeholder="Nro.Seguro Social" name="nro_seguro" value="<?php echo $paciente['nro_seguro']; ?>">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Fecha de Nacimiento</label>
                                                <input type="date" class="form-control" name="fecha_nacimiento" value="<?php echo $paciente['fecha_nacimiento']; ?>">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="inputAddress">Genero</label>
                                                <input type="text" class="form-control" placeholder="Genero" name="genero" value="<?php echo $paciente['genero']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-4">
                                                <label for="lugarNacimiento">Lugar de Nacimiento</label>
                                                <input type="text" class="form-control" id="lugarNacimiento" placeholder="Lugar de Nacimiento" name="lugar_nacimiento" value="<?php echo $paciente['lugar_nacimiento']; ?>">
                                            </div>
                                            <div class="form-group col-md-8">
                                                <label for="inputAddress2">Direccion Residencial</label>
                                                <input type="text" class="form-control" id="inputAddress2" placeholder="Dirección Residencial" name="direccion" value="<?php echo $paciente['direccion']; ?>">
                                            </div>
                                        </div>

                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-4">
                                                <label for="ocupacion">Ocupación</label>
                                                <input type="text" class="form-control" id="ocupacion" placeholder="Ocupación" name="ocupacion" value="<?php echo $paciente['ocupacion']; ?>" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="telefono">Teléfono de casa</label>
                                                <input type="text" class="form-control" id="telefono" placeholder="Teléfono" name="telefono" value="<?php echo $paciente['telefono']; ?>" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="celular">Número de celular</label>
                                                <input type="text" class="form-control" id="celular" placeholder="Celular" name="celular" value="<?php echo $paciente['celular']; ?>" required>
                                            </div>
                                        </div>


                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-6">
                                                <label for="medico">Medico de Cabecera</label>
                                                <input type="text" class="form-control" id="medico" placeholder="Medico de Cabecera" name="medico_cabecera" value="<?php echo $paciente['medico']; ?>">
                                            </div>
                                        </div>


                                        <!-- Validar si hay contenido en urgencias -->

                                        <?php
                                        if ($paciente['urgencia'] != "") {

                                            $decode_urgencia = json_decode($paciente['urgencia'], true);


                                        ?>
                                            <h5>En caso de urgencia:</h5>
                                            <div class="form-row mb-4">
                                                <div class="form-group col-md-4">
                                                    <label for="nombre_ur"> Nombre</label>
                                                    <input type="text" class="form-control" id="nombre_ur" placeholder="Responsable" name="nombre_ur" value="<?php echo $decode_urgencia['nombre_ur']; ?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="parentesco_ur"> Parentesco</label>
                                                    <input type="text" class="form-control" id="parentesco_ur" placeholder="Parentesco" name="parentesco_ur" value="<?php echo $decode_urgencia['parentesco_ur']; ?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="nro_ur"> Número</label>
                                                    <input type="text" class="form-control" id="nro_ur" placeholder="Parentesco" name="nro_ur" value="<?php echo $decode_urgencia['nro_ur']; ?>">
                                                </div>
                                            </div>
                                        <?php } else { ?>
                                            <input type="hidden" name="responsable_ur">
                                            <input type="hidden" name="parentesco_ur">
                                            <input type="hidden" name="nro_ur">
                                        <?php } ?>



                                        <?php

                                        $nacimiento = new DateTime($paciente['fecha_nacimiento']);
                                        $ahora = new DateTime(date("Y-m-d"));
                                        $diferencia = $ahora->diff($nacimiento);


                                        $edadString =  $diferencia->format("%y");

                                        $edad = (int) $edadString;


                                        if ($edad < 18) {

                                            $decode_menor = json_decode($paciente['menor'], true);

                                        ?>
                                            <h5>Menor de Edad</h5>
                                            <div class="form-row mb-4">
                                                <div class="form-group col-md-6">
                                                    <label for="responsable"> Por favor colocar el nombre del acudiente o responsable</label>
                                                    <input type="text" class="form-control" id="responsable" placeholder="Responsable" name="responsable" value="<?php echo $decode_menor['responsable']; ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="parentesco"> Parentesco</label>
                                                    <input type="text" class="form-control" id="parentesco" placeholder="Parentesco" name="parentesco" value="<?php echo $decode_menor['parentesco']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-row mb-4">
                                                <div class="form-group col-md-6">
                                                    <label for="nro_celular_responsable"> Nro.Celular</label>
                                                    <input type="text" class="form-control" id="nro_celular_responsable" placeholder="Nro Celular" name="nro_celular_responsable" value="<?php echo $decode_menor['nro_celular_responsable']; ?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="urg_responsable"> Remitido:</label>
                                                    <input type="text" class="form-control" id="remitido" placeholder="Remitido" name="remitido" value="<?php echo $decode_menor['remitido']; ?>">
                                                </div>

                                            </div>



                                        <?php } else { ?>

                                            <input type="hidden" name="responsable">
                                            <input type="hidden" name="parentesco">
                                            <input type="hidden" name="nro_celular_responsable">
                                            <input type="hidden" name="remitido">

                                        <?php }  ?>




                                        <input type="hidden" name="id_paciente" value="<?php echo $_GET['id_paciente']; ?>">
                                        <input type="hidden" name="actualizar" value="exito">
                                        <button type="submit" class="btn btn-success mt-3">Editar Paciente</button>
                                    </form>
                                    <?php

                                    $editarPaciente = new ControladorPacientes();
                                    $editarPaciente->ctrEditarPaciente();

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

<!-- 
<script src="vistas/js/pacientes.js"></script> -->

<script>
    //     $("#gridCheck").find("checkbox").each(function () {
    //     if ($(this).prop('checked') == true) {
    //         alert("Hola")
    //     }
    // });

    var miCheckbox = document.getElementById('gridCheck');

    var contenedor = document.getElementById('contenedor_alergico');

    miCheckbox.addEventListener('click', function() {
        if (miCheckbox.checked) {


            contenedor.innerHTML = '<input type="text" class="form-control" name="alergias" placeholder="Ingrese a que es alergico el paciente">';


        } else {

            contenedor.innerHTML = '<input type="hidden" name="alergias">';

        }
    });


    var emergencia = document.getElementById('emergencia');

    var contenedorEmergencia = document.getElementById('contenedor_emergencia');

    $("#contenedor_emergencia").append(
        '<input type="hidden" name="alergias" value="">' +
        '<input type="hidden" name="urg_responsable" value="">' +
        '<input type="hidden"  name="urg_parentesto" value="">' +
        '<input type="hidden"  name="urg_celular" value="">'

    );


    emergencia.addEventListener('click', function() {
        if (emergencia.checked) {



            $("#contenedor_emergencia").append(
                '<div id="contenido"' +
                '<div class="form-row mb-4 mt-4">' +
                '<div class="form-group col-md-4">' +
                '<label for="urg_responsable"> Contactar a:</label>' +
                ' <input type="text" class="form-control" id="urg_responsable" placeholder="Nro Celular" name="urg_responsable">' +
                '</div>' +
                '<div class="form-group col-md-4">' +
                '<label for="urg_parentesto"> Parentesco </label>' +
                '<input type="text" class="form-control" id="urg_parentesto" placeholder="Parentesco" name="urg_parentesto">' +
                '</div>' +
                '<div class="form-group col-md-4">' +
                '<label for="urg_celular">Nro Celular </label>' +
                '<input type="text" class="form-control" id="urg_celular" placeholder=" Número Celular" name="urg_celular">' +
                '</div>' +
                '</div>' +
                '</div>'
            );



        } else {


            $("#contenido").remove();


        }

    });
</script>