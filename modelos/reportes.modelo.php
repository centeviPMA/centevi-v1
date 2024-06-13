
<?php

require_once "conexion.php";

class ModeloReportes
{




	/*=============================================
	MOSTRAR CANTIDAD DE PACIENTES
	=============================================*/

	static public function mdlMostrarCantidadPacientes($tabla, $item, $valor)
	{

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT COUNT(id_paciente) AS cantidad FROM $tabla");

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
	MOSTRAR CANTIDAD DE PACIENTES SIN ATENDER
	=============================================*/

static public function mdlMostrarCantidadPacientesSinAtender()
{
    $pdo = Conexion::conectar();

    $stmt = $pdo->prepare("
        SELECT COUNT(pacientes.id_paciente) AS cantidad_pacientes_no_atendidos
        FROM pacientes
        LEFT JOIN optometria_neonatos ON pacientes.id_paciente = optometria_neonatos.paciente
        LEFT JOIN optometria_pediatrica ON pacientes.id_paciente = optometria_pediatrica.paciente
        LEFT JOIN ortoptica_adultos ON pacientes.id_paciente = ortoptica_adultos.paciente
        LEFT JOIN consultagenerica ON pacientes.id_paciente = consultagenerica.paciente
        LEFT JOIN refracciongeneral ON pacientes.id_paciente = refracciongeneral.paciente 
        LEFT JOIN terapias_bajav ON pacientes.id_paciente = terapias_bajav.id_paciente
        LEFT JOIN terapias_optometria_neonatos ON pacientes.id_paciente = terapias_optometria_neonatos.id_paciente 
        LEFT JOIN terapias_optometria_pediatrica ON pacientes.id_paciente = terapias_optometria_pediatrica.id_paciente 
        LEFT JOIN terapias_ortoptica_adultos ON pacientes.id_paciente = terapias_ortoptica_adultos.id_paciente 
        WHERE optometria_neonatos.paciente IS NULL
        AND optometria_pediatrica.paciente IS NULL
        AND ortoptica_adultos.paciente IS NULL
        AND consultagenerica.paciente IS NULL
        AND refracciongeneral.paciente IS NULL
        AND terapias_bajav.id_paciente IS NULL
        AND terapias_optometria_neonatos.id_paciente IS NULL
        AND terapias_optometria_pediatrica.id_paciente IS NULL
        AND terapias_ortoptica_adultos.id_paciente IS NULL
    ");

    $stmt->execute();

    $cantidadPacientes = $stmt->fetchColumn();

    // Ahora, ejecuta una consulta adicional para obtener la lista de pacientes sin atender
    $stmt = $pdo->prepare("
        SELECT * FROM pacientes
        LEFT JOIN optometria_neonatos ON pacientes.id_paciente = optometria_neonatos.paciente
        LEFT JOIN optometria_pediatrica ON pacientes.id_paciente = optometria_pediatrica.paciente
        LEFT JOIN ortoptica_adultos ON pacientes.id_paciente = ortoptica_adultos.paciente
        LEFT JOIN consultagenerica ON pacientes.id_paciente = consultagenerica.paciente
        LEFT JOIN refracciongeneral ON pacientes.id_paciente = refracciongeneral.paciente 
        LEFT JOIN terapias_bajav ON pacientes.id_paciente = terapias_bajav.id_paciente
        LEFT JOIN terapias_optometria_neonatos ON pacientes.id_paciente = terapias_optometria_neonatos.id_paciente 
        LEFT JOIN terapias_optometria_pediatrica ON pacientes.id_paciente = terapias_optometria_pediatrica.id_paciente 
        LEFT JOIN terapias_ortoptica_adultos ON pacientes.id_paciente = terapias_ortoptica_adultos.id_paciente 
        WHERE optometria_neonatos.paciente IS NULL
        AND optometria_pediatrica.paciente IS NULL
        AND ortoptica_adultos.paciente IS NULL
        AND consultagenerica.paciente IS NULL
        AND refracciongeneral.paciente IS NULL
        AND terapias_bajav.id_paciente IS NULL
        AND terapias_optometria_neonatos.id_paciente IS NULL
        AND terapias_optometria_pediatrica.id_paciente IS NULL
        AND terapias_ortoptica_adultos.id_paciente IS NULL
        ORDER BY pacientes.id_paciente DESC  LIMIT 6

    ");

    $stmt->execute();

    $pacientesSinAtender = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return array(
        'cantidad_pacientes_no_atendidos' => $cantidadPacientes,
        'lista_pacientes_sin_atender' => $pacientesSinAtender,
    );
}

	/*=============================================
	MOSTRAR TODOS LOS DE PACIENTES SIN ATENDER
	=============================================*/

static public function mdlMostrarTodosLosPacientesSinAtender()
{
    $pdo = Conexion::conectar();

    $stmt = $pdo->prepare("
        SELECT * FROM pacientes
        LEFT JOIN optometria_neonatos ON pacientes.id_paciente = optometria_neonatos.paciente
        LEFT JOIN optometria_pediatrica ON pacientes.id_paciente = optometria_pediatrica.paciente
        LEFT JOIN ortoptica_adultos ON pacientes.id_paciente = ortoptica_adultos.paciente
        LEFT JOIN consultagenerica ON pacientes.id_paciente = consultagenerica.paciente
        LEFT JOIN refracciongeneral ON pacientes.id_paciente = refracciongeneral.paciente 
        LEFT JOIN terapias_bajav ON pacientes.id_paciente = terapias_bajav.id_paciente
        LEFT JOIN terapias_optometria_neonatos ON pacientes.id_paciente = terapias_optometria_neonatos.id_paciente 
        LEFT JOIN terapias_optometria_pediatrica ON pacientes.id_paciente = terapias_optometria_pediatrica.id_paciente 
        LEFT JOIN terapias_ortoptica_adultos ON pacientes.id_paciente = terapias_ortoptica_adultos.id_paciente 
        WHERE optometria_neonatos.paciente IS NULL
        AND optometria_pediatrica.paciente IS NULL
        AND ortoptica_adultos.paciente IS NULL
        AND consultagenerica.paciente IS NULL
        AND refracciongeneral.paciente IS NULL
        AND terapias_bajav.id_paciente IS NULL
        AND terapias_optometria_neonatos.id_paciente IS NULL
        AND terapias_optometria_pediatrica.id_paciente IS NULL
        AND terapias_ortoptica_adultos.id_paciente IS NULL

    ");

		$stmt->execute();

		return $stmt->fetchAll();
	
		$stmt->close();

		$stmt = null;
}



	/*=============================================
	MOSTRAR CANTIDAD DE PACIENTES
	=============================================*/

	static public function mdlMostrarCantidadPacientesMenores($tabla, $item, $valor)
	{

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT fecha_nacimiento as fecha FROM $tabla WHERE id_paciente");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetchAll();
		} else {

			$stmt = Conexion::conectar()->prepare("SELECT fecha_nacimiento as fecha FROM $tabla WHERE id_paciente");

			$stmt->execute();

			return $stmt->fetchAll();
		}

		$stmt->close();

		$stmt = null;
	}





	/*=============================================
	MOSTRAR ULTIMOS PACIENTES
	=============================================*/

	static public function mdlMostrarUltimosPacientes($tabla, $item, $valor)
	{

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id_paciente DESC  LIMIT 6");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetchAll();
		} else {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id_paciente DESC  LIMIT 6");

			$stmt->execute();

			return $stmt->fetchAll();
		}

		$stmt->close();

		$stmt = null;
	}


/*=============================================
    MOSTRAR ULTIMA ATENCIÓN PACIENTES
=============================================*/
public static function mdlMostrarUltimaAtencionPacientes($valor, $fecha = null)
{
    $pdo = Conexion::conectar();

    // Verificar si $valor no está vacío para agregar LIMIT
    $limitClause = (!empty($valor)) ? "LIMIT :limit" : "";

    // Agregar la subconsulta para obtener la fecha máxima de atención por paciente
    $subquery = "
        SELECT paciente, MAX(fecha_atencion) AS ultima_atencion, GROUP_CONCAT(DISTINCT doctor ORDER BY doctor ASC SEPARATOR ', ') AS doctores
        FROM (
            SELECT paciente, fecha_atencion, doctor FROM optometria_neonatos
            UNION
            SELECT paciente, fecha_atencion, doctor FROM optometria_pediatrica
            UNION
            SELECT paciente, fecha_atencion, doctor FROM ortoptica_adultos
            UNION
            SELECT paciente, fecha_atencion, doctor FROM consultagenerica
            UNION
            SELECT paciente, fecha_atencion, doctor FROM refracciongeneral
        ) AS todas_las_atenciones
        GROUP BY paciente
    ";

    // Subconsulta para las nuevas tablas
    $subqueryTerapias = "
        SELECT id_paciente AS paciente, DATE(fecha_creacion) AS fecha_atencion
        FROM terapias_bajav
        UNION
        SELECT id_paciente AS paciente, DATE(fecha_creacion) AS fecha_atencion
        FROM terapias_optometria_neonatos
        UNION
        SELECT id_paciente AS paciente, DATE(fecha_creacion) AS fecha_atencion
        FROM terapias_optometria_pediatrica
        UNION
        SELECT id_paciente AS paciente, DATE(fecha_creacion) AS fecha_atencion
        FROM terapias_ortoptica_adultos
    ";

    $whereCondition = ($fecha !== null) ? "COALESCE(ultima_atencion, '1970-01-01') = :fecha" : "1";

    // Si se proporciona un rango de fechas, divide el string y ajusta la condición
    if ($fecha !== null && strpos($fecha, ' - ') !== false) {
        list($fechaInicio, $fechaFin) = array_map('trim', explode(' - ', $fecha));

        $whereCondition = "COALESCE(ultima_atencion, '1970-01-01') BETWEEN :fechaInicio AND :fechaFin";
    }

    $stmt = $pdo->prepare("
        SELECT
            pacientes.id_paciente,
            pacientes.nombres,
            pacientes.apellidos,
            pacientes.nro_cedula,
            pacientes.email,
            pacientes.direccion,
            pacientes.celular,
            MAX(ultima_atencion) AS ultima_atencion,
            GROUP_CONCAT(DISTINCT todas_las_atenciones.doctores ORDER BY todas_las_atenciones.doctores ASC SEPARATOR ', ') AS doctores
        FROM
            pacientes
        LEFT JOIN ($subquery) AS todas_las_atenciones ON pacientes.id_paciente = todas_las_atenciones.paciente
        LEFT JOIN ($subqueryTerapias) AS terapias ON pacientes.id_paciente = terapias.paciente
        WHERE
            $whereCondition
        GROUP BY
            pacientes.id_paciente,
            pacientes.nombres,
            pacientes.apellidos,
            pacientes.nro_cedula,
            pacientes.email,
            pacientes.direccion,
            pacientes.celular
        $limitClause
    ");

    // Si $valor no está vacío, bindea el valor de $valor para LIMIT
    if (!empty($valor)) {
        $limitValue = intval($valor); // Asegúrate de que $valor sea un número
        $stmt->bindParam(':limit', $limitValue, PDO::PARAM_INT);
    }

    // Si se proporciona un rango de fechas, bindea los valores de fecha
    if ($fecha !== null && strpos($fecha, ' - ') !== false) {
        $stmt->bindParam(':fechaInicio', $fechaInicio, PDO::PARAM_STR);
        $stmt->bindParam(':fechaFin', $fechaFin, PDO::PARAM_STR);
    } elseif ($fecha !== null) {
        $stmt->bindParam(':fecha', $fecha, PDO::PARAM_STR);
    }

    $stmt->execute();

    $result = $stmt->fetchAll();

    return $result;
}


    /*=============================================
  	MOSTRAR REPORTE PACIENTES ATENDIDOS POR DÍA
=============================================*/
public static function mdlMostrarPacientesAtendidosPorDia($valor, $fecha = null)
{
    $pdo = Conexion::conectar();

    // Verificar si $valor no está vacío para agregar LIMIT
    $limitClause = (!empty($valor)) ? "LIMIT :limit" : "";

    $whereCondition = ($fecha !== null) ? " = :fecha" : "1";

    // Si se proporciona un rango de fechas, divide el string y ajusta la condición
    if ($fecha !== null && strpos($fecha, ' - ') !== false) {
        list($fechaInicio, $fechaFin) = array_map('trim', explode(' - ', $fecha));

        $whereCondition = " BETWEEN :fechaInicio AND :fechaFin";
    }

    $stmt = $pdo->prepare("

    SELECT pacientes.id_paciente as ID_PACIENTE, pacientes.nombres as PACIENTE_NOMBRE, pacientes.apellidos as PACIENTE_APELLIDO, pacientes.nro_cedula as PACIENTE_CEDULA, pacientes.celular as PACIENTE_CELULAR, optometria_neonatos.fecha_atencion as FECHA_ATENCION, optometria_neonatos.doctor as DOCTOR, sucursales.nombre as SUCURSAL 
    FROM pacientes 
    INNER JOIN optometria_neonatos ON pacientes.id_paciente = optometria_neonatos.paciente
    LEFT JOIN sucursales ON optometria_neonatos.sucursal = sucursales.id_sucursal
    WHERE optometria_neonatos.fecha_atencion $whereCondition

    UNION ALL

    SELECT pacientes.id_paciente as ID_PACIENTE, pacientes.nombres as PACIENTE_NOMBRE, pacientes.apellidos as PACIENTE_APELLIDO, pacientes.nro_cedula as PACIENTE_CEDULA, pacientes.celular as PACIENTE_CELULAR, optometria_pediatrica.fecha_atencion as FECHA_ATENCION, optometria_pediatrica.doctor as DOCTOR, sucursales.nombre as SUCURSAL 
    FROM pacientes 
    INNER JOIN optometria_pediatrica ON pacientes.id_paciente = optometria_pediatrica.paciente
    LEFT JOIN sucursales ON optometria_pediatrica.sucursal = sucursales.id_sucursal
    WHERE optometria_pediatrica.fecha_atencion $whereCondition

    UNION ALL

    SELECT pacientes.id_paciente as ID_PACIENTE, pacientes.nombres as PACIENTE_NOMBRE, pacientes.apellidos as PACIENTE_APELLIDO, pacientes.nro_cedula as PACIENTE_CEDULA, pacientes.celular as PACIENTE_CELULAR, ortoptica_adultos.fecha_atencion as FECHA_ATENCION, ortoptica_adultos.doctor as DOCTOR, sucursales.nombre as SUCURSAL 
    FROM pacientes 
    INNER JOIN ortoptica_adultos ON pacientes.id_paciente = ortoptica_adultos.paciente
    LEFT JOIN sucursales ON ortoptica_adultos.sucursal = sucursales.id_sucursal
    WHERE ortoptica_adultos.fecha_atencion $whereCondition

    UNION ALL

    SELECT pacientes.id_paciente as ID_PACIENTE, pacientes.nombres as PACIENTE_NOMBRE, pacientes.apellidos as PACIENTE_APELLIDO, pacientes.nro_cedula as PACIENTE_CEDULA, pacientes.celular as PACIENTE_CELULAR, consultagenerica.fecha_atencion as FECHA_ATENCION, consultagenerica.doctor as DOCTOR, sucursales.nombre as SUCURSAL 
    FROM pacientes 
    INNER JOIN consultagenerica ON pacientes.id_paciente = consultagenerica.paciente
    LEFT JOIN sucursales ON consultagenerica.sucursal = sucursales.id_sucursal
    WHERE consultagenerica.fecha_atencion $whereCondition

    UNION ALL

    SELECT pacientes.id_paciente as ID_PACIENTE, pacientes.nombres as PACIENTE_NOMBRE, pacientes.apellidos as PACIENTE_APELLIDO, pacientes.nro_cedula as PACIENTE_CEDULA, pacientes.celular as PACIENTE_CELULAR, refracciongeneral.fecha_atencion as FECHA_ATENCION, refracciongeneral.doctor as DOCTOR, sucursales.nombre as SUCURSAL 
    FROM pacientes 
    INNER JOIN refracciongeneral ON pacientes.id_paciente = refracciongeneral.paciente
    LEFT JOIN sucursales ON refracciongeneral.sucursal = sucursales.id_sucursal
    WHERE refracciongeneral.fecha_atencion $whereCondition

    UNION ALL

    SELECT pacientes.id_paciente as ID_PACIENTE, pacientes.nombres as PACIENTE_NOMBRE, pacientes.apellidos as PACIENTE_APELLIDO, pacientes.nro_cedula as PACIENTE_CEDULA, pacientes.celular as PACIENTE_CELULAR, terapias_bajav.fecha_creacion as FECHA_ATENCION, '' as DOCTOR, '' as SUCURSAL 
    FROM pacientes 
    INNER JOIN terapias_bajav ON pacientes.id_paciente = terapias_bajav.id_paciente
    WHERE terapias_bajav.fecha_creacion $whereCondition

    UNION ALL

    SELECT pacientes.id_paciente as ID_PACIENTE, pacientes.nombres as PACIENTE_NOMBRE, pacientes.apellidos as PACIENTE_APELLIDO, pacientes.nro_cedula as PACIENTE_CEDULA, pacientes.celular as PACIENTE_CELULAR, terapias_optometria_neonatos.fecha_creacion as FECHA_ATENCION, '' as DOCTOR, '' as SUCURSAL 
    FROM pacientes 
    INNER JOIN terapias_optometria_neonatos ON pacientes.id_paciente = terapias_optometria_neonatos.id_paciente
    WHERE terapias_optometria_neonatos.fecha_creacion $whereCondition

    UNION ALL

    SELECT pacientes.id_paciente as ID_PACIENTE, pacientes.nombres as PACIENTE_NOMBRE, pacientes.apellidos as PACIENTE_APELLIDO, pacientes.nro_cedula as PACIENTE_CEDULA, pacientes.celular as PACIENTE_CELULAR, terapias_optometria_pediatrica.fecha_creacion as FECHA_ATENCION, '' as DOCTOR, '' as SUCURSAL 
    FROM pacientes 
    INNER JOIN terapias_optometria_pediatrica ON pacientes.id_paciente = terapias_optometria_pediatrica.id_paciente
    WHERE terapias_optometria_pediatrica.fecha_creacion $whereCondition

    UNION ALL

    SELECT pacientes.id_paciente as ID_PACIENTE, pacientes.nombres as PACIENTE_NOMBRE, pacientes.apellidos as PACIENTE_APELLIDO, pacientes.nro_cedula as PACIENTE_CEDULA, pacientes.celular as PACIENTE_CELULAR, terapias_ortoptica_adultos.fecha_creacion as FECHA_ATENCION, '' as DOCTOR, '' as SUCURSAL 
    FROM pacientes 
    INNER JOIN terapias_ortoptica_adultos ON pacientes.id_paciente = terapias_ortoptica_adultos.id_paciente
    WHERE terapias_ortoptica_adultos.fecha_creacion $whereCondition;
        
        $limitClause");

    // Si $valor no está vacío, bindea el valor de $valor para LIMIT
    if (!empty($valor)) {
        $limitValue = intval($valor); // Asegúrate de que $valor sea un número
        $stmt->bindParam(':limit', $limitValue, PDO::PARAM_INT);
    }

    // Si se proporciona un rango de fechas, bindea los valores de fecha
    if ($fecha !== null && strpos($fecha, ' - ') !== false) {
        $stmt->bindParam(':fechaInicio', $fechaInicio, PDO::PARAM_STR);
        $stmt->bindParam(':fechaFin', $fechaFin, PDO::PARAM_STR);
    } elseif ($fecha !== null) {
        $stmt->bindParam(':fecha', $fecha, PDO::PARAM_STR);
    }

    $stmt->execute();

    $result = $stmt->fetchAll();

    return $result;
}

// 
public static function mdlMostrarPacientesAtendidosPorDiaV2($valor, $fecha = null)
{
    $pdo = Conexion::conectar();

    // Verificar si $valor no está vacío para agregar LIMIT
    $limitClause = (!empty($valor)) ? "LIMIT :limit" : "";

    $whereCondition = ($fecha !== null) ? " = :fecha" : "1";

    // Si se proporciona un rango de fechas, divide el string y ajusta la condición
    if ($fecha !== null && strpos($fecha, ' - ') !== false) {
        list($fechaInicio, $fechaFin) = array_map('trim', explode(' - ', $fecha));

        $whereCondition = " BETWEEN :fechaInicio AND :fechaFin";
    }

    $stmt = $pdo->prepare("

    SELECT pacientes.id_paciente as ID_PACIENTE, pacientes.nombres as PACIENTE_NOMBRE, pacientes.apellidos as PACIENTE_APELLIDO, pacientes.nro_cedula as PACIENTE_CEDULA, pacientes.celular as PACIENTE_CELULAR, optometria_neonatos.fecha_atencion as FECHA_ATENCION, optometria_neonatos.doctor as DOCTOR, sucursales.nombre as SUCURSAL, 'Optometria Neonatos' as TIPO  
    FROM pacientes 
    INNER JOIN optometria_neonatos ON pacientes.id_paciente = optometria_neonatos.paciente
    LEFT JOIN sucursales ON optometria_neonatos.sucursal = sucursales.id_sucursal
    WHERE optometria_neonatos.fecha_atencion $whereCondition

    UNION ALL

    SELECT pacientes.id_paciente as ID_PACIENTE, pacientes.nombres as PACIENTE_NOMBRE, pacientes.apellidos as PACIENTE_APELLIDO, pacientes.nro_cedula as PACIENTE_CEDULA, pacientes.celular as PACIENTE_CELULAR, optometria_pediatrica.fecha_atencion as FECHA_ATENCION, optometria_pediatrica.doctor as DOCTOR, sucursales.nombre as SUCURSAL, 'Optometria Pediatrica' as TIPO 
    FROM pacientes 
    INNER JOIN optometria_pediatrica ON pacientes.id_paciente = optometria_pediatrica.paciente
    LEFT JOIN sucursales ON optometria_pediatrica.sucursal = sucursales.id_sucursal
    WHERE optometria_pediatrica.fecha_atencion $whereCondition

    UNION ALL

    SELECT pacientes.id_paciente as ID_PACIENTE, pacientes.nombres as PACIENTE_NOMBRE, pacientes.apellidos as PACIENTE_APELLIDO, pacientes.nro_cedula as PACIENTE_CEDULA, pacientes.celular as PACIENTE_CELULAR, ortoptica_adultos.fecha_atencion as FECHA_ATENCION, ortoptica_adultos.doctor as DOCTOR, sucursales.nombre as SUCURSAL, 'Ortoptica Adultos' as TIPO 
    FROM pacientes 
    INNER JOIN ortoptica_adultos ON pacientes.id_paciente = ortoptica_adultos.paciente
    LEFT JOIN sucursales ON ortoptica_adultos.sucursal = sucursales.id_sucursal
    WHERE ortoptica_adultos.fecha_atencion $whereCondition

    UNION ALL

    SELECT pacientes.id_paciente as ID_PACIENTE, pacientes.nombres as PACIENTE_NOMBRE, pacientes.apellidos as PACIENTE_APELLIDO, pacientes.nro_cedula as PACIENTE_CEDULA, pacientes.celular as PACIENTE_CELULAR, consultagenerica.fecha_atencion as FECHA_ATENCION, consultagenerica.doctor as DOCTOR, sucursales.nombre as SUCURSAL, 'Consulta Generica' as TIPO 
    FROM pacientes 
    INNER JOIN consultagenerica ON pacientes.id_paciente = consultagenerica.paciente
    LEFT JOIN sucursales ON consultagenerica.sucursal = sucursales.id_sucursal
    WHERE consultagenerica.fecha_atencion $whereCondition

    UNION ALL

    SELECT pacientes.id_paciente as ID_PACIENTE, pacientes.nombres as PACIENTE_NOMBRE, pacientes.apellidos as PACIENTE_APELLIDO, pacientes.nro_cedula as PACIENTE_CEDULA, pacientes.celular as PACIENTE_CELULAR, refracciongeneral.fecha_atencion as FECHA_ATENCION, refracciongeneral.doctor as DOCTOR, sucursales.nombre as SUCURSAL, 'Refraccion General' as TIPO 
    FROM pacientes 
    INNER JOIN refracciongeneral ON pacientes.id_paciente = refracciongeneral.paciente
    LEFT JOIN sucursales ON refracciongeneral.sucursal = sucursales.id_sucursal
    WHERE refracciongeneral.fecha_atencion $whereCondition

    UNION ALL

    SELECT pacientes.id_paciente as ID_PACIENTE, pacientes.nombres as PACIENTE_NOMBRE, pacientes.apellidos as PACIENTE_APELLIDO, pacientes.nro_cedula as PACIENTE_CEDULA, pacientes.celular as PACIENTE_CELULAR, terapia_bajav.fecha_creacion as FECHA_ATENCION, terapia_bajav.doctor as DOCTOR, sucursales.nombre as SUCURSAL, 'Terapia Baja Visión' as TIPO
    FROM pacientes 
    INNER JOIN terapias_bajav ON pacientes.id_paciente = terapias_bajav.id_paciente
    INNER JOIN terapia_bajav ON terapia_bajav.id_terapia = terapias_bajav.id_terapia
    LEFT JOIN sucursales ON terapia_bajav.sucursal = sucursales.id_sucursal
    WHERE terapia_bajav.fecha_creacion $whereCondition

    UNION ALL

    SELECT pacientes.id_paciente as ID_PACIENTE, pacientes.nombres as PACIENTE_NOMBRE, pacientes.apellidos as PACIENTE_APELLIDO, pacientes.nro_cedula as PACIENTE_CEDULA, pacientes.celular as PACIENTE_CELULAR, terapia_optometria_neonatos.fecha_creacion as FECHA_ATENCION, terapia_optometria_neonatos.doctor as DOCTOR, sucursales.nombre as SUCURSAL, 'Terapia Optometria Neonatos' as TIPO 
    FROM pacientes 
    INNER JOIN terapias_optometria_neonatos ON pacientes.id_paciente = terapias_optometria_neonatos.id_paciente
    INNER JOIN terapia_optometria_neonatos ON terapias_optometria_neonatos.id_terapia = terapia_optometria_neonatos.id_terapia
    LEFT JOIN sucursales ON terapia_optometria_neonatos.sucursal = sucursales.id_sucursal
    WHERE terapia_optometria_neonatos.fecha_creacion $whereCondition

    UNION ALL

    SELECT pacientes.id_paciente as ID_PACIENTE, pacientes.nombres as PACIENTE_NOMBRE, pacientes.apellidos as PACIENTE_APELLIDO, pacientes.nro_cedula as PACIENTE_CEDULA, pacientes.celular as PACIENTE_CELULAR, terapia_optometria_pediatrica.fecha_creacion as FECHA_ATENCION, terapia_optometria_pediatrica.doctor as DOCTOR, sucursales.nombre as SUCURSAL, 'Terapia Optometria Pediatrica' as TIPO 
    FROM pacientes 
    INNER JOIN terapias_optometria_pediatrica ON pacientes.id_paciente = terapias_optometria_pediatrica.id_paciente
    INNER JOIN terapia_optometria_pediatrica ON terapias_optometria_pediatrica.id_terapia = terapia_optometria_pediatrica.id_terapia
    LEFT JOIN sucursales ON terapia_optometria_pediatrica.sucursal = sucursales.id_sucursal
    WHERE terapia_optometria_pediatrica.fecha_creacion $whereCondition

    UNION ALL

    SELECT pacientes.id_paciente as ID_PACIENTE, pacientes.nombres as PACIENTE_NOMBRE, pacientes.apellidos as PACIENTE_APELLIDO, pacientes.nro_cedula as PACIENTE_CEDULA, pacientes.celular as PACIENTE_CELULAR, terapia_ortoptica_adultos.fecha_creacion as FECHA_ATENCION, terapia_ortoptica_adultos.doctor as DOCTOR, sucursales.nombre as SUCURSAL, 'Terapia Ortoptica Adultos' as TIPO 
    FROM pacientes 
    INNER JOIN terapias_ortoptica_adultos ON pacientes.id_paciente = terapias_ortoptica_adultos.id_paciente
    INNER JOIN terapia_ortoptica_adultos ON terapias_ortoptica_adultos.id_terapia = terapia_ortoptica_adultos.id_terapia
    LEFT JOIN sucursales ON terapia_ortoptica_adultos.sucursal = sucursales.id_sucursal
    WHERE terapia_ortoptica_adultos.fecha_creacion $whereCondition;
        
        $limitClause");

    // Si $valor no está vacío, bindea el valor de $valor para LIMIT
    if (!empty($valor)) {
        $limitValue = intval($valor); // Asegúrate de que $valor sea un número
        $stmt->bindParam(':limit', $limitValue, PDO::PARAM_INT);
    }

    // Si se proporciona un rango de fechas, bindea los valores de fecha
    if ($fecha !== null && strpos($fecha, ' - ') !== false) {
        $stmt->bindParam(':fechaInicio', $fechaInicio, PDO::PARAM_STR);
        $stmt->bindParam(':fechaFin', $fechaFin, PDO::PARAM_STR);
    } elseif ($fecha !== null) {
        $stmt->bindParam(':fecha', $fecha, PDO::PARAM_STR);
    }

    $stmt->execute();

    $result = $stmt->fetchAll();

    return $result;
}


	/*=============================================
	MOSTRAR PACIENTES
	=============================================*/

	static public function mdlMostrarPacientes($tabla, $item, $valor)
	{

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item =:$item");

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
	MOSTRAR CANTIDAD DE BAJA VISION
	=============================================*/

	static public function mdlMostrarCantidadBajaVision($tabla, $item, $valor)
	{

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT COUNT(id_consulta) AS cantidad FROM $tabla WHERE id_consulta");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetch();
		} else {

			$stmt = Conexion::conectar()->prepare("SELECT COUNT(id_consulta) AS cantidad FROM $tabla WHERE id_consulta");

			$stmt->execute();

			return $stmt->fetch();
		}

		$stmt->close();

		$stmt = null;
	}



	/*=============================================
	MOSTRAR CANTIDAD DE OPTOMETRIA NEONATOS
	=============================================*/

	static public function mdlMostrarCantidadOptometriaNeonatos($tabla, $item, $valor)
	{

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT COUNT(id_consulta) AS cantidad FROM $tabla WHERE id_consulta");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetch();
		} else {

			$stmt = Conexion::conectar()->prepare("SELECT COUNT(id_consulta) AS cantidad FROM $tabla WHERE id_consulta");

			$stmt->execute();

			return $stmt->fetch();
		}

		$stmt->close();

		$stmt = null;
	}


	/*=============================================
	MOSTRAR CANTIDAD DE OPTOMETRIA PEDIATRICA
	=============================================*/

	static public function mdlMostrarCantidadOptometriaPediatrica($tabla, $item, $valor)
	{

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT COUNT(id_consulta) AS cantidad FROM $tabla WHERE id_consulta");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetch();
		} else {

			$stmt = Conexion::conectar()->prepare("SELECT COUNT(id_consulta) AS cantidad FROM $tabla WHERE id_consulta");

			$stmt->execute();

			return $stmt->fetch();
		}

		$stmt->close();

		$stmt = null;
	}


	/*=============================================
	MOSTRAR CANTIDAD DE ORTOPTICA ADULTOS
	=============================================*/

	static public function mdlMostrarCantidadOrtopticaAdultos($tabla, $item, $valor)
	{

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT COUNT(id_consulta) AS cantidad FROM $tabla WHERE id_consulta");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetch();
		} else {

			$stmt = Conexion::conectar()->prepare("SELECT COUNT(id_consulta) AS cantidad FROM $tabla WHERE id_consulta");

			$stmt->execute();

			return $stmt->fetch();
		}

		$stmt->close();

		$stmt = null;
	}
}
