<?php

/*
 * esta clase representa un producto dentro de la tienda
 * como m�todos solo tendr� los getters de sus variables y un constructor
 */

class Producto
{
    private $img;
    private $nombre;
    private $proveedor_nombre;
    private $precio;
    private $id;

    public function __construct($img, $nombre, $proveedor_nombre, $precio,$id)
    {
        $this->img = $img;
        $this->nombre = $nombre;
        $this->proveedor_nombre = $proveedor_nombre;
        $this->precio = $precio;
        $this->id = $id;
    }

    public function getImg()
    {
        return $this->img;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getProveedor_nombre()
    {
        return $this->proveedor_nombre;
    }
    public function getPrecio()
    {
        return $this->precio;
    }    
    public function getId()
    {
        return $this->id;
    }

}
