
<?php

class ControladorTerapiasBajaVision
{

	/*=============================================
	CREAR TERAPIA BAJA VISION
	=============================================*/

	static public function ctrCrearTerapiaBajaVision()
	{


		if (isset($_POST["crear_terapiaBV"])) {





			date_default_timezone_set('America/Lima');

			$fecha = date('Y-m-d');
			$hora = date('H:i:s');
			$fecha_creacion = $fecha . ' ' . $hora;



			$tabla = "terapias_bajav";


			$datos =  array(
				"id_paciente" => $_POST['id_paciente'],
				"fecha_creacion" => $fecha_creacion
			);



			//  echo '<pre>'; 
			//  var_dump($datos);
			//  echo '<pre>';


			$respuesta = ModeloTerapiasBajaVision::mdlIngresarTerapiaBajaVision($tabla, $datos);

			//  var_dump($respuesta);

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





			$tabla = "terapias_bajav";


			$datos =  array(
				"id_terapia" => $_POST['id_terapia'],
				"motivo" => $_POST['motivo']
			);



			//  echo '<pre>'; 
			//  var_dump($datos);
			//  echo '<pre>';


			$respuesta = ModeloTerapiasBajaVision::mdlActualizarMotivoTerapia($tabla, $datos);

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

										window.location = "index.php?ruta=terapiasBajaVision&id_terapia="+' . $_POST['id_terapia'] . '+"&id_paciente=' . $_GET['id_paciente'] . '";
									}
								})

					</script>';
			}
		}
	}









	/*=============================================
	MOSTRAR TERAPIAS
	=============================================*/

	static public function ctrMostrarTerapiaBajaVision($item, $valor)
	{

		$tabla = "terapias_bajav";

		$respuesta = ModeloTerapiasBajaVision::mdlMostrarTerapiaBajaVision($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	MOSTRAR TERAPIA POR ID
	=============================================*/

	static public function ctrMostrarTerapiaGeneralBajaVisionID($item, $valor)
	{

		$tabla = "terapias_bajav";

		$respuesta = ModeloTerapiasBajaVision::mdlMostrarTerapiaBajaVisionID($tabla, $item, $valor);

		return $respuesta;
	}




	/*=============================================
	ELIMINAR SUCURSAL
	=============================================*/


	static public function ctrEliminarSucursal()
	{

		if (isset($_GET["borrar_sucursal"])) {

			$tabla = "sucursales";
			$datos = $_GET["borrar_sucursal"];

			$respuesta = ModeloTerapiasBajaVision::mdlEliminarTerapiaBajaVision($tabla, $datos);

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
