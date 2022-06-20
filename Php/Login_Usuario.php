<?php
session_start();
require ("Clase_Usuario.php");
require("Metodos_Usuario.php");   
    //cuando se reciba el nombre de usuario y la contrase�a
    if (isset($_POST["usuario"])){
        //compruebo que sean correctos
        if (Metodos_Usuario::comprobarPassword($_POST["usuario"],$_POST["contrasena"])){
            //si lo son recojo el usuario de la base de datos, lo meto en la sesi�n y paso al controlador de la tienda
           $usuario = Metodos_Usuario::getUsuario($_POST["usuario"]);
            $_SESSION["usuario"] = $usuario;
            header("location:../Accediendo/index.php");
            if($_SESSION["usuario"]->getAdministrador()==1){
                header("location:../Administrador/Administracion.php");
            }
        }else{
            //si no lo son vuelvo al login
            $error = "Usuario_o_contrasena_incorrectos";   
            header("location:../index.php?error=".$error);
        }
    }
?>