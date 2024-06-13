<?php

session_start();
    if(isset($_GET["ruta"])){
        if($_GET["ruta"] == "funcionesphp-lista"){
            include "funcionesphp/listapacientes.php";
            return ;
        }
    }
?>
<!DOCTYPE html>
<html lang="es">

  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Centro de Terapia y Rehabilitación Visual</title>
    <link rel="icon" type="image/x-icon" href="vistas/img/logo.png" />
    <link href="vistas/assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="vistas/assets/js/loader.js"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="vistas/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="vistas/assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="vistas/assets/css/structure.css" rel="stylesheet" type="text/css" class="structure" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="vistas/plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="vistas/assets/css/dashboard/dash_1.css" rel="stylesheet" type="text/css" class="dashboard-analytics" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

        
        <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
        <script src="vistas/assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="vistas/bootstrap/js/popper.min.js"></script>
    <script src="vistas/bootstrap/js/bootstrap.min.js"></script>
    <script src="vistas/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="vistas/assets/js/app.js"></script>
    <script>
        $(document).ready(function () {
            App.init();
        });
    </script>
    <script src="vistas/assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="vistas/plugins/apex/apexcharts.min.js"></script>
    <script src="vistas/assets/js/dashboard/dash_1.js"></script>
    <link href="vistas/plugins/sweetalerts/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link href="vistas/plugins/sweetalerts/sweetalert.css" rel="stylesheet" type="text/css" />
    <link href="vistas/assets/css/components/custom-sweetalert.css" rel="stylesheet" type="text/css" />
    <script src="vistas/plugins/sweetalerts/sweetalert2.min.js"></script>
    <script src="vistas/plugins/sweetalerts/custom-sweetalert.js"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

    <style>

/* 
    Note: If you are using this demo without activity sidebar then you have to make some changes by applying the .admin-data-content css inside structure.css
*/

.admin-data-content {
    height: calc(100vh - 132px);
    max-width: 100%;
    margin: 0;
}
.admin-header .header-container {
    margin: 0;
    max-width: 100%;
}
.footer-wrapper {
    max-width: 100%;
    margin: 0;
}


/* User Profile Dropdown*/
.admin-header .header-container .nav-item.user-profile-dropdown {
    align-self: center;
    padding: 0;
    border-radius: 8px;
    margin-left: 22px;
    margin-right: 0;
}
.admin-header .header-container .nav-item.user-profile-dropdown .dropdown-toggle {
    display: flex;
    justify-content: flex-end;
    padding: 0 20px 0 16px;
    transition: .5s;
}
.admin-header .header-container .nav-item.user-profile-dropdown .dropdown-toggle:after {
    display: none;
}
.admin-header .header-container .nav-item.user-profile-dropdown .dropdown-toggle svg {
    color: #515365;
    width: 15px;
    height: 15px;
    align-self: center;
    margin-left: 6px;
    stroke-width: 1.7px;
    -webkit-transition: -webkit-transform .2s ease-in-out;
    transition: -webkit-transform .2s ease-in-out;
    transition: transform .2s ease-in-out;
    transition: transform .2s ease-in-out, -webkit-transform .2s ease-in-out;
}
.admin-header .header-container .nav-item.user-profile-dropdown.show .dropdown-toggle svg {
    -webkit-transform: rotate(180deg);
    -ms-transform: rotate(180deg);
    transform: rotate(180deg);
}
.admin-header .header-container .nav-item.user-profile-dropdown a.user .media {
    margin: 0;
}
.admin-header .header-container .nav-item.user-profile-dropdown a.user .media img {
    width: 33px;
    height: 33px;
    border-radius: 6px;
    box-shadow: 0 0px 0.9px rgba(0, 0, 0, 0.07), 0 0px 7px rgba(0, 0, 0, 0.14); 
    margin-right: 13px;
    border: none;
}
.admin-header .header-container .nav-item.user-profile-dropdown a.user .media .media-body {
    flex: auto;
}
.admin-header .header-container .nav-item.user-profile-dropdown a.user .media .media-body h6 {
    color: #4361ee;
    font-size: 13px;
    font-weight: 600;
    margin-bottom: 0;
}
.admin-header .header-container .nav-item.user-profile-dropdown a.user .media .media-body h6 span {
    color: #515365;
}
.admin-header .header-container .nav-item.user-profile-dropdown a.user .media .media-body p {
    color: #bfc9d4;
    font-size: 10px;
}
.admin-header .header-container .nav-item.user-profile-dropdown .nav-link.user {
    padding: 0 0;
    font-size: 25px;
}
.admin-header .header-container .nav-item.dropdown.user-profile-dropdown .nav-link:after { display: none; }

