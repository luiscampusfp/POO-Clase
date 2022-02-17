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
        $this->con = new MySQLConexion("localhost", "root", "", "tienda");
        $this->productos = $this->con->DatosProductos();
        $this->usuarios = $this->con->DatosUsuarios();
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
        return $this->productos;
    }

    function getUsuarios()
    {
        return $this->usuarios;
    }

    function buscarProducto($id)
    {
        foreach ($this->productos as $pro) {
            if ($pro->getCodigo() == $id) {
                return $pro;
            }
        }
        return false;
    }

    function actualizarProducto($producto)
    {
        $this->con->ActualizarProducto($producto);
        for ($i = 0; $i < count($this->productos); $i++) {
            if ($this->productos[$i]->getCodigo() == $producto->getCodigo()) {
                $this->productos[$i]->setPrecio($producto->getPrecio());
            }
        }
    }
}
