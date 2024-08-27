<?php
require_once("template/header.php")
?>
<?php
require_once("../../controllers/usuariosController.php");

?>

<main class="container">

    <!-- Barra de Estados -->
    <div class="nav-scroller bg-dark shadow-sm" style="border-radius: 10px; margin: 0px; margin-top: 15px;">

        <nav class="nav p-1 " aria-label="Secondary navigation">

            <div class="d-flex flex-column">
                <div class="">
                    <label class="btn btn-black rounded-0" style="pointer-events: none; color:white;">
                        <h3><i class="fa-solid fa-circle-plus"></i> Nuevo Usuario</h3>
                    </label>
                </div>

                <div class="ms-2 mb-1">
                    <span class="badge text-bg-light rounded-pill">
                        <b class="" style="font-size:small">
                            Estado: desconocido
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
                    <i class="fa-solid fa-user-plus"></i>
                    Información del Nuevo Usuario
                </h4>
            </div>
        </div>

        <form action="usuarioInsert.php" method="POST" enctype="multipart/form-data">
            <!-- Información del usuario -->
            <div class="container pt-3">

                <div class="container">
                    <!-- INFO PERSONAL -->
                    <h5>Información Personal</h5>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-floating m-1 ">
                                <input type="date" class="form-control" id="floatingInputDisabled" placeholder="Ingresa la fecha de ingreso al taller" name="fechaIngresoTxt" required>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-calendar-day"></i> Fecha de Ingreso al Taller</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating m-1 flex-fill">
                                <input type="text" class="form-control" id="floatingInputDisabled" name="gradoTxt" placeholder="Ingresa el grado del usuario" required>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-graduation-cap"></i> Grado</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating m-1 flex-fill">
                                <input type="file" class="form-control" id="floatingInputDisabled" accept="image/png, image/jpeg" name="imagenFoto" placeholder="Selecciona una fotografía" required>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-image"></i> Fotografía</label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-floating m-1 ">
                                <input type="text" class="form-control" id="floatingInputDisabled" name="nombreTxt" placeholder="Ingresa el nombre del usuario" required>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-signature"></i> Nombre(s)</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating m-1 ">
                                <input type="text" class="form-control" id="floatingInputDisabled" name="apellidoPTxt" placeholder="Ingresa el apellido paterno del usuario" required>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-signature"></i> Apellido Paterno</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating m-1 ">
                                <input type="text" class="form-control" id="floatingInputDisabled" name="apellidoMTxt" placeholder="Ingresa el apellido materno del usuario" required>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-signature"></i> Apellido Materno</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating m-1 flex-fill">
                                <input type="date" class="form-control" id="floatingInputDisabled" name="fechaNacimientoTxt" placeholder="FechaNacimiento" required>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-calendar-week"></i> Fecha de Nacimiento</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-floating m-1 flex-fill">
                                <input type="text" class="form-control" id="floatingInputDisabled" name="domicilioTxt" placeholder="Ingresa la fecha de nacimiento del usuario" required>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-location-dot"></i> Domicilio</label>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-floating m-1 flex-fill">
                                <input type="email" class="form-control" id="floatingInputDisabled" name="correoTxt" placeholder="example@email.com" required>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-at"></i> Correo</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating m-1 flex-fill">
                                <input type="tel" class="form-control" id="floatingInputDisabled" name="celularTxt" placeholder="Ingresa el número de celular del usuario" required>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-mobile"></i> Celular</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating m-1 flex-fill">
                                <input type="tel" class="form-control" id="floatingInputDisabled" name="telefonoCasaTxt" placeholder="Ingresa el número de teléfono de casa del usuario" required>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-phone"></i> Telefono de Casa</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating m-1 flex-fill">
                                <input type="text" class="form-control" id="rfcInput" name="rfcTxt" placeholder="Ingresa el RFC del usuario" pattern="^([A-Z&Ñ]{3,4})([0-9]{2})([0][1-9]|1[0-2])([0][1-9]|[12][0-9]|3[01])[A-Z0-9]{3}$" title="Ingresa un RFC válido (formato: AAAA######XXX)" required>
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
                                <input type="text" class="form-control" id="floatingInputDisabled" name="profesionTxt" placeholder="Ingresa la profesión del usuario" required>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-briefcase"></i> Profesión</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating m-1 flex-fill">
                                <input type="tel" class="form-control" id="floatingInputDisabled" name="telefonoTrabajoTxt" placeholder="Ingresa el número de teléfono de trabajo del usuario" required>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-phone"></i> Telefono Trabajo</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-floating m-1 flex-fill">
                                <input type="text" class="form-control" id="floatingInputDisabled" name="domicilio_profesion" placeholder="Ingresa el domicilio de trabajo del usuario" required>
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
                                <input type="text" class="form-control" id="floatingInputDisabled" name="contactoEmergenciaTxt" placeholder="Ingresa el nombre del contacto de emergencia" required>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-person"></i> Contacto de Emergencia</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating m-1 flex-fill">
                                <input type="text" class="form-control" id="floatingInputDisabled" name="contactoEmergenciaTelefonoTxt" placeholder="Ingresa el número de teléfono del contacto de emergencia">
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
                                    <option>--------</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating m-1 flex-fill">
                                <input type="text" class="form-control" id="floatingInputDisabled" name="padecimientosTxt" placeholder="Ingresa los padecimientos del usuario" required>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-receipt"></i> Padecimientos</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-floating m-1 flex-fill">
                                <input type="text" class="form-control" id="floatingInputDisabled" name="alergiaTxt" placeholder="Ingresa las alergias del usuario" required>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-viruses"></i> Alergia(s)</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating m-1 flex-fill">
                                <input type="text" class="form-control" id="floatingInputDisabled" name="seguroTxt" placeholder="Ingresa el seguro del usuario" required>
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
                                <input type="text" class="form-control" id="floatingInputDisabled" name="conyugueTxt" placeholder="Ingresa el nombre del cónyuge del usuario" required>
                                <label for="floatingInputDisabled"><i class="fa-solid fa-children"></i> Conyugue</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating m-1 flex-fill">
                                <input type="date" class="form-control" id="floatingInputDisabled" name="conyugueCumpleTxt" placeholder="Ingresa la fecha de cumpleaños del cónyuge del usuario" required>
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
                                <input type="text" class="form-control" id="floatingInputDisabled" name="fechagrado1Txt" placeholder="">
                                <label for="floatingInputDisabled"><i class="fa-solid fa-pen"></i> Fecha Grado 1</label>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-floating m-1 flex-fill">
                                <input type="text" class="form-control" id="floatingInputDisabled" name="fechagrado2Txt" placeholder="">
                                <label for="floatingInputDisabled"> <i class="fa-solid fa-pen"></i> Fecha Grado 2</label>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-floating m-1 flex-fill">
                                <input type="text" class="form-control" id="floatingInputDisabled" name="fechagrado3Txt" placeholder="">
                                <label for="floatingInputDisabled"><i class="fa-solid fa-pen"></i> Fecha Grado 3</label>
                            </div>
                        </div>
                    </div>
                    <h5>Estado</h5>
                    <div class="row">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelectStatus"><i class="fa-solid fa-star"></i>&nbsp;Estados</label>
                            <select class="form-select" id="inputGroupSelectStatus" name="estadoTxt" required>
                                <option>------</option>
                                <option value="1">Activo</option>
                                <option value="2">Suspendido</option>
                                <option value="3">Expulsado</option>
                                <option value="0">Inactivo</option>
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