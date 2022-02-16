<?php
require_once('../modelos/producto.php');
require_once('../modelos/usuario.php');
require_once("../conexion/conexionMySQL.php");

class Controlador
{
    private $productos;
    private $usuarios;
    private $con;

    function __construct()
    {
        $this->productos = array();
        $this->usuarios = array();
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

    function addUsuario($usuarios)
    {
        array_push($this->usuarios, $usuarios);
        return $this->con->InsertarUsuario($usuarios);
    }

    function getProductos()
    {
        $this->productos = $this->con->DatosProductos();
        return $this->productos;
    }
}
