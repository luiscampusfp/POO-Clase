<?php
require_once("controlador.php");

if (isset($_POST['enviar'])) {
    $nombre = $_POST['nombre'];
    $codigo = $_POST['codigo'];
    $precio = $_POST['precio'];

    $producto = new Producto($nombre, $codigo, $precio);
    $con = new Controlador();

    $con->addProducto($producto);

    $ultimo = $con->ultimoProducto();
    $texto = "Producto insertado " . $ultimo->getNombre();

    header("location: index.php?dato=" . $texto);
}

