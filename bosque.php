<?Php
session_start();

if (!isset($_SESSION['user'])) {
	header('Location: index.php');
	exit;
}
require './database.php';

$arbolesJovenes=$database->select("bosque","cantidad", [
	"ORDER" => [
		"id" => "ASC" 
	]
]);
            
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

                <div class="contenedorArbolesJovenes">

                <?php

                if(($arbolesJovenes[0] == 0) && ($arbolesJovenes[1] == 0) && ($arbolesJovenes[2] == 0) && ($arbolesJovenes[3] == 0) && ($arbolesJovenes[4] == 0) ){
                    echo' <div class="texto_bosqueVacio">Por el momento no se encuentran árboles sembrados en el bosque</div>';
                }
                for($i=0;$i<$arbolesJovenes[0];$i++){ 
                   echo' <img class="arbol" src="./assets/img/caoba/caobaPlantado.png"/> ';
                }
                for($i=0;$i<$arbolesJovenes[1];$i++){ 
                    echo' <img class="arbol" src="./assets/img/cortezaAmarilla/cortezaPlantado.png"/> ';
                }
                for($i=0;$i<$arbolesJovenes[2];$i++){ 
                    echo' <img class="arbol" src="./assets/img/guanacaste/guanacastePlantado.png"/> ';
                }
                for($i=0;$i<$arbolesJovenes[3];$i++){ 
                    echo' <img class="arbol" src="./assets/img/malinche/malinchePlantado.png"/> ';
                }
                for($i=0;$i<$arbolesJovenes[4];$i++){ 
                    echo' <img class="arbol" src="./assets/img/pochote/pochotePlantado.png"/> ';
                }
                ?>
            </div>
        </div>
        </div>
    </section>
<!--    <script src="./assets/js/aplication.js" type="text/javascript"></script>-->
</body>

</html>