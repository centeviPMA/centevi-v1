<style>
  .dashboard {
    // background: rgba(203,203,210,.15);
    background: #eef1f5;
    font-family: Quicksand;

    .all-card {
      padding: 30px;
    }

    .card {
      border-radius: 6px;
      border: 1px solid rgba(0, 0, 0, .05);
      background-color: #fff;
      margin-bottom: 30px;
      box-shadow: 0 .15rem 1.75rem 0 rgba(58, 59, 69, .15);

      .border-left-pink {
        border-left: 4px solid #f5365c;
      }

      .border-left-orange {
        border-left: 4px solid #fb6340;
      }

      .border-left-yellow {
        border-left: 4px solid #ffd600;
      }

      .border-left-blue {
        border-left: 4px solid #11cdef;
      }

      .text-title {
        color: #8898aa;
        font-weight: 500;
        font-size: 14px;
      }

      .text-amount {
        font-weight: 600;
      }

      .icon-shape {
        border-radius: 50%;
        color: #fff;
        width: 50px;
        height: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 25px;
        box-shadow: 0 0 2rem 0 rgba(136, 152, 170, .15) !important;
      }

      .icon-area {
        background: #f5365c;
      }

      .icon-pie {
        background: #fb6340;
      }

      .icon-user {
        background: #ffd600;
      }

      .icon-percent {
        background: #11cdef;
      }
    }

    .chart {
      padding: 30px;
    }
  }

  @media (min-width: 992px) and (max-width: 1300px) {
    .dashboard .card {
      .text-title {
        font-size: 12px;
      }

      .text-amount {
        font-size: 18px;
      }

      .icon-shape {
        width: 35px;
        height: 35px;
        font-size: 20px;
      }
    }
  }

  @media (max-width: 360px) {
    .icon-shape {
      display: none !important;
    }
  }
</style>

<link rel="stylesheet" type="text/css" href="vistas/assets/css/widgets/modules-widgets.css">
<link href="vistas/plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="vistas/plugins/table/datatable/datatables.css">
<link rel="stylesheet" type="text/css" href="vistas/plugins/table/datatable/dt-global_style.css">
<link rel="stylesheet" type="text/css" href="vistas/plugins/table/datatable/custom_dt_html5.css">

<!-- Incluye jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Incluye Moment.js -->
<script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

<!-- Incluye DateRangePicker CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<!-- Incluye DateRangePicker JavaScript -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>


