<?php

$numero = $_GET['numeroMaceta'];

require "./database.php";

$datosPlanta=$database->select('semillero',['idPlanta','nombre','idUsuario'],['numeroMaceta'=>$numero]);

$database->delete("tb_semillero_cuidados", [
        "idPlanta" => $datosPlanta[0]['idPlanta']
]);
$database->delete("semillero", [
    "numeroMaceta" => $numero
]);

header('Location: semillero.php');
?>