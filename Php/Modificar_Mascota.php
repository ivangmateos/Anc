<?php
    require_once("Clase_Mascotas.php");
    require_once ("Metodos_Mascotas.php");
    session_start();
    if (isset($_POST["inputnombre"])){
        $nom=$_POST["inputnombre"];
        if (isset($_POST["Raza"]) && $_POST["Raza"] == "Otro") {
            $raza = $_POST["inputraza"];
        } else {
            $raza = $_POST["Raza"];
        }
        $tamaño=$_POST["Tamaño"];
        $edad=$_POST["inputedad"];
        $sexo=$_POST["Sexo"];
        $caracter=$_POST["inputcaracter"];
        $convivencia=$_POST["inputconvivencia"];    
        $id="";
        $imagen= $_FILES['inputimagen']['name'];        
        $temp = $_FILES['inputimagen']['tmp_name'];
        $mascotas = new Mascotas($nom,$raza,$tamaño,$edad,$sexo,$caracter,$convivencia,$id,$imagen);
        try {
            Metodos_Mascotas::UpdateMascota($mascotas);
            move_uploaded_file($temp, '../img/'.$imagen);
            header("location:../Administrador/administrarMascotas.php?Mascota_Modificada");
        }catch (PDOException $e){
            $error = "La_mascota_no_se_puede_modificar"; 
            header("location:../Administrador/EditarMascota.php?error=$error");
        }
    }
?>