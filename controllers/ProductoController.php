<?php
require_once 'models/producto.php';

class productoController
{

    public function index()
    {
        // renderizar vista
        require_once 'views/producto/destacados.php';
    }

    public function gestion()
    {
        Utils::isAdmin();

        $producto = new Producto();
        $productos = $producto->getAll();

        require_once 'views/producto/gestion.php';
    }

    public function crear()
    {
        Utils::isAdmin();

        require_once 'views/producto/crear.php';
    }

    public function save()
    {
        if (isset($_POST)) {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
            $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;
            /* $imagen = isset($_POST['nombre']) ? $_POST['nombre'] : false; */

            if ($nombre && $descripcion && $precio && $stock && $categoria) {
                $producto = new Producto();
                $producto->setNombre($nombre);
                $producto->setDescripcion($descripcion);
                $producto->setCategoria_id($categoria);
                $producto->setStock($stock);
                $producto->setPrecio($precio);

                $save = $producto->save();

                if ($save) {
                    $_SESSION['producto'] = "Complete";
                } else {
                    $_SESSION['producto'] = "failed";
                }
            } else {
                $_SESSION['producto'] = "failed";
            }
        } else {
            $_SESSION['producto'] = "failed";
        }
        header('Location:' . base_url . 'producto/gestion');
    }
}