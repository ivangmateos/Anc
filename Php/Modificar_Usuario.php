<?php
/*
 * fichero que sirve como controlador del registro
 */
    require_once("Clase_Usuario.php");
    require_once ("Metodos_Usuario.php");
    //cuando se reciban los datos del usuario
    if (isset($_POST["inputnombre"])){
        //paso todos los datos por la funci�n variableSegura(), creo un nuevo usuario y lo guardo en la base de datos
        $nom=$_POST["inputnombre"];
        $ape=$_POST["inputapellidos"];
        $eda=$_POST["inputedad"];
        $usu=$_POST["inputusuario"];
        $pwd=$_POST["inputcontrasena"];
        $pro=$_POST["Provincia"];
        $ema=$_POST["inputemail"];
        $tel=$_POST["inputtelefono"];
        $admin=0;
        $us = new Usuario ($nom,$ape,$eda,$usu,$pwd,$pro,$ema,$tel,$admin);

        try {
            //si se guarda bien el usuario, vuelvo al login
            Metodos_Usuario::UpdateUsuario($us);
            header("location:../Accediendo/editarperfil.php?Usuario_Modificado");
            session_start();
            $_SESSION["usuario"]=$us;
        }catch (PDOException $e){
            $error = "Al_modificar_el_usuario"; 
            header("location:../Accediendo/editarperfil.php?error=$error");
        }
    }
?>
