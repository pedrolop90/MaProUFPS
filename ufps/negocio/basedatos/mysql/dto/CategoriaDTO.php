<?php

class CategoriaDTO{
    
    private $id;
    private $nombre;
    private $descripcion;
    
    function CategoriaDTO($id,$nom,$desc){
        $this->id=$id;
        $this->nombre=$nom;
        $this->descripcion=$desc;
    }
    
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }


    
}