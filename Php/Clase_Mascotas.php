<?php



class Mascotas
{
    private $Nombre;
    private $Raza;
    private $Tamaño;
    private $Edad;
    private $Sexo;
    private $Caracter;
    private $Convivencia;
    private $Id;
    private $Img;

    public function __construct($Nombre, $Raza, $Tamaño, $Edad,$Sexo,$Caracter,$Convivencia,$Id,$Img)
    {
        $this->Nombre = $Nombre;
        $this->Raza = $Raza;
        $this->Tamaño = $Tamaño;
        $this->Edad = $Edad;
        $this->Sexo= $Sexo;
        $this->Caracter= $Caracter;
        $this->Convivencia= $Convivencia;
        $this->Id= $Id;
        $this->Img= $Img;
    }
   public function getNombre()
    {
        return $this->Nombre;
    }
    public function getRaza()
    {
        return $this->Raza;
    }
    public function getTamaño()
    {
        return $this->Tamaño;
    }
    public function getEdad()
    {
        return $this->Edad;
    }
    public function getSexo()
    {
        return $this->Sexo;
    }
    public function getCaracter()
    {
        return $this->Caracter;
    }
    public function getConvivencia()
    {
        return $this->Convivencia;
    }
    public function getId()
    {
        return $this->Id;
    }
    public function getImg()
    {
        return $this->Img;
    }
 


}
