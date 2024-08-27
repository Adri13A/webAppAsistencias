<?php
if ($_SESSION['rol'] != 'admin') {
    header("location: ../../index.php");
}

require_once("../../controllers/asistenciaController.php");
$objControl = new asistenciaController();
// Atrapar los campos del formulario de asistencia

$nombres = $_POST["nombreTxt"];
$fecha = $_POST["fecha"];

// Iterar sobre los ids y guardar la asistencia individualmente
foreach ($nombres as $nombre) {
    // Obtener el índice específico para este usuario
    $indice = array_search($nombre, $nombres);

    // Verificar si el checkbox de asistencia está marcado
    if (isset($_POST["asistenciaCheckB"][$indice])) {
        $status = 1; // Asistencia
    } elseif (isset($_POST["justificacionCheckB"][$indice])) {
        $status = 2; // Justificación
    } else {
        $status = 0; // Falta
    }

    // Instanciar la clase controller y guardar la asistencia
    $objControl->updateAsistencia($status, $fecha, $nombre);
}

header("Location: ../admin/readOneAsistencia.php?fecha=$fecha");
?>