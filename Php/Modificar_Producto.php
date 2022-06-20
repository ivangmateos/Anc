<?php
    require_once("Clase_Producto.php");
    require_once ("Metodos_Productos.php");
    session_start();

    if (isset($_POST["inputnombre"])){
        $nom=$_POST["inputnombre"];
        $precio=$_POST["inputprecio"];
        $imagen= $_FILES['inputimagen']['name'];
        $proveedor=$_POST["Proveedor"];
        $temp = $_FILES['inputimagen']['tmp_name'];
        $id=$_SESSION["productmodificar"];
        $producto = new Producto($imagen,$nom,$proveedor,$precio,$id);
        try {
            Metodos_Productos::UpdateProducto($producto);
            move_uploaded_file($temp, '../img/'.$imagen);
            header("location:../Administrador/administrarProductos.php?Producto_Modificado");
        }catch (PDOException $e){
            $error = "El_producto_no_se_puede_modificar"; 
            header("location:../Administrador/EditarProducto.php?error=$error");
        }
    }
?>