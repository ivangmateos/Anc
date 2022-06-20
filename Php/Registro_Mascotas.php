<?php
require_once("Clase_Mascotas.php");
require_once("Metodos_Mascotas.php");

if (isset($_POST["inputnombre"])) {
    $nom = $_POST["inputnombre"];
    if (isset($_POST["Raza"]) && $_POST["Raza"] == "Otro") {
        $raza = $_POST["inputraza"];
    } else {
        $raza = $_POST["Raza"];
    }
    $tamaño = $_POST["Tamaño"];
    $edad = $_POST["inputedad"];
    $sexo = $_POST["Sexo"];
    $caracter = $_POST["inputcaracter"];
    $convivencia = $_POST["inputconvivencia"];
    $id = "";
    $imagen = $_FILES['inputimagen']['name'];
    $temp = $_FILES['inputimagen']['tmp_name'];
    $mascotas = new Mascotas($nom, $raza, $tamaño, $edad, $sexo, $caracter, $convivencia, $id, $imagen);
    try {
        Metodos_Mascotas::addMascota($mascotas);
        move_uploaded_file($temp, '../img/' . $imagen);
        header("location:../Administrador/administrarMascotas.php?Mascota_Registrada");
    } catch (PDOException $e) {
        $error = "La_Mascota_ya_existe";
        header("location:../Administrador/añadirMascota.php?error=$error");
    }
}
