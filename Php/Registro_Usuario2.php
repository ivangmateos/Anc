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
        if($_POST["checkboxadmin"]=="on"){
            $admin=1;
        }else{
            $admin=0;
        }
        $us = new Usuario($nom,$ape,$eda,$usu,$pwd,$pro,$ema,$tel,$admin);
        try {
            Metodos_Usuario::addUsuario($us);
            header("location:../Administrador/administrarUsuarios.php?Usuario_Registrado");
        }catch (PDOException $e){
            $error = "El_nombre_de_usuario_ya_existe"; 
            header("location:../Administrador/añadirUsuario.php?error=$error");
        }
    }
?>
