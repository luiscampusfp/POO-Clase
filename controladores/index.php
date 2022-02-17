<?php
require_once("controlador.php");

$con = new Controlador();

if (isset($_POST['enviar'])) {
    $nombre = $_POST['nombre'];
    $codigo = $_POST['codigo'];
    $precio = $_POST['precio'];

    $producto = new Producto($nombre, $codigo, $precio);

    $con->addProducto($producto);

    $ultimo = $con->ultimoProducto();
    $texto = "Producto insertado " . $ultimo->getNombre();

    header("location: ?datoP=" . $texto);
}

if (isset($_POST['enviarUser'])) {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $creditos = $_POST['creditos'];
    $productos = array();

    foreach ($con->getProductos() as $pro) {
        if (isset($_POST['pro' . $pro->getCodigo()])) {
            array_push($productos, $pro);
        }
    }

    $usuario = new Usuario($nombre, $correo, $creditos, $productos);

    if ($con->addUsuario($usuario)) {
        $texto = "Usuario insertado";
    } else {
        $texto = "Ya existe un usuario con ese correo";
    }


    header("location: ?datoU=" . $texto);
}

if (isset($_GET['descid'])) {
    $producto = $con->buscarProducto($_GET['descid']);
    if ($producto != false) {
        $producto->realizarDescuento();
        $con->actualizarProducto($producto);
    }
    header("location:producto.php");
}
