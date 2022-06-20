<?php

/*
 * fichero que sirve como controlador de la tienda
 */

    require_once("../Php/Metodos_Productos.php");
    require_once ("../Php/Clase_Tienda.php");
    session_start();

    if (!isset($_SESSION["tienda"])){
        //si la tienda no est� guardada en la sesi�n, la creo y la guardo
        $tienda = new Tienda(Metodos_Productos::getProductos());
        $_SESSION["tienda"] = $tienda;
    }else{
        //si ya est� creada la recojo de la sesi�n
        $tienda = $_SESSION["tienda"];
        //si se ha a�adido un producto a la cesta, lo meto en la cesta
        if(isset($_POST["producto"])){  
             $tienda->addProducto($_POST["producto"]);
        }
        //si el usuario ha hecho click en el bot�n de vaciar la cesta, la vac�o
        if (isset($_POST["vaciar"])){
            $tienda->vaciarCesta();
        }
        //si el usuario hace click en el bot�n de pagar y la cesta no est� vac�a, le redirijo a la factura
        if (isset($_POST["pagar"])){
            if (sizeof($tienda->getCesta())){
             header("location:../Accediendo/Factura.php");
            }else{
                header("location:../Accediendo/tienda.php?Carrito_Vacio");

            }
        }
    }
?>