<?Php
session_start();

if (!isset($_SESSION['user'])) {
	header('Location: index.php');
	exit;
}

//$maceta = $_POST['maceta'];
$semilla = $_GET['semilla'];
$numMaceta = $_GET['maceta'];



if($semilla == 1){
    $nombre = 'guanacaste';
}elseif ($semilla == 2){
    $nombre = 'malinche';
}elseif ($semilla == 3){
    $nombre = 'caoba';
}elseif ($semilla == 4){
    $nombre = 'pochote';
}elseif ($semilla == 5){
    $nombre = 'cortezaAmarilla';
}

$usuario=$_SESSION['user'];
echo $usuario['nombre'];

require "./database.php";

$database->insert('semillero', [
    'idUsuario'=> $_SESSION['user']['id'],
	'nombre' => $nombre,
	'numeroMaceta' => $numMaceta,
	'fechaSiembra' => $database->raw('curdate()')
]);

$datosPlanta=$database->select('semillero',['idPlanta'],
['numeroMaceta'=>$numMaceta]);// selecciono el id de la planta recien creada tomando como valor el numero de maceta

$idPlanta=$datosPlanta[0]['idPlanta'];
echo $idPlanta;

$intento=$database->insert('tb_semillero_cuidados',[
    'idPlanta'=>$idPlanta,
    'cuidado1'=>false,
    'cuidado2'=>false,
    'cuidado3'=>false,
    'cuidado4'=>false,
    'cuidado5'=>false,
    'cuidado6'=>false,
    'cuidado7'=>false,
    'cuidado8'=>false,
    'cuidado9'=>false,
    'cuidado10'=>false,
    'cuidado11'=>false
 ]);



header('Location: semillero.php');

