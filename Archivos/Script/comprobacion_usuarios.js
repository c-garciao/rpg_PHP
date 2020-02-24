
function compruebaNombre() {
    var alfanumerico = /^[0-9ña-zÑA-Z]*$/;
    var nombre = document.getElementById('nombre_usuario').value;
    var mostrar = document.getElementById('muestra_error');
    if (nombre === "") {
        alert("Error. No puede dejar el campo del nombre vacío");
        //document.write('<span id="muestra_error">Error. No puede dejar el campo vacío</span>');
        mostrar.value = "";
        return false;
    } else if (alfanumerico.test(nombre) === false) {
        alert("Error. El nombre solo puede contener caracteres alfanumericos");
        return false;
        /*startsWith('[0-9]'
         Con la expresión regular /^\d/ comprobamos que el primer dígito(^), no sea un dígito(\d)
         */
    }else if(nombre.match(/^\d/)){
        alert ("Error. El nombre no puede comenzar con un numero");
        return false;
    }else{
        return true;
    }

}
function acerca_de(){
    alert('\
    \t\tTrabajo realizado por\n\
    \n\tDiego Gonzalez y Carlos Garcia\n\
    \n\tIAW 2018-2019 Teide Quintana'
    );
}
function cierra_ventana(){
    if (confirm("¿Seguro?")){
        window.close;
    }
}