<?php

class ControladorPacientes
{

	/*=============================================
	CREAR PACIENTES
	=============================================*/

	static public function ctrCrearPaciente()
	{


		if (isset($_POST["nombres"])) {


			if (
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombres"]) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["apellidos"])
			) {



				$tabla = "pacientes";

				$urgencia = (object) [
					'nombre_ur' =>  $_POST['nombre_ur'],
					'parentesco_ur' =>  $_POST['parentesco_ur'],
					'nro_ur' =>  $_POST['nro_ur'],
				];

				$json_urgencia = json_encode($urgencia);

				$menor = (object) [
					'responsable' =>  $_POST['responsable'],
					'parentesco' =>  $_POST['parentesco'],
					'nro_celular_responsable' =>  $_POST['nro_celular_responsable'],
					'remitido' =>  $_POST['remitido'],
				];

				$json_menor = json_encode($menor);

				date_default_timezone_set('America/Lima');

				$fecha = date('Y-m-d');
				$hora = date('H:i:s');
				$fecha_creacion = $fecha . ' ' . $hora;


				$datos = array(
					"sucursal" => $_POST['sucursal'],
					"doctor" => $_POST['doctor'],
					"nombres" => $_POST["nombres"],
					"apellidos" => $_POST["apellidos"],
					"nro_cedula" => $_POST["nro_cedula"],
					"email" => $_POST["email"],
					"nro_seguro" => $_POST["nro_seguro"],
					"fecha_nacimiento" => $_POST["fecha_nacimiento"],
					"genero" => $_POST["genero"],
					"lugar_nacimiento" => $_POST["lugar_nacimiento"],
					"direccion" => $_POST["direccion"],
					"ocupacion" => $_POST["ocupacion"],
					"telefono" => $_POST["telefono"],
					"celular" => $_POST["celular"],
					"medico" => $_POST["medico_cabecera"],
					"urgencia" => $json_urgencia,
					"menor" => $json_menor,
					"fecha_creacion" => $fecha_creacion,
				);

				// var_dump($datos);				

				$respuesta = ModeloPacientes::mdlIngresarPaciente($tabla, $datos);

				// Mostrar la alerta siempre, independientemente de la respuesta
            echo '<script>
                    swal({
                        type: "' . ($respuesta == "ok" ? "success" : "error") . '",
                        title: "' . ($respuesta == "ok" ? "El paciente ha sido guardado correctamente" : "Error al guardar el paciente") . '",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result){
                        if (result.value) {
                            //window.location = "index.php?ruta=historia-paciente&id_paciente=' . $_GET['id_paciente'] . '";
                            window.location = "crear-paciente";
                        }
                    });
                </script>';
        } else {
            echo '<script>
                    swal({
                        type: "error",
                        title: "¡El paciente no puede ir vacío o llevar caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result){
                        if (result.value) {
                            window.location = "crear-paciente";
                        }
                    });
                </script>';
        }
		}
	}


	/*=============================================
	SUBIDA DE DOCUMENTOS
	=============================================*/

