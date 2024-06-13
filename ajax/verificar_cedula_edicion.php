<?php

require_once "../modelos/conexion.php";

if(isset($_POST['nro_cedula']) && isset($_POST['id_paciente'])){
    $nro_cedula = $_POST['nro_cedula'];
    $id_paciente = $_POST['id_paciente'];
    
    // Realizar la consulta para verificar si la cédula existe en la base de datos
    $stmt = Conexion::conectar()->prepare("SELECT COUNT(*) FROM pacientes WHERE nro_cedula = :nro_cedula AND id_paciente != :id_paciente");
    $stmt->bindParam(":nro_cedula", $nro_cedula, PDO::PARAM_STR);
    $stmt->bindParam(":id_paciente", $id_paciente, PDO::PARAM_INT);
    $stmt->execute();
    $count = $stmt->fetchColumn();
    $existeCedula = $count > 0; // Retorna true si la cédula ya existe (excluyendo al paciente actual), false en caso contrario

    // Devolver una respuesta JSON indicando si la cédula existe
    echo json_encode(array('existe' => $existeCedula));
}
?>
