<?php
// verificar_cedula.php

require_once "../modelos/conexion.php";

if(isset($_POST['nro_cedula'])){
    $nro_cedula = $_POST['nro_cedula'];
    
    $stmt = Conexion::conectar()->prepare("SELECT COUNT(*) FROM pacientes WHERE nro_cedula = :nro_cedula");
    $stmt->bindParam(":nro_cedula", $nro_cedula, PDO::PARAM_STR);
    $stmt->execute();
    $count = $stmt->fetchColumn();
    $existeCedula = $count > 0; // Retorna true si la cédula ya existe, false en caso contrario

    // Devolver una respuesta JSON indicando si la cédula existe
    echo json_encode(array('existe' => $existeCedula));
}
?>
