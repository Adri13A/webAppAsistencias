<?php
require_once("template/header.php")
?>
<?php
require_once("../../controllers/asistenciaController.php");

$fecha = $_GET['fecha'];

$objControl = new asistenciaController();
$rows = $objControl->readAsistenciaFecha($fecha);

$i = 0;

?>

<main class="container">

    <!-- Barra de Estados -->
    <div class="nav-scroller bg-dark shadow-sm" style="border-radius: 10px; margin: 0px; margin-top: 15px;">

        <nav class="nav p-1" aria-label="Secondary navigation">
            <div class="d-flex align-content-start flex-wrap">

                <div class="mt-2">
                    <label class="btn btn-white rounded-0" style=" pointer-events: none">
                        
                    </label>
                </div>

                <div class="mt-2">
                    <label class="btn btn-dark ms-3" style="pointer-events: none;">
                       
                    </label>
                </div>

            </div>

        </nav>

    </div>


    <div class="d-flex align-items-center p-3 my-3 text-white bg-warning shadow-sm" style="border-radius: 10px;"></div>

    <div class="my-3 p-3 bg-body shadow-sm" style="border-radius: 10px;">

        <form action="asistenciaUpdate.php" method="POST">

            <div class="d-flex border-bottom">
                <div class="">
                    <h4 class="pb-2 mb-0"><i class="fa-solid fa-list-check"></i> Editar Asistencias - <?= $fecha ?></h4>
                    <input type="hidden" value="<?= $fecha ?>" name="fecha">
                </div>
            </div>

            <?php if ($rows) : ?>

                <div class="container pt-3">
                    <?php foreach ($rows as $row) : $i++ ?>

                        <div class="d-flex">
                            <strong class="d-block text-dark fs-5 pb-2">
                                <i class="fa-solid fa-circle-user"></i>
                                <?= $row['id_asistencia'] . ' ' . $row['nombre_usuario'] ?>
                                <input type="hidden" name="nombreTxt[<?= $i ?>]" value="<?= $row['nombre_usuario'] ?>">
                                <input type="hidden" name="id[<?= $i ?>]" value="<?= $row['id_asistencia']; ?>" />
                            </strong>
                            <?php if ($row['statusAsistencia'] == 1) { ?>
                                <div class="ms-5">
                                    <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                        <input type="checkbox" class="btn-check " id="btncheck<?= $row['id_asistencia'] ?>_1" name="asistenciaCheckB[<?= $i ?>]" value="1" autocomplete="off" checked>
                                        <label class="btn btn-outline-success " for="btncheck<?= $row['id_asistencia'] ?>_1"><i class="fa-solid fa-check"></i></label>
                                    </div>
                                </div>

                                <div class="ms-3">
                                    <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                        <input type="checkbox" class="btn-check justificacion-checkbox " id="btncheck<?= $row['id_asistencia'] ?>_2" name="justificacionCheckB[<?= $i ?>]" value="2" autocomplete="off">
                                        <label class="btn btn-outline-secondary " for="btncheck<?= $row['id_asistencia'] ?>_2"><i class="fa-solid fa-j"></i></label>
                                    </div>
                                </div>
                            <?php } elseif ($row['statusAsistencia'] == 2) { ?>
                                <div class="ms-5">
                                    <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                        <input type="checkbox" class="btn-check " id="btncheck<?= $row['id_asistencia'] ?>_1" name="asistenciaCheckB[<?= $i ?>]" value="1" autocomplete="off">
                                        <label class="btn btn-outline-success " for="btncheck<?= $row['id_asistencia'] ?>_1"><i class="fa-solid fa-check"></i></label>
                                    </div>
                                </div>
                                <div class="ms-3">
                                    <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                        <input type="checkbox" class="btn-check justificacion-checkbox " id="btncheck<?= $row['id_asistencia'] ?>_2" name="justificacionCheckB[<?= $i ?>]" value="2" autocomplete="off" checked>
                                        <label class="btn btn-outline-secondary " for="btncheck<?= $row['id_asistencia'] ?>_2"><i class="fa-solid fa-j"></i></label>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="ms-5">
                                    <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                        <input type="checkbox" class="btn-check " id="btncheck<?= $row['id_asistencia'] ?>_1" name="asistenciaCheckB[<?= $i ?>]" value="1" autocomplete="off">
                                        <label class="btn btn-outline-success " for="btncheck<?= $row['id_asistencia'] ?>_1"><i class="fa-solid fa-check"></i></label>
                                    </div>
                                </div>
                                <div class="ms-3">
                                    <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                        <input type="checkbox" class="btn-check justificacion-checkbox " id="btncheck<?= $row['id_asistencia'] ?>_2" name="justificacionCheckB[<?= $i ?>]" value="2" autocomplete="off">
                                        <label class="btn btn-outline-secondary " for="btncheck<?= $row['id_asistencia'] ?>_2"><i class="fa-solid fa-j"></i></label>
                                    </div>
                                </div>

                            <?php } ?>
                        </div>
                        <input type="hidden" class="form-control" name="txtContador" id="contador" value="<?= $i ?>" required>

                        <hr>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <div class="d-grid gap-2 d-md-flex justify-content-md pt-2">
                <a href="readAsistencias.php" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i> <b>Regresar</b></a>
                <button class="btn btn-success" type="submit"> <i class="fa-solid fa-floppy-disk"></i> <b>Guardar</b></button>
            </div>

        </form>
        <script src="../src/js/main.js"></script>

    </div>

<?php require_once("template/footer.php") ?>