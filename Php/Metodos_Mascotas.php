<?php
require_once("ConexionBD.php");
require_once("Clase_Mascotas.php");
class Metodos_Mascotas
{
    public static function get_Mascotas()
    {
        $conexion = ConexionBD::conectar();
        $consulta = "select * from mascotas";
        $sql = $conexion->prepare($consulta);
        $sql->execute();
        $tabla = $sql->fetchAll();
        echo "<table class='table table-striped centrar'><th>Nombre</th>" . "<th colspan='6'>Mascota</th><tr>";
        foreach ($tabla as $linea) {
            echo "<td> " . $linea["Nombre"] . "</td> " . "
            <form action='../Php/Session_mascotamodificar.php' method='POST'>
            <input type='hidden' name='id' value=" . $linea["Id"] . ">
            <input type='hidden' name='nombre' value=" . $linea["Nombre"] . ">
            <td class='tamaño'><img class='imagenesanimales imagenesresponsive' src=" . "../img/" . $linea['Img'] . " class='card-img-top' alt='...'></td>
            <td>  <button type='submit' class='btn  btn-success btn-block col-12'>Modificar</button></td></form>
    
            <form action='../Php/Eliminar_Mascotas.php' method='POST'>
            <input type='hidden' name='id' value=" . $linea["Id"] . ">
            <input type='hidden' name='nombre' value=" . $linea["Nombre"] . ">
            <td><button type='submit'  class='btn  btn-success btn-block col-12'>Eliminar</button></form></td></tr>";
        }
        echo "</table>";
    }
    public static function addMascota(Mascotas $mascotas)
    {
        $conexion = ConexionBD::conectar();
        $sql = $conexion->prepare("insert into mascotas (Nombre, Raza, Tamano,Edad,Sexo,Caracter,Convivencia,Img) values (:nom, :raza, :tamano, :edad,:sexo,:caracter,:convivencia,:imagen)");
        $nombre = $mascotas->getNombre();
        $raza = $mascotas->getRaza();
        $tamano = $mascotas->getTamaño();
        $edad = $mascotas->getEdad();
        $sexo = $mascotas->getSexo();
        $caracter = $mascotas->getCaracter();
        $convivencia = $mascotas->getConvivencia();
        $imagen = $mascotas->getImg();
        $sql->bindParam(":nom", $nombre);
        $sql->bindParam(":raza", $raza);
        $sql->bindParam(":tamano", $tamano);
        $sql->bindParam(":edad", $edad);
        $sql->bindParam(":sexo", $sexo);
        $sql->bindParam(":caracter", $caracter);
        $sql->bindParam(":convivencia", $convivencia);
        $sql->bindParam(":imagen", $imagen);
        $sql->execute();
    }

    public static function get_EliminarMascota($id)
    {
        $conexion = ConexionBD::conectar();
        $consulta = "delete from mascotas where id=:id";
        $sql = $conexion->prepare($consulta);
        $sql->bindParam(":id", $id);
        $sql->execute();
    }
    public static function get_Mascota($Mascota)
    {
        $conexion = ConexionBD::conectar();
        $sql = $conexion->query("select * from mascotas where Id = '" . $Mascota . "'");
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $mascota = $sql->fetch();

        return new Mascotas($mascota->Nombre, $mascota->Raza, $mascota->Tamano, $mascota->Edad, $mascota->Sexo, $mascota->Caracter, $mascota->Convivencia, $mascota->Id, $mascota->Img);
    }
    public static function UpdateMascota(Mascotas $mascotas)
    {
        $conexion = ConexionBD::conectar();
        $sql = $conexion->prepare("update mascotas set Nombre=:nom,Raza=:raza,Tamano=:tamano,Edad=:edad,Sexo=:sexo,Caracter=:caracter,Convivencia=:convivencia,Img=:imagen where Id=:id");
        $nombre = $mascotas->getNombre();
        $raza = $mascotas->getRaza();
        $tamano = $mascotas->getTamaño();
        $edad = $mascotas->getEdad();
        $sexo = $mascotas->getSexo();
        $caracter = $mascotas->getCaracter();
        $convivencia = $mascotas->getConvivencia();
        $imagen = $mascotas->getImg();
        $id = $_SESSION["mascotamodificar"]->getId();
        $sql->bindParam(":nom", $nombre);
        $sql->bindParam(":raza", $raza);
        $sql->bindParam(":tamano", $tamano);
        $sql->bindParam(":edad", $edad);
        $sql->bindParam(":sexo", $sexo);
        $sql->bindParam(":caracter", $caracter);
        $sql->bindParam(":convivencia", $convivencia);
        $sql->bindParam(":imagen", $imagen);
        $sql->bindParam(":id", $id);
        $sql->execute();
    }
    public static function get_Mascotas_Adoptar()
    {
        $conexion = ConexionBD::conectar();
        $sql = $conexion->query("select * from mascotas");
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $mascotas = array();
        foreach ($sql->fetchAll() as $mascota) {
            $mascota = new Mascotas($mascota->Nombre, $mascota->Raza, $mascota->Tamano, $mascota->Edad, $mascota->Sexo, $mascota->Caracter, $mascota->Convivencia, $mascota->Id, $mascota->Img);
            array_push($mascotas, $mascota);
        }
        return $mascotas;
    }
}
