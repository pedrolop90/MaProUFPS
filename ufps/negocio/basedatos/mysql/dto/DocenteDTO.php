<?php

class DocenteDTO{
    
    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $usuario;
    private $contraseña;
    
    
    function __DocenteDTO($id,$nom,$ape,$cor,$user,$contra){
        $this->id=$id;
        $this->nombre=$nom;
        $this->apellido=$ape;
        $this->correo=$cor;
        $this->usuario=$user;
        $this->contraseña=$contra;
    }
    
    function DocenteDTO(){
        
    }
    
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getCorreo() {
        return $this->correo;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getContraseña() {
        return $this->contraseña;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setContraseña($contraseña) {
        $this->contraseña = $contraseña;
    }


    
}