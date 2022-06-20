<?php
class ConexionBD{
    public static function conectar():PDO{
        $conexion = null;
        try{
            $dsn = "mysql:host=localhost;dbname=anc";
            $conexion = new PDO($dsn,'root','');
            $conexion ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $conexion->exec("set character set utf8");
        }catch (PDOException $e){
            echo $e->getMessage();
        }
        return $conexion;
    }
}
?>