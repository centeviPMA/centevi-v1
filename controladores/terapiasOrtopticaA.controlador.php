
<?php

class ControladorTerapiasOrtopticaAdultos
{

	/*=============================================
	CREAR TERAPIA ORTOPTICA ADULTOS
	=============================================*/

	static public function ctrCrearTerapiaOrtopticaAdultos()
	{


		if (isset($_POST["crear_ortoptica_adultos"])) {





			date_default_timezone_set('America/Lima');

			$fecha = date('Y-m-d');
			$hora = date('H:i:s');
			$fecha_creacion = $fecha . ' ' . $hora;



			$tabla = "terapias_ortoptica_adultos";


			$datos =  array(
				"id_paciente" => $_POST['id_paciente'],
				"fecha_creacion" => $fecha_creacion
			);



			//  echo '<pre>'; 
			//  var_dump($datos);
			//  echo '<pre>';


			$respuesta = ModeloTerapiasOrtopticaAdultos::mdlIngresarTerapiaOrtopticaAdultos($tabla, $datos);

			var_dump($respuesta);

			if ($respuesta == "ok") {

				echo '<script>

					swal({
						  type: "success",
						  title: "La terapia ha sido creada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

										
									window.location = "index.php?ruta=historia-paciente&id_paciente="+' . $_POST['id_paciente'] . ';
      

									}
								})

					</script>';
			}
		}
	}


	
	/*=============================================
	ACTUALIZAR MOTIVO TERAPIA
	=============================================*/

	static public function ctrActualizarMotivoTerapia()
	{


		if (isset($_POST["actualizar_motivo"])) {





			$tabla = "terapias_ortoptica_adultos";


			$datos =  array(
				"id_terapia" => $_POST['id_terapia'],
				"motivo" => $_POST['motivo']
			);



			//  echo '<pre>'; 
			//  var_dump($datos);
			//  echo '<pre>';


			$respuesta = ModeloTerapiasOrtopticaAdultos::mdlActualizarMotivoTerapia($tabla, $datos);

			//  var_dump($respuesta);

			if ($respuesta == "ok") {

				echo '<script>

					swal({
						  type: "success",
						  title: "El motivo fue actualizado correctamente",
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
	MOSTRAR TERAPIAS
	=============================================*/

	static public function ctrMostrarTerapiaOrtopticaAdultos($item, $valor)
	{

		$tabla = "terapias_ortoptica_adultos";

		$respuesta = ModeloTerapiasOrtopticaAdultos::mdlMostrarTerapiaOrtopticaAdultos($tabla, $item, $valor);

		return $respuesta;
	}



	/*=============================================
	MOSTRAR TERAPIAS ID
	=============================================*/

	static public function ctrMostrarTerapiaOrtopticaAdultosID($item, $valor)
	{

		$tabla = "terapias_ortoptica_adultos";

		$respuesta = ModeloTerapiasOrtopticaAdultos::mdlMostrarTerapiaOrtopticaAdultosID($tabla, $item, $valor);

		return $respuesta;
	}


	/*=============================================
	EDITAR PACIENTES MENORES
	=============================================*/

	static public function ctrEditarTerapiaOrtopticaAdultos()
	{

		$tabla = "sucursales";



		if (isset($_POST["editar_sucursal"])) {



			if ($actualizar = $_POST['actualizar']  == 'exito') {





				$tabla = "sucursales";


				$datos =  array(
					"id_sucursal" => $_POST['id_sucursal'],
					"nombre" => $_POST['editarNombre'],
					"ubicacion" => $_POST['editarUbicacion'],
					"estado" => $_POST['editarEstado']
				);



				//  echo '<pre>';
				//  var_dump($datos);  
				//  echo '</pre>';




				$respuesta = ModeloTerapiasOrtopticaAdultos::mdlEditarTerapiaOrtopticaAdultos($tabla, $datos);




				if ($respuesta == "ok") {

					echo '<script>
      
      	 swal({
      		   type: "success",
      		   title: "La sucursal ha sido actualizada correctamente",
      		   showConfirmButton: true,
      		   confirmButtonText: "Cerrar"
      		   }).then(function(result){
      					 if (result.value) {
      
							window.location = "index.php?ruta=sucursales";
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
	ELIMINAR SUCURSAL
	=============================================*/


	static public function ctrEliminarSucursal()
	{

		if (isset($_GET["borrar_sucursal"])) {

			$tabla = "sucursales";
			$datos = $_GET["borrar_sucursal"];

			$respuesta = ModeloTerapiasOrtopticaAdultos::mdlEliminarTerapiaOrtopticaAdultos($tabla, $datos);

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

									window.location = "index.php?ruta=sucursales";
								}
							})

				</script>';
			}
		}
	}
}
