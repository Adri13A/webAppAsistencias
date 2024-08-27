<?php
require_once("template/header.php")
?>
<?php
require_once("../../controllers/usuariosController.php");

$id = $_GET['id_usuario'];

$objControl = new usuariosController();
$row = $objControl->readOneUsuario($id);


?>

<main class="container">

    <!-- Barra de Estados -->
    <div class="nav-scroller bg-dark shadow-sm" style="border-radius: 10px; margin: 0px; margin-top: 15px;">

        <nav class="nav p-1 " aria-label="Secondary navigation">

            <div class="d-flex flex-column">
                <div class="">
                    <label class="btn btn-black rounded-0" style="pointer-events: none; color:white;">
                        <h3><i class="fa-solid fa-circle-user"></i> <?= $row['nombre'] . ' ' . $row['apellidoP'] . ' ' . $row['apellidoM'] ?></h3>
                    </label>
                </div>

                <div class="ms-2 mb-1">
                    <span class="badge text-bg-light rounded-pill">
                        <img src="../src/img/<?= $row['estado'] ?>.png" alt="Estado" width="15px" height="15px" >
                        <b class="" style="font-size:small">
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

        </nav>

    </div>

    <!-- Barra amarilla -->
    <div class="d-flex align-items-center p-3 my-3 text-white bg-warning shadow-sm" style="border-radius: 10px;"></div>

    <!-- Contenedor de Información -->
    <div class="my-3 p-3 bg-body shadow-sm" style="border-radius: 10px;">

        <form action="" method="">

            <div class="d-flex flex-wrap  border-bottom">
                <div class="">
                    <h4 class="pb-2 mb-0"><i class="fa-solid fa-circle-info fg-xl"></i>
                        Información del Usuario
                    </h4>
                </div>
                <div class="ms-3 mb-3">
                    <a class="btn btn-warning" href="updateUsuario.php?id_usuario=<?= $row['id_usuario'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                </div>
            </div>

            <!-- Informacion del usuario -->
            <div class="container pt-3">

                <div class="container">
                    <!-- INFO PERSONAL -->
                    <h5>Información Personal</h5>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-floating m-1 ">
                                <input type="email" class="form-control" id="floatingInputDisabled" placeholder="" value="<?= $row['id_usuario'] ?>" disabled>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-id-badge"></i> ID</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating m-1 ">
                                <input type="date" class="form-control" id="floatingInputDisabled" placeholder="2024-12-02" value="<?= $row['fecha_ingreso_taller'] ?>" disabled>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-calendar-day"></i> Fecha de Ingreso al Taller</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating m-1 flex-fill">
                                <input type="text" class="form-control" id="floatingInputDisabled" placeholder="" value="<?= $row['grado'] ?>" disabled>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-graduation-cap"></i> Grado</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating m-1 flex-fill">
                                <div class="input-group mb-3">
                                     <img class="input-group-text" src="../../views/src/img/usuarios/<?= $row['fotografia'] ?>" alt="<?= $row['nombre'] ?>" width="70px" height="60px">
                                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="Fotografia" disabled>
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-floating m-1 ">
                                <input type="text" class="form-control" id="floatingInputDisabled" placeholder="Nombre y Apellido" value="<?= $row['nombre'] . ' ' . $row['apellidoP'] . ' ' . $row['apellidoM'] ?>" disabled>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-signature"></i> Nombre(s) Apellidos</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-floating m-1 flex-fill">
                                <input type="date" class="form-control" id="floatingInputDisabled" placeholder="" value="<?= $row['fecha_nacimiento'] ?>" disabled>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-calendar-week"></i> Fecha de Nacimiento</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating m-1 flex-fill">
                                <input type="text" class="form-control" id="floatingInputDisabled" placeholder="" value="<?= $row['domicilio'] ?>" disabled>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-location-dot"></i> Domicilio</label>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-floating m-1 flex-fill">
                                <input type="email" class="form-control" id="floatingInputDisabled" placeholder="name@example.com" value="<?= $row['correo'] ?>" disabled>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-at"></i> Correo</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating m-1 flex-fill">
                                <input type="tel" class="form-control" id="floatingInputDisabled" placeholder="" value="<?= $row['celular'] ?>" disabled>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-mobile"></i> Celular</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating m-1 flex-fill">
                                <input type="tel" class="form-control" id="floatingInputDisabled" placeholder="" value="<?= $row['telefonoCasa'] ?>" disabled>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-phone"></i> Telefono de Casa</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating m-1 flex-fill">
                                <input type="text" class="form-control" id="floatingInputDisabled" placeholder="" value="<?= $row['rfc'] ?>" disabled>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-id-card-clip"></i> RFC</label>
                            </div>
                        </div>

                    </div>
                    <!-- FIN INFO PERSONAL -->

                    <!-- INFOR PROFESION -->
                    <h5>Información de Profesión</h5>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-floating m-1 flex-fill">
                                <input type="text" class="form-control" id="floatingInputDisabled" placeholder="" value="<?= $row['profesion'] ?>" disabled>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-briefcase"></i> Profesión</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating m-1 flex-fill">
                                <input type="tel" class="form-control" id="floatingInputDisabled" placeholder="" value="<?= $row['telefonoTrabajo'] ?>" disabled>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-phone"></i> Telefono Trabajo</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-floating m-1 flex-fill">
                                <input type="text" class="form-control" id="floatingInputDisabled" placeholder="" value="<?= $row['domicilio_profesion'] ?>" disabled>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-location-dot"></i> Domicilio Profesion</label>
                            </div>
                        </div>
                    </div>
                    <!-- FIN INFO PROFESION -->

                    <h5>Información de Emergencia</h5>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-floating m-1 flex-fill">
                                <input type="text" class="form-control" id="floatingInputDisabled" placeholder="" value="<?= $row['contacto_emergenciaNombre'] ?>" disabled>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-person"></i> Contacto de Emergencia</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating m-1 flex-fill">
                                <input type="text" class="form-control" id="floatingInputDisabled" placeholder="" value="<?= $row['contacto_emergenciaTelefono'] ?>" disabled>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-phone"></i> Telefono de Contacto</label>
                            </div>
                        </div>
                    </div>

                    <h5>Información de Salud</h5>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-floating m-1 flex-fill">
                                <input type="text" class="form-control" id="floatingInputDisabled" placeholder="Tipo Sangre" value="<?= $row['tipoSangre']?>" disabled>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-droplet"></i> Tipo de Sangre</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating m-1 flex-fill">
                                <input type="text" class="form-control" id="floatingInputDisabled" placeholder="" value="<?= $row['padecimientos'] ?>" disabled>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-receipt"></i> Padecimientos</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-floating m-1 flex-fill">
                                <input type="text" class="form-control" id="floatingInputDisabled" placeholder="" value="<?= $row['alergia'] ?>" disabled>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-viruses"></i> Alergia(s)</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating m-1 flex-fill">
                                <input type="text" class="form-control" id="floatingInputDisabled" placeholder="" value="<?= $row['seguro'] ?>" disabled>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-notes-medical"></i> Seguro</label>
                            </div>
                        </div>
                    </div>
                    <h5>Información Familiar</h5>
                    <div class="row">

                        <div class="col-sm-6">
                            <div class="form-floating m-1 flex-fill">
                                <input type="text" class="form-control" id="floatingInputDisabled" placeholder="" value="<?= $row['conyugue'] ?>" disabled>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-children"></i> Conyugue</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating m-1 flex-fill">
                                <input type="date" class="form-control" id="floatingInputDisabled" placeholder="" value="<?= $row['conyugueCumpleaños'] ?>" disabled>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-cake-candles"></i> Cumpleaños del Conyugue</label>
                            </div>
                        </div>
                    </div>

                    <h5>Información Adicional</h5>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-floating m-1 flex-fill">
                                <input type="text" class="form-control" id="floatingInputDisabled" placeholder="" value="<?= $row['fechagrado1'] ?>" disabled>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-pen"></i> Fecha Grado 1</label>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-floating m-1 flex-fill">
                                <input type="text" class="form-control" id="floatingInputDisabled" placeholder="" value="<?= $row['fechagrado2'] ?>" disabled>
                                <label for="floatingInputDisabled"> <i class="fa-solid fa-pen"></i> Fecha Grado 2</label>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-floating m-1 flex-fill">
                                <input type="text" class="form-control" id="floatingInputDisabled" placeholder="" value="<?= $row['fechagrado3'] ?>" disabled>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-pen"></i> Fecha Grado 3</label>
                            </div>
                        </div>
                    </div>
                    <h5>Estado</h5>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-floating m-1 flex-fill">
                                <input type="text" class="form-control" id="floatingInputDisabled" placeholder="" value="<?php if ($row['estado'] == 1) {
                                                                                                                                echo "Activo";
                                                                                                                            } elseif ($row['estado'] == 2) {
                                                                                                                                echo "Suspendido";
                                                                                                                            } elseif ($row['estado'] == 3) {
                                                                                                                                echo "Expulsado";
                                                                                                                            } else {
                                                                                                                                echo "Inactivo";
                                                                                                                            }
                                                                                                                            ?>" disabled>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-star"></i> Estado</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start pt-2">
                <a href="readAllUsuarios.php" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i> <b>Regresar</b></a>

            </div>
        </form>

        <script src="../src/js/main.js"></script>

    </div>

    <?php require_once("template/footer.php") ?>