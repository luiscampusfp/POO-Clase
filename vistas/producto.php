<?php

class VistaProducto{

    function MostrarFormulario($dato=-1)
    {
        ?>
        <form action="" method="post">
        <label for="">Nombre</label>
        <input type="text" name="nombre" id=""><br>
        <label for="">Código</label>
        <input type="text" name="codigo" id=""><br>
        <label for="">Precio</label>
        <input type="text" name="precio" id=""><br>
        <input type="submit" value="Enviar" name="enviar">
    </form>
    <?php
    if ($dato!=-1) {
        echo "<p>$dato</p>";
    }
    ?>
        <?php
    }
}
