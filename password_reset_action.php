<?php
session_start();
if(
    $_POST['correo'] === ''
){
    $_SESSION['error'] = true;
    $_SESSION['msj'] = 'Ingrese un correo';
    header('Location: password_reset.php');
    die;
}

require './database.php';

$correo = $_POST['correo'];


$existeCorreo = $database->select('usuario', ['correo','id','codigo'], [
	'correo' => $correo
]);

if( count($existeCorreo) > 0){
    $_SESSION['error'] = false;

    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    function generate_code($permitted_chars, $strength = 6) {
        $input_length = strlen($permitted_chars);
        $random_string = '';
        for($i = 0; $i < $strength; $i++) {
            $random_character = $permitted_chars[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }
        return $random_string;
    }
    $code_random = generate_code($permitted_chars, 6);


    $mensaje="Código generado para el cambio de contraseña ".$code_random;
    $asunto="cambio de contraseña";

    $headers  = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

    //dirección del remitente
    $headers .= "From: <joseacr907>\r\n";
  
 

$exito=mail($correo,$asunto,$mensaje,$headers);

if($exito){
    $_SESSION['error'] = false;
    $_SESSION['msj'] = 'Se envió con exito';
    $agregarCodigo = $database->update('usuario', [
        'codigo' => $code_random
    ],
    ['correo' => $correo]);
   header('Location: new_password.php');
   
}else {

    $_SESSION['error'] = true;
    $_SESSION['msj'] = 'Falló el envio';
    header('Location: password_reset.php');
}
die;
}else{
    $_SESSION['error'] = true;
    $_SESSION['msj'] = 'El correo no se encuentra registrado';
    header('Location: password_reset.php');
    die;
}

?>