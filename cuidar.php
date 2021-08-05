<?php
$numero = $_GET['numeroMaceta'];
$num = $_GET['numCuidado'];

require "./database.php";

$datosPlanta=$database->select('semillero',['idPlanta','nombre'],['numeroMaceta'=>$numero]);

if($num == 1){
    $database->update('tb_semillero_cuidados', [
        "cuidado1" => 1
    ], ['idPlanta'=>$datosPlanta[0]['idPlanta']]);    
}elseif($num==2){
    $database->update('tb_semillero_cuidados', [
        "cuidado2" => 1
    ], ['idPlanta'=>$datosPlanta[0]['idPlanta']]);    
}elseif($num==3){
    $database->update('tb_semillero_cuidados', [
        "cuidado3" => 1
    ], ['idPlanta'=>$datosPlanta[0]['idPlanta']]);    
}elseif($num==4){
    $database->update('tb_semillero_cuidados', [
        "cuidado4" => 1
    ], ['idPlanta'=>$datosPlanta[0]['idPlanta']]);    
}elseif($num==5){
    $database->update('tb_semillero_cuidados', [
        "cuidado5" => 1
    ], ['idPlanta'=>$datosPlanta[0]['idPlanta']]);
}elseif($num==6){
    $database->update('tb_semillero_cuidados', [
        "cuidado6" => 1
    ], ['idPlanta'=>$datosPlanta[0]['idPlanta']]);
}elseif($num==7){
    $database->update('tb_semillero_cuidados', [
        "cuidado7" => 1
    ], ['idPlanta'=>$datosPlanta[0]['idPlanta']]);
}elseif($num==8){
    $database->update('tb_semillero_cuidados', [
        "cuidado8" => 1
    ], ['idPlanta'=>$datosPlanta[0]['idPlanta']]);
}elseif($num==9){
    $database->update('tb_semillero_cuidados', [
        "cuidado9" => 1
    ], ['idPlanta'=>$datosPlanta[0]['idPlanta']]);
}elseif($num==10){
    $database->update('tb_semillero_cuidados', [
        "cuidado10" => 1
    ], ['idPlanta'=>$datosPlanta[0]['idPlanta']]);
}elseif($num==11){
    $database->update('tb_semillero_cuidados', [
        "cuidado11" => 1
    ], ['idPlanta'=>$datosPlanta[0]['idPlanta']]);
}
header('Location: semillero.php');
?>