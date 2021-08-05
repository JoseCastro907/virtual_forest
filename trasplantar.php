<?php

$numero = $_GET['numeroMaceta'];

require "./database.php";

$datosPlanta=$database->select('semillero',['idPlanta','nombre','idUsuario'],['numeroMaceta'=>$numero]);
$database->update('bosque', [
    "cantidad[+]" => 1
], ['nombre'=>$datosPlanta[0]['nombre']]);

$database->update('usuario', [
    "puntos[+]" => 100
], ['id'=>$datosPlanta[0]['idUsuario']]);  

$database->delete("tb_semillero_cuidados", [
        "idPlanta" => $datosPlanta[0]['idPlanta']
]);
$database->delete("semillero", [
    "numeroMaceta" => $numero
]);

header('Location: semillero.php');
?>