<?php

require_once "conexion.php";

class ModeloPacientesMenores{

	/*=============================================
	CREAR PACIENTE
	=============================================*/

	static public function mdlIngresarPacienteMenor($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombres, apellidos, nro_cedula, nro_seguro,fecha_nacimiento, genero, lugar_nacimiento, direccion, medico_cabecera, responsable, parentesco, nro_celular_responsable, otro_nro_responsable, alergias, urg_responsable, urg_parentesto, urg_celular, fecha_creacion) VALUES (:nombres, :apellidos,:nro_cedula, :nro_seguro, :fecha_nacimiento , :genero, :lugar_nacimiento, :direccion,:medico_cabecera, :responsable, :parentesco, :nro_celular_responsable, :otro_nro_responsable,:alergias,:urg_responsable, :urg_parentesto,:urg_celular, :fecha_creacion)");

		$stmt->bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
		$stmt->bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
		$stmt->bindParam(":nro_cedula", $datos["nro_cedula"], PDO::PARAM_STR);
		$stmt->bindParam(":nro_seguro", $datos["nro_seguro"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_nacimiento", $datos["fecha_nacimiento"], PDO::PARAM_STR);
		$stmt->bindParam(":genero", $datos["genero"], PDO::PARAM_STR);
		$stmt->bindParam(":lugar_nacimiento", $datos["lugar_nacimiento"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
        $stmt->bindParam(":medico_cabecera", $datos["medico_cabecera"], PDO::PARAM_STR);
        $stmt->bindParam(":responsable", $datos["responsable"], PDO::PARAM_STR);
        $stmt->bindParam(":parentesco", $datos["parentesco"], PDO::PARAM_STR);
        $stmt->bindParam(":nro_celular_responsable", $datos["nro_celular_responsable"], PDO::PARAM_STR);
        $stmt->bindParam(":otro_nro_responsable", $datos["otro_nro_responsable"], PDO::PARAM_STR); 
        $stmt->bindParam(":alergias", $datos["alergias"], PDO::PARAM_STR);
        $stmt->bindParam(":urg_responsable", $datos["urg_responsable"], PDO::PARAM_STR);
        $stmt->bindParam(":urg_parentesto", $datos["urg_parentesto"], PDO::PARAM_STR);
        $stmt->bindParam(":urg_celular", $datos["urg_celular"], PDO::PARAM_STR);
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
	MOSTRAR PACIENTES
	=============================================*/

	static public function mdlMostrarPacientes($tabla, $item, $valor){

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
	MOSTRAR ULTIMO CLIENTE
	=============================================*/

	static public function mdlMostrarUltimoCliente($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC  LIMIT 1");

			$stmt -> execute();

			return $stmt -> fetch();

		}

		$stmt -> close();

		$stmt = null;

	}
	/*=============================================
	EDITAR CLIENTE
	=============================================*/

	static public function mdlEditarPaciente($tabla, $datos){

	         
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombres = :nombres, apellidos = :apellidos, nro_cedula = :nro_cedula , nro_seguro = :nro_seguro, fecha_nacimiento = :fecha_nacimiento , genero = :genero, lugar_nacimiento = :lugar_nacimiento, direccion = :direccion, medico_cabecera = :medico_cabecera, responsable = :responsable , parentesco = :parentesco, nro_celular_responsable = :nro_celular_responsable , otro_nro_responsable = :otro_nro_responsable, alergias = :alergias, urg_responsable = :urg_responsable , urg_parentesto = :urg_parentesto, urg_celular = :urg_celular  WHERE id_paciente = :id_paciente");

		$stmt->bindParam(":id_paciente", $datos["id_paciente"], PDO::PARAM_INT);
		$stmt->bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
		$stmt->bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
		$stmt->bindParam(":nro_cedula", $datos["nro_cedula"], PDO::PARAM_STR);
		$stmt->bindParam(":nro_seguro", $datos["nro_seguro"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_nacimiento", $datos["fecha_nacimiento"], PDO::PARAM_STR);
		$stmt->bindParam(":genero", $datos["genero"], PDO::PARAM_STR);
		$stmt->bindParam(":lugar_nacimiento", $datos["lugar_nacimiento"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
        $stmt->bindParam(":medico_cabecera", $datos["medico_cabecera"], PDO::PARAM_STR);
        $stmt->bindParam(":responsable", $datos["responsable"], PDO::PARAM_STR);
        $stmt->bindParam(":parentesco", $datos["parentesco"], PDO::PARAM_STR);
        $stmt->bindParam(":nro_celular_responsable", $datos["nro_celular_responsable"], PDO::PARAM_STR);
        $stmt->bindParam(":otro_nro_responsable", $datos["otro_nro_responsable"], PDO::PARAM_STR); 
        $stmt->bindParam(":alergias", $datos["alergias"], PDO::PARAM_STR);
        $stmt->bindParam(":urg_responsable", $datos["urg_responsable"], PDO::PARAM_STR);
        $stmt->bindParam(":urg_parentesto", $datos["urg_parentesto"], PDO::PARAM_STR);
        $stmt->bindParam(":urg_celular", $datos["urg_celular"], PDO::PARAM_STR);
  

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	ELIMINAR CLIENTE
	=============================================*/

	static public function mdlEliminarPaciente($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_paciente = :id_paciente");

		$stmt -> bindParam(":id_paciente", $datos, PDO::PARAM_INT);

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