.admin-header .header-container .nav-item.user-profile-dropdown .dropdown-menu {
    z-index: 9999;
    max-width: 13rem;
    padding: 0 11px;
    top: 166%!important;
}
.admin-header .header-container .nav-item.user-profile-dropdown .dropdown-menu.show {
    top: 42px!important;
}
.admin-header .header-container .nav-item.user-profile-dropdown .dropdown-menu .user-profile-section {
    padding: 16px 14px;
    border-top-left-radius: 4px;
    border-top-right-radius: 4px;
    margin-right: -12px;
    margin-left: -12px;
    background: rgb(96 152 149);
    margin-top: -1px;
}
.admin-header .header-container .nav-item.user-profile-dropdown .dropdown-menu .user-profile-section .media {
    margin: 0;
}
.admin-header .header-container .nav-item.user-profile-dropdown .dropdown-menu .user-profile-section .media img {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    border: 3px solid rgb(224 230 237 / 58%);
}
.admin-header .header-container .nav-item.user-profile-dropdown .dropdown-menu .user-profile-section .media .media-body {
    align-self: center;
}
.admin-header .header-container .nav-item.user-profile-dropdown .dropdown-menu .user-profile-section .media .media-body h5 {
    font-size: 14px;
    font-weight: 500;
    margin-bottom: 0;
    color: #fafafa;
}
.admin-header .header-container .nav-item.user-profile-dropdown .dropdown-menu .user-profile-section .media .media-body p {
    font-size: 11px;
    font-weight: 500;
    margin-bottom: 0;
    color: #e0e6ed;
}
.admin-header .header-container .nav-item.user-profile-dropdown .dropdown-menu .dropdown-item {
    padding: 0;
    background: transparent;
}
.admin-header .header-container .nav-item.user-profile-dropdown .dropdown-menu .dropdown-item a {
    display: block;
    color: #3b3f5c;
    font-size: 13px;
    font-weight: 600;
    padding: 9px 14px;
}
.admin-header .header-container .nav-item.user-profile-dropdown .dropdown-menu .dropdown-item a:hover {
    color: #000
}
.admin-header .header-container .nav-item.user-profile-dropdown .dropdown-menu .dropdown-item.active,
.admin-header .header-container .nav-item.user-profile-dropdown .dropdown-menu .dropdown-item:active {
    background-color: transparent;
}
.admin-header .header-container .nav-item.user-profile-dropdown .dropdown-menu .dropdown-item:not(:last-child) {
    border-bottom: 1px solid #ebedf2;
}
.admin-header .header-container .nav-item.user-profile-dropdown .dropdown-menu .dropdown-item svg {
    width: 17px;
    margin-right: 7px;
    height: 17px;
    color: #009688;
    fill: rgb(0 150 136 / 13%);
}

#content .col-left {
    margin-right: 0;
}

/*
    The below code is for DEMO purpose --- Use it if you are using this demo otherwise, Remove it
*/
.navbar .navbar-item.navbar-dropdown {
    margin-left: auto;
}
.layout-px-spacing {
    min-height: calc(100vh - 145px)!important;
}

</style>




</head>

<!--=====================================
CUERPO DOCUMENTO
======================================-->


