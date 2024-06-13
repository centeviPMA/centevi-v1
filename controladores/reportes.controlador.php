   

   
<?php

class ControladorReportes{

	/*=============================================
	MOSTRAR REPORTE CANTIDAD PACIENTES
	=============================================*/

	static public function ctrMostrarCantidadPacientes($item, $valor){

		$tabla = "pacientes";

		$respuesta = ModeloReportes::mdlMostrarCantidadPacientes($tabla, $item, $valor);

		return $respuesta;

	}
	
	
	/*=============================================
	MOSTRAR REPORTE CANTIDAD PACIENTES SIN ATENDER
	=============================================*/
	
	static public function ctrMostrarCantidadPacientesSinAtender(){

		$respuesta = ModeloReportes::mdlMostrarCantidadPacientesSinAtender();

		return $respuesta;

	}
	
	
	/*=============================================
	MOSTRAR REPORTE TODOS LOS PACIENTES SIN ATENDER
	=============================================*/
	
	static public function ctrMostrarTodosLosPacientesSinAtender(){

		$respuesta = ModeloReportes::mdlMostrarTodosLosPacientesSinAtender();

		return $respuesta;

	}
	
	


    /*=============================================
	MOSTRAR REPORTE CANTIDAD PACIENTES MENORES
	=============================================*/

	static public function ctrMostrarCantidadPacientesMenores($item, $valor){

		$tabla = "pacientes";

		$respuesta = ModeloReportes::mdlMostrarCantidadPacientesMenores($tabla, $item, $valor);

		return $respuesta;

	}

    /*=============================================
	MOSTRAR REPORTE ULTIMOS PACIENTES
	=============================================*/

	static public function ctrMostrarUltimosPacientes($item, $valor){

		$tabla = "pacientes";

		$respuesta = ModeloReportes::mdlMostrarUltimosPacientes($tabla, $item, $valor);

		return $respuesta;

	}
	
	 /*=============================================
	MOSTRAR REPORTE ÚLTIMA ATENCIÓN DE PACIENTES
	=============================================*/

	static public function ctrMostrarUltimaAtencionPacientes($valor, $fecha){

		$respuesta = ModeloReportes::mdlMostrarUltimaAtencionPacientes($valor, $fecha);

		return $respuesta;

	}
	
	
	 /*=============================================
	MOSTRAR REPORTE PACIENTES ATENDIDOS POR DÍA
	=============================================*/

	static public function ctrMostrarPacientesAtendidosPorDia($valor, $fecha){

		$respuesta = ModeloReportes::mdlMostrarPacientesAtendidosPorDia($valor, $fecha);

		return $respuesta;

	}

	static public function ctrMostrarPacientesAtendidosPorDiaV2($valor, $fecha){

		$respuesta = ModeloReportes::mdlMostrarPacientesAtendidosPorDiaV2($valor, $fecha);

		return $respuesta;

	}


	 /*=============================================
	MOSTRAR PACIENTES
	=============================================*/

	static public function ctrMostrarPacientes($item, $valor){

		$tabla = "pacientes";

		$respuesta = ModeloReportes::mdlMostrarPacientes($tabla, $item, $valor);

		return $respuesta;

	}


	
    /*=============================================
	MOSTRAR REPORTE CANTIDAD DE CONSULTAS BAJA VISION
	=============================================*/

	static public function ctrMostrarCantidadBajaVision($item, $valor){

		$tabla = "baja_vision";

		$respuesta = ModeloReportes::mdlMostrarCantidadBajaVision($tabla, $item, $valor);

		return $respuesta;

	}


    /*=============================================
	MOSTRAR REPORTE CANTIDAD DE CONSULTAS OPTOMETRIA NEONATOS
	=============================================*/

	static public function ctrMostrarCantidadOptometriaNeonatos($item, $valor){

		$tabla = "optometria_neonatos";

		$respuesta = ModeloReportes::mdlMostrarCantidadOptometriaNeonatos($tabla, $item, $valor);

		return $respuesta;

	}


    /*=============================================
	MOSTRAR REPORTE CANTIDAD DE CONSULTAS OPTOMETRIA PEDIATRICA
	=============================================*/

	static public function ctrMostrarCantidadOptometriaPediatrica($item, $valor){

		$tabla = "optometria_pediatrica";

		$respuesta = ModeloReportes::mdlMostrarCantidadOptometriaPediatrica($tabla, $item, $valor);

		return $respuesta;

	}

	  /*=============================================
	MOSTRAR REPORTE CANTIDAD DE CONSULTAS ORTOPTICA ADULTOS
	=============================================*/

	static public function ctrMostrarCantidadOrtopticaAdultos($item, $valor){

		$tabla = "ortoptica_adultos";

		$respuesta = ModeloReportes::mdlMostrarCantidadOrtopticaAdultos($tabla, $item, $valor);

		return $respuesta;

	}

    /*=============================================
	MOSTRAR REPORTE CANTIDAD DE SUCURSALES
	=============================================*/

	static public function ctrMostrarCantidadSucursales($item, $valor){

		$tabla = "sucursales";

		$respuesta = ModeloReportes::mdlMostrarCantidadSucursales($tabla, $item, $valor);

		return $respuesta;

	}

	

}

