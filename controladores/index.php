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

    header("location: index.php?datoP=" . $texto);
}

if (isset($_POST['enviarUser'])) {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $creditos = $_POST['creditos'];

    $usuario = new Usuario($nombre, $correo, $creditos);
    
    $con = new Controlador();

    $con->addUsuario($usuario);

    $texto = "Usuario insertado";

    //header("location: index.php?datoU=" . $texto);
}

