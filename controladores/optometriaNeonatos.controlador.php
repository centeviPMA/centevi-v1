
<?php

class ControladorOptometriaNeonatos
{

	/*=============================================
	CREAR CONSULTA
	=============================================*/

	static public function ctrCrearConsultaOptometriaNeonatos()
	{


		if (isset($_POST["crear_optometria_neonatos"])) {


        	$edad =  $_POST['edad'];
			$sucursal =  $_POST['sucursal'];
			$doctor =  $_POST['doctor'];
			$paciente =  $_POST['paciente'];
			$fecha_atencion =  $_POST['fecha_atencion'];
			$m_c =  $_POST['m_c'];
			$ao =  $_POST['a_o'];
			$ap =  $_POST['a_p'];
			$af =  $_POST['a_f'];
			$medicamentos =  $_POST['medicamentos'];
			$tratamientos =  $_POST['tratamientos'];
			$desarrollo  =   $_POST['desarrollo_infante'];
			$nacimiento =  $_POST['nacimiento'];
			$parto =  $_POST['parto'];
			$gateo =  $_POST['gateo'];
			$lenguaje =  $_POST['lenguaje'];
			$complicaciones =  $_POST['complicaciones'];
			$perinatales =  $_POST['perinatales'];
			$postnatales =  $_POST['postnatales'];


			$agudeza_visual = (object) [
				'tambor' =>  $_POST['tambor'],
				'fija' =>  $_POST['fija'],
				'sigue' =>  $_POST['sigue'],
				'mantiene' =>  $_POST['mantiene'],
				'test' =>  $_POST['test'],
				'a_oi' =>  $_POST['a_oi'],
				'a_ao' =>  $_POST['a_ao'],
			];


			$json_agudeza_visual = json_encode($agudeza_visual);



			//LENSOMETRIA

			$lensometria = (object) [
				'esfera_od' =>  $_POST['esfera_od'],
				'cilindro_od' =>  $_POST['cilindro_od'],
				'eje_od' =>  $_POST['eje_od'],
				'p_base_od' =>  $_POST['p_base_od'],
				'add_od' =>  $_POST['add_od'],
				'esfera_oi' =>  $_POST['esfera_oi'],
				'cilindro_oi' =>  $_POST['cilindro_oi'],
				'eje_oi' =>  $_POST['eje_oi'],
				'p_base_oi' =>  $_POST['p_base_oi'],
				'add_oi' =>  $_POST['add_oi'],
			];

			$json_lensometria = json_encode($lensometria);


			$lensometria_extra = (object) [
				'len_tipo_lentes' =>  $_POST['len_tipo_lentes'],
				'len_filtros' =>  $_POST['len_filtros'],
				'len_tiempo' =>  $_POST['len_tiempo'],
				'len_tipo_aro' =>  $_POST['len_tipo_aro'],
			];


			$json_lensometria_extra = json_encode($lensometria_extra);



			$sa_pp = (object) [
				'sa_od' =>  $_POST['sa_od'],
				'pp_od' =>  $_POST['pp_od'],
				'sa_oi' =>  $_POST['sa_oi'],
				'pp_oi' =>  $_POST['pp_oi'],
			];

			$json_sa_pp = json_encode($sa_pp);


			$pruebas_extras = (object) [
				'hirschberg' =>  $_POST['hirschberg'],
				'krismsky' =>  $_POST['krismsky'],
				'ct_vp' =>  $_POST['ct_vp'],
				'ct_reflejo' =>  $_POST['ct_reflejo'],
				'ducciones_od' =>  $_POST['ducciones_od'],
				'ducciones_oi' =>  $_POST['ducciones_oi'],
				'posicion_compensatoria' =>  $_POST['posicion_compensatoria'],
				'fotomotor_od' =>  $_POST['fotomotor_od'],
				'consensual' =>  $_POST['consensual'],
				'fotomotor_oi' =>  $_POST['fotomotor_oi'],
				'fotomotor_consensual' =>  $_POST['fotomotor_consensual'],
			];

			$json_pruebas_extras = json_encode($pruebas_extras);



			$refraccion = (object) [
				
				
				'refraccion_tipo_lentes' =>  $_POST['refraccion_tipo_lentes'],
				'refraccion_pd' =>  $_POST['refraccion_pd'],
				'refraccion_uso' =>  $_POST['refraccion_uso'],
				'reflejo_r_od' =>  $_POST['reflejo_r_od'],
				'reflejo_r_oi' =>  $_POST['reflejo_r_oi'],
				'reflejo_r_ao' =>  $_POST['reflejo_r_ao'],
                'esfera_od_f' =>  $_POST['esfera_od_f'],
					'cilindro_od_f' =>  $_POST['cilindro_od_f'],
					'eje_od_f' =>  $_POST['eje_od_f'],
					'p_base_od_f' =>  $_POST['p_base_od_f'],
					'add_od_f' =>  $_POST['add_od_f'],
					'esfera_oi_f' =>  $_POST['esfera_oi_f'],
					'cilindro_oi_f' =>  $_POST['cilindro_oi_f'],
					'eje_oi_f' =>  $_POST['eje_oi_f'],
					'p_base_oi_f' =>  $_POST['p_base_oi_f'],
					'add_oi_f' =>  $_POST['add_oi_f'],
			];

			$json_refraccion = json_encode($refraccion);



			//  $tabla = "pacientesmenores";
			date_default_timezone_set('America/Lima');

			$fecha = date('Y-m-d');
			$hora = date('H:i:s');
			$fecha_creacion = $fecha . ' ' . $hora;



			$tabla = "optometria_neonatos";


			$datos = array(
				"sucursal" => $sucursal,
				"edad" => $edad,
				"doctor" => $doctor,
				"paciente" => $paciente,
				"id_terapia" => $_POST['id_terapia'],
				"fecha_atencion" => $fecha_atencion,
				"m_c" => $m_c,
				"a_o" => $ao,
				"a_p" => $ap,
				"a_f" => $af,
				"medicamentos" => $medicamentos,
				"tratamientos" => $tratamientos,
				"desarrollo" => $desarrollo,
				"nacimiento" => $nacimiento,
				"parto" => $parto,
				"gateo" => $gateo,
				"lenguaje" => $lenguaje,
				"complicaciones" => $complicaciones,
				"perinatales" => $perinatales,
				"postnatales" => $postnatales,
				"agudeza_visual" => $json_agudeza_visual,
				"lensometria" => $json_lensometria,
				"lensometria_extra" => $json_lensometria_extra,
				"sa_pp" => $json_sa_pp,
				"pruebas_extras" => $json_pruebas_extras,
				"refraccion" => $json_refraccion,
				"conducta_seguir" => $_POST['conducta_seguir'],
                "plan_versiones" => $_POST['plan_versiones'],
				"fecha_creacion" => $fecha_creacion
			);



			//  echo '<pre>'; 
			//  var_dump($datos);
			//  echo '<pre>';


			$respuesta = ModeloOptometriaNeonatos::mdlIngresarOptometriaNeonatos($tabla, $datos);

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



			$tabla = "terapia_optometria_neonatos";


			$datos = array(
				"id_terapia" => $_POST['id_terapias'],
		 		"doctor" => $_POST['doctor'],
				"fecha_creacion" => $fecha_creacion
			);



			//   var_dump($datos);


			$respuesta = ModeloOptometriaNeonatos::ctrCrearTerapia($tabla, $datos);



			if ($respuesta == "ok") {

				echo '<script>
		  
				  swal({
						type: "success",
						title: "El resultado ha sido guardado correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result){
								  if (result.value) {
		  
									  
						       	  window.location = "index.php?ruta=terapiasOptometriaNeonatos&id_terapia="+' . $_POST['id_terapias'] . '+"&id_paciente=' . $_GET['id_paciente'] . '";
							  
		  
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



		
			$tabla = "terapia_optometria_neonatos";

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


			$respuesta = ModeloOptometriaNeonatos::mdlEditarTerapia($tabla, $datos);



			if ($respuesta == "ok") {

				echo '<script>
		  
				  swal({
						type: "success",
						title: "La terapia ha sido editada correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result){
								  if (result.value) {
		  
									  
						       	  window.location = "index.php?ruta=terapiasOptometriaNeonatos&id_terapia="+' . $_POST['id_terapia'] . '+"&id_paciente=' . $_GET['id_paciente'] . '";
							  
		  
								  }
							  })
		  
				  </script>';
			}
		}
	}



	/*=============================================
	EDITAR EVALUACION
	=============================================*/


	static public function ctrEditarEvaluacionON()
	{


		if (isset($_POST["editar_evaluacion"])) {

			



			$tabla = "terapias_optometria_neonatos";


			$datos = array(
				"id_terapia" => $_POST['id_terapia'],
				"evaluacion" => $_POST['evaluacion']
			);



			$respuesta = ModeloBajaVision::mdlEditarEvaluacionBV($tabla, $datos);



			if ($respuesta == "ok") {

				echo '<script>

				  swal({
						type: "success",
						title: "La evaluación ha sido actualizada correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result){
								  if (result.value) {


						       	  window.location = "index.php?ruta=terapiasOptometriaNeonatos&id_terapia="+' . $_POST['id_terapia'] . '+"&id_paciente=' . $_GET['id_paciente'] . '";


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

		$tabla = "terapia_optometria_neonatos";

		$respuesta = ModeloOptometriaNeonatos::mdlMostrarTerapia($tabla, $item, $valor);

		return $respuesta;
	}


	/*=============================================
	MOSTRAR TERAPIA INDIVIDUAL
	=============================================*/

	static public function ctrMostrarTerapiaIndividual($item, $valor)
	{

		$tabla = "terapia_optometria_neonatos";

		$respuesta = ModeloOptometriaNeonatos::mdlMostrarTerapiaIndividual($tabla, $item, $valor);

		return $respuesta;
	}






	/*=============================================
	MOSTRAR CONSULTA POR ID_PACIENTE QUE SOLO MUESTRE ID_PACIENTE , FECHA CREACION  
	=============================================*/

	static public function ctrMostrarOptometriaNeonatos($item, $item2, $valor, $valor2)
	{

		$tabla = "optometria_neonatos";

		$respuesta = ModeloOptometriaNeonatos::mdlMostrarOptometriaNeonatos($tabla, $item, $item2, $valor, $valor2);

		return $respuesta;
	}


	/*=============================================
	MOSTRAR CONSULTA POR ID_PACIENTE
	=============================================*/

	static public function ctrMostrarOptometriaNeonatosID($item, $valor)
	{

		$tabla = "optometria_neonatos";

		$respuesta = ModeloOptometriaNeonatos::mdlMostrarOptometriaNeonatosID($tabla, $item, $valor);

		return $respuesta;
	}


	/*=============================================
	MOSTRAR CANTIDAD DE CONSULTAS POR ID_PACIENTE
	=============================================*/

	static public function ctrMostrarCantidadOptometriaNeonatosID($item, $valor)
	{

		$tabla = "terapia_optometria_neonatos";

		$respuesta = ModeloOptometriaNeonatos::mdlMostrarCantidadOptometriaNeonatosID($tabla, $item, $valor);

		return $respuesta;
	}


	/*=============================================
	VERIFICA LA EXISTENCIA DE CONSUTAS BAJA VISION POR PACIENTE
	=============================================*/

	static public function ctrVerificarExistencia($item, $item2, $valor, $valor2)
	{

		$tabla = "optometria_neonatos";

		$respuesta = ModeloOptometriaNeonatos::mdlVerificarExistencia($tabla, $item, $item2, $valor, $valor2);

		return $respuesta;
	}


	/*=============================================
	EDITAR PACIENTES MENORES
	=============================================*/

	static public function ctrEditarConsultaOptometriaNeonatos()
	{





		if (isset($_POST["editar_optometria_neonatos"])) {



			if ($actualizar = $_POST['actualizar']  == 'exito') {

                $edad =  $_POST['edad'];
	            $sucursal =  $_POST['sucursal'];
				$paciente =  $_POST['paciente'];
				$fecha_atencion =  $_POST['fecha_atencion'];
				$m_c =  $_POST['m_c'];
				$ao =  $_POST['a_o'];
				$ap =  $_POST['a_p'];
				$af =  $_POST['a_f'];
				$medicamentos =  $_POST['medicamentos'];
				$tratamientos =  $_POST['tratamientos'];
				$desarrollo  =   $_POST['desarrollo_infante'];
				$nacimiento =  $_POST['nacimiento'];
				$parto =  $_POST['parto'];
				$gateo =  $_POST['gateo'];
				$lenguaje =  $_POST['lenguaje'];
				$complicaciones =  $_POST['complicaciones'];
				$perinatales =  $_POST['perinatales'];
				$postnatales =  $_POST['postnatales'];


				$agudeza_visual = (object) [
					'tambor' =>  $_POST['tambor'],
					'fija' =>  $_POST['fija'],
					'sigue' =>  $_POST['sigue'],
					'mantiene' =>  $_POST['mantiene'],
					'test' =>  $_POST['test'],
					'a_oi' =>  $_POST['a_oi'],
					'a_ao' =>  $_POST['a_ao'],
				];


				$json_agudeza_visual = json_encode($agudeza_visual);



				//LENSOMETRIA

				$lensometria = (object) [
					'esfera_od' =>  $_POST['esfera_od'],
					'cilindro_od' =>  $_POST['cilindro_od'],
					'eje_od' =>  $_POST['eje_od'],
					'p_base_od' =>  $_POST['p_base_od'],
					'add_od' =>  $_POST['add_od'],
					'esfera_oi' =>  $_POST['esfera_oi'],
					'cilindro_oi' =>  $_POST['cilindro_oi'],
					'eje_oi' =>  $_POST['eje_oi'],
					'p_base_oi' =>  $_POST['p_base_oi'],
					'add_oi' =>  $_POST['add_oi'],
				];

				$json_lensometria = json_encode($lensometria);


				$lensometria_extra = (object) [
					'len_tipo_lentes' =>  $_POST['len_tipo_lentes'],
					'len_filtros' =>  $_POST['len_filtros'],
					'len_tiempo' =>  $_POST['len_tiempo'],
					'len_tipo_aro' =>  $_POST['len_tipo_aro'],
				];


				$json_lensometria_extra = json_encode($lensometria_extra);



				$sa_pp = (object) [
					'sa_od' =>  $_POST['sa_od'],
					'pp_od' =>  $_POST['pp_od'],
					'sa_oi' =>  $_POST['sa_oi'],
					'pp_oi' =>  $_POST['pp_oi'],
				];

				$json_sa_pp = json_encode($sa_pp);


				$pruebas_extras = (object) [
					'hirschberg' =>  $_POST['hirschberg'],
					'krismsky' =>  $_POST['krismsky'],
					'ct_vp' =>  $_POST['ct_vp'],
					'ct_reflejo' =>  $_POST['ct_reflejo'],
					'ducciones_od' =>  $_POST['ducciones_od'],
					'ducciones_oi' =>  $_POST['ducciones_oi'],
					'posicion_compensatoria' =>  $_POST['posicion_compensatoria'],
					'fotomotor_od' =>  $_POST['fotomotor_od'],
					'consensual' =>  $_POST['consensual'],
					'fotomotor_oi' =>  $_POST['fotomotor_oi'],
					'fotomotor_consensual' =>  $_POST['fotomotor_consensual'],
				];

				$json_pruebas_extras = json_encode($pruebas_extras);



				$refraccion = (object) [
					
				'refraccion_tipo_lentes' =>  $_POST['refraccion_tipo_lentes'],
				'refraccion_pd' =>  $_POST['refraccion_pd'],
				'refraccion_uso' =>  $_POST['refraccion_uso'],
				'reflejo_r_od' =>  $_POST['reflejo_r_od'],
				'reflejo_r_oi' =>  $_POST['reflejo_r_oi'],
				'reflejo_r_ao' =>  $_POST['reflejo_r_ao'],
                'esfera_od_f' =>  $_POST['esfera_od_f'],
					'cilindro_od_f' =>  $_POST['cilindro_od_f'],
					'eje_od_f' =>  $_POST['eje_od_f'],
					'p_base_od_f' =>  $_POST['p_base_od_f'],
					'add_od_f' =>  $_POST['add_od_f'],
					'esfera_oi_f' =>  $_POST['esfera_oi_f'],
					'cilindro_oi_f' =>  $_POST['cilindro_oi_f'],
					'eje_oi_f' =>  $_POST['eje_oi_f'],
					'p_base_oi_f' =>  $_POST['p_base_oi_f'],
					'add_oi_f' =>  $_POST['add_oi_f'],
				];

				$json_refraccion = json_encode($refraccion);

				date_default_timezone_set('America/Lima');

				$fecha = date('Y-m-d');
				$hora = date('H:i:s');

				$fecha_editado = $fecha . ' ' . $hora;

				$editado = (object) [
					'doctor' =>  $_POST['editadoDoctor'],
					'fecha_edicion' =>  $fecha_editado,
				];


				$json_editado = json_encode($editado);







				$tabla = "optometria_neonatos";


				$datos = array(
				    "edad" => $edad,
				    "sucursal" => $sucursal,
					"id_consulta" => $_GET['id_consulta'],
					"paciente" => $paciente,
					"fecha_atencion" => $fecha_atencion,
					"m_c" => $m_c,
					"a_o" => $ao,
					"a_p" => $ap,
					"a_f" => $af,
					"medicamentos" => $medicamentos,
					"tratamientos" => $tratamientos,
					"desarrollo" => $desarrollo,
					"nacimiento" => $nacimiento,
					"parto" => $parto,
					"gateo" => $gateo,
					"lenguaje" => $lenguaje,
					"complicaciones" => $complicaciones,
					"perinatales" => $perinatales,
					"postnatales" => $postnatales,
					"agudeza_visual" => $json_agudeza_visual,
					"lensometria" => $json_lensometria,
					"lensometria_extra" => $json_lensometria_extra,
					"sa_pp" => $json_sa_pp,
					"pruebas_extras" => $json_pruebas_extras,
					"refraccion" => $json_refraccion,
					"conducta_seguir" => $_POST['conducta_seguir'],
                    "plan_versiones" => $_POST['plan_versiones'],
					"editado" => $json_editado
				);








				//  echo '<pre>';
				//  var_dump($datos);  
				//  echo '</pre>';




				$respuesta = ModeloOptometriaNeonatos::mdlEditarConsultaOptometriaNeonatos($tabla, $datos);


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
			} else {

				echo '<script>
      
      	 swal({
      		   type: "error",
      		   title: "¡El cliente no puede ir vacío o llevar caracteres especiales!",
      		   showConfirmButton: true,
      		   confirmButtonText: "Cerrar"
      		   }).then(function(result){
      			 if (result.value) {
      
					window.location = "index.php?ruta=editar-paciente-menor&id_paciente="+' . $_GET['id_paciente'] . ';
      
      			 }
      		 })
      
         </script>';
			}
		}
	}

	/*=============================================
	ELIMINAR PACIENTE MENOR
	=============================================*/


	static public function ctrEliminarConsulta()
	{

		if (isset($_GET["borrar_consultaNeonatos"])) {

			$tabla = "optometria_neonatos";
			$datos = $_GET["borrar_consultaNeonatos"];

			$respuesta = ModeloOptometriaNeonatos::mdlEliminarConsulta($tabla, $datos);

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

			$tabla = "terapia_optometria_neonatos";
			$datos = $_GET["eliminar_terapia"];

			$respuesta = ModeloOptometriaNeonatos::mdlEliminarTerapia($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

				swal({
					  type: "success",
					  title: "La terapia ha sido borrada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result){
								if (result.value) {

									window.location = "index.php?ruta=terapiasOptometriaNeonatos&id_terapia="+' . $_GET['id_terapia'] . '+"&id_paciente=' . $_GET['id_paciente'] . '";

								}
							})

				</script>';
			}
		}
	}




	/*=============================================
	ELIMINAR TODAS LAS TERAPIAS
	=============================================*/


	static public function ctrEliminarTodasTerapiasOPN()
	{

		if (isset($_GET["borrar_terapiaopn"])) {

			$tabla = "terapias_optometria_neonatos";
			$datos = $_GET["borrar_terapiaopn"];

			$tabla2 = "terapia_optometria_neonatos";
			$datos2 = $_GET["borrar_terapiaopn"];

			$respuesta = ModeloOptometriaNeonatos::mdlEliminarTodasTerapias($tabla, $datos);
			$respuesta2 = ModeloOptometriaNeonatos::mdlEliminarTerapiaIndividual($tabla2, $datos2);



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
