<?php

public $num;

require './database.php';
function campo($num){

$campoMaceta=$database->select('semillero',['idPlanta','nombre','numeroMaceta','fechaSiembra'],
    ['numeroMaceta'=>$numero
    ]);


    $cuidoMaceta=$database->select('tb_semillero_cuidados',['cuidado1','cuidado2','cuidado3','cuidado4',
       'cuidado5','cuidado6','cuidado7','cuidado8','cuidado9','cuidado10','cuidado11',],['idPlanta'=>$num[0]]);

    if(count($campoMaceta)>0){

        if(($cuidoMaceta[2]==0 )||($cuidoMaceta[5]==0 ) || ($cuidoMaceta[7]== 0) || ($cuidoMaceta[9]==0 ) ){
            return true;
        }else {
            return false;
        }
    }

}

