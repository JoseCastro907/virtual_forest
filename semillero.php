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
    <title>Semillero</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif|Hind+Guntur|Signika&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/estilos/estiloApp.css">
</head>
<body>
        <?php
        include './inc/header.php';
        require './registro_semillas.php';
        ?>

    <section class="Contenedor_Central">
        <div class="Texto_superior">
            <h1 class="Texto_Superior_Titulo">Bienvenido al semillero de Virtual Forest</h1>
            
            <p class="Texto_Superior_Descripcion">presiona un espacio para plantar un árbol</p>
        </div>
        <div class="Semillero">
            <div class="Caja_Central">
                <div class="contenedor_fila1">
                    <!-- maceta1---> 
                    <div class="numMaceta">
                    <?php
                        
                        if(verificarEspacio(1)){
                    ?>
                    <a  href="./arboles.php?maceta=1"><div class="Macetas Maceta_1"></div></a>
                    <?php
                        }else{
                            imprimirImagen(1);
                            ?>
                            <script>$(document).ready(function(){/*1*/
                                    $(".botonAbonoAgua1").on( "click", function() {
                                        $('.botonAbonoAgua1').hide(); });});</script>
                            <script>$(document).ready(function(){/*2*/
                                    $(".botonAbonoAgua2").on( "click", function() {
                                        $('.botonAbonoAgua2').hide(); });});</script>
                            <script>$(document).ready(function(){/*3*/
                                    $(".botonAbonoAgua3").on( "click", function() {
                                        $('.botonAbonoAgua3').hide(); });});</script>
                            <script>$(document).ready(function(){/*4*/
                                    $(".botonAbonoAgua4").on( "click", function() {
                                        $('.botonAbonoAgua4').hide(); });});</script>
                            <script>$(document).ready(function(){/*5*/
                                    $(".botonAbonoAgua5").on( "click", function() {
                                        $('.botonAbonoAgua5').hide(); });});</script>
                            <script>$(document).ready(function(){/*6*/
                                    $(".botonAbonoAgua6").on( "click", function() {
                                        $('.botonAbonoAgua6').hide(); });});</script>
                            <script>$(document).ready(function(){/*7*/
                                    $(".botonAbonoAgua7").on( "click", function() {
                                        $('.botonAbonoAgua7').hide(); });});</script>
                            <script>$(document).ready(function(){/*8*/
                                    $(".botonAbonoAgua8").on( "click", function() {
                                        $('.botonAbonoAgua8').hide(); });});</script>
                            <script>$(document).ready(function(){/*9*/
                                    $(".botonAbonoAgua9").on( "click", function() {
                                        $('.botonAbonoAgua9').hide(); });});</script>
                            <script>$(document).ready(function(){/*10*/
                                    $(".botonAbonoAgua10").on( "click", function() {
                                        $('.botonAbonoAgua10').hide(); });});</script>
                            <script>$(document).ready(function(){/*11*/
                                    $(".botonAbonoAgua11").on( "click", function() {
                                        $('.botonAbonoAgua11').hide(); });});</script>
                            <script>$(document).ready(function(){/*limpiar*/
                                    $(".limpiar").on( "click", function() {
                                        $('.limpiar').hide(); });});</script>
                            <script>$(document).ready(function(){/*trasplantar*/
                                    $(".trasplantar").on( "click", function() {
                                        $('.trasplantar').hide(); });});</script>
                            <?php
                        }
                    ?>
                    </div>
                    <!-- maceta2---> 
                    <div class="numMaceta">
                    <?php
                        if(verificarEspacio(2)){
                    ?>
                    <a  href="./arboles.php?maceta=2"><div class="Macetas Maceta_2"></div></a>
                    <?php
                        }else{
                            imprimirImagen(2);

                            ?>
                            <script>
                                $(document).ready(function(){
                                    $("#botonAbonoAgua1").on( "click", function() {
                                        $('.botonAbonoAgua1').hide(); //muestro mediante clase
                                    });
                                });
                            </script>
                            <?php
                        }  
                    ?>
                    </div> 
                    <!-- maceta3---> 
                    <div class="numMaceta">
                    <?php
                        if(verificarEspacio(3)){
                    ?>
                    <a  href="./arboles.php?maceta=3"><div class="Macetas Maceta_3"></div></a>
                    <?php
                        }else{
                            imprimirImagen(3);
                            ?>
                            <script>
                                $(document).ready(function(){
                                    $("#botonAbonoAgua1").on( "click", function() {
                                        $('.botonAbonoAgua1').hide(); //muestro mediante clase
                                    });
                                });
                            </script>
                            <?php
                        }  
                    ?>
                    </div>
                    <!-- maceta4---> 
                    <div class="numMaceta">
                    <?php
                        if(verificarEspacio(4)){
                    ?>
                    <a  href="./arboles.php?maceta=4"><div class="Macetas Maceta_4"></div></a>
                    <?php
                        }else{
                            imprimirImagen(4);
                            ?>
                            <script>
                                $(document).ready(function(){
                                    $("#botonAbonoAgua1").on( "click", function() {
                                        $('.botonAbonoAgua1').hide(); //muestro mediante clase
                                    });
                                });
                            </script>
                            <?php
                        }  
                    ?>
                    </div>
                    <!-- maceta5---> 
                    <div class="numMaceta">
                    <?php
                        if(verificarEspacio(5)){
                    ?>
                    <a  href="./arboles.php?maceta=5"><div class="Macetas Maceta_5"></div></a>
                    <?php
                        }else{
                            imprimirImagen(5);
                            ?>
                            <script>
                                $(document).ready(function(){
                                    $("#botonAbonoAgua1").on( "click", function() {
                                        $('.botonAbonoAgua1').hide(); //muestro mediante clase
                                    });
                                });
                            </script>
                            <?php
                        }  
                    ?>
                    </div>  
                    
                </div>
                <div class="contenedor_fila2">
                    <!-- maceta6---> 
                    <div class="numMaceta">
                    <?php
                        if(verificarEspacio(6)){
                    ?>
                    <a  href="./arboles.php?maceta=6"><div class="Macetas Maceta_6"></div></a>
                    <?php
                        }else{
                            imprimirImagen(6);
                            ?>
                            <script>
                                $(document).ready(function(){
                                    $("#limpiar").on( "click", function() {
                                        $('.limpiar').hide(); //muestro mediante clase
                                    });
                                });
                            </script>
                            <?php
                        }  
                    ?>
                    </div>
                    <!-- maceta7---> 
                    <div class="numMaceta">
                    <?php
                        if(verificarEspacio(7)){
                    ?>
                    <a  href="./arboles.php?maceta=7"><div class="Macetas Maceta_7"></div></a>
                    <?php
                        }else{
                            imprimirImagen(7);
                            ?>
                            <script>
                                $(document).ready(function(){
                                    $("#botonAbonoAgua1").on( "click", function() {
                                        $('.botonAbonoAgua1').hide(); //muestro mediante clase
                                    });
                                });
                            </script>
                            <?php
                        }  
                    ?>
                    </div>
                    <!-- maceta8---> 
                    <div class="numMaceta">
                    <?php
                        if(verificarEspacio(8)){
                    ?>
                    <a  href="./arboles.php?maceta=8"><div class="Macetas Maceta_8"></div></a>
                    <?php
                        }else{
                            imprimirImagen(8);
                            ?>
                            <script>
                                $(document).ready(function(){
                                    $("#botonAbonoAgua1").on( "click", function() {
                                        $('.botonAbonoAgua1').hide(); //muestro mediante clase
                                    });
                                });
                            </script>
                            <?php
                        }  
                    ?>
                    </div>
                    <!-- maceta9---> 
                    <div class="numMaceta">
                    <?php
                        if(verificarEspacio(9)){
                    ?>
                    <a  href="./arboles.php?maceta=9"><div class="Macetas Maceta_9"></div></a>
                    <?php
                        }else{
                            imprimirImagen(9);
                            ?>
                            <script>
                                $(document).ready(function(){
                                    $("#botonAbonoAgua1").on( "click", function() {
                                        $('.botonAbonoAgua1').hide(); //muestro mediante clase
                                    });
                                });
                            </script>
                            <?php
                        }  
                    ?>
                    </div>
                    <!-- maceta10---> 
                    <div class="numMaceta">
                    <?php
                        if(verificarEspacio(10)){
                    ?>
                    <a  href="./arboles.php?maceta=10"><div class="Macetas Maceta_10"></div></a>
                    <?php
                        }else{
                            imprimirImagen(10);
                            ?>
                            <script>
                                $(document).ready(function(){
                                    $("#botonAbonoAgua7").on( "click", function() {
                                        $('.botonAbonoAgua7').hide(); //muestro mediante clase
                                    });
                                });
                            </script>
                            <?php
                        }  
                    ?>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <script src="./assets/js/arbol.js"></script>
    <script src="./assets/js/aplication.js" type="text/javascript"></script>
</body>
</html> 