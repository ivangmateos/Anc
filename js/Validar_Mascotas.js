window.onload = iniciar;
var elemento = "";
function iniciar() {
    document.getElementById("enviar").addEventListener('click', validar, false);
}

function Validarnombre() {
    elemento = document.getElementById("nombre");
    if (!elemento.checkValidity()) {
        if (elemento.validity.valueMissing) {
            error2(elemento, "Debe introducir un nombre");
        }
        if (elemento.validity.patternMismatch) {
            error2(elemento, "Minimo 3 caracteres y maximo 30 caracteres");
        }
        return false;
    }
    limpiarError(elemento);
    return true;
}
function Validarraza() {
    elemento = document.getElementById('Raza');
    if (document.getElementById('Raza').value == "") {
        error3(elemento, "Debe seleccionar una raza");
        return false;
    }
    if (document.getElementById('Raza').value == "Otro") {
        document.getElementById("OptionOtro").style.display = "block";
    }
    limpiarError(elemento);
    return true;
}
function validarRaza() {
    elemento = document.getElementById('raza');
    if (document.getElementById('Raza').value == "Otro") {
        document.querySelector('#raza').required = true;
        if (!elemento.checkValidity()) {
            if (elemento.validity.valueMissing) {
                error10(elemento, "Debe introducir una raza");
            }
            if (elemento.validity.patternMismatch) {
                error10(elemento, "Minimo 4 caracteres y maximo 30 caracteres");
            }
            return false;
        }
    }
    limpiarError(elemento);
    return true;

}
function validatamaño() {
    elemento = document.getElementById('Tamaño');
    if (document.getElementById('Tamaño').value == "") {
        error4(elemento, "Debe seleccionar un tamaño");
        return false;
    }
    limpiarError(elemento);
    return true;
}
function Validaredad() {
    elemento = document.getElementById("edad");
    if (!elemento.checkValidity()) {
        if (elemento.validity.valueMissing) {
            error5(elemento, "Debe introducir una edad");
        } else if (elemento.checkValidity) {
            error5(elemento, "La edad debe de estar entre 0 y 20");
        }
        return false;
    }
    limpiarError(elemento);
    return true;
}
function validasexo() {
    elemento = document.getElementById('Sexo');
    if (document.getElementById('Sexo').value == "") {
        error6(elemento, "Debe seleccionar un sexo");
        return false;
    }
    limpiarError(elemento);
    return true;
}

function Validarcaracter() {
    elemento = document.getElementById("caracter");
    if (!elemento.checkValidity()) {
        if (elemento.validity.valueMissing) {
            error7(elemento, "Debe introducir un texto explicando como es el caracter de la mascota");
        }
        if (elemento.validity.patternMismatch) {
            error7(elemento, "Minimo 5 caracteres y maximo 255 caracteres");
        }
        return false;
    }
    limpiarError(elemento);
    return true;
}
function Validarconvivencia() {
    elemento = document.getElementById("convivencia");
    if (!elemento.checkValidity()) {
        if (elemento.validity.valueMissing) {
            error8(elemento, "Debe introducir un texto explicando como es el caracter de la mascota");
        }
        if (elemento.validity.patternMismatch) {
            error8(elemento, "Minimo 2 caracteres y maximo 255 caracteres");
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
function validar(e) {
    if (Validarnombre() && Validarraza() && validarRaza() && validatamaño() && Validaredad() && validasexo() && Validarcaracter() && Validarconvivencia() && ValidarImagen() && confirm("Pulsa aceptar si deseas enviar el formulario")) {
        return true;
    } else {
        e.preventDefault();
        return false;
    }
}

function limpiarError(elemento) {
    elemento.className = "LimpiarError";
    document.getElementById("ErrorNombre").innerHTML = "";
    document.getElementById("ErrorRaza").innerHTML = "";
    document.getElementById("ErrorTamaño").innerHTML = "";
    document.getElementById("ErrorEdad").innerHTML = "";
    document.getElementById("ErrorSexo").innerHTML = "";
    document.getElementById("ErrorCaracter").innerHTML = "";
    document.getElementById("ErrorConvivencia").innerHTML = "";
    document.getElementById("ErrorImagen").innerHTML = "";
    document.getElementById("ErrorRaza2").innerHTML = "";
}
function error2(elemento, mensaje) {
    document.getElementById("ErrorNombre").innerHTML = mensaje;
    elemento.className = "error";
    elemento.focus();
}

function error3(elemento, mensaje) {
    document.getElementById("ErrorRaza").innerHTML = mensaje;
    elemento.className = "error";
    elemento.focus();
}
function error4(elemento, mensaje) {
    document.getElementById("ErrorTamaño").innerHTML = mensaje;
    elemento.className = "error";
    elemento.focus();
}
function error5(elemento, mensaje) {
    document.getElementById("ErrorEdad").innerHTML = mensaje;
    elemento.className = "error";
    elemento.focus();
}
function error6(elemento, mensaje) {
    document.getElementById("ErrorSexo").innerHTML = mensaje;
    elemento.className = "error";
    elemento.focus();
}
function error7(elemento, mensaje) {
    document.getElementById("ErrorCaracter").innerHTML = mensaje;
    elemento.className = "error";
    elemento.focus();
}
function error8(elemento, mensaje) {
    document.getElementById("ErrorConvivencia").innerHTML = mensaje;
    elemento.className = "error";
    elemento.focus();
}
function error9(elemento, mensaje) {
    document.getElementById("ErrorImagen").innerHTML = mensaje;
    elemento.className = "error";
    elemento.focus();
}
function error10(elemento, mensaje) {
    document.getElementById("ErrorRaza2").innerHTML = mensaje;
    elemento.className = "error";
    elemento.focus();
}