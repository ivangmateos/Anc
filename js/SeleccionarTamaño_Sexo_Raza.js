function seleccionarTamano(tamano) {
   document.getElementById('Tamaño').value = tamano;
}

function seleccionarSexo(sexo) {
   document.getElementById('Sexo').value = sexo;
}

function seleccionarRaza(raza) {    
   
    document.getElementById('Raza').value=raza;
    if(document.getElementById('Raza').value==""){
      document.getElementById('Raza').value="Otro";
    }
     
  
}
