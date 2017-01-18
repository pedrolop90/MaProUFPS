<?php

class EquipoDTO {

    private $id;
    private $usuario;
    private $nick;
    private $contra;
    
    function EquipoDTO(){
        
    }
    
    function __EquipoDTO($id,$usuario,$nic,$contra) {
        $this->id=$id;
        $this->usuario=$usuario;
        $this->nick=$nic;
        $this->contra=$contra;
    }

    function getId() {
        return $this->id;
    }

    function getNick() {
        return $this->nick;
    }

    function getContraseña() {
        return $this->contra;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNick($nick) {
        $this->nick = $nick;
    }

    function setContraseña($contra) {
        $this->contra = $contra;
    }
    function getUsuario() {
        return $this->usuario;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }


    
}
