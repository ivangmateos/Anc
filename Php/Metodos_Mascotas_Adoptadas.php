<?php
require_once("ConexionBD.php");
require_once("../Php/Clase_Mascotas_Adoptadas.php");
class Metodos_Mascotas_Adoptadas{

    public static function addMascota_adoptada(Mascotas_Adoptadas $mascotas)
    {
        $conexion = ConexionBD::conectar();
        $sql = $conexion->prepare("insert into mascotas_adoptadas (Nombre, Raza, Tamano,Edad,Sexo,Caracter,Convivencia,Img,usuario_Usuario) values (:nom, :raza, :tamano, :edad,:sexo,:caracter,:convivencia,:imagen,:usu)");
        $nombre=$mascotas->getNombre();
        $raza=$mascotas->getRaza();
        $tamano=$mascotas->getTamaño();
        $edad=$mascotas->getEdad();
        $sexo=$mascotas->getSexo();
        $caracter=$mascotas->getCaracter();
        $convivencia=$mascotas->getConvivencia();
        $imagen = $mascotas->getImg(); 
        $usuario_Usuario=$_SESSION["Adoptante"];
        $sql->bindParam(":nom", $nombre);
        $sql->bindParam(":raza", $raza);
        $sql->bindParam(":tamano", $tamano); 
        $sql->bindParam(":edad", $edad);
        $sql->bindParam(":sexo", $sexo);
        $sql->bindParam(":caracter", $caracter);
        $sql->bindParam(":convivencia", $convivencia);
        $sql->bindParam(":imagen", $imagen);
        $sql->bindParam(":usu",$usuario_Usuario);
        $sql->execute();
    }
  
    public static function get_adoptados()
    {
        $conexion = ConexionBD::conectar();
        $consulta = "select * from mascotas_adoptadas";
        $sql = $conexion->prepare($consulta);
        $sql->execute();
        $tabla = $sql->fetchAll();
        echo "<table class='table table-striped centrar'><th>Adoptante</th>"."<th>Nombre</th>"."<th colspan='6'>Mascota</th><tr>";
        foreach ($tabla as $linea) {
            echo "<td> " . $linea["usuario_Usuario"] . "</td> " . "<td>".$linea["Nombre"]. "</td> 
            <input type='hidden' name='id' value=" . $linea["Id"] . ">
            <input type='hidden' name='usu' value=" . $linea["usuario_Usuario"] . ">
             <input type='hidden' name='nombre' value=" . $linea["Nombre"] . ">
            <td><img class='imagenesanimales imagenesresponsive' src=" . "../img/".$linea['Img']." class='card-img-top' alt='...'></td></form></tr>"; 
        } 
        echo "</table>";
    }
}