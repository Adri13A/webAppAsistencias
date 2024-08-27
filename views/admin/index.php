<?php
require_once("template/header.php")
?>
<?php
require_once("../../controllers/usuariosController.php");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET["inactivo"])) {
        $opcion = $_GET["inactivo"];

        $objControl = new usuariosController();

        $rows = ($opcion = 'inactivo') ? $objControl->readUsuarioEstado(0) : $objControl->readUsuarioEstado(1);
    } elseif (isset($_GET["suspendido"])) {

        $opcion = $_GET["suspendido"];

        $objControl = new usuariosController();

        $rows = ($opcion = 'suspendido') ? $objControl->readUsuarioEstado(2) : $objControl->readUsuarioEstado(1);
    } elseif (isset($_GET["expulsado"])) {

        $opcion = $_GET["expulsado"];

        $objControl = new usuariosController();

        $rows = ($opcion = 'expulsado') ? $objControl->readUsuarioEstado(3) : $objControl->readUsuarioEstado(1);
    } else {

        $objControl = new usuariosController();
        $rows = $objControl->readUsuarioEstado(1);
    }
} else {
    header("Location: index.php");
}


$objControl = new usuariosController();
$rows2 = $objControl->readUsuario();



$countActivos = 0;
$countSuspendidos = 0;
$countExpulsados = 0;
$countInactivos = 0;

if (is_array($rows2)) {
    foreach ($rows2 as $row2) {
        if ($row2['estado'] == 1) {
            $countActivos++;
        } elseif ($row2['estado'] == 2) {
            $countSuspendidos++;
        } elseif ($row2['estado'] == 3) {
            $countExpulsados++;
        } elseif ($row2['estado'] == 0) {
            $countInactivos++;
        }
    }
} else {
    // Manejar el caso en el que $rows2 no sea un array
    // Por ejemplo, mostrar un mensaje indicando que no hay usuarios

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

$i = 0;
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

            <?php if (empty($rows)) : ?>
                
            <?php else : ?>
                <div class="d-flex flex-wrap  border-bottom">
                    <div class="">
                        <h4 class="pb-2 mb-0"><i class="fa-solid fa-list-check"></i>
                            <?php
                            $varInactivo = "inactivo";
                            $varSuspendido = "suspendido";
                            $varExpulsado = "expulsado";
                            if (isset($_GET["inactivo"]) == $varInactivo) {
                                echo "Usuarios Inactivos";
                            } elseif (isset($_GET["suspendido"]) == $varSuspendido) {
                                echo "Usuarios Suspendidos";
                            } elseif (isset($_GET["expulsado"]) == $varExpulsado) {
                                echo "Usuarios Expulsados";
                            } else {
                                echo "Pase de Lista";
                            }
                            ?>
                        </h4>
                    </div>
                    <div class="ms-4 mt-1">
                        <i class="fa-solid fa-calendar-days fa-xl"></i>
                    </div>
                    <div class="ms-2">
                        <!-- FECHA -->
                        <?php
                        //Determinar la zona horaria
                        $userTimezone = "America/Mazatlan";

                        // Get the current time for the timezone
                        $currentTime = new DateTime("now", new DateTimeZone($userTimezone));
                        ?>
                        <?php
                        $varInactivo = "inactivo";
                        $varSuspendido = "suspendido";
                        $varExpulsado = "expulsado";
                        if (!isset($_GET[$varInactivo]) && !isset($_GET[$varSuspendido]) && !isset($_GET[$varExpulsado])) {
                        ?>
                            <input for="" type="datetime-local" class="input-group-small mb-3 form-control" name="fecha" value="<?php echo $currentTime->format("d-m-Y H:i"); ?>" style="border-radius:5px" required>
                        <?php } ?>
                        <!-- FECHA FIN-->
                    </div>
                    <div class="ms-2 mb-3">
                        <a href="insertUsuario.php" class="btn btn-success"><i class="fa-solid fa-user-plus"></i> Usuario nuevo</a>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (empty($rows)) : ?>
                <div class="alert alert-danger" role="alert">
                    Aún no se encuentran usuarios registrados, si desea agregar usuarios <a href="insertUsuario.php" class="alert-link">pulse aquí</a>.
                </div>
            <?php else : ?>
                <div class="container pt-3">
                    <?php foreach ($rows as $row) : $i++ ?>

                        <div class="d-flex">
                            <strong class="d-block text-dark fs-5 pb-2">
                                <i class="fa-solid fa-circle-user"></i>
                                <input type="hidden" name="nombreTxt[<?= $i ?>]" value="<?= $row['apellidoP'] . ' ' . $row['apellidoM'] . ' ' . $row['nombre'] ?>">
                                <?= $row['apellidoP'] . ' ' . $row['apellidoM'] . ' ' . $row['nombre'] ?>
                            </strong>

                            <?php if ($row['estado'] == 1) { ?>

                                <div class="ms-5">
                                    <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                        <input type="checkbox" class="btn-check" id="btncheck<?= $row['id_usuario'] ?>_1" name="asistenciaCheckB[<?= $i ?>]" value="1" autocomplete="off">
                                        <label class="btn btn-outline-success" for="btncheck<?= $row['id_usuario'] ?>_1"><i class="fa-solid fa-check"></i></label>
                                    </div>
                                </div>
                                <div class="ms-3">
                                    <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                        <input type="checkbox" class="btn-check justificacion-checkbox" id="btncheck<?= $row['id_usuario'] ?>_2" name="justificacionCheckB[<?= $i ?>]" value="2" autocomplete="off">
                                        <label class="btn btn-outline-secondary" for="btncheck<?= $row['id_usuario'] ?>_2"><i class="fa-solid fa-j"></i></label>
                                    </div>
                                </div>
                            <?php } else {
                            } ?>
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

                        <input type="hidden" class="form-control" name="txtContador" id="contador" value="<?= $i ?>" required>

                        <hr>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <!-- Botón "Guardar" -->
            <?php if (empty($rows)) : ?>
                <?php else :
                $var = "inactivo";
                $var2 = "suspendido";
                $var3 = "expulsado";
                if ($var != isset($_GET["inactivo"]) && $var2 != isset($_GET["suspendido"]) && $var3 !=  isset($_GET["expulsado"]) ) : ?>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start pt-2">
                        <button class="btn btn-success" type="submit"><i class="fa-solid fa-floppy-disk"></i> <b>Guardar</b></button>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

        </form>
        <script src="../src/js/main.js"></script>

    </div>

    <?php require_once("template/footer.php") ?>