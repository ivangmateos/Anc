<?php
require_once("ConexionBD.php");
require_once("../Php/Clase_Pendiente.php");
class Metodos_Pendiente{

    public static function addMascota_pendiente(Pendiente $mascotas)
    {
        $conexion = ConexionBD::conectar();
        $sql = $conexion->prepare("insert into adoptar_pendiente (Nombre, Raza, Tamano,Edad,Sexo,Caracter,Convivencia,Img,usuario_Usuario) values (:nom, :raza, :tamano, :edad,:sexo,:caracter,:convivencia,:imagen,:usu)");
        $nombre=$mascotas->getNombre();
        $raza=$mascotas->getRaza();
        $tamano=$mascotas->getTamaño();
        $edad=$mascotas->getEdad();
        $sexo=$mascotas->getSexo();
        $caracter=$mascotas->getCaracter();
        $convivencia=$mascotas->getConvivencia();
        $imagen = $mascotas->getImg(); 
        $usuario_Usuario=$_SESSION["usuario"]->getUsuario();
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

    public static function get_Pendiente()
    {
        $conexion = ConexionBD::conectar();
        $consulta = "select * from adoptar_pendiente";
        $sql = $conexion->prepare($consulta);
        $sql->execute();
        $tabla = $sql->fetchAll();
        
        echo "<table class='table table-striped   centrar'><th>Adoptante</th>"."<th class='responsive'>Nombre</th>"."<th colspan='6'>Mascota</th><tr>";
        foreach ($tabla as $linea) {
  
            echo "<td> " . $linea["usuario_Usuario"] . "</td> " . "<td class='responsive'>".$linea["Nombre"]. "</td> 
            <form action='../Php/Aprobar_Peticion.php' method='POST'>
            <input type='hidden' name='id' value=" . $linea["Id"] . ">
            <input type='hidden' name='usu' value=" . $linea["usuario_Usuario"] . ">
             <input type='hidden' name='nombre'  value=" . $linea["Nombre"] . ">
            <td class='tamaño'><img class='imagenesresponsive imagenesanimales' src=" . "../img/".$linea['Img']." class='card-img-top' alt='...'></td>
            <td>  <button type='submit' class='btn  btn-success btn-block col-12'>Aprobar</button></td></form>
    
            <form action='../Php/Revocar_Peticion.php' method='POST'>
        <input type='hidden' name='id' value=" . $linea["Id"] . ">
            <input type='hidden' name='nombre' value=" . $linea["Nombre"] . ">
            <td><button type='submit' class='btn btn-outline-danger btn-block col-12'>Revocar</button></form></td></tr>"; 
        } 
        echo "</table>";
    }
    public static function get_MascotaPendiente($Mascota)
    {
        $conexion = ConexionBD::conectar();
        $sql = $conexion->query("select * from adoptar_pendiente where Id = '" . $Mascota . "'");
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $mascota = $sql->fetch();

        return new Mascotas($mascota->Nombre, $mascota->Raza, $mascota->Tamano, $mascota->Edad,$mascota->Sexo,$mascota->Caracter,$mascota->Convivencia,$mascota->Id,$mascota->Img);
    }
    
    public static function get_MascotaPendiente_usuariobd($Mascota)
    {
        $conexion = ConexionBD::conectar();
        $sql = $conexion->query("select * from adoptar_pendiente where Id = '" . $Mascota . "'");
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $mascota = $sql->fetch();

        return new Pendiente($mascota->Nombre, $mascota->Raza, $mascota->Tamano, $mascota->Edad,$mascota->Sexo,$mascota->Caracter,$mascota->Convivencia,$mascota->Id,$mascota->Img,$mascota->usuario_Usuario);
    }
    public static function get_EliminarMascotaPendiente($id)
    {
        $conexion = ConexionBD::conectar();
        $consulta = "delete from adoptar_pendiente where id=:id";  
        $sql = $conexion->prepare($consulta);
        $sql->bindParam(":id", $id);  
        $sql->execute();
    }
}