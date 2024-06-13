<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Centro de Optica</title>
    <link rel="icon" type="image/x-icon" href="vistas/assets/img/favicon.ico" />
    <link href="vistas/assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="vistas/assets/js/loader.js"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="vistas/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="vistas/assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="vistas/assets/css/structure.css" rel="stylesheet" type="text/css" class="structure" />
    <link href="vistas/assets/css/authentication/form-1.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="vistas/assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="vistas/assets/css/forms/switches.css">


    <style>
        .form-image .back-image {
            background-image: url(vistas/img/bg-centevi.jpg);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        
            background-position: center center;
            background-repeat: no-repeat;
            background-size: 95%;
            background-position-x: center;
            background-position-y: center;
        }
    </style>
</head>

<body class="form">


    <div class="form-container">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                        <h1 class=""><a href="index.html"><span class="brand-name"><img style="width:100%;" src="vistas/img/centevi-panama.png" alt="logo"></span></a></h1>
                        <form class="text-left mt-2" method="post">
                            <div class="form">

                                <div id="username-field" class="field-wrapper input">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <input id="username" name="usuario" type="text" class="form-control" placeholder="Usuario">
                                </div>

                                <div id="password-field" class="field-wrapper input mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock">
                                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                    </svg>
                                    <input id="password" name="password" type="password" class="form-control" placeholder="Contraseña">
                                </div>
                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper toggle-pass">
                                        <p class="d-inline-block">Mostrar Contraseña</p>
                                        <label class="switch s-primary">
                                            <input type="checkbox" id="toggle-password" class="d-none">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <div class="field-wrapper">
                                        <button type="submit" class="btn btn-primary" value="">Ingresar</button>
                                    </div>

                                </div>



                            </div>
                            <?php

                            $login = new ControladorUsuarios();
                            $login->ctrIngresoUsuario();

                            ?>
                        </form>
                        <!-- <p class="terms-conditions">© 2020 All Rights Reserved. <a href="index.html">CORK</a> is a product of Designreset. <a href="javascript:void(0);">Cookie Preferences</a>, <a href="javascript:void(0);">Privacy</a>, and <a href="javascript:void(0);">Terms</a>.</p> -->

                    </div>
                </div>
            </div>
        </div>
        <div class="form-image">
            <div class="back-image">
            </div>
        </div>
    </div>


    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="vistas/assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="vistas/bootstrap/js/popper.min.js"></script>
    <script src="vistas/bootstrap/js/bootstrap.min.js"></script>

    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="vistas/assets/js/authentication/form-1.js"></script>

</body>

</html>