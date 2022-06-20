<?php
include_once("../Php/Metodos_Mascotas.php");
include_once("../Php/Metodos_Pendiente.php");
include_once("../Php/Clase_Pendiente.php");
include_once("../Php/Clase_Usuario.php");
session_start();
if(isset($_POST['id'])){
$id=$_POST['id'];
 $mascotas=Metodos_Mascotas::get_Mascota($id);
 $_SESSION["Mascota_Pendiente"]=$nombre=$mascotas->getNombre();
 $raza=$mascotas->getRaza();
 $tamano=$mascotas->getTamaño();
 $edad=$mascotas->getEdad();
 $sexo=$mascotas->getSexo();
 $caracter=$mascotas->getCaracter();
 $convivencia=$mascotas->getConvivencia();
 $imagen = $mascotas->getImg(); 
 $id = $mascotas->getId(); 
 $usuario_Usuario=$_SESSION["usuario"]->getUsuario();
 $pendiente=new Pendiente($nombre,$raza,$tamano,$edad,$sexo,$caracter,$convivencia,$id,$imagen,$usuario_Usuario);
Metodos_Pendiente::addMascota_pendiente($pendiente);
Metodos_Mascotas::get_EliminarMascota($id);
header("location:../Accediendo/adoptar.php?Adopcion_Pendiente");

}

?>