<div class="admin-data-content" style="margin-top:50px;">
  <div class="row layout-top-spacing">
    <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
      <div class="widget-content-area br-4">
        <div class="widget-one">
          <div class="row">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
              <div class="widget widget-one">
                <div class="widget-heading">
                  <h6 class="">Reporte de pacientes última atención</h6>
                </div>
                <div class="w-chart">

                  <?php


                  $item = 'id_paciente';
                  $valor = 'id_paciente';

                  $pacientes = ControladorReportes::ctrMostrarCantidadPacientes($item, $valor);


                  // var_dump($pacientes);


                  $item2 = null;
                  $valor2 = null;

                  $pacientes2 = ControladorReportes::ctrMostrarCantidadPacientesMenores($item2, $valor2);

                  //  echo '<pre>';
                  // var_dump($pacientes2);
                  // echo '</pre>'

                  $cantidadPacientesMenores = 0;
                  $cantidadPacientesMayores = 0;

                  foreach ($pacientes2 as $key => $value) {



                    $nacimiento = new DateTime($value['fecha']);
                    $ahora = new DateTime(date("Y-m-d"));
                    $diferencia = $ahora->diff($nacimiento);


                    $edadString =  $diferencia->format("%y");

                    $edad = (int) $edadString;



                    // var_dump($edad);


                    if ($edad <= 18) {

                      $cantidadPacientesMenores = $cantidadPacientesMenores + 1;
                    } else {
                      $cantidadPacientesMayores = $cantidadPacientesMayores + 1;
                    }

                    //  var_dump($cantidadPacientesMenores);

                  }



                  ?>



                </div>
              </div>
            </div>
          </div>

          <div class="all-card">
            <div class="row">
              <div class="col-lg-3 col-md-6">
                <div class="widget widget-one_hybrid widget-referral">
                  <div class="widget-heading">
                    <div class="w-title">
                      <div class="w-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                          <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                          <circle cx="9" cy="7" r="4"></circle>
                          <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                          <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                      </div>
                      <div class="">
                        <p class="w-value"><?php echo $pacientes['cantidad']; ?></p>
                        <h5 class="">PACIENTES</h5>
                      </div>
                    </div>
                  </div>
                  <div class="widget-content">
                    <div class="w-chart">
                      <!-- <div id="hybrid_followers"></div> -->
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>




          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
              <div class="widget-four">
                <div class="widget-heading">
                  <h5 class="">ULTIMOS PACIENTES</h5>
                </div>

                <div class="table-responsive">
                  <table class="table dt-table-hover tabla_pacientes" style="width:100%">
                    <thead>
                      <tr>
                        <th>Nombres de Paciente</th>
                        <th>Cedula</th>
                        <th>Email</th>
                        <th>Celular</th>
                        <th>Dirección</th>
                        <th>Fecha de última atención</th>
                        <th>Doctor</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php

                      $valor = 6;

                      $ultimosPacientes = ControladorReportes::ctrMostrarUltimaAtencionPacientes($valor, $fecha=null);



                      foreach ($ultimosPacientes as $key => $value) {




                        echo '<tr>
                                                  
                                                  
                                                   <td>' . $value["nombres"] . ' ' . $value["apellidos"] . '</td>
                                                   <td>' . $value["nro_cedula"] . '</td>
                                                   <td>' . $value["email"] . '</td>
                                                   <td>' . $value["celular"] . '</td>
                                                    <td>' . $value["direccion"] . '</td>
                                                   <td>' . $value["ultima_atencion"] . '</td>
                                                    <td>' . $value["doctores"] . '</td
                    
                                                  </tr>';
                      }

                      ?>
                    </tbody>
                  </table>


                </div>






              </div>
            </div>
             <!-- 
            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 layout-spacing">
              <div class="widget widget-chart-two">
                <div class="widget-heading">
                  <h5 class="">CANTIDAD DE CONSULTAS</h5>
                </div>
                <div class="widget-content">
                  <div id="cantidad-consultas" class=""></div>
                </div>
              </div>

            </div>
            -->
          </div>
          <!-- FILA DE ULTIMOS PACIENTES Y CHART CONSULTAS -->

          <div class="col-md-12">
 
            <div class="form-group col-md-4 mt-4">
                <label>Buscar por Fecha:</label>
                <input type="text" id="fecha_reporte" class="form-control" name="fecha">
                <button type="button" id="buscar" class="btn btn-success mt-3">BUSCAR</button>
            </div>


            <div class="table-responsive">
              <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                <thead>
                  <tr>
                        <th>Nombres de Paciente</th>
                        <th>Cedula</th>
                        <th>Email</th>
                        <th>Celular</th>
                        <th>Dirección</th>
                        <th>Fecha de última atención</th>
                        <th>Doctor</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  if (isset($_GET['fecha_reporte'])) {
                    $fecha =  $_GET['fecha_reporte'];
                  } else {
                    $fecha = null;
                  }


                  $ultimosPacientes = ControladorReportes::ctrMostrarUltimaAtencionPacientes($valor=null, $fecha);


                    foreach ($ultimosPacientes as $key => $value2) {

                      echo '<tr>
                                                         <td>' . $value2["nombres"] . ' ' . $value2["apellidos"] . '</td>
                                                           <td>' . $value2["nro_cedula"] . '</td>
                                                           <td>' . $value2["email"] . '</td>
                                                           <td>' . $value2["celular"] . '</td>
                                                            <td>' . $value2["direccion"] . '</td>
                                                           <td>' . $value2["ultima_atencion"] . '</td>
                                                            <td>' . $value2["doctores"] . '</td>
                    
                                                        </tr>';
                    }
                  
                  ?>
                </tbody>
              </table>


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


<script src="vistas/plugins/apex/apexcharts.min.js"></script>
<script src="vistas/assets/js/widgets/modules-widgets.js"></script>
<script src="vistas/plugins/table/datatable/datatables.js"></script>

<script>
    $(document).ready(function () {
        // Inicializa el daterangepicker sin la opción singleDatePicker
        $('#fecha_reporte').daterangepicker({
            locale: {
                format: 'YYYY-MM-DD', // Puedes ajustar el formato de fecha según tus necesidades
            }
        });

        // Asocia el evento click al botón de buscar
        $("#buscar").on("click", function() {
            var fecha_reporte = $('#fecha_reporte').val();

            if (fecha_reporte === "") {
                swal({
                    type: "error",
                    title: "¡La fecha está vacía! Seleccione una para mostrar el reporte.",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                }).then(function(result) {
                    if (result.value) {
                        window.location = "index.php?ruta=reporte-pacientes-ultima-atencion";
                    }
                });
            } else {
                window.location = "index.php?ruta=reporte-pacientes-ultima-atencion&fecha_reporte=" + fecha_reporte;
            }
        });
    });
</script>


