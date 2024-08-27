<?php
require_once("template/header.php")
?>
<?php
require_once("../../controllers/asistenciaController.php");

$fecha = $_GET['fecha'];

$objControl = new asistenciaController();
$rows = $objControl->readAsistenciaFecha($fecha);

$countUsuarios = 0;

foreach ($rows as $row) {
    $countUsuarios++;
}

$countAsistensias = 0;
$countFaltas = 0;
$countJustificante = 0;


foreach ($rows as $row) {
    if ($row['statusAsistencia'] == 1) {
        $countAsistensias++;
    } elseif ($row['statusAsistencia'] == 0) {
        $countFaltas++;
    } elseif ($row['statusAsistencia'] == 2) {
        $countJustificante++;
    }
}


?>

<main class="container">

    <!-- Barra de Estados -->
    <div class="nav-scroller bg-dark shadow-sm" style="border-radius: 10px; margin: 0px; margin-top: 15px;">

        <nav class="nav p-1" aria-label="Secondary navigation">
            <div class="d-flex align-content-start flex-wrap">

                <div class="mt-2">
                    <label class="btn btn-black rounded-0" style=" pointer-events: none; color:white;">
                        <i class="fa-solid fa-chart-simple"></i> <b>Estatus</b>
                    </label>
                </div>

                <div class="mt-2 mb-2">
                    <label class="btn btn-light ms-3" style="pointer-events: none;">
                        <i class="fa-solid fa-circle-user"></i>
                        Usuarios <?= $countUsuarios  ?>
                    </label>
                </div>

                <div class="mt-2">
                    <label class="btn btn-outline-success ms-3" style="pointer-events: none;">
                        <i class="fa-solid fa-circle-check"></i>
                        Asistencias <?= $countAsistensias ?>
                    </label>
                </div>

                <div class="mt-2">
                    <label class="btn btn-outline-danger ms-3" style="pointer-events: none;">
                        <i class="fa-solid fa-circle-xmark"></i>
                        Faltas <?= $countFaltas ?>
                    </label>
                </div>

                <div class="mt-2 mb-2">
                    <label class="btn btn-outline-secondary ms-3" style="pointer-events: none;">
                        <i class="fa-solid fa-j"></i>
                        Justificantes <?= $countJustificante ?>
                    </label>
                </div>

            </div>

        </nav>

    </div>


    <div class="d-flex align-items-center p-3 my-3 text-white bg-warning shadow-sm" style="border-radius: 10px;"></div>

    <div class="my-3 p-3 bg-body shadow-sm" style="border-radius: 10px;">

        <form action="asistenciaInsert.php" method="POST">

            <div class="d-flex border-bottom flex-wrap">
                <div class="">
                    <h4 class="pb-2 mb-0"><i class="fa-solid fa-list-check"></i> Consultar Asistencias - <?= $fecha ?></h4>
                </div>
                <div class="mb-3 ms-2">
                    <a href="updateOneAsistencia.php?fecha=<?= $fecha ?>" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> <b></b></a>
                </div>
            </div>

            <?php if ($rows) : ?>

                <div class="container pt-3">
                    <?php foreach ($rows as $row) : ?>

                        <div class="d-flex">
                            <strong class="d-block text-dark fs-5 pb-2">
                                <i class="fa-solid fa-circle-user"></i>
                                <?= $row['nombre_usuario'] ?>
                            </strong>
                            <div class="ms-5">
                                <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                    <input type="checkbox" class="btn-check disabled" id="btncheck<?= $row['id_asistencia'] ?>_1" name="asistenciaCheckB" value="1" autocomplete="off" <?php echo ($row['statusAsistencia'] == 1) ? 'checked' : ''; ?>>
                                    <label class="btn btn-outline-success disabled" for="btncheck<?= $row['id_asistencia'] ?>_1"><i class="fa-solid fa-check"></i></label>
                                </div>
                            </div>
                            <div class="ms-3">
                                <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                    <input type="checkbox" class="btn-check justificacion-checkbox disabled" id="btncheck<?= $row['id_asistencia'] ?>_2" name="justificacionCheckB" value="2" autocomplete="off" <?php echo ($row['statusAsistencia'] == 2) ? 'checked' : ''; ?>>
                                    <label class="btn btn-outline-secondary disabled" for="btncheck<?= $row['id_asistencia'] ?>_2" style=""><i class="fa-solid fa-j"></i></label>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" class="form-control" name="txtContador" id="contador" value="<?= $i ?>" required>

                        <hr>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <div class="d-grid gap-2 d-md-flex justify-content-md-start pt-2">
                <a href="readAsistencias.php" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i> <b>Regresar</b></a>
            </div>

        </form>
        <script src="../src/js/main.js"></script>

    </div>

    <?php require_once("template/footer.php") ?>