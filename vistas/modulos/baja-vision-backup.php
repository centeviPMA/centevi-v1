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
                                            <h3 class="text-center">Consulta de Baja Vision</h3>
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

                                                        echo '<option value="' . $value["id_paciente"] . '"> Número Cedula: ' . $value['nro_cedula'] . ' || Nombres: ' . $value["nombres"] . ' ' . $value['apellidos'] . '</option>';
                                                    }
                                                }





                                                ?>




                                                </select>
                                            </div>

                                        </div>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-3">
                                                <label for="inputAddress">Edad</label>
                                                <input type="number" class="form-control" id="inputAddress" placeholder="Edad" name="edad">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputAddress">Fecha de atencion</label>
                                                <input type="date" class="form-control" id="inputAddress" name="fecha_atencion">
                                            </div>
                                        </div>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-12">
                                                <label for="inputAddress">Motivo de consulta:</label>
                                                <textarea id="textarea" class="form-control textarea" maxlength="800" rows="5" placeholder="Esta área tiene un limite de 800 caracteres." name="m_c"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-4">
                                                <label for="lugarNacimiento">Antecedentes Oculares</label>
                                                <input type="text" class="form-control" id="lugarNacimiento" placeholder="A/O" name="a_o">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputAddress2">Antecedentes Personales</label>
                                                <input type="text" class="form-control" id="inputAddress2" placeholder="A/P" name="a_p">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputAddress2">Antecentes Familiares</label>
                                                <input type="text" class="form-control" id="inputAddress2" placeholder="A/F" name="a_f">
                                            </div>
                                        </div>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-12">
                                                <label for="medicamentos">Medicamentos</label>
                                                <input type="text" class="form-control" id="medicamentos" placeholder="Medicamentos" name="medicamentos">
                                            </div>
                                        </div>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-12">
                                                <label for="tratamientos">Tratamientos anteriores</label>
                                                <input type="text" class="form-control" id="tratamientos" placeholder="Tratamientos" name="tratamientos">
                                            </div>
                                        </div>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-6">
                                                <label for="oftalmologico">DX. Oftalmologico Principal</label>
                                                <input type="text" class="form-control" id="oftalmologico" placeholder="Oftalmologico principal" name="dx_oft_princ">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="objetivos">Objetivos de paciente</label>
                                                <input type="text" class="form-control" id="objetivos" placeholder="Objetivos" name="objetivos">
                                            </div>
                                        </div>

                                        <h6>AGUDEZA VISUAL</h6>
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
                                                                    <input type="text" class="form-control" placeholder="od_vl" name="av/sc_od_vl">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" placeholder="oi_vl" name="av/sc_oi_vl">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-center">VP</td>
                                                                <td>
                                                                    <input type="text" class="form-control" placeholder="od_vp" name="av/sc_od_vp">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" placeholder="oi_vp" name="av/sc_oi_vp">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-center">PH</td>
                                                                <td>
                                                                    <input type="text" class="form-control" placeholder="od_ph" name="av/sc_od_ph">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" placeholder="oi_ph" name="av/sc_oi_ph">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
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
                                                                <td class="text-center">VL</td>
                                                                <td>
                                                                    <input type="text" class="form-control" placeholder="od_vl" name="av/cc_od_vl">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" placeholder="oi_vl" name="av/cc_oi_vl">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-center">VP</td>
                                                                <td>
                                                                    <input type="text" class="form-control" placeholder="od_vp" name="av/cc_od_vp">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" placeholder="oi_vp" name="av/cc_oi_vp">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-center">PH</td>
                                                                <td>
                                                                    <input type="text" class="form-control" placeholder="od_ph" name="av/cc_od_ph">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" placeholder="oi_ph" name="av/cc_oi_ph">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <!--<label for="tratamientos">Vision Excéntrica</label>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-2">
                                                <input type="text" class="form-control" id="D" placeholder="D" name="ve_D">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" class="form-control" id="I" placeholder="I" name="ve_I">
                                            </div>
                                        </div>-->



                                        <div class="form-group">
                                            <h5 class="p-4">RECETA EN USO</h5>
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">RX en uso</th>
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
                                                                <input type="text" class="form-control" placeholder="esfera_od" name="esfera_od">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="cilindro_od" name="cilindro_od">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="eje_od" name="eje_od">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="p_base_od" name="p_base_od" value="△">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="add_od" name="add_od">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">Ojo Izquierdo</td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="esfera_oi" name="esfera_oi">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="cilindro_oi" name="cilindro_oi">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="eje_oi" name="eje_oi">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="p_base_oi" name="p_base_oi" value="△">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="add_oi" name="add_oi">
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
                                                <h5>CV.CONFRONTACION</h5>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <h5>SALUD OCULAR</h5>
                                            </div>
                                        </div>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control" placeholder="Ojo Derecho" name="cv_od">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control" placeholder="Ojo Derecho" name="so_od">
                                            </div>
                                        </div>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control" placeholder="Ojo Izquierdo" name="cv_oi">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control" placeholder="Ojo Izquierdo" name="so_oi">
                                            </div>
                                        </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>AMSLER</h6>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" placeholder="Ojo Derecho" name="amsler_od">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" placeholder="Ojo Izquierdo" name="amsler_oi">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h6>SENSIBILIDAD AL CONTRASTE</h6>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" placeholder="Ojo Derecho" name="sensibilidad_od">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" placeholder="Ojo Izquierdo" name="sensibilidad_oi">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                 <div class="form-row mb-4">
                                    <div class="form-group col-md-12">
                                        <label for="inputAddress">Versiones</label>
                                        <textarea id="textarea" class="form-control textarea" maxlength="800" rows="5" placeholder="Esta área tiene un limite de 800 caracteres." name="plan_versiones"></textarea>
                                    </div>
                                </div>

                                <!--<div class="form-group">
                                    <h5>Refracción</h5>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th class="text-center">RECETA LEJOS</th>
                                                    <th>AV/VL</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center">OD</td>
                                                    <td>
                                                        <!-- <input type="text" class="form-control" placeholder="receta_lejos_od" name="receta_lejos_od"> 
                                                        <textarea id="textarea" class="form-control textarea" maxlength="200" rows="1" placeholder="Limite de 200 caracteres." name="receta_lejos_od"></textarea>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" placeholder="av_vl_od" name="av_vl_od">
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td class="text-center">OI</td>
                                                    <td>
                                                        <textarea id="textarea" class="form-control textarea" maxlength="200" rows="1" placeholder="Limite de 200 caracteres." name="receta_lejos_oi"></textarea>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" placeholder="av_vl_oi" name="av_vl_oi">
                                                    </td>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>RECETA CERCA</th>
                                                    <th>AV/VP</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center">OD</td>
                                                    <td>
                                                        <textarea id="textarea" class="form-control textarea" maxlength="200" rows="1" placeholder="Limite de 200 caracteres." name="receta_cerca_od"></textarea>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" placeholder="av_vp_od" name="av_vp_od">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">OI</td>
                                                    <td>
                                                        <textarea id="textarea" class="form-control textarea" maxlength="200" rows="1" placeholder="Limite de 200 caracteres." name="receta_cerca_oi"></textarea>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" placeholder="av_vp_oi" name="av_vp_oi">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>-->


                                




                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center">PRUEBAS SENSORIALES</th>
                                                <th class="text-center">VISION LEJANA</th>
                                                <th class="text-center">VISION PROXIMA</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center">Luces de Worth</td>
                                                <td>
                                                    <input type="text" class="form-control" name="vl_luces" placeholder="vl_luces">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="vp_luces" placeholder="vp_luces">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="form-row mb-4">
                                    <div class="form-group col-md-12">
                                        <label for="inputAddress">Visión de Color</label>
                                    </div>
                                </div>

                                <div class="form-row mb-4">
                                    <div class="form-group col-md-6">
                                        <label for="inputAddress">Ojo Derecho</label>
                                        <input type="text" class="form-control" id="inputAddress" placeholder="Ojo Derecho" name="prueba_od">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputAddress">Ojo Izquierdo</label>
                                        <input type="text" class="form-control" id="inputAddress" placeholder="Ojo Izquierdo" name="prueba_oi">
                                    </div>
                                </div>

