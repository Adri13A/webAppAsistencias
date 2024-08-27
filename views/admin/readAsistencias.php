<?php
require_once("template/header.php")
?>
<?php
require_once("../../controllers/asistenciaController.php");


$objControl = new asistenciaController();
$rows = $objControl->readFecha();

$countAsistencias = 0;

if(is_array($rows)){
    foreach ($rows as $row) {
        $countAsistencias++;
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
                        <i class="fa-solid fa-calendar-day"></i>
                        Total de asistencias <?= $countAsistencias ?>
                    </label>
                </div>
            </div>

        </nav>

    </div>


    <div class="d-flex align-items-center p-3 my-3 text-white bg-warning shadow-sm" style="border-radius: 10px;"></div>

    <div class="my-3 p-3 bg-body shadow-sm" style="border-radius: 10px;">

        <form action="asistenciaInsert.php" method="POST">

            <div class="d-flex border-bottom">
                <div class="">
                    <h4 class="pb-2 mb-0"><i class="fa-solid fa-calendar-check"></i> Asistencias</h4>
                </div>
            </div>

            <?php if (empty($rows)) : ?>
                <div class="alert alert-info mt-3" role="alert">
                    No hay asistencias registrados por el momento.
                </div>
            <?php else : ?>
                <div class="container pt-3">
                    <?php foreach ($rows as $row) : ?>

                        <div class="d-flex flex-wrap">
                            <strong class="d-block text-dark fs-5 pb-2">
                                <i class="fa-solid fa-calendar-week"></i>
                                <input type="hidden" value="<?php ?>">
                                <?= $row['fecha'] ?>
                            </strong>

                            <div class="ms-3">
                                <!--  Boton para consultas las asistencia del dia marcado-->
                                <a href="readOneAsistencia.php?fecha=<?= $row['fecha'] ?>" class="btn btn-primary"><i class="fa-solid fa-eye"></i> Ver</a>
                            </div>
                            <div class="ms-3">
                                <!-- Boton para editar las asistencias del dia marcado -->
                                <a href="updateOneAsistencia.php?fecha=<?= $row['fecha'] ?>" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
                            </div>
                            <div class="ms-3">
                                <!-- Boton para editar las asistencias del dia marcado -->
                                <a href="asistenciaDelete.php?fecha=<?= $row['fecha'] ?>" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                            </div>

                        </div>

                        <input type="hidden" class="form-control" name="txtContador" id="contador" value="<?= $i ?>" required>

                        <hr>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <div class="d-grid gap-2 d-md-flex justify-content-md-start pt-2">
                <a href="index.php" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i> <b>Regresar</b></a>
            </div>
        </form>

    </div>

    <?php require_once("template/footer.php") ?>