<?php



class Pendiente
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
    private $usuario_Usuario;

    public function __construct($Nombre, $Raza, $Tamaño, $Edad,$Sexo,$Caracter,$Convivencia,$Id,$Img,$usuario_Usuario)
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
        $this->$usuario_Usuario=$usuario_Usuario;

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
    public function getusuario_Usuario()
    {
        return $this->usuario_Usuario;
    }
 


}