<div class="form-group">
                                            <h5 class="p-4">RECETA FINAL PARA DISTANCIA</h5>
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">RX </th>
                                                            <th>ESFERA</th>
                                                            <th>CILINDRO</th>
                                                            <th>EJE</th>
                                                            <th>P/BASE △</th>
                                                            <th>AGUDEZA VISUAL</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-center">Ojo Derecho</td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="esfera_od" name="esfera_od_f">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="cilindro_od" name="cilindro_od_f">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="eje_od" name="eje_od_f">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="p_base_od" name="p_base_od_f" value="△">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="agz_od" name="agz_od_f">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">Ojo Izquierdo</td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="esfera_oi" name="esfera_oi_f">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="cilindro_oi" name="cilindro_oi_f">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="eje_oi" name="eje_oi_f">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="p_base_oi" name="p_base_oi_f" value="△">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="agz_oi" name="agz_oi_f">
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        
                                        <div class="form-row mb-4">
                                    <div class="form-group col-md-6">
                                        <label for="inputAddress">TIPO DE LENTE</label>
                                        <input type="text" class="form-control" id="inputAddress" placeholder="Marca" name="lentes_marca_1">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputAddress">PD</label>
                                        <input type="text" class="form-control" id="inputAddress" placeholder="Tipo" name="lentes_pd_1">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputAddress">DNP</label>
                                        <input type="text" class="form-control" id="inputAddress" placeholder="Tipo" name="lentes_dnp_1">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputAddress">ALTURA</label>
                                        <input type="text" class="form-control" id="inputAddress" placeholder="Tipo" name="lentes_altura_1">
                                    </div>
                                </div>


                                        <div class="form-group">
                                            <h5 class="p-4">RECETA FINAL PARA CERCA</h5>
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">RX </th>
                                                            <th>ESFERA</th>
                                                            <th>CILINDRO</th>
                                                            <th>EJE</th>
                                                            <th>P/BASE △</th>
                                                            <th>AGUDEZA VISUAL</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-center">Ojo Derecho</td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="esfera_od" name="esfera_od_fc">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="cilindro_od" name="cilindro_od_fc">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="eje_od" name="eje_od_fc">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="p_base_od" name="p_base_od_fc" value="△">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="agz_od" name="agz_od_fc">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">Ojo Izquierdo</td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="esfera_oi" name="esfera_oi_fc">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="cilindro_oi" name="cilindro_oi_fc">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="eje_oi" name="eje_oi_fc">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="p_base_oi" name="p_base_oi_fc" value="△">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="agz_oi" name="agz_oi_fc">
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        
                                
                                        <div class="form-row mb-4">
                                    <div class="form-group col-md-6">
                                        <label for="inputAddress">TIPO DE LENTE</label>
                                        <input type="text" class="form-control" id="inputAddress" placeholder="Marca" name="lentes_marca_2">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputAddress">PD</label>
                                        <input type="text" class="form-control" id="inputAddress" placeholder="Tipo" name="lentes_pd_2">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputAddress">DNP</label>
                                        <input type="text" class="form-control" id="inputAddress" placeholder="Tipo" name="lentes_dnp_2">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputAddress">ALTURA</label>
                                        <input type="text" class="form-control" id="inputAddress" placeholder="Tipo" name="lentes_altura_2">
                                    </div>
                                </div>


                                <div class="form-row mb-4">
                                    <div class="form-group col-md-12">
                                        <label for="inputAddress">Ayudas Opticas Para Baja Visión</label>
                                        <textarea id="textarea" class="form-control textarea" maxlength="800" rows="5" placeholder="Esta área tiene un limite de 800 caracteres." name="ayudas_opticas"></textarea>
                                    </div>
                                </div>


                                <div class="form-row mb-4">
                                    <div class="form-group col-md-12">
                                        <label for="inputAddress">Ayudas No Opticas Para Baja Visión</label>
                                        <textarea id="textarea" class="form-control textarea" maxlength="800" rows="5" placeholder="Esta área tiene un limite de 800 caracteres." name="ayudas_no_opticas"></textarea>
                                    </div>
                                </div>


                                <div class="form-row mb-4">
                                    <div class="form-group col-md-12">
                                        <label for="inputAddress">Plan de Rehabilitación Visual</label>
                                        <textarea id="textarea" class="form-control textarea" maxlength="800" rows="5" placeholder="Esta área tiene un limite de 800 caracteres." name="plan_rehabilitacion"></textarea>
                                    </div>
                                </div>

                                

                                <input type="hidden" name="crear_baja_vision">
                                <?php if (isset($_GET['id_terapia'])) {  ?>
                                    <input type="hidden" name="id_terapia" value="<?php echo $_GET['id_terapia']; ?>">
                                <?php  } else { ?>
                                    <input type="hidden" name="id_terapia" value="0">
                                <?php } ?>
                                <input type="hidden" name="sucursal" value="<?php echo $_SESSION['sucursal']; ?>">
                                <input type="hidden" name="doctor" value="<?php echo $_SESSION['nombre']; ?>">
                                <button type="submit" class="btn btn-success mt-3">Guardar Consulta</button>
                                </form>
                                <?php

                                $crearConsulta = new ControladorConsultaBajaVision();
                                $crearConsulta->ctrCrearConsultaBajaVision();

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