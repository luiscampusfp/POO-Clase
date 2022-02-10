<?php

class Producto
{
    private $nombre;
    private $codigo;
    private $precio;

    function __construct($nombre, $codigo, $precio)
    {
        $this->nombre = $nombre;
        $this->codigo = $codigo;
        $this->precio = $precio;
    }

    function getNombre()
    {
        return $this->nombre;
    }

    function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    function getCodigo()
    {
        return $this->codigo;
    }

    function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    function getPrecio()
    {
        return $this->precio;
    }

    function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    function realizarDescuento()
    {
        $this->precio -= $this->precio * 0.1;
    }
}
