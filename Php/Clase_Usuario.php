<?php
class Usuario
{
    private $nombre;
    private $apellidos;
    private $edad;
    private $usuario;
    private $contrasena;
    private $provincia;
    private $email;
    private $telefono;
    private $administrador;
    public function __construct($Nombre, $Apellidos, $Edad, $Usuario, $Contrasena, $Provincia, $Email, $Telefono,$Administrador)
    {
        $this->nombre = $Nombre;
        $this->apellidos = $Apellidos;
        $this->edad = $Edad;
        $this->usuario = $Usuario;
        $this->contrasena = md5($Contrasena);
        $this->provincia = $Provincia;
        $this->email = $Email;
        $this->telefono = $Telefono;
        $this->administrador=$Administrador;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getApellidos()
    {
        return $this->apellidos;
    }
    public function getEdad()
    {
        return $this->edad;
    }
    public function getUsuario()
    {
        return $this->usuario;
    }
    public function getContrasena()
    {
        return $this->contrasena;
    }
    public function getProvincia()
    {
        return $this->provincia;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getTelefono()
    {
        return $this->telefono;
    }
    public function getAdministrador()
    {
        return $this->administrador;
    }

}
