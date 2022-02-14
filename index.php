<?php
require_once("vistas/principal.php");
require_once("vistas/producto.php");
require_once('vistas/usuario_formulario.php');
require_once("controladores/index.php");

$mainView = new VistaPrincipal();
$productoView = new VistaProducto();
$usuarioView = new VistaUsuario();
$mainView->MostrarCabecera();
if (isset($_GET['datoP'])) {
    $productoView->MostrarFormulario($_GET['datoP']);
} else {
    $productoView->MostrarFormulario();
}
if (isset($_GET['datoU'])) {
    $usuarioView->MostrarFormularioUsuario($_GET['datoU']);
} else {
    $usuarioView->MostrarFormularioUsuario();
}

$mainView->MostrarPie();
