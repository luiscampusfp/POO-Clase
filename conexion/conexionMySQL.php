<?php
require_once("../modelos/producto.php");
require_once('../modelos/usuario.php');

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
    function InsertarUsuario($usuario)
    {
        $result = mysqli_query($this->conexion, "select * from usuarios where correo='" . $usuario->getCorreo() . "'");
        if (mysqli_num_rows($result) == 0) {
            mysqli_query($this->conexion, "Insert into usuario values ('" . $usuario->getNombre() . "', '" . $usuario->getCorreo() . "'," . $usuario->getCreditos() . ")");
            foreach ($usuario->getProductos() as $pro) {
                mysqli_query($this->conexion, "Insert into `usuario_producto` values ('" . $usuario->getCorreo() . "'," . $pro->getCodigo() . ")");
            }
            return true;
        }
        return false;
    }

    function DatosProductos()
    {
        $result = mysqli_query($this->conexion, "select * from producto");
        $productos = array();
        while ($data = mysqli_fetch_assoc($result)) {
            array_push($productos, new Producto($data['nombre'], $data['codigo'], $data['precio']));
        }
        return $productos;
    }

    function ProductosUsuario($correo)
    {
        $result = mysqli_query($this->conexion, "SELECT * FROM usuario_producto up INNER JOIN producto p on up.idproducto=p.codigo where up.idusuario='$correo'");
        $productos = array();
        while ($data = mysqli_fetch_assoc($result)) {
            array_push($productos, new Producto($data['nombre'], $data['codigo'], $data['precio']));
        }
        return $productos;
    }

    function DatosUsuarios()
    {
        $result = mysqli_query($this->conexion, "select * from usuario");
        $usuarios = array();
        while ($data = mysqli_fetch_assoc($result)) {
            $productos = $this->ProductosUsuario($data['correo']);
            array_push($usuarios, new Usuario($data['nombre'], $data['correo'], $data['creditos'], $productos));
        }
        return $usuarios;
    }
}
