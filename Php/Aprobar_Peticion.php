<?php
include_once("../Php/Metodos_Mascotas_Adoptadas.php");
include_once("../Php/Metodos_Pendiente.php");
include_once("../Php/Clase_Pendiente.php");
include_once("../Php/Clase_Usuario.php");
include_once("../Php/Clase_Mascotas.php");
session_start();
if(isset($_POST['id'])){
    $id=$_POST['id'];
     $mascotas=Metodos_Pendiente::get_MascotaPendiente_usuariobd($id);
     $_SESSION["Mascota_aprobada"]=$nombre=$mascotas->getNombre();
     $_SESSION["Adoptante"]=$_POST['usu'];
     $raza=$mascotas->getRaza();
     $tamano=$mascotas->getTamaño();
     $edad=$mascotas->getEdad();
     $sexo=$mascotas->getSexo();
     $caracter=$mascotas->getCaracter();
     $convivencia=$mascotas->getConvivencia();
     $imagen = $mascotas->getImg(); 
     $id = $mascotas->getId(); 
     $usuario_Usuario=$_SESSION["Adoptante"];
     $aprobada=new Mascotas_Adoptadas($nombre,$raza,$tamano,$edad,$sexo,$caracter,$convivencia,$id,$imagen,$usuario_Usuario);
    Metodos_Mascotas_Adoptadas::addMascota_adoptada($aprobada);
    Metodos_Pendiente::get_EliminarMascotaPendiente($id);
    header("location:../Administrador/Administracion.php?Mascota_Adoptada");
    
}

?>