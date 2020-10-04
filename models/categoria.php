<?php
class Categoria{
    private $Id;
    private $nombre;
    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    function getId(){
        return $this->Id;
        }
    function getNombre(){
        return $this->nombre;
    }
    function setId($Id){
        $this->Id = $Id;
        }
    function setNombre($nombre){
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    public function getAll(){
        $categorias = $this->db->query("SELECT * FROM categorias ORDER BY Id DESC;");
        return $categorias;
    }
    
    public function save(){
        
        $sql = "INSERT INTO categorias VALUES(NULL, '{$this->getNombre()}');";
        $save = $this->db->query($sql);
        
       
        $result = false;
        if($save){
            $result = true;
            
        }
         
        return $result;
    }
}