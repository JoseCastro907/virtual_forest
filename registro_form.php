
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro</title>
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif|Hind+Guntur|Signika&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/estilos/style.css">
</head>

<body>
    <header class="header_registro">
            <div class="contenedor_descripcion_registro">
                    <h1 class="descripcion_registro">Registro de nuevo usuario</h1>
                </div>
    </header>
    <div class="contenedor_formulario">
        <div class="contenedor_campos">

            <form class="registro__form" autocomplete="on" action="registro_action.php" method="POST" >
                <div class="campos_registro">
                    <div class="campos registro1">
                    <p class="detalle_registro">Nombre de Usuario</p>
                    <input class="form__input_registro" type="text" id="nombre" name="nombre"
                        placeholder="Nombre de usuario" required>
                    </div>
                    <div class="campos registro2">
                    <p class="detalle_registro">Correo electronico</p>
                    <input class="form__input_registro" type="email" id="correo" name="correo"
                        placeholder="Correo electronico" required>
                    </div>
                    <div class="campos registro3">
                        <p class="detalle_registro">Contraseña</p>
                    <input class="form__input_registro" type="password" id="password" name="password"
                        placeholder="Contraseña" required>
                    </div>
                    <div class="campos registro4">
                    <p class="detalle_registro">Confirmar contraseña</p>
                    <input class="form__input_registro" type="password" id="confirmpassword" name="confirmpassword"
                        placeholder="Confirmar Contraseña" required>
                    </div>
                </div>
                <div class="contenedor_boton">
                    <div class="container-btn">
                        <button class="btn login__btn" type="submit">Registrarse</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</body>

</html>