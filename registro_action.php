<?php

session_start();

if(
	$_POST['nombre'] === '' ||
	$_POST['correo'] === '' ||
	$_POST['password'] === '' ||
	$_POST['confirmpassword'] === ''
){
$_SESSION['error'] = true;
$_SESSION['msj'] = 'LLene todos los campos';
header('Location: registro_form.php');
die;
}

require './database.php';

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$password =	$_POST['password'];
$confirmpassword =	$_POST['confirmpassword'];
$puntos=0;

$existeCorreo = $database->select('usuario', ['correo'], [
	'correo' => $correo
]);

if( count($existeCorreo) > 0){
	$_SESSION['error'] = true;
	$_SESSION['msj'] = 'Este correo ya existe';
	header('Location: registro_form.php');
	die;
}

if ($password !== $confirmpassword) {
	$_SESSION['error'] = true;
	$_SESSION['msj'] = 'Las contraseñas no coinciden';
	header('Location: registro_form.php');
	die;
}

$passEncriptada = password_hash(base64_encode($password), PASSWORD_BCRYPT);

// Se hace el insert(registro) del usuario
$newUser = $database->insert('usuario', [
	'nombre' => $nombre,
	'correo' => $correo,
	'password' => $passEncriptada,
	'puntos' => $puntos
]);

// Se verifica que se hizo el insert(registro) correctamente
if ($newUser->rowCount() > 0) {
	$_SESSION['error'] = false;
	$_SESSION['msj'] = 'Registro exitoso!';

/*	$user = $database->select('usuario', ['email', 'nombre', 'id'], [
		'email' => $email
	]);
	$_SESSION['user'] = $user;
*/
	header('Location: redireccion.php');
	die;
} else {
	$_SESSION['error'] = true;
	$_SESSION['msj'] = 'Falló al registrar un nuevo usuario';
	header('Location: registro_form.php');
	die;
}
