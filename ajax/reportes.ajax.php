<?php

require_once "../modelos/conexion.php";

if (isset($_POST["fecha_reporte"])) {

    try {
 
        $fecha_seleccionada = $_POST['fecha_reporte'];

        // Dividir las fechas
        $fechas = explode(' - ', $fecha_seleccionada);
    
        // Convertir las fechas al formato YYYY-MM-DD
        $fecha_inicio_converted = DateTime::createFromFormat('m/d/Y', $fechas[0])->format('Y-m-d');
        $fecha_fin_converted = DateTime::createFromFormat('m/d/Y', $fechas[1])->format('Y-m-d');

        // Variables de paginación
        $start = isset($_POST['start']) ? intval($_POST['start']) : 0;
        $length = isset($_POST['length']) ? intval($_POST['length']) : 7;

        $stmt = Conexion::conectar()->prepare("
            SELECT pacientes.*, 
                MAX(COALESCE(optometria_neonatos.fecha_atencion,
                            ortoptica_adultos.fecha_atencion,
                            optometria_pediatrica.fecha_atencion,
                            consultagenerica.fecha_atencion,
                            refracciongeneral.fecha_atencion)) as fecha_mas_reciente
            FROM pacientes
            LEFT JOIN optometria_neonatos ON pacientes.id_paciente = optometria_neonatos.paciente
            LEFT JOIN ortoptica_adultos ON pacientes.id_paciente = ortoptica_adultos.paciente
            LEFT JOIN optometria_pediatrica ON pacientes.id_paciente = optometria_pediatrica.paciente
            LEFT JOIN consultagenerica ON pacientes.id_paciente = consultagenerica.paciente
            LEFT JOIN refracciongeneral ON pacientes.id_paciente = refracciongeneral.paciente
            WHERE (
                (optometria_neonatos.fecha_atencion BETWEEN :fecha_inicio AND :fecha_fin OR optometria_neonatos.fecha_atencion IS NULL)
                AND (ortoptica_adultos.fecha_atencion BETWEEN :fecha_inicio AND :fecha_fin OR ortoptica_adultos.fecha_atencion IS NULL)
                AND (optometria_pediatrica.fecha_atencion BETWEEN :fecha_inicio AND :fecha_fin OR optometria_pediatrica.fecha_atencion IS NULL)
                AND (consultagenerica.fecha_atencion BETWEEN :fecha_inicio AND :fecha_fin OR consultagenerica.fecha_atencion IS NULL)
                AND (refracciongeneral.fecha_atencion BETWEEN :fecha_inicio AND :fecha_fin OR refracciongeneral.fecha_atencion IS NULL)
            )
            GROUP BY pacientes.id_paciente
            HAVING fecha_mas_reciente IS NOT NULL
            LIMIT :start, :length;
        ");

        $stmt->bindParam(':fecha_inicio', $fecha_inicio_converted);
        $stmt->bindParam(':fecha_fin', $fecha_fin_converted);
        $stmt->bindParam(':start', $start, PDO::PARAM_INT);
        $stmt->bindParam(':length', $length, PDO::PARAM_INT);

        $stmt->execute();

        $resultados = $stmt->fetchAll();

        echo json_encode($resultados);
    } catch (Exception $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
}
?>