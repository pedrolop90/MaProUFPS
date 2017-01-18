<?php

class EventoDTO{
    
    private $id;
    private $nombre;
    private $fecha_inicio;
    private $hora_inicio;
    private $fecha_fin;
    private $hora_fin;
    private $equipo;
    private $docente;
    private $problemas=array();
    private $visibilidad;
    
    function EventoDTO(){
        
    }
    
    function __EventoDTO($id,$nombre,$fecha_inicio,$hora_inicio,$fecha_fin,$hora_fin){
        $this->id=$id;
        $this->nombre=$nombre;
        $this->fecha_inicio=$fecha_inicio;
        $this->hora_inicio=$hora_inicio;
        $this->fecha_fin=$fecha_fin;
        $this->hora_fin=$hora_fin;
    }
    
    function getVisibilidad() {
        return $this->visibilidad;
    }

    function setVisibilidad($visibilidad) {
        $this->visibilidad = $visibilidad;
    }

        
    function getProblemas() {
        return $this->problemas;
    }

    function setProblemas($problemas) {
        $this->problemas = $problemas;
    }

        
    function getDocente() {
        return $this->docente;
    }

    function setDocente($docente) {
        $this->docente = $docente;
    }
  
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getFecha_inicio() {
        return $this->fecha_inicio;
    }

    function getHora_inicio() {
        return $this->hora_inicio;
    }

    function getFecha_fin() {
        return $this->fecha_fin;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setFecha_inicio($fecha_inicio) {
        $this->fecha_inicio = $fecha_inicio;
    }

    function setHora_inicio($hora_inicio) {
        $this->hora_inicio = $hora_inicio;
    }

    function setFecha_fin($fecha_fin) {
        $this->fecha_fin = $fecha_fin;
    }
    function getHora_fin() {
        return $this->hora_fin;
    }

    function setHora_fin($hora_fin) {
        $this->hora_fin = $hora_fin;
    }

    function getEquipo() {
        return $this->equipo;
    }

    function setEquipo($equipo) {
        $this->equipo = $equipo;
    }



}
