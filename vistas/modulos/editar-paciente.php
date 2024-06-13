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
                                            <h4>EDITAR PACIENTE</h4>
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
                                            <div class="form-group col-md-4">
                                                <label for="nombres">Nombres</label>
                                                <input type="text" class="form-control" id="nombres" required name="nombres" value="<?php echo $paciente['nombres']; ?>">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="apellidos">Apellidos</label>
                                                <input type="text" class="form-control" id="apellidos" required name="apellidos" value="<?php echo $paciente['apellidos']; ?>">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email" required name="email" value="<?php echo $paciente['email']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-3">
                                                <label for="nro_cedula">Nro.Cedula</label>
                                                <input type="text" class="form-control" id="nro_cedula" name="nro_cedula" value="<?php echo $paciente['nro_cedula']; ?>">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="nro_seguro">Nro.Seguro Social</label>
                                                <input type="text" class="form-control" id="nro_seguro" name="nro_seguro" value="<?php echo $paciente['nro_seguro']; ?>">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Fecha de Nacimiento</label>
                                                <input type="date" class="form-control" name="fecha_nacimiento" value="<?php echo $paciente['fecha_nacimiento']; ?>">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="inputAddress">Genero</label>
                                                <input type="text" class="form-control" name="genero" value="<?php echo $paciente['genero']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-4">
                                                <label for="lugarNacimiento">Lugar de Nacimiento</label>
                                                <input type="text" class="form-control" id="lugarNacimiento" name="lugar_nacimiento" value="<?php echo $paciente['lugar_nacimiento']; ?>">
                                            </div>
                                            <div class="form-group col-md-8">
                                                <label for="inputAddress2">Direccion Residencial</label>
                                                <input type="text" class="form-control" id="inputAddress2" name="direccion" value="<?php echo $paciente['direccion']; ?>">
                                            </div>
                                        </div>

                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-4">
                                                <label for="ocupacion">Ocupación</label>
                                                <input type="text" class="form-control" id="ocupacion" name="ocupacion" value="<?php echo $paciente['ocupacion']; ?>" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="telefono">Teléfono de casa</label>
                                                <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $paciente['telefono']; ?>" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="celular">Número de celular</label>
                                                <input type="text" class="form-control" id="celular" name="celular" value="<?php echo $paciente['celular']; ?>" required>
                                            </div>
                                        </div>


                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-6">
                                                <label for="medico">Medico de Cabecera</label>
                                                <input type="text" class="form-control" id="medico" name="medico_cabecera" value="<?php echo $paciente['medico']; ?>">
                                            </div>
                                        </div>

                                        <!-- Validar si hay contenido en urgencias -->
                                        <?php
                                        $decode_urgencia = json_decode($paciente['urgencia'], true);
                                        ?>
                                            <h4>EN CASO DE URGENCIA</h4>
                                            <div class="form-row mb-4">
                                                <div class="form-group col-md-4">
                                                    <label for="nombre_ur"> Nombre</label>
                                                    <input type="text" class="form-control" id="nombre_ur" name="nombre_ur" value="<?php echo $decode_urgencia['nombre_ur']; ?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="parentesco_ur"> Parentesco</label>
                                                    <input type="text" class="form-control" id="parentesco_ur" name="parentesco_ur" value="<?php echo $decode_urgencia['parentesco_ur']; ?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="nro_ur"> Número</label>
                                                    <input type="text" class="form-control" id="nro_ur" name="nro_ur" value="<?php echo $decode_urgencia['nro_ur']; ?>">
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
                                                    <input type="text" class="form-control" id="responsable" name="responsable" value="<?php echo $decode_menor['responsable']; ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="parentesco"> Parentesco</label>
                                                    <input type="text" class="form-control" id="parentesco" name="parentesco" value="<?php echo $decode_menor['parentesco']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-row mb-4">
                                                <div class="form-group col-md-6">
                                                    <label for="nro_celular_responsable"> Nro.Celular</label>
                                                    <input type="text" class="form-control" id="nro_celular_responsable" name="nro_celular_responsable" value="<?php echo $decode_menor['nro_celular_responsable']; ?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="urg_responsable"> Remitido Por</label>
                                                    <input type="text" class="form-control" id="remitido" name="remitido" value="<?php echo $decode_menor['remitido']; ?>">
                                                </div>
                                            </div>

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

<script>
$(document).ready(function(){
    var cedulaOriginal = $('#nro_cedula').val(); // Almacena el valor original de la cédula al cargar la página
    $('#nro_cedula').on('blur', function(){
        var nro_cedula = $(this).val();
        var id_paciente = $('input[name="id_paciente"]').val(); // Obtener el ID del paciente actual
        if (nro_cedula !== cedulaOriginal) { // Verificar si el nuevo valor es diferente al valor original
            $.ajax({
                url: 'ajax/verificar_cedula_edicion.php',
                method: 'POST',
                data: {nro_cedula: nro_cedula, id_paciente: id_paciente},
                dataType: 'json',
                success: function(response){
                    if(response.existe){
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'El número de cédula ya existe en la base de datos.'
                        });
                        $('#nro_cedula').val(cedulaOriginal); // Restaurar el valor original de la cédula
                    }
                },
                error: function(xhr, status, error){
                    console.error(error);
                }
            });
        }
    });
});
</script>