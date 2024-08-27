<?php 
require_once("../../controllers/adminController.php");

/*
* El código recupera los valores enviados a través de un formulario utilizando el método POST.
*/
$nombre = $_POST['nombreTxt'];
$usuario = $_POST['usuarioTxt'];
$password = $_POST['passTxt'];

//instanciar la clase controller
$objControl = new adminController();
// Llamar a la función de registro
$objControl->registerUser($nombre, $usuario, $password);

header('Location: ../admin/index.php');
?>