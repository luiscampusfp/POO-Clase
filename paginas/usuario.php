<?php
require_once("../vistas/principal.php");
require_once('../vistas/usuario.php');
require_once("../controladores/index.php");

$mainView = new VistaPrincipal();
$usuarioView = new VistaUsuario();
$mainView->MostrarCabecera();
if (isset($_GET['datoU'])) {
    $usuarioView->MostrarFormularioUsuario($_GET['datoU']);
} else {
    $usuarioView->MostrarFormularioUsuario();
}
$usuarioView->MostrarUsuarios();

$mainView->MostrarPie();
