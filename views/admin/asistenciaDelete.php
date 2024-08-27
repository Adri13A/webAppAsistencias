<?php
require_once("../../controllers/asistenciaController.php");

$objControl = new asistenciaController();
//obtener el id desde el boton que mandara eliminar el registro
$objControl->deleteAsistencias($_GET['fecha']);

header("Location: ./readAsistencias.php");
?>