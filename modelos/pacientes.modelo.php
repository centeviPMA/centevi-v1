<?php

require_once "conexion.php";

class ModeloPacientes
{

	/*=============================================
	CREAR PACIENTE
	=============================================*/

	static public function mdlIngresarPaciente($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla( sucursal, doctor, nombres, apellidos, nro_cedula, email, nro_seguro,fecha_nacimiento, genero, lugar_nacimiento, direccion, ocupacion ,telefono, celular, medico, urgencia, menor, fecha_creacion) VALUES (:sucursal,:doctor, :nombres, :apellidos,:nro_cedula, :email, :nro_seguro, :fecha_nacimiento , :genero, :lugar_nacimiento, :direccion,:ocupacion , :telefono, :celular, :medico, :urgencia, :menor, :fecha_creacion)");

		$stmt->bindParam(":sucursal", $datos["sucursal"], PDO::PARAM_INT);
		$stmt->bindParam(":doctor", $datos["doctor"], PDO::PARAM_STR);
		$stmt->bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
		$stmt->bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
		$stmt->bindParam(":nro_cedula", $datos["nro_cedula"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":nro_seguro", $datos["nro_seguro"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_nacimiento", $datos["fecha_nacimiento"], PDO::PARAM_STR);
		$stmt->bindParam(":genero", $datos["genero"], PDO::PARAM_STR);
		$stmt->bindParam(":lugar_nacimiento", $datos["lugar_nacimiento"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":ocupacion", $datos["ocupacion"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":celular", $datos["celular"], PDO::PARAM_STR);
		$stmt->bindParam(":medico", $datos["medico"], PDO::PARAM_STR);
		$stmt->bindParam(":urgencia", $datos["urgencia"], PDO::PARAM_STR);
		$stmt->bindParam(":menor", $datos["menor"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_creacion", $datos["fecha_creacion"], PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}
	

	/*=============================================
	SUBIR DOCUMENTOS PACIENTES
	=============================================*/

	static public function mdlSubirDocumentoPaciente($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla( url , nombre, id_paciente,fecha) VALUES (:url,:nombre, :id_paciente, :fecha)");

		$stmt->bindParam(":url", $datos["url"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":id_paciente", $datos["id_paciente"], PDO::PARAM_INT);
		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);


		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}


	/*=============================================
	MOSTRAR SUCURSALES
	=============================================*/

	static public function mdlMostrarDocumentos($tabla, $item, $valor)
	{

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetchAll();
		} else {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt->execute();

			return $stmt->fetchAll();
		}

		$stmt->close();

		$stmt = null;
	}


	/*=============================================
	MOSTRAR PACIENTES
	=============================================*/
	
	static public function mdlMostrarPacientes($tabla, $item, $valor)
	{

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetch();
		} else {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt->execute();

			return $stmt->fetchAll();
		}

		$stmt->close();

		$stmt = null;
	}
	
	//Mostrar Listado de Pacientes - Nuevo
	static public function mdlMostrarListadoPacientes($tabla, $item, $valor)
    {
        $pdo = Conexion::conectar();
    
        if ($item != null) {
            $stmt = $pdo->prepare("SELECT id_paciente, nombres, apellidos, nro_cedula, direccion, fecha_creacion FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            $stmt = $pdo->prepare("SELECT id_paciente, nombres, apellidos, nro_cedula, direccion, fecha_creacion FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }


	//Mostrar Listado de Pacientes Paginate - Nuevo
	static public function mdlMostrarListadoPacientesPaginate($tabla, $item, $valor, $paginate, $txt_filtro)
    {
        $pdo = Conexion::conectar();
		
		$ofset = 10 * ($paginate - 1);
        if ($item != null) {
			;
            $stmt = $pdo->prepare("SELECT id_paciente, nombres, apellidos, nro_cedula, direccion, fecha_creacion FROM $tabla WHERE $item = :$item LIMIT 10 OFFSET $ofset");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt->execute();

			$stmt_total_datos = $pdo->prepare("SELECT count(*) as total FROM $tabla WHERE $item = :$item");
            $stmt_total_datos->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt_total_datos->execute();

            return array(
				"data" => $stmt->fetch(PDO::FETCH_ASSOC),
				"total_datos" => $stmt_total_datos->fetch(PDO::FETCH_ASSOC),
				"txt_filtro" => $txt_filtro
			);
        } else {
			
			if(strlen($txt_filtro) == 0){
				$stmt = $pdo->prepare("SELECT id_paciente, nombres, apellidos, nro_cedula, direccion, fecha_creacion FROM $tabla LIMIT 10 OFFSET $ofset");
			}else{
				$txt_filtro = str_replace(' ', '%', $txt_filtro);
				// $stmt = $pdo->prepare("SELECT id_paciente, nombres, apellidos, nro_cedula, direccion, fecha_creacion FROM $tabla WHERE CONCAT(nombres, apellidos) LIKE '%$txt_filtro%' OR nro_cedula LIKE '%$txt_filtro%' OR direccion LIKE '%$txt_filtro%' OR fecha_creacion LIKE '%$txt_filtro%' LIMIT 10 OFFSET $ofset");
				$stmt = $pdo->prepare("SELECT id_paciente, nombres, apellidos, nro_cedula, direccion, fecha_creacion FROM $tabla WHERE CONCAT(nombres, apellidos) LIKE '%$txt_filtro%' OR nro_cedula LIKE '%$txt_filtro%' OR CONCAT(apellidos, nombres ) LIKE '%$txt_filtro%' LIMIT 10 OFFSET $ofset");
			}
            
            $stmt->execute();

			if(strlen($txt_filtro) == 0){
				$stmt_total_datos = $pdo->prepare("SELECT count(*) as total FROM $tabla");
			}else{
				$stmt_total_datos = $pdo->prepare("SELECT count(*) as total FROM $tabla WHERE CONCAT(nombres, apellidos) LIKE '%$txt_filtro%' OR nro_cedula LIKE '%$txt_filtro%' OR direccion LIKE '%$txt_filtro%' OR fecha_creacion LIKE '%$txt_filtro%'");
			}
            $stmt_total_datos->execute();

			return array(
				"data" => $stmt->fetchAll(PDO::FETCH_ASSOC),
				"total_datos" => $stmt_total_datos->fetch(PDO::FETCH_ASSOC),
				"txt_filtro" => $txt_filtro
			);
            
        }
    }



	/*=============================================
	MOSTRAR PACIENTES SUCURSAL
	=============================================*/

	static public function mdlMostrarPacientesSucursal($tabla, $item, $item2, $valor, $valor2)
	{

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item and $item2 =:$item2");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

			$stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetchAll();
		} else {


			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item2 =:$item2");


			$stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_INT);

			$stmt->execute();

			return $stmt->fetchAll();
		}

		$stmt->close();

		$stmt = null;
	}


    //Mostrar lostado de pacientes sucursal - Nuevo
    static public function mdlMostrarListadoPacientesSucursal($tabla, $item, $item2, $valor, $valor2)
    {
        $pdo = Conexion::conectar();
    
        if ($item != null) {
            $sql = "SELECT nombres, apellidos, nro_cedula, direccion, fecha_creacion FROM $tabla WHERE $item = :$item AND $item2 = :$item2";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_STR);
        } else {
            $sql = "SELECT nombres, apellidos, nro_cedula, direccion, fecha_creacion FROM $tabla WHERE $item2 = :$item2";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_INT);
        }
    
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


	/*=============================================
	MOSTRAR ULTIMO CLIENTE
	=============================================*/

	static public function mdlMostrarUltimoCliente($tabla, $item, $valor)
	{

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetch();
		} else {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC  LIMIT 1");

			$stmt->execute();

			return $stmt->fetch();
		}

		$stmt->close();

		$stmt = null;
	}
	/*=============================================
	EDITAR CLIENTE
	=============================================*/

	static public function mdlEditarPaciente($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombres = :nombres, apellidos = :apellidos, nro_cedula = :nro_cedula, email = :email , nro_seguro = :nro_seguro, fecha_nacimiento = :fecha_nacimiento , genero = :genero, lugar_nacimiento = :lugar_nacimiento, direccion = :direccion, ocupacion = :ocupacion , telefono = :telefono , celular = :celular , medico = :medico, urgencia = :urgencia, menor =:menor WHERE id_paciente = :id_paciente");

		$stmt->bindParam(":id_paciente", $datos["id_paciente"], PDO::PARAM_INT);
		$stmt->bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
		$stmt->bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
		$stmt->bindParam(":nro_cedula", $datos["nro_cedula"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":nro_seguro", $datos["nro_seguro"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_nacimiento", $datos["fecha_nacimiento"], PDO::PARAM_STR);
		$stmt->bindParam(":genero", $datos["genero"], PDO::PARAM_STR);
		$stmt->bindParam(":lugar_nacimiento", $datos["lugar_nacimiento"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":ocupacion", $datos["ocupacion"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":celular", $datos["celular"], PDO::PARAM_STR);
		$stmt->bindParam(":medico", $datos["medico"], PDO::PARAM_STR);
		$stmt->bindParam(":urgencia", $datos["urgencia"], PDO::PARAM_STR);
		$stmt->bindParam(":menor", $datos["menor"], PDO::PARAM_STR);



		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}

	/*=============================================
	ELIMINAR PACIENTE
	=============================================*/

	static public function mdlEliminarPaciente($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_paciente = :id_paciente");

		$stmt->bindParam(":id_paciente", $datos, PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();

		$stmt = null;
	}

	/*=============================================
	ELIMINAR DOCUMENTO
	=============================================*/

	static public function mdlEliminarDocumento($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_documento = :id_documento");

		$stmt->bindParam(":id_documento", $datos, PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();

		$stmt = null;
	}


	/*=============================================
	ACTUALIZAR CLIENTE
	=============================================*/

	static public function mdlActualizarCliente($tabla, $item1, $valor1, $valor)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE id = :id");

		$stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_STR);
		$stmt->bindParam(":id", $valor, PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();

		$stmt = null;
	}
}
