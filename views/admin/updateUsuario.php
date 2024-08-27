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
                        <img src="../src/img/<?= $row['estado'] ?>.png" alt="Estado" width="15px" height="15px">
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

        <div class="d-flex flex-wrap  border-bottom">
            <div class="">
                <h4 class="pb-2 mb-0">
                    <i class="fa-solid fa-user-pen"></i>
                    Editar Información del Usuario
                </h4>
            </div>
        </div>

        <form action="usuarioUpdate.php" method="POST" enctype="multipart/form-data">
            <!-- Información del usuario -->
            <div class="container pt-3">

                <div class="container">
                    <!-- INFO PERSONAL -->
                    <h5>Información Personal</h5>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-floating m-1 ">
                                <input type="text" class="form-control" id="floatingInputDisabled" placeholder="ID" value="<?= $row['id_usuario'] ?>" disabled>
                                <input type="text" name="id" value=" <?= $row["id_usuario"] ?>" hidden />
                                <label for="floatingInputDisabled"><i class="fa-solid fa-id-badge"></i> ID</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating m-1 ">
                                <input type="date" class="form-control" id="floatingInputDisabled" placeholder="2024-12-02" name="fechaIngresoTxt" value="<?= $row['fecha_ingreso_taller'] ?>" required>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-calendar-day"></i> Fecha de Ingreso al Taller</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating m-1 flex-fill">
                                <input type="text" class="form-control" id="floatingInputDisabled" name="gradoTxt" placeholder="" value="<?= $row['grado'] ?>" required>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-graduation-cap"></i> Grado</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating m-1 flex-fill">
                                <input type="file" class="form-control" id="floatingInputDisabled" accept="image/png, image/jpeg" name="imagenFoto" placeholder="" value="<?= $row['fotografia'] ?>">
                                <input type="hidden" class="form-control" name="imagenFotoVieja" id="fotoJugadorVieja" value="<?= $row['fotografia'] ?>">
                                <label for="floatingInputDisabled"><i class="fa-solid fa-image"></i> Fotografía</label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-floating m-1 ">
                                <input type="text" class="form-control" id="floatingInputDisabled" name="nombreTxt" placeholder="Nombre y Apellido" value="<?= $row['nombre'] ?>" required>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-signature"></i> Nombre(s)</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating m-1 ">
                                <input type="text" class="form-control" id="floatingInputDisabled" name="apellidoPTxt" placeholder="ApellidoPaterno" value="<?= $row['apellidoP'] ?>" required>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-signature"></i> Apellido Paterno</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating m-1 ">
                                <input type="text" class="form-control" id="floatingInputDisabled" name="apellidoMTxt" placeholder="ApellidoMaterno" value="<?= $row['apellidoM'] ?>" required>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-signature"></i> Apellido Materno</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating m-1 flex-fill">
                                <input type="date" class="form-control" id="floatingInputDisabled" name="fechaNacimientoTxt" placeholder="FechaNacimiento" value="<?= $row['fecha_nacimiento'] ?>" required>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-calendar-week"></i> Fecha de Nacimiento</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-floating m-1 flex-fill">
                                <input type="text" class="form-control" id="floatingInputDisabled" name="domicilioTxt" placeholder="" value="<?= $row['domicilio'] ?>" required>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-location-dot"></i> Domicilio</label>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-floating m-1 flex-fill">
                                <input type="email" class="form-control" id="floatingInputDisabled" name="correoTxt" placeholder="" value="<?= $row['correo'] ?>" required>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-at"></i> Correo</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating m-1 flex-fill">
                                <input type="tel" class="form-control" id="floatingInputDisabled" name="celularTxt" placeholder="" value="<?= $row['celular'] ?>" required>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-mobile"></i> Celular</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating m-1 flex-fill">
                                <input type="tel" class="form-control" id="floatingInputDisabled" name="telefonoCasaTxt" placeholder="" value="<?= $row['telefonoCasa'] ?>" required>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-phone"></i> Telefono de Casa</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating m-1 flex-fill">
                                <input type="text" class="form-control" id="rfcInput" name="rfcTxt" placeholder="" value="<?= $row['rfc'] ?>" pattern="^([A-Z&Ñ]{3,4})([0-9]{2})([0][1-9]|1[0-2])([0][1-9]|[12][0-9]|3[01])[A-Z0-9]{3}$" title="Ingresa un RFC válido (formato: AAAA######XXX)" required>
                                <label for="rfcInput"><i class="fa-solid fa-id-card-clip"></i> RFC</label>
                            </div>
                        </div>


                    </div>
                    <!-- FIN INFO PERSONAL -->
                    <br>
                    <hr>
                    <!-- INFOR PROFESION -->
                    <h5>Información de Profesión</h5>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-floating m-1 flex-fill">
                                <input type="text" class="form-control" id="floatingInputDisabled" name="profesionTxt" placeholder="" value="<?= $row['profesion'] ?>" required>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-briefcase"></i> Profesión</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating m-1 flex-fill">
                                <input type="tel" class="form-control" id="floatingInputDisabled" name="telefonoTrabajoTxt" placeholder="" value="<?= $row['telefonoTrabajo'] ?>" required>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-phone"></i> Telefono Trabajo</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-floating m-1 flex-fill">
                                <input type="text" class="form-control" id="floatingInputDisabled" name="domicilio_profesion" placeholder="" value="<?= $row['domicilio_profesion'] ?>" required>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-location-dot"></i> Domicilio Profesion</label>
                            </div>
                        </div>
                    </div>
                    <!-- FIN INFO PROFESION -->
                    <br>
                    <hr>
                    <h5>Información de Emergencia</h5>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-floating m-1 flex-fill">
                                <input type="text" class="form-control" id="floatingInputDisabled" name="contactoEmergenciaTxt" placeholder="" value="<?= $row['contacto_emergenciaNombre'] ?>" required>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-person"></i> Contacto de Emergencia</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating m-1 flex-fill">
                                <input type="text" class="form-control" id="floatingInputDisabled" name="contactoEmergenciaTelefonoTxt" placeholder="" value="<?= $row['contacto_emergenciaTelefono'] ?>" required>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-phone"></i> Telefono de Contacto</label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <h5>Información de Salud</h5>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelectBlood"><i class="fa-solid fa-droplet"></i> &nbsp;Tipo de Sangre</label>
                                <select class="form-select" name="tipoSangreTxt" id="inputGroupSelectBlood" required>
                                    <option <?php if ($row['tipoSangre'] == "NULL") echo "selected"; ?>>Seleccionar tipo de sangre</option>
                                    <option <?php if ($row['tipoSangre'] == "A+") echo "selected"; ?> value="A+">A+</option>
                                    <option <?php if ($row['tipoSangre'] == "A-") echo "selected"; ?> value="A-">A-</option>
                                    <option <?php if ($row['tipoSangre'] == "B+") echo "selected"; ?> value="B+">B+</option>
                                    <option <?php if ($row['tipoSangre'] == "B-") echo "selected"; ?> value="B-">B-</option>
                                    <option <?php if ($row['tipoSangre'] == "AB+") echo "selected"; ?> value="AB+">AB+</option>
                                    <option <?php if ($row['tipoSangre'] == "AB-") echo "selected"; ?> value="AB-">AB-</option>
                                    <option <?php if ($row['tipoSangre'] == "O+") echo "selected"; ?> value="O+">O+</option>
                                    <option <?php if ($row['tipoSangre'] == "O-") echo "selected"; ?> value="O-">O-</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating m-1 flex-fill">
                                <input type="text" class="form-control" id="floatingInputDisabled" name="padecimientosTxt" placeholder="" value="<?= $row['padecimientos'] ?>" required>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-receipt"></i> Padecimientos</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-floating m-1 flex-fill">
                                <input type="text" class="form-control" id="floatingInputDisabled" name="alergiaTxt" placeholder="" value="<?= $row['alergia'] ?>" required>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-viruses"></i> Alergia(s)</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating m-1 flex-fill">
                                <input type="text" class="form-control" id="floatingInputDisabled" name="seguroTxt" placeholder="" value="<?= $row['seguro'] ?>" required>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-notes-medical"></i> Seguro</label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <h5>Información Familiar</h5>
                    <div class="row">

                        <div class="col-sm-6">
                            <div class="form-floating m-1 flex-fill">
                                <input type="text" class="form-control" id="floatingInputDisabled" name="conyugueTxt" placeholder="" value="<?= $row['conyugue'] ?>" required>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-children"></i> Conyugue</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating m-1 flex-fill">
                                <input type="date" class="form-control" id="floatingInputDisabled" name="conyugueCumpleTxt" placeholder="" value="<?= $row['conyugueCumpleaños'] ?>" required>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-cake-candles"></i> Cumpleaños del Conyugue</label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <h5>Información Adicional</h5>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-floating m-1 flex-fill">
                                <input type="text" class="form-control" id="floatingInputDisabled" name="fechagrado1Txt" placeholder="" value="<?= $row['fechagrado1'] ?>">
                                <label for="floatingInputDisabled"><i class="fa-solid fa-pen"></i> Fecha Grado 1</label>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-floating m-1 flex-fill">
                                <input type="text" class="form-control" id="floatingInputDisabled" name="fechagrado2Txt" placeholder="" value="<?= $row['fechagrado2'] ?>">
                                <label for="floatingInputDisabled"> <i class="fa-solid fa-pen"></i> Fecha Grado 2</label>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-floating m-1 flex-fill">
                                <input type="text" class="form-control" id="floatingInputDisabled" name="fechagrado3Txt" placeholder="" value="<?= $row['fechagrado3'] ?>">
                                <label for="floatingInputDisabled"><i class="fa-solid fa-pen"></i> Fecha Grado 3</label>
                            </div>
                        </div>
                    </div>
                    <h5>Estado</h5>
                    <div class="row">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelectStatus"><i class="fa-solid fa-star"></i>&nbsp;Estados</label>
                            <select class="form-select" id="inputGroupSelectStatus" name="estadoTxt" required>
                                <option <?php if ($row['estado'] == 1) echo "selected"; ?> value="1">Activo</option>
                                <option <?php if ($row['estado'] == 2) echo "selected"; ?> value="2">Suspendido</option>
                                <option <?php if ($row['estado'] == 3) echo "selected"; ?> value="3">Expulsado</option>
                                <option <?php if ($row['estado'] == 0) echo "selected"; ?> value="0">Inactivo</option>
                            </select>

                        </div>
                    </div>
                </div>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start pt-2">
                <a href="readAllUsuarios.php" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i> <b>Regresar</b></a>
                <button class="btn btn-success" type="submit"><i class="fa-solid fa-floppy-disk"></i> <b>Guardar</b></button>
            </div>
        </form>

        <script src="../src/js/main.js"></script>

    </div>

    <?php require_once("template/footer.php") ?>