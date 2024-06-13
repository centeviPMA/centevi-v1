
<?php

class ControladorConsultaBajaVision
{

	/*=============================================
	CREAR CONSULTA
	=============================================*/

	static public function ctrCrearConsultaBajaVision()
	{


		if (isset($_POST["crear_baja_vision"])) {




			$paciente =  $_POST['paciente'];
			$edad =  $_POST['edad'];
			$fecha_atencion =  $_POST['fecha_atencion'];
			$m_c =  $_POST['m_c'];
			$ao =  $_POST['a_o'];
			$ap =  $_POST['a_p'];
			$af =  $_POST['a_f'];
			$medicamentos =  $_POST['medicamentos'];
			$tratamientos =  $_POST['tratamientos'];
			$dx_oft_princ =  $_POST['dx_oft_princ'];
			$objetivos =  $_POST['objetivos'];






			$av_sc = (object) [
				'av_sc_od_vl' =>  $_POST['av/sc_od_vl'],
				'av_sc_oi_vl' =>  $_POST['av/sc_oi_vl'],
				'av_sc_od_vp' =>  $_POST['av/sc_od_vp'],
				'av_sc_oi_vp' =>  $_POST['av/sc_oi_vp'],
				'av_sc_od_ph' =>  $_POST['av/sc_od_ph'],
				'av_sc_oi_ph' =>  $_POST['av/sc_oi_ph'],
			];

			$json_av_sc = json_encode($av_sc);


			$av_cc = (object) [
				'av_cc_od_vl' =>  $_POST['av/cc_od_vl'],
				'av_cc_oi_vl' =>  $_POST['av/cc_oi_vl'],
				'av_cc_od_vp' =>  $_POST['av/cc_od_vp'],
				'av_cc_oi_vp' =>  $_POST['av/cc_oi_vp'],
				'av_cc_od_ph' =>  $_POST['av/cc_od_ph'],
				'av_cc_oi_ph' =>  $_POST['av/cc_oi_ph'],
			];

			$json_av_cc = json_encode($av_cc);

			/*$vision_exentrica = (object) [
				've_D' =>  $_POST['ve_D'],
				've_I' =>  $_POST['ve_I'],
			];


			$json_vision_exentrica = json_encode($vision_exentrica);*/


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



			$cv_so = (object) [
				'cv_od' =>  $_POST['cv_od'],
				'so_od' =>  $_POST['so_od'],
				'cv_oi' =>  $_POST['cv_oi'],
				'so_oi' =>  $_POST['so_oi'],
			];

			$json_cv_so = json_encode($cv_so);

			$amsler = (object) [
				'amsler_od' =>  $_POST['amsler_od'],
				'amsler_oi' =>  $_POST['amsler_oi'],
			];

			$json_amsler = json_encode($amsler);

			$sensibilidad_c = (object) [
				'sensibilidad_od' =>  $_POST['sensibilidad_od'],
				'sensibilidad_oi' =>  $_POST['sensibilidad_oi'],
			];

			$json_sensibilidad_c = json_encode($sensibilidad_c);

			$refraccion = (object) [
				

                'esfera_od_f' =>  $_POST['esfera_od_f'],
					'cilindro_od_f' =>  $_POST['cilindro_od_f'],
					'eje_od_f' =>  $_POST['eje_od_f'],
					'p_base_od_f' =>  $_POST['p_base_od_f'],
					'agz_od_f' =>  $_POST['agz_od_f'],
					'esfera_oi_f' =>  $_POST['esfera_oi_f'],
					'cilindro_oi_f' =>  $_POST['cilindro_oi_f'],
					'eje_oi_f' =>  $_POST['eje_oi_f'],
					'p_base_oi_f' =>  $_POST['p_base_oi_f'],
					'agz_oi_f' =>  $_POST['agz_oi_f'],
                    'tipo_lente_lejos' =>  $_POST['tipo_lente_lejos'],
					'tipo_lente_cerca' =>  $_POST['tipo_lente_cerca'],

                    'esfera_od_fc' =>  $_POST['esfera_od_fc'],
					'cilindro_od_fc' =>  $_POST['cilindro_od_fc'],
					'eje_od_fc' =>  $_POST['eje_od_fc'],
					'p_base_od_fc' =>  $_POST['p_base_od_fc'],
					'agz_od_fc' =>  $_POST['agz_od_fc'],
					'esfera_oi_fc' =>  $_POST['esfera_oi_fc'],
					'cilindro_oi_fc' =>  $_POST['cilindro_oi_fc'],
					'eje_oi_fc' =>  $_POST['eje_oi_fc'],
					'p_base_oi_fc' =>  $_POST['p_base_oi_fc'],
					'agz_oi_fc' =>  $_POST['agz_oi_fc'],

                    'lentes_marca_1' =>  $_POST['lentes_marca_1'],
                    'lentes_pd_1' =>  $_POST['lentes_pd_1'],
                    'lentes_dnp_1' =>  $_POST['lentes_dnp_1'],
                    'lentes_altura_1' =>  $_POST['lentes_altura_1'],

                    
                    'lentes_marca_2' =>  $_POST['lentes_marca_2'],
                    'lentes_pd_2' =>  $_POST['lentes_pd_2'],
                    'lentes_dnp_2' =>  $_POST['lentes_dnp_2'],
                    'lentes_altura_2' =>  $_POST['lentes_altura_2'],


                    
			];

			$json_refraccion = json_encode($refraccion);


			$pruebas = (object) [
				'vl_luces' =>  $_POST['vl_luces'],
				'vp_luces' =>  $_POST['vp_luces'],
				'vision_color' =>  $_POST['vision_color'],
				'prueba_od' =>  $_POST['prueba_od'],
				'prueba_oi' =>  $_POST['prueba_oi'],
			];

			$json_pruebas = json_encode($pruebas);


			//  $tabla = "pacientesmenores";
			date_default_timezone_set('America/Lima');

			$fecha = date('Y-m-d');
			$hora = date('H:i:s');
			$fecha_creacion = $fecha . ' ' . $hora;



			$tabla = "baja_vision";


			$datos = array(
				"sucursal" => $_POST['sucursal'],
				"doctor" => $_POST['doctor'],
				"paciente" => $paciente,
				"id_terapia" => $_POST['id_terapia'],
				"edad" => $edad,
				"fecha_atencion" => $fecha_atencion,
				"m_c" => $m_c,
				"a_o" => $ao,
				"a_p" => $ap,
				"a_f" => $af,
				"medicamentos" => $medicamentos,
				"tratamientos" => $tratamientos,
				"dx_oft_princ" => $dx_oft_princ,
				"objetivos" => $objetivos,
				"av_sc" => $json_av_sc,
				"av_cc" => $json_av_cc,
				//"vision_exentrica" => $json_vision_exentrica,
				"lensometria" => $json_lensometria,
				"lensometria_extra" => $json_lensometria_extra,
				"cv_so" => $json_cv_so,
				"amsler" => $json_amsler,
				"sensibilidad_c" => $json_sensibilidad_c,
				"refraccion" => $json_refraccion,
				"pruebas" => $json_pruebas,
				"ayudas_opticas" => $_POST['ayudas_opticas'],
				"ayudas_no_opticas" => $_POST['ayudas_no_opticas'],
				"plan_rehabilitacion" => $_POST['plan_rehabilitacion'],
                "plan_versiones" => $_POST['plan_versiones'],
				"fecha_creacion" => $fecha_creacion
			);




			//  echo '<pre>'; 
			//  var_dump($datos);
			//  echo '<pre>';

			//$item_cantidad = "id_terapia";
			//$valor_cantidad = $_POST['id_terapia'];

			//$cantidad_citas = ControladorConsultaBajaVision::ctrMostrarCantidadBajaVisionID($item_cantidad, $valor_cantidad);

			//if ($cantidad_citas['cantidad'] < 5) {

				$respuesta = ModeloBajaVision::mdlIngresarBajaVision($tabla, $datos);

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
			//} 
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



			$tabla = "terapia_bajav";


			$datos = array(
				"id_terapia" => $_POST['id_terapias'],
				"doctor" => $_POST['doctor'],
				"fecha_creacion" => $fecha_creacion
			);



			//   var_dump($datos);


			$respuesta = ModeloBajaVision::ctrCrearTerapia($tabla, $datos);



			if ($respuesta == "ok") {

				echo '<script>
		  
				  swal({
						type: "success",
						title: "La terapia ha sido guardada correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result){
								  if (result.value) {
		  
									  
						       	  window.location = "index.php?ruta=terapiasBajaVision&id_terapia="+' . $_POST['id_terapias'] . '+"&id_paciente=' . $_GET['id_paciente'] . '";
							  
		  
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



			$tabla = "terapia_bajav";

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


			$respuesta = ModeloBajaVision::mdlEditarTerapia($tabla, $datos);



			if ($respuesta == "ok") {

				echo '<script>
		  
				  swal({
						type: "success",
						title: "La terapia ha sido editada correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result){
								  if (result.value) {
		  
									  
						       	  window.location = "index.php?ruta=terapiasBajaVision&id_terapia="+' . $_POST['id_terapia'] . '+"&id_paciente=' . $_GET['id_paciente'] . '";
							  
		  
								  }
							  })
		  
				  </script>';
			}
		}
	}


	/*=============================================
	EDITAR EVALUACION
	=============================================*/


	static public function ctrEditarEvaluacionBV()
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



			$tabla = "terapias_bajav";


			$datos = array(
				"id_terapia" => $_POST['id_terapia'],
				"evaluacion" => $json_evaluacion
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


						       	  window.location = "index.php?ruta=terapiasBajaVision&id_terapia="+' . $_POST['id_terapia'] . '+"&id_paciente=' . $_GET['id_paciente'] . '";


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

		$tabla = "terapia_bajav";

		$respuesta = ModeloBajaVision::mdlMostrarTerapia($tabla, $item, $valor);

		return $respuesta;
	}


	/*=============================================
	MOSTRAR TERAPIA INDIVIDUAL
	=============================================*/

	static public function ctrMostrarTerapiaIndividual($item, $valor)
	{

		$tabla = "terapia_bajav";

		$respuesta = ModeloBajaVision::mdlMostrarTerapiaIndividual($tabla, $item, $valor);

		return $respuesta;
	}




	/*=============================================
	MOSTRAR CONSULTA POR ID_PACIENTE QUE SOLO MUESTRE ID_PACIENTE , FECHA CREACION  
	=============================================*/

	static public function ctrMostrarBajaVision($item, $item2, $valor, $valor2)
	{

		$tabla = "baja_vision";

		$respuesta = ModeloBajaVision::mdlMostrarBajaVision($tabla, $item, $item2, $valor, $valor2);

		return $respuesta;
	}


	/*=============================================
	MOSTRAR CONSULTA POR ID_PACIENTE
	=============================================*/

	static public function ctrMostrarBajaVisionID($item, $valor)
	{

		$tabla = "baja_vision";

		$respuesta = ModeloBajaVision::mdlMostrarBajaVisionID($tabla, $item, $valor);

		return $respuesta;
	}



	/*=============================================
	MOSTRAR CANTIDAD DE CONSULTAS
	=============================================*/

	static public function ctrMostrarCantidadBajaVisionID($item, $valor)
	{

		$tabla = "terapia_bajav";

		$respuesta = ModeloBajaVision::mdlMostrarCantidadBajaVisionID($tabla, $item, $valor);

		return $respuesta;
	}


	/*=============================================
	VERIFICA LA EXISTENCIA DE CONSUTAS BAJA VISION POR PACIENTE
	=============================================*/

	static public function ctrVerificarExistencia($item, $item2, $valor, $valor2)
	{

		$tabla = "baja_vision";

		$respuesta = ModeloBajaVision::mdlVerificarExistencia($tabla, $item, $item2, $valor, $valor2);

		return $respuesta;
	}

	/*=============================================
	EDITAR PACIENTES MENORES
	=============================================*/

	static public function ctrEditarConsultaBajaVision()
	{

		$tabla = "baja_vision";



		if (isset($_POST["editar_baja_vision"])) {



			if ($actualizar = $_POST['actualizar']  == 'exito') {




				$paciente =  $_POST['paciente'];
				$edad =  $_POST['edad'];
				$fecha_atencion =  $_POST['fecha_atencion'];
				$m_c =  $_POST['m_c'];
				$ao =  $_POST['a_o'];
				$ap =  $_POST['a_p'];
				$af =  $_POST['a_f'];
				$medicamentos =  $_POST['medicamentos'];
				$tratamientos =  $_POST['tratamientos'];
				$dx_oft_princ =  $_POST['dx_oft_princ'];
				$objetivos =  $_POST['objetivos'];






				$av_sc = (object) [
					'av_sc_od_vl' =>  $_POST['av/sc_od_vl'],
					'av_sc_oi_vl' =>  $_POST['av/sc_oi_vl'],
					'av_sc_od_vp' =>  $_POST['av/sc_od_vp'],
					'av_sc_oi_vp' =>  $_POST['av/sc_oi_vp'],
					'av_sc_od_ph' =>  $_POST['av/sc_od_ph'],
					'av_sc_oi_ph' =>  $_POST['av/sc_oi_ph'],
				];

				$json_av_sc = json_encode($av_sc);


				$av_cc = (object) [
					'av_cc_od_vl' =>  $_POST['av/cc_od_vl'],
					'av_cc_oi_vl' =>  $_POST['av/cc_oi_vl'],
					'av_cc_od_vp' =>  $_POST['av/cc_od_vp'],
					'av_cc_oi_vp' =>  $_POST['av/cc_oi_vp'],
					'av_cc_od_ph' =>  $_POST['av/cc_od_ph'],
					'av_cc_oi_ph' =>  $_POST['av/cc_oi_ph'],
				];

				$json_av_cc = json_encode($av_cc);

				$vision_exentrica = (object) [
					've_D' =>  $_POST['ve_D'],
					've_I' =>  $_POST['ve_I'],
				];


				$json_vision_exentrica = json_encode($vision_exentrica);


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



				$cv_so = (object) [
					'cv_od' =>  $_POST['cv_od'],
					'so_od' =>  $_POST['so_od'],
					'cv_oi' =>  $_POST['cv_oi'],
					'so_oi' =>  $_POST['so_oi'],
				];

				$json_cv_so = json_encode($cv_so);

				$amsler = (object) [
					'amsler_od' =>  $_POST['amsler_od'],
					'amsler_oi' =>  $_POST['amsler_oi'],
				];

				$json_amsler = json_encode($amsler);

				$sensibilidad_c = (object) [
					'sensibilidad_od' =>  $_POST['sensibilidad_od'],
					'sensibilidad_oi' =>  $_POST['sensibilidad_oi'],
				];

				$json_sensibilidad_c = json_encode($sensibilidad_c);

				$refraccion = (object) [
					'esfera_od_f' =>  $_POST['esfera_od_f'],
					'cilindro_od_f' =>  $_POST['cilindro_od_f'],
					'eje_od_f' =>  $_POST['eje_od_f'],
					'p_base_od_f' =>  $_POST['p_base_od_f'],
					'agz_od_f' =>  $_POST['agz_od_f'],
					'esfera_oi_f' =>  $_POST['esfera_oi_f'],
					'cilindro_oi_f' =>  $_POST['cilindro_oi_f'],
					'eje_oi_f' =>  $_POST['eje_oi_f'],
					'p_base_oi_f' =>  $_POST['p_base_oi_f'],
					'agz_oi_f' =>  $_POST['agz_oi_f'],
					'tipo_lente_lejos' =>  $_POST['tipo_lente_lejos'],
					'tipo_lente_cerca' =>  $_POST['tipo_lente_cerca'],

                    'esfera_od_fc' =>  $_POST['esfera_od_fc'],
					'cilindro_od_fc' =>  $_POST['cilindro_od_fc'],
					'eje_od_fc' =>  $_POST['eje_od_fc'],
					'p_base_od_fc' =>  $_POST['p_base_od_fc'],
					'agz_od_fc' =>  $_POST['agz_od_fc'],
					'esfera_oi_fc' =>  $_POST['esfera_oi_fc'],
					'cilindro_oi_fc' =>  $_POST['cilindro_oi_fc'],
					'eje_oi_fc' =>  $_POST['eje_oi_fc'],
					'p_base_oi_fc' =>  $_POST['p_base_oi_fc'],
                    'agz_oi_fc' =>  $_POST['agz_oi_fc'],

                    
                    'lentes_marca_1' =>  $_POST['lentes_marca_1'],
                    'lentes_pd_1' =>  $_POST['lentes_pd_1'],
                    'lentes_dnp_1' =>  $_POST['lentes_dnp_1'],
                    'lentes_altura_1' =>  $_POST['lentes_altura_1'],

                    
                    'lentes_marca_2' =>  $_POST['lentes_marca_2'],
                    'lentes_pd_2' =>  $_POST['lentes_pd_2'],
                    'lentes_dnp_2' =>  $_POST['lentes_dnp_2'],
                    'lentes_altura_2' =>  $_POST['lentes_altura_2'],
				];

				$json_refraccion = json_encode($refraccion);


				$pruebas = (object) [
					'vl_luces' =>  $_POST['vl_luces'],
					'vp_luces' =>  $_POST['vp_luces'],
					'vision_color' =>  $_POST['vision_color'],
					'prueba_od' =>  $_POST['prueba_od'],
					'prueba_oi' =>  $_POST['prueba_oi'],
				];

				$json_pruebas = json_encode($pruebas);


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



				$tabla = "baja_vision";


				$datos = array(
					"id_consulta" => $_POST['id_consulta'],
					"paciente" => $paciente,
					"edad" => $edad,
					"fecha_atencion" => $fecha_atencion,
					"m_c" => $m_c,
					"a_o" => $ao,
					"a_p" => $ap,
					"a_f" => $af,
					"medicamentos" => $medicamentos,
					"tratamientos" => $tratamientos,
					"dx_oft_princ" => $dx_oft_princ,
					"objetivos" => $objetivos,
					"av_sc" => $json_av_sc,
					"av_cc" => $json_av_cc,
					//"vision_exentrica" => $json_vision_exentrica,
					"lensometria" => $json_lensometria,
					"lensometria_extra" => $json_lensometria_extra,
					"cv_so" => $json_cv_so,
					"amsler" => $json_amsler,
					"sensibilidad_c" => $json_sensibilidad_c,
					"refraccion" => $json_refraccion,
					"pruebas" => $json_pruebas,
					"ayudas_opticas" => $_POST['ayudas_opticas'],
					"ayudas_no_opticas" => $_POST['ayudas_no_opticas'],
					"plan_rehabilitacion" => $_POST['plan_rehabilitacion'],
                    "plan_versiones" => $_POST['plan_versiones'],
					"editado" => $json_editado
				);


				//  echo '<pre>';
				//  var_dump($datos);  
				//  echo '</pre>';




				$respuesta = ModeloBajaVision::mdlEditarConsultaBajaVision($tabla, $datos);


				var_dump($respuesta);

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

		if (isset($_GET["borrar_consultaBV"])) {

			$tabla = "baja_vision";
			$datos = $_GET["borrar_consultaBV"];

			$respuesta = ModeloBajaVision::mdlEliminarConsulta($tabla, $datos);

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

			$tabla = "terapia_bajav";
			$datos = $_GET["eliminar_terapia"];



			$respuesta = ModeloBajaVision::mdlEliminarTerapia($tabla, $datos);


			if ($respuesta == "ok") {

				echo '<script>

				swal({
					  type: "success",
					  title: "La ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result){
								if (result.value) {

									window.location = "index.php?ruta=terapiasBajaVision&id_terapia="+' . $_GET['id_terapia'] . '+"&id_paciente=' . $_GET['id_paciente'] . '";

								}
							})

				</script>';
			}
		}
	}




	/*=============================================
	ELIMINAR TODAS LAS TERAPIAS
	=============================================*/


	static public function ctrEliminarTodasTerapias()
	{

		if (isset($_GET["borrar_terapiagbv"])) {

			$tabla = "terapias_bajav";
			$datos = $_GET["borrar_terapiagbv"];

			$tabla2 = "terapia_bajav";
			$datos2 = $_GET["borrar_terapiagbv"];

			$respuesta = ModeloBajaVision::mdlEliminarTodasTerapias($tabla, $datos);
			$respuesta2 = ModeloBajaVision::mdlEliminarTerapiaIndividual($tabla2, $datos2);



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
