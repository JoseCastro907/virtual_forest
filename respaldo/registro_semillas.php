<?php
//session_start();
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



/*
function insertar(){
    
    require './database.php';
    

  
   $usuarioActual=$_SESSION['user'];
    
    $nuevaPlanta = $database->insert('semillero', [
        'idUsuario' => 15,
        'nombre' => "guanacaste",
        'numeroMaceta' => 4,
        'fechaSiembra' => $database->raw('curdate()')//$database->raw('NOW()') //esta es la forma de guardar la fecha actual
        //	idUsuario 	idPlanta 	nombre 	numeroMaceta 	fechaSiembra 
    ]);
    $datosUsuario= $database->select('usuario',['id'], [
        'nombre' => $usuarioActual['nombre']
    ]);
    if(count($datosUsuario)>0){
        echo "id: ".$datosUsuario[0]['id'];
    }
    $idActual=$datosUsuario[0]['id'];
    $datosPlanta=$database->select('semillero',['idUsuario','nombre','numeroMaceta','fechaSiembra'],
    ['idUsuario'=>$idActual
    ]);
    $fechaP=$datosPlanta[2]['fechaSiembra'];
    $diaAntiguio=new DateTime($fechaP);
    $fechaActual=new DateTime('now');
    echo '</br>'.($fechaActual->format('d')-($diaAntiguio->format('d')));//$fechaActual->diff($diaAntiguio);
    

}
*/






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


    //prueba de los objetos
    /*for($i=0;$i<count($plantas);$i++){
                                        
        echo '</br> id: '.$plantas[$i]->idPlanta.' nombre: '.$plantas[$i]->nombrePlanta.' numero de maceta: '.$plantas[$i]->numeroMaceta.' Fecha: '.$plantas[$i]->fechaSiembra.' cuidados: ';

        $cuidadosPlantaActual=$plantas[$i]->cuidados;
        foreach ($cuidadosPlantaActual as $cuidados) {
            echo $cuidados.' ';
        }

        

    }*/
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
        echo '<img src="./assets/img/7.png" alt="muerte del arbol" width="250px">';
    }else{

        $etapa=obtenerEtapa($fechaSiembra);

        if($etapa>=0&&$etapa<3){ // 3 cuidos
            echo "<img src='$ruta/2.png' alt='muerte del arbol' width='250px'>";
        }elseif($etapa>=3&&$etapa<6){// 3 cuidos
            echo "<img src='$ruta/3.png' alt='muerte del arbol' width='250px'>";
        }elseif($etapa==6||$etapa==7){//2 cuidos
            echo "<img src='$ruta/4.png' alt='muerte del arbol' width='250px'>";
        }elseif($etapa==8||$etapa==9){ //2 cuidos
            echo "<img src='$ruta/5.png' alt='muerte del arbol' width='250px'>";
        }elseif($etapa==10){ // 1 cuido
            echo "<img src='$ruta/6.png' alt='muerte del arbol' width='250px'>";
        }else{  //final de etapa
            echo "<img src='$ruta/6_1.png' alt='muerte del arbol' width='250px'>";
        }
        
    }


}


function estaVivo($fechaSiembra, $cuidados){
    

    $fechaAnterior=(obtenerEtapa($fechaSiembra)-1); //se le resta 1 fecha para obtener el "cuidado" anterior

    //si la funcion me retorn un valor superior a 12 quiere decir que el arbol ha superado con exito el proceso por lo cual esta vivo
    if(($fechaAnterior+1)>12){
        
        return true;
    }

    if( $fechaAnterior>=0){
        return array_values($cuidados)[$fechaAnterior]; // si se cuido la fecha pasada el arbol la funcion retorna true, sino false
    }else{
        return true;
    }

}

function obtenerEtapa($fechaSiembra){
    $fechaActual = new DateTime("now", new DateTimeZone('America/Costa_Rica'));
    
    
    $diferencia = $fechaActual->diff($fechaSiembra)->days; //obtenemos la diferencia de la fecha actual con la fecha de siembra

    if($diferencia%2==0){
        return $diferencia=($diferencia/2); //si el numero es par lo dividimos para 
    }else{
        return $diferencia=(($diferencia-1)/2); //si el numero es impar le restamos 1 y lo dividimos entre 2
    }
    // esto es necesario para obtener el valor del array $cuidados en la pocision actual
}
