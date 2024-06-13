    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" type="text/css" href="vistas/plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="vistas/plugins/table/datatable/dt-global_style.css">
    <!-- END PAGE LEVEL STYLES -->
<div class="admin-data-content" style="margin-top:50px;">
  <div class="row layout-top-spacing" >
    <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
        <div class="widget-content-area br-4">
            <div class="widget-one">
            <div class="row layout-top-spacing" id="cancel-row">
                
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                       <a class="btn btn-success mb-4 ml-3 mt-4" href="crear-receta">
                                 
                                 Agregar Receta
                                
                        </a>


                        <table id="zero-config" class="table dt-table-hover tablaSucursal" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nombres Paciente</th>
                                    <th>Doctor</th>
                                    <th>Fecha de creacion</th>
                                    <th class="text-center dt-no-sorting">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                              
                              $item = null;
                              $valor = null;
                              
                              $sucursales = ControladorRecetas::ctrMostrarRecetas($item, $valor);
                             
                         
                                
                              foreach ($sucursales as $key => $value) {


                                $item = 'id_paciente';
                                $valor = $value['id_paciente'];
                                
                                $paciente = ControladorPacientes::ctrMostrarPacientes($item, $valor);

                            
                             
                                                   
                               echo '<tr>
                              
                               <td>'.$paciente["nombres"].' '.$paciente['apellidos'].'</td>
                               <td>'.$value["doctor"].'</td>
                               <td>'.$value["fecha_creacion"].'</td>
                               <td>
                                 
                               <div class="btn-group">

                                  <button id_receta="'.$value['id_receta'].'" class="btnVerReceta btn btn-primary mb-2 p-1 mr-2 rounded-circle"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                  </svg></button>
                                
                                 <button class="btn btn-warning btnEditarReceta" id_receta="'.$value["id_receta"].'" data-toggle="modal" data-target="#modalEditarSucursal"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="modalEditarSucursal" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                 </svg></button>
                              
                   
                                 <button class="btn btn-danger btnEliminarReceta" borrar_receta="'.$value["id_receta"].'"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                 </svg></button>
                   
                               </div>  
                   
                               </td>

                              </tr>';

                              }

                          ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nombre Paciente</th>
                                    <th>Doctor</th>
                                    <th>Fecha de creacion</th>
                                  
                                    <th class="invisible"></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            
            </div>
            </div>
        </div>
    </div>
  </div>
</div>

                
<?php
   
   $borraReceta = new ControladorRecetas();
   $borraReceta -> ctrEliminarReceta();
 
 ?> 

 

                                    

 



 

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="vistas/plugins/table/datatable/datatables.js"></script>
    <script>
        $('#zero-config').DataTable({
            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
        "<'table-responsive'tr>" +
        "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7 
        });
    </script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <script src="vistas/js/recetas.js"></script>