<?php
    require_once ("Metodos_Productos.php");
    session_start();
if(isset($_POST['id'])){
    $product = $_POST['id'];
    $_SESSION["productmodificar"]=Metodos_Productos::getproducto($product);      
    header("location:../Administrador/EditarProducto.php");
}
?>