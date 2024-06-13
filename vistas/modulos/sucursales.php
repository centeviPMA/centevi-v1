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
                       <button class="btn btn-success mb-4 ml-3 mt-4" data-toggle="modal" data-target="#modalAgregarSursal">
                                 
                                 Agregar Sucursal
                                
                        </button>


                        <table id="zero-config" class="table dt-table-hover tablaSucursal" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nombre Sucursal</th>
                                    <th>Ubicacion</th>
                                    <th>Fecha de creacion</th>
                                    <th class="text-center dt-no-sorting">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                              
                              $item = null;
                              $valor = null;
                              
                              $sucursales = ControladorSucursales::ctrMostrarSurcursales($item, $valor);
                             
                         
                                
                              foreach ($sucursales as $key => $value) {

                            
                             
                                                   
                               echo '<tr>
                              
                               <td>'.$value["nombre"].'</td>
                               <td>'.$value["ubicacion"].'</td>
                               <td>'.$value["fecha_creacion"].'</td>
                               <td>
                                 
                               <div class="btn-group">
                                
                                 <button class="btn btn-warning btnEditarSucursal" id_sucursal="'.$value["id_sucursal"].'" data-toggle="modal" data-target="#modalEditarSucursal"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="modalEditarSucursal" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                 </svg></button>
                              
                   
                                 <button class="btn btn-danger btnEliminarSucursal" borrar_sucursal="'.$value["id_sucursal"].'"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
                                    <th>Nombre Sucursal</th>
                                    <th>Ubicacion</th>
                                    <th>Estado</th>
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
   
   $borraSucursal = new ControladorSucursales();
   $borraSucursal -> ctrEliminarSucursal();
 
 ?> 

 <!--=====================================
   MODAL AGREGAR SUCURSAL
   ======================================-->
   
   <div id="modalAgregarSursal" class="modal fade" role="dialog">
     
     <div class="modal-dialog">
   
       <div class="modal-content">
   
         <form role="form" method="post">
   
           <!--=====================================
           CABEZA DEL MODAL
           ======================================-->
   
           <div class="modal-header" style="background:#1abc9c; color:white">
   
             <button type="button" class="close" data-dismiss="modal">&times;</button>
   
             <h4 class="modal-title">Agregar Sucursal</h4>
   
           </div>
   
           <!--=====================================
           CUERPO DEL MODAL
           ======================================-->
   
           <div class="modal-body">
   
             <div class="box-body">
   
               <!-- ENTRADA PARA EL NOMBRE -->
               
               <div class="form-group">
                 
                 <div class="input-group">
                 
                   <span class="input-group-addon"><i class="fa fa-user"></i></span> 
   
                   <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre" required>
   
                 </div>
   
               </div>
   
               <!-- ENTRADA PARA EL USUARIO -->
   
                <div class="form-group">
                 
                 <div class="input-group">
                 
                   <span class="input-group-addon"><i class="fa fa-key"></i></span> 
   
                   <input type="text" class="form-control input-lg" name="nuevaUbicacion" placeholder="Ingresar Ubicación" id="nuevaUbicacion" required>
   
                 </div>
   
               </div>
   
               <!-- ENTRADA PARA LA CONTRASEÑA -->
   
                <!-- <div class="form-group">
                 
                 <div class="input-group">
                 
                   <span class="input-group-addon"><i class="fa fa-lock"></i></span> 
   
                    <select  class="form-control" name="nuevoEstado" id="nuevoEstado">
                       <option value="">Seleccione un estado</option>
                       <option value="activo">Activo</option>
                       <option value="suspencion">Suspencion</option>
                       <option value="falla">Falla</option>
                     </select>
                  </div>
                </div> -->
           </div>
   
           <!--=====================================
           PIE DEL MODAL
           ======================================-->
   
           <div class="modal-footer">

              <input type="hidden" name="crear_sucursal" value="crear"> 
   
             <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
   
             <button type="submit" class="btn btn-success">Guardar Sucursal</button>
   
           </div>
   
           <?php
   
             $crearSucursal = new ControladorSucursales();
             $crearSucursal -> ctrCrearSucursal();
   
           ?>
   
         </form>
   
       </div>
   
     </div>
   
     </div>
   </div>




    <!--=====================================
   MODAL AGREGAR SUCURSAL
   ======================================-->
   
   <div id="modalEditarSucursal" class="modal fade" role="dialog">
     
     <div class="modal-dialog">
   
       <div class="modal-content">
   
         <form role="form" method="post">
   
           <!--=====================================
           CABEZA DEL MODAL
           ======================================-->
   
           <div class="modal-header" style="background:#1abc9c; color:white">
   
             <button type="button" class="close" data-dismiss="modal">&times;</button>
   
             <h4 class="modal-title">Editar Sucursal</h4>
   
           </div>
   
           <!--=====================================
           CUERPO DEL MODAL
           ======================================-->
   
           <div class="modal-body">
   
             <div class="box-body">
   
               <!-- ENTRADA PARA EL NOMBRE -->
               
               <div class="form-group">
                 
                 <div class="input-group">
                 
                   <span class="input-group-addon"><i class="fa fa-user"></i></span> 
   
                   <input type="text" class="form-control input-lg" name="editarNombre" id="editarNombre" placeholder="Ingresar nombre" required>
   
                 </div>
   
               </div>
   
               <!-- ENTRADA PARA EL USUARIO -->
   
                <div class="form-group">
                 
                 <div class="input-group">
                 
                   <span class="input-group-addon"><i class="fa fa-key"></i></span> 
   
                   <input type="text" class="form-control input-lg" name="editarUbicacion" placeholder="Ingresar Ubicación" id="editarUbicacion" required>
   
                 </div>
   
               </div>
   
               <!-- ENTRADA PARA LA CONTRASEÑA -->
   
                <!-- <div class="form-group">
                 
                 <div class="input-group">
                 
                   <span class="input-group-addon"><i class="fa fa-lock"></i></span> 
   
                    <select  class="form-control" name="editarEstado" id="editarEstado">
                       <option value="">Seleccione un estado</option>
                       <option value="activo">Activo</option>
                       <option value="suspencion">Suspencion</option>
                       <option value="falla">Falla</option>
                     </select>
                  </div>
                </div> -->
           </div>
   
           <!--=====================================
           PIE DEL MODAL
           ======================================-->
   
           <div class="modal-footer">

              <input type="hidden" name="editar_sucursal" value="editar"> 

              <input type="hidden" name="actualizar" value="exito"> 

              <input type="hidden" name="id_sucursal" id="id_sucursal" value=""> 
    
             <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
   
             <button type="submit" class="btn btn-success">Guardar Sucursal</button>
   
           </div>
   
           <?php
   
             $editarSucursal = new ControladorSucursales();
             $editarSucursal -> ctrEditarSucursales();
   
           ?>
   
         </form>
   
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
    <script src="vistas/js/sucursales.js"></script>