	static public function ctrSubirDocumentoPaciente()
	{

		if (isset($_POST["nuevoDocumento"])) {



			$documento_url = "";




			if (isset($_FILES['documento']['tmp_name'])) {


				$formateadoN = str_replace(" ", "", $_POST['nombrePaciente']);

				$formateadoA = str_replace(" ", "", $_POST['apellidoPaciente']);

				// var_dump($formateadoN);
				// $paciente = $_POST['nombrePaciente'].''.$_POST['id_paciente'];

				//    $directorio = 'vistas/img/documentos_pacientes/'.$_POST['nombrePaciente'].''.$_POST['apellidos'].'/';

				$directorio = 'vistas/img/documentos_pacientes/' . $formateadoN . $formateadoA . '/';
				// valida si existe o no un directorio y si no existe lo crea
				if (!is_dir($directorio)) {
					mkdir($directorio, 0755, true);
				}
				if (!file_exists($directorio . $_FILES['documento']['name'])) {

					if (move_uploaded_file($_FILES['documento']['tmp_name'], $directorio . $_FILES['documento']['name'])) {
						$documento_url = $_FILES['documento']['name'];

						ini_set('upload_max_filesize', '10M');
						ini_set('post_max_size', '10M');
						ini_set('max_execution_time', 300);
					}


					date_default_timezone_set('America/Lima');

					$fecha = date('Y-m-d');

					$tabla = "documentos_pacientes";

					$url = $directorio . '' . $documento_url;

					// var_dump($url);



					$datos = array(
						"url" => $url,
						"nombre" => $documento_url,
						"id_paciente" => $_POST['id_paciente'],
						"fecha" => $fecha
					);



					// var_dump($datos);				



					$respuesta = ModeloPacientes::mdlSubirDocumentoPaciente($tabla, $datos);



					if ($respuesta == "ok") {

						echo '<script>

					Swal.fire({

					
						title: "¡El documento  ha sido guardado correctamente!",
						type: "success",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){

							window.location = "index.php?ruta=historia-paciente&id_paciente="+' . $_POST['id_paciente'] . ';
							
					
						}

					});
				

					</script>';
					}
				} else {

					echo '<script>
				    swal({
					type: "error",
					title: "¡El documento ya existe en la base de datos!",
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
	}


	/*=============================================
	MOSTRAR DOCUMENTOS
	=============================================*/

	static public function ctrMostrarDocumentos($item, $valor)
	{

		$tabla = "documentos_pacientes";

		$respuesta = ModeloPacientes::mdlMostrarDocumentos($tabla, $item, $valor);

		return $respuesta;
	}





	/*=============================================
	MOSTRAR PACIENTES
	=============================================*/

	static public function ctrMostrarPacientes($item, $valor)
	{

		$tabla = "pacientes";

		$respuesta = ModeloPacientes::mdlMostrarPacientes($tabla, $item, $valor);

		return $respuesta;
	}
	
	//Mostrar Listado de Pacientes - Nuevo
	static public function ctrMostrarListadoPacientes($item, $valor)
	{

		$tabla = "pacientes";

		$respuesta = ModeloPacientes::mdlMostrarListadoPacientes($tabla, $item, $valor);

		return $respuesta;
	}

	//Mostrar Listado de Paginate Pacientes - Nuevo
	static public function ctrMostrarListadoPacientesPaginate($item, $valor, $paginate, $txt_filtro)
	{
		// $txt_filtro = "";
		$tabla = "pacientes";
		$respuesta = ModeloPacientes::mdlMostrarListadoPacientesPaginate($tabla, $item, $valor, $paginate, $txt_filtro);

		return $respuesta;
	}


	/*=============================================
	MOSTRAR PACIENTES
	=============================================*/

	static public function ctrMostrarPacientesSucursal($item, $item2, $valor, $valor2)
	{

		$tabla = "pacientes";

		$respuesta = ModeloPacientes::mdlMostrarPacientesSucursal($tabla, $item, $item2, $valor, $valor2);

		return $respuesta;
	}
	
	//Mostrar lostado de pacientes sucursal - Nuevo
	static public function ctrMostrarListadoPacientesSucursal($item, $item2, $valor, $valor2)
	{

		$tabla = "pacientes";

		$respuesta = ModeloPacientes::mdlMostrarListadoPacientesSucursal($tabla, $item, $item2, $valor, $valor2);

		return $respuesta;
	}


	/*=============================================
	MOSTRAR ULTIMO PACIENTE
	=============================================*/

	static public function ctrMostrarUltimoCliente($item, $valor)
	{

		$tabla = "clientes";

		$respuesta = ModeloClientes::mdlMostrarUltimoCliente($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	EDITAR PACIENTE
	=============================================*/

	static public function ctrEditarPaciente()
	{



		if (isset($_POST["id_paciente"])) {


			if ($actualizar = $_POST['actualizar']  == 'exito') {


				$tabla = "pacientes";


				$urgencia = (object) [
					'nombre_ur' =>  $_POST['nombre_ur'],
					'parentesco_ur' =>  $_POST['parentesco_ur'],
					'nro_ur' =>  $_POST['nro_ur'],
				];

				$json_urgencia = json_encode($urgencia);

				$menor = (object) [
					'responsable' =>  $_POST['responsable'],
					'parentesco' =>  $_POST['parentesco'],
					'nro_celular_responsable' =>  $_POST['nro_celular_responsable'],
					'remitido' =>  $_POST['remitido'],

				];

				$json_menor = json_encode($menor);
				// date_default_timezone_set('America/Lima');

				// $fecha = date('Y-m-d');
				// $hora = date('H:i:s');
				// $fecha_creacion = $fecha.' '.$hora;

				$datos = array(
					"id_paciente" => $_POST["id_paciente"],
					"nombres" => $_POST["nombres"],
					"apellidos" => $_POST["apellidos"],
					"nro_cedula" => $_POST["nro_cedula"],
					"email" => $_POST["email"],
					"nro_seguro" => $_POST["nro_seguro"],
					"fecha_nacimiento" => $_POST["fecha_nacimiento"],
					"genero" => $_POST["genero"],
					"lugar_nacimiento" => $_POST["lugar_nacimiento"],
					"direccion" => $_POST["direccion"],
					"ocupacion" => $_POST["ocupacion"],
					"telefono" => $_POST["telefono"],
					"celular" => $_POST["celular"],
					"medico" => $_POST["medico_cabecera"],
					"urgencia" => $json_urgencia,
					"menor" => $json_menor
				);




				//    var_dump($datos);

				$respuesta = ModeloPacientes::mdlEditarPaciente($tabla, $datos);

				if ($respuesta == "ok") {

					echo '<script>
      
      	 swal({
      		   type: "success",
      		   title: "El paciente ha sido actualizado correctamente",
      		   showConfirmButton: true,
      		   confirmButtonText: "Cerrar"
      		   }).then(function(result){
      					 if (result.value) {
      
      					 //window.location = " lista-pacientes";
      					 window.location = "index.php?ruta=historia-paciente&id_paciente="+' . $_GET['id_paciente'] . ';
      
      					 }
      				 })
      
      	 </script>';
				}
			} else {

				echo '<script>
      
      	 swal({
      		   type: "error",
      		   title: "¡El paciente no puede ir vacío o llevar caracteres especiales!",
      		   showConfirmButton: true,
      		   confirmButtonText: "Cerrar"
      		   }).then(function(result){
      			 if (result.value) {
      
      			 
	               window.location = "index.php?ruta=editar-paciente&id_paciente="+' . $_GET['id_paciente'] . ';
      
      			 }
      		 })
      
         </script>';
			}
		}
	}

	/*=============================================
	ELIMINAR PACIENTE
	=============================================*/

	static public function ctrEliminarPaciente()
	{

		if (isset($_GET["borrar_paciente"])) {

			$tabla = "pacientes";
			$datos = $_GET["borrar_paciente"];

			$respuesta = ModeloPacientes::mdlEliminarPaciente($tabla, $datos);

			if ($respuesta == "ok") {


				echo '<script>

				swal({
					  type: "success",
					  title: "El paciente ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result){
								if (result.value) {

								window.location = "lista-pacientes";

								}
							})

				</script>';
			}
		}
	}






	/*=============================================
	ELIMINAR PACIENTE
	=============================================*/

	static public function ctrEliminarDocumento()
	{

		if (isset($_GET["borrar_documento"])) {

			$tabla = "documentos_pacientes";
			$datos = $_GET["borrar_documento"];
			$nombre = $_GET["nombre"];

			$item = 'id_paciente';
			$valor = $_GET['id_paciente'];

			$paciente = ControladorPacientes::ctrMostrarPacientes($item, $valor);
            
			$formateadoN = str_replace(" ", "", $paciente['nombres']);

			$formateadoA = str_replace(" ", "", $paciente['apellidos']);



			$respuesta = ModeloPacientes::mdlEliminarDocumento($tabla, $datos);

			if ($_GET['nombre']) {
				unlink('vistas/img/documentos_pacientes/' . $formateadoN . $formateadoA . '/' . $nombre . '');
			}

			if ($respuesta == "ok") {

				// if(){

				// }

				// unlink($_GET["fotoUsuario"]);
				// // rmdir('vistas/img/usuarios/'.$_GET["usuario"]);



				echo '<script>

				swal({
					  type: "success",
					  title: "El documento ha sido borrado correctamente",
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
