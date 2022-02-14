<?php
require_once("modelos/producto.php");
require_once('modelos/usuario.php');

class MySQLConexion
{
    private $conexion;

    function __construct($servidor, $user, $contrasenya, $basedatos)
    {
        $this->conexion = mysqli_connect($servidor, $user, $contrasenya, $basedatos);
    }

    function InsertarProducto($producto)
    {
        mysqli_query($this->conexion, "Insert into producto values ('" . $producto->getNombre() . "', " . $producto->getCodigo() . "," . $producto->getPrecio() . ")");
    }
    function InsertarUsuario($usuario){
        mysqli_query($this->conexion, "Insert into users values ('" . $usuario->getNombre() . "', '". $usuario->getCorreo() . "'," . $usuario->getCreditos() . ")");
    }
}
