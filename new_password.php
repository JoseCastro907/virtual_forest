<?php
session_start();

if (isset($_SESSION['user'])) {
	header('Location: index.php');
	exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New password</title>
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif|Hind+Guntur|Signika&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/estilos/style.css">
</head>

<body>
    <header class="contraseña_reset">
        <div class="contenedor_contraseña_reset">
            <h1 class="titulo_pass_reset">Restablecimiento de contraseña</h1>
        </div>
    </header>
    <div class="pageContenedor">
        <div class="seccion">
            <div class="titulo_descripcion">
                <p>Ingrese su correo electrónico</p>
            </div>

            
            <form class="reset__form" autocomplete="on" action="new_password_action.php" method="POST">
                <input class="form__reset" type="email" id="correo" name="correo" 
                    required><br><br>
                    <p>Ingrese el código enviado a su correo electrónico </p>
                    <input class = "form__reset" type="text" id="codigo" name="codigo"required><br><br>

                    <p>Ingrese su nueva contraseña</p>
                    <input class = "form__reset" type="password" id="pass" name="pass"required><br><br>

                    <p>Confirmar contraseña</p>
                    <input class = "form__reset" type="password" id="passConfirm" name="passConfirm"required><br><br>
                <div class="container-btn_reset">
                    <button class="btn reset__btn" type="submit">Enviar</button>
                </div>
            </form>
        </div>
        
        <?php
                    if (isset($_SESSION['error']) && $_SESSION['error']) {
                        echo '<span class="error">' . $_SESSION['msj'] . '</span>';
                        unset($_SESSION['error']);
                        unset($_SESSION['msj']);
                        }
                    ?>
    </div>
</body>

</html>