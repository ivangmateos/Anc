<?php
require_once("ConexionBD.php");
require_once("Clase_Usuario.php");

/*
     * clase que sirve para el manejo de usuarios de la base de datos
     * contiene algunos m�todos para la funcionalidad de la clase
     */

class Metodos_Usuario
{
    //funcion que recoge un usuario seg�n su nombre de usuario y lo devuelve commo par�metro
    public static function getUsuario($usuario)
    {
        $conexion = ConexionBD::conectar();
        $sql = $conexion->query("select * from usuario where usuario = '" . $usuario . "'");
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $usuario = $sql->fetch();

        return new Usuario($usuario->Nombre, $usuario->Apellidos, $usuario->Edad, $usuario->Usuario, $usuario->Contrasena, $usuario->Provincia, $usuario->Email, $usuario->Telefono, $usuario->Administrador);
    }

    /*
     * funci�n que comprueba que el usuario y la contrase�a son correctos
     * recibe el nombre de usuario y la contrase�a como par�metros
     * recoge la contrase�a del usuario que se recibe y comprueba si �sta es igual a la que se recibe como par�metro
     * devuelve true si el usuario y la contrase�a coinciden y false si no
     */
    public static function comprobarPassword($usuario, $contrasena)
    {
        $conexion = ConexionBD::conectar();
        $sql = $conexion->query("select usuario.contrasena from usuario where usuario = '" . $usuario . "'");
        $sql = $sql->fetch();
        $pwd = $sql[0];
        return md5($contrasena) == $pwd;
    }
    public static function addUsuario(Usuario $usuario)
    {
        $conexion = ConexionBD::conectar();
        $sql = $conexion->prepare("insert into usuario (Nombre, Apellidos, Edad, Usuario, Contrasena, Provincia, Email, Telefono, Administrador) values (:nom, :ape, :eda, :usu, :pwd, :pro, :ema, :tel, :admin)");
        $nom = $usuario->getNombre();
        $ape = $usuario->getApellidos();
        $eda = $usuario->getEdad();
        $usu = $usuario->getUsuario();
        $pwd = $usuario->getContrasena();
        $pro = $usuario->getProvincia();
        $ema = $usuario->getEmail();
        $tel = $usuario->getTelefono();
        $admin = $usuario->getAdministrador();
        $sql->bindParam(":nom", $nom);
        $sql->bindParam(":ape", $ape);
        $sql->bindParam(":eda", $eda);
        $sql->bindParam(":usu", $usu);
        $sql->bindParam(":pwd", $pwd);
        $sql->bindParam(":pro", $pro);
        $sql->bindParam(":ema", $ema);
        $sql->bindParam(":tel", $tel);
        $sql->bindParam(":admin", $admin);
        $sql->execute();
    }

    public static function UpdateUsuario(Usuario $usuario)
    {
        $conexion = ConexionBD::conectar();
        $sql = $conexion->prepare("update usuario set Nombre=:nom, Apellidos=:ape, Edad=:eda, Usuario=:usu, Contrasena=:pwd, Provincia=:pro, Email=:ema, Telefono=:tel, Administrador=:admin where Usuario=:usu");
        $nom = $usuario->getNombre();
        $ape = $usuario->getApellidos();
        $eda = $usuario->getEdad();
        $usu = $usuario->getUsuario();
        $pwd = $usuario->getContrasena();
        $pro = $usuario->getProvincia();
        $ema = $usuario->getEmail();
        $tel = $usuario->getTelefono();
        $admin = $usuario->getAdministrador();
        $sql->bindParam(":nom", $nom);
        $sql->bindParam(":ape", $ape);
        $sql->bindParam(":eda", $eda);
        $sql->bindParam(":usu", $usu);
        $sql->bindParam(":pwd", $pwd);
        $sql->bindParam(":pro", $pro);
        $sql->bindParam(":ema", $ema);
        $sql->bindParam(":tel", $tel);
        $sql->bindParam(":admin", $admin);
        $sql->execute();
    }

    #METODO QUE MUESTRA TODOS LOS USUARIOS
    public static function get_Usuarios()
    {
        $conexion = ConexionBD::conectar();
        $consulta = "select * from usuario";
        $sql = $conexion->prepare($consulta);
        $sql->execute();
        $tabla = $sql->fetchAll();
        echo "<table class='table table-striped centrar'><th class='responsive'>Nombre</th>" . "<th colspan='6'>Usuario</th><tr>";
        foreach ($tabla as $linea) {
            echo "<td class='responsive'> " . $linea["Nombre"] . "</td> " . "<td> " . $linea["Usuario"] . "";
            if($linea['Usuario']=="admin"||$linea['Usuario']==$_SESSION["usuario"]->getUsuario()  ){
               echo" <form action='../Php/Session_usumodificar.php' method='POST'>
                <td> <input type='hidden' name='usuario' value=" . $linea["Usuario"] . "></td>
                <td>  <button type='submit' class='btn  btn-success btn-block col-12' disabled>Modificar</button></td></form>
                <form action='../Php/Eliminar_Usuario.php' method='POST'>
                <td> <input type='hidden' name='usuario' value=" . $linea["Usuario"] . "></td>
                <td><button type='submit'  class='btn  btn-success btn-block col-12'disabled>Eliminar</button></form></td></tr>"; 
        }else{
        echo "<form action='../Php/Session_usumodificar.php' method='POST'>
        <td> <input type='hidden' name='usuario' value=" . $linea["Usuario"] . "></td>
        <td>  <button type='submit' class='btn  btn-success btn-block col-12'>Modificar</button></td></form>
        <form action='../Php/Eliminar_Usuario.php' method='POST'>
        <td> <input type='hidden' name='usuario' value=" . $linea["Usuario"] . "></td>
        <td><button type='submit'  class='btn  btn-success btn-block col-12'>Eliminar</button></form></td></tr>"; 
        }

        

        } 
        echo "</table>";
      
    }
    public static function get_EliminarUsuario($usuario)
    {
        $conexion = ConexionBD::conectar();
        $consulta = "delete  from usuario where usuario=:usuario";  
        $sql = $conexion->prepare($consulta);
        $sql->bindParam(":usuario", $usuario);  
        $sql->execute();
    }
}
