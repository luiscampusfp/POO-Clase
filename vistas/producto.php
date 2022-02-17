<?php
require_once("../controladores/controlador.php");

class VistaProducto
{

    function MostrarFormulario($datoP = -1)
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
        if ($datoP != -1) {
            echo "<p>$datoP</p>";
        }
        ?>
    <?php
    }

    function MostrarProductos()
    {
        $con = new Controlador();
    ?>
        <table>
            <tr>
                <td>Nombre</td>
                <td>Codigo</td>
                <td>Precio</td>
            </tr>
            <?php
            foreach ($con->getProductos() as $producto) {
            ?>
                <tr>
                    <td><?= $producto->getNombre() ?></td>
                    <td><?= $producto->getCodigo() ?></td>
                    <td><?= $producto->getPrecio() ?></td>
                    <td><a href="?descid=<?= $producto->getCodigo() ?>">Realizar descuento</a></td>
                </tr>
            <?php
            }
            ?>
        </table>
<?php
    }
}
