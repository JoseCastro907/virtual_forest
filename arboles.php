<?php
session_start();

if (!isset($_SESSION['user'])) {
	header('Location: index.php');
	exit;
}
$numMaceta = $_GET['maceta'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Arboles</title>
    <link rel="stylesheet" href="./assets/estilos/estiloApp.css">
</head>
<body>
     
    <div class="Contenedor_Arboles">
        <div class="Contenedor_Oeste">
        <div class="Contenedor_Semillas">

            <div class="Semillas Semilla1">
            <a href="./semilla_post.php?semilla=1&maceta=<?php echo $numMaceta?>">
                    <img src="./assets/img/guanacaste/SemillasGuanacaste.png" alt="" width="200px">
                </a>
            </div>
            
            <div class="Semillas Semilla2">
            <a href="./semilla_post.php?semilla=2&maceta=<?php echo $numMaceta?>">
                    <img src="./assets/img/malinche/SemillasMalinche.png" alt="" width="200px">
                    </a>
            </div>
           
            <div class="Semillas Semilla3">
            <a href="./semilla_post.php?semilla=3&maceta=<?php echo $numMaceta?>">
                    <img src="./assets/img/caoba/SemillasCaoba.png" alt="" width="200px">
                    </a>
            </div>
            
            <div class="Semillas Semilla4">
            <a href="./semilla_post.php?semilla=4&maceta=<?php echo $numMaceta?>">
                    <img src="./assets/img/pochote/SemillasPochote.png" alt="" width="200px">
                    </a>
            </div>
            <div class="Semillas Semilla5">
            <a href="./semilla_post.php?semilla=5&maceta=<?php echo $numMaceta?>">
                <img src="./assets/img/cortezaAmarilla/SemillasCortezaAmarilla.png" alt="" width="200px">
                </a>
            </div>
            
        </div>
        </div>
        <div id="Contenedor_Descripcion">
            
        </div>
</div> 
<script src="./assets/js/arbol.js"></script>
<script src="./assets/js/aplication.js"></script>
</body>
</html> 