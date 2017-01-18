<?php

class EnvioDTO{
    
    private $id;
    private $resultado;
    private $id_equipo;
    private $id_evento;
    private $id_problema;
    
    function envioDTO(){
        
    }
    
    function __envioDTO($id,$resultado,$id_equipo,$id_evento,$id_problema){
        $this->id=$id;
        $this->resultado=$resultado;
        $this->id_equipo=$id_equipo;
        $this->id_evento=$id_evento;
        $this->id_problema=$id_problema;
    }
    
    function getId() {
        return $this->id;
    }

    function getResultado() {
        return $this->resultado;
    }

    function getId_equipo() {
        return $this->id_equipo;
    }

    function getId_evento() {
        return $this->id_evento;
    }

    function getId_problema() {
        return $this->id_problema;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setResultado($resultado) {
        $this->resultado = $resultado;
    }

    function setId_equipo($id_equipo) {
        $this->id_equipo = $id_equipo;
    }

    function setId_evento($id_evento) {
        $this->id_evento = $id_evento;
    }

    function setId_problema($id_problema) {
        $this->id_problema = $id_problema;
    }


    
}


