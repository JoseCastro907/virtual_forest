<?php

class planta{
    public $idPlanta;
    public $nombrePlanta;
    public $numeroMaceta;
    public $fechaSiembra;
    public $cuidados;

    function __construct($idPlanta, $nombrePlanta, $numeroMaceta, $fechaSiembra, $cuidados) {
     $this->idPlanta=$idPlanta;
     $this->nombrePlanta=$nombrePlanta;
     $this->numeroMaceta=$numeroMaceta;
     $this->fechaSiembra=$fechaSiembra;
     $this->cuidados=$cuidados;
    }
}

function generarPlantas(){
    require './database.php';
    
    $usuarioActual=$_SESSION['user'];
    //selecciono el el id en forma de array
    $datosUsuario= $database->select('usuario',['id'], [
        'nombre' => $usuarioActual['nombre']
    ]);
    //obtengo el id del usuario actual
    $idActual=$datosUsuario[0]['id'];
    
    $datosPlantas=$database->select('semillero',['idUsuario','idPlanta','nombre','numeroMaceta','fechaSiembra'],
    ['idUsuario'=>$idActual
    ]);
  
    $plantas=array(); //arreglo de objetos planta

    for($i=0;$i<count($datosPlantas);$i++){
       $idPlanta=$datosPlantas[$i]['idPlanta'];
       $nombrePlanta=$datosPlantas[$i]['nombre'];
       $numeroMaceta=$datosPlantas[$i]['numeroMaceta'];
       $fechaSiembra=$datosPlantas[$i]['fechaSiembra'];


       $cuidados=$database->select('tb_semillero_cuidados',['cuidado1','cuidado2','cuidado3','cuidado4',
       'cuidado5','cuidado6','cuidado7','cuidado8','cuidado9','cuidado10','cuidado11',],['idPlanta'=>$idPlanta]);

       $planta=new planta($idPlanta,$nombrePlanta,$numeroMaceta,$fechaSiembra,$cuidados[0]);// se crea el objeto con los parametro obtenidos de la BD
       $plantas[$i]=$planta; // se agrega el nuevo objeto planta al array
    }
    return $plantas;

}

function obtenerEspacios($plantas){
    $espaciosOcupados=array();
    for($i=0;$i<count($plantas);$i++){
        $espaciosOcupados[$i]=$plantas[$i]->numeroMaceta;//rellena los espacios con los numeros de macetas ocupados
    }
    return $espaciosOcupados;
}

function verificarEspacio($numeroCapa){
    $espaciosUsados=obtenerEspacios(generarPlantas());
   
    foreach($espaciosUsados as $espacio){
        
        if($numeroCapa==$espacio){
            return false;
            
        }
    }
    return true;
    
}

