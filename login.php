<?php
    session_start();

    if ($_POST) {
        if ($_POST['email'] == "lucasgancia@gmail.com" && $_POST['pass'] == 12345) {
            $_SESSION['usuario'] = "Lucas Gancia";
            header("location: index.php");
        } else {
            echo "<script> alert('Tu email o contraseña son incorrectos') </script>";       
        }
    }
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Titulo de la vista -->
    <title>Iniciar Sesión</title>

    <!---- ======== FAVICON ======== -->
    <!-- <link rel="shortcut icon" href="assets/img/nosé_logo(B&W).png" type="image/x-icon"> -->

    <!---- ======== LINK CSS ======== -->
    <link rel="stylesheet" href="assets/css/styles_login.css">

    <!---- ======== BOXICONS CSS ======== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <!---- ======== BOOTSTRAP - BOOTSTRAP ICON ======== -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body>
    <div class="background-formLogin ms-5 me-5">
        <form action="login.php" method="POST">
            <img id="img-login" src="assets/img/nosé_logo(B&W).png" class="img-fluid m-0 p-0" alt="logoLogin">

            <!-- EMAIL - INPUT -->
            <div class="form-outline mb-4">
                <input required name="email" type="email" class="form-control rounded-0" placeholder="email" />
            </div>

            <!-- PASSWORD - INPUT -->
            <div class="form-outline mb-4" id="input-pass">
                <input id="txtPassword" required name="pass" type="password" class="form-control rounded-0" placeholder="contraseña" />

                <button id="show-password" class="btn rounded-0" type="button" onclick="mostrarPassword()">
                    <span class="bi bi-eye-slash icon"></span></button>
            </div>

            <!-- "SUSCRIBITE" - BUTTON -->
            <div class="text-center">
                <p>¿No eres miembro? <a href="subscribe.php">Suscríbete</a></p>
            </div>

            <!-- LINE -->
            <div class="container-fluid">
                <hr>
            </div>

            <!-- SUBMIT BUTTON -->
            <button class="button-login mb-2" type="submit" name="entrar" value="entrar">iniciar sesión</button>

            <!-- "OLVIDASTE LA CONTRASEÑA" - BUTTON -->
            <div class="mb-5">
                <button type="button" class="button-forgetpass" data-bs-toggle="modal" data-bs-target="#staticBackdrop">¿Olvidaste tu contraseña?</button>
            </div>

            <!-- "OLVIDASTE LA CONTRASEÑA" - MODAL -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content rounded-0">
                        <div class="modal-header">
                            <p class="modal-title text-center" id="staticBackdropLabel">TE HEMOS ENVIADO UN CORREO ¿LO HAS VISTO?</p>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            Échale un vistaso a tu correo electrónico para que puedas recordar tu contraseña.
                            Serán unos simples pasos y ... ¡listo! nuevamente tendrás acceso.<br><br><span class="modal-bodySpan">¡TE ESPERAMOS!</span>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="button-close" data-bs-dismiss="modal">Cerrar</button>
                            <button type="button" class="button-login" data-bs-dismiss="modal">ENTENDIDO</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- MOSTRAR Y OCULTAR CONTRASEÑA -->
    <script type="text/javascript">
        function mostrarPassword() {
            var cambio = document.getElementById("txtPassword");
            if (cambio.type == "password") {
                cambio.type = "text";
                $('.icon').removeClass('bi bi-eye-slash').addClass('bi bi-eye');
            } else {
                cambio.type = "password";
                $('.icon').removeClass('bi bi-eye').addClass('bi bi-eye-slash');
            }
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>