<body class="dashboard-analytics admin-header ">

 
  <?php

  if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){


   echo '<div id="load_screen">
        <div class="loader">
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>



  <div class="main-container" id="container">

  <div class="overlay"></div>
  <div class="search-overlay"></div> ';





    /*=============================================
    MENU
    =============================================*/

    include "modulos/menu.php";

    /*=============================================
    CABEZOTE
    =============================================*/
    include "modulos/cabezote.php";

    echo '<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <div class="content-container">

            <div class="col-md-12 layout-top-spacing">
                <div class="col-md-12-content">

                    <div id="header" class="header-container">
                        <header class="header navbar navbar-expand-sm">
                            <div class="d-flex">
                                <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
                                    <div class="bt-menu-trigger">
                                        <span></span>
                                    </div>
                                </a>
                         
                            </div>
                            <div class="header-actions">

                            <div class="nav-item dropdown user-profile-dropdown">
                                <a href="#" class="nav-link dropdown-toggle user" id="user-profile-dropdown" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                                    <div class="media">';
                                        if( $_SESSION['foto'] != "" ) {  
                                      echo '<img class="rounded-circle header-profile-user"  src="'; echo $_SESSION['foto']; echo'" >';
            
                                         }  else {
            
                                       echo  '<img class="rounded-circle header-profile-user"src="vistas/img/usuarios/default/anonymous.png">'; 
            
                                             } 
                                      echo  '
                                          <div class="media-body align-self-center">
                                            <h6>'; echo $_SESSION['usuario']; echo'</h6>
                                            
                                     
                                        </div>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                </a>
                                <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                                    <div class="user-profile-section">
                                        <div class="media mx-auto">
                                   
                                            <div class="media-body">
                                                <p style="font-size: 12px;">'; echo $_SESSION['nombre']; echo'</p>
                                            </div>
                                        </div>
                                    </div>
                              
                                    <div class="dropdown-item">
                                        <a href="salir">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> <span>Salir</span>
                                        </a>
                                    </div>
                                </div>
            
                            </div>
                            
                        </div>
                         
                        </header>
                    </div>';

    /*=============================================
    CONTENIDO
    =============================================*/
    
    if(isset($_GET["ruta"])){
      if($_GET["ruta"] == "inicio" ||
         $_GET["ruta"] == "usuarios" ||
         $_GET["ruta"] == "perfil" ||
         $_GET["ruta"] == "crear-paciente" ||
         $_GET["ruta"] == "editar-paciente" ||
         $_GET["ruta"] == "crear-paciente-menor" ||
         $_GET["ruta"] == "editar-paciente-menor" ||
         $_GET["ruta"] == "lista-pacientes" ||
         $_GET["ruta"] == "lista-pacientes-menores" ||
         $_GET["ruta"] == "baja-vision" ||
         $_GET["ruta"] == "ver-baja-vision" ||
         $_GET["ruta"] == "editar-baja-vision" ||
         $_GET["ruta"] == "optometria-neonatos" ||
         $_GET["ruta"] == "consulta-generica" || /*nuevo*/
         $_GET["ruta"] == "ver-consulta-generica" || /*nuevo*/
         $_GET["ruta"] == "editar-consulta-generica" || /*nuevo*/
         $_GET["ruta"] == "ver-optometria-neonatos" ||
         $_GET["ruta"] == "editar-optometria-neonatos" ||
         $_GET["ruta"] == "optometria-pediatrica" ||
         $_GET["ruta"] == "ver-optometria-pediatrica" ||
         $_GET["ruta"] == "editar-optometria-pediatrica" ||
         $_GET["ruta"] == "ortoptica-adultos" ||
         $_GET["ruta"] == "ver-ortoptica-adultos" ||
         $_GET["ruta"] == "editar-ortoptica-adultos" ||
         $_GET["ruta"] == "refraccion-general" ||
         $_GET["ruta"] == "ver-refraccion-general" ||
         $_GET["ruta"] == "editar-refraccion-general" ||
         $_GET["ruta"] == "ortoptica-adultos" ||
         $_GET["ruta"] == "historia-paciente" ||
         $_GET["ruta"] == "terapiasBajaVision" ||
         $_GET["ruta"] == "terapiasOptometriaNeonatos" ||
         $_GET["ruta"] == "terapiasOptometriaPediatrica" ||
         $_GET["ruta"] == "terapiasOrtopticaAdultos" ||
         $_GET["ruta"] == "sucursales" ||
         $_GET["ruta"] == "recetas" ||
         $_GET["ruta"] == "terapia_bv" ||
         $_GET["ruta"] == "terapia_ora" ||
         $_GET["ruta"] == "terapia_opp" ||
         $_GET["ruta"] == "terapia_opn" ||
         $_GET["ruta"] == "ver-receta" ||   
         $_GET["ruta"] == "crear-receta" ||
         $_GET["ruta"] == "crear-receta2" ||      
         $_GET["ruta"] == "editar-receta" ||  
         $_GET["ruta"] == "editar-receta2" ||  
         $_GET["ruta"] == "reportes" || 
         $_GET["ruta"] == "reporte-pacientes-sin-atencion" ||
         $_GET["ruta"] == "reporte-pacientes-ultima-atencion" ||
         $_GET["ruta"] == "reporte-pacientes-atendidos-por-dia" ||
         $_GET["ruta"] == "salir" ||
         $_GET["ruta"] == "pagina-prueba"
         ){

        include "modulos/".$_GET["ruta"].".php";

      }else{

        include "modulos/404.php";

      }

    }else{

      include "modulos/inicio.php";

    }

    // /*=============================================
    // FOOTER
    // =============================================*/

 
    // include "modulos/footer.php";
   
    echo '</div>
           </div> 
             </div>
              </div>
                </div>';    
    
 

 

 

  }else{

    include "modulos/login.php";

  }

  ?>


<script src="vistas/js/usuarios.js"></script>
<script src="vistas/js/redireccion.js"></script>

  

   
</body>
</html>
