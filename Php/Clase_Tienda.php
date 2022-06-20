<?php

/*
 * esta clase representa la tienda del proyecto
 * estar� constituida por una lista de productos disponibles (productos)
 * y una lista de productos seleccionados para comprar (cesta)
 * contendr� los gettes de ambas variables y algunos m�todos para agregar funcionalidad a la clase
 */

class Tienda
{
    private $productos;
    private $cesta;

    /**
     * @param $productos
     */

    public function __construct($productos)
    {
        $this->productos = $productos;
        $this->cesta = array();
    }

    /**
     * @return mixed
     */
    public function getProductos()
    {
        return $this->productos;
    }

    /**
     * @return mixed
     */
    public function getCesta()
    {
        return $this->cesta;
    }

    /* funcion que a�ade un producto a la cesta
     * recibe el id del producto que se quiere a�adir como par�metro
     */
    public function addProducto($id)
    {
        //recorro la lista de productos para encontrar el producto que se quiere a�adir
        foreach ($this->getProductos() as $producto) {
            if ($producto->getId() == $id) {
                array_push($this->cesta, $producto);
            }
        }
    }

    //funcion que devuelve la suma el precio total de la cesta
    public function getPrecioTotal()
    {
        $total = 0;
        foreach ($this->cesta as $producto) {
            $total += $producto->getPrecio();
        }
        return $total;
    }

    //funcion que vac�a la cesta
    public function vaciarCesta()
    {
        $this->cesta = array();
    }
}
