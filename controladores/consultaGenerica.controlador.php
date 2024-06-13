<?php

class ControladorConsultaGenerica
{

	/*=============================================
	CREAR CONSULTA
	=============================================*/

	static public function ctrCrearConsultaGenerica()
	{


		if (isset($_POST["crear_consulta_generica"])) {


			$sucursal =  $_POST['sucursal'];
			$doctor =  $_POST['doctor'];
			$paciente =  $_POST['paciente'];
			$edad =  $_POST['edad'];
			$fecha_atencion =  $_POST['fecha_atencion'];
			$m_c =  $_POST['m_c'];
			

		

			//  $tabla = "pacientesmenores";
			date_default_timezone_set('America/Lima');

			$fecha = date('Y-m-d');
			$hora = date('H:i:s');
			$fecha_creacion = $fecha . ' ' . $hora;



			$tabla = "consultagenerica";


			$datos = array(
				"sucursal" => $sucursal,
				"doctor" => $doctor,
				"paciente" => $paciente,
				"id_terapia" => $_POST['id_terapia'],
				"edad" => $edad,
				"fecha_atencion" => $fecha_atencion,
				"m_c" => $m_c,
				"fecha_creacion" => $fecha_creacion
			);



			//  echo '<pre>'; 
			//  var_dump($datos);
			//  echo '<pre>';


			$respuesta = ModeloConsultaGenerica::mdlIngresarConsultaGenerica($tabla, $datos);

			//  var_dump($respuesta);

			if ($respuesta == "ok") {

				echo '<script>

					swal({
						  type: "success",
						  title: "La consulta ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

										
								window.location = "index.php?ruta=historia-paciente&id_paciente="+' . $_POST['paciente'] . ';

									}
								})

					</script>';
			}
		}
	}


	/*=============================================
	INGRESAR TERAPIA
	=============================================*/


	static public function ctrCrearTerapia()
	{


		if (isset($_POST["crear_terapia"])) {


			date_default_timezone_set('America/Lima');

			$fecha = date('Y-m-d');
			$hora = date('H:i:s');
			$fecha_creacion = $fecha . ' ' . $hora;



			$tabla = "terapia_ortoptica_adultos";


			$datos = array(
				"id_terapia" => $_POST['id_terapias'],
				"actividad" => $_POST['actividad'],
				"resultado" => $_POST['resultado'],
				"doctor" => $_POST['doctor'],
				"fecha_creacion" => $fecha_creacion
			);



			//   var_dump($datos);


			$respuesta = ModeloOrtopticaAdultos::ctrCrearTerapia($tabla, $datos);



			if ($respuesta == "ok") {

				echo '<script>
		  
				  swal({
						type: "success",
						title: "El resultado ha sido guardado correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result){
								  if (result.value) {
		  
									  
						       	  window.location = "index.php?ruta=terapiasOrtopticaAdultos&id_terapia="+' . $_POST['id_terapias'] . '+"&id_paciente=' . $_GET['id_paciente'] . '";
							  
		  
								  }
							  })
		  
				  </script>';
			}
		}
	}



	/*=============================================
	EDITAR TERAPIA
	=============================================*/


	static public function ctrEditarTerapia()
	{


		if (isset($_POST["editar"])) {


			date_default_timezone_set('America/Lima');

			$fecha = date('Y-m-d');
			$hora = date('H:i:s');
			$fecha_creacion = $fecha . ' ' . $hora;


			$sesion = (object) [
				'actividad_1' =>  $_POST['actividad_1'],
				'resultado_1' =>  $_POST['resultado_1'],
				'actividad_2' =>  $_POST['actividad_2'],
				'resultado_2' =>  $_POST['resultado_2'],
				'actividad_3' =>  $_POST['actividad_3'],
				'resultado_3' =>  $_POST['resultado_3'],
				'actividad_4' =>  $_POST['actividad_4'],
				'resultado_4' =>  $_POST['resultado_4'],
			];


			$json_sesion = json_encode($sesion);



		
			$tabla = "terapia_ortoptica_adultos";

			if( $_POST['actividad_1'] != "" && $_POST['resultado_1']  != "" && $_POST['actividad_2']  != "" && $_POST['resultado_2']  != "" && $_POST['actividad_3']  != "" && $_POST['resultado_3']  != ""     && $_POST['actividad_4']  != ""  && $_POST['resultado_4']  != ""
			   
			){
				$completado = 1;
				
			} else{
				$completado = 0;
			}


			$datos = array(
				"id" => $_POST['id'],
				"sesion" => $json_sesion,
				"completado" => $completado,
			);


			//   var_dump($datos);


			$respuesta = ModeloOrtopticaAdultos::mdlEditarTerapia($tabla, $datos);



			if ($respuesta == "ok") {

				echo '<script>
		  
				  swal({
						type: "success",
						title: "La terapia ha sido editada correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result){
								  if (result.value) {
		  
									  
						       	  window.location = "index.php?ruta=terapiasOrtopticaAdultos&id_terapia="+' . $_POST['id_terapia'] . '+"&id_paciente=' . $_GET['id_paciente'] . '";
							  
		  
								  }
							  })
		  
				  </script>';
			}
		}
	}


	/*=============================================
	EDITAR EVALUACION
	=============================================*/


	static public function ctrEditarEvaluacionOA()
	{


		if (isset($_POST["editar_evaluacion"])) {

			$evaluacion = (object) [
				'agudeza_v' =>  $_POST['agudeza_v'],
				'hirshberg' =>  $_POST['hirshberg'],
				'cover' =>  $_POST['cover'],
				'versiones' =>  $_POST['versiones'],
				'ducciones' =>  $_POST['ducciones'],
				'refraccion' =>  $_POST['refraccion'],
				'luces' =>  $_POST['luces'],
				'bagolini' =>  $_POST['bagolini'],
				'estereopsis' =>  $_POST['estereopsis']
			];


			$json_evaluacion = json_encode($evaluacion);



			$tabla = "terapias_ortoptica_adultos";


			$datos = array(
				"id_terapia" => $_POST['id_terapia'],
				"evaluacion" => $json_evaluacion
			);





			$respuesta = ModeloOrtopticaAdultos::mdlEditarEvaluacionOA($tabla, $datos);



			if ($respuesta == "ok") {

				echo '<script>

				  swal({
						type: "success",
						title: "La evaluación ha sido actualizada correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result){
								  if (result.value) {


						       	  window.location = "index.php?ruta=terapiasOrtopticaAdultos&id_terapia="+' . $_POST['id_terapia'] . '+"&id_paciente=' . $_GET['id_paciente'] . '";


								  }
							  })

				  </script>';
			}
		}
	}



	/*=============================================
	MOSTRAR TERAPIA
	=============================================*/

	static public function ctrMostrarTerapia($item, $valor)
	{

		$tabla = "terapia_ortoptica_adultos";

		$respuesta = ModeloOrtopticaAdultos::mdlMostrarTerapia($tabla, $item, $valor);

		return $respuesta;
	}


	/*=============================================
	MOSTRAR TERAPIA INDIVIDUAL
	=============================================*/

	static public function ctrMostrarTerapiaIndividual($item, $valor)
	{

		$tabla = "terapia_ortoptica_adultos";

		$respuesta = ModeloOrtopticaAdultos::mdlMostrarTerapiaIndividual($tabla, $item, $valor);

		return $respuesta;
	}







	/*=============================================
	MOSTRAR CONSULTA POR ID_PACIENTE QUE SOLO MUESTRE ID_PACIENTE , FECHA CREACION  
	=============================================*/

	static public function ctrMostrarConsultaGenerica($item, $item2, $valor, $valor2)
	{

		$tabla = "consultagenerica";

		$respuesta = ModeloConsultaGenerica::mdlMostrarConsultaGenerica($tabla, $item, $item2, $valor, $valor2);

		return $respuesta;
	}


	/*=============================================
	MOSTRAR CONSULTA POR ID_PACIENTE
	=============================================*/

	static public function ctrMostrarConsultaGenericaID($item, $valor)
	{

		$tabla = "consultagenerica";

		$respuesta = ModeloConsultaGenerica::mdlMostrarConsultaGenericaID($tabla, $item, $valor);

		return $respuesta;
	}


	/*=============================================
	MOSTRAR CANTIADAD POR ID_PACIENTE
	=============================================*/

	static public function ctrMostrarCantidadOrtopticaAdultosID($item, $valor)
	{

		$tabla = "terapia_ortoptica_adultos";

		$respuesta = ModeloOrtopticaAdultos::mdlMostrarCantidadOrtopticaAdultosID($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	VERIFICA LA EXISTENCIA DE CONSULTAS REFRACCION GENERAL  POR PACIENTE
	=============================================*/

	static public function ctrVerificarExistencia($item, $item2, $valor, $valor2)
	{

		$tabla = "consultagenerica";

		$respuesta = ModeloConsultaGenerica::mdlVerificarExistencia($tabla, $item, $item2, $valor, $valor2);

		return $respuesta;
	}


	/*=============================================
	EDITAR HISTORIA CLINICA
	=============================================*/

	static public function ctrEditarConsultaGenerica()
	{

		if (isset($_POST["editar_consulta_generica"])) {



			if ($actualizar = $_POST['actualizar']  == 'exito') {

				$paciente =  $_POST['paciente'];
				$edad =  $_POST['edad'];
				$sucursal =  $_POST['sucursal'];
				$fecha_atencion =  $_POST['fecha_atencion'];
				$m_c =  $_POST['m_c'];
			
	
				//  $tabla = "pacientesmenores";
				date_default_timezone_set('America/Lima');
	
				$fecha = date('Y-m-d');
				$hora = date('H:i:s');
				$fecha_editado = $fecha . ' ' . $hora;

				$editado = (object) [
					'doctor' =>  $_POST['editadoDoctor'],
					'fecha_edicion' =>  $fecha_editado,
				];


				$json_editado = json_encode($editado);
	
	
	
				$tabla = "consultagenerica";
	
	
				$datos = array(
					"id_consulta" => $_POST['id_consulta'],
					"paciente" => $paciente,
					"edad" => $edad,
					"sucursal" => $sucursal,
					"fecha_atencion" => $fecha_atencion,
					"m_c" => $m_c,
					"editado" => $json_editado
				);
	



				//  echo '<pre>';
				//  var_dump($datos);  
				//  echo '</pre>';




				$respuesta = ModeloConsultaGenerica::mdlEditarConsultaGenerica($tabla, $datos);


				//   var_dump($respuesta);


				if ($respuesta == "ok") {

					echo '<script>
      
                     	 swal({
                     		   type: "success",
                     		   title: "La consulta ha sido actualizado correctamente",
                     		   showConfirmButton: true,
                     		   confirmButtonText: "Cerrar"
                     		   }).then(function(result){
                     					 if (result.value) {
                     
	                 						window.location = "index.php?ruta=historia-paciente&id_paciente="+' . $_POST['paciente'] . ';
                     
                     					 }
                     				 })
                     
                     	 </script>';
	       	} 
		}
			
		}
	}

	/*=============================================
	ELIMINAR CONSULTA
	=============================================*/


	static public function ctrEliminarConsulta()
	{

		if (isset($_GET["borrar_consultaCG"])) {

			$tabla = "consultagenerica";
			$datos = $_GET["borrar_consultaCG"];

			$respuesta = ModeloConsultaGenerica::mdlEliminarConsulta($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

				swal({
					  type: "success",
					  title: "La consulta ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result){
								if (result.value) {

									window.location = "index.php?ruta=historia-paciente&id_paciente="+' . $_GET['id_paciente'] . ';
								}
							})

				</script>';
			}
		}
	}



	/*=============================================
	ELIMINAR TERAPIA
	=============================================*/


	static public function ctrEliminarTerapia()
	{

		if (isset($_GET["eliminar_terapia"])) {

			$tabla = "terapia_ortoptica_adultos";
			$datos = $_GET["eliminar_terapia"];

			$respuesta = ModeloOrtopticaAdultos::mdlEliminarTerapia($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

				swal({
					  type: "success",
					  title: "La  terapia ha sido borrada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result){
								if (result.value) {

									window.location = "index.php?ruta=terapiasOrtopticaAdultos&id_terapia="+' . $_GET['id_terapia'] . '+"&id_paciente=' . $_GET['id_paciente'] . '";

								}
							})

				</script>';
			}
		}
	}






	/*=============================================
	ELIMINAR TODAS LAS TERAPIAS
	=============================================*/


	static public function ctrEliminarTodasTerapiasOA()
	{

		if (isset($_GET["borrar_terapiagoa"])) {

			$tabla = "terapias_ortoptica_adultos";
			$datos = $_GET["borrar_terapiagoa"];

			$tabla2 = "terapia_ortoptica_adultos";
			$datos2 = $_GET["borrar_terapiagoa"];

			$respuesta = ModeloOrtopticaAdultos::mdlEliminarTodasTerapias($tabla, $datos);
			$respuesta2 = ModeloOrtopticaAdultos::mdlEliminarTerapiaIndividual($tabla2, $datos2);



			if ($respuesta == "ok" && $respuesta2 == "ok") {

				echo '<script>

				swal({
					  type: "success",
					  title: "La terapia ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result){
								if (result.value) {
									window.location = "index.php?ruta=historia-paciente&id_paciente="+' . $_GET['id_paciente'] . ';
								}
					})

				</script>';
			}
		}
	}
}
