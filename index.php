<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/sucursales.controlador.php";
require_once "controladores/pacientes.controlador.php";
require_once "controladores/consultaGenerica.controlador.php";
require_once "controladores/pacientesMenores.controlador.php";
require_once "controladores/bajaVision.controlador.php";
require_once "controladores/optometriaNeonatos.controlador.php";
require_once "controladores/optometriaPediatrica.controlador.php";
require_once "controladores/ortopticaAdultos.controlador.php";
require_once "controladores/refraccionGeneral.controlador.php";
require_once "controladores/terapiasVision.controlador.php";
require_once "controladores/terapiasOptometriaN.controlador.php";
require_once "controladores/terapiasOptometriaP.controlador.php";
require_once "controladores/terapiasOrtopticaA.controlador.php";
require_once "controladores/receta.controlador.php";
require_once "controladores/reportes.controlador.php";








//MODELOS
require_once "modelos/usuarios.modelo.php";
require_once "modelos/sucursales.modelo.php";
require_once "modelos/pacientes.modelo.php";
require_once "modelos/consultaGenerica.modelo.php";
require_once "modelos/pacientesMenores.modelo.php";
require_once "modelos/pacientesMenores.modelo.php";
require_once "modelos/bajaVision.modelo.php";
require_once "modelos/optometriaNeonatos.modelo.php";
require_once "modelos/optometriaPediatrica.modelo.php";
require_once "modelos/ortopticaAdultos.modelo.php";
require_once "modelos/refraccionGeneral.modelo.php";
require_once "modelos/terapiasVision.modelo.php";
require_once "modelos/terapiasOptometriaN.modelo.php";
require_once "modelos/terapiasOptometriaP.modelo.php";
require_once "modelos/terapiasOrtopticaA.modelo.php";
require_once "modelos/receta.modelo.php";
require_once "modelos/reportes.modelo.php";






$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();