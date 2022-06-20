<?php
include_once("../Php/ConexionBD.php");
include_once("../Php/Clase_Producto.php");

/*
     * clase que sirve para el manejo de productos de la base de datos
     * contienen un �nico m�todo: getProductos()
     */

class Metodos_Productos
{
    //funci�n que recoge todos los productos de la base de datos en una lista de objetos (Producto) y la devuelve como par�metro
    public static function getProductos()
    {
        $conexion = ConexionBD::conectar();
        $sql = $conexion->query("select * from productos");
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $productos = array();
        foreach ($sql->fetchAll() as $producto) {
            array_push($productos, new Producto($producto->img, $producto->nombre, $producto->proveedor_nombre, $producto->precio, $producto->id));
        }
        return $productos;
    }
    public static function getproducto($product)
    {
        $conexion = ConexionBD::conectar();
        $sql = $conexion->query("select * from productos where id = '" . $product . "'");
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $producto = $sql->fetch();

        return new Producto($producto->img, $producto->nombre, $producto->proveedor_nombre, $producto->precio, $producto->id);
    }
    public static function get_Productos2()
    {
        $conexion = ConexionBD::conectar();
        $consulta = "select * from productos";
        $sql = $conexion->prepare($consulta);
        $sql->execute();
        $tabla = $sql->fetchAll();
        echo "<table class='table table-striped centrar'><th>Nombre</th>" . "<th colspan='6'>Producto</th><tr>";
        foreach ($tabla as $linea) {
            echo "<td class='tamañotdproducto'> " . $linea["nombre"] . "</td> " . "
        <form action='../Php/Session_productmodificar.php' method='POST'>
        <input type='hidden' name='id' value=" . $linea["id"] . ">
         <input type='hidden' name='nombre' value=" . $linea["nombre"] . ">
        <td class='tamaño'><img class='imagenesproductos imagenesresponsive' src=" . "../img/" . $linea['img'] . " class='card-img-top' alt='...'></td>
        <td>  <button type='submit' class='btn  btn-success btn-block col-12'>Modificar</button></td></form>

        <form action='../Php/Eliminar_Producto.php' method='POST'>
         <input type='hidden' name='id' value=" . $linea["id"] . "></td>
         <input type='hidden' name='nombre' value=" . $linea["nombre"] . "></td>
        <td><button type='submit'  class='btn  btn-success btn-block col-12'>Eliminar</button></form></td></tr>";
        }
        echo "</table>";
    }
    public static function get_EliminarProducto($id)
    {
        $conexion = ConexionBD::conectar();
        $consulta = "delete  from productos where id=:id";
        $sql = $conexion->prepare($consulta);
        $sql->bindParam(":id", $id);
        $sql->execute();
    }

    public static function addProducto(Producto $producto)
    {
        $conexion = ConexionBD::conectar();
        $sql = $conexion->prepare("insert into productos (img, nombre, proveedor_nombre, precio) values (:imagen, :nom, :proveedor, :prec)");
        $imagen = $producto->getImg();
        $nom = $producto->getNombre();
        $proveedor = $producto->getProveedor_nombre();
        $prec = $producto->getPrecio();
        $sql->bindParam(":imagen", $imagen);
        $sql->bindParam(":nom", $nom);
        $sql->bindParam(":proveedor", $proveedor);
        $sql->bindParam(":prec", $prec);
        $sql->execute();
    }
    public static function UpdateProducto(Producto $producto)
    {
        $conexion = ConexionBD::conectar();
        $sql = $conexion->prepare("update productos set img=:imagen,nombre=:nom,proveedor_nombre=:proveedor,precio=:prec where id=:id");
        $imagen = $producto->getImg();
        $nom = $producto->getNombre();
        $proveedor = $producto->getProveedor_nombre();
        $prec = $producto->getPrecio();
        $id = $_SESSION["productmodificar"]->getId();
        $sql->bindParam(":imagen", $imagen);
        $sql->bindParam(":nom", $nom);
        $sql->bindParam(":proveedor", $proveedor);
        $sql->bindParam(":prec", $prec);
        $sql->bindParam(":id", $id);
        $sql->execute();
    }
}
