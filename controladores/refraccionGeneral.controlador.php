
<?php

class ControladorRefraccionGeneral
{

	/*=============================================
	CREAR CONSULTA
	=============================================*/

	static public function ctrCrearConsultaRefraccionGeneral()
	{


		if (isset($_POST["crear_refraccion_general"])) {


			$sucursal =  $_POST['sucursal'];
			$doctor =  $_POST['doctor'];
			$paciente =  $_POST['paciente'];
			$edad =  $_POST['edad'];
			$fecha_atencion =  $_POST['fecha_atencion'];
			$m_c =  $_POST['m_c'];
			$ao =  $_POST['a_o'];
			$ap =  $_POST['a_p'];
			$af =  $_POST['a_f'];
			$medicamentos =  $_POST['medicamentos'];
			$tratamientos =  $_POST['tratamientos'];


			$av_sc = (object) [
				'av_sc_od_vl' =>  $_POST['av/sc_od_vl'],
				'av_sc_oi_vl' =>  $_POST['av/sc_oi_vl'],
				'av_sc_od_vp' =>  $_POST['av/sc_od_vp'],
				'av_sc_oi_vp' =>  $_POST['av/sc_oi_vp'],
			];

			$json_av_sc = json_encode($av_sc);


			$av_cc = (object) [
				'av_cc_od_vl' =>  $_POST['av/cc_od_vl'],
				'av_cc_oi_vl' =>  $_POST['av/cc_oi_vl'],
				'av_cc_od_vp' =>  $_POST['av/cc_od_vp'],
				'av_cc_oi_vp' =>  $_POST['av/cc_oi_vp'],
			];

			$json_av_cc = json_encode($av_cc);



			//$ojo_dominante = $_POST['ojo_dominante'];

			//$mano_dominante = $_POST['mano_dominante'];


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
				'len_tipo_arco' =>  $_POST['len_tipo_arco'],
			];


			$json_lensometria_extra = json_encode($lensometria_extra);



			$sa_pp = (object) [
				'sa_od' =>  $_POST['sa_od'],
				'pp_od' =>  $_POST['pp_od'],
				'sa_oi' =>  $_POST['sa_oi'],
				'pp_oi' =>  $_POST['pp_oi'],
			];

			$json_sa_pp = json_encode($sa_pp);


			$visuscopia = (object) [
				'hirschberg' =>  $_POST['hirschberg'],
				'ct_vl' =>  $_POST['ct_vl'],
				'ct_vp' =>  $_POST['ct_vp'],
			];

			$json_visuscopia = json_encode($visuscopia);


			$visuscopia_extra = (object) [
				'ppc_or' =>  $_POST['ppc_or'],
				'ppc_l' =>  $_POST['ppc_l'],
				'ppc_posicion' =>  $_POST['ppc_posicion'],
				'observaciones' =>  $_POST['observaciones'],
			];

			$json_visuscopia_extra = json_encode($visuscopia_extra);

            $pruebas = (object) [
				'vl_luces' =>  $_POST['vl_luces'],
				'vp_luces' =>  $_POST['vp_luces'],
			];

			$json_pruebas = json_encode($pruebas);

            $pruebas_extra = (object) [
				//'estereopsis' =>  $_POST['estereopsis'],
				'randot' =>  $_POST['randot'],
				'lang' =>  $_POST['lang'],
				//'seg_arco' =>  $_POST['seg_arco'],
				'vision_color' =>  $_POST['vision_color'],
			];

			$json_pruebas_extra = json_encode($pruebas_extra);


            //RECETA FINAL
			$refraccion = (object) [
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

            
			$tipo_lentes = (object) [
				'tipo_l' =>  $_POST['tipo_l'],
				'pd' =>  $_POST['pd'],
				'dnp' =>  $_POST['dnp'],
				'alt' =>  $_POST['alt'],
			];

			$json_tipo_lentes = json_encode($tipo_lentes);


			$lentes_contacto = (object) [
				'poder_od' =>  $_POST['poder_od'],
				'poder_oi' =>  $_POST['poder_oi'],
				'cb_od' =>  $_POST['cb_od'],
				'cb_oi' =>  $_POST['cb_oi'],
				'dia_od' =>  $_POST['dia_od'],
				'dia_oi' =>  $_POST['dia_oi'],
				'lente_marca' =>  $_POST['lente_marca'],
				'lente_tipo' =>  $_POST['lente_tipo'],
			];

			$json_lentes_contacto = json_encode($lentes_contacto);



			

			
			/*$acomodacion = (object) [
				'aa_od' =>  $_POST['aa_od'],
				'aa_oi' =>  $_POST['aa_oi'],
				'fan_od' =>  $_POST['fan_od'],
				'fan_cpm' =>  $_POST['fan_cpm'],
				'aco_oi' =>  $_POST['aco_oi'],
				'aco_cpm' =>  $_POST['aco_cpm'],
				'acp_fab' =>  $_POST['acp_fab'],
				'aco_falla' =>  $_POST['aco_falla'],
			];

			$json_acomodacion = json_encode($acomodacion);


			$acomodacion_extra = (object) [
				'mem_od' =>  $_POST['mem_od'],
				'mem_oi' =>  $_POST['mem_oi'],
				'mem_arn' =>  $_POST['mem_arn'],
				'mem_arp' =>  $_POST['mem_arp'],
			];

			$json_acomodacion_extra = json_encode($acomodacion_extra);*/

		

			//  $tabla = "pacientesmenores";
			date_default_timezone_set('America/Lima');

			$fecha = date('Y-m-d');
			$hora = date('H:i:s');
			$fecha_creacion = $fecha . ' ' . $hora;



			$tabla = "refracciongeneral";


			$datos = array(
				"sucursal" => $sucursal,
				"doctor" => $doctor,
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
				"av_sc" => $json_av_sc,
				"av_cc" => $json_av_cc,
				//"ojo_dominante" => $ojo_dominante,
				//"mano_dominante" => $mano_dominante,
				"lensometria" => $json_lensometria,
				"lensometria_extra" => $json_lensometria_extra,
				"sa_pp" => $json_sa_pp,
				"visuscopia" => $json_visuscopia,
				"visuscopia_extra" => $json_visuscopia_extra,
				"refraccion" => $json_refraccion,
                "tipo_lentes" => $json_tipo_lentes,
				"lentes_contacto" => $json_lentes_contacto,
				"pruebas" => $json_pruebas,
				"pruebas_extra" => $json_pruebas_extra,
				//"acomodacion" => $json_acomodacion,
				//"acomodacion_extra" => $json_acomodacion_extra,
				"conducta_seguir" => $_POST['conducta_seguir'],
                "plan_versiones" => $_POST['plan_versiones'],
				"fecha_creacion" => $fecha_creacion
			);



			//  echo '<pre>'; 
			//  var_dump($datos);
			//  echo '<pre>';


			$respuesta = ModeloRefraccionGeneral::mdlIngresarRefraccionGeneral($tabla, $datos);

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

	static public function ctrMostrarRefraccionGeneral($item, $item2, $valor, $valor2)
	{

		$tabla = "refracciongeneral";

		$respuesta = ModeloRefraccionGeneral::mdlMostrarRefraccionGeneral($tabla, $item, $item2, $valor, $valor2);

		return $respuesta;
	}


	/*=============================================
	MOSTRAR CONSULTA POR ID_PACIENTE
	=============================================*/

	static public function ctrMostrarRefraccionGeneralID($item, $valor)
	{

		$tabla = "refracciongeneral";

		$respuesta = ModeloRefraccionGeneral::mdlMostrarRefraccionGeneralID($tabla, $item, $valor);

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

		$tabla = "refracciongeneral";

		$respuesta = ModeloRefraccionGeneral::mdlVerificarExistencia($tabla, $item, $item2, $valor, $valor2);

		return $respuesta;
	}


	/*=============================================
	EDITAR PACIENTES MENORES
	=============================================*/

	static public function ctrEditarConsultaRefraccionGeneral()
	{





		if (isset($_POST["editar_ortoptica_adultos"])) {



			if ($actualizar = $_POST['actualizar']  == 'exito') {

				$paciente =  $_POST['paciente'];
				$edad =  $_POST['edad'];
				$sucursal =  $_POST['sucursal'];
				$fecha_atencion =  $_POST['fecha_atencion'];
				$m_c =  $_POST['m_c'];
				$ao =  $_POST['a_o'];
				$ap =  $_POST['a_p'];
				$af =  $_POST['a_f'];
				$medicamentos =  $_POST['medicamentos'];
				$tratamientos =  $_POST['tratamientos'];
	
	
				$av_sc = (object) [
					'av_sc_od_vl' =>  $_POST['av/sc_od_vl'],
					'av_sc_oi_vl' =>  $_POST['av/sc_oi_vl'],
					'av_sc_od_vp' =>  $_POST['av/sc_od_vp'],
					'av_sc_oi_vp' =>  $_POST['av/sc_oi_vp'],
				];
	
				$json_av_sc = json_encode($av_sc);
	
	
				$av_cc = (object) [
					'av_cc_od_vl' =>  $_POST['av/cc_od_vl'],
					'av_cc_oi_vl' =>  $_POST['av/cc_oi_vl'],
					'av_cc_od_vp' =>  $_POST['av/cc_od_vp'],
					'av_cc_oi_vp' =>  $_POST['av/cc_oi_vp'],
				];
	
				$json_av_cc = json_encode($av_cc);
	
	
	
				//$ojo_dominante = $_POST['ojo_dominante'];
	
				//$mano_dominante = $_POST['mano_dominante'];
	
	
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
					'len_tipo_arco' =>  $_POST['len_tipo_arco'],
				];
	
	
				$json_lensometria_extra = json_encode($lensometria_extra);
	
	
	
				$sa_pp = (object) [
					'sa_od' =>  $_POST['sa_od'],
					'pp_od' =>  $_POST['pp_od'],
					'sa_oi' =>  $_POST['sa_oi'],
					'pp_oi' =>  $_POST['pp_oi'],
				];
	
				$json_sa_pp = json_encode($sa_pp);
	
	
				$visuscopia = (object) [
					'hirschberg' =>  $_POST['hirschberg'],
					'ct_vl' =>  $_POST['ct_vl'],
					'ct_vp' =>  $_POST['ct_vp'],
				];
	
				$json_visuscopia = json_encode($visuscopia);
	
	
				$visuscopia_extra = (object) [
					'ppc_or' =>  $_POST['ppc_or'],
					'ppc_l' =>  $_POST['ppc_l'],
					'ppc_posicion' =>  $_POST['ppc_posicion'],
					'observaciones' =>  $_POST['observaciones'],
				];
	
				$json_visuscopia_extra = json_encode($visuscopia_extra);
	
	
	
	
				$refraccion = (object) [
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
	
				
				$tipo_lentes = (object) [
					'tipo_l' =>  $_POST['tipo_l'],
					'pd' =>  $_POST['pd'],
					'dnp' =>  $_POST['dnp'],
					'alt' =>  $_POST['alt'],
				];
	
				$json_tipo_lentes = json_encode($tipo_lentes);
	
	
				$lentes_contacto = (object) [
					'poder_od' =>  $_POST['poder_od'],
					'poder_oi' =>  $_POST['poder_oi'],
					'cb_od' =>  $_POST['cb_od'],
					'cb_oi' =>  $_POST['cb_oi'],
					'dia_od' =>  $_POST['dia_od'],
					'dia_oi' =>  $_POST['dia_oi'],
					'lente_marca' =>  $_POST['lente_marca'],
					'lente_tipo' =>  $_POST['lente_tipo'],
				];
	
				$json_lentes_contacto = json_encode($lentes_contacto);
	
	
	
				$pruebas = (object) [
					'vl_luces' =>  $_POST['vl_luces'],
					'vp_luces' =>  $_POST['vp_luces'],
				];
	
				$json_pruebas = json_encode($pruebas);
	
				$pruebas_extra = (object) [
					'estereopsis' =>  $_POST['estereopsis'],
					'randot' =>  $_POST['randot'],
					'lang' =>  $_POST['lang'],
					'seg_arco' =>  $_POST['seg_arco'],
					'vision_color' =>  $_POST['vision_color'],
				];
	
				$json_pruebas_extra = json_encode($pruebas_extra);
	
				/*$acomodacion = (object) [
					'aa_od' =>  $_POST['aa_od'],
					'aa_oi' =>  $_POST['aa_oi'],
					'fan_od' =>  $_POST['fan_od'],
					'fan_cpm' =>  $_POST['fan_cpm'],
					'aco_oi' =>  $_POST['aco_oi'],
					'aco_cpm' =>  $_POST['aco_cpm'],
					'acp_fab' =>  $_POST['acp_fab'],
					'aco_falla' =>  $_POST['aco_falla'],
				];
	
				$json_acomodacion = json_encode($acomodacion);
	
	
				$acomodacion_extra = (object) [
					'mem_od' =>  $_POST['mem_od'],
					'mem_oi' =>  $_POST['mem_oi'],
					'mem_arn' =>  $_POST['mem_arn'],
					'mem_arp' =>  $_POST['mem_arp'],
				];
	
				$json_acomodacion_extra = json_encode($acomodacion_extra);*/
	
			
	
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
	
	
	
				$tabla = "refracciongeneral";
	
	
				$datos = array(
					"id_consulta" => $_POST['id_consulta'],
					"paciente" => $paciente,
					"edad" => $edad,
					"sucursal" => $sucursal,
					"fecha_atencion" => $fecha_atencion,
					"m_c" => $m_c,
					"a_o" => $ao,
					"a_p" => $ap,
					"a_f" => $af,
					"medicamentos" => $medicamentos,
					"tratamientos" => $tratamientos,
					"av_sc" => $json_av_sc,
					"av_cc" => $json_av_cc,
					//"ojo_dominante" => $ojo_dominante,
					//"mano_dominante" => $mano_dominante,
					"lensometria" => $json_lensometria,
					"lensometria_extra" => $json_lensometria_extra,
					"sa_pp" => $json_sa_pp,
					"visuscopia" => $json_visuscopia,
					"visuscopia_extra" => $json_visuscopia_extra,
					"refraccion" => $json_refraccion,
					"tipo_lentes" => $json_tipo_lentes,
					"lentes_contacto" => $json_lentes_contacto,
					"pruebas" => $json_pruebas,
					"pruebas_extra" => $json_pruebas_extra,
					//"acomodacion" => $json_acomodacion,
					//"acomodacion_extra" => $json_acomodacion_extra,
					"conducta_seguir" => $_POST['conducta_seguir'],
                    "plan_versiones" => $_POST['plan_versiones'],
					"editado" => $json_editado
				);
	



				//  echo '<pre>';
				//  var_dump($datos);  
				//  echo '</pre>';




				$respuesta = ModeloRefraccionGeneral::mdlEditarConsultaRefraccionGeneral($tabla, $datos);


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

		if (isset($_GET["borrar_consultaRefraccion"])) {

			$tabla = "refracciongeneral";
			$datos = $_GET["borrar_consultaRefraccion"];

			$respuesta = ModeloRefraccionGeneral::mdlEliminarConsulta($tabla, $datos);

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
