<?php

require_once "conexion.php";

class ModeloRecetas{

	/*=============================================
	CREAR SUCURSAL
	=============================================*/

	static public function mdlIngresarReceta($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla( id_paciente, nro_receta, direccion, cedula, telefono, rx, tipo_lente, material, tratamientos, aro_propio ,observacion ,medidas,  doctor, fecha_creacion ) VALUES (:id_paciente, :nro_receta, :direccion,:cedula,:telefono,:rx, :tipo_lente, :material, :tratamientos, :aro_propio,:observacion,:medidas, :doctor, :fecha_creacion )");
        
        $stmt->bindParam(":id_paciente", $datos["id_paciente"], PDO::PARAM_INT);
        $stmt->bindParam(":nro_receta", $datos["nro_receta"], PDO::PARAM_STR);
        $stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
        $stmt->bindParam(":cedula", $datos["cedula"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":rx", $datos["rx"], PDO::PARAM_STR);
        $stmt->bindParam(":tipo_lente", $datos["tipo_lente"], PDO::PARAM_STR);
        $stmt->bindParam(":material", $datos["material"], PDO::PARAM_STR);
        $stmt->bindParam(":tratamientos", $datos["tratamientos"], PDO::PARAM_STR);
		$stmt->bindParam(":aro_propio", $datos["aro_propio"], PDO::PARAM_STR);
		$stmt->bindParam(":observacion", $datos["observacion"], PDO::PARAM_STR);
		$stmt->bindParam(":medidas", $datos["medidas"], PDO::PARAM_STR);
		$stmt->bindParam(":doctor", $datos["doctor"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_creacion", $datos["fecha_creacion"], PDO::PARAM_STR);
    
		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}


    
    /*=============================================
	MOSTRAR RECETASS
	=============================================*/

	static public function mdlMostrarRecetas($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}
    

	 
    /*=============================================
	MOSTRAR  NOMBRE SUCURSALES
	=============================================*/

	static public function mdlMostrarNombreSurcursales($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT nombre FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT nombre FROM $tabla WHERE $item = :$item");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}
    


	
	/*=============================================
	EDITAR SUCURSAL
	=============================================*/

	static public function mdlEditarReceta($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_paciente = :id_paciente, nro_receta = :nro_receta, direccion = :direccion, cedula = :cedula, telefono = :telefono, rx = :rx, tipo_lente = :tipo_lente, material = :material, tratamientos = :tratamientos , aro_propio = :aro_propio, observacion = :observacion, medidas = :medidas  WHERE id_receta = :id_receta");
           
        $stmt->bindParam(":id_receta", $datos["id_receta"], PDO::PARAM_INT);
        $stmt->bindParam(":id_paciente", $datos["id_paciente"], PDO::PARAM_INT);
        $stmt->bindParam(":nro_receta", $datos["nro_receta"], PDO::PARAM_STR);
        $stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
        $stmt->bindParam(":cedula", $datos["cedula"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":rx", $datos["rx"], PDO::PARAM_STR);
        $stmt->bindParam(":tipo_lente", $datos["tipo_lente"], PDO::PARAM_STR);
		$stmt->bindParam(":material", $datos["material"], PDO::PARAM_STR);
        $stmt->bindParam(":tratamientos", $datos["tratamientos"], PDO::PARAM_STR);
		$stmt->bindParam(":aro_propio", $datos["aro_propio"], PDO::PARAM_STR);
		$stmt->bindParam(":observacion", $datos["observacion"], PDO::PARAM_STR);
		$stmt->bindParam(":medidas", $datos["medidas"], PDO::PARAM_STR);

     

 


		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	ELIMINAR RECETA
	=============================================*/

	static public function mdlEliminarReceta($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_receta = :id_receta");

		$stmt -> bindParam(":id_receta", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	ACTUALIZAR CLIENTE
	=============================================*/

	static public function mdlActualizarCliente($tabla, $item1, $valor1, $valor){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE id = :id");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":id", $valor, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

}