<script>
  $("#buscar").on("click", function() {

    var fecha_reporte = $('#fecha_reporte').val();


    if (fecha_reporte === "") {


      swal({
        type: "error",
        title: "¡La fecha esta vacía seleccione una, para mostrar el reporte!",
        showConfirmButton: true,
        confirmButtonText: "Cerrar"
      }).then(function(result) {
        if (result.value) {

          window.location = "index.php?ruta=reporte-pacientes-ultima-atencion";

        }
      })

    } else {

      window.location = "index.php?ruta=reporte-pacientes-ultima-atencion&fecha_reporte=" + fecha_reporte;

    }


  });

  var options = {
    chart: {
      type: 'donut',
      width: 480
    },
    colors: ['#2196f3', '#e2a03f', '#8738a7', '#117864'],
    dataLabels: {
      enabled: false
    },
    legend: {
      position: 'bottom',
      horizontalAlign: 'center',
      fontSize: '14px',
      markers: {
        width: 10,
        height: 10,
      },
      itemMargin: {
        horizontal: 0,
        vertical: 8
      }
    },
    plotOptions: {
      pie: {
        donut: {
          size: '65%',
          background: 'transparent',
          labels: {
            show: false,
            name: {
              show: true,
              fontSize: '28px',
              fontFamily: 'Nunito, sans-serif',
              color: undefined,
              offsetY: -10
            },
            value: {
              show: false,
              fontSize: '26px',
              fontFamily: 'Nunito, sans-serif',
              color: '20',
              offsetY: 16,
              formatter: function(val) {
                return val
              }
            },
            total: {
              show: true,
              showAlways: true,
              label: 'Total',
              color: '#888ea8',
              formatter: function(w) {
                return w.globals.seriesTotals.reduce(function(a, b) {
                  return a + b
                }, 0)
              }
            }
          }
        }
      }
    },
    stroke: {
      show: true,
      width: 25,
    },

    <?php
    $item = null;
    $valor = null;

    $cantidadBV = ControladorReportes::ctrMostrarCantidadBajaVision($item, $valor);


    $itemON = null;
    $valorON = null;

    $cantidadON = ControladorReportes::ctrMostrarCantidadOptometriaNeonatos($itemON, $valorON);


    $itemOP = null;
    $valorOP = null;

    $cantidadOP = ControladorReportes::ctrMostrarCantidadOptometriaPediatrica($itemOP, $valorOP);

    $itemOA = null;
    $valorOA = null;

    $cantidadOA = ControladorReportes::ctrMostrarCantidadOptometriaPediatrica($itemOA, $valorOA);




    ?>

    series: [<?php echo $cantidadBV['cantidad']; ?>, <?php echo $cantidadON['cantidad']; ?>, <?php echo $cantidadOP['cantidad']; ?>, <?php echo $cantidadOA['cantidad']; ?>],
    labels: ['Baja Vision', 'Optometría Neonatos', 'Optometria Pediatrica', 'Ortoptica Adultos', ],
    responsive: [{
      breakpoint: 1599,
      options: {
        chart: {
          width: '350px',
          height: '400px'
        },
        legend: {
          position: 'bottom'
        }
      },

      breakpoint: 1439,
      options: {
        chart: {
          width: '250px',
          height: '490px'
        },
        legend: {
          position: 'bottom'
        },
        plotOptions: {
          pie: {
            donut: {
              size: '65%',
            }
          }
        }
      },
    }]
  }

  var chart = new ApexCharts(
    document.querySelector("#cantidad-consultas"),
    options
  );

  chart.render();
</script>

<script src="vistas/plugins/table/datatable/button-ext/dataTables.buttons.min.js"></script>
<script src="vistas/plugins/table/datatable/button-ext/jszip.min.js"></script>
<script src="vistas/plugins/table/datatable/button-ext/buttons.html5.min.js"></script>
<script src="vistas/plugins/table/datatable/button-ext/buttons.print.min.js"></script>
<script>
  $('#html5-extension').DataTable({
    "dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
      "<'table-responsive'tr>" +
      "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
    buttons: {
      buttons: [{
          extend: 'copy',
          className: 'btn btn-sm'
        },
        {
          extend: 'csv',
          className: 'btn btn-sm'
        },
        {
          extend: 'excel',
          className: 'btn btn-sm'
        },
        {
          extend: 'print',
          className: 'btn btn-sm'
        }
      ]
    },
    "oLanguage": {
      "oPaginate": {
        "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
        "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
      },
      "sInfo": "Showing page _PAGE_ of _PAGES_",
      "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
      "sSearchPlaceholder": "Search...",
      "sLengthMenu": "Results :  _MENU_",
    },
    "stripeClasses": [],
    "lengthMenu": [7, 10, 20, 50],
    "pageLength": 20
  });
</script>