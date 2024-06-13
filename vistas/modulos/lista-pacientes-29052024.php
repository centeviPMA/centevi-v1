    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" type="text/css" href="vistas/plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="vistas/plugins/table/datatable/dt-global_style.css">
    <!-- END PAGE LEVEL STYLES -->

    <div class="admin-data-content" style="margin-top:50px;">
      <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
          <div class="widget-content-area br-4">
            <div class="widget-one">
              <div class="row layout-top-spacing" id="cancel-row">

                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                  <div class="widget-content widget-content-area br-6">
                    <a class="btn btn-success mb-4 ml-3 mt-4" href="crear-paciente">

                      Agregar Paciente

                    </a>


                    <div class="table-responsive">
                      <table id="zero-config" class="table dt-table-hover tabla_pacientes" style="width:100%">
                        <thead>
                          <tr>
                            <th>Nombres de Paciente</th>
                            <th>Cedula</th>
                            <th>Direccion</th>
                            <th>Fecha de creacion</th>
                            <th class="text-center dt-no-sorting">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php

                          if ($_SESSION['perfil'] == 'gestor' || $_SESSION['perfil'] == 'superadministrador' || $_SESSION['perfil'] == 'doctor') {

                            $item = null;
                            $valor = null;

                            $pacientes = ControladorPacientes::ctrMostrarListadoPacientes($item, $valor);
                          } else if ($_SESSION['perfil'] == 'Administrador') {

                            $item = null;
                            $valor = null;
                            $item2 = 'sucursal';
                            $valor2 = $_SESSION['sucursal'];

                            $pacientes = ControladorPacientes::ctrMostrarListadoPacientesSucursal($item, $item2, $valor, $valor2);

                            
                          }
                          
                          foreach ($pacientes as $key => $value) {




                            echo '<tr>
                              
                              
                               <td>' . $value["nombres"] . ' ' . $value["apellidos"] . '</td>
                               <td>' . $value["nro_cedula"] . '</td>
                               <td>' . $value["direccion"] . '</td>
                               <td>' . $value["fecha_creacion"] . '</td>
                               <td>
                                 
                               <div class="btn-group">
                              
                               <button class="btn btn-primary btnVerHistoria" id_paciente="' . $value["id_paciente"] . '" data-toggle="modal" data-target="#modalEditarUsuario"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                               </svg></button>

                               <button class="btn btn-warning btnEditarPaciente" id_paciente="' . $value["id_paciente"] . '" data-toggle="modal" data-target="#modalEditarUsuario"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                               </svg></button>

                               
                               ';

                            if ($_SESSION['perfil'] == 'Administrador' || $_SESSION['perfil'] == 'superadministrador' || $_SESSION['perfil'] == 'doctor') {


                              echo '                  
                                 <button class="btn btn-danger btnEliminarPaciente" borrar_paciente="' . $value["id_paciente"] . '"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                               </svg></button>';
                            }
                            echo '</div>  
                   
                               </td>

                              </tr>';
                          }

                          ?>
                        </tbody>
                        <tfoot>
                          <tr>
                            <th>Nombres de Paciente</th>
                            <th>Cedula</th>
                            <th>Direccion</th>
                            <th>Fecha de creacion</th>
                            <th class="text-center dt-no-sorting">Action</th>
                          </tr>
                        </tfoot>
                      </table>

                      <?php

                      $borrarPaciente = new ControladorPacientes();
                      $borrarPaciente->ctrEliminarPaciente();

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
    </div>



    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="vistas/plugins/table/datatable/datatables.js"></script>
    <script>
      $('#zero-config').DataTable({
        "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
          "<'table-responsive'tr>" +
          "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
        "oLanguage": {
          "oPaginate": {
            "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
            "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
          },
          "sInfo": "Showing page _PAGE_ of _PAGES_",
          "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
          "sSearchPlaceholder": "Buscar cedula",
          "sLengthMenu": "Resultados :  _MENU_",
        },
        "stripeClasses": [],
        //"lengthMenu": [7, 10, 20, 50],
        //"pageLength": 7
      });
    </script>
    <!-- END PAGE LEVEL SCRIPTS -->