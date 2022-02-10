<?php
require_once("modelos/producto.php");

class MySQLConexion
{
    private $conexion;

    function __construct($servidor, $usuario, $contrasenya, $basedatos)
    {
        $this->conexion = mysqli_connect($servidor, $usuario, $contrasenya, $basedatos);
    }

    function InsertarProducto($producto)
    {
        mysqli_query($this->conexion, "Insert into producto values ('" . $producto->getNombre() . "', " . $producto->getCodigo() . "," . $producto->getPrecio() . ")");
    }
}
