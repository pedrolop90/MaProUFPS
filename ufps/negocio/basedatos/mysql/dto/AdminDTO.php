<?php

class AdminDTO{
    
    private $usuario;
    private $contraseña;
    
    function __AdminDTO($usuario,$contraseña){
        $this->contraseña=$contraseña;
        $this->usuario=$usuario;
    }
    function AdminDTO(){
        
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
