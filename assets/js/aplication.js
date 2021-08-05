const macetas=document.getElementsByClassName("Macetas");
const semillas=document.getElementsByClassName("Semillas");
const btnAceptar=document.getElementById("btnAceptar");
const btnCancelar=document.getElementById("btnCancelar");
const capaDerecha=document.getElementById("Contenedor_Descripcion");
let plantas=new Array(10);
if(sessionStorage.getItem('plantas')!=null){
plantas=JSON.parse(sessionStorage.getItem('plantas'));
}

let numeroMaceta= sessionStorage.getItem('datos');
console.log("el numero demaceta es:"+numeroMaceta);
for(let i=0;i<macetas.length;i++){

    macetas[i].onmouseenter = function(){
        if(plantas[i]==null){
        macetas[i].innerHTML='<img src="./assets/img/plus.png" id="plus" width="250 px"/>';
        numeroMaceta=i;
        
        sessionStorage.setItem('datos', JSON.stringify(numeroMaceta));
    }
    };
    macetas[i].onmouseleave = function(){
        const img =document.getElementById("plus");
        img.parentNode.removeChild(img);
    };
} 
let arbolSeleccionado;
let numeroSemilla= sessionStorage.getItem('semillas');
for(let i=0;i<semillas.length;i++){
    semillas[i].onmouseenter = function(){
        
        if(i==0){
            capaDerecha.innerHTML='<div id="descripcion"><h1 class="descripcion_title">Guanacaste</h1><img src="./assets/img/guanacaste/foto.jpg" width="200px"><p class="descripcion_text">Es el árbol nacional de Costa Rica, cuyo nombre común es «árbol de guanacaste» lo cual es una denominación proveniente de dos palabras del idioma náhuatl: quauh, árbol y nacastl, oreja, refiriéndose a la forma de su fruto, que recuerda una oreja humana.</p></div>';
        }else if(i==1){
            capaDerecha.innerHTML='<div id="descripcion"><h1 class="descripcion_title">Malinche</h1><img src="./assets/img/malinche/foto.jpg" width="200px"><p class="descripcion_text">Delonix regia, popularmente conocida como framboyán, flamboyán, chivato,flamboyant, tabachín, malinche, ponciana o acacia es una especie de la familia de las fabáceas. Es uno de los árboles más coloridos del mundo por sus flores rojas, anaranjadas, lilas, y por su follaje verde brillante. </p></div>';
        }else if(i==3){
            capaDerecha.innerHTML='<div id="descripcion"><h1 class="descripcion_title">Pochote</h1><img src="./assets/img/pochote/foto.jpg" width="200px"><p class="descripcion_text">El pochote (Bombacopsis quinata) pertenece a la familia Bombacaceae y comúnmente se le conoce con los nombres de pochote en Costa Rica, saquisaqui, jaris, masguara en Venezuela y cedro espinoso en Colombia, Honduras y Nicaragua. Esta especie se distribuye en forma natural desde el sur de Honduras hasta Colombia y Venezuela, y en sitios que van desde el nivel del mar hasta los 900 m.s.n.m. </p></div>';
        }else if(i==4){
            capaDerecha.innerHTML='<div id="descripcion"><h1 class="descripcion_title">Corteza Amarilla</h1><img src="./assets/img/cortezaAmarilla/foto.jpg" width="200px"><p class="descripcion_text">Tabebuia ochracea (árbol corteza amarilla) es un árbol maderable, nativo de Sudamérica, en la vegetación del Cerrado, Pantanal, en Brasil. Es un árbol caducifolio, de hasta 15 m de altura. Sus flores son amarillas claras con líneas rojas en el cuello. La floración se produce dos veces al año en abril y en diciembre y es cuando el árbol ha perdido sus hojas, quedando muy vistoso. </p></div>';
        }else{
            capaDerecha.innerHTML='<div id="descripcion"><h1 class="descripcion_title">Caoba</h1><img src="./assets/img/caoba/foto.jpg" width="200px"><p class="descripcion_text">Swietenia macrophylla es una especie botánica de árboles originaria de la zona intertropical americana perteneciente a la familia de las Meliaceae. Es un árbol perennifolio o caducifolio, de 35 a 50 m (raramente hasta 70 m) de altura, diámetro de circunferencia: entre 10 y 18 dm por lo general hasta los 35 dm en condiciones favorables. Copa abierta, redondeada en forma de sombrilla.</p></div>';
        }
        
        
    };
    semillas[i].onmouseleave = function(){
        
        const descripcion =document.getElementById("descripcion");
        descripcion.parentNode.removeChild(descripcion);
    };
    
    semillas[i].onclick = function(){
        numeroSemilla=i;
        sessionStorage.setItem('semillas', JSON.stringify(numeroSemilla));
        console.log("numero de semilla: "+numeroSemilla);
        if(i==0){
            
            arbolSeleccionado=new arbol("Guanacaste","arbol de caboa",["./assets/img/Caboa/0.png","./assets/img/Caboa/1.png","./assets/img/Caboa/2.png","./assets/img/Caboa/3.png","./assets/img/Caboa/4.png","./assets/img/Caboa/5.png"],0);
            activar();
            
        }else if(i==1){
            arbolSeleccionado=new arbol("Malinche","arbol de caboa",["./assets/img/Caboa/0.png","./assets/img/Caboa/1.png","./assets/img/Caboa/2.png","./assets/img/Caboa/3.png","./assets/img/Caboa/4.png","./assets/img/Caboa/5.png"],0);
            activar();
        }else if(i==3){
            arbolSeleccionado=new arbol("Pochote","arbol de caboa",["./assets/img/Caboa/0.png","./assets/img/Caboa/1.png","./assets/img/Caboa/2.png","./assets/img/Caboa/3.png","./assets/img/Caboa/4.png","./assets/img/Caboa/5.png"],0);
            activar();
        }else if(i==4){
            arbolSeleccionado=new arbol("Corteza Amarilla","arbol de caboa",["./assets/img/Caboa/0.png","./assets/img/Caboa/1.png","./assets/img/Caboa/2.png","./assets/img/Caboa/3.png","./assets/img/Caboa/4.png","./assets/img/Caboa/5.png"],0);
            activar();
        }else{
            arbolSeleccionado=new arbol("Caboa","arbol de caboa",["./assets/img/Caboa/0.png","./assets/img/Caboa/1.png","./assets/img/Caboa/2.png","./assets/img/Caboa/3.png","./assets/img/Caboa/4.png","./assets/img/Caboa/5.png"],0);
            activar();
        }
        
        
    };

}

