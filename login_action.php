<?php

session_start();

if(
    $_POST['nombre'] === '' ||
    $_POST['password'] ===''
){
    $_SESSION['error'] = true;
    $_SESSION['msj'] = 'Llene todos los campos';
    header('Location: registro_form.php');
    die;
}

require './database.php';

$nombre = $_POST['nombre'];
$password =$_POST['password'];


//select para tener el usuario (where => correo)
$existeUsuario = $database->select('usuario', ['correo', 'password', 'nombre', 'id','puntos'], [
	'nombre' => $nombre
]);

// Verificar que exista el usuario
if (count($existeUsuario) > 0) {
    $user = $existeUsuario[0];
    
	// Verificar que los pass sean los mismos
	$passwordsMatch = password_verify(base64_encode($password), $user['password']);

	if ($passwordsMatch) {
		$_SESSION['error'] = false;
		$_SESSION['msj'] = 'Inicio de sesión exitoso!';

		//Eliminamos la contraseña del array
		unset($user['password']);

		// Almacenamos en sesion el usuario logueado
		$_SESSION['user'] = $user;

		header('Location: miPerfil.php');
		die;
	} else {
		$_SESSION['error'] = true;
        $_SESSION['msj'] = 'Nombre o contraseña incorrectos';
		header('Location: index.php');
		die;
	}
} else {
	$_SESSION['error'] = true;
    $_SESSION['msj'] = 'Nombre de usuario incorrecto';
	header('Location: index.php');
	die;
}