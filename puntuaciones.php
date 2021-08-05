<?Php
session_start();

if (!isset($_SESSION['user'])) {
	header('Location: index.php');
	exit;
}else{
    $user = $_SESSION['user'];
}


require './database.php';


$usuarios=$database->select("usuario","nombre", [
	"ORDER" => [
		"puntos" => "DESC" 
	]
]);
$puntajes=$database->select("usuario","puntos", [
	"ORDER" => [
		"puntos" => "DESC" 
	]
]);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Puntuaciones</title>
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif|Hind+Guntur|Signika&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/estilos/estiloApp.css">
</head>
 
<body>
        
        <?php
        include './inc/header.php'; ?>
        
    <section class="Contenedor_Central">
        <div class="Texto_superior">
            <h1 class="Texto_Superior_Titulo">Lista de los 10 perfiles con las puntuaciones más altas de Virtual Forest</h1>            
        </div>
    </section>

    <div class="contenedor_puntuaciones">

        <div class="contenedor_tabla">


            <table class="tabla" WIDTH="500">
                <caption class="caption">Tabla de Puntuaciones</caption>
         
                <tr WIDTH="500">
                    <th>Nombre</th>
                    <th>Puntos</th>
                </tr>

                <tr>
                <?php
            if(count($usuarios) > 0):
                ?>
                <td NOWRAP><?= $usuarios[0] ?></td>
                    <td><?= $puntajes[0] ?> </td>
                    <?php endif; ?>
                </tr>

                <tr>
                <?php
            if(count($usuarios) > 1):
                ?>
                <td NOWRAP><?= $usuarios[1] ?></td>
                    <td><?= $puntajes[1] ?></td>
                    <?php endif; ?>
                </tr>

                <tr>
                <?php
            if(count($usuarios) > 2):
                ?>
                <td NOWRAP><?= $usuarios[2] ?></td>
                    <td><?= $puntajes[2] ?></td>
                    <?php endif; ?>
                </tr>

                <tr>
                <?php
            if(count($usuarios) > 3):
                ?>
                <td NOWRAP><?= $usuarios[3] ?></td>
                    <td><?= $puntajes[3] ?></td>
                    <?php endif; ?>
                </tr>
            
                <tr>
                <?php
            if(count($usuarios) > 4):
                ?>
                <td NOWRAP><?= $usuarios[4] ?></td>
                    <td><?= $puntajes[4] ?></td>
                    <?php endif; ?>
                </tr>

                <tr>
                <?php
            if(count($usuarios) > 5):
                ?>
                <td NOWRAP><?= $usuarios[5] ?></td>
                    <td><?= $puntajes[5] ?></td>
                    <?php endif; ?>
                </tr>

                <tr>
                <?php
            if(count($usuarios) > 6):
                ?>
                <td NOWRAP><?= $usuarios[6] ?></td>
                    <td><?= $puntajes[6] ?></td>
                    <?php endif; ?>
                </tr>

                <tr>
                <?php
            if(count($usuarios) > 7):
                ?>
                <td NOWRAP><?= $usuarios[7] ?></td>
                    <td><?= $puntajes[7] ?></td>
                    <?php endif; ?>
                </tr>

                <tr>
                <?php
            if(count($usuarios) > 8):
                ?>
                <td NOWRAP><?= $usuarios[8] ?></td>
                    <td><?= $puntajes[8] ?></td>
                    <?php endif; ?>
                </tr>

                <tr>
                <?php
            if(count($usuarios) > 9):
                ?>
                <td NOWRAP><?= $usuarios[9] ?></td>
                    <td><?= $puntajes[9] ?></td>
                    <?php endif; ?>
                </tr>
            </table>

        </div>
    </div>

</body>
</html>