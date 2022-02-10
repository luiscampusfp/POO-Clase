<?php
require_once('modelos/producto.php');
require_once("conexion/conexionMySQL.php");

class Controlador
{
    private $productos;
    private $con;

    function __construct()
    {
        $this->productos = array();
        $this->con = new MySQLConexion("localhost", "root", "", "tienda");
    }

    function addProducto($producto)
    {
        array_push($this->productos, $producto);
        $this->con->InsertarProducto($producto);
    }

    function ultimoProducto()
    {
        $posUlt = count($this->productos) - 1;
        return $this->productos[$posUlt];
    }
}
