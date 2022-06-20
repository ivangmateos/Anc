<?php
class Proveedor
{
    private $nombre;

    public function __construct($Nombre)
    {
        $this->nombre = $Nombre;

    }
    public function getNombre()
    {
        return $this->nombre;
    }


}
