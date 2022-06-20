<?php
    require_once("Clase_Producto.php");
    require_once ("Metodos_Productos.php");

    if (isset($_POST["inputnombre"])){
        $nom=$_POST["inputnombre"];
        $precio=$_POST["inputprecio"];
        $imagen= $_FILES['inputimagen']['name'];
        $proveedor=$_POST["Proveedor"];
        $temp = $_FILES['inputimagen']['tmp_name'];
        $id="";
        $producto = new Producto($imagen,$nom,$proveedor,$precio,$id);
        try {
            Metodos_Productos::addProducto($producto);
            move_uploaded_file($temp, '../img/'.$imagen);
            header("location:../Administrador/administrarProductos.php?Producto_Registrado");
        }catch (PDOException $e){
            $error = "El_producto_ya_existe"; 
            header("location:../Administrador/añadirProducto.php?error=$error");
        }
    }
?>