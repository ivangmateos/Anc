<?php
session_start();
include_once("../Php/Metodos_Mascotas.php");
         if (isset($_POST['id'])) {
            $id=$_POST['id'];
            $mascota = $_POST['nombre'];
            $_SESSION["mascotaeliminada"]=$mascota;
            Metodos_Mascotas::get_EliminarMascota($id);
            header("location:../Administrador/administrarMascotas.php?Mascota_Eliminada");
         }
?>