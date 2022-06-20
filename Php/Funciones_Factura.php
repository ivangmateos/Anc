<?php

/*
 * fichero que sirve como controlador de la factura
 */
    include_once ("../Php/Clase_Usuario.php");
    include_once ("../Php/Clase_Tienda.php");
    include_once ("../Php/Clase_Producto.php");

        $tienda = $_SESSION["tienda"];
        $usuario = $_SESSION["usuario"]->getUsuario();
        $nombre=$_SESSION["usuario"]->getNombre();
        $telefono=$_SESSION["usuario"]->getTelefono();
        $fecha =   date("Y.m.d_h.i.s");   
        $fichero = fopen("../facturas/".$fecha.".txt","w");
        //genero el texto de la factura
        $factura =    
        "FACTURA DEL CLIENTE \n".
        "------------------------------------\n".
        "Datos del cliente:\n".
        "Fecha:".$fecha."\n".
        "Usuario: ".$usuario."\n".
        "Nombre: ".$nombre."\n".
        "Telefono: ".$telefono."\n".
        "------------------------------------\n".
        "Resumen del Pedido:\n";

    foreach ($tienda->getCesta() as $producto){
        $factura.=$producto->getNombre().": ".$producto->getPrecio()."€\n";
    }
    $factura.= "------------------------------------\n";
    $factura.="TOTAL A PAGAR: ".$tienda->getPrecioTotal()."€"."\n\n";
    //lo guardo en el archivo
    fwrite($fichero, $factura);
    //cierro el buffer
    fclose($fichero);

if (isset($_POST["aceptar"])){
    //si el usuario hace click en el boton aceptar, borro la cesta y vuelvo a la tienda
    $_SESSION["tienda"]->vaciarCesta();  
    header("location:../Accediendo/tienda.php");
}
?>
