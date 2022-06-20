<?php
include_once("../Php/Metodos_Mascotas.php");
session_start();
if(isset($_POST['id'])){
    $Mascota = $_POST['id'];
    $_SESSION["mascotamodificar"]=Metodos_Mascotas::get_Mascota($Mascota);      
    header("location:../Administrador/EditarMascota.php");
}
?>