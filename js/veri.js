function clave(){
  var cl1=document.getElementById('pass1');
  var cl2=document.getElementById('pass2');
  if (cl1.value !=cl2.value)
  {
    alert('Las dos claves ingresadas son distintas');
      cl2.focus()
     return false;
  }
  else
  {
    alert('Las dos claves ingresadas son iguales');
    return true;
  }
} 