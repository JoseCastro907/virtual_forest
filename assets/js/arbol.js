var arbol=class claseArbol {
  constructor (nombre,descripcion ,rutaImagen, diaVida) {
    this.nombre = nombre;
    this.descripcion = descripcion;
    this.rutaImagen=rutaImagen;
    this.diaVida=diaVida;
    let cuidados=[false,false,false,false,false,false,false,false,false,false,false]
  }
  cuidar(diaActual){
    
    let diasDeVida=this.calcularDiasCuidado(diaActual);
    this.cuidados[diasDeVida]=true;
    
  }

  actualizarImagen(diaActual){
    const vida=this.comprobarVida(diaActual);
    if(vida){
      if(diaActual=>0&&diaActual<3){
        return this.rutaImagen[1];
      }else if(diaActual>=3&&diaActual<6){
        return this.rutaImagen[2];
      }else if(diaActual>=6&&diaActual<8){
        return this.rutaImagen[3];
      }else if(diaActual>=8&&diaActual<10){
        return this.rutaImagen[4];
      }else{
        return this.rutaImagen[5];
      }

    }else{
      return this.rutaImagen[0];
    }

  }

  comprobarVida(diaActual){
    let diasDeVida=this.calcularDiasCuidado(diaActual);
    const diaAnterior=(diasDeVida-1);
    if(diaAnterior>=0){
      return this.cuidados[diaAnterior]

    }else{
      return true;
    }
  }
  
  getNombre(){
    return this.nombre;
  }

 

  calcularDiasCuidado(diaActual){ //sirve para calcular la posicion de cuidado del dia
     
    let diasDeVida=(diaActual-this.diaVida);
    if(diasDeVida<=21){
      if(diasDeVida%2==0){
        diasDeVida=(diasDeVida/2);
      }else{
        diasDeVida=((diasDeVida-1)/2);
      }
    }else{
      diasDeVida=10;
    }
    return diasDeVida;
  }



  //saludar (nombre) {
  //  console.log(`El nombre es: ${nombre} y los valores elegidos son ${x} y ${y}`);
    
  //}
}