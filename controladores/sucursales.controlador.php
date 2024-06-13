
<?php

class ControladorSucursales{

	/*=============================================
	CREAR CONSULTA
	=============================================*/

	static public function ctrCrearSucursal(){


		if(isset($_POST["crear_sucursal"])){
			

			   

		
				 date_default_timezone_set('America/Lima');

				 $fecha = date('Y-m-d');
				 $hora = date('H:i:s');
				 $fecha_creacion = $fecha.' '.$hora;
				


				 $tabla = "sucursales";


			   	$datos =  array("nombre"=>$_POST['nuevoNombre'],
                                "ubicacion"=>$_POST['nuevaUbicacion'],
                                "fecha_creacion"=>$fecha_creacion);
							
							
					 
				//  echo '<pre>'; 
                //  var_dump($datos);
				//  echo '<pre>';
							

			   	$respuesta = ModeloSurcursales::mdlIngresarSucursal($tabla, $datos);

				//  var_dump($respuesta);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La sucursal ha sido creada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

										
								window.location = "index.php?ruta=sucursales";

									}
								})

					</script>';

				}

		

		}

	}





	
	/*=============================================
	MOSTRAR SUCURSALES
	=============================================*/

	static public function ctrMostrarSurcursales($item, $valor){

		$tabla = "sucursales";

		$respuesta = ModeloSurcursales::mdlMostrarSurcursales($tabla, $item, $valor);

		return $respuesta;

	}

		/*=============================================
	MOSTRAR NOMBRE SUCURSALES
	=============================================*/

	static public function ctrMostrarNombreSurcursales($itemS, $valorS){

		$tabla = "sucursales";

		$respuesta = ModeloSurcursales::mdlMostrarNombreSurcursales($tabla, $itemS, $valorS);

		return $respuesta;

	}


	/*=============================================
	EDITAR PACIENTES MENORES
	=============================================*/

	static public function ctrEditarSucursales(){

		$tabla = "sucursales";
		


		if(isset($_POST["editar_sucursal"])){

		

			if($actualizar = $_POST['actualizar']  == 'exito'){

			
	


				 $tabla = "sucursales";


			   	$datos =  array("id_sucursal"=>$_POST['id_sucursal'],
					            "nombre"=>$_POST['editarNombre'],
                                "ubicacion"=>$_POST['editarUbicacion']);
                               
				
							
				            
                    //  echo '<pre>';
					//  var_dump($datos);  
					//  echo '</pre>';
			
			 

      
         	$respuesta = ModeloSurcursales::mdlEditarSucursal($tabla, $datos);


	
      
      	if($respuesta == "ok"){
      
      	 echo'<script>
      
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
	ELIMINAR SUCURSAL
	=============================================*/


	static public function ctrEliminarSucursal(){

		if(isset($_GET["borrar_sucursal"])){

			$tabla ="sucursales";
			$datos = $_GET["borrar_sucursal"];

			$respuesta = ModeloSurcursales::mdlEliminarSucursal($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

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

