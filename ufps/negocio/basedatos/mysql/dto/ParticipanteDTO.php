<?php

class ParticipanteDTO{
    
    private $id;
    private $nombre;
    private $codigo;
    private $correo;
    private $equipo;
    private $apellido;
    
    function ParticipanteDTO(){
        
    }
    function __ParticipanteDTO($id,$nom,$ape,$cod,$cor,$equ){
        $this->id=$id;
        $this->nombre=$nom;
        $this->apellido=$ape;
        $this->codigo=$cod;
        $this->correo=$cor;
        $this->equipo=$equ;
    }
    function getApellido() {
        return $this->apellido;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

        
    
    function getNombre() {
        return $this->nombre;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function getCorreo() {
        return $this->correo;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }
    function getEquipo() {
        return $this->equipo;
    }

    function setEquipo($equipo) {
        $this->equipo = $equipo;
    }
    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }




}

