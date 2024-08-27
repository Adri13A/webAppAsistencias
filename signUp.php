<!doctype html>
<html lang="es" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Registro</title>
    <link rel="icon" href="./views/src//img/icon.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="manifest" href="https://getbootstrap.com/docs/5.3/assets/img/favicons/manifest.json">
    <meta name="theme-color" content="#712cf9">
    <link rel="stylesheet" href="./views/src/css/style.css">
    <link href="https://getbootstrap.com/docs/5.3/examples/sign-in/sign-in.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9705d6f157.js" crossorigin="anonymous"></script>
</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary">
    <main class="form-signin w-100 m-auto">
        <div class="card pb-5 pt-5F" style="border-radius: 15px; height: auto; width: auto; position: relative; border: 2px solid black">
            <div class="card-body ">
                <form method="POST" action="./views/usuario/registroUsuario.php">
                    <svg class="mb-4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="122" height="107">
                        <image x="0px" y="0px" width="122" height="107" xlink:href="./views/src/img/icon.svg" />
                    </svg>
                    <h1 class="h3 mb-3 fw-normal"><b>Resgistro Admin<i class="fa-solid fa-hand-peace"></i></b></h1>

                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" name="nombreTxt" placeholder="Nombre" required>
                        <label for="floatingInput"><i class="fa-solid fa-signature"></i> Nombre</label>
                    </div>

                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" name="usuarioTxt" placeholder="Usuario" required>
                        <label for="floatingInput"><i class="fa-solid fa-user"></i> Usuario</label>
                    </div>
                    
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" name="passTxt" placeholder="Contraseña" required>
                        <label for="floatingPassword"><i class="fa-solid fa-key"></i> Contraseña</label>
                    </div>

                    <div class="form-check text-start my-3">

                    </div>
                    <button class="btn btn-warning w-100 py-2" type="submit"><b><i class="fa-solid fa-door-closed"></i> Resitrarse</b></button>
                    <a href="index.php" style="color: white;">Login</a>
                </form>
            </div>
        </div>
    </main>
</body>

</html>