<?php
    session_start();
    require_once("../../controllers/adminController.php");
    //Atrapar los valores introducidos en el formulario
    $usuario = $_POST['usuarioTxt'];
    $pass = $_POST['passTxt'];

    //instanciar la clase controller
    $objControl = new adminController();
    $objControl->authenticateUser($usuario, $pass);
?>