<?php
require_once("template/header.php")
?>
<?php
require_once("../../controllers/usuariosController.php");

$objControl = new usuariosController();
$rows = $objControl->readUsuario();



$countActivos = 0;
$countSuspendidos = 0;
$countExpulsados = 0;
$countInactivos = 0;

if(is_array($rows)){
    foreach ($rows as $row) {
        if ($row['estado'] == 1) {
            $countActivos++;
        } elseif ($row['estado'] == 2) {
            $countSuspendidos++;
        } elseif ($row['estado'] == 3) {
            $countExpulsados++;
        } elseif ($row['estado'] == 0) {
            $countInactivos++;
        }
    }
}

// Definir una función de comparación para ordenar por apellido paterno
function compareByApellidoP($a, $b)
{
    return strcmp($a['apellidoP'], $b['apellidoP']);
}

// Ordenar el array $rows utilizando la función de comparación
if (is_array($rows)) {
    usort($rows, 'compareByApellidoP');
    // Resto del código que utiliza $rows ordenado
} else {

}

?>

<main class="container">

    <!-- Barra de Estados -->
    <div class="nav-scroller bg-dark shadow-sm" style="border-radius: 10px; margin: 0px; margin-top: 15px;">

        <nav class="nav p-1 " aria-label="Secondary navigation">
            <div class="d-flex align-content-start flex-wrap">

                <div class="mt-2">
                    <label class="btn btn-black rounded-0" style=" pointer-events: none; color:white;">
                        <i class="fa-solid fa-chart-simple"></i> <b>Estatus</b>
                    </label>
                </div>

                <div class="mt-2">
                    <label class="btn btn-light ms-3" style="pointer-events: none;">
                        <i class="fa-solid fa-circle-user"></i>
                        Total <?= $countActivos + $countInactivos + $countSuspendidos + $countExpulsados ?>
                    </label>
                </div>

                <div class="mt-2">
                    <label class="btn btn-outline-success  ms-3" style="pointer-events: none;">
                        <i class="fa-solid fa-circle-check"></i>
                        Activos <?= $countActivos ?>
                    </label>
                </div>

                <div class="mt-2">
                    <label class="btn btn-outline-warning ms-3" style="pointer-events: none;">
                        <i class="fa-solid fa-circle-xmark"></i>
                        Inactivos <?= $countInactivos ?>
                    </label>
                </div>

                <div class="mt-2">
                    <label class="btn btn-outline ms-3" style="pointer-events: none; border-color: #ff7d00;color:#ff7d00">
                        <i class="fa-solid fa-circle-exclamation"></i>
                        Suspendidos <?= $countSuspendidos ?>
                    </label>
                </div>

                <div class="mt-2 mb-2">
                    <label class="btn btn-outline-danger ms-3" style="pointer-events: none;">
                        <i class="fa-solid fa-ban"></i>
                        Expulsados <?= $countExpulsados ?>
                    </label>
                </div>

            </div>

        </nav>

    </div>


    <div class="d-flex align-items-center p-3 my-3 text-white bg-warning shadow-sm" style="border-radius: 10px;"></div>

    <div class="my-3 p-3 bg-body shadow-sm" style="border-radius: 10px;">

        <form action="asistenciaInsert.php" method="POST">

            <div class="d-flex flex-wrap  border-bottom">
                <div class="">
                    <h4 class="pb-2 mb-0"><i class="fa-solid fa-user-group fg-xl"></i>
                        Usuarios
                    </h4>
                </div>

                <?php if(empty($rows)) :?>

                <?php else : ?>
                <div class="ms-2 mb-3">
                    <a href="insertUsuario.php" class="btn btn-success"><i class="fa-solid fa-user-plus"></i> Usuario nuevo</a>
                </div>

                <?php endif; ?>

            </div>

            <?php if (empty($rows)) : ?>
                <div class="alert alert-danger" role="alert">
                    Aún no se encuentran usuarios registrados, si desea agregar usuarios <a href="insertUsuario.php" class="alert-link">pulse aquí</a>.
                </div>
            <?php else : ?>
                <div class="container pt-3">
                    <?php foreach ($rows as $row) : ?>


                        <div class="d-flex">
                            <strong class="d-block text-dark fs-5 pb-2">
                                <i class="fa-solid fa-circle-user"></i>
                                <input type="hidden" name="nombreTxt" value="<?= $row['apellidoP'] . ' ' . $row['apellidoM'] . ' ' . $row['nombre'] ?>">
                                <?= $row['apellidoP'] . ' ' . $row['apellidoM'] . ' ' . $row['nombre'] ?>
                            </strong>

                            <div class="ms-5">
                                <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                    <a class="btn btn-primary" href="readOneUsuario.php?id_usuario=<?= $row['id_usuario'] ?>"> <i class="fa-solid fa-eye"></i></a>

                                </div>

                                <div class="btn-group mt-2 mb-2" role="group" aria-label="Basic checkbox toggle button group">
                                    <a class="btn btn-warning" href="updateUsuario.php?id_usuario=<?= $row['id_usuario'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>

                                </div>

                                <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                    <a class="btn btn-danger" href="usuarioDelete.php?id_usuario=<?= $row['id_usuario'] ?>"><i class="fa-solid fa-trash-can"></i></a>
                                </div>
                            </div>


                        </div>


                        <div class="d-flex">
                            <div class="col-md-auto">
                                <span class="badge text-bg-dark rounded-pill">
                                    <img src="../src/img/<?= $row['estado'] ?>.png" alt="Estado" width="15px" height="15px">
                                    <b class="" style="font-size:smaller">
                                        <?php if ($row['estado'] == 1) {
                                            echo "Activo";
                                        } elseif ($row['estado'] == 2) {
                                            echo "Suspendido";
                                        } elseif ($row['estado'] == 3) {
                                            echo "Expulsado";
                                        } else {
                                            echo "Inactivo";
                                        }
                                        ?>
                                    </b>
                                </span>
                            </div>
                        </div>

                        <hr>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start pt-2">
                <a href="index.php" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i> <b>Regresar</b></a>
            </div>
        </form>
        <script src="../src/js/main.js"></script>

    </div>

    <?php require_once("template/footer.php") ?>