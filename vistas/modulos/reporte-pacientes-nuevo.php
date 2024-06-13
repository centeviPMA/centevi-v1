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
                  $pacientesSinAtender = ControladorReportes::ctrMostrarCantidadPacientesSinAtender();
                  $todosLosPacientesSinAtender = ControladorReportes::ctrMostrarTodosLosPacientesSinAtender();


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
              <div class="col-lg-3 col-md-6">
                <div class="widget widget-one_hybrid widget-engagement">
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
                        <p class="w-value"><?php echo $pacientesSinAtender['cantidad_pacientes_no_atendidos']; ?></p>
                        <h5 class="">PACIENTES SIN ATENDER</h5>
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
              <!-- <div class="col-lg-3 col-md-6">
                <div class="widget widget-one_hybrid widget-followers">
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
                        <p class="w-value"><?php echo $cantidadPacientesMayores; ?></p>
                        <h5 class="">PACIENTES ADULTOS</h5>
                      </div>
                    </div>
                  </div>
                  <div class="widget-content">
                    <div class="w-chart">
                      <div id="hybrid_followers"></div>
                    </div>
                  </div>
                </div>
              </div> -->

              <?php


              $item =  null;
              $valor = null;

              $cantidadDoctores = 0;

              $pacientes = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

              foreach ($pacientes as $key => $value) {

                if ($value['perfil'] == 'doctor') {

                  $cantidadDoctores = $cantidadDoctores + 1;
                }
              }


              ?>
              <!-- <div class="col-lg-3 col-md-6">
                <div class="widget widget-one_hybrid widget-followers">
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
                        <p class="w-value"><?php echo $cantidadDoctores; ?></p>
                        <h5 class="">Doctores</h5>
                      </div>
                    </div>
                  </div>
                  <div class="widget-content">
                    <div class="w-chart">
                       <div id="hybrid_followers"></div>
                    </div>
                  </div>
                </div>
              </div>-->
            </div>
          </div>




          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
              <div class="widget-four">
                <div class="widget-heading">
                  <h5 class="">Listado de pacientes sin atención</h5>
                </div>

                <div class="table-responsive">
                  <table class="table dt-table-hover tabla_pacientes" style="width:100%">
                    <thead>
                      <tr>
                        <th>Nombres de Paciente</th>
                        <th>Cedula</th>
                        <th>Email</th>
                        <th>Celular</th>

                      </tr>
                    </thead>
                       <tbody>
                            <?php foreach ($pacientesSinAtender['lista_pacientes_sin_atender'] as $paciente): ?>
                                <tr>
                                    <td><?php echo $paciente['nombres'] . ' ' . $paciente['apellidos']; ?></td>
                                    <td><?php echo $paciente['nro_cedula']; ?></td>
                                    <td><?php echo $paciente['email']; ?></td>
                                    <td><?php echo $paciente['celular']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>

                  </table>


                </div>






              </div>
            </div>
          </div>
          <!-- FILA DE ULTIMOS PACIENTES Y CHART CONSULTAS -->

          <div class="col-md-12">
 
            <!-- <div class="form-group col-md-4 mt-4">
              <label>Buscar por Fecha:</label>
                  <input type="date" id="fecha_reporte" class="form-control" name="fecha"> 
                <input type="text" class="form-control" placeholder='Selecciona la fecha' name="daterange" value="" />

              <button type="submit" id="search" class="btn btn-success mt-3">BUSCAR</button>

            </div>-->
            
            <div class="form-group col-md-4 mt-4">
               <h5 class="">Exportación de datos</h5>
            </div>

            <div class="table-responsive">
              <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                <thead>
                  <tr>
                    <th>Nombres de Paciente</th>
                    <th>Cedula</th>
                    <th>Email</th>
                    <th>Celular</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php

                  if (isset($_GET['fecha_reporte'])) {

                    $item = 'fecha_creacion';
                    $valor =  $_GET['fecha_reporte'];

                  } else {

                    $item = null;
                    $valor = null;
                  }

                  ?>
                    <?php foreach ($todosLosPacientesSinAtender as $paciente): ?>
                                <tr>
                                    <td><?php echo $paciente['nombres'] . ' ' . $paciente['apellidos']; ?></td>
                                    <td><?php echo $paciente['nro_cedula']; ?></td>
                                    <td><?php echo $paciente['email']; ?></td>
                                    <td><?php echo $paciente['celular']; ?></td>
                                </tr>
                            <?php endforeach; ?>
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

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<script src="vistas/plugins/apex/apexcharts.min.js"></script>
<script src="vistas/assets/js/widgets/modules-widgets.js"></script>
<script src="vistas/plugins/table/datatable/datatables.js"></script>

<script>

    
    $(function() {
      $('input[name="daterange"]').daterangepicker({
        opens: 'left'
      }, function(start, end, label) {
        console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
      });
      $('input[name="daterange"]').val('');
    });
    
    $("#search").on("click", function() {
        var fecha_reporte = $('input[name="daterange"]').val();

        $.ajax({
            type: "POST",
            url: "ajax/reportes.ajax.php",
            data: {
                fecha_reporte: fecha_reporte,
            },
          success: function(response) {
            try {
                var datos = JSON.parse(response);
                // Lógica para reemplazar la tabla con los nuevos datos
                actualizarTabla(datos);
                console.log(datos);
            } catch (error) {
                console.error("Error al procesar la respuesta del servidor:", error);
            }
        },
                    error: function(xhr, status, error) {
                console.error("Error en la solicitud AJAX:", status, error);
            }
        });
    });
    
    function actualizarTabla(datos) {
    var tbody = $("#html5-extension tbody");
    tbody.empty(); // Limpiar el contenido actual de la tabla

    // Iterar sobre los nuevos datos y agregar filas a la tabla
    datos.forEach(function(paciente) {
        var fila = `<tr>
                        <td>${paciente.nombres} ${paciente.apellidos}</td>
                        <td>${paciente.nro_cedula}</td>
                        <td>${paciente.email}</td>
                        <td>${paciente.celular}</td>
                    </tr>`;
        tbody.append(fila);
    });
}

  /*$("#buscar").on("click", function() {

    var fecha_reporte = $('#fecha_reporte').val();


    if (fecha_reporte === "") {


      swal({
        type: "error",
        title: "¡La fecha esta vacía seleccione una, para mostrar el reporte!",
        showConfirmButton: true,
        confirmButtonText: "Cerrar"
      }).then(function(result) {
        if (result.value) {

          window.location = "index.php?ruta=reporte-pacientes-sin-atencion";

        }
      })

    } else {

      window.location = "index.php?ruta=reporte-pacientes-sin-atencion&fecha_reporte=" + fecha_reporte;

    }


  });*/

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
    "pageLength": 7
  }).on('page.dt', function () {
  // Captura el evento de cambio de página y realiza la búsqueda nuevamente
 var fecha_reporte = $('input[name="daterange"]').val();

        $.ajax({
            type: "POST",
            url: "ajax/reportes.ajax.php",
            data: {
                fecha_reporte: fecha_reporte,
                start: $('#html5-extension').DataTable().page.info().start,
                length: $('#html5-extension').DataTable().page.info().length
            },
            success: function (response) {
                try {
                    var datos = JSON.parse(response);
                    actualizarTabla(datos);
                } catch (error) {
                    console.error("Error al procesar la respuesta del servidor:", error);
                }
            },
            error: function (xhr, status, error) {
                console.error("Error en la solicitud AJAX:", status, error);
            }
        });
});
</script>