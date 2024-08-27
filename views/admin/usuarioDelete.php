<?php
require_once("../../controllers/usuariosController.php");

$objUsuariosController = new usuariosController();
//obtener el id desde el boton que mandara eliminar el registro
$objUsuariosController->delete($_GET['id_usuario']);

header("Location: ./readAllUsuarios.php");
?>