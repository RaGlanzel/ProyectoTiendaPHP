<?php

class Producto
{

    private $Id;

    private $categoria_id;

    private $nombre;

    private $descripcion;

    private $precio;

    private $stock;

    private $imagen;

    private $oferta;

    private $fecha;

    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    /**
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     *
     * @return mixed
     */
    public function getCategoria_id()
    {
        return $this->categoria_id;
    }

    /**
     *
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     *
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     *
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     *
     * @return mixed
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     *
     * @return mixed
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     *
     * @return mixed
     */
    public function getOferta()
    {
        return $this->oferta;
    }

    /**
     *
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     *
     * @param mixed $id
     */
    public function setId($Id)
    {
        $this->Id = $Id;
    }

    /**
     *
     * @param mixed $categoria_id
     */
    public function setCategoria_id($categoria_id)
    {
        $this->categoria_id = $categoria_id;
    }

    /**
     *
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    /**
     *
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $this->db->real_escape_string($descripcion);
    }

    /**
     *
     * @param mixed $precio
     */
    public function setPrecio($precio)
    {
        $this->precio = $this->db->real_escape_string($precio);
    }

    /**
     *
     * @param mixed $stock
     */
    public function setStock($stock)
    {
        $this->stock = $this->db->real_escape_string($stock);
    }

    /**
     *
     * @param mixed $imagen
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }

    /**
     *
     * @param mixed $oferta
     */
    public function setOferta($oferta)
    {
        $this->oferta = $this->db->real_escape_string($oferta);
    }

    /**
     *
     * @param mixed $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    public function getAll()
    {
        $productos = $this->db->query("SELECT * FROM productos ORDER BY Id DESC;");
        return $productos;
    }
    public function getAllCategoria()
    {
        $sql = "SELECT p.*, c.nombre AS 'catnombre' FROM productos p " 
        . "INNER JOIN categorias c ON c.Id = p.categoria_id "
        . "WHERE p.categoria_id={$this->getCategoria_id()} "
        . "ORDER BY Id DESC;";
        $productos = $this->db->query($sql);
        return $productos;
    }
    

    public function save()
    {
        $sql = "INSERT INTO productos VALUES(NULL, {$this->getCategoria_id()}, '{$this->getNombre()}', '{$this->getDescripcion()}', {$this->getPrecio()}, {$this->getStock()}, NULL, CURDATE(), '{$this->getImagen()}');";
        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function delete()
    {
        $sql = "DELETE FROM productos WHERE Id={$this->Id};";
        $delete = $this->db->query($sql);

        $result = false;
        if ($delete) {
            $result = true;
        }
        return $result;
    }

    public function getOne()
    {
        $producto = $this->db->query("SELECT * FROM productos WHERE Id = {$this->getId()}");
        return $producto->fetch_object();
    }
    
    public function getRandom($limit){
        
        $productos = $this->db->query("SELECT * FROM productos ORDER BY RAND() LIMIT $limit");
        
        return $productos;
    }

    public function edit()
    {
        $sql = "UPDATE productos SET nombre='{$this->getNombre()}', descripcion='{$this->getDescripcion()}', precio={$this->getPrecio()}, stock={$this->getStock()}, categoria_id={$this->getCategoria_id()} ";

        if ($this->getImagen() != NULL) {
            $sql .= ", image='{$this->getImagen()}'";
        }

        $sql .= " WHERE Id={$this->Id};";

        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }
}