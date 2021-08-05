<?php
session_start();

if (isset($_SESSION['user'])) {
	header('Location: miPerfil.php');
	exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif|Hind+Guntur|Signika&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/estilos/style.css">

</head>

<body>
    <div class="contenedor">
        <div class="contenedor_titulo">
            <h1 class="titulo">Virtual Forest</h1>
        </div>

        <div class="contenedor_login">
            <p class="text Nombre_de_usario">Nombre de Usuario</p>
            <form  autocomplete="on" action="login_action.php" method="POST">
                <input class="form__input" type="text" id="nombre" name="nombre" 
                    placeholder="Nombre de usuario" required>
                <p class="text contraseña">Contraseña</p>
                <input class="form__input" type="password" id="password" name="password" 
                    placeholder="***************************" required>

                    <div class="container-btn_login">
                        <button class="btn login__btn" type="submit">Inciar sesión</button>
                    </div>
            </form>

            <div class="container_outForm">
                <div class="container_btns">
                    <div class="container-btn_registro">
                        <button class="btn registro__btn" onclick="registrarse()">Regístrate</button>
                    </div>
                </div>
                    <div class="contenedor_contraseña">
                    <button class="login__text login_text--link" onclick="password_reset()">¿Olvidaste tu contraseña?</button>
                </div>
            </div>
                <div class="mensaje">

                     <?php
                    if (isset($_SESSION['error']) && $_SESSION['error']) {
                        echo '<span class="error">' . $_SESSION['msj'] . '</span>';
                        unset($_SESSION['error']);
                        unset($_SESSION['msj']);
                        }
                    ?>
                 </div>
            
        </div>
    </div>
    <script src="./assets/js/app.js"></script>
</body>

</html>