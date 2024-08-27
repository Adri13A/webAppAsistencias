<?php
require_once("../../controllers/usuariosController.php");

// Obtener datos del formulario
$fecha_ingreso_taller = $_POST["fechaIngresoTxt"];
$nombre = $_POST["nombreTxt"];
$apellidoM = $_POST["apellidoMTxt"];
$apellidoP = $_POST["apellidoPTxt"];
$fechaNacimiento = $_POST["fechaNacimientoTxt"];
$grado = $_POST["gradoTxt"];
$profesion = $_POST["profesionTxt"];
$domicilioProfesion = $_POST["domicilio_profesion"];
$rfc = $_POST["rfcTxt"];
$celular = $_POST["celularTxt"];
$correo = $_POST["correoTxt"];
$telefonoCasa = $_POST["telefonoCasaTxt"];
$telefonoTrabajo = $_POST["telefonoTrabajoTxt"];
$domicilio = $_POST["domicilioTxt"];
$tipoSangre = $_POST["tipoSangreTxt"];
$padecimientos = $_POST["padecimientosTxt"];
$alergia = $_POST["alergiaTxt"];
$seguro = $_POST["seguroTxt"];
$contactoEmergenciaNombre = $_POST["contactoEmergenciaTxt"];
$contactoEmergenciaTel = $_POST["contactoEmergenciaTelefonoTxt"];
$conyugue = $_POST["conyugueTxt"];
$conyugueCumple = $_POST["conyugueCumpleTxt"];
$fechagrado1 = $_POST["fechagrado1Txt"];
$fechagrado2 = $_POST["fechagrado2Txt"];
$fechagrado3 = $_POST["fechagrado3Txt"];
$estado = $_POST["estadoTxt"];

// Generar un hash del nombre del usuario
$usuarioHash = md5($nombre . $apellidoM . $apellidoP);

// Verificar si se ha subido una nueva foto
if ($_FILES['imagenFoto']['name'] != '') {
    // Obtener datos del archivo subido
    $file = $_FILES['imagenFoto'];
    $fotoNombre = $usuarioHash . '.jpg';
    $ruta_provisional = $file['tmp_name'];
    $carpeta = "../src/img/usuarios/";
    $src = $carpeta . $fotoNombre;

    // Mover el archivo subido a la carpeta de destino
    move_uploaded_file($ruta_provisional, $src);
    $fotoUsuario = $fotoNombre;
} else {
    // Si no se subió una nueva foto, mantener la foto anterior
    $fotoUsuario = $_POST['imagenFotoVieja'];
}



$objUsuarioController = new usuariosController();
// Llamar a la función de actualización
$objUsuarioController->insertUsuarios(
    $fecha_ingreso_taller,
    $nombre,
    $apellidoM,
    $apellidoP,
    $fechaNacimiento,
    $fotoUsuario,
    $grado,
    $profesion,
    $domicilioProfesion,
    $rfc,
    $celular,
    $correo,
    $telefonoCasa,
    $telefonoTrabajo,
    $domicilio,
    $tipoSangre,
    $padecimientos,
    $alergia,
    $seguro,
    $contactoEmergenciaNombre,
    $contactoEmergenciaTel,
    $conyugue,
    $conyugueCumple,
    $fechagrado1,
    $fechagrado2,
    $fechagrado3,
    $estado
);

header("Location: ./readAllUsuarios.php");

?>