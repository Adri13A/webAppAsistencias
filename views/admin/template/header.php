<?php
session_start();
if (session_status() === PHP_SESSION_ACTIVE && isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin') {
    // El usuario es un administrador
} else {
    // Redirige al usuario a la página de inicio de sesión
    header("Location: ../../index.php");
    exit; // Asegúrate de terminar la ejecución del script después de redirigir
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>WEBAPP Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="manifest" href="https://getbootstrap.com/docs/5.2/assets/img/favicons/manifest.json">
    <link rel="icon" href="../src/img/icon.svg" type="image/x-icon">
    <script src="https://kit.fontawesome.com/9705d6f157.js" crossorigin="anonymous"></script>
    <link href="https://getbootstrap.com/docs/5.2/examples/offcanvas-navbar/offcanvas.css" rel="stylesheet">
</head>

<body class="bg bg-dark-subtle">

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="border-radius: 10px; margin: 5px; backdrop-filter: blur(10px); background-color: #42494fc4;">
        <div class="container-fluid">
            <a class="navbar-brand" href="./index.php">
                <img src="../src/img/icon.png" alt="FOTO" width="30px" height="30px">
                WEBAPP
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent" style="border-radius: 10px;">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- 
                    <li class="nav-item">
                        <form action=" " method="post"><input class="nav-link" type="submit" value="------------- &nbsp;&nbsp;|" name="1" disabled></form>
                    </li>
                    -->
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./index.php"><i class="fa-solid fa-house"></i> Inicio &nbsp;&nbsp;|</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="./readAsistencias.php"><i class="fa-solid fa-calendar-check"></i> Ver asistencias &nbsp;&nbsp;|</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="./readAllUsuarios.php"><i class="fa-solid fa-address-book"></i> Usuarios &nbsp;&nbsp;|</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="../report/reporteAsistencias.php"><i class="fa-solid fa-file-lines"></i> Reportes &nbsp;&nbsp;|</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-star"></i> Estados
                        </a>
                        <ul class="dropdown-menu ">
                            <li><a class="dropdown-item" aria-current="page" href="./index.php">&nbsp;&nbsp;Activos</a></li>
                            <li>
                                <a href="" class="dropdown-item" aria-current="page">
                                    <form action="index.php" method="GET">
                                        <input class="nav-link active" type="submit" value="Inactivos" name="inactivo" style="color:black">
                                    </form>
                                </a>
                            </li>
                            <li>
                                <a href="" class="dropdown-item" aria-current="page">
                                    <form action="index.php" method="GET">
                                        <input class="nav-link active" type="submit" value="Suspendidos" name="suspendido" style="color:black">
                                    </form>
                                </a>
                            </li>
                            <li>
                                <a href="" class="dropdown-item" aria-current="page">
                                    <form action="index.php" method="GET">
                                        <input class="nav-link active" type="submit" value="Expulsados" name="expulsado" style="color:black">
                                    </form>
                                </a>
                            </li>

                        </ul>
                    </li>

                </ul>
                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                <button class="btn btn-dark" style=" pointer-events: none;"><i class="fa-solid fa-user-tie"></i></button>   
                <a href="../../controllers/logoutController.php" class="btn btn-danger"><i class="fa-solid fa-door-open"></i></a>
                </div>

                <!--  <a href="../../controllers/logoutController.php" class="btn btn-danger"><i class="fa-solid fa-door-open"></i></a> -->
            </div>
        </div>
    </nav>