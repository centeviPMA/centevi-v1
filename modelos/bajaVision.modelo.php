<?php

require_once "conexion.php";

class ModeloBajaVision
{

	/*=============================================
	CREAR CONSULTA
	=============================================*/

	static public function mdlIngresarBajaVision($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(sucursal, doctor, paciente, id_terapia, edad, fecha_atencion, m_c, a_o,a_p, a_f, medicamentos, tratamientos,dx_oft_princ, objetivos ,av_sc, av_cc, lensometria, lensometria_extra, cv_so, amsler, sensibilidad_c, refraccion, pruebas, ayudas_opticas, ayudas_no_opticas, plan_rehabilitacion, plan_versiones, fecha_creacion ) VALUES (:sucursal, :doctor, :paciente, :id_terapia ,:edad,:fecha_atencion, :m_c, :a_o, :a_p , :a_f, :medicamentos, :tratamientos, :dx_oft_princ ,:objetivos , :av_sc, :av_cc, :lensometria, :lensometria_extra, :cv_so, :amsler, :sensibilidad_c, :refraccion, :pruebas, :ayudas_opticas, :ayudas_no_opticas, :plan_rehabilitacion, :plan_versiones, :fecha_creacion )");


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
		$stmt->bindParam(":dx_oft_princ", $datos["dx_oft_princ"], PDO::PARAM_STR);
		$stmt->bindParam(":objetivos", $datos["objetivos"], PDO::PARAM_STR);
		$stmt->bindParam(":av_sc", $datos["av_sc"], PDO::PARAM_STR);
		$stmt->bindParam(":av_cc", $datos["av_cc"], PDO::PARAM_STR);
		//$stmt->bindParam(":vision_exentrica", $datos["vision_exentrica"], PDO::PARAM_STR);
		$stmt->bindParam(":lensometria", $datos["lensometria"], PDO::PARAM_STR);
		$stmt->bindParam(":lensometria_extra", $datos["lensometria_extra"], PDO::PARAM_STR);
		$stmt->bindParam(":cv_so", $datos["cv_so"], PDO::PARAM_STR);
		$stmt->bindParam(":amsler", $datos["amsler"], PDO::PARAM_STR);
		$stmt->bindParam(":sensibilidad_c", $datos["sensibilidad_c"], PDO::PARAM_STR);
		$stmt->bindParam(":refraccion", $datos["refraccion"], PDO::PARAM_STR);
		$stmt->bindParam(":pruebas", $datos["pruebas"], PDO::PARAM_STR);
		$stmt->bindParam(":ayudas_opticas", $datos["ayudas_opticas"], PDO::PARAM_STR);
		$stmt->bindParam(":ayudas_no_opticas", $datos["ayudas_no_opticas"], PDO::PARAM_STR);
		$stmt->bindParam(":plan_rehabilitacion", $datos["plan_rehabilitacion"], PDO::PARAM_STR);
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

	/*=============================================
	EDITAR TERAPIA
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

	static public function mdlEditarEvaluacionBV($tabla, $datos)
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

	static public function mdlMostrarBajaVision($tabla, $item, $item2, $valor, $valor2)
	{

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT id_consulta,fecha_creacion,doctor FROM $tabla WHERE $item = :$item and $item2 =:$item2");

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

	static public function mdlMostrarBajaVisionID($tabla, $item, $valor)
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
	MOSTRAR CANTIDAD BAJA VISION POR ID
	=============================================*/

	static public function mdlMostrarCantidadBajaVisionID($tabla, $item, $valor)
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
	VERIFICA LA EXISTENCIA DE CONSUTAS BAJA VISION POR PACIENTE
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

	static public function mdlEditarConsultaBajaVision($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET sucursal = :sucursal, paciente = :paciente, edad = :edad, fecha_atencion = :fecha_atencion ,m_c = :m_c, a_o = :a_o, a_p = :a_p , a_f = :a_f, medicamentos = :medicamentos, tratamientos = :tratamientos,dx_oft_princ =:dx_oft_princ ,objetivos = :objetivos , av_sc = :av_sc , av_cc = :av_cc , vision_exentrica = :vision_exentrica, lensometria = :lensometria , lensometria_extra = :lensometria_extra , cv_so = :cv_so , amsler = :amsler , sensibilidad_c = :sensibilidad_c , refraccion = :refraccion , pruebas = :pruebas, ayudas_opticas = :ayudas_opticas , ayudas_no_opticas = :ayudas_no_opticas , plan_rehabilitacion = :plan_rehabilitacion, plan_versiones = :plan_versiones, editado = :editado WHERE id_consulta = :id_consulta");

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
		$stmt->bindParam(":dx_oft_princ", $datos["dx_oft_princ"], PDO::PARAM_STR);
		$stmt->bindParam(":objetivos", $datos["objetivos"], PDO::PARAM_STR);
		$stmt->bindParam(":av_sc", $datos["av_sc"], PDO::PARAM_STR);
		$stmt->bindParam(":av_cc", $datos["av_cc"], PDO::PARAM_STR);
		$stmt->bindParam(":vision_exentrica", $datos["vision_exentrica"], PDO::PARAM_STR);
		$stmt->bindParam(":lensometria", $datos["lensometria"], PDO::PARAM_STR);
		$stmt->bindParam(":lensometria_extra", $datos["lensometria_extra"], PDO::PARAM_STR);
		$stmt->bindParam(":cv_so", $datos["cv_so"], PDO::PARAM_STR);
		$stmt->bindParam(":amsler", $datos["amsler"], PDO::PARAM_STR);
		$stmt->bindParam(":sensibilidad_c", $datos["sensibilidad_c"], PDO::PARAM_STR);
		$stmt->bindParam(":refraccion", $datos["refraccion"], PDO::PARAM_STR);
		$stmt->bindParam(":pruebas", $datos["pruebas"], PDO::PARAM_STR);
		$stmt->bindParam(":ayudas_opticas", $datos["ayudas_opticas"], PDO::PARAM_STR);
		$stmt->bindParam(":ayudas_no_opticas", $datos["ayudas_no_opticas"], PDO::PARAM_STR);
		$stmt->bindParam(":plan_rehabilitacion", $datos["plan_rehabilitacion"], PDO::PARAM_STR);
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
