<?php

class Usuario
{
    //AGREGACION
    private $productos;
    function __construct($productos)
    {
        $this->productos = $productos;
    }

    function getProductos()
    {
        return $this->productos;
    }
}
