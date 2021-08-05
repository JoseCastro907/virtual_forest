<?php
    session_start();
if(
    $_POST['correo'] === '' ||
    $_POST['codigo'] === '' ||
    $_POST['pass'] === '' ||
    $_POST['passConfirm'] === ''
    ){
        $_SESSION['error'] = true;
        $_SESSION['msj'] = 'Llene todos los campos';
        header('Location: new_password.php');
        die;
}

require './database.php';

$correo = $_POST['correo'];
$codigo = $_POST['codigo'];
$pass = $_POST['pass'];
$passConfirm = $_POST['passConfirm'];

$existeUsuario = $database->select('usuario', ['id', 'nombre', 'correo','puntos','password','codigo'], [
	'correo' => $correo
]);

// Verificar que exista el usuario
if (count($existeUsuario) > 0) {
    $user = $existeUsuario[0];

    if ($pass !== $passConfirm) {
	    $_SESSION['error'] = true;
	    $_SESSION['msj'] = 'Las contraseñas no coinciden';
	    header('Location: new_password.php');
        die;
    }else{

        if($codigo !== $user['codigo'])
        {
            $_SESSION['error'] = true;
	        $_SESSION['msj'] = 'Las códigos no coinciden';
	        header('Location: new_password.php');
            die;
        }else{
            $passEncriptada = password_hash(base64_encode($pass), PASSWORD_BCRYPT);

    // Se hace el insert(update) del usuario
        $nuevaPass = $database->update('usuario', [
	        'password' => $passEncriptada,
	        'codigo' => ""
        ],
        [ 'correo' => $correo ]);

            $_SESSION['error'] = false;
            $_SESSION['msj'] = 'Se cambió la constraseña correctamente';
	        header('Location: redireccion.php');
	        die;
        }
        

     }


    }//fin del else confirmarpass
else {
	$_SESSION['error'] = true;
    $_SESSION['msj'] = 'El correo ingresado no se encuentra registrado';
	header('Location: new_password.php');
	die;
}

?>