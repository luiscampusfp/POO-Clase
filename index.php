<?php
require_once("vistas/principal.php");

$mainView = new VistaPrincipal();
$mainView->MostrarCabecera();

?>
<ul>
    <li><a href="paginas/producto.php">Productos</a></li>
    <li><a href="paginas/usuario.php">Usuario</a></li>
</ul>
<?php

$mainView->MostrarPie();
