window.onload = iniciar;
var elemento = "";
function iniciar() {
    document.getElementById("enviar").addEventListener('click', validar, false);
}

function ValidarNombre() {
    elemento = document.getElementById("nombre");
    if (!elemento.checkValidity()) {
        if (elemento.validity.valueMissing) {
            error2(elemento, "Debe introducir un nombre");
        }
        if (elemento.validity.patternMismatch) {
            error2(elemento, "Minimo 5 caracteres y maximo 30 caracteres");
        }
        return false;
    }
    limpiarError(elemento);
    return true;
}
function ValidarPrecio() {
    elemento = document.getElementById("precio");
    if (!elemento.checkValidity()) {
        if (elemento.validity.valueMissing) {
            error3(elemento, "Debe introducir un precio");
        }
        return false;
    }
    limpiarError(elemento);
    return true;
}
function ValidarImagen() {
    elemento = document.getElementById('inputimagen');
    var files = elemento.files;
    if (files.length == 0) {
        error9(elemento, "Debe introducir una imagen");
        return false;
    } else {
        var filename = files[0].name;

        /* obtener la extensión del archivo */
        var extension = filename.substr(filename.lastIndexOf("."));

        /* Extensiones validas */
        var allowedExtensionsRegx = /(\.png)$/i;


        /* prueba de extensión con expresión regular */
        var isAllowed = allowedExtensionsRegx.test(extension);

        if (!isAllowed) {
            error9(elemento, "Debe introducir una imagen png");
            elemento.value = '';
            return false;
        }
        var fileSize = files[0].size;

        /* 1024 = 1MB */
        var size = Math.round((fileSize / 1024));

        /*Chequea que el valor del fichero sea inferior o igual a 2MB*/
        if (size <= 2 * 1024) {
            limpiarError(elemento);
            return true;
        } else {
            error9(elemento, "La imagen no puede ser mayor de 2MB");
            document.getElementById("inputimagen").value = "";
        }
    }

}


function validaDesplegable() {
    elemento = document.getElementById('Proveedor');
    if (document.getElementById('Proveedor').value == "") {
        error4(elemento, "Debe seleccionar un proveedor");
        return false;
    }
    limpiarError(elemento);
    return true;
}
function validar(e) {
    if (ValidarNombre() && ValidarPrecio() && ValidarImagen() && validaDesplegable() && confirm("Pulsa aceptar si deseas enviar el formulario")) {
        return true;
    } else {
        e.preventDefault();
        return false;
    }
}

function limpiarError(elemento) {
    elemento.className = "LimpiarError";
    document.getElementById("ErrorNombre").innerHTML = "";
    document.getElementById("ErrorPrecio").innerHTML = "";
    document.getElementById("ErrorProveedor").innerHTML = "";
    document.getElementById("ErrorImagen").innerHTML = "";

}
function error2(elemento, mensaje) {
    document.getElementById("ErrorNombre").innerHTML = mensaje;
    elemento.className = "error";
    elemento.focus();
}
function error3(elemento, mensaje) {
    document.getElementById("ErrorPrecio").innerHTML = mensaje;
    elemento.className = "error";
    elemento.focus();
}
function error4(elemento, mensaje) {
    document.getElementById("ErrorProveedor").innerHTML = mensaje;
    elemento.className = "error";
    elemento.focus();
}
function error5(elemento, mensaje) {
    document.getElementById("ErrorImagen").innerHTML = mensaje;
    elemento.className = "error";
    elemento.focus();
}