function imprimirImagen($numeroMaceta){
    $plantas=generarPlantas();
    $plantaActual;
    //obtengo el objeto que contiene el numero de maceta ingresado
    for($i=0;$i<count($plantas);$i++){
        if($plantas[$i]->numeroMaceta==$numeroMaceta){
            $plantaActual=$plantas[$i];
            break;
        }
    }
    $nombrePlanta=$plantaActual->nombrePlanta;
    $cuidados=$plantaActual->cuidados;
    $fechasiembraString=$plantaActual->fechaSiembra;
    $idPlantaRev=$plantaActual->idPlanta;
    $fechaSiembra=new DateTime($plantaActual->fechaSiembra); //convierto la fecha a dateTime
    $ruta;
    
    switch ($nombrePlanta) {
        case "caoba":
           $ruta='./assets/img/caoba';
            break;
        case "cortezaAmarilla":
            $ruta='./assets/img/cortezaAmarilla';
            break;
        case "guanacaste":
            $ruta='./assets/img/guanacaste';
            break;
        case "malinche":
            $ruta='./assets/img/malinche';
            break;
        case "pochote":
            $ruta='./assets/img/pochote';
            break;
    }

    if(!estaVivo($fechaSiembra, $cuidados)){
        echo "<a href='./limpiar.php?numeroMaceta=$numeroMaceta'>
        <button type=button id='limpiar' class='limpiar' src='./assets/img/limpiar.png' width='70px'></button>
        </a>";
        echo '<img src="./assets/img/7.png" alt="muerte del arbol" width="240px">';

    }else{

        $fechaHoy = new DateTime("now", new DateTimeZone('America/Costa_Rica'));
        $diferenciaDias = $fechaHoy->diff($fechaSiembra)->days;

        if(($diferenciaDias>=0)&&($diferenciaDias<7)){
            if(($diferenciaDias==1)&&(array_values($cuidados)[0]==0)){
                echo "<a href='./cuidar.php?numeroMaceta=$numeroMaceta&numCuidado=1'>
                <button type=button  class='botonAbonoAgua1'></button>
                </a>";
            }if(($diferenciaDias==3)&&(array_values($cuidados)[1]==0)){
                echo "<a href='./cuidar.php?numeroMaceta=$numeroMaceta&numCuidado=2'>
                <button type=button  class='botonAbonoAgua2'></button>
                </a>";
            }if(($diferenciaDias==5)&&(array_values($cuidados)[2]==0)){
                echo "<a href='./cuidar.php?numeroMaceta=$numeroMaceta&numCuidado=3'>
                <button type=button  class='botonAbonoAgua3'></button>
                </a>";
            }
            echo "<img src='$ruta/2.png' alt='muerte del arbol' width='240px'>";
        }elseif(($diferenciaDias>=7)&&($diferenciaDias<13)){
            if(($diferenciaDias==7)&&(array_values($cuidados)[3]==0)){
                echo "<a href='./cuidar.php?numeroMaceta=$numeroMaceta&numCuidado=4'>
                <button type=button  class='botonAbonoAgua4'></button>
                </a>";
            }if(($diferenciaDias==9)&&(array_values($cuidados)[4]==0)){
                echo "<a href='./cuidar.php?numeroMaceta=$numeroMaceta&numCuidado=5'>
                <button type=button  class='botonAbonoAgua5'></button>
                </a>";
            }if(($diferenciaDias==11)&&(array_values($cuidados)[5]==0)){
                echo "<a href='./cuidar.php?numeroMaceta=$numeroMaceta&numCuidado=6'>
                <button type=button  class='botonAbonoAgua6'></button>
                </a>";
            }
            echo "<img src='$ruta/3.png' alt='muerte del arbol' width='240px'>";
        }elseif(($diferenciaDias>=13)&&($diferenciaDias<17)){
            if(($diferenciaDias==14)&&(array_values($cuidados)[6]==0)){
                echo "<a href='./cuidar.php?numeroMaceta=$numeroMaceta&numCuidado=7'>
                <button type=button  class='botonAbonoAgua7'></button>
                </a>";
            }if(($diferenciaDias==16)&&(array_values($cuidados)[7]==0)){
                echo "<a href='./cuidar.php?numeroMaceta=$numeroMaceta&numCuidado=8'>
                <button type=button  class='botonAbonoAgua8'></button>
                </a>";
            }
            echo "<img src='$ruta/4.png' alt='muerte del arbol' width='240px'>";
        }elseif(($diferenciaDias>=17)&&($diferenciaDias<21)){
            if(($diferenciaDias==18)&&(array_values($cuidados)[8]==0)){
                echo "<a href='./cuidar.php?numeroMaceta=$numeroMaceta&numCuidado=9'>
                <button type=button  class='botonAbonoAgua9'></button>
                </a>";
            }if(($diferenciaDias==20)&&(array_values($cuidados)[9]==0)){
                echo "<a href='./cuidar.php?numeroMaceta=$numeroMaceta&numCuidado=10'>
                <button type=button  class='botonAbonoAgua10'></button>
                </a>";
            }
            echo "<img src='$ruta/5.png' alt='muerte del arbol' width='240px'>";
        }else{
            if($diferenciaDias>=23){
                echo "<a href='./trasplantar.php?numeroMaceta=$numeroMaceta'>
                 <button type=button class='trasplantar'></button>
                 </a>";
                echo "<img src='$ruta/6_1.png' alt='muerte del arbol' width='240px'>";
            }else{
            if(($diferenciaDias==21)&&(array_values($cuidados)[10]==0)){
                echo "<a href='./cuidar.php?numeroMaceta=$numeroMaceta&numCuidado=11'>
                <button type=button class='botonAbonoAgua11'></button>
                </a>";
               
            } 
            echo "<img src='$ruta/6.png' alt='muerte del arbol' width='240px'>";
            }
        }

        /*
        $etapa=obtenerEtapa($fechaSiembra); 
        if($etapa>=0&&$etapa<3){ // 3 cuidos
            echo "<button type=button id='botonAbonoAgua' class='botonAbonoAgua'></button>";
            echo "<img src='$ruta/2.png' alt='muerte del arbol' width='240px'>";
            
        }elseif($etapa>=3&&$etapa<6){// 3 cuidos
            echo "<img src='$ruta/3.png' alt='muerte del arbol' width='240px'>";
        }elseif($etapa==6||$etapa==7){//2 cuidos
            echo "<img src='$ruta/4.png' alt='muerte del arbol' width='240px'>";
        }elseif($etapa==8||$etapa==9){ //2 cuidos
            echo "<img src='$ruta/5.png' alt='muerte del arbol' width='240px'>";
        }elseif($etapa==10){ // 1 cuido
            echo "<img src='$ruta/6.png' alt='muerte del arbol' width='240px'>";
        }else{  //final de etapa

            echo "<button type=button id='trasplantar' class='trasplantar' ></button>";
            echo "<img src='$ruta/6_1.png' alt='muerte del arbol' width='240px'>";

        }
        */
    }
}

function obtenerDiferencia($fechaSiembra){
    $fechaActual = new DateTime("now", new DateTimeZone('America/Costa_Rica'));
    return $diferencia = $fechaActual->diff($fechaSiembra)->days;
}

function estaVivo($fechaSiembra, $cuidados){
    

    $fechaAnterior=(obtenerEtapa($fechaSiembra)-1); //se le resta 1 fecha para obtener el "cuidado" anterior
    //si la funcion me retorn un valor superior a 12 quiere decir que el arbol ha superado con exito el proceso por lo cual esta vivo
    if(($fechaAnterior+1)>11){
        
        return true;
    }
    if( $fechaAnterior>=0){
        return array_values($cuidados)[$fechaAnterior]; // si se cuido la fecha pasada el arbol la funcion retorna true, sino false
        // para imprimir el valor
    }else{
        return true;
        //return false;
    }

}

function obtenerEtapa($fechaSiembra){
    $fechaActual = new DateTime("now", new DateTimeZone('America/Costa_Rica'));
    $diferencia = $fechaActual->diff($fechaSiembra)->days; //obtenemos la diferencia de la fecha actual con la fecha de siembra
//dias actuales 
    if($diferencia%2==0){

        return $diferencia=($diferencia/2); //si el numero es par lo dividimos para 
    }else{

        return $diferencia=(($diferencia-1)/2); //si el numero es impar le restamos 1 y lo dividimos entre 2
    }
    // esto es necesario para obtener el valor del array $cuidados en la pocision actual
}