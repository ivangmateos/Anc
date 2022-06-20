<?php
include_once("../Php/Metodos_Usuario.php");
session_start();
if(isset($_POST['usuario'])){
    $usu = $_POST['usuario'];
    $_SESSION["usumodificar"]=Metodos_Usuario::getUsuario($usu);      
    header("location:../Administrador/editarUsuario.php");
}
?>