<?php
require_once("template/header.php")
?>
<?php
require_once("../../controllers/usuariosController.php");
// Obtener el parámetro de la URL para verificar si hay resultados
$hayResultados = isset($_GET['hayResultados']) ? $_GET['hayResultados'] : false;

$sinAño = isset($_GET['sinAño']) ? $_GET['sinAño'] : true;

$objControl = new usuariosController();
$rows = $objControl->readUsuario();
?>

<main class="container">
    <!-- Barra de Estados -->
    <div class="nav-scroller bg-dark shadow-sm" style="border-radius: 10px; margin: 0px; margin-top: 15px;">
        <nav class="nav p-1 " aria-label="Secondary navigation">
            <div class="d-flex align-content-start flex-wrap">

                <div class="mt-2">
                    <br>
                </div>
            </div>

        </nav>
    </div>

    <div class="d-flex align-items-center p-3 my-3 text-white bg-warning shadow-sm" style="border-radius: 10px;"></div>

    <div class="my-3 p-3 bg-body shadow-sm" style="border-radius: 10px;">
        <div class="d-flex flex-wrap  border-bottom">
            <!-- Titulo del div blanco -->
            <div class="">
                <h4 class="pb-2 mb-0">
                    <i class="fa-solid fa-file-lines"></i>
                    Reportes
                </h4>
            </div>
        </div>

        <div class="container pt-3">

            <div class="row">
                <!-- Form 1 -->
                <div class="col">
                    <h5>Generar PDF por año</h5>
                    <form action="reporteAño.php" method="POST">

                        <div class="form-floating m-1 ">
                            <input class="input-group-small mb-3 form-control" type="number" id="year" name="year" min="2022" max="2100" placeholder="Año" inputmode="numeric" pattern="[0-9]{4}" title="Ingrese un año válido" required>
                            <label for="floatingInputDisabled"><i class="fa-solid fa-calendar"></i> Año</label>
                        </div>

                        <button type="submit" class="btn btn-secondary"><i class="fa-solid fa-file-pdf"></i> Generar por año</button>

                        <!-- Mostrar mensaje si no hay resultados -->
                        <?php if ($hayResultados === 'false') : ?>

                            <div class="alert alert-warning mt-3" role="alert">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                No hay asistencias registradas para el año escrito.
                            </div>
                        <?php endif; ?>
                    </form>
                </div>

                <div class="col">
                    <!-- GRAFICA DE PASTEL -->
                    <h5><i class="fa-solid fa-chart-pie"></i> Generar gráfica de pastel por año</h5>
                    <form action="grafica_pastel.php" method="POST">

                        <div class="form-floating m-1 ">
                            <input class="input-group-small mb-3 form-control" type="number" id="year" name="year" min="2022" max="2100" placeholder="Año" inputmode="numeric" pattern="[0-9]{4}" title="Ingrese un año válido" required>
                            <label for="floatingInputDisabled"><i class="fa-solid fa-calendar"></i> Año</label>
                        </div>

                        <button type="submit" class="btn btn-secondary"><i class="fa-solid fa-chart-pie"></i> Generar gráfica año</button>

                    </form>
                </div>

            </div>
            <hr>

            <!-- Form 2 -->

            <div class="row">
                <div class="col">
                    <h5>PDF por mes</h5>
                    <form action="reporteMes.php" method="POST">
                        <div class="form-floating m-1 ">
                            <input class="input-group-small mb-3 form-control" type="number" id="year" name="year" min="2022" max="2100" placeholder="Año" inputmode="numeric" pattern="[0-9]{4}" title="Ingrese un año válido" required>
                            <label for="floatingInputDisabled"><i class="fa-solid fa-calendar"></i> Año</label>
                        </div>
                        <div class="form-floating m-1 ">
                            <input class="input-group-small mb-3 form-control" type="number" id="month" name="month" min="1" max="31" placeholder="Mes" inputmode="numeric" pattern="[0-31]{2}" title="Ingrese un mes válido de dos digitos XX" required>
                            <label for="floatingInputDisabled"><i class="fa-solid fa-calendar"></i> Mes</label>
                        </div>

                        <button type="submit" class="btn btn-secondary"><i class="fa-solid fa-file-pdf"></i> Generar por mes</button>

                        <!-- Mostrar mensaje si no hay resultados -->
                        <?php if ($hayResultados === 'false') : ?>

                            <div class="alert alert-warning mt-3" role="alert">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                No hay asistencias registradas para el mes escrito.
                            </div>
                        <?php endif; ?>
                    </form>
                </div>

                <div class="col">
                    <!-- GRAFICA DE PASTEL -->
                    <h5><i class="fa-solid fa-chart-pie"></i> Generar gráfica de pastel por mes</h5>
                    <form action="grafica_pastelMes.php" method="POST">

                        <div class="form-floating m-1 ">
                            <input class="input-group-small mb-3 form-control" type="number" id="year" name="year" min="2022" max="2100" placeholder="Año" inputmode="numeric" pattern="[0-9]{4}" title="Ingrese un año válido" required>
                            <label for="floatingInputDisabled"><i class="fa-solid fa-calendar"></i> Año</label>
                        </div>

                        <div class="form-floating m-1 ">
                            <input class="input-group-small mb-3 form-control" type="number" id="month" name="month" min="1" max="31" placeholder="Mes" inputmode="numeric" pattern="[0-31]{2}" title="Ingrese un mes válido de dos digitos XX" required>
                            <label for="floatingInputDisabled"><i class="fa-solid fa-calendar"></i> Mes</label>
                        </div>


                        <button type="submit" class="btn btn-secondary"><i class="fa-solid fa-chart-pie"></i> Generar gráfica mes</button>

                    </form>

                </div>
            </div>

            <hr>

            <!-- Form 3 -->

            <div class="row">
                <div class="col">
                    <h5>PDF por día</h5>
                    <form action="reporteDia.php" method="POST">
                        <div class="form-floating m-1 ">
                            <input class="input-group-small mb-3 form-control" type="number" id="year" name="year" min="2022" max="2100" placeholder="Año" inputmode="numeric" pattern="[0-9]{4}" title="Ingrese un año válido" required>
                            <label for="floatingInputDisabled"><i class="fa-solid fa-calendar"></i> Año</label>
                        </div>
                        <div class="form-floating m-1 ">
                            <input class="input-group-small mb-3 form-control" type="number" id="month" name="month" min="1" max="12" placeholder="Mes" inputmode="numeric" pattern="[0-12]{2}" title="Ingrese un mes válido de dos digitos XX" required>
                            <label for="floatingInputDisabled"><i class="fa-solid fa-calendar"></i> Mes</label>
                        </div>
                        <div class="form-floating m-1 ">
                            <input class="input-group-small mb-3 form-control" type="number" id="day" name="day" min="1" max="31" placeholder="Dia" inputmode="numeric" pattern="[0-31]{2}" title="Ingrese un día válido" required>
                            <label for="floatingInputDisabled"><i class="fa-solid fa-calendar"></i> Día</label>
                        </div>

                        <button type="submit" class="btn btn-secondary"><i class="fa-solid fa-file-pdf"></i> Generar por día</button>

                        <!-- Mostrar mensaje si no hay resultados -->
                        <?php if ($hayResultados === 'false') : ?>

                            <div class="alert alert-warning mt-3" role="alert">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                No hay asistencias registradas para el día escrito.
                            </div>
                        <?php endif; ?>
                    </form>
                </div>

                <div class="col">
                    <!-- GRAFICA DE PASTEL -->
                    <h5><i class="fa-solid fa-chart-pie"></i> Generar gráfica de pastel por mes</h5>
                    <form action="grafica_pastelDia.php" method="POST">

                        <div class="form-floating m-1 ">
                            <input class="input-group-small mb-3 form-control" type="number" id="year" name="year" min="2022" max="2100" placeholder="Año" inputmode="numeric" pattern="[0-9]{4}" title="Ingrese un año válido" required>
                            <label for="floatingInputDisabled"><i class="fa-solid fa-calendar"></i> Año</label>
                        </div>

                        <div class="form-floating m-1 ">
                            <input class="input-group-small mb-3 form-control" type="number" id="month" name="month" min="1" max="31" placeholder="Mes" inputmode="numeric" pattern="[0-31]{2}" title="Ingrese un mes válido de dos digitos XX" required>
                            <label for="floatingInputDisabled"><i class="fa-solid fa-calendar"></i> Mes</label>
                        </div>

                        <div class="form-floating m-1 ">
                            <input class="input-group-small mb-3 form-control" type="number" id="day" name="day" min="1" max="31" placeholder="Dia" inputmode="numeric" pattern="[0-31]{2}" title="Ingrese un día válido" required>
                            <label for="floatingInputDisabled"><i class="fa-solid fa-calendar"></i> Día</label>
                        </div>


                        <button type="submit" class="btn btn-secondary"><i class="fa-solid fa-chart-pie"></i> Generar gráfica día</button>

                    </form>

                </div>
            </div>
            <hr>

            <!-- Form 4 -->
            <div class="row">
                <div class="col">
                    <h5>PDF por usuario</h5>
                    <form action="reporteMensualUsuario.php" method="POST">
                        <div class="form-floating m-1 ">
                            <input class="input-group-small mb-3 form-control" type="number" id="month" name="month" min="1" max="12" placeholder="Mes" inputmode="numeric" pattern="[0-12]{2}" title="Ingrese un mes válido de dos digitos XX de dos digitos XX" required>
                            <label for="floatingInputDisabled"><i class="fa-solid fa-calendar"></i> Mes</label>
                        </div>
                        <div class="form-floating m-1 ">
                            <select class="form-select" aria-label="Default select example" name="nombreUsuariotxt">
                                <?php
                                if ($rows) : ?>
                                    <option value="" selected>Seleccionar usuario</option>
                                    <?php foreach ($rows as $row) : ?>
                                        <option value="<?= $row['apellidoP'] . " " . $row['apellidoM'] . " " . $row['nombre'] ?>"><?= $row['apellidoP'] . " " . $row['apellidoM'] . " " . $row['nombre'] ?></option>
                                <?php endforeach;
                                endif;
                                ?>
                            </select>
                            <label for="floatingInputDisabled"><i class="fa-solid fa-circle-user"></i> Usuario</label>
                        </div>

                        <button type="submit" class="btn btn-secondary mt-2"><i class="fa-solid fa-file-pdf"></i> Generar por usuario</button>

                        <!-- Mostrar mensaje si no hay resultados -->
                        <?php if ($hayResultados === 'false') : ?>

                            <div class="alert alert-warning mt-3" role="alert">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                No hay asistencias registradas para el día escrito.
                            </div>
                        <?php endif; ?>
                    </form>
                </div>

                <div class="col">
                    <!-- GRAFICA DE PASTEL -->
                    <h5><i class="fa-solid fa-chart-pie"></i> Generar gráfica de pastel por mes</h5>
                    <form action="grafica_pastelUsuario.php" method="POST">

                        <div class="form-floating m-1 ">
                            <input class="input-group-small mb-3 form-control" type="number" id="month" name="month" min="1" max="12" placeholder="Mes" inputmode="numeric" pattern="[0-12]{2}" title="Ingrese un mes válido de dos digitos XX de dos digitos XX" required>
                            <label for="floatingInputDisabled"><i class="fa-solid fa-calendar"></i> Mes</label>
                        </div>
                        <div class="form-floating m-1 ">
                            <select class="form-select" aria-label="Default select example" name="nombreUsuariotxt">
                                <?php
                                if ($rows) : ?>
                                    <option value="" selected>Seleccionar usuario</option>
                                    <?php foreach ($rows as $row) : ?>
                                        <option value="<?= $row['apellidoP'] . " " . $row['apellidoM'] . " " . $row['nombre'] ?>"><?= $row['apellidoP'] . " " . $row['apellidoM'] . " " . $row['nombre'] ?></option>
                                <?php endforeach;
                                endif;
                                ?>
                            </select>
                            <label for="floatingInputDisabled"><i class="fa-solid fa-circle-user"></i> Usuario</label>
                        </div>


                        <button type="submit" class="btn btn-secondary mt-3"><i class="fa-solid fa-chart-pie"></i> Generar gráfica día</button>

                    </form>

                </div>
            </div>
        </div>

    </div>