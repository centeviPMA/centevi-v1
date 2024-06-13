<?php

require_once "conexion.php";

class ModeloOrtopticaAdultos
{

	/*=============================================
	CREAR CONSULTA
	=============================================*/

	static public function mdlIngresarOrtopticaAdultos($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(sucursal, doctor, paciente, id_terapia , edad, fecha_atencion, m_c, a_o,a_p, a_f, medicamentos, tratamientos, av_sc, av_cc, lensometria, lensometria_extra, sa_pp, visuscopia , visuscopia_extra , refraccion , lentes_contacto , pruebas ,pruebas_extra, acomodacion, acomodacion_extra, vergencia ,conducta_seguir, plan_versiones, fecha_creacion ) VALUES (:sucursal, :doctor, :paciente, :id_terapia , :edad,:fecha_atencion, :m_c, :a_o, :a_p , :a_f, :medicamentos ,:tratamientos, :av_sc , :av_cc , :lensometria, :lensometria_extra, :sa_pp, :visuscopia, :visuscopia_extra , :refraccion, :lentes_contacto, :pruebas ,:pruebas_extra, :acomodacion,:acomodacion_extra,:vergencia, :conducta_seguir, :plan_versiones,:fecha_creacion )");

		$stmt->bindParam(":sucursal", $datos["sucursal"], PDO::PARAM_INT);
		$stmt->bindParam(":doctor", $datos["doctor"], PDO::PARAM_STR);
		$stmt->bindParam(":paciente", $datos["paciente"], PDO::PARAM_INT);
		$stmt->bindParam(":id_terapia", $datos["id_terapia"], PDO::PARAM_INT);
		$stmt->bindParam(":edad", $datos["edad"], PDO::PARAM_INT);
		$stmt->bindParam(":fecha_atencion", $datos["fecha_atencion"], PDO::PARAM_STR);
		$stmt->bindParam(":m_c", $datos["m_c"], PDO::PARAM_STR);
		$stmt->bindParam(":a_o", $datos["a_o"], PDO::PARAM_STR);
		$stmt->bindParam(":a_p", $datos["a_p"], PDO::PARAM_STR);
		$stmt->bindParam(":a_f", $datos["a_f"], PDO::PARAM_STR);
		$stmt->bindParam(":medicamentos", $datos["medicamentos"], PDO::PARAM_STR);
		$stmt->bindParam(":tratamientos", $datos["tratamientos"], PDO::PARAM_STR);
		$stmt->bindParam(":av_sc", $datos["av_sc"], PDO::PARAM_STR);
		$stmt->bindParam(":av_cc", $datos["av_cc"], PDO::PARAM_STR);
		//$stmt->bindParam(":ojo_dominante", $datos["ojo_dominante"], PDO::PARAM_STR);
		//$stmt->bindParam(":mano_dominante", $datos["mano_dominante"], PDO::PARAM_STR);
		$stmt->bindParam(":lensometria", $datos["lensometria"], PDO::PARAM_STR);
		$stmt->bindParam(":lensometria_extra", $datos["lensometria_extra"], PDO::PARAM_STR);
		$stmt->bindParam(":sa_pp", $datos["sa_pp"], PDO::PARAM_STR);
		$stmt->bindParam(":visuscopia", $datos["visuscopia"], PDO::PARAM_STR);
		$stmt->bindParam(":visuscopia_extra", $datos["visuscopia_extra"], PDO::PARAM_STR);
		$stmt->bindParam(":refraccion", $datos["refraccion"], PDO::PARAM_STR);
		$stmt->bindParam(":lentes_contacto", $datos["lentes_contacto"], PDO::PARAM_STR);
		$stmt->bindParam(":pruebas", $datos["pruebas"], PDO::PARAM_STR);
		$stmt->bindParam(":pruebas_extra", $datos["pruebas_extra"], PDO::PARAM_STR);
		$stmt->bindParam(":acomodacion", $datos["acomodacion"], PDO::PARAM_STR);
		$stmt->bindParam(":acomodacion_extra", $datos["acomodacion_extra"], PDO::PARAM_STR);
		$stmt->bindParam(":vergencia", $datos["vergencia"], PDO::PARAM_STR);
		$stmt->bindParam(":conducta_seguir", $datos["conducta_seguir"], PDO::PARAM_STR);
        $stmt->bindParam(":plan_versiones", $datos["plan_versiones"], PDO::PARAM_STR);
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
	CREAR TERAPIA
	=============================================*/

	static public function ctrCrearTerapia($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_terapia ,doctor ,fecha_creacion ) VALUES (:id_terapia,:doctor,:fecha_creacion )");


		$stmt->bindParam(":id_terapia", $datos["id_terapia"], PDO::PARAM_INT);
		$stmt->bindParam(":doctor", $datos["doctor"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_creacion", $datos["fecha_creacion"], PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}

    /*	static public function ctrCrearTerapia($tabla, $datos)
	{

	$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_terapia, actividad ,resultado, doctor ,fecha_creacion ) VALUES (:id_terapia, :actividad, :resultado, :doctor,:fecha_creacion )");


		$stmt->bindParam(":id_terapia", $datos["id_terapia"], PDO::PARAM_INT);
		$stmt->bindParam(":actividad", $datos["actividad"], PDO::PARAM_STR);
		$stmt->bindParam(":resultado", $datos["resultado"], PDO::PARAM_STR);
		$stmt->bindParam(":doctor", $datos["doctor"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_creacion", $datos["fecha_creacion"], PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}*/

	/*=============================================
	EDITAR CLIENTE
	=============================================*/

	static public function mdlEditarTerapia($tabla, $datos)
	{


		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET sesion = :sesion , completado = :completado WHERE id = :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":sesion", $datos["sesion"], PDO::PARAM_STR);
		$stmt->bindParam(":completado", $datos["completado"], PDO::PARAM_STR);



		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}



	/*=============================================
	ACTUALIZAR PAGO
	=============================================*/

	static public function mdlActualizarPago($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}


	/*=============================================
	EDITAR EVALUACION TERAPIA
	=============================================*/

	static public function mdlEditarEvaluacionOA($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET evaluacion = :evaluacion WHERE id_terapia = :id_terapia");

		$stmt->bindParam(":id_terapia", $datos["id_terapia"], PDO::PARAM_INT);
		$stmt->bindParam(":evaluacion", $datos["evaluacion"], PDO::PARAM_STR);



		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}


	/*=============================================
	MOSTRAR TERAPIA
	=============================================*/

	static public function mdlMostrarTerapia($tabla, $item, $valor)
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
	MOSTRAR TERAPIA INDIVIDUAL
	=============================================*/

	static public function mdlMostrarTerapiaIndividual($tabla, $item, $valor)
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













	/*=============================================
	MOSTRAR CONSULTA BAJA VISION
	=============================================*/

	static public function mdlMostrarOrtopticaAdultos($tabla, $item, $item2, $valor, $valor2)
	{

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT id_consulta, fecha_creacion, doctor FROM $tabla WHERE $item = :$item and $item2 = :$item2");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
			$stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_STR);

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
	MOSTRAR CONSULTA BAJA VISION POR ID
	=============================================*/

	static public function mdlMostrarOrtopticaAdultosID($tabla, $item, $valor)
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


	/*=============================================
	MOSTRAR CANTIDAD ORTOPTICA 
	=============================================*/

	static public function mdlMostrarCantidadOrtopticaAdultosID($tabla, $item, $valor)
	{

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT COUNT(id_terapia) AS cantidad FROM $tabla WHERE $item = :$item");

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


	/*=============================================
	VERIFICA LA EXISTENCIA DE CONSULTAS ORTOPTICA ADULTOS POR PACIENTE
	=============================================*/


	static public function mdlVerificarExistencia($tabla, $item, $item2, $valor, $valor2)
	{

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT id_consulta as consulta FROM $tabla WHERE $item = :$item and $item2 =:$item2");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
			$stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_STR);

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

	static public function mdlEditarConsultaOrtopticaAdultos($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET sucursal = :sucursal, paciente = :paciente, edad = :edad, fecha_atencion = :fecha_atencion , m_c = :m_c, a_o = :a_o, a_p = :a_p , a_f = :a_f, medicamentos = :medicamentos, tratamientos = :tratamientos, av_sc = :av_sc , av_cc = :av_cc, ojo_dominante = :ojo_dominante, mano_dominante =:mano_dominante, lensometria = :lensometria , lensometria_extra = :lensometria_extra , sa_pp = :sa_pp ,visuscopia =:visuscopia, visuscopia_extra = :visuscopia_extra , refraccion = :refraccion , lentes_contacto = :lentes_contacto , pruebas = :pruebas, pruebas_extra = :pruebas_extra , acomodacion = :acomodacion ,acomodacion_extra = :acomodacion_extra, vergencia = :vergencia, conducta_seguir = :conducta_seguir, plan_versiones = :plan_versiones ,editado = :editado WHERE id_consulta = :id_consulta");

		$stmt->bindParam(":id_consulta", $datos["id_consulta"], PDO::PARAM_INT);
		$stmt->bindParam(":sucursal", $datos["sucursal"], PDO::PARAM_INT);
		$stmt->bindParam(":paciente", $datos["paciente"], PDO::PARAM_INT);
		$stmt->bindParam(":edad", $datos["edad"], PDO::PARAM_INT);
		$stmt->bindParam(":fecha_atencion", $datos["fecha_atencion"], PDO::PARAM_STR);
		$stmt->bindParam(":m_c", $datos["m_c"], PDO::PARAM_STR);
		$stmt->bindParam(":a_o", $datos["a_o"], PDO::PARAM_STR);
		$stmt->bindParam(":a_p", $datos["a_p"], PDO::PARAM_STR);
		$stmt->bindParam(":a_f", $datos["a_f"], PDO::PARAM_STR);
		$stmt->bindParam(":medicamentos", $datos["medicamentos"], PDO::PARAM_STR);
		$stmt->bindParam(":tratamientos", $datos["tratamientos"], PDO::PARAM_STR);
		$stmt->bindParam(":av_sc", $datos["av_sc"], PDO::PARAM_STR);
		$stmt->bindParam(":av_cc", $datos["av_cc"], PDO::PARAM_STR);
		$stmt->bindParam(":ojo_dominante", $datos["ojo_dominante"], PDO::PARAM_STR);
		$stmt->bindParam(":mano_dominante", $datos["mano_dominante"], PDO::PARAM_STR);
		$stmt->bindParam(":lensometria", $datos["lensometria"], PDO::PARAM_STR);
		$stmt->bindParam(":lensometria_extra", $datos["lensometria_extra"], PDO::PARAM_STR);
		$stmt->bindParam(":sa_pp", $datos["sa_pp"], PDO::PARAM_STR);
		$stmt->bindParam(":visuscopia", $datos["visuscopia"], PDO::PARAM_STR);
		$stmt->bindParam(":visuscopia_extra", $datos["visuscopia_extra"], PDO::PARAM_STR);
		$stmt->bindParam(":refraccion", $datos["refraccion"], PDO::PARAM_STR);
		$stmt->bindParam(":lentes_contacto", $datos["lentes_contacto"], PDO::PARAM_STR);
		$stmt->bindParam(":pruebas", $datos["pruebas"], PDO::PARAM_STR);
		$stmt->bindParam(":pruebas_extra", $datos["pruebas_extra"], PDO::PARAM_STR);
		$stmt->bindParam(":acomodacion", $datos["acomodacion"], PDO::PARAM_STR);
		$stmt->bindParam(":acomodacion_extra", $datos["acomodacion_extra"], PDO::PARAM_STR);
		$stmt->bindParam(":vergencia", $datos["vergencia"], PDO::PARAM_STR);
		$stmt->bindParam(":conducta_seguir", $datos["conducta_seguir"], PDO::PARAM_STR);
        $stmt->bindParam(":plan_versiones", $datos["plan_versiones"], PDO::PARAM_STR);
		$stmt->bindParam(":editado", $datos["editado"], PDO::PARAM_STR);





		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}

	/*=============================================
	ELIMINAR CONSULTA
	=============================================*/

	static public function mdlEliminarConsulta($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_consulta = :id_consulta");

		$stmt->bindParam(":id_consulta", $datos, PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();

		$stmt = null;
	}



	/*=============================================
	ELIMINAR TERAPIA
	=============================================*/

	static public function mdlEliminarTerapia($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt->bindParam(":id", $datos, PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();

		$stmt = null;
	}



	/*=============================================
	ELIMINAR TODAS LAS TERAPIAS
	=============================================*/

	static public function mdlEliminarTodasTerapias($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_terapia = :id_terapia");

		$stmt->bindParam(":id_terapia", $datos, PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();

		$stmt = null;
	}

	/*=============================================
	ELIMINAR TERAPIA DE CADA TERAPIA GENERAL
	=============================================*/

	static public function mdlEliminarTerapiaIndividual($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_terapia = :id_terapia");

		$stmt->bindParam(":id_terapia", $datos, PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();

		$stmt = null;
	}
}
