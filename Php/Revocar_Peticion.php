<?php
include_once("../Php/Metodos_Mascotas.php");
include_once("../Php/Metodos_Pendiente.php");
include_once("../Php/Clase_Pendiente.php");
include_once("../Php/Clase_Usuario.php");
session_start();
if(isset($_POST['id'])){
$id=$_POST['id'];
 $mascotas=Metodos_Pendiente::get_MascotaPendiente($id);
 $_SESSION["MascotaRevocada"]=$nombre=$mascotas->getNombre();
 $raza=$mascotas->getRaza();
 $tamano=$mascotas->getTamaño();
 $edad=$mascotas->getEdad();
 $sexo=$mascotas->getSexo();
 $caracter=$mascotas->getCaracter();
 $convivencia=$mascotas->getConvivencia();
 $imagen = $mascotas->getImg(); 
 $id = $mascotas->getId(); 
 $mascota=new Mascotas($nombre,$raza,$tamano,$edad,$sexo,$caracter,$convivencia,$id,$imagen);
 Metodos_Mascotas::addMascota($mascota);
Metodos_Pendiente::get_EliminarMascotaPendiente($id);
header("location:../Administrador/Administracion.php?Peticion_Revocada");

}

?>