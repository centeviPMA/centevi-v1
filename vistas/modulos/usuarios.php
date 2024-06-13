<?php

if($_SESSION["perfil"] == 'gestor'){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

?>
    
    
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
                       <button class="btn btn-success mt-3 ml-4" data-toggle="modal" data-target="#modalAgregarUsuario">
          
                         Agregar usuario

                        </button>

                        <div class="table-responsive">
                          <table id="zero-config" class="table dt-table-hover tablas" style="width:100%">
                          <thead>
                                        <tr>
                                        <th style="width:10px">#</th>
                                        <th>Nombre</th>
                                        <th>Usuario</th>
                                        <th>Foto</th>
                                        <th>Perfil</th>
                                        <th>Estado</th>
                                        <th>Último login</th>
                                        <th>Acciones</th>

                                        </tr>
                           </thead>
                                    <tbody>

                                 <?php
                                 
                                 $item = null;
                                 $valor = null;
                                 
                                 $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
                                 
                                 foreach ($usuarios as $key => $value){
                                  
                                   echo ' <tr>
                                           <td>'.($key+1).'</td>
                                           <td>'.$value["nombre"].'</td>
                                           <td>'.$value["usuario"].'</td>';
                                 
                                           if($value["foto"] != ""){
                                 
                                             echo '<td><img src="'.$value["foto"].'" class="img-thumbnail" width="40px"></td>';
                                 
                                           }else{
                                 
                                             echo '<td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>';
                                 
                                           }
                                 
                                           echo '<td>'.$value["perfil"].'</td>';
                                 
                                           if($value["estado"] != 0){
                                 
                                             echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$value["id_usuario"].'" estadoUsuario="0">Activado</button></td>';
                                 
                                           }else{
                                 
                                             echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="'.$value["id_usuario"].'" estadoUsuario="1">Desactivado</button></td>';
                                 
                                           }             
                                 
                                           echo '<td>'.$value["ultimo_login"].'</td>
                                           <td>
                                 
                                             <div class="btn-group">
                                                 
                                               <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value["id_usuario"].'" data-toggle="modal" data-target="#modalEditarUsuario"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                             </svg></button>
                                 
                                               <button class="btn btn-danger btnEliminarUsuario" idUsuario="'.$value["id_usuario"].'" fotoUsuario="'.$value["foto"].'" usuario="'.$value["usuario"].'"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
                                     <th style="width:10px">#</th>
                                     <th>Nombre</th>
                                     <th>Usuario</th>
                                     <th>Foto</th>
                                     <th>Perfil</th>
                                     <th>Estado</th>
                                     <th>Último login</th>
                                     <th>Acciones</th>

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
</div>


  <!--=====================================
   MODAL AGREGAR USUARIO
   ======================================-->
   
   <div id="modalAgregarUsuario" class="modal fade" role="dialog">
     
     <div class="modal-dialog">
   
       <div class="modal-content">
   
         <form role="form" method="post" enctype="multipart/form-data">
   
           <!--=====================================
           CABEZA DEL MODAL
           ======================================-->
   
           <div class="modal-header" style="background:#1abc9c; color:white">
   
             <button type="button" class="close" data-dismiss="modal">&times;</button>
   
             <h4 class="modal-title">Agregar usuario</h4>
   
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
   
                   <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresar usuario" id="nuevoUsuario" required>
   
                 </div>
   
               </div>
   
               <!-- ENTRADA PARA LA CONTRASEÑA -->
   
                <div class="form-group">
                 
                 <div class="input-group">
                 
                   <span class="input-group-addon"><i class="fa fa-lock"></i></span> 
   
                   <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar contraseña" required>
   
                 </div>
   
               </div>
   
               <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->
   
               <div class="form-group">
                 
                 <div class="input-group">
                 
                   <span class="input-group-addon"><i class="fa fa-users"></i></span> 
   
                   <select class="form-control input-lg" name="nuevoPerfil">
                     
                     <option value="">Selecionar perfil</option>

                     <option value="superadministrador">SuperAdministrador</option>
   
                     <option value="administrador">Administrador</option>
                        
                     <option value="gestor">Gestor</option>

                     <option value="doctor">Doctor</option>
   
   
   
                   </select>
   
                 </div>
   
               </div>


               
               <!-- ENTRADA PARA SELECCIONAR SU SUCURSAL -->
   
               <div class="form-group">
                 
                 <div class="input-group">
                 
                   <span class="input-group-addon"><i class="fa fa-users"></i></span> 
   
                   <select class="form-control input-lg" name="nuevaSucursal">
                     
                     <option value="">Selecionar Sucursal</option>

                     <?php
                              
                              $item = null;
                              $valor = null;
                              
                              $sucursales = ControladorSucursales::ctrMostrarSurcursales($item, $valor);
                             
                         
                                
                              foreach ($sucursales as $key => $value) {

                            
                             
                                                   
                               echo '<option value="'.$value['id_sucursal'].'">'.$value['nombre'].'</option>';
                             
                              }
                     ?>      
   
   
   
                   </select>
   
                 </div>
   
               </div>
   
               <!-- ENTRADA PARA SUBIR FOTO -->
   
                <div class="form-group">
                 
                 <div class="panel">SUBIR FOTO</div>
   
                 <input type="file" class="nuevaFoto" name="nuevaFoto">
   
                 <p class="help-block">Peso máximo de la foto 2MB</p>
   
                 <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
   
               </div>
   
             </div>
   
           </div>
   
           <!--=====================================
           PIE DEL MODAL
           ======================================-->
   
           <div class="modal-footer">
   
             <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
   
             <button type="submit" class="btn btn-success">Guardar usuario</button>
   
           </div>
   
           <?php
   
             $crearUsuario = new ControladorUsuarios();
             $crearUsuario -> ctrCrearUsuario();
   
           ?>
   
         </form>
   
       </div>
   
     </div>
   
   </div>
   
   <!--=====================================
   MODAL EDITAR USUARIO
   ======================================-->
   
   <div id="modalEditarUsuario" class="modal fade" role="dialog">
     
     <div class="modal-dialog">
   
       <div class="modal-content">
   
         <form role="form" method="post" enctype="multipart/form-data">
   
           <!--=====================================
           CABEZA DEL MODAL
           ======================================-->
   
           <div class="modal-header" style="background:#1abc9c; color:white">
   
             <button type="button" class="close" data-dismiss="modal">&times;</button>
   
             <h4 class="modal-title">Editar usuario</h4>
   
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
   
                   <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="" required>
   
                 </div>
   
               </div>
   
               <!-- ENTRADA PARA EL USUARIO -->
   
                <div class="form-group">
                 
                 <div class="input-group">
                 
                   <span class="input-group-addon"><i class="fa fa-key"></i></span> 
   
                   <input type="text" class="form-control input-lg" id="editarUsuario" name="editarUsuario" value="" readonly>
   
                 </div>
   
               </div>
   
               <!-- ENTRADA PARA LA CONTRASEÑA -->
   
                <div class="form-group">
                 
                 <div class="input-group">
                 
                   <span class="input-group-addon"><i class="fa fa-lock"></i></span> 
   
                   <input type="password" class="form-control input-lg" name="editarPassword" placeholder="Escriba la nueva contraseña">
   
                   <input type="hidden" id="passwordActual" name="passwordActual">
   
                 </div>
   
               </div>
   
               <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->
   
               <div class="form-group">
                 
                 <div class="input-group">
                 
                   <span class="input-group-addon"><i class="fa fa-users"></i></span> 
   
                   <select class="form-control input-lg" name="editarPerfil">
                     
                     <option value="" id="editarPerfil"></option>
   
                     <option value="">Selecionar perfil</option>
   
                     <option value="superadministrador">SuperAdministrador</option>
   
                     <option value="administrador">Administrador</option>
                        
                     <option value="gestor">Gestor</option>

                     <option value="doctor">Doctor</option>

                   </select>
   
                 </div>
   
               </div>

                  <!-- ENTRADA PARA SELECCIONAR SU SUCURSAL -->
   
                  <div class="form-group">
                 
                 <div class="input-group">
                 
                   <span class="input-group-addon"><i class="fa fa-users"></i></span> 
   
                   <select class="form-control input-lg" id="editarSucursal" name="editarSucursal">
                     
                     <option value="">Selecionar Sucursal</option>

                     <?php
                              
                              $item = null;
                              $valor = null;
                              
                              $sucursales = ControladorSucursales::ctrMostrarSurcursales($item, $valor);
                             
                         
                                
                              foreach ($sucursales as $key => $value) {

                            
                             
                                                   
                               echo '<option value="'.$value['id_sucursal'].'">'.$value['nombre'].'</option>';
                             
                              }
                     ?>      
   
   
   
                   </select>
   
                 </div>
   
               </div>
   
   
               <!-- ENTRADA PARA SUBIR FOTO -->
   
                <div class="form-group">
                 
                 <div class="panel">SUBIR FOTO</div>
   
                 <input type="file" class="nuevaFoto" name="editarFoto">
   
                 <p class="help-block">Peso máximo de la foto 2MB</p>
   
                 <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizarEditar" width="100px">
   
                 <input type="hidden" name="fotoActual" id="fotoActual">
   
               </div>
   
             </div>
   
           </div>
   
           <!--=====================================
           PIE DEL MODAL
           ======================================-->
   
           <div class="modal-footer">
   
             <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
   
             <button type="submit" class="btn btn-success">Modificar usuario</button>
   
           </div>
   
        <?php
   
             $editarUsuario = new ControladorUsuarios();
             $editarUsuario -> ctrEditarUsuario();
   
           ?> 
   
         </form>
   
       </div>
   
     </div>
   
   </div>
   
   <?php
   
     $borrarUsuario = new ControladorUsuarios();
     $borrarUsuario -> ctrBorrarUsuario();
   
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