//activa el boton aceptar solo si el objeto arbol no esta vacio
const activar= ()=>{
    if(btnAceptar!=null){
        if(arbolSeleccionado==null){
        btnAceptar.disabled=true;
        }else{
        btnAceptar.disabled=false;
        }
    }
}
activar();
//


if(btnCancelar!=null && btnAceptar!=null){

btnCancelar.onclick = function(){
    window.location="semillero.php";
};
btnAceptar.onclick = function(){
    plantas[numeroMaceta]=arbolSeleccionado;
    sessionStorage.setItem('plantas', JSON.stringify(plantas));
    
    window.location="semillero.php"; 
};
}
const ActualizarMacetas=()=>{

    for(let i=0;i<10;i++){
        console.log("entro 2")
        if(plantas[i]!=null){
          console.log("no está vacio en la posicion: "+i)
          
            
            if(macetas[i]!=null){
                if(numeroSemilla==0){
                    macetas[i].innerHTML=`<img src="./assets/img/guanacaste/6.png" width="250px"/><img src="./assets/img/regadera.png" width="150px" class="regadera"/>`;
                }else if(numeroSemilla==1){
                    macetas[i].innerHTML=`<img src="./assets/img/malinche/6_5.png" width="250px"/><img src="./assets/img/regadera.png" width="150px" class="regadera"/>`;    
                }else if(numeroSemilla==2){
                    macetas[i].innerHTML=`<img src="./assets/img/caoba/6.png" width="250px"/><img src="./assets/img/regadera.png" width="150px" class="regadera"/>`;
                }else if(numeroSemilla==3){
                    macetas[i].innerHTML=`<img src="./assets/img/pochote/6.png" width="250px"/><img src="./assets/img/regadera.png" width="150px" class="regadera"/>`;
                }else{
                    macetas[i].innerHTML=`<img src="./assets/img/cortezaAmarilla/6_5.png" width="250px"/><img src="./assets/img/regadera.png" width="150px" class="regadera"/>`;
                }
        }
    }
    }
};
ActualizarMacetas();