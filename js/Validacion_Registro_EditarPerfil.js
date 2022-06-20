window.onload = iniciar;
var elemento = "";
function iniciar() {
    document.getElementById("enviar").addEventListener('click', validar, false);
}
/*Validación:Registro*/
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
function Validarapellidos() {
    elemento = document.getElementById("apellidos");
    if (!elemento.checkValidity()) {
        if (elemento.validity.valueMissing) {
            error3(elemento, "Debe introducir un/unos apellidos");
        }
        if (elemento.validity.patternMismatch) {
            error3(elemento, "Minimo 6 caracteres y maximo 30 caracteres");
        }
        return false;
    }
    limpiarError(elemento);
    return true;
}
function Validaredad() {
    elemento = document.getElementById("edad");
    if (!elemento.checkValidity()) {
        if (elemento.validity.valueMissing) {
            error4(elemento, "Debe introducir una edad");
        } else if (elemento.checkValidity) {
            error4(elemento, "La edad debe de estar entre 18 y 99");
        }
        return false;
    }
    limpiarError(elemento);
    return true;
}
function Validarusuario() {
    elemento = document.getElementById("usuario");
    if (!elemento.checkValidity()) {
        if (elemento.validity.valueMissing) {
            error5(elemento, "Debe introducir un usuario");
        }
        if (elemento.validity.patternMismatch) {
            error5(elemento, "Minimo 4 caracteres y maximo 16 caracteres");
        }
        return false;
    }
    limpiarError(elemento);
    return true;
}
function Validarcontrasena() {
    elemento = document.getElementById("contrasena");
    if (!elemento.checkValidity()) {
        if (elemento.validity.valueMissing) {
            error6(elemento, "Debe introducir una contraseña");
        }
        if (elemento.validity.patternMismatch) {
            error6(elemento, "Mínimo 5 y máximo 16 caracteres");
        }
        return false;
    }
    limpiarError(elemento);
    return true;
}
function validaEmail() {
    elemento = document.getElementById("email");
    if (!elemento.checkValidity()) {
        if (elemento.validity.valueMissing) {
            error7(elemento,"Debe introducir un email");
        }
        if (elemento.validity.patternMismatch) {
            error7(elemento,"Debe introducir el correo en este formato:prueba@gmail.es");
        }
        return false;
    }
    limpiarError(elemento);
    return true;
}
function validatelefono() {
    elemento = document.getElementById("telefono");
    if (!elemento.checkValidity()) {
        if (elemento.validity.valueMissing) {
           error8(elemento,"Debe introducir un telefono");
        }
        if (elemento.validity.patternMismatch) {
           error8(elemento,"Debe introducir numeros, el formato debe ser: 123-456-789");
        }
        return false;
    }
    limpiarError(elemento);
    return true;
}
function validaDesplegable() {
    elemento = document.getElementById('Provincia');
    if (document.getElementById('Provincia').value == "") {
        error9(elemento, "Debe seleccionar una provincia");
        return false;
    }
    limpiarError(elemento);
    return true;
}
function validar(e) {
    if (Validarnombre() && Validarapellidos() && Validaredad() && Validarusuario() && Validarcontrasena()&& validaDesplegable() && validaEmail() &&validatelefono()&&confirm("Pulsa aceptar si deseas enviar el formulario")) {
          return true;
    } else {
        e.preventDefault();
        return false;
    }
}

function limpiarError(elemento) {
    elemento.className = "LimpiarError";
    document.getElementById("ErrorNombre").innerHTML = "";
    document.getElementById("ErrorApellidos").innerHTML = "";
    document.getElementById("ErrorEdad").innerHTML = "";
    document.getElementById("ErrorUsuario").innerHTML = "";
    document.getElementById("ErrorContrasena").innerHTML = "";
    document.getElementById("ErrorEmail").innerHTML = "";
    document.getElementById("ErrorTelefono").innerHTML = "";
    document.getElementById("ErrorProvincia").innerHTML = "";
}
function error2(elemento, mensaje) {
    document.getElementById("ErrorNombre").innerHTML = mensaje;
    elemento.className = "error";
    elemento.focus();
}
function error3(elemento, mensaje) {
    document.getElementById("ErrorApellidos").innerHTML = mensaje;
    elemento.className = "error";
    elemento.focus();
}
function error4(elemento, mensaje) {
    document.getElementById("ErrorEdad").innerHTML = mensaje;
    elemento.className = "error";
    elemento.focus();
}
function error5(elemento, mensaje) {
    document.getElementById("ErrorUsuario").innerHTML = mensaje;
    elemento.className = "error";
    elemento.focus();
}
function error6(elemento, mensaje) {
    document.getElementById("ErrorContrasena").innerHTML = mensaje;
    elemento.className = "error";
    elemento.focus();
}
function error7(elemento, mensaje) {
    document.getElementById("ErrorEmail").innerHTML = mensaje;
    elemento.className = "error";
    elemento.focus();
}
function error8(elemento, mensaje) {
    document.getElementById("ErrorTelefono").innerHTML = mensaje;
    elemento.className = "error";
    elemento.focus();
}
function error9(elemento, mensaje) {
    document.getElementById("ErrorProvincia").innerHTML = mensaje;
    elemento.className = "error";
    elemento.focus();
}
