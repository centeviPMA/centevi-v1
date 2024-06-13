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
                    <div class="form-row mb-4">
                      <div class="form-group col-md-12" style="display:flex;">
                        <a class="btn btn-success mb-4 ml-3 mt-4" href="crear-paciente">
                          Agregar Paciente
                        </a>
                        <input 
                          style="width: 50%; margin-top:16px" 
                          type="text" 
                          class="form-control txt-buscar-cedula"
                          placeholder="Buscar por Cedula" 
                          name=""
                        >
                      </div>
                    </div>


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
                            $pagina_seleccionada = 1;

                            // $pacientes = ControladorPacientes::ctrMostrarListadoPacientes($item, $valor);
                            $rpta_listado_pacientes_paginate = ControladorPacientes::ctrMostrarListadoPacientesPaginate($item, $valor, $pagina_seleccionada, "");
                            // echo json_encode($rpta_listado_pacientes_paginate, JSON_PRETTY_PRINT);
                            $pacientes = $rpta_listado_pacientes_paginate['data'];
                            
                            $total_datos = $rpta_listado_pacientes_paginate['total_datos']['total'];
                            $total_paginas = round($total_datos / 10);
                            

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






                    <div 
                      class="dt--bottom-section d-sm-flex justify-content-sm-between text-center"
                      style="float: right;"
                    >
                      <div class="dt--pagination">
                          <div class="dataTables_paginate paging_simple_numbers" id="zero-config_paginate">
                              <ul class="pagination">
                                  
                                
                                  
                              </ul>
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
    </div>
    </div>



    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="vistas/plugins/table/datatable/datatables.js"></script>
    <script>
      $('#zero-config-bk').DataTable({
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



  <script>
    $(document).ready(function() {

        function create_pagination(total_paginas, pagina_seleccionada_cpaginate) {
          var output = [];

          // Determinar los rangos de la paginación
          var range = 2; // Número de páginas a mostrar a cada lado de la página actual

          // Mostrar siempre las primeras 2 páginas y las últimas 2 páginas
          var start_pages = [];
          for (var i = 1; i <= Math.min(2, total_paginas); i++) {
              start_pages.push(i);
          }

          var end_pages = [];
          for (var i = Math.max(1, total_paginas - 1); i <= total_paginas; i++) {
              end_pages.push(i);
          }

          // Mostrar páginas alrededor de la página actual
          var middle_pages = [];
          for (var i = Math.max(1, pagina_seleccionada_cpaginate - range); i <= Math.min(total_paginas, pagina_seleccionada_cpaginate + range); i++) {
              middle_pages.push(i);
          }

          // Combinar los rangos de páginas en un solo array
          var pages = start_pages.concat(middle_pages).concat(end_pages);
          pages = [...new Set(pages)]; // Eliminar duplicados
          pages.sort(function(a, b) { return a - b; });

          // Agregar puntos suspensivos donde sea necesario
          var last_page = 0;
          pages.forEach(function(page) {
              if (last_page + 1 < page) {
                  output.push('...');
              }
              output.push(page);
              last_page = page;
          });

          return output;
        }

        var total_paginas = <?php echo $total_paginas ?>;
        var pagina_actual = <?php echo $pagina_seleccionada ?>;

        function ArmarPaginate(total_paginas, pagina_seleccionada) {
          $('.pagination').empty();
          var paginacion = create_pagination(total_paginas, pagina_seleccionada);
          
          var nrowafter = `<li data-index="antes" style="cursor:pointer" class="paginate_button page-item previous disabled paginate-item" id="zero-config_previous">
                                <a href="#" aria-controls="zero-config" data-dt-idx="0" tabindex="0" class="page-link">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left">
                                        <line x1="19" y1="12" x2="5" y2="12"></line>
                                        <polyline points="12 19 5 12 12 5"></polyline>
                                    </svg>
                                </a>
                            </li>`
          $('.pagination').append(nrowafter);

          paginacion.map((paginate, index) => {
            var row = '<li style="cursor:pointer" data-index="'+paginate+'" class="paginate_button page-item paginate-item paginan-'+paginate+'">';
            if(paginate == pagina_seleccionada){
              row = '<li style="cursor:pointer" data-index="'+paginate+'" class="paginate_button page-item active paginate-item paginan-'+paginate+'"">';
            }
            
            row += '<div href="#" aria-controls="zero-config" data-index="'+paginate+'" data-dt-idx="'+paginate+'" tabindex="0" class="page-link">'+paginate+'</div>';
            row += '</li>'
            $('.pagination').append(row);
          })


          var nrow = `<li data-index="siguiente" style="cursor:pointer" class="paginate_button page-item next paginate-item" id="zero-config_next">
              <div href="#" aria-controls="zero-config" data-dt-idx="8" tabindex="0" class="page-link">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right">
                      <line x1="5" y1="12" x2="19" y2="12"></line>
                      <polyline points="12 5 19 12 12 19"></polyline>
                  </svg>
              </div>
          </li>`
          $('.pagination').append(nrow);

          darClickPaginate()
        }

        ArmarPaginate(total_paginas, pagina_actual)
        darClickPaginate()
        
        function darClickPaginate(txt_buscar = "none") {
          $('.paginate-item').on('click', function(e) {
              e.preventDefault();
              var pageIndex = $(this).data('index');

              if(pageIndex == "antes" || pageIndex == "siguiente"){
                if(pageIndex == "antes"){
                  if(pagina_actual > 1){
                    pagina_actual =  pagina_actual - 1
                  }
                }else {
                  
                  pagina_actual = pagina_actual + 1
                  
                }

                pageIndex = pagina_actual
              }else{
                $('.pagination li').removeClass('active');
                $(this).addClass('active');
                pagina_actual =pageIndex
              }
              
              obtenerDataTabla(pageIndex, txt_buscar)

              
              
          });
        }

        function obtenerDataTabla(pageIndex, txt_buscar) {
          $.ajax({
            url: 'funcionesphp-lista',
            type: 'POST',
            dataType: 'json',
            data: {'page': pageIndex, 'txt_buscar': txt_buscar},
            success: function(response) {
              $('#zero-config tbody').empty();

              response.data.forEach(function(paciente) {
                var row = '<tr>';
                row += '<td>' + paciente.nombres + ' '+paciente.apellidos+'</td>';
                row += '<td>' + paciente.nro_cedula + '</td>';
                row += '<td>' + paciente.direccion + '</td>';
                row += '<td>' + paciente.fecha_creacion + '</td>';
                row += '<td>';
                row += '<div class="btn-group">';
                row += '<button class="btn btn-primary btnVerHistoria" id_paciente="' + paciente.id_paciente + '" data-toggle="modal" data-target="#modalEditarUsuario"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">';
                row += '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />';
                row += '</svg></button>';
                row += '<button class="btn btn-warning btnEditarPaciente" id_paciente="' + paciente.id_paciente + '" data-toggle="modal" data-target="#modalEditarUsuario"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">';
                row += '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />';
                row += '</svg></button>';

                const session_perfil_php = "<?php echo $_SESSION['perfil']; ?>";

                if(session_perfil_php == "Administrador" || session_perfil_php == "superadministrador" || session_perfil_php == "doctor") {
                  row += '<button class="btn btn-danger btnEliminarPaciente" borrar_paciente="' +paciente.id_paciente+ '"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">';
                  row += '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />';
                  row += '</svg></button>'; 
                }                  

                row += '</div></td>';
                row += '</tr>';
                $('#zero-config tbody').append(row);
              });

                let total_datos = response['total_datos']['total'];
                total_paginas = Math.round(total_datos / 10);
                ArmarPaginate(total_paginas, pageIndex)
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
          });
        }

        $('.txt-buscar-cedula').on('keyup', function(){
          let txt_buscar = $(this).val();
          
          obtenerDataTabla(1, txt_buscar)
        })
    });
</script>
    <!-- END PAGE LEVEL SCRIPTS -->