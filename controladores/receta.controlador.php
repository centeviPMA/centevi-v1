
<?php

class ControladorRecetas{

	/*=============================================
	CREAR RECETA
	=============================================*/

	static public function ctrCrearReceta(){


		if(isset($_POST["crear_receta"])){


			
	   

             $paciente = $_POST['paciente'];

			 $nro_receta = $_POST['nro_receta'];

			 $direccion = $_POST['direccion'];

			 $cedula = $_POST['cedula'];

			 $telefono = $_POST['telefono'];
                      
            $rx = (object) [
                'esfera_od' =>  $_POST['esfera_od'],
                'cilindro_od' =>  $_POST['cilindro_od'],
                'eje_od' =>  $_POST['eje_od'],
                'add_od' =>  $_POST['add_od'],
                'prisma_od' =>  $_POST['prisma_od'],
                'distancia_od' =>  $_POST['distancia_od'],
                'altura_od' =>  $_POST['altura_od'],
                'esfera_oi' =>  $_POST['esfera_oi'],
                'cilindro_oi' =>  $_POST['cilindro_oi'],
                'eje_oi' =>  $_POST['eje_oi'],
                'add_oi' =>  $_POST['add_oi'],
                'prisma_oi' =>  $_POST['prisma_oi'],
                'distancia_oi' =>  $_POST['distancia_oi'],
                'altura_oi' =>  $_POST['altura_oi'],
              ];

              $json_rx = json_encode($rx);

			  $tipo_lente = $_POST['tipo_lente_r'];



              $material = (object) [
                'material_1' =>  $_POST['material_1'],
                'gris_m' =>  $_POST['gris_m'],
                'cafe_m' =>  $_POST['cafe_m'],
                'material_2' =>  $_POST['material_2'],
              ];

              $json_material = json_encode($material);

              $tratamientos = (object) [
                'transitions' =>  $_POST['transitions'],
                'filtro_a' =>  $_POST['filtro_a'],
                'gris_t' =>  $_POST['gris_t'],
                'cafe_t' =>  $_POST['cafe_t'],
				'fotocromatico' =>  $_POST['fotocromatico'],
				'antireflejo' =>  $_POST['antireflejo'],
				'espejado' =>  $_POST['espejado'],
				'uv' =>  $_POST['uv'],
				'tinte' =>  $_POST['tinte'],
				'degradante' =>  $_POST['degradante'],
				'uniforme' =>  $_POST['uniforme'],
				'color_t' =>  $_POST['color_t'],
				'intensidad_t' =>  $_POST['intensidad_t'],
		
              ];

              $json_tratamientos = json_encode($tratamientos);


              $aro_propio = (object) [
                'aro_centevi' =>  $_POST['aro_centevi'],
				'propio' =>  $_POST['propio'],
        		'codigo_aro' =>  $_POST['codigo_aro'],
				'color_aro' =>  $_POST['color_aro'],
				'marca' =>  $_POST['marca'],
				'doctor' =>  $_POST['doctor'],
				'elaborado' =>  $_POST['elaborado'],
              ];

              $json_aro_propio = json_encode($aro_propio);

			  $observacion = $_POST['observacion'];


              $medidas = (object) [
                'alto_l' =>  $_POST['alto_l'],
                'ancho_b_l' =>  $_POST['ancho_b_l'],
                'separacion_l' =>  $_POST['separacion_l'],
				'diagonal_l' =>  $_POST['diagonal_l'],
              ];

              $json_medidas = json_encode($medidas);


             

            


		
				 date_default_timezone_set('America/Lima');

				 $fecha = date('Y-m-d');
				 $hora = date('H:i:s');
				 $fecha_creacion = $fecha.' '.$hora;
				


				 $tabla = "receta";


			   	$datos =  array("id_paciente"=>$paciente,
                                 "nro_receta"=>$nro_receta,
                                 "direccion"=>$direccion,
                                 "cedula"=>$cedula,
                                 "telefono"=>$telefono,
                                 "rx"=>$json_rx,
                                 "tipo_lente"=>$tipo_lente,
                                 "material"=>$json_material,
                                 "tratamientos"=>$json_tratamientos,
								 "aro_propio"=>$json_aro_propio,
								 "observacion"=>$observacion,
								 "medidas"=>$json_medidas,
								 "sucursal"=>$_POST['sucursal'],
                                 "doctor"=>$_POST['doctor'],
                                 "fecha_creacion"=>$fecha_creacion);
							
							
					 
				//  echo '<pre>'; 
                //  var_dump($datos);
				//  echo '<pre>';
							

			   	$respuesta = ModeloRecetas::mdlIngresarReceta($tabla, $datos);

				//  var_dump($respuesta);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La receta ha sido creada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

										
								window.location = "index.php?ruta=recetas";

									}
								})

					</script>';

				}

		

		}

	}





	
	/*=============================================
	MOSTRAR SUCURSALES
	=============================================*/

	static public function ctrMostrarRecetas($item, $valor){

		$tabla = "receta";

		$respuesta = ModeloRecetas::mdlMostrarRecetas($tabla, $item, $valor);

		return $respuesta;

	}

		/*=============================================
	MOSTRAR NOMBRE RECETAS
	=============================================*/

	static public function ctrMostrarNombreSurcursales($itemS, $valorS){

		$tabla = "sucursales";

		$respuesta = ModeloSurcursales::mdlMostrarNombreSurcursales($tabla, $itemS, $valorS);

		return $respuesta;

	}


	/*=============================================
	EDITAR RECETA
	=============================================*/

	static public function ctrEditarReceta(){

	
		


		if(isset($_POST["editar_receta"])){

		

			if($actualizar = $_POST['actualizar']  == 'exito'){

			
				 $tabla = "receta";

				 $paciente = $_POST['paciente'];

				 $nro_receta = $_POST['nro_receta'];
	
				 $direccion = $_POST['direccion'];
	
				 $cedula = $_POST['cedula'];
	
				 $telefono = $_POST['telefono'];
						  
				$rx = (object) [
					'esfera_od' =>  $_POST['esfera_od'],
					'cilindro_od' =>  $_POST['cilindro_od'],
                    'eje_od' =>  $_POST['eje_od'],
					'add_od' =>  $_POST['add_od'],
					'prisma_od' =>  $_POST['prisma_od'],
					'distancia_od' =>  $_POST['distancia_od'],
					'altura_od' =>  $_POST['altura_od'],
					'esfera_oi' =>  $_POST['esfera_oi'],
					'cilindro_oi' =>  $_POST['cilindro_oi'],
                    'eje_oi' =>  $_POST['eje_oi'],
					'add_oi' =>  $_POST['add_oi'],
					'prisma_oi' =>  $_POST['prisma_oi'],
					'distancia_oi' =>  $_POST['distancia_oi'],
					'altura_oi' =>  $_POST['altura_oi'],
				  ];
	
				  $json_rx = json_encode($rx);
	
				  $tipo_lente = $_POST['tipo_lente_r'];
	
	
	
				  $material = (object) [
					'material_1' =>  $_POST['material_1'],
					'gris_m' =>  $_POST['gris_m'],
					'cafe_m' =>  $_POST['cafe_m'],
					'material_2' =>  $_POST['material_2'],
				  ];
	
				  $json_material = json_encode($material);
	
				  $tratamientos = (object) [
					'transitions' =>  $_POST['transitions'],
					'filtro_a' =>  $_POST['filtro_a'],
					'gris_t' =>  $_POST['gris_t'],
					'cafe_t' =>  $_POST['cafe_t'],
					'fotocromatico' =>  $_POST['fotocromatico'],
					'antireflejo' =>  $_POST['antireflejo'],
					'espejado' =>  $_POST['espejado'],
					'uv' =>  $_POST['uv'],
					'tinte' =>  $_POST['tinte'],
					'degradante' =>  $_POST['degradante'],
					'uniforme' =>  $_POST['uniforme'],
					'color_t' =>  $_POST['color_t'],
					'intensidad_t' =>  $_POST['intensidad_t'],
			
				  ];
	
				  $json_tratamientos = json_encode($tratamientos);
	
	
				  $aro_propio = (object) [
					'aro_centevi' =>  $_POST['aro_centevi'],
					'propio' =>  $_POST['propio'],
					'codigo_aro' =>  $_POST['codigo_aro'],
					'color_aro' =>  $_POST['color_aro'],
					'marca' =>  $_POST['marca'],
					'doctor' =>  $_POST['doctor'],
					'elaborado' =>  $_POST['elaborado'],
				  ];
	
				  $json_aro_propio = json_encode($aro_propio);
	
				  $observacion = $_POST['observacion'];
	
	
				  $medidas = (object) [
					'alto_l' =>  $_POST['alto_l'],
					'ancho_b_l' =>  $_POST['ancho_b_l'],
					'separacion_l' =>  $_POST['separacion_l'],
					'diagonal_l' =>  $_POST['diagonal_l'],
				  ];
	
				  $json_medidas = json_encode($medidas);
	 
			 
					//   date_default_timezone_set('America/Lima');
	 
					//   $fecha = date('Y-m-d');
					//   $hora = date('H:i:s');
					//   $fecha_creacion = $fecha.' '.$hora;
					 
	 
	 
					  $tabla = "receta";
	 
	 
						$datos =  array("id_receta"=>$_POST['id_receta'],
						                "id_paciente"=>$_POST['paciente'],
					                  	"nro_receta"=>$nro_receta,
					                  	"direccion"=>$direccion,
					                  	"cedula"=>$cedula,
					                  	"telefono"=>$telefono,
					                  	"rx"=>$json_rx,
					                  	"tipo_lente"=>$tipo_lente,
					                  	"material"=>$json_material,
					                  	"tratamientos"=>$json_tratamientos,
					                  	"aro_propio"=>$json_aro_propio,
					                  	"observacion"=>$observacion,
					                  	"medidas"=>$json_medidas);
				   
							         
									
									 
 
					// echo'<pre>';
                    //  var_dump($datos);
					// echo '</pre>';

								 
			
			 

      
         	$respuesta = ModeloRecetas::mdlEditarReceta($tabla, $datos);


	
      
      	if($respuesta == "ok"){
      
      	 echo'<script>
      
      	 swal({
      		   type: "success",
      		   title: "La receta ha sido actualizada correctamente",
      		   showConfirmButton: true,
      		   confirmButtonText: "Cerrar"
      		   }).then(function(result){
      					 if (result.value) {
      
							window.location = "index.php?ruta=recetas";
      					 }
      				 })
      
      	 </script>';
      
       }
      
      }else{
      
       echo'<script>
      
      	 swal({
      		   type: "error",
      		   title: "¡La receta no puede ir vacío o llevar caracteres especiales!",
      		   showConfirmButton: true,
      		   confirmButtonText: "Cerrar"
      		   }).then(function(result){
      			 if (result.value) {
      
					window.location = "index.php?ruta=editar-receta&id_receta="+'.$_GET['id_receta'].';
      
      			 }
      		 })
      
         </script>';
      
      
      
       }
      
     }
      
   }

	/*=============================================
	ELIMINAR RECETA
	=============================================*/


	static public function ctrEliminarReceta(){

		if(isset($_GET["borrar_receta"])){

			$tabla ="receta";
			$datos = $_GET["borrar_receta"];

			$respuesta = ModeloRecetas::mdlEliminarReceta($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "La receta ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result){
								if (result.value) {

									window.location = "index.php?ruta=recetas";
								}
							})

				</script>';

			}		

		}

	}

}

