<?php
require_once("../vistas/principal.php");
require_once("../vistas/producto.php");
require_once("../controladores/index.php");

$mainView = new VistaPrincipal();
$productoView = new VistaProducto();
$mainView->MostrarCabecera();
if (isset($_GET['datoP'])) {
    $productoView->MostrarFormulario($_GET['datoP']);
} else {
    $productoView->MostrarFormulario();
}
$mainView->MostrarPie();
