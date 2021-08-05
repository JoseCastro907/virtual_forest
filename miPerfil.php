<?Php
session_start();

if (!isset($_SESSION['user'])) {
	header('Location: index.php');
	exit;
}else{
    $user = $_SESSION['user'];
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MiPerfil</title>
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif|Hind+Guntur|Signika&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/estilos/estiloApp.css">
</head>
<body>

<?php
        include './inc/header.php'; ?>

    <section class="Contenedor_Central">
        <div class="Texto_superior">
            <h1 class="Texto_Superior_Titulo">Datos del Usuario</h1>
                        
        </div>
    </section>
        <div class="contenedor_datos_usuario">

            <div class="contenedor_datosPersonales">
                <div class="datos_usuario">

                    <span class="usuario_nombre">Nombre de Usuario:   </span>
                    <span>
                    <?= $user['nombre'] ?>
                    </span>

                </div>
                <div class="puntos_usuario">
                       <span>
                           <?= $user['correo'] ?>
                    </span>
                        <br>
                </div>
                <div class="puntos_user">
                    <span class="usuario_puntos">Puntos acumulados: </span>
                    <span>
                    <?= $user['puntos'] ?> 
                    </span>
                
                </div>

            </div>
        </div>
</body>
</html>