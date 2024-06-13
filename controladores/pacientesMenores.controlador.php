
<?php

class ControladorPacientesMenores{

	/*=============================================
	CREAR PACIENTES
	=============================================*/

	static public function ctrCrearPacienteMenor(){


		if(isset($_POST["nombres"])){
			

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombres"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["apellidos"]) ){
			
		      

			   	 $tabla = "pacientesmenores";
				 date_default_timezone_set('America/Lima');

				 $fecha = date('Y-m-d');
				 $hora = date('H:i:s');
				 $fecha_creacion = $fecha.' '.$hora;

			   	$datos = array("nombres"=>$_POST["nombres"],
					           "apellidos"=>$_POST["apellidos"],
							   "nro_cedula"=>$_POST["nro_cedula"],
					           "nro_seguro"=>$_POST["nro_seguro"],
							   "fecha_nacimiento"=>$_POST["fecha_nacimiento"],
					           "genero"=>$_POST["genero"],
							   "lugar_nacimiento"=>$_POST["lugar_nacimiento"],
					           "direccion"=>$_POST["direccion"],
					           "medico_cabecera"=>$_POST["medico_cabecera"],
							   "responsable"=>$_POST["responsable"],
                               "parentesco"=>$_POST["parentesco"],
                               "nro_celular_responsable"=>$_POST["nro_celular_responsable"],
                               "otro_nro_responsable"=>$_POST["otro_nro_responsable"],
                               "alergias"=>$_POST["alergias"],
                               "urg_responsable"=>$_POST["urg_responsable"],
                               "urg_parentesto"=>$_POST["urg_parentesto"],
                               "urg_celular"=>$_POST["urg_celular"],
							   "fecha_creacion"=>$fecha_creacion,
							);
							
							

			   	$respuesta = ModeloPacientesMenores::mdlIngresarPacienteMenor($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El paciente ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = " lista-pacientes-menores";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El paciente no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "crear-paciente";

							}
						})

			  	</script>';



			}

		}

	}



	
	/*=============================================
	CREAR CLIENTES MODAL
	=============================================*/

	static public function ctrCrearClienteModal(){

		if(isset($_POST["nombre_cliente"])){

			$direccion = $_POST["direccion_depositos"];

			$direccion_depositos = json_encode($direccion);

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombre_cliente"]) &&
			   preg_match('/^[0-9]+$/', $_POST["num_interno"]) &&
			   preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["nombre_cliente"]) &&
			   preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["direccion_central"]) &&
		       preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["direccion_depositos"])){

			   	$tabla = "clientes";

			   	$datos = array("num_interno"=>$_POST["num_interno"],
					           "nombre_cliente"=>$_POST["nombre_cliente"],
							   "razon"=>$_POST["razon"],
					           "responsable_pedidos"=>$_POST["responsable_pedidos"],
							   "numero_responsable"=>$_POST["numero_responsable"],
					           "direccion_central"=>$_POST["direccion_central"],
							   "direccion_cobranza"=>$_POST["direccion_cobranza"],
					           "direccion_depositos"=>$direccion_depositos,
							   "numero_contacto"=>$_POST["numero_contacto"],
					           "referencias"=>$_POST["referencias"]);

			   	$respuesta = ModeloClientes::mdlIngresarCliente($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El cliente ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "crear-rPedido";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El cliente no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "crear-pedido";

							}
						})

			  	</script>';



			}

		}

	}


	/*=============================================
	MOSTRAR CLIENTES
	=============================================*/

	static public function ctrMostrarPacientes($item, $valor){

		$tabla = "pacientesmenores";

		$respuesta = ModeloPacientesMenores::mdlMostrarPacientes($tabla, $item, $valor);

		return $respuesta;

	}

	
	/*=============================================
	MOSTRAR ULTIMO CLIENTE
	=============================================*/

	static public function ctrMostrarUltimoCliente($item, $valor){

		$tabla = "clientes";

		$respuesta = ModeloClientes::mdlMostrarUltimoCliente($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	EDITAR PACIENTES MENORES
	=============================================*/

	static public function ctrEditarPacientes(){

		$tabla = "pacientesmenores";
		


		if(isset($_POST["id_paciente"])){

		

			if($actualizar = $_POST['actualizar']  == 'exito'){

			

				$datos = array("id_paciente"=>$_POST["id_paciente"],
			    "nombres"=>$_POST["nombres"],
				"apellidos"=>$_POST["apellidos"],
				"nro_cedula"=>$_POST["nro_cedula"],
				"nro_seguro"=>$_POST["nro_seguro"],
				"fecha_nacimiento"=>$_POST["fecha_nacimiento"],
				"genero"=>$_POST["genero"],
				"lugar_nacimiento"=>$_POST["lugar_nacimiento"],
				"direccion"=>$_POST["direccion"],
				"medico_cabecera"=>$_POST["medico_cabecera"],
				"responsable"=>$_POST["responsable"],
				"parentesco"=>$_POST["parentesco"],
				"nro_celular_responsable"=>$_POST["nro_celular_responsable"],
				"otro_nro_responsable"=>$_POST["otro_nro_responsable"],
				"alergias"=>$_POST["alergias"],
				"urg_responsable"=>$_POST["urg_responsable"],
				"urg_parentesto"=>$_POST["urg_parentesto"],
				"urg_celular"=>$_POST["urg_celular"]);
				
			
			 

      
      	$respuesta = ModeloPacientesMenores::mdlEditarPaciente($tabla, $datos);
      
      	if($respuesta == "ok"){
      
      	 echo'<script>
      
      	 swal({
      		   type: "success",
      		   title: "El cliente ha sido actualizado correctamente",
      		   showConfirmButton: true,
      		   confirmButtonText: "Cerrar"
      		   }).then(function(result){
      					 if (result.value) {
      
      					 window.location = " lista-pacientes-menores";
      
      					 }
      				 })
      
      	 </script>';
      
       }
      
      }else{
      
       echo'<script>
      
      	 swal({
      		   type: "error",
      		   title: "¡El cliente no puede ir vacío o llevar caracteres especiales!",
      		   showConfirmButton: true,
      		   confirmButtonText: "Cerrar"
      		   }).then(function(result){
      			 if (result.value) {
      
					window.location = "index.php?ruta=editar-paciente-menor&id_paciente="+'.$_GET['id_paciente'].';
      
      			 }
      		 })
      
         </script>';
      
      
      
       }
      
     }
      
   }

	/*=============================================
	ELIMINAR PACIENTE MENOR
	=============================================*/


	static public function ctrEliminarPaciente(){

		if(isset($_GET["borrar_paciente"])){

			$tabla ="pacientesmenores";
			$datos = $_GET["borrar_paciente"];

			$respuesta = ModeloPacientesMenores::mdlEliminarPaciente($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El paciente ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result){
								if (result.value) {

								window.location = "lista-pacientes-menores";

								}
							})

				</script>';

			}		

		}

	}

}

