<?php
require_once 'models/categoria.php';
require_once 'models/producto.php';


class categoriaController{
    public function index()
    {
        Utils::isAdmin();
        $categoria = new Categoria();
        $categorias = $categoria->getAll();

       require_once 'views/categoria/index.php';
    }
    public function ver() {
        if (isset($_GET['Id'])) {
            $Id = $_GET['Id'];
            //CONSEGUIR CATEGORIA
           $categoria = new Categoria();
           $categoria->setId($Id);
           $categoria = $categoria->getOne();
           
           //CONSEGUIR PRODUCTOS
           
           $producto = new Producto();
           $producto->setCategoria_id($Id);
           $productos = $producto->getAllCategoria();
        }
        
        require_once 'views/categoria/ver.php';;
    }
    
    public function crear(){
        Utils::isAdmin();
        require_once 'views/categoria/crear.php';
    }
    public function save(){
        Utils::isAdmin();
        
        if(isset($_POST) && isset($_POST['nombre'])){
            $categoria = new Categoria();
            $categoria->setNombre($_POST['nombre']);
            $save = $categoria->save();
            
        }
        
        header("Location:".base_url."categoria/index");
    }
}