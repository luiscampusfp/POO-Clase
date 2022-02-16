<?php
require_once("../controladores/controlador.php");

class VistaUsuario
{

    function MostrarFormularioUsuario($datoU = -1)
    {
        $con = new Controlador();
?>
        <form action="" method="post">
            <label for="">Nombre</label>
            <input type="text" name="nombre" id=""><br>
            <label for="">Correo</label>
            <input type="text" name="correo" id=""><br>
            <label for="">Creditos</label>
            <input type="text" name="creditos" id=""><br>
            <?php
            foreach ($con->getProductos() as $producto) {
                echo '<input type="checkbox" name="pro' . $producto->getCodigo() . '" id="pro' . $producto->getCodigo() . '"><label for="pro' . $producto->getCodigo() . '">' . $producto->getNombre() . '</label><br>';
            }
            ?>
            <input type="submit" value="Enviar" name="enviarUser">
        </form>
        <?php
        if ($datoU != -1) {
            echo "<p>$datoU</p>";
        }
        ?>
<?php
    }
}
