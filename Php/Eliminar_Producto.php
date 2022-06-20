<?php
session_start();
include_once("../Php/Metodos_Productos.php");
         if (isset($_POST['id'])) {
            $id=$_POST['id'];
            $producto = $_POST['nombre'];
            $_SESSION["productooeliminado"]=$producto;
            Metodos_Productos::get_EliminarProducto($id);
            header("location:../Administrador/administrarProductos.php?Producto_Eliminado");
         }
?>

