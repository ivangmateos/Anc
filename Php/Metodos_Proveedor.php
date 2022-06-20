<?php
    include_once("../Php/ConexionBD.php");
    include_once ("../Php/Clase_Proveedor.php");


class Metodos_Proveedor
{
    public static function getProveedores(){
        $conexion = ConexionBD::conectar();
        $consulta = "SELECT * FROM proveedor";
        $sql = $conexion->prepare($consulta);
        $sql->execute();
        $tabla = $sql->fetchAll();
        foreach ($tabla as $linea)
        echo " <option value='". $linea["nombre"] ."'>" . $linea["nombre"] . "</option>";
  
    }
}
?>