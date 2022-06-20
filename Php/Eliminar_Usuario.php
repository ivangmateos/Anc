<?php
session_start();
include_once("../Php/Metodos_Usuario.php");
         if (isset($_POST['usuario'])) {
            $usu = $_POST['usuario'];
            $_SESSION["usuarioeliminado"]=$usu;
            Metodos_Usuario::get_EliminarUsuario($usu);
            header("location:../Administrador/administrarUsuarios.php?Usuario_Eliminado");
         }
?>

