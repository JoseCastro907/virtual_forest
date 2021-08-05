<?Php
session_start();

if (!isset($_SESSION['user'])) {
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
    <title>Bosque</title>
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif|Hind+Guntur|Signika&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/estilos/estiloApp.css">
</head>

<body>
<?php
        include './inc/header.php'; ?>

    <section class="Contenedor_Central">
        <div class="Texto_superior">
            <h1 class="Texto_Superior_Titulo">Bosque de Virtual Forest</h1>

            <p class="Texto_Superior_Descripcion">¿Qué desea plantar hoy?</p>
        </div>
        <div class="Semillero">

        </div>
        <div class="contenedor_bosque">
            <div class="contenedor_bosques">
                <div class="bosque1">
                    <div class="arbol"></div>
                    <div class="arbol"></div>
                    <div class="arbol"></div>
                    <div class="arbol"></div>
                    <div class="arbol"></div>
                    <div class="arbol"></div>
                    <div class="arbol"></div>
                    <div class="arbol"></div>
                    <div class="arbol"></div>
                    <div class="arbol"></div>
                </div>
                <div class="bosque2">
                    <div class="arbol"></div>
                    <div class="arbol"></div>
                    <div class="arbol"></div>
                    <div class="arbol"></div>
                    <div class="arbol"></div>
                    <div class="arbol"></div>
                    <div class="arbol"></div>
                    <div class="arbol"></div>
                    <div class="arbol"></div>
                    <div class="arbol"></div>
                </div>
                <div class="bosque3">
                    <div class="arbol"></div>
                    <div class="arbol"></div>
                    <div class="arbol"></div>
                    <div class="arbol"></div>
                    <div class="arbol"></div>
                    <div class="arbol"></div>
                    <div class="arbol"></div>
                    <div class="arbol"></div>
                    <div class="arbol"></div>
                    <div class="arbol"></div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <script src="./js/aplication.js" type="text/javascript"></script>
</body>

</html>