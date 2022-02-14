<?php

class Usuario
{
    //AGREGACION
    private $productos;
    
    function getProductos()
    {
        return $this->productos;
    }

    private $nombre;
    private $correo;
    private $creditos;

    function __construct($nombre,$correo,$creditos)
    {
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->creditos = $creditos;
    }

    function getNombre()
    {
        return $this->nombre;
    }
    function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    function getCorreo()
    {
        return $this->correo;
    }
    function setCorreo($correo)
    {
        $this->correo = $correo;
    }

    function getCreditos()
    {
        return $this->creditos;
    }
    function setCreditos($creditos)
    {
        $this->creditos = $creditos;
    }

    function comprarCredito(){
        $this->creditos+=100;